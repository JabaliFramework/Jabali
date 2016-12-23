<?php

/*
* Hijack the default WP login URL and redirect users to custom login page
*/
function mdlf_hijack_login_url( $login_url ) {
	global $mdlf_options;
	//if( isset( $mdlf_options['hijack_login_url'] ) && isset( $mdlf_options['login_redirect'] ) ) {
	//	$login_url = get_permalink( $mdlf_options['login_redirect'] );
	//}
	$login_url = get_permalink( get_page_by_title( 'Login' ) );
	return $login_url;
}
add_filter( 'login_url', 'mdlf_hijack_login_url' );

/*
* Redirects users to the custom login page when access wp-login.php
*/
function mdlf_redirect_from_wp_login() {
	global $mdlf_options;

	//if( isset( $mdlf_options['hijack_login_url'] ) && isset( $mdlf_options['login_redirect'] ) ) {
	//	wp_redirect( get_permalink( $mdlf_options['login_redirect'] ) ); exit;
	//}
	wp_redirect( get_permalink( get_page_by_title( 'Login' ) ) ); exit;
}
add_action( 'login_form_login', 'mdlf_redirect_from_wp_login' );


/**
 * Redirects visitors to `wp-login.php?action=register` to 
 * `site.com/register`
 */
function mdlf_redirect_from_wp_register() {

	    wp_redirect( get_permalink( get_page_by_title( 'Register' ) ) );
	    exit(); // always call `exit()` after `wp_redirect`
}
add_action( 'login_form_register', 'mdlf_redirect_from_wp_register' );


/**
 * Redirects the user to the custom "Forgot your password?" page instead of
 * wp-login.php?action=lostpassword.
 */
function mdlf_redirect_lostpassword() {
    if ( 'GET' == $_SERVER['REQUEST_METHOD'] ) {
        // if ( is_user_logged_in() ) {
        //      wp_redirect( admin_url() );
        //     exit();
        // }
 
        wp_redirect( get_permalink( get_page_by_title( 'Password' ) ) );
        exit();
    }
}
add_action( 'login_form_lostpassword', 'mdlf_redirect_lostpassword' );
