<?php

/**
 *Process the password form
 *
 * @access      public
 * @since       1.0
 */
function mdlf_process_password_form() {

    do_action( 'mdlf_before_password_form_errors', $_POST );

    // Retrieve possible errors from request parameters
    if ( isset( $_REQUEST['errors']  ) == 'empty_username' ) {
        mdlf_errors()->add( 'email_empty', __( 'Please enter email address', 'mdlf' ), 'password' );  
    }

    if ( isset( $_REQUEST['errors']  ) == 'invalid_email' || isset( $_REQUEST['errors']  ) == 'invalidcombo' ) {
        mdlf_errors()->add( 'email_invalid', __( 'There are no users registered with this email address.', 'mdlf' ), 'password' );  
    }

    do_action( 'mdlf_password_form_errors', $_POST );

    // retrieve all error messages, if any
    $errors = mdlf_errors()->get_error_messages();
}

add_action('init', 'mdlf_process_password_form');


function do_password_lost() {
    if ( 'POST' == $_SERVER['REQUEST_METHOD'] ) {
        $errors = retrieve_password();
        if ( is_wp_error( $errors ) ) {
            // Errors found
            $redirect_url = home_url( 'password' );
            $redirect_url = add_query_arg( 'errors', join( ',', $errors->get_error_codes() ), $redirect_url );
        } else {
            // Email sent
            $redirect_url = home_url( 'login' );
            $redirect_url = add_query_arg( 'checkemail', 'confirm', $redirect_url );
        }
 
        wp_redirect( $redirect_url );
        exit;
    }
}
add_action( 'login_form_lostpassword', 'do_password_lost' );