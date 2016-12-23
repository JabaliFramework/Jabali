<?php
/**
 * Extension API
 *
 * @package Jabali
 * @subpackage Administration
 * @since 2.3.0
 */

if ( ! defined('WP_ADMIN') ) {
	/*
	 * This file is being included from a file other than admin/admin.php, so
	 * some setup was skipped. Make sure the admin message catalog is loaded since
	 * load_default_textdomain() will not have done so in this context.
	 */
	load_textdomain( 'default', WP_LANG_DIR . '/admin-' . get_locale() . '.mo' );
}

/** Jabali REST-API Hooks */
require_once(ABSPATH . 'reslib/rest-api/plugin.php');
require_once(ABSPATH . 'reslib/sz-google/sz-google.php');
require_once(ABSPATH . 'reslib/chat/jabali-chat.php');
require_once(ABSPATH . 'reslib/members/members.php');
require_once(ABSPATH . 'reslib/ultimate-branding/ultimate-branding.php');