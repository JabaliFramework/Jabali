<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package Ese
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function ese_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'ese_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function ese_jetpack_setup
add_action( 'after_setup_theme', 'ese_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function ese_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function ese_infinite_scroll_render
