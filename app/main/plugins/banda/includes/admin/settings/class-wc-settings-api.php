<?php
/**
 * Banda API Settings
 *
 * @author   Jabali
 * @category Admin
 * @package  Banda/Admin
 * @version  2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'WC_Settings_Rest_API' ) ) :

/**
 * WC_Settings_Rest_API.
 */
class WC_Settings_Rest_API extends WC_Settings_Page {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->id    = 'api';
		$this->label = __( 'API', 'banda' );

		add_filter( 'banda_settings_tabs_array', array( $this, 'add_settings_page' ), 20 );
		add_action( 'banda_settings_' . $this->id, array( $this, 'output' ) );
		add_action( 'banda_sections_' . $this->id, array( $this, 'output_sections' ) );
		add_action( 'banda_settings_form_method_tab_' . $this->id, array( $this, 'form_method' ) );
		add_action( 'banda_settings_save_' . $this->id, array( $this, 'save' ) );

		$this->notices();
	}

	/**
	 * Get sections.
	 *
	 * @return array
	 */
	public function get_sections() {
		$sections = array(
			''         => __( 'Settings', 'banda' ),
			'keys'     => __( 'Keys/Apps', 'banda' ),
			'webhooks' => __( 'Webhooks', 'banda' )
		);

		return apply_filters( 'banda_get_sections_' . $this->id, $sections );
	}

	/**
	 * Get settings array.
	 *
	 * @return array
	 */
	public function get_settings() {
		$settings = apply_filters( 'banda_settings_rest_api', array(
			array(
				'title' => __( 'General Options', 'banda' ),
				'type'  => 'title',
				'desc'  => '',
				'id'    => 'general_options'
			),

			array(
				'title'   => __( 'API', 'banda' ),
				'desc'    => __( 'Enable the REST API', 'banda' ),
				'id'      => 'banda_api_enabled',
				'type'    => 'checkbox',
				'default' => 'yes',
			),

			array(
				'type' => 'sectionend',
				'id' => 'general_options'
			),
		) );

		return apply_filters( 'banda_get_settings_' . $this->id, $settings );
	}

	/**
	 * Form method.
	 *
	 * @param  string $method
	 *
	 * @return string
	 */
	public function form_method( $method ) {
		global $current_section;

		if ( 'webhooks' == $current_section ) {
			if ( isset( $_GET['edit-webhook'] ) ) {
				$webhook_id = absint( $_GET['edit-webhook'] );
				$webhook    = new WC_Webhook( $webhook_id );

				if ( 'trash' != $webhook->post_data->post_status ) {
					return 'post';
				}
			}

			return 'get';
		}

		if ( 'keys' == $current_section ) {
			if ( isset( $_GET['create-key'] ) || isset( $_GET['edit-key'] ) ) {
				return 'post';
			}

			return 'get';
		}

		return 'post';
	}

	/**
	 * Notices.
	 */
	private function notices() {
		if ( isset( $_GET['section'] ) && 'webhooks' == $_GET['section'] ) {
			WC_Admin_Webhooks::notices();
		}
		if ( isset( $_GET['section'] ) && 'keys' == $_GET['section'] ) {
			WC_Admin_API_Keys::notices();
		}
	}

	/**
	 * Output the settings.
	 */
	public function output() {
		global $current_section;

		if ( 'webhooks' == $current_section ) {
			WC_Admin_Webhooks::page_output();
		} else if ( 'keys' == $current_section ) {
			WC_Admin_API_Keys::page_output();
		} else {
			$settings = $this->get_settings( $current_section );
			WC_Admin_Settings::output_fields( $settings );
		}
	}

	/**
	 * Save settings.
	 */
	public function save() {
		global $current_section;

		if ( apply_filters( 'banda_rest_api_valid_to_save', ! in_array( $current_section, array( 'keys', 'webhooks' ) ) ) ) {
			$settings = $this->get_settings();
			WC_Admin_Settings::save_fields( $settings );
		}
	}
}

endif;

return new WC_Settings_Rest_API();
