<?php
/*
Plugin Name: Material Design Login Form
Plugin URI: http://ese.com
Description: Provides a Material Design Lite login form for Jabali
Version: 1.0.0
Author: Jabali
Author URI: http://mtaandao.co.ke
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'MDLF_Login' ) ) :

class MDLF_Login {

    /**
     * Plugin version, used for cache-busting of style and script file references.
     *
     * @since   1.0.0
     *
     * @var     string
     */
    const VERSION = '1.0.0';

	/**
	 * A reference to an instance of this class.
	 *
	 * @since 0.1.0
	 *
	 * @var   MDLF_Login
	 */
	private static $instance;


	/**
	 * Returns an instance of this class. An implementation of the singleton design pattern.
	 *
	 * @return   MDLF_Login    A reference to an instance of this class.
	 * @since    1.0.0
	 */
	public static function get_instance() {

		if( null == self::$instance ) {
			self::$instance = new MDLF_Login;
			self::$instance->setup_constants();

			self::$instance->includes();
		} // end if

		return self::$instance;

	} // end getInstance

	/**
	 * Initializes the plugin by setting localization, filters, and administration functions.
	 *
	 * @version		1.0.0
     * @since 		1.0.0
	 */
	private function __construct() {

		// Grab the translations for the plugin
		add_action( 'init', array( $this, 'load_plugin_textdomain' ) );

	} // end constructor


	/**
	 * Setup plugin constants
	 *
	 * @access private
	 * @since 1.0.0
	 * @return void
	 */
	private function setup_constants() {

		if ( !defined( 'MDLF_PLUGIN_DIR' ) ) {
			define( 'MDLF_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
		}
		if ( !defined( 'MDLF_PLUGIN_URL' ) ) {
			define( 'MDLF_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
		}
		if ( !defined( 'MDLF_PLUGIN_FILE' ) ) {
			define( 'MDLF_PLUGIN_FILE', __FILE__ );
		}
		if ( !defined( 'MDLF_PLUGIN_VERSION' ) ) {
			define( 'MDLF_PLUGIN_VERSION', '1.0.0' );
		}
	}

	/**
	 * Include required files
	 *
	 * @access private
	 * @since 1.0.0
	 * @return void
	 */
	private function includes() {

		require_once MDLF_PLUGIN_DIR . 'includes/scripts.php';
		require_once MDLF_PLUGIN_DIR . 'includes/misc-functions.php';
		require_once MDLF_PLUGIN_DIR . 'includes/login-functions.php';
		require_once MDLF_PLUGIN_DIR . 'includes/registration-functions.php';
		require_once MDLF_PLUGIN_DIR . 'includes/password-functions.php';
		require_once MDLF_PLUGIN_DIR . 'includes/error-tracking.php';
		require_once MDLF_PLUGIN_DIR . 'includes/install.php';
		require_once MDLF_PLUGIN_DIR . 'includes/meta-box.php';

		// admin only includes
		if( is_admin() ) {

			} else {

			require_once MDLF_PLUGIN_DIR . 'includes/template-functions.php';
			require_once MDLF_PLUGIN_DIR . 'includes/redirects.php';
			require_once MDLF_PLUGIN_DIR . 'includes/shortcodes.php';
			require_once MDLF_PLUGIN_DIR . 'includes/form-fields.php';
		}

	}

    /**
     * Load the plugin text domain for translation.
     *
     * @since    1.0.0
     */
    public function load_plugin_textdomain() {

	    // Set filter for plugin's languages directory
		$mdlf_lang_dir = dirname( plugin_basename( MDLF_PLUGIN_FILE ) ) . '/languages/';
		$mdlf_lang_dir = apply_filters( 'mdlf_languages_directory', $mdlf_lang_dir );

		// Traditional Jabali plugin locale filter
		$locale        = apply_filters( 'plugin_locale',  get_locale(), 'mdlf' );
		$mofile        = sprintf( '%1$s-%2$s.mo', 'mdlf', $locale );

		// Setup paths to current locale file
		$mofile_local  = $mdlf_lang_dir . $mofile;
		$mofile_global = WP_LANG_DIR . '/mdlf/' . $mofile;

		if ( file_exists( $mofile_global ) ) {
			// Look in global /main/languages/mdlf folder
			load_textdomain( 'mdlf', $mofile_global );
		} elseif ( file_exists( $mofile_local ) ) {
			// Look in local /main/plugins/easy-digital-downloads/languages/ folder
			load_textdomain( 'mdlf', $mofile_local );
		} else {
			// Load the default language files
			load_plugin_textdomain( 'mdlf', false, $mdlf_lang_dir );
		}

    } // end load_plugin_textdomain

} // end class

endif; // End if class_exists check

/**
 * The main function responsible for returning the one true MDLF_Login
 * Instance to functions everywhere.
 *
 * Use this function like you would a global variable, except without needing
 * to declare the global.
 *
 * Example: <?php $mdlf = MDLF(); ?>
 *
 * @since 1.4
 * @return object The one true MDLF_Login Instance
 */
function MDLF() {
	return MDLF_Login::get_instance();
}

// Get MDLF Running
MDLF();