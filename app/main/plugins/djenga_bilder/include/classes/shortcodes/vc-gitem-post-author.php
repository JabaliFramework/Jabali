<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

require_once vc_path_dir( 'SHORTCODES_DIR', 'vc-gitem-post-data.php' );

class DJengaShortCode_VC_Gitem_Post_Author extends DJengaShortCode_VC_Gitem_Post_Data {
	protected function getFileName() {
		return 'vc_gitem_post_author';
	}
}
