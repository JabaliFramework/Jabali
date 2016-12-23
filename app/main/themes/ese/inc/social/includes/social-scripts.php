<?php

/**
 * Load Scripts
 *
 * Enqueues the required scripts.
 *
 * @since 1.0.0
 */
function material_social_load_scripts() {

	$js_dir = MATERIAL_SOCIAL_PLUGIN_URL . 'includes/js/';

	wp_enqueue_script( 'material-social', $js_dir . 'material-social.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'material-rrssb',  MATERIAL_SOCIAL_PLUGIN_URL . 'bower_components/rrssb/js/rrssb.min.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'material_social_load_scripts' );

// register our form css
function material_social_register_css() {
	wp_register_style('material-social-css',  MATERIAL_SOCIAL_PLUGIN_URL . 'includes/css/style.min.css', array(), MATERIAL_SOCIAL_VERSION );
	wp_enqueue_style( 'material-social-css' );
}
add_action('wp_enqueue_scripts', 'material_social_register_css');