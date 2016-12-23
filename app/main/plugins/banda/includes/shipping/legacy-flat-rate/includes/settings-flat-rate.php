<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cost_desc = __( 'Enter a cost (excl. tax) or sum, e.g. <code>10.00 * [qty]</code>.', 'banda' ) . '<br/>' . __( 'Supports the following placeholders: <code>[qty]</code> = number of items, <code>[cost]</code> = cost of items, <code>[fee percent="10" min_fee="20"]</code> = Percentage based fee.', 'banda' );

/**
 * Settings for flat rate shipping.
 */
$settings = array(
	'enabled' => array(
		'title' 		=> __( 'Enable/Disable', 'banda' ),
		'type' 			=> 'checkbox',
		'label' 		=> __( 'Once disabled, this legacy method will no longer be available.', 'banda' ),
		'default' 		=> 'no',
	),
	'title' => array(
		'title' 		=> __( 'Method Title', 'banda' ),
		'type' 			=> 'text',
		'description' 	=> __( 'This controls the title which the user sees during checkout.', 'banda' ),
		'default'		=> __( 'Flat Rate', 'banda' ),
		'desc_tip'		=> true
	),
	'availability' => array(
		'title' 		=> __( 'Availability', 'banda' ),
		'type' 			=> 'select',
		'default' 		=> 'all',
		'class'			=> 'availability wc-enhanced-select',
		'options'		=> array(
			'all' 		=> __( 'All allowed countries', 'banda' ),
			'specific' 	=> __( 'Specific Countries', 'banda' ),
		),
	),
	'countries' => array(
		'title' 		=> __( 'Specific Countries', 'banda' ),
		'type' 			=> 'multiselect',
		'class'			=> 'wc-enhanced-select',
		'css'			=> 'width: 450px;',
		'default' 		=> '',
		'options'		=> WC()->countries->get_shipping_countries(),
		'custom_attributes' => array(
			'data-placeholder' => __( 'Select some countries', 'banda' )
		)
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
		'default'		=> '',
		'desc_tip'		=> true
	)
);

$shipping_classes = WC()->shipping->get_shipping_classes();

if ( ! empty( $shipping_classes ) ) {
	$settings[ 'class_costs' ] = array(
		'title'			=> __( 'Shipping Class Costs', 'banda' ),
		'type'			=> 'title',
		'default'       => '',
		'description'   => sprintf( __( 'These costs can optionally be added based on the %sproduct shipping class%s.', 'banda' ), '<a href="' . admin_url( 'admin.php?page=wc-settings&tab=shipping&section=classes' ) . '">', '</a>' )
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

if ( apply_filters( 'banda_enable_deprecated_additional_flat_rates', $this->get_option( 'options', false ) ) ) {
	$settings[ 'additional_rates' ] = array(
		'title'			 => __( 'Additional Rates', 'banda' ),
		'type'			 => 'title',
		'default'        => '',
		'description'    => __( 'These rates are extra shipping options with additional costs (based on the flat rate).', 'banda' ),
	);
	$settings['options'] = array(
		'title' 		=> __( 'Additional Rates', 'banda' ),
		'type' 			=> 'textarea',
		'description'	=> __( 'One per line: Option Name | Additional Cost [+- Percents] | Per Cost Type (order, class, or item) Example: <code>Priority Mail | 6.95 [+ 0.2%] | order</code>.', 'banda' ),
		'default'		=> '',
		'desc_tip'		=> true,
		'placeholder'	=> __( 'Option Name | Additional Cost [+- Percents%] | Per Cost Type (order, class, or item)', 'banda' )
	);
}

return $settings;