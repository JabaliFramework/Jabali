<?php

/**
 * Plugin directory URL
 **/
if(!function_exists('set_swt_url')) {

	function set_swt_url( $base ) {
		global $swt_url;

		if( defined( 'WPMU_PLUGIN_URL' ) && defined( 'WPMU_PLUGIN_DIR' ) && file_exists( WPMU_PLUGIN_DIR . '/' . basename( $base ) ) ) {
			$swt_url = trailingslashit( WPMU_PLUGIN_URL );
		} elseif( defined( 'res_url()' ) && file_exists( RES . '/site-wide-text-change/' . basename( $base ) ) ) {
			$swt_url = trailingslashit( res_url() . '/site-wide-text-change' );
		} else {
			$swt_url = trailingslashit( res_url() . '/site-wide-text-change' );
		}
	}

}
/**
 * Plugin directory
 **/
if(!function_exists('set_swt_dir')) {

	function set_swt_dir( $base ) {
		global $swt_dir;

		if( defined( 'WPMU_PLUGIN_DIR' ) && file_exists( WPMU_PLUGIN_DIR . '/' . basename( $base ) ) ) {
			$swt_dir = trailingslashit( WPMU_PLUGIN_DIR );
		} elseif( defined( 'RES' ) && file_exists( RES . '/site-wide-text-change/' . basename( $base ) ) ) {
			$swt_dir = trailingslashit( RES . '/site-wide-text-change' );
		} else {
			$swt_dir = trailingslashit( RES . '/site-wide-text-change' );
		}
	}

}

/**
 * URL to a file/dir in the plugin directory
 **/
if(!function_exists('swt_url')) {

	function swt_url( $extended = '' ) {
		global $swt_url;
		return $swt_url . $extended;
	}

}

/**
 * Path to a file/dir in the plugin directory
 **/
if(!function_exists('swt_dir')) {

	function swt_dir( $extended = '' ) {
		global $swt_dir;
		return $swt_dir . $extended;
	}

}