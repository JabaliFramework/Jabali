<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Djenga Builder shortcodes
 *
 * @package DJengaVisualComposer
 *
 */
class DJengaShortCode_VC_Button extends DJengaShortCode {
	protected function outputTitle( $title ) {
		$icon = $this->settings( 'icon' );

		return '<h4 class="dj_element_title"><span class="vc_general vc_element-icon' . ( ! empty( $icon ) ? ' ' . $icon : '' ) . '"></span></h4>';
	}
}
