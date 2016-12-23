<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class DJengaShortCode_Vc_Line_Chart extends DJengaShortCode {
	public function __construct( $settings ) {
		parent::__construct( $settings );
		$this->jsScripts();
	}

	public function jsScripts() {
		wp_register_script( 'waypoints', vc_asset_url( 'lib/waypoints/waypoints.min.js' ), array( 'jquery' ), DJ_VC_VERSION, true );
		wp_register_script( 'ChartJS', vc_asset_url( 'lib/bower/chartjs/Chart.min.js' ), array(), DJ_VC_VERSION, true );
		wp_register_script( 'vc_line_chart', vc_asset_url( 'lib/vc_line_chart/vc_line_chart.min.js' ), array(
			'jquery',
			'waypoints',
			'ChartJS',
		), DJ_VC_VERSION, true );
	}
}
