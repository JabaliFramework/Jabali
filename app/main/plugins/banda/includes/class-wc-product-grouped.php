<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Grouped Product Class.
 *
 * Grouped products cannot be purchased - they are wrappers for other products.
 *
 * @class 		WC_Product_Grouped
 * @version		2.3.0
 * @package		Banda/Classes/Products
 * @category	Class
 * @author 		Jabali
 */
class WC_Product_Grouped extends WC_Product {

	/** @public array Array of child products/posts/variations. */
	public $children;

	/**
	 * Constructor.
	 *
	 * @access public
	 * @param mixed $product
	 */
	public function __construct( $product ) {
		$this->product_type = 'grouped';
		parent::__construct( $product );
	}

	/**
	 * Get the add to cart button text.
	 *
	 * @access public
	 * @return string
	 */
	public function add_to_cart_text() {
		return apply_filters( 'banda_product_add_to_cart_text', __( 'View products', 'banda' ), $this );
	}

	/**
	 * Return the products children posts.
	 *
	 * @access public
	 * @return array
	 */
	public function get_children() {
		if ( ! is_array( $this->children ) || empty( $this->children ) ) {
			$transient_name = 'wc_product_children_' . $this->id;
			$this->children = array_filter( array_map( 'absint', (array) get_transient( $transient_name ) ) );

			if ( empty( $this->children ) ) {

				$args = apply_filters( 'banda_grouped_children_args', array(
					'post_parent' 	=> $this->id,
					'post_type'		=> 'product',
					'orderby'		=> 'menu_order',
					'order'			=> 'ASC',
					'fields'		=> 'ids',
					'post_status'	=> 'publish',
					'numberposts'	=> -1,
				) );

				$this->children = get_posts( $args );

				set_transient( $transient_name, $this->children, DAY_IN_SECONDS * 30 );
			}
		}
		return (array) $this->children;
	}

	/**
	 * Returns whether or not the product has any child product.
	 *
	 * @access public
	 * @return bool
	 */
	public function has_child() {
		return sizeof( $this->get_children() ) ? true : false;
	}

	/**
	 * Returns whether or not the product is on sale.
	 *
	 * @access public
	 * @return bool
	 */
	public function is_on_sale() {
		$is_on_sale = false;

		if ( $this->has_child() ) {

			foreach ( $this->get_children() as $child_id ) {
				$sale_price = get_post_meta( $child_id, '_sale_price', true );
				if ( $sale_price !== "" && $sale_price >= 0 ) {
					$is_on_sale = true;
				}
			}

		} else {

			if ( $this->sale_price && $this->sale_price == $this->price ) {
				$is_on_sale = true;
			}

		}

		return apply_filters( 'banda_product_is_on_sale', $is_on_sale, $this );
	}


	/**
	 * Returns false if the product cannot be bought.
	 *
	 * @access public
	 * @return bool
	 */
	public function is_purchasable() {
		return apply_filters( 'banda_is_purchasable', false, $this );
	}

	/**
	 * Returns the price in html format.
	 *
	 * @access public
	 * @param string $price (default: '')
	 * @return string
	 */
	public function get_price_html( $price = '' ) {
		$tax_display_mode = get_option( 'banda_tax_display_shop' );
		$child_prices     = array();

		foreach ( $this->get_children() as $child_id ) {
			$child          = wc_get_product( $child_id );
			if ( '' !== $child->get_price() ) {
				$child_prices[] = 'incl' === $tax_display_mode ? $child->get_price_including_tax() : $child->get_price_excluding_tax();
			}
		}

		if ( ! empty( $child_prices ) ) {
			$min_price = min( $child_prices );
			$max_price = max( $child_prices );
		} else {
			$min_price = '';
			$max_price = '';
		}

		if ( '' !== $min_price ) {
			$price   = $min_price !== $max_price ? sprintf( _x( '%1$s&ndash;%2$s', 'Price range: from-to', 'banda' ), wc_price( $min_price ), wc_price( $max_price ) ) : wc_price( $min_price );
			$is_free = $min_price == 0 && $max_price == 0;

			if ( $is_free ) {
				$price = apply_filters( 'banda_grouped_free_price_html', __( 'Free!', 'banda' ), $this );
			} else {
				$price = apply_filters( 'banda_grouped_price_html', $price . $this->get_price_suffix(), $this, $child_prices );
			}
		} else {
			$price = apply_filters( 'banda_grouped_empty_price_html', '', $this );
		}

		return apply_filters( 'banda_get_price_html', $price, $this );
	}
}