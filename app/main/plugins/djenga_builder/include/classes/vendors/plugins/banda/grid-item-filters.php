<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Append 'add to card' link to the list of Add link for grid element shortcodes.
 *
 * @param $param
 *
 * @since 4.5
 *
 * @return array
 */
function vc_gitem_add_link_param_banda( $param ) {
	$param['value'][ __( 'Banda add to card link', 'js_composer' ) ] = 'woo_add_to_card';

	return $param;
}

/**
 * Add Banda link attributes to enable add to cart functionality
 *
 * @param $link
 * @param $atts
 * @param string $css_class
 *
 * @since 4.5
 *
 * @return string
 */
function vc_gitem_post_data_get_link_link_banda( $link, $atts, $css_class = '' ) {
	if ( isset( $atts['link'] ) && 'woo_add_to_card' === $atts['link'] ) {
		$css_class .= ' add_to_cart_button vc-gitem-link-ajax product_type_simple';

		return 'a href="{{ banda_product_link }}" class="' . esc_attr( $css_class ) . '" data-product_id="{{ banda_product:id }}"' . ' data-product_sku="{{ banda_product:sku }}" data-product-quantity="1"';
	}

	return $link;
}

/**¬
 * Remove target as useless for add to cart link.
 *
 * @param $link
 * @param $atts
 *
 * @since 4.5
 *
 * @return string
 */
function vc_gitem_post_data_get_link_target_banda( $link, $atts ) {
	if ( isset( $atts['link'] ) && 'woo_add_to_card' === $atts['link'] ) {
		return '';
	}

	return $link;
}

/**
 * Add Banda link attributes to enable add to cart functionality. Not using item element templates vars.
 *
 * @param $link
 * @param $atts
 * @param $post
 * @param string $css_class
 * @return string
 * @since 4.5
 *
 */
function vc_gitem_post_data_get_link_real_link_banda( $link, $atts, $post, $css_class = '' ) {
	if ( isset( $atts['link'] ) && 'woo_add_to_card' === $atts['link'] ) {
		$css_class .= ' add_to_cart_button vc-gitem-link-ajax product_type_simple';

		$link = 'a href="'
		        . do_shortcode( '[add_to_cart_url id="' . $post->ID . '"]' )
		        . '" class="' . esc_attr( $css_class ) . '" data-product_id="'
		        . esc_attr(
			        vc_gitem_template_attribute_banda_product( '',
				        array(
					        'post' => $post,
					        'data' => 'id',
				        )
			        )
		        ) . '"' . ' data-product_sku="' . esc_attr(
			        vc_gitem_template_attribute_banda_product( '',
				        array(
					        'post' => $post,
					        'data' => 'sku',
				        )
			        )
		        ) . '" data-product-quantity="1"';
	}

	return $link;
}

/**¬
 * Remove target as useless for add to cart link.
 *
 * @param $link
 * @param $atts
 * @param $post
 *
 * @since 4.5
 *
 * @return string
 */
function vc_gitem_post_data_get_link_real_target_banda( $link, $atts, $post ) {
	return 'woo_add_to_card' === $link ? '' : $link;
}

function vc_gitem_zone_image_block_link_banda( $image_block, $link, $css_class ) {
	if ( 'woo_add_to_card' === $link ) {
		$css_class .= ' add_to_cart_button vc-gitem-link-ajax product_type_simple';

		return '<a href="{{ banda_product_link }}" class="' . esc_attr( $css_class ) . '" data-product_id="{{ banda_product:id }}"' . ' data-product_sku="{{ banda_product:sku }}" data-product-quantity="1"></a>';
	}

	return $image_block;
}
