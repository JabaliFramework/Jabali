<?php
/**
 * Loads the Jabali environment and template.
 *
 * @package Jabali
 */

if ( !isset($wp_did_header) ) {

	$wp_did_header = true;

	// Load the Jabali library.
	require_once( dirname(__FILE__) . '/load.php' );

	// Set up the Jabali query.
	wp();

	// Load the theme template.
	require_once( ABSPATH . RES . '/template-loader.php' );

}
