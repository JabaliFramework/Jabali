<?php

// user login form
function mdlf_login_form( $atts, $content = null ) {

	global $post;

	$current_page = mdlf_get_current_url();

	extract( shortcode_atts( array(
		'redirect' 	=> $current_page,
		'class' 	=> 'mdlf_form'
	), $atts ) );

	$output = '';

	global $mdlf_load_css;

	// set this to true so the CSS is loaded
	$mdlf_load_css = true;

	$output = mdlf_login_form_fields( array( 'redirect' => $redirect, 'class' => $class ) );

	return $output;
}
add_shortcode( 'login_form', 'mdlf_login_form' );

// user registration form
function mdlf_registration_form( $atts, $content = null ) {

	global $post;

	$current_page = mdlf_get_current_url();

	extract( shortcode_atts( array(
		'class' 	=> 'mdlf_form'
	), $atts ) );

	$output = '';

	global $mdlf_load_css;

	// set this to true so the CSS is loaded
	$mdlf_load_css = true;

	if ( ! get_option( 'users_can_register' ) ) {
		$output .= '<div class="mdlf_login_data mdl-card__supporting-text">';
        $output .= '<p>' . apply_filters( 'mdlf_no_registration', __( 'Registering new users is currently not allowed.', 'mdlf' ) ) . '</p>';
        $output .= '</div>';
    } else {
        $output = mdlf_registration_form_fields( array( 'class' => $class ) );
    }

	//$output = mdlf_registration_form_fields( array( 'class' => $class ) );

	return $output;
}
add_shortcode( 'registration_form', 'mdlf_registration_form' );

// password reset form
function mdlf_reset_password_form( $attributes, $content = null ) {

	global $mdlf_options, $mdlf_load_css;
	// set this to true so the CSS is loaded
	$mdlf_load_css = true;

	$default_attributes = array( 'show_title' => false );
	$attributes = shortcode_atts( $default_attributes, $attributes );


	$output = mdlf_change_password_form($attributes);
	
	return $output;
	
}
add_shortcode( 'password_form', 'mdlf_reset_password_form' );
