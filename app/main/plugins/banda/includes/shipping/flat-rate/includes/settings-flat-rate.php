<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cost_desc = __( 'Enter a cost (excl. tax) or sum, e.g. <code>10.00 * [qty]</code>.', 'banda' ) . '<br/><br/>' . __( 'Use <code>[qty]</code> for the number of items, <br/><code>[cost]</code> for the total cost of items, and <code>[fee percent="10" min_fee="20" max_fee=""]</code> for percentage based fees.', 'banda' );

/**
 * Settings for flat rate shipping.
 */
$settings = array(
	'title' => array(
		'title' 		=> __( 'Method Title', 'banda' ),
		'type' 			=> 'text',
		'description' 	=> __( 'This controls the title which the user sees during checkout.', 'banda' ),
		'default'		=> __( 'Flat Rate', 'banda' ),
		'desc_tip'		=> true
	),
	'tax_status' => array(
		'title' 		=> __( 'Tax Status', 'banda' ),
		'type' 			=> 'select',
		'class'         => 'wc-enhanced-select',
		'default' 		=> 'taxable',
		'options'		=> array(
			'taxable' 	=> __( 'Taxable', 'banda' ),
			'none' 		=> _x( 'None', 'Tax status', 'banda' )
		)
	),
	'cost' => array(
		'title' 		=> __( 'Cost', 'banda' ),
		'type' 			=> 'text',
		'placeholder'	=> '',
		'description'	=> $cost_desc,
		'default'		=> '0',
		'desc_tip'		=> true
	)
);

$shipping_classes = WC()->shipping->get_shipping_classes();

if ( ! empty( $shipping_classes ) ) {
	$settings[ 'class_costs' ] = array(
		'title'			 => __( 'Shipping Class Costs', 'banda' ),
		'type'			 => 'title',
		'default'        => '',
		'description'    => sprintf( __( 'These costs can optionally be added based on the %sproduct shipping class%s.', 'banda' ), '<a href="' . admin_url( 'admin.php?page=wc-settings&tab=shipping&section=classes' ) . '">', '</a>' )
	);
	foreach ( $shipping_classes as $shipping_class ) {
		if ( ! isset( $shipping_class->term_id ) ) {
			continue;
		}
		$settings[ 'class_cost_' . $shipping_class->term_id ] = array(
			'title'       => sprintf( __( '"%s" Shipping Class Cost', 'banda' ), esc_html( $shipping_class->name ) ),
			'type'        => 'text',
			'placeholder' => __( 'N/A', 'banda' ),
			'description' => $cost_desc,
			'default'     => $this->get_option( 'class_cost_' . $shipping_class->slug ), // Before 2.5.0, we used slug here which caused issues with long setting names
			'desc_tip'    => true
		);
	}
	$settings[ 'no_class_cost' ] = array(
		'title'       => __( 'No Shipping Class Cost', 'banda' ),
		'type'        => 'text',
		'placeholder' => __( 'N/A', 'banda' ),
		'description' => $cost_desc,
		'default'     => '',
		'desc_tip'    => true
	);
	$settings[ 'type' ] = array(
		'title' 		=> __( 'Calculation Type', 'banda' ),
		'type' 			=> 'select',
		'class'         => 'wc-enhanced-select',
		'default' 		=> 'class',
		'options' 		=> array(
			'class' 	=> __( 'Per Class: Charge shipping for each shipping class individually', 'banda' ),
			'order' 	=> __( 'Per Order: Charge shipping for the most expensive shipping class', 'banda' ),
		),
	);
}

return $settings;
