<?php
/**
 * Banda Integration Settings
 *
 * @author      Jabali
 * @category    Admin
 * @package     Banda/Admin
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'WC_Settings_Integrations' ) ) :

/**
 * WC_Settings_Integrations.
 */
class WC_Settings_Integrations extends WC_Settings_Page {

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->id    = 'integration';
		$this->label = __( 'Integration', 'banda' );

		if ( isset( WC()->integrations ) && WC()->integrations->get_integrations() ) {
			add_filter( 'banda_settings_tabs_array', array( $this, 'add_settings_page' ), 20 );
			add_action( 'banda_sections_' . $this->id, array( $this, 'output_sections' ) );
			add_action( 'banda_settings_' . $this->id, array( $this, 'output' ) );
			add_action( 'banda_settings_save_' . $this->id, array( $this, 'save' ) );
		}
	}

	/**
	 * Get sections.
	 *
	 * @return array
	 */
	public function get_sections() {
		global $current_section;

		$sections = array();

		if ( ! defined( 'WC_INSTALLING' ) ) {
			$integrations = WC()->integrations->get_integrations();

			if ( ! $current_section && ! empty( $integrations ) ) {
				$current_section = current( $integrations )->id;
			}

			if ( sizeof( $integrations ) > 1 ) {
				foreach ( $integrations as $integration ) {
					$title = empty( $integration->method_title ) ? ucfirst( $integration->id ) : $integration->method_title;
					$sections[ strtolower( $integration->id ) ] = esc_html( $title );
				}
			}
		}

		return apply_filters( 'banda_get_sections_' . $this->id, $sections );
	}

	/**
	 * Output the settings.
	 */
	public function output() {
		global $current_section;

		$integrations = WC()->integrations->get_integrations();

		if ( isset( $integrations[ $current_section ] ) )
			$integrations[ $current_section ]->admin_options();
	}
}

endif;

return new WC_Settings_Integrations();