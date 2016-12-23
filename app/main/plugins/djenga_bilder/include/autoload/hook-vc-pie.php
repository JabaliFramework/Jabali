<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
if ( 'vc_edit_form' === vc_post_param( 'action' ) ) {
	VcShortcodeAutoloader::getInstance()->includeClass( 'DJengaShortCode_Vc_Pie' );

	add_filter( 'vc_edit_form_fields_attributes_vc_pie', array(
		'DJengaShortCode_VC_Pie',
		'convertOldColorsToNew',
	) );
}
