<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Djenga Builder filter functions
 *
 * @package DJengaVisualComposer
 *
 * http://kb.mtaandao.co.ke/index.php?title=Visual_Composer_Filters
 */

/**
 * This filter should be applied to all content elements titles
 *
 * $params['extraclass'] Extra class name will be added
 *
 *
 * To override content element title default html markup, paste this code in your theme's functions.php file
 * vc_filter: dj_widget_title
 * add_filter('dj_widget_title', 'override_widget_title', 10, 2);
 * function override_widget_title($output = '', $params = array('')) {
 *    $extraclass = (isset($params['extraclass'])) ? " ".$params['extraclass'] : "";
 *    return '<h1 class="entry-title'.$extraclass.'">'.$params['title'].'</h1>';
 * }
 *
 * @param array $params
 *
 * @return mixed|string|void
 */
function dj_widget_title( $params = array( 'title' => '' ) ) {
	if ( '' === $params['title'] ) {
		return '';
	}

	$extraclass = ( isset( $params['extraclass'] ) ) ? ' ' . $params['extraclass'] : '';
	$output = '<h2 class="dj_heading' . $extraclass . '">' . $params['title'] . '</h2>';

	return apply_filters( 'dj_widget_title', $output, $params );
}

/*

Available filters in default.php
dj_toggle_heading

Available filters in buttons.php
dj_cta_text

Available filters in teaser_grid.php
vc_teaser_grid_title
vc_teaser_grid_thumbnail
vc_teaser_grid_content
vc_teaser_grid_carousel_arrows

*/
