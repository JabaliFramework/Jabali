<?php
// displays error messages from form submissions
function mdlf_show_error_messages( $error_id = '' ) {
	if( $codes = mdlf_errors()->get_error_codes() ) {
		do_action( 'mdlf_errors_before' );
		echo '<div class="mdlf_message error">';
		    // Loop error codes and display errors
		   foreach( $codes as $code ) {
		   		if( mdlf_errors()->get_error_data( $code ) == $error_id ) {

			        $message = mdlf_errors()->get_error_message($code);

			        do_action( 'mdlf_error_before' );
			        echo '<p class="mdlf_error ' . $code . '"><span>' . $message . '</span></p>';
			        do_action( 'mdlf_error_after' );
		    	}
		    }
		echo '</div>';
		do_action( 'mdlf_errors_after' );
	}
}

// used for tracking error messages
function mdlf_errors(){
    static $wp_error; // Will hold global variable safely
    return isset( $wp_error ) ? $wp_error : ( $wp_error = new WP_Error( null, null, null ) );
}