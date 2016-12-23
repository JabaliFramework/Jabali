<?php

function mdlf_get_current_url() {
	global $post;

	if ( is_singular() ) :

		$current_url = get_permalink( $post->ID );

	else :

		$current_url = 'http';
		if ( isset( $_SERVER["HTTPS"] ) && $_SERVER["HTTPS"] == "on" ) $current_url .= "s";

		$current_url .= "://";

		if ( $_SERVER["SERVER_PORT"] != "80" ) {
			$current_url .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
		} else {
			$current_url .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
		}

	endif;

	return apply_filters( 'mdlf_current_url', $current_url );
}