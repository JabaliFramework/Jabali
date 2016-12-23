<?php
/**
 * Debug/Status page
 *
 * @author      Jabali
 * @category    Admin
 * @package     Banda/Admin/System Status
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WC_Admin_Status Class.
 */
class WC_Admin_Status {

	/**
	 * Handles output of the reports page in admin.
	 */
	public static function output() {
		include_once( 'views/html-admin-page-status.php' );
	}

	/**
	 * Handles output of report.
	 */
	public static function status_report() {
		include_once( 'views/html-admin-page-status-report.php' );
	}

	/**
	 * Handles output of tools.
	 */
	public static function status_tools() {
		global $wpdb;

		$tools = self::get_tools();

		if ( ! empty( $_GET['action'] ) && ! empty( $_REQUEST['_wpnonce'] ) && wp_verify_nonce( $_REQUEST['_wpnonce'], 'debug_action' ) ) {

			switch ( $_GET['action'] ) {
				case 'clear_transients' :
					wc_delete_product_transients();
					wc_delete_shop_order_transients();
					WC_Cache_Helper::get_transient_version( 'shipping', true );

					echo '<div class="updated inline"><p>' . __( 'Product Transients Cleared', 'banda' ) . '</p></div>';
				break;
				case 'clear_expired_transients' :

					/*
					 * Deletes all expired transients. The multi-table delete syntax is used.
					 * to delete the transient record from table a, and the corresponding.
					 * transient_timeout record from table b.
					 *
					 * Based on code inside core's upgrade_network() function.
					 */
					$sql = "DELETE a, b FROM $wpdb->options a, $wpdb->options b
						WHERE a.option_name LIKE %s
						AND a.option_name NOT LIKE %s
						AND b.option_name = CONCAT( '_transient_timeout_', SUBSTRING( a.option_name, 12 ) )
						AND b.option_value < %d";
					$rows = $wpdb->query( $wpdb->prepare( $sql, $wpdb->esc_like( '_transient_' ) . '%', $wpdb->esc_like( '_transient_timeout_' ) . '%', time() ) );

					$sql = "DELETE a, b FROM $wpdb->options a, $wpdb->options b
						WHERE a.option_name LIKE %s
						AND a.option_name NOT LIKE %s
						AND b.option_name = CONCAT( '_site_transient_timeout_', SUBSTRING( a.option_name, 17 ) )
						AND b.option_value < %d";
					$rows2 = $wpdb->query( $wpdb->prepare( $sql, $wpdb->esc_like( '_site_transient_' ) . '%', $wpdb->esc_like( '_site_transient_timeout_' ) . '%', time() ) );

					echo '<div class="updated inline"><p>' . sprintf( __( '%d Transients Rows Cleared', 'banda' ), $rows + $rows2 ) . '</p></div>';
				break;
				case 'reset_roles' :
					// Remove then re-add caps and roles
					WC_Install::remove_roles();
					WC_Install::create_roles();

					echo '<div class="updated inline"><p>' . __( 'Roles successfully reset', 'banda' ) . '</p></div>';
				break;
				case 'recount_terms' :

					$product_cats = get_terms( 'product_cat', array( 'hide_empty' => false, 'fields' => 'id=>parent' ) );

					_wc_term_recount( $product_cats, get_taxonomy( 'product_cat' ), true, false );

					$product_tags = get_terms( 'product_tag', array( 'hide_empty' => false, 'fields' => 'id=>parent' ) );

					_wc_term_recount( $product_tags, get_taxonomy( 'product_tag' ), true, false );

					echo '<div class="updated inline"><p>' . __( 'Terms successfully recounted', 'banda' ) . '</p></div>';
				break;
				case 'clear_sessions' :

					$wpdb->query( "TRUNCATE {$wpdb->prefix}banda_sessions" );

					wp_cache_flush();

					echo '<div class="updated inline"><p>' . __( 'Sessions successfully cleared', 'banda' ) . '</p></div>';
				break;
				case 'install_pages' :
					WC_Install::create_pages();
					echo '<div class="updated inline"><p>' . __( 'All missing Banda pages was installed successfully.', 'banda' ) . '</p></div>';
				break;
				case 'delete_taxes' :

					$wpdb->query( "TRUNCATE TABLE {$wpdb->prefix}banda_tax_rates;" );
					$wpdb->query( "TRUNCATE TABLE {$wpdb->prefix}banda_tax_rate_locations;" );
					WC_Cache_Helper::incr_cache_prefix( 'taxes' );

					echo '<div class="updated inline"><p>' . __( 'Tax rates successfully deleted', 'banda' ) . '</p></div>';
				break;
				case 'reset_tracking' :
					delete_option( 'banda_allow_tracking' );
					WC_Admin_Notices::add_notice( 'tracking' );

					echo '<div class="updated inline"><p>' . __( 'Usage tracking settings successfully reset.', 'banda' ) . '</p></div>';
				break;
				default :
					$action = esc_attr( $_GET['action'] );
					if ( isset( $tools[ $action ]['callback'] ) ) {
						$callback = $tools[ $action ]['callback'];
						$return = call_user_func( $callback );
						if ( $return === false ) {
							$callback_string = is_array( $callback ) ? get_class( $callback[0] ) . '::' . $callback[1] : $callback;
							echo '<div class="error inline"><p>' . sprintf( __( 'There was an error calling %s', 'banda' ), $callback_string ) . '</p></div>';
						}
					}
				break;
			}
		}

		// Display message if settings settings have been saved
		if ( isset( $_REQUEST['settings-updated'] ) ) {
			echo '<div class="updated inline"><p>' . __( 'Your changes have been saved.', 'banda' ) . '</p></div>';
		}

		include_once( 'views/html-admin-page-status-tools.php' );
	}

