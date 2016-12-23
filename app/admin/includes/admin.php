<?php
/**
 * Core Administration API
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

/** Jabali Extension Hooks */
include(ABSPATH . 'admin/includes/admin-extend.php');

/** Jabali Administration Hooks */
require_once(ABSPATH . 'admin/includes/slate.php');

/** Jabali Administration Hooks */
require_once(ABSPATH . 'admin/includes/admin-filters.php');

/** Jabali Bookmark Administration API */
require_once(ABSPATH . 'admin/includes/bookmark.php');

/** Jabali Comment Administration API */
require_once(ABSPATH . 'admin/includes/comment.php');

/** Jabali Administration File API */
require_once(ABSPATH . 'admin/includes/file.php');

/** Jabali Image Administration API */
require_once(ABSPATH . 'admin/includes/image.php');

/** Jabali Media Administration API */
require_once(ABSPATH . 'admin/includes/media.php');

/** Jabali Import Administration API */
require_once(ABSPATH . 'admin/includes/import.php');

/** Jabali Misc Administration API */
require_once(ABSPATH . 'admin/includes/misc.php');

/** Jabali Options Administration API */
require_once(ABSPATH . 'admin/includes/options.php');

/** Jabali Plugin Administration API */
require_once(ABSPATH . 'admin/includes/plugin.php');

/** Jabali Post Administration API */
require_once(ABSPATH . 'admin/includes/post.php');

/** Jabali Administration Screen API */
require_once(ABSPATH . 'admin/includes/class-wp-screen.php');
require_once(ABSPATH . 'admin/includes/screen.php');

/** Jabali Taxonomy Administration API */
require_once(ABSPATH . 'admin/includes/taxonomy.php');

/** Jabali Template Administration API */
require_once(ABSPATH . 'admin/includes/template.php');

/** Jabali List Table Administration API and base class */
require_once(ABSPATH . 'admin/includes/class-wp-list-table.php');
require_once(ABSPATH . 'admin/includes/class-wp-list-table-compat.php');
require_once(ABSPATH . 'admin/includes/list-table.php');

/** Jabali Theme Administration API */
require_once(ABSPATH . 'admin/includes/theme.php');

/** Jabali User Administration API */
require_once(ABSPATH . 'admin/includes/user.php');

/** Jabali Site Icon API */
require_once(ABSPATH . 'admin/includes/class-wp-site-icon.php');

/** Jabali Update Administration API */
require_once(ABSPATH . 'admin/includes/update.php');

/** Jabali Deprecated Administration API */
require_once(ABSPATH . 'admin/includes/deprecated.php');

/** Jabali Multisite support API */
if ( is_multisite() ) {
	require_once(ABSPATH . 'admin/includes/ms-admin-filters.php');
	require_once(ABSPATH . 'admin/includes/ms.php');
	require_once(ABSPATH . 'admin/includes/ms-deprecated.php');
}
