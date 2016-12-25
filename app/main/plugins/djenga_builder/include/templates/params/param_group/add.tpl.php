<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$template = vc_include_template( 'params/param_group/inner_content.tpl.php' );

return '<li class="vc_param dj_vc_row vc_param_group-collapsed vc_param_group-add_content-wrapper" style="display:none">' . $template . '</li>';