	/**
	 * Get tools.
	 * @return array of tools
	 */
	public static function get_tools() {
		$tools = array(
			'clear_transients' => array(
				'name'    => __( 'WC Transients', 'banda' ),
				'button'  => __( 'Clear transients', 'banda' ),
				'desc'    => __( 'This tool will clear the product/shop transients cache.', 'banda' ),
			),
			'clear_expired_transients' => array(
				'name'    => __( 'Expired Transients', 'banda' ),
				'button'  => __( 'Clear expired transients', 'banda' ),
				'desc'    => __( 'This tool will clear ALL expired transients from Jabali.', 'banda' ),
			),
			'recount_terms' => array(
				'name'    => __( 'Term counts', 'banda' ),
				'button'  => __( 'Recount terms', 'banda' ),
				'desc'    => __( 'This tool will recount product terms - useful when changing your settings in a way which hides products from the catalog.', 'banda' ),
			),
			'reset_roles' => array(
				'name'    => __( 'Capabilities', 'banda' ),
				'button'  => __( 'Reset capabilities', 'banda' ),
				'desc'    => __( 'This tool will reset the admin, customer and shop_manager roles to default. Use this if your users cannot access all of the Banda admin pages.', 'banda' ),
			),
			'clear_sessions' => array(
				'name'    => __( 'Customer Sessions', 'banda' ),
				'button'  => __( 'Clear all sessions', 'banda' ),
				'desc'    => __( '<strong class="red">Warning:</strong> This tool will delete all customer session data from the database, including any current live carts.', 'banda' ),
			),
			'install_pages' => array(
				'name'    => __( 'Install Banda Pages', 'banda' ),
				'button'  => __( 'Install pages', 'banda' ),
				'desc'    => __( '<strong class="red">Note:</strong> This tool will install all the missing Banda pages. Pages already defined and set up will not be replaced.', 'banda' ),
			),
			'delete_taxes' => array(
				'name'    => __( 'Delete all Banda tax rates', 'banda' ),
				'button'  => __( 'Delete ALL tax rates', 'banda' ),
				'desc'    => __( '<strong class="red">Note:</strong> This option will delete ALL of your tax rates, use with caution.', 'banda' ),
			),
			'reset_tracking' => array(
				'name'    => __( 'Reset Usage Tracking Settings', 'banda' ),
				'button'  => __( 'Reset usage tracking settings', 'banda' ),
				'desc'    => __( 'This will reset your usage tracking settings, causing it to show the opt-in banner again and not sending any data.', 'banda' ),
			)
		);

		return apply_filters( 'banda_debug_tools', $tools );
	}

	/**
	 * Show the logs page.
	 */
	public static function status_logs() {

		$logs = self::scan_log_files();

		if ( ! empty( $_REQUEST['log_file'] ) && isset( $logs[ sanitize_title( $_REQUEST['log_file'] ) ] ) ) {
			$viewed_log = $logs[ sanitize_title( $_REQUEST['log_file'] ) ];
		} elseif ( ! empty( $logs ) ) {
			$viewed_log = current( $logs );
		}

		include_once( 'views/html-admin-page-status-logs.php' );
	}

