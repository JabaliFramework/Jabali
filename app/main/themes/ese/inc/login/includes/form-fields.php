<?php
// login form fields
function mdlf_login_form_fields( $args = array() ) {

	global $mdlf_login_form_args; 

	// parse the arguments passed
	$defaults = array (
 		'redirect' => mdlf_get_current_url(),
 		'lost_password_sent' => isset( $_REQUEST['checkemail'] ) && $_REQUEST['checkemail'] == 'confirm',
	);
	$mdlf_login_form_args = wp_parse_args( $args, $defaults );

	ob_start();

	do_action( 'mdlf_before_login_form' );

	mdlf_get_template_part( 'login' );

	do_action( 'mdlf_after_login_form' );

	return ob_get_clean();
}


// registration form fields
function mdlf_registration_form_fields( $args = array() ) {

	ob_start();

	do_action( 'mdlf_before_registration_form' );

	mdlf_get_template_part( 'registration' );

	do_action( 'mdlf_after_registration_form' );

	return ob_get_clean();
}

// password form fields
function mdlf_change_password_form( $args = array() ) {

	global $mdlf_password_form_args;

	// parse the arguments passed
	$defaults = array (
 		'redirect' => mdlf_get_current_url(),
	);
	$mdlf_password_form_args = wp_parse_args( $args, $defaults );

	ob_start();

	do_action( 'mdlf_before_password_form' );

	mdlf_get_template_part( 'password' );

	do_action( 'mdlf_after_password_form' );

	return ob_get_clean();
}