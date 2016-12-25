<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

require_once vc_path_dir( 'SHORTCODES_DIR', 'vc-tabs.php' );

define( 'SLIDE_TITLE', __( 'Slide', 'js_composer' ) );

class DJengaShortCode_VC_Tour extends DJengaShortCode_VC_Tabs {
	protected $predefined_atts = array(
		'tab_id' => SLIDE_TITLE,
		'title' => '',
	);

	protected function getFileName() {
		return 'vc_tabs';
	}

	public function getTabTemplate() {
		return '<div class="dj_template">' . do_shortcode( '[vc_tab title="' . SLIDE_TITLE . '" tab_id=""][/vc_tab]' ) . '</div>';
	}
}