	/**
	 * Retrieve metadata from a file. Based on WP Core's get_file_data function.
	 * @since  2.1.1
	 * @param  string $file Path to the file
	 * @return string
	 */
	public static function get_file_version( $file ) {

		// Avoid notices if file does not exist
		if ( ! file_exists( $file ) ) {
			return '';
		}

		// We don't need to write to the file, so just open for reading.
		$fp = fopen( $file, 'r' );

		// Pull only the first 8kiB of the file in.
		$file_data = fread( $fp, 8192 );

		// PHP will close file handle, but we are good citizens.
		fclose( $fp );

		// Make sure we catch CR-only line endings.
		$file_data = str_replace( "\r", "\n", $file_data );
		$version   = '';

		if ( preg_match( '/^[ \t\/*#@]*' . preg_quote( '@version', '/' ) . '(.*)$/mi', $file_data, $match ) && $match[1] )
			$version = _cleanup_header_comment( $match[1] );

		return $version ;
	}

	/**
	 * Scan the template files.
	 * @param  string $template_path
	 * @return array
	 */
	public static function scan_template_files( $template_path ) {

		$files  = @scandir( $template_path );
		$result = array();

		if ( ! empty( $files ) ) {

			foreach ( $files as $key => $value ) {

				if ( ! in_array( $value, array( ".",".." ) ) ) {

					if ( is_dir( $template_path . DIRECTORY_SEPARATOR . $value ) ) {
						$sub_files = self::scan_template_files( $template_path . DIRECTORY_SEPARATOR . $value );
						foreach ( $sub_files as $sub_file ) {
							$result[] = $value . DIRECTORY_SEPARATOR . $sub_file;
						}
					} else {
						$result[] = $value;
					}
				}
			}
		}
		return $result;
	}

	/**
	 * Scan the log files.
	 * @return array
	 */
	public static function scan_log_files() {
		$files  = @scandir( WC_LOG_DIR );
		$result = array();

		if ( ! empty( $files ) ) {

			foreach ( $files as $key => $value ) {

				if ( ! in_array( $value, array( '.', '..' ) ) ) {
					if ( ! is_dir( $value ) && strstr( $value, '.log' ) ) {
						$result[ sanitize_title( $value ) ] = $value;
					}
				}
			}

		}

		return $result;
	}

	/**
	 * Get latest version of a theme by slug.
	 * @param  object $theme WP_Theme object.
	 * @return string Version number if found.
	 */
	public static function get_latest_theme_version( $theme ) {
		$api = themes_api( 'theme_information', array(
			'slug'     => $theme->get_stylesheet(),
			'fields'   => array(
				'sections' => false,
				'tags'     => false,
			)
		) );

		$update_theme_version = 0;

		// Check .org for updates.
		if ( is_object( $api ) && ! is_wp_error( $api ) ) {
			$update_theme_version = $api->version;

		// Check Jabali Theme Version.
		} elseif ( strstr( $theme->{'Author URI'}, 'mtaandao' ) ) {
			$theme_dir = substr( strtolower( str_replace( ' ','', $theme->Name ) ), 0, 45 );

			if ( false === ( $theme_version_data = get_transient( $theme_dir . '_version_data' ) ) ) {
				$theme_changelog = wp_safe_remote_get( 'http://dzv365zjfbd8v.cloudfront.net/changelogs/' . $theme_dir . '/changelog.txt' );
				$cl_lines  = explode( "\n", wp_remote_retrieve_body( $theme_changelog ) );
				if ( ! empty( $cl_lines ) ) {
					foreach ( $cl_lines as $line_num => $cl_line ) {
						if ( preg_match( '/^[0-9]/', $cl_line ) ) {
							$theme_date         = str_replace( '.' , '-' , trim( substr( $cl_line , 0 , strpos( $cl_line , '-' ) ) ) );
							$theme_version      = preg_replace( '~[^0-9,.]~' , '' ,stristr( $cl_line , "version" ) );
							$theme_update       = trim( str_replace( "*" , "" , $cl_lines[ $line_num + 1 ] ) );
							$theme_version_data = array( 'date' => $theme_date , 'version' => $theme_version , 'update' => $theme_update , 'changelog' => $theme_changelog );
							set_transient( $theme_dir . '_version_data', $theme_version_data , DAY_IN_SECONDS );
							break;
						}
					}
				}
			}

			if ( ! empty( $theme_version_data['version'] ) ) {
				$update_theme_version = $theme_version_data['version'];
			}
		}

		return $update_theme_version;
	}
}
