<?php
/**
 * Enqueue scripts and styles.
 */
function ese_scripts() {
	$primary = get_theme_mod( 'primary_color', 'indigo' );
	$secondary = get_theme_mod( 'secondary_color', 'pink' );

	wp_enqueue_style( 'ese-mdl-css', '//storage.googleapis.com/code.getmdl.io/1.1.3/material.'.$primary.'-'.$secondary.'.min.css' );

	wp_enqueue_style( 'ese-mdl-icons', '//fonts.googleapis.com/icon?family=Material+Icons' );

	wp_enqueue_style( 'ese-mdl-roboto', '//fonts.googleapis.com/css?family=Roboto:300,400,500,700' );

	wp_enqueue_style( 'ese-style', get_template_directory_uri() . '/style.min.css' );

	wp_enqueue_script( 'ese-mdl-js', '//storage.googleapis.com/code.getmdl.io/1.1.3/material.min.js', array(), '1.1.1', true );

	wp_enqueue_script( 'ese-ese-js', get_template_directory_uri() . '/js/dist/scripts.min.js', array('jquery'), '1.1.9', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ese_scripts' );


/**
 * Enqueue customizer script
 */
function ese_customizer_live_preview() {
	wp_enqueue_script( 'ese-themecustomizer',	get_template_directory_uri() . '/js/customizer.js', array( 'jquery','customize-preview' ), '', true );
}
add_action( 'customize_preview_init', 'ese_customizer_live_preview' );
