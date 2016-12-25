<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * @param $settings
 * @param $value
 *
 * @since 4.5
 * @return string
 */
function vc_el_id_form_field( $settings, $value ) {

	return apply_filters( 'vc_el_id_render_filter', '<div class="vc-param-el_id">'
		. '<input name="' . $settings['param_name']
		. '" class="dj_vc_param_value dj-textinput '
		. $settings['param_name'] . ' ' . $settings['type'] . '_field" type="text" value="'
		. $value . '" />'
	. '</div>' );
}
