<?php
/**
 * Auth header
 *
 * This template can be overridden by copying it to yourtheme/banda/auth/header.php.
 *
 * HOWEVER, on occasion Banda will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://mtaandao.co.ke/docs/banda/document/template-structure/
 * @author  Jabali
 * @package Banda/Templates/Auth
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta name="viewport" content="width=device-width" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex, nofollow" />
	<title><?php _e( 'Application Authentication Request', 'banda' ); ?></title>
	<?php wp_admin_css( 'install', true ); ?>
	<link rel="stylesheet" href="<?php echo esc_url( str_replace( array( 'http:', 'https:' ), '', WC()->plugin_url() ) . '/assets/css/auth.css' ); ?>" type="text/css" />
</head>
<body class="wc-auth wp-core-ui">
	<h1 id="wc-logo"><img src="<?php echo WC()->plugin_url(); ?>/assets/images/banda_logo.png" alt="Banda" /></h1>
	<div class="wc-auth-content">
