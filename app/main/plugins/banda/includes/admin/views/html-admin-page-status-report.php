<?php
/**
 * Admin View: Page - Status Report.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $wpdb;

?>
<div class="updated banda-message inline">
	<p><?php _e( 'Please copy and paste this information in your ticket when contacting support:', 'banda' ); ?> </p>
	<p class="submit"><a href="#" class="button-primary debug-report"><?php _e( 'Get System Report', 'banda' ); ?></a>
	<a class="button-secondary docs" href="https://mtaandao.co.ke/docs/banda/document/understanding-the-banda-system-status-report/" target="_blank"><?php _e( 'Understanding the Status Report', 'banda' ); ?></a></p>
	<div id="debug-report">
		<textarea readonly="readonly"></textarea>
		<p class="submit"><button id="copy-for-support" class="button-primary" href="#" data-tip="<?php esc_attr_e( 'Copied!', 'banda' ); ?>"><?php _e( 'Copy for Support', 'banda' ); ?></button></p>
		<p class="copy-error hidden"><?php _e( 'Copying to clipboard failed. Please press Ctrl/Cmd+C to copy.', 'banda' ); ?></p>
	</div>
</div>
<table class="wc_status_table widefat" cellspacing="0" id="status">
	<thead>
		<tr>
			<th colspan="3" data-export-label="Jabali Environment"><h2><?php _e( 'Jabali Environment', 'banda' ); ?></h2></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td data-export-label="Home URL"><?php _e( 'Home URL', 'banda' ); ?>:</td>
			<td class="help"><?php echo wc_help_tip( __( 'The URL of your site\'s homepage.', 'banda' ) ); ?></td>
			<td><?php form_option( 'home' ); ?></td>
		</tr>
		<tr>
			<td data-export-label="Site URL"><?php _e( 'Site URL', 'banda' ); ?>:</td>
			<td class="help"><?php echo wc_help_tip( __( 'The root URL of your site.', 'banda' ) ); ?></td>
			<td><?php form_option( 'siteurl' ); ?></td>
		</tr>
		<tr>
			<td data-export-label="WC Version"><?php _e( 'WC Version', 'banda' ); ?>:</td>
			<td class="help"><?php echo wc_help_tip( __( 'The version of Banda installed on your site.', 'banda' ) ); ?></td>
			<td><?php echo esc_html( WC()->version ); ?></td>
		</tr>
		<tr>
			<td data-export-label="Log Directory Writable"><?php _e( 'Log Directory Writable', 'banda' ); ?>:</td>
			<td class="help"><?php echo wc_help_tip( __( 'Several Banda extensions can write logs which makes debugging problems easier. The directory must be writable for this to happen.', 'banda' ) ); ?></td>
			<td><?php
				if ( @fopen( WC_LOG_DIR . 'test-log.log', 'a' ) ) {
					echo '<mark class="yes"><span class="dashicons dashicons-yes"></span> <code class="private">' . WC_LOG_DIR . '</code></mark> ';
				} else {
					printf( '<mark class="error"><span class="dashicons dashicons-warning"></span> ' . __( 'To allow logging, make <code>%s</code> writable or define a custom <code>WC_LOG_DIR</code>.', 'banda' ) . '</mark>', WC_LOG_DIR );
				}
			?></td>
		</tr>
		<tr>
			<td data-export-label="WP Version"><?php _e( 'WP Version', 'banda' ); ?>:</td>
			<td class="help"><?php echo wc_help_tip( __( 'The version of Jabali installed on your site.', 'banda' ) ); ?></td>
			<td><?php bloginfo('version'); ?></td>
		</tr>
		<tr>
			<td data-export-label="WP Multisite"><?php _e( 'WP Multisite', 'banda' ); ?>:</td>
			<td class="help"><?php echo wc_help_tip( __( 'Whether or not you have Jabali Multisite enabled.', 'banda' ) ); ?></td>
			<td><?php if ( is_multisite() ) echo '<span class="dashicons dashicons-yes"></span>'; else echo '&ndash;'; ?></td>
		</tr>
		<tr>
			<td data-export-label="WP Memory Limit"><?php _e( 'WP Memory Limit', 'banda' ); ?>:</td>
			<td class="help"><?php echo wc_help_tip( __( 'The maximum amount of memory (RAM) that your site can use at one time.', 'banda' ) ); ?></td>
			<td><?php
				$memory = wc_let_to_num( WP_MEMORY_LIMIT );

				if ( function_exists( 'memory_get_usage' ) ) {
					$system_memory = wc_let_to_num( @ini_get( 'memory_limit' ) );
					$memory        = max( $memory, $system_memory );
				}

				if ( $memory < 67108864 ) {
					echo '<mark class="error"><span class="dashicons dashicons-warning"></span> ' . sprintf( __( '%s - We recommend setting memory to at least 64MB. See: %s', 'banda' ), size_format( $memory ), '<a href="https://jabali.github.io/Docs/Editing_wp-config.php#Increasing_memory_allocated_to_PHP" target="_blank">' . __( 'Increasing memory allocated to PHP', 'banda' ) . '</a>' ) . '</mark>';
				} else {
					echo '<mark class="yes">' . size_format( $memory ) . '</mark>';
				}
			?></td>
		</tr>
		<tr>
			<td data-export-label="WP Debug Mode"><?php _e( 'WP Debug Mode', 'banda' ); ?>:</td>
			<td class="help"><?php echo wc_help_tip( __( 'Displays whether or not Jabali is in Debug Mode.', 'banda' ) ); ?></td>
			<td>
				<?php if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) : ?>
					<mark class="yes"><span class="dashicons dashicons-yes"></span></mark>
				<?php else : ?>
					<mark class="no">&ndash;</mark>
				<?php endif; ?>
			</td>
		</tr>
		<tr>
			<td data-export-label="WP Cron"><?php _e( 'WP Cron', 'banda' ); ?>:</td>
			<td class="help"><?php echo wc_help_tip( __( 'Displays whether or not WP Cron Jobs are enabled.', 'banda' ) ); ?></td>
			<td>
				<?php if ( defined( 'DISABLE_WP_CRON' ) && DISABLE_WP_CRON ) : ?>
					<mark class="no">&ndash;</mark>
				<?php else : ?>
					<mark class="yes"><span class="dashicons dashicons-yes"></span></mark>
				<?php endif; ?>
			</td>
		</tr>
		<tr>
			<td data-export-label="Language"><?php _e( 'Language', 'banda' ); ?>:</td>
			<td class="help"><?php echo wc_help_tip( __( 'The current language used by Jabali. Default = English', 'banda' ) ); ?></td>
			<td><?php echo get_locale(); ?></td>
		</tr>
	</tbody>
</table>
<table class="wc_status_table widefat" cellspacing="0">
	<thead>
		<tr>
			<th colspan="3" data-export-label="Server Environment"><h2><?php _e( 'Server Environment', 'banda' ); ?></h2></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td data-export-label="Server Info"><?php _e( 'Server Info', 'banda' ); ?>:</td>
			<td class="help"><?php echo wc_help_tip( __( 'Information about the web server that is currently hosting your site.', 'banda' ) ); ?></td>
			<td><?php echo esc_html( $_SERVER['SERVER_SOFTWARE'] ); ?></td>
		</tr>
		<tr>
			<td data-export-label="PHP Version"><?php _e( 'PHP Version', 'banda' ); ?>:</td>
			<td class="help"><?php echo wc_help_tip( __( 'The version of PHP installed on your hosting server.', 'banda' ) ); ?></td>
			<td><?php
				// Check if phpversion function exists.
				if ( function_exists( 'phpversion' ) ) {
					$php_version = phpversion();

					if ( version_compare( $php_version, '5.6', '<' ) ) {
						echo '<mark class="error"><span class="dashicons dashicons-warning"></span> ' . sprintf( __( '%s - We recommend a minimum PHP version of 5.6. See: %s', 'banda' ), esc_html( $php_version ), '<a href="https://mtaandao.co.ke/docs/banda/document/how-to-update-your-php-version/" target="_blank">' . __( 'How to update your PHP version', 'banda' ) . '</a>' ) . '</mark>';
					} else {
						echo '<mark class="yes">' . esc_html( $php_version ) . '</mark>';
					}
				} else {
					_e( "Couldn't determine PHP version because phpversion() doesn't exist.", 'banda' );
				}
				?></td>
		</tr>
		<?php if ( function_exists( 'ini_get' ) ) : ?>
			<tr>
				<td data-export-label="PHP Post Max Size"><?php _e( 'PHP Post Max Size', 'banda' ); ?>:</td>
				<td class="help"><?php echo wc_help_tip( __( 'The largest filesize that can be contained in one post.', 'banda' ) ); ?></td>
				<td><?php echo size_format( wc_let_to_num( ini_get( 'post_max_size' ) ) ); ?></td>
			</tr>
			<tr>
				<td data-export-label="PHP Time Limit"><?php _e( 'PHP Time Limit', 'banda' ); ?>:</td>
				<td class="help"><?php echo wc_help_tip( __( 'The amount of time (in seconds) that your site will spend on a single operation before timing out (to avoid server lockups)', 'banda' ) ); ?></td>
				<td><?php echo ini_get( 'max_execution_time' ); ?></td>
			</tr>
			<tr>
				<td data-export-label="PHP Max Input Vars"><?php _e( 'PHP Max Input Vars', 'banda' ); ?>:</td>
				<td class="help"><?php echo wc_help_tip( __( 'The maximum number of variables your server can use for a single function to avoid overloads.', 'banda' ) ); ?></td>
				<td><?php echo ini_get( 'max_input_vars' ); ?></td>
			</tr>
			<tr>
				<td data-export-label="cURL Version"><?php _e( 'cURL Version', 'banda' ); ?>:</td>
				<td class="help"><?php echo wc_help_tip( __( 'The version of cURL installed on your server.', 'banda' ) ); ?></td>
				<td><?php
					if ( function_exists( 'curl_version' ) ) {
						$curl_version = curl_version();
						echo $curl_version['version'] . ', ' . $curl_version['ssl_version'];
					} else {
						_e( 'N/A', 'banda' );
					}
				  ?></td>
			</tr>
			<tr>
				<td data-export-label="SUHOSIN Installed"><?php _e( 'SUHOSIN Installed', 'banda' ); ?>:</td>
				<td class="help"><?php echo wc_help_tip( __( 'Suhosin is an advanced protection system for PHP installations. It was designed to protect your servers on the one hand against a number of well known problems in PHP applications and on the other hand against potential unknown vulnerabilities within these applications or the PHP core itself. If enabled on your server, Suhosin may need to be configured to increase its data submission limits.', 'banda' ) ); ?></td>
				<td><?php echo extension_loaded( 'suhosin' ) ? '<span class="dashicons dashicons-yes"></span>' : '&ndash;'; ?></td>
			</tr>
		<?php endif;

		if ( $wpdb->use_mysqli ) {
			$ver = mysqli_get_server_info( $wpdb->dbh );
		} else {
			$ver = mysql_get_server_info();
		}

		if ( ! empty( $wpdb->is_mysql ) && ! stristr( $ver, 'MariaDB' ) ) : ?>
			<tr>
				<td data-export-label="MySQL Version"><?php _e( 'MySQL Version', 'banda' ); ?>:</td>
				<td class="help"><?php echo wc_help_tip( __( 'The version of MySQL installed on your hosting server.', 'banda' ) ); ?></td>
				<td>
					<?php
					$mysql_version = $wpdb->db_version();

					if ( version_compare( $mysql_version, '5.6', '<' ) ) {
						echo '<mark class="error"><span class="dashicons dashicons-warning"></span> ' . sprintf( __( '%s - We recommend a minimum MySQL version of 5.6. See: %s', 'banda' ), esc_html( $mysql_version ), '<a href="https://jabali.github.io/about/requirements/" target="_blank">' . __( 'Jabali Requirements', 'banda' ) . '</a>' ) . '</mark>';
					} else {
						echo '<mark class="yes">' . esc_html( $mysql_version ) . '</mark>';
					}
					?>
				</td>
			</tr>
		<?php endif; ?>
		<tr>
			<td data-export-label="Max Upload Size"><?php _e( 'Max Upload Size', 'banda' ); ?>:</td>
			<td class="help"><?php echo wc_help_tip( __( 'The largest filesize that can be uploaded to your Jabali installation.', 'banda' ) ); ?></td>
			<td><?php echo size_format( wp_max_upload_size() ); ?></td>
		</tr>
		<tr>
			<td data-export-label="Default Timezone is UTC"><?php _e( 'Default Timezone is UTC', 'banda' ); ?>:</td>
			<td class="help"><?php echo wc_help_tip( __( 'The default timezone for your server.', 'banda' ) ); ?></td>
			<td><?php
				$default_timezone = date_default_timezone_get();
				if ( 'UTC' !== $default_timezone ) {
					echo '<mark class="error"><span class="dashicons dashicons-warning"></span> ' . sprintf( __( 'Default timezone is %s - it should be UTC', 'banda' ), $default_timezone ) . '</mark>';
				} else {
					echo '<mark class="yes"><span class="dashicons dashicons-yes"></span></mark>';
				} ?>
			</td>
		</tr>
		<?php
			$posting = array();

			// fsockopen/cURL.
			$posting['fsockopen_curl']['name'] = 'fsockopen/cURL';
			$posting['fsockopen_curl']['help'] = wc_help_tip( __( 'Payment gateways can use cURL to communicate with remote servers to authorize payments, other plugins may also use it when communicating with remote services.', 'banda' ) );

			if ( function_exists( 'fsockopen' ) || function_exists( 'curl_init' ) ) {
				$posting['fsockopen_curl']['success'] = true;
			} else {
				$posting['fsockopen_curl']['success'] = false;
				$posting['fsockopen_curl']['note']    = __( 'Your server does not have fsockopen or cURL enabled - PayPal IPN and other scripts which communicate with other servers will not work. Contact your hosting provider.', 'banda' );
			}

			// SOAP.
			$posting['soap_client']['name'] = 'SoapClient';
			$posting['soap_client']['help'] = wc_help_tip( __( 'Some webservices like shipping use SOAP to get information from remote servers, for example, live shipping quotes from FedEx require SOAP to be installed.', 'banda' ) );

			if ( class_exists( 'SoapClient' ) ) {
				$posting['soap_client']['success'] = true;
			} else {
				$posting['soap_client']['success'] = false;
				$posting['soap_client']['note']    = sprintf( __( 'Your server does not have the %s class enabled - some gateway plugins which use SOAP may not work as expected.', 'banda' ), '<a href="https://php.net/manual/en/class.soapclient.php">SoapClient</a>' );
			}

			// DOMDocument.
			$posting['dom_document']['name'] = 'DOMDocument';
			$posting['dom_document']['help'] = wc_help_tip( __( 'HTML/Multipart emails use DOMDocument to generate inline CSS in templates.', 'banda' ) );

			if ( class_exists( 'DOMDocument' ) ) {
				$posting['dom_document']['success'] = true;
			} else {
				$posting['dom_document']['success'] = false;
				$posting['dom_document']['note']    = sprintf( __( 'Your server does not have the %s class enabled - HTML/Multipart emails, and also some extensions, will not work without DOMDocument.', 'banda' ), '<a href="https://php.net/manual/en/class.domdocument.php">DOMDocument</a>' );
			}

			// GZIP.
			$posting['gzip']['name'] = 'GZip';
			$posting['gzip']['help'] = wc_help_tip( __( 'GZip (gzopen) is used to open the GEOIP database from MaxMind.', 'banda' ) );

			if ( is_callable( 'gzopen' ) ) {
				$posting['gzip']['success'] = true;
			} else {
				$posting['gzip']['success'] = false;
				$posting['gzip']['note']    = sprintf( __( 'Your server does not support the %s function - this is required to use the GeoIP database from MaxMind.', 'banda' ), '<a href="https://php.net/manual/en/zlib.installation.php">gzopen</a>' );
			}

			// Multibyte String.
			$posting['mbstring']['name'] = 'Multibyte String';
			$posting['mbstring']['help'] = wc_help_tip( __( 'Multibyte String (mbstring) is used to convert character encoding, like for emails or converting characters to lowercase.', 'banda' ) );

			if ( extension_loaded( 'mbstring' ) ) {
				$posting['mbstring']['success'] = true;
			} else {
				$posting['mbstring']['success'] = false;
				$posting['mbstring']['note']    = sprintf( __( 'Your server does not support the %s functions - this is required for better character encoding. Some fallbacks will be used instead for it.', 'banda' ), '<a href="https://php.net/manual/en/mbstring.installation.php">mbstring</a>' );
			}

			// WP Remote Post Check.
			$posting['wp_remote_post']['name'] = __( 'Remote Post', 'banda');
			$posting['wp_remote_post']['help'] = wc_help_tip( __( 'PayPal uses this method of communicating when sending back transaction information.', 'banda' ) );

			$response = wp_safe_remote_post( 'https://www.paypal.com/cgi-bin/webscr', array(
				'timeout'     => 60,
				'user-agent'  => 'Banda/' . WC()->version,
				'httpversion' => '1.1',
				'body'        => array(
					'cmd'    => '_notify-validate'
				)
			) );

			if ( ! is_wp_error( $response ) && $response['response']['code'] >= 200 && $response['response']['code'] < 300 ) {
				$posting['wp_remote_post']['success'] = true;
			} else {
				$posting['wp_remote_post']['note']    = __( 'wp_remote_post() failed. PayPal IPN won\'t work with your server. Contact your hosting provider.', 'banda' );
				if ( is_wp_error( $response ) ) {
					$posting['wp_remote_post']['note'] .= ' ' . sprintf( __( 'Error: %s', 'banda' ), wc_clean( $response->get_error_message() ) );
				} else {
					$posting['wp_remote_post']['note'] .= ' ' . sprintf( __( 'Status code: %s', 'banda' ), wc_clean( $response['response']['code'] ) );
				}
				$posting['wp_remote_post']['success'] = false;
			}

			// WP Remote Get Check.
			$posting['wp_remote_get']['name'] = __( 'Remote Get', 'banda');
			$posting['wp_remote_get']['help'] = wc_help_tip( __( 'Banda plugins may use this method of communication when checking for plugin updates.', 'banda' ) );

			$response = wp_safe_remote_get( 'http://mtaandao.co.ke/wc-api/product-key-api?request=ping&network=' . ( is_multisite() ? '1' : '0' ) );

			if ( ! is_wp_error( $response ) && $response['response']['code'] >= 200 && $response['response']['code'] < 300 ) {
				$posting['wp_remote_get']['success'] = true;
			} else {
				$posting['wp_remote_get']['note']    = __( 'wp_remote_get() failed. The Banda plugin updater won\'t work with your server. Contact your hosting provider.', 'banda' );
				if ( is_wp_error( $response ) ) {
					$posting['wp_remote_get']['note'] .= ' ' . sprintf( __( 'Error: %s', 'banda' ), wc_clean( $response->get_error_message() ) );
				} else {
					$posting['wp_remote_get']['note'] .= ' ' . sprintf( __( 'Status code: %s', 'banda' ), wc_clean( $response['response']['code'] ) );
				}
				$posting['wp_remote_get']['success'] = false;
			}

			$posting = apply_filters( 'banda_debug_posting', $posting );

			foreach ( $posting as $post ) {
				$mark = ! empty( $post['success'] ) ? 'yes' : 'error';
				?>
				<tr>
					<td data-export-label="<?php echo esc_html( $post['name'] ); ?>"><?php echo esc_html( $post['name'] ); ?>:</td>
					<td class="help"><?php echo isset( $post['help'] ) ? $post['help'] : ''; ?></td>
					<td>
						<mark class="<?php echo $mark; ?>">
							<?php echo ! empty( $post['success'] ) ? '<span class="dashicons dashicons-yes"></span>' : '<span class="dashicons dashicons-no-alt"></span>'; ?> <?php echo ! empty( $post['note'] ) ? wp_kses_data( $post['note'] ) : ''; ?>
						</mark>
					</td>
				</tr>
				<?php
			}
		?>
	</tbody>
</table>
<table class="wc_status_table widefat" cellspacing="0">
	<thead>
		<tr>
			<th colspan="3" data-export-label="Database"><h2><?php _e( 'Database', 'banda' ); ?></h2></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td data-export-label="WC Database Version"><?php _e( 'WC Database Version', 'banda' ); ?>:</td>
			<td class="help"><?php echo wc_help_tip( __( 'The version of Banda that the database is formatted for. This should be the same as your Banda Version.', 'banda' ) ); ?></td>
			<td><?php echo esc_html( get_option( 'banda_db_version' ) ); ?></td>
		</tr>
		<tr>
			<?php
			$tables = array(
				'banda_sessions',
				'banda_api_keys',
				'banda_attribute_taxonomies',
				'banda_downloadable_product_permissions',
				'banda_order_items',
				'banda_order_itemmeta',
				'banda_tax_rates',
				'banda_tax_rate_locations',
				'banda_shipping_zones',
				'banda_shipping_zone_locations',
				'banda_shipping_zone_methods',
				'banda_payment_tokens',
				'banda_payment_tokenmeta',
			);

			if ( get_option( 'db_version' ) < 34370 ) {
				$tables[] = 'banda_termmeta';
			}

			foreach ( $tables as $table ) {
				?>
				<tr>
					<td><?php echo esc_html( $table ); ?></td>
					<td class="help">&nbsp;</td>
					<td><?php echo $wpdb->get_var( $wpdb->prepare( "SHOW TABLES LIKE %s;", $wpdb->prefix . $table ) ) !== $wpdb->prefix . $table ? '<mark class="error"><span class="dashicons dashicons-warning"></span> ' . __( 'Table does not exist', 'banda' ) . '</mark>' : '<mark class="yes"><span class="dashicons dashicons-yes"></span></mark>'; ?></td>
				</tr>
				<?php
			}

			if ( in_array( get_option( 'banda_default_customer_address' ), array( 'geolocation_ajax', 'geolocation' ) ) ) {
				?>
				<tr>
					<td data-export-label="MaxMind GeoIP Database"><?php _e( 'MaxMind GeoIP Database', 'banda' ); ?>:</td>
					<td class="help"><?php echo wc_help_tip( __( 'The GeoIP database from MaxMind is used to geolocate customers.', 'banda' ) ); ?></td>
					<td><?php
						if ( file_exists( WC_Geolocation::get_local_database_path() ) ) {
							echo '<mark class="yes"><span class="dashicons dashicons-yes"></span> <code class="private">' . esc_html( WC_Geolocation::get_local_database_path() ) . '</code></mark> ';
						} else {
							printf( '<mark class="error"><span class="dashicons dashicons-warning"></span> ' . sprintf( __( 'The MaxMind GeoIP Database does not exist - Geolocation will not function. You can download and install it manually from %1$s to the path: %2$s. Scroll down to \"Downloads\" and download the \"Binary / gzip\" file next to \"GeoLite Country\"', 'banda' ), make_clickable( 'http://dev.maxmind.com/geoip/legacy/geolite/' ), '<code class="private">' . WC_Geolocation::get_local_database_path() . '</code>' ) . '</mark>', WC_LOG_DIR );
						}
					?></td>
				</tr>
				<?php
			}

			?>
		</tr>
	</tbody>
</table>
<table class="wc_status_table widefat" cellspacing="0">
	<thead>
		<tr>
			<th colspan="3" data-export-label="Active Plugins (<?php echo count( (array) get_option( 'active_plugins' ) ); ?>)"><h2><?php _e( 'Active Plugins', 'banda' ); ?> (<?php echo count( (array) get_option( 'active_plugins' ) ); ?>)</h2></th>
		</tr>
	</thead>
	<tbody>
		<?php
		$active_plugins = (array) get_option( 'active_plugins', array() );

		if ( is_multisite() ) {
			$network_activated_plugins = array_keys( get_site_option( 'active_sitewide_plugins', array() ) );
			$active_plugins            = array_merge( $active_plugins, $network_activated_plugins );
		}

		foreach ( $active_plugins as $plugin ) {

			$plugin_data    = @get_plugin_data( WP_PLUGIN_DIR . '/' . $plugin );
			$dirname        = dirname( $plugin );
			$version_string = '';
			$network_string = '';

			if ( ! empty( $plugin_data['Name'] ) ) {

				// Link the plugin name to the plugin url if available.
				$plugin_name = esc_html( $plugin_data['Name'] );

				if ( ! empty( $plugin_data['PluginURI'] ) ) {
					$plugin_name = '<a href="' . esc_url( $plugin_data['PluginURI'] ) . '" title="' . esc_attr__( 'Visit plugin homepage' , 'banda' ) . '" target="_blank">' . $plugin_name . '</a>';
				}

				if ( strstr( $dirname, 'banda-' ) && strstr( $plugin_data['PluginURI'], 'mtaandao.com' ) ) {

					if ( false === ( $version_data = get_transient( md5( $plugin ) . '_version_data' ) ) ) {
						$changelog = wp_safe_remote_get( 'http://dzv365zjfbd8v.cloudfront.net/changelogs/' . $dirname . '/changelog.txt' );
						$cl_lines  = explode( "\n", wp_remote_retrieve_body( $changelog ) );
						if ( ! empty( $cl_lines ) ) {
							foreach ( $cl_lines as $line_num => $cl_line ) {
								if ( preg_match( '/^[0-9]/', $cl_line ) ) {

									$date         = str_replace( '.' , '-' , trim( substr( $cl_line , 0 , strpos( $cl_line , '-' ) ) ) );
									$version      = preg_replace( '~[^0-9,.]~' , '' ,stristr( $cl_line , "version" ) );
									$update       = trim( str_replace( "*" , "" , $cl_lines[ $line_num + 1 ] ) );
									$version_data = array( 'date' => $date , 'version' => $version , 'update' => $update , 'changelog' => $changelog );
									set_transient( md5( $plugin ) . '_version_data', $version_data, DAY_IN_SECONDS );
									break;
								}
							}
						}
					}

					if ( ! empty( $version_data['version'] ) && version_compare( $version_data['version'], $plugin_data['Version'], '>' ) ) {
						$version_string = ' &ndash; <strong style="color:red;">' . esc_html( sprintf( _x( '%s is available', 'Version info', 'banda' ), $version_data['version'] ) ) . '</strong>';
					}

					if ( $plugin_data['Network'] != false ) {
						$network_string = ' &ndash; <strong style="color:black;">' . __( 'Network enabled', 'banda' ) . '</strong>';
					}
				}

				?>
				<tr>
					<td><?php echo $plugin_name; ?></td>
					<td class="help">&nbsp;</td>
					<td><?php echo sprintf( _x( 'by %s', 'by author', 'banda' ), $plugin_data['Author'] ) . ' &ndash; ' . esc_html( $plugin_data['Version'] ) . $version_string . $network_string; ?></td>
				</tr>
				<?php
			}
		}
		?>
	</tbody>
</table>
<table class="wc_status_table widefat" cellspacing="0">
	<thead>
		<tr>
			<th colspan="3" data-export-label="Settings"><h2><?php _e( 'Settings', 'banda' ); ?></h2></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td data-export-label="Force SSL"><?php _e( 'Force SSL', 'banda' ); ?>:</td>
			<td class="help"><?php echo wc_help_tip( __( 'Does your site force a SSL Certificate for transactions?', 'banda' ) ); ?></td>
			<td><?php echo 'yes' === get_option( 'banda_force_ssl_checkout' ) ? '<mark class="yes"><span class="dashicons dashicons-yes"></span></mark>' : '<mark class="no">&ndash;</mark>'; ?></td>
		</tr>
		<tr>
			<td data-export-label="Currency"><?php _e( 'Currency', 'banda' ) ?></td>
			<td class="help"><?php echo wc_help_tip( __( 'What currency prices are listed at in the catalog and which currency gateways will take payments in.', 'banda' ) ); ?></td>
			<td><?php echo get_banda_currency(); ?> (<?php echo get_banda_currency_symbol() ?>)</td>
		</tr>
		<tr>
			<td data-export-label="Currency Position"><?php _e( 'Currency Position', 'banda' ) ?></td>
			<td class="help"><?php echo wc_help_tip( __( 'The position of the currency symbol.', 'banda' ) ); ?></td>
			<td><?php echo get_option( 'banda_currency_pos' ); ?></td>
		</tr>
		<tr>
			<td data-export-label="Thousand Separator"><?php _e( 'Thousand Separator', 'banda' ) ?></td>
			<td class="help"><?php echo wc_help_tip( __( 'The thousand separator of displayed prices.', 'banda' ) ); ?></td>
			<td><?php echo wc_get_price_thousand_separator(); ?></td>
		</tr>
		<tr>
			<td data-export-label="Decimal Separator"><?php _e( 'Decimal Separator', 'banda' ) ?></td>
			<td class="help"><?php echo wc_help_tip( __( 'The decimal separator of displayed prices.', 'banda' ) ); ?></td>
			<td><?php echo wc_get_price_decimal_separator(); ?></td>
		</tr>
		<tr>
			<td data-export-label="Number of Decimals"><?php _e( 'Number of Decimals', 'banda' ) ?></td>
			<td class="help"><?php echo wc_help_tip( __( 'The number of decimal points shown in displayed prices.', 'banda' ) ); ?></td>
			<td><?php echo wc_get_price_decimals(); ?></td>
		</tr>
	</tbody>
</table>
<table class="wc_status_table widefat" cellspacing="0">
	<thead>
		<tr>
			<th colspan="3" data-export-label="API"><h2><?php _e( 'API', 'banda' ); ?></h2></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td data-export-label="API Enabled"><?php _e( 'API Enabled', 'banda' ); ?>:</td>
			<td class="help"><?php echo wc_help_tip( __( 'Does your site have REST API enabled?', 'banda' ) ); ?></td>
			<td><?php echo 'yes' === get_option( 'banda_api_enabled' ) ? '<mark class="yes"><span class="dashicons dashicons-yes"></span></mark>' : '<mark class="no">&ndash;</mark>'; ?></td>
		</tr>
	</tbody>
</table>
<table class="wc_status_table widefat" cellspacing="0">
	<thead>
		<tr>
			<th colspan="3" data-export-label="WC Pages"><h2><?php _e( 'WC Pages', 'banda' ); ?></h2></th>
		</tr>
	</thead>
	<tbody>
		<?php
			$check_pages = array(
				_x( 'Shop Base', 'Page setting', 'banda' ) => array(
						'option'    => 'banda_shop_page_id',
						'shortcode' => '',
						'help'      => __( 'The URL of your Banda shop\'s homepage (along with the Page ID).', 'banda' ),
					),
				_x( 'Cart', 'Page setting', 'banda' ) => array(
						'option'    => 'banda_cart_page_id',
						'shortcode' => '[' . apply_filters( 'banda_cart_shortcode_tag', 'banda_cart' ) . ']',
						'help'      => __( 'The URL of your Banda shop\'s cart (along with the page ID).', 'banda' ),
					),
				_x( 'Checkout', 'Page setting', 'banda' ) => array(
						'option'    => 'banda_checkout_page_id',
						'shortcode' => '[' . apply_filters( 'banda_checkout_shortcode_tag', 'banda_checkout' ) . ']',
						'help'      => __( 'The URL of your Banda shop\'s checkout (along with the page ID).', 'banda' ),
					),
				_x( 'My Account', 'Page setting', 'banda' ) => array(
						'option'    => 'banda_myaccount_page_id',
						'shortcode' => '[' . apply_filters( 'banda_my_account_shortcode_tag', 'banda_my_account' ) . ']',
						'help'      => __( 'The URL of your Banda shop\'s “My Account” Page (along with the page ID).', 'banda' ),
					)
			);

			$alt = 1;

			foreach ( $check_pages as $page_name => $values ) {
				$error   = false;
				$page_id = get_option( $values['option'] );

				if ( $page_id ) {
					$page_name = '<a href="' . get_edit_post_link( $page_id ) . '" title="' . sprintf( _x( 'Edit %s page', 'WC Pages links in the System Status', 'banda' ), esc_html( $page_name ) ) . '">' . esc_html( $page_name ) . '</a>';
				} else {
					$page_name = esc_html( $page_name );
				}

				echo '<tr><td data-export-label="' . esc_attr( $page_name ) . '">' . $page_name . ':</td>';
				echo '<td class="help">' . wc_help_tip( $values['help']  ) . '</td><td>';

				// Page ID check.
				if ( ! $page_id ) {
					echo '<mark class="error"><span class="dashicons dashicons-warning"></span> ' . __( 'Page not set', 'banda' ) . '</mark>';
					$error = true;
				} else if ( ! get_post( $page_id ) ) {
					echo '<mark class="error"><span class="dashicons dashicons-warning"></span> ' . __( 'Page ID is set, but the page does not exist', 'banda' ) . '</mark>';
					$error = true;
				} else if ( get_post_status( $page_id ) !== 'publish' ) {
					echo '<mark class="error"><span class="dashicons dashicons-warning"></span> ' . sprintf( __( 'Page visibility should be %spublic%s', 'banda' ), '<a href="https://jabali.github.io/Docs/Content_Visibility" target="_blank">', '</a>' ) . '</mark>';
					$error = true;
				} else {

					// Shortcode check
					if ( $values['shortcode'] ) {
						$page = get_post( $page_id );

						if ( empty( $page ) ) {

							echo '<mark class="error"><span class="dashicons dashicons-warning"></span> ' . sprintf( __( 'Page does not exist', 'banda' ) ) . '</mark>';
							$error = true;

						} else if ( ! strstr( $page->post_content, $values['shortcode'] ) ) {

							echo '<mark class="error"><span class="dashicons dashicons-warning"></span> ' . sprintf( __( 'Page does not contain the shortcode: %s', 'banda' ), $values['shortcode'] ) . '</mark>';
							$error = true;

						}
					}

				}

				if ( ! $error ) echo '<mark class="yes">#' . absint( $page_id ) . ' - ' . str_replace( home_url(), '', get_permalink( $page_id ) ) . '</mark>';

				echo '</td></tr>';
			}
		?>
	</tbody>
</table>
<table class="wc_status_table widefat" cellspacing="0">
	<thead>
		<tr>
			<th colspan="3" data-export-label="Taxonomies"><h2><?php _e( 'Taxonomies', 'banda' ); ?><?php echo wc_help_tip( __( 'A list of taxonomy terms that can be used in regard to order/product statuses.', 'banda' ) ); ?></h2></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td data-export-label="Product Types"><?php _e( 'Product Types', 'banda' ); ?>:</td>
			<td class="help">&nbsp;</td>
			<td><?php
				$display_terms = array();
				$terms = get_terms( 'product_type', array( 'hide_empty' => 0 ) );
				foreach ( $terms as $term ) {
					$display_terms[] = strtolower( $term->name ) . ' (' . $term->slug . ')';
				}
				echo implode( ', ', array_map( 'esc_html', $display_terms ) );
			?></td>
		</tr>
	</tbody>
</table>
<table class="wc_status_table widefat" cellspacing="0">
	<thead>
		<tr>
			<th colspan="3" data-export-label="Theme"><h2><?php _e( 'Theme', 'banda' ); ?></h2></th>
		</tr>
	</thead>
		<?php
		include_once( ABSPATH . 'admin/includes/theme-install.php' );

		$active_theme         = wp_get_theme();
		$theme_version        = $active_theme->Version;
		$update_theme_version = WC_Admin_Status::get_latest_theme_version( $active_theme );
		?>
	<tbody>
		<tr>
			<td data-export-label="Name"><?php _e( 'Name', 'banda' ); ?>:</td>
			<td class="help"><?php echo wc_help_tip( __( 'The name of the current active theme.', 'banda' ) ); ?></td>
			<td><?php echo esc_html( $active_theme->Name ); ?></td>
		</tr>
		<tr>
			<td data-export-label="Version"><?php _e( 'Version', 'banda' ); ?>:</td>
			<td class="help"><?php echo wc_help_tip( __( 'The installed version of the current active theme.', 'banda' ) ); ?></td>
			<td><?php
				echo esc_html( $theme_version );

				if ( version_compare( $theme_version, $update_theme_version, '<' ) ) {
					echo ' &ndash; <strong style="color:red;">' . sprintf( __( '%s is available', 'banda' ), esc_html( $update_theme_version ) ) . '</strong>';
				}
			?></td>
		</tr>
		<tr>
			<td data-export-label="Author URL"><?php _e( 'Author URL', 'banda' ); ?>:</td>
			<td class="help"><?php echo wc_help_tip( __( 'The theme developers URL.', 'banda' ) ); ?></td>
			<td><?php echo $active_theme->{'Author URI'}; ?></td>
		</tr>
		<tr>
			<td data-export-label="Child Theme"><?php _e( 'Child Theme', 'banda' ); ?>:</td>
			<td class="help"><?php echo wc_help_tip( __( 'Displays whether or not the current theme is a child theme.', 'banda' ) ); ?></td>
			<td><?php
				echo is_child_theme() ? '<mark class="yes"><span class="dashicons dashicons-yes"></span></mark>' : '<span class="dashicons dashicons-no-alt"></span> &ndash; ' . sprintf( __( 'If you\'re modifying Banda on a parent theme you didn\'t build personally, then we recommend using a child theme. See: <a href="%s" target="_blank">How to create a child theme</a>', 'banda' ), 'https://jabali.github.io/Docs/Child_Themes' );
			?></td>
		</tr>
		<?php
		if( is_child_theme() ) :
			$parent_theme         = wp_get_theme( $active_theme->Template );
			$update_theme_version = WC_Admin_Status::get_latest_theme_version( $parent_theme );
		?>
		<tr>
			<td data-export-label="Parent Theme Name"><?php _e( 'Parent Theme Name', 'banda' ); ?>:</td>
			<td class="help"><?php echo wc_help_tip( __( 'The name of the parent theme.', 'banda' ) ); ?></td>
			<td><?php echo esc_html( $parent_theme->Name ); ?></td>
		</tr>
		<tr>
			<td data-export-label="Parent Theme Version"><?php _e( 'Parent Theme Version', 'banda' ); ?>:</td>
			<td class="help"><?php echo wc_help_tip( __( 'The installed version of the parent theme.', 'banda' ) ); ?></td>
			<td><?php
				echo esc_html( $parent_theme->Version );

				if ( version_compare( $parent_theme->Version, $update_theme_version, '<' ) ) {
					echo ' &ndash; <strong style="color:red;">' . sprintf( __( '%s is available', 'banda' ), esc_html( $update_theme_version ) ) . '</strong>';
				}
			?></td>
		</tr>
		<tr>
			<td data-export-label="Parent Theme Author URL"><?php _e( 'Parent Theme Author URL', 'banda' ); ?>:</td>
			<td class="help"><?php echo wc_help_tip( __( 'The parent theme developers URL.', 'banda' ) ); ?></td>
			<td><?php echo $parent_theme->{'Author URI'}; ?></td>
		</tr>
		<?php endif ?>
		<tr>
			<td data-export-label="Banda Support"><?php _e( 'Banda Support', 'banda' ); ?>:</td>
			<td class="help"><?php echo wc_help_tip( __( 'Displays whether or not the current active theme declares Banda support.', 'banda' ) ); ?></td>
			<td><?php
				if ( ! current_theme_supports( 'banda' ) && ! in_array( $active_theme->template, wc_get_core_supported_themes() ) ) {
					echo '<mark class="error"><span class="dashicons dashicons-warning"></span> ' . __( 'Not Declared', 'banda' ) . '</mark>';
				} else {
					echo '<mark class="yes"><span class="dashicons dashicons-yes"></span></mark>';
				}
			?></td>
		</tr>
	</tbody>
</table>
<table class="wc_status_table widefat" cellspacing="0">
	<thead>
		<tr>
			<th colspan="3" data-export-label="Templates"><h2><?php _e( 'Templates', 'banda' ); ?><?php echo wc_help_tip( __( 'This section shows any files that are overriding the default Banda template pages.', 'banda' ) ); ?></h2></th>
		</tr>
	</thead>
	<tbody>
		<?php if ( file_exists( get_stylesheet_directory() . '/banda.php' ) || file_exists( get_template_directory() . '/banda.php' ) ) : ?>
		<tr>
			<td data-export-label="Overrides"><?php _e( 'Archive Template', 'banda' ); ?>:</td>
			<td class="help">&nbsp;</td>
			<td><?php _e( 'Your theme has a banda.php file, you will not be able to override the banda/archive-product.php custom template since banda.php has priority over archive-product.php. This is intended to prevent display issues.', 'banda' ); ?></td>
		</tr>
		<?php endif ?>
		<?php
			$template_paths     = apply_filters( 'banda_template_overrides_scan_paths', array( 'Banda' => WC()->plugin_path() . '/templates/' ) );
			$scanned_files      = array();
			$found_files        = array();
			$outdated_templates = false;

			foreach ( $template_paths as $plugin_name => $template_path ) {

				$scanned_files = WC_Admin_Status::scan_template_files( $template_path );

				foreach ( $scanned_files as $file ) {
					if ( file_exists( get_stylesheet_directory() . '/' . $file ) ) {
						$theme_file = get_stylesheet_directory() . '/' . $file;
					} elseif ( file_exists( get_stylesheet_directory() . '/banda/' . $file ) ) {
						$theme_file = get_stylesheet_directory() . '/banda/' . $file;
					} elseif ( file_exists( get_template_directory() . '/' . $file ) ) {
						$theme_file = get_template_directory() . '/' . $file;
					} elseif( file_exists( get_template_directory() . '/banda/' . $file ) ) {
						$theme_file = get_template_directory() . '/banda/' . $file;
					} else {
						$theme_file = false;
					}

					if ( ! empty( $theme_file ) ) {
						$core_version  = WC_Admin_Status::get_file_version( $template_path . $file );
						$theme_version = WC_Admin_Status::get_file_version( $theme_file );

						if ( $core_version && ( empty( $theme_version ) || version_compare( $theme_version, $core_version, '<' ) ) ) {
							if ( ! $outdated_templates ) {
								$outdated_templates = true;
							}
							$found_files[ $plugin_name ][] = sprintf( __( '<code>%s</code> version <strong style="color:red">%s</strong> is out of date. The core version is %s', 'banda' ), str_replace( MAIN_DIR . '/themes/', '', $theme_file ), $theme_version ? $theme_version : '-', $core_version );
						} else {
							$found_files[ $plugin_name ][] = sprintf( '<code>%s</code>', str_replace( MAIN_DIR . '/themes/', '', $theme_file ) );
						}
					}
				}
			}

			if ( ! empty( $found_files ) ) {
				foreach ( $found_files as $plugin_name => $found_plugin_files ) {
					?>
					<tr>
						<td data-export-label="Overrides"><?php _e( 'Overrides', 'banda' ); ?> (<?php echo $plugin_name; ?>):</td>
						<td class="help">&nbsp;</td>
						<td><?php echo implode( ', <br/>', $found_plugin_files ); ?></td>
					</tr>
					<?php
				}
			} else {
				?>
				<tr>
					<td data-export-label="Overrides"><?php _e( 'Overrides', 'banda' ); ?>:</td>
					<td class="help">&nbsp;</td>
					<td>&ndash;</td>
				</tr>
				<?php
			}

			if ( true === $outdated_templates ) {
				?>
				<tr>
					<td>&nbsp;</td>
					<td class="help">&nbsp;</td>
					<td><a href="https://mtaandao.co.ke/docs/banda/document/fix-outdated-templates-banda/" target="_blank"><?php _e( 'Learn how to update outdated templates', 'banda' ) ?></a></td>
				</tr>
				<?php
			}
		?>
	</tbody>
</table>

<?php do_action( 'banda_system_status_report' ); ?>

<script type="text/javascript">

	jQuery( 'a.help_tip, a.banda-help-tip' ).click( function() {
		return false;
	});

	jQuery( 'a.debug-report' ).click( function() {

		var report = '';

		jQuery( '.wc_status_table thead, .wc_status_table tbody' ).each( function() {

			if ( jQuery( this ).is( 'thead' ) ) {

				var label = jQuery( this ).find( 'th:eq(0)' ).data( 'export-label' ) || jQuery( this ).text();
				report = report + '\n### ' + jQuery.trim( label ) + ' ###\n\n';

			} else {

				jQuery( 'tr', jQuery( this ) ).each( function() {

					var label       = jQuery( this ).find( 'td:eq(0)' ).data( 'export-label' ) || jQuery( this ).find( 'td:eq(0)' ).text();
					var the_name    = jQuery.trim( label ).replace( /(<([^>]+)>)/ig, '' ); // Remove HTML.

					// Find value
					var $value_html = jQuery( this ).find( 'td:eq(2)' ).clone();
					$value_html.find( '.private' ).remove();
					$value_html.find( '.dashicons-yes' ).replaceWith( '&#10004;' );
					$value_html.find( '.dashicons-no-alt, .dashicons-warning' ).replaceWith( '&#10060;' );

					// Format value
					var the_value   = jQuery.trim( $value_html.text() );
					var value_array = the_value.split( ', ' );

					if ( value_array.length > 1 ) {
						// If value have a list of plugins ','.
						// Split to add new line.
						var temp_line ='';
						jQuery.each( value_array, function( key, line ) {
							temp_line = temp_line + line + '\n';
						});

						the_value = temp_line;
					}

					report = report + '' + the_name + ': ' + the_value + '\n';
				});

			}
		});

		try {
			jQuery( '#debug-report' ).slideDown();
			jQuery( '#debug-report' ).find( 'textarea' ).val( '`' + report + '`' ).focus().select();
			jQuery( this ).fadeOut();
			return false;
		} catch ( e ) {
			/* jshint devel: true */
			console.log( e );
		}

		return false;
	});

	jQuery( document ).ready( function( $ ) {

		$( document.body ).on( 'copy', '#copy-for-support', function( e ) {
			e.clipboardData.clearData();
			e.clipboardData.setData( 'text/plain', $( '#debug-report' ).find( 'textarea' ).val() );
			e.preventDefault();
		});

		$( document.body ).on( 'aftercopy', '#copy-for-support', function( e ) {
			if ( true === e.success['text/plain'] ) {
				$( '#copy-for-support' ).tipTip({
					'attribute':  'data-tip',
					'activation': 'focus',
					'fadeIn':     50,
					'fadeOut':    50,
					'delay':      0
				}).focus();
			} else {
				$( '.copy-error' ).removeClass( 'hidden' );
				$( '#debug-report' ).find( 'textarea' ).focus().select();
			}
		});

	});

</script>
