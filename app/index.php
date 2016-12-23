<?php
/**
 * Front to the Jabali application. This file doesn't do anything, but loads
 * blog-header.php which does and tells Jabali to load the theme.
 *
 * @package Jabali
 */

/**
 * Tells Jabali to load the Jabali theme and output it.
 *
 * @var bool
 */
define('WP_USE_THEMES', true);

/** Loads the Jabali Environment and Template */
require( dirname( __FILE__ ) . '/blog-header.php' );
