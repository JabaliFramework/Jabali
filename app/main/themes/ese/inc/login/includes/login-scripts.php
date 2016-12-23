<?php

// register our form css
function mdlf_register_css() {
	wp_register_style('mdlf-form-css',  MDLF_PLUGIN_URL . 'includes/css/style.min.css', array(), MDLF_PLUGIN_VERSION );
}
add_action('init', 'mdlf_register_css');

// load our form css
function mdlf_print_css() {
	global $mdlf_load_css, $mdlf_options;

	// this variable is set to TRUE if the short code is used on a page/post
	if ( ! $mdlf_load_css || ( isset( $mdlf_options['disable_css'] ) && $mdlf_options['disable_css'] ) )
		return; // this means that neither short code is present, so we get out of here

	wp_print_styles( 'mdlf-form-css' );
}
add_action( 'wp_footer', 'mdlf_print_css' );