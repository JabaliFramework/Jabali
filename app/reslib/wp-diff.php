<?php
/**
 * Jabali Diff bastard child of old MediaWiki Diff Formatter.
 *
 * Basically all that remains is the table structure and some method names.
 *
 * @package Jabali
 * @subpackage Diff
 */

if ( ! class_exists( 'Text_Diff', false ) ) {
	/** Text_Diff class */
	require( ABSPATH . RES . '/Text/Diff.php' );
	/** Text_Diff_Renderer class */
	require( ABSPATH . RES . '/Text/Diff/Renderer.php' );
	/** Text_Diff_Renderer_inline class */
	require( ABSPATH . RES . '/Text/Diff/Renderer/inline.php' );
}

require( ABSPATH . RES . '/class-wp-text-diff-renderer-table.php' );
require( ABSPATH . RES . '/class-wp-text-diff-renderer-inline.php' );