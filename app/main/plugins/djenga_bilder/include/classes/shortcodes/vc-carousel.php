<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

require_once vc_path_dir( 'SHORTCODES_DIR', 'vc-posts-grid.php' );

class DJengaShortCode_Vc_Carousel extends DJengaShortCode_VC_Posts_Grid {
	protected static $carousel_index = 1;

	public function __construct( $settings ) {
		parent::__construct( $settings );
		$this->jsCssScripts();
	}

	public function jsCssScripts() {
		wp_register_script( 'vc_transition_bootstrap_js', vc_asset_url( 'lib/vc_carousel/js/transition.min.js' ), array(), DJ_VC_VERSION, true );
		wp_register_script( 'vc_carousel_js', vc_asset_url( 'lib/vc_carousel/js/vc_carousel.min.js' ), array( 'vc_transition_bootstrap_js' ), DJ_VC_VERSION, true );
		wp_register_style( 'vc_carousel_css', vc_asset_url( 'lib/vc_carousel/css/vc_carousel.min.css' ), array(), DJ_VC_VERSION );
	}

	public static function getCarouselIndex() {
		return self::$carousel_index ++ . '-' . time();
	}
}
