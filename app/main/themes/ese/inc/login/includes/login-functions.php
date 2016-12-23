<?php
/**
 * Log a user in
 *
 * @access      public
 * @since       1.0
 */
function mdlf_login_user_in( $user_id, $user_login, $remember = false ) {
	$user = get_userdata( $user_id );
	if( ! $user )
		return;
	wp_set_auth_cookie( $user_id, $remember );
	wp_set_current_user( $user_id, $user_login );
	do_action( 'wp_login', $user_login, $user );
}


/**
 *Process the login form
 *
 * @access      public
 * @since       1.0
 */
function mdlf_process_login_form() {

	if( ! isset( $_POST['mdlf_action'] ) || 'login' != $_POST['mdlf_action'] ) {
		return;
	}

	if( ! isset( $_POST['mdlf_login_nonce'] ) || ! wp_verify_nonce( $_POST['mdlf_login_nonce'], 'mdlf-login-nonce' ) ) {
		return;
	}

	// this returns the user ID and other info from the user name
	$user = get_user_by( 'login', $_POST['mdlf_user_login'] );

	do_action( 'mdlf_before_form_errors', $_POST );

	if( !$user ) {
		// if the user name doesn't exist
		mdlf_errors()->add( 'empty_username', __( 'Invalid username', 'mdlf' ), 'login' );
	}

	if( !isset( $_POST['mdlf_user_pass'] ) || $_POST['mdlf_user_pass'] == '') {
		// if no password was entered
		mdlf_errors()->add( 'empty_password', __( 'Please enter a password', 'mdlf' ), 'login' );
	}

	if( $user ) {
		// check the user's login with their password
		if( !wp_check_password( $_POST['mdlf_user_pass'], $user->user_pass, $user->ID ) ) {
			// if the password is incorrect for the specified user
			mdlf_errors()->add( 'empty_password', __( 'Incorrect password', 'mdlf' ), 'login' );
		}
	}

	if( function_exists( 'is_limit_login_ok' ) && ! is_limit_login_ok() ) {

		mdlf_errors()->add( 'limit_login_failed', limit_login_error_msg(), 'login' );

	}

	do_action( 'mdlf_login_form_errors', $_POST );

	// retrieve all error messages
	$errors = mdlf_errors()->get_error_messages();

	// only log the user in if there are no errors
	if( empty( $errors ) ) {

		$remember = isset( $_POST['mdlf_user_remember'] );

		mdlf_login_user_in( $user->ID, $_POST['mdlf_user_login'], $remember );

		// redirect the user back to the page they were previously on
		wp_redirect( $_POST['mdlf_redirect'] ); exit;

	} else {

		if( function_exists( 'limit_login_failed' ) ) {
			limit_login_failed( $_POST['mdlf_user_login'] );
		}

	}
}
add_action('init', 'mdlf_process_login_form');