<?php
/**
 * Registration Functions
 *
 * Processes the registration form
 *
 * @subpackage  Login Functions
 * @since       1.5
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


/**
 * Register a new user
 *
 * @access      public
 * @since       1.0
 */
function mdlf_process_registration() {

  	if ( isset( $_POST["mdlf_register_nonce"] ) && wp_verify_nonce( $_POST['mdlf_register_nonce'], 'mdlf-register-nonce' ) ) {

		global $mdlf_options, $user_ID;

		/***********************
		* validate the form
		***********************/

		do_action( 'mdlf_before_form_errors', $_POST );

		$user_data = mdlf_validate_user_data();

		do_action( 'mdlf_form_errors', $_POST );

		// retrieve all error messages, if any
		$errors = mdlf_errors()->get_error_messages();

		// only create the user if there are no errors
		if( empty( $errors ) ) {

			if( $user_data['need_new'] ) {


				$user_data['id'] = wp_insert_user( array(
						'user_login'		=> $user_data['login'],
						'user_pass'	 		=> $user_data['password'],
						'user_email'		=> $user_data['email'],
						'user_registered'	=> date( 'Y-m-d H:i:s' )
					)
				);
			}
			if( $user_data['id'] ) {

				// Set the user's role
				
				$user = new WP_User( $user_data['id'] );

				wp_redirect( mdlf_get_return_url( $user_data['id'] ) ); exit;

			} // end if new user id

		} // end if no errors

	} // end nonce check
}
add_action( 'init', 'mdlf_process_registration', 100 );


/**
 * Validate and setup the user data for registration
 *
 * @access      public
 * @since       1.5
 * @return      array
 */
function mdlf_validate_user_data() {

	$user = array();

	if( ! is_user_logged_in() ) {
		$user['id']		          = 0;
		$user['login']		      = sanitize_text_field( $_POST['mdlf_user_login'] );
		$user['email']		      = sanitize_text_field( $_POST['mdlf_user_email'] );
		$user['password']		  = sanitize_text_field( $_POST['mdlf_user_pass'] );
		$user['password_confirm'] = sanitize_text_field( $_POST['mdlf_user_pass_confirm'] );
		$user['need_new']         = true;
	} else {
		$userdata 		  = get_userdata( get_current_user_id() );
		$user['id']       = $userdata->ID;
		$user['login'] 	  = $userdata->user_login;
		$user['email'] 	  = $userdata->user_email;
		$user['need_new'] = false;
	}


	if( $user['need_new'] ) {
		if( username_exists( $user['login'] ) ) {
			// Username already registered
			mdlf_errors()->add( 'username_unavailable', __( 'Username already taken', 'mdlf' ), 'register' );
		}
		if( ! validate_username( $user['login'] ) ) {
			// invalid username
			mdlf_errors()->add( 'username_invalid', __( 'Invalid username', 'mdlf' ), 'register' );
		}
		if( empty( $user['login'] ) ) {
			// empty username
			mdlf_errors()->add( 'username_empty', __( 'Please enter a username', 'mdlf' ), 'register' );
		}
		if( ! is_email( $user['email'] ) ) {
			//invalid email
			mdlf_errors()->add( 'email_invalid', __( 'Invalid email', 'mdlf' ), 'register' );
		}
		if( email_exists( $user['email'] ) ) {
			//Email address already registered
			mdlf_errors()->add( 'email_used', __( 'Email already registered', 'mdlf' ), 'register' );
		}
		if( empty( $user['password'] ) ) {
			// passwords do not match
			mdlf_errors()->add( 'password_empty', __( 'Please enter a password', 'mdlf' ), 'register' );
		}
		if( $user['password'] !== $user['password_confirm'] ) {
			// passwords do not match
			mdlf_errors()->add( 'password_mismatch', __( 'Passwords do not match', 'mdlf' ), 'register' );
		}
	}

	return apply_filters( 'mdlf_user_registration_data', $user );
}


/**
 * Get the registration success/return URL
 *
 * @access      public
 * @since       1.5
 * @param       $user_id int The user ID we have just registered
 * @return      array
 */
function mdlf_get_return_url( $user_id = 0 ) {

	global $mdlf_options;

	wp_set_current_user($user_id);
    wp_set_auth_cookie($user_id);

	if( isset( $mdlf_options['redirect'] ) ) {
		$redirect = get_permalink( $mdlf_options['redirect'] );
	} else {
		$redirect = home_url();
	}
	return apply_filters( 'mdlf_return_url', $redirect, $user_id );
}



/**
 * Determine if the current page is a registration page
 *
 * @access      public
 * @since       2.0
 * @return      bool
 */
function mdlf_is_registration_page() {

	global $mdlf_options, $post;

	$ret = false;

	if ( isset( $mdlf_options['registration_page'] ) && is_page( $mdlf_options['registration_page'] ) ) {
		$ret = true;
	} elseif ( has_shortcode( $post->post_content, 'register_form' ) ) {
		$ret = true;
	}

	return apply_filters( 'mdlf_is_registration_page', $ret );
}

