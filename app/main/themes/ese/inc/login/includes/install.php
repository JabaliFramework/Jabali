<?php

function mdlf_install() {
	global $wpdb, $wp_version;

	if( get_page_by_title('Login') == NULL ) {
		$login = wp_insert_post(
			array(
				'post_title'     => __( 'Login', 'mdlf' ),
				'post_content'   => __( '[login_form redirect="/wp-admin"]', 'mdlf' ),
				'post_status'    => 'publish',
				'post_author'    => 1,
				'post_type'      => 'page',
				'comment_status' => 'closed',
				'page_template'  => 'page-login.php'
			)
		);
		update_post_meta($login, "_wp_page_template", "page-login.php");
	}

	if( get_page_by_title('Register') == NULL ) {
		$login = wp_insert_post(
			array(
				'post_title'     => __( 'Register', 'mdlf' ),
				'post_content'   => __( '[registration_form]', 'mdlf' ),
				'post_status'    => 'publish',
				'post_author'    => 1,
				'post_type'      => 'page',
				'comment_status' => 'closed',
				'page_template'  => 'page-login.php'
			)
		);
		update_post_meta($login, "_wp_page_template", "page-login.php");
	}

	if( get_page_by_title('Password') == NULL ) {
		$login = wp_insert_post(
			array(
				'post_title'     => __( 'Password', 'mdlf' ),
				'post_content'   => __( '[password_form]', 'mdlf' ),
				'post_status'    => 'publish',
				'post_author'    => 1,
				'post_type'      => 'page',
				'comment_status' => 'closed',
				'page_template'  => 'page-login.php'
			)
		);
		update_post_meta($login, "_wp_page_template", "page-login.php");
	}
}
register_activation_hook( MDLF_PLUGIN_FILE, 'mdlf_install' );
