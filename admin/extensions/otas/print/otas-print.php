<?php

/**
 * Base class
 */
if ( !class_exists( 'Otas_Print' ) ) {

	final class Otas_Print {

		/**
		 * The single instance of the class
		 */
		protected static $_instance = null;
	
		/**
		 * Default properties
		 */
		public static $plugin_version = '4.2.0';
		public static $plugin_url;
		public static $plugin_path;
		public static $plugin_basefile;
		public static $plugin_basefile_path;
		public static $plugin_text_domain;
		
		/**
		 * Sub class instances
		 */
		public $writepanel;
		public $settings;
		public $print;
		public $theme;

		/**
		 * Main Instance
		 */
		public static function instance() {
			if( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}
	

		/**
		 * Constructor
		 */
		public function __construct() {
			$this->define_constants();
			$this->init_hooks();
			
			// Send out the load action
			do_action( 'wcdn_load');
		}

		/**
		 * Hook into actions and filters
		 */
		public function init_hooks() {
			add_action( 'init', array( $this, 'localise' ) );
		}

		/**
		 * Define WC Constants
		 */
		private function define_constants() {
			self::$plugin_basefile_path = __FILE__;
			self::$plugin_basefile = plugin_basename( self::$plugin_basefile_path );
			self::$plugin_url = plugin_dir_url( self::$plugin_basefile );
			self::$plugin_path = trailingslashit( dirname( self::$plugin_basefile_path ) );	
			self::$plugin_text_domain = trim( dirname( self::$plugin_basefile ) );		
		}
		
		/**
		 * Define constant if not already set
		 */
		private function define( $name, $value ) {
			if( !defined( $name ) ) {
				define( $name, $value );
			}
		}
		
		/**
		 * Include the main plugin classes and functions
		 */
		public function include_classes() {
			include_once( 'includes/class-wcdn-print.php' );
			include_once( 'includes/class-wcdn-settings.php' );
			include_once( 'includes/class-wcdn-writepanel.php' );
			include_once( 'includes/class-wcdn-theme.php' );
		}

		/**
		 * Function used to init Template Functions.
		 * This makes them pluggable by plugins and themes.
		 */
		public function include_template_functions() {
			include_once( 'includes/wcdn-template-functions.php' );
			include_once( 'includes/wcdn-template-hooks.php' );
		}
		
		/**
		 * Load the main plugin classes and functions
		 */
		public function load() {
				// Include the classes	
				$this->include_classes();
							
				// Create the instances
				$this->print = new Otas_Print_Print();
				$this->settings = new Otas_Print_Settings();
				$this->writepanel = new Otas_Print_Writepanel();
				$this->theme = new Otas_Print_Theme();

				// Load the hooks for the template after the objetcs.
				// Like this the template has full access to all objects.
				add_filter( 'plugin_action_links_' . self::$plugin_basefile, array( $this, 'add_settings_link') );
				add_action( 'admin_init', array( $this, 'update' ) );
				add_action( 'init', array( $this, 'include_template_functions' ) );
				
				// Send out the init action
				do_action( 'wcdn_init');
		}
		
	}
}

/**
 * Returns the main instance of the plugin to prevent the need to use globals
 */
function WCDN() {
	return Otas_Print::instance();
}

/**
 * Global for backwards compatibility
 */
$GLOBALS['wcdn'] = WCDN();

?>