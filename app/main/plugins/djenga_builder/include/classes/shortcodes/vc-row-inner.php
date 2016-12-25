<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

require_once vc_path_dir( 'SHORTCODES_DIR', 'vc-row.php' );

class DJengaShortCode_VC_Row_Inner extends DJengaShortCode_VC_Row {

	public function template( $content = '' ) {
		return $this->contentAdmin( $this->atts );
	}
}
