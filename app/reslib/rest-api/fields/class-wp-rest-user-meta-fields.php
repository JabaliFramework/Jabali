<?php
/**
 * REST API: WP_REST_User_Meta_Fields class
 *
 * @package Jabali
 * @subpackage REST_API
 * @since 17.01.0
 */

/**
 * Core class used to manage meta values for users via the REST API.
 *
 * @since 17.01.0
 *
 * @see WP_REST_Meta_Fields
 */
class WP_REST_User_Meta_Fields extends WP_REST_Meta_Fields {

	/**
	 * Retrieves the object meta type.
	 *
	 * @since 17.01.0
	 * @access protected
	 *
	 * @return string The user meta type.
	 */
	protected function get_meta_type() {
		return 'user';
	}

	/**
	 * Retrieves the type for register_rest_field().
	 *
	 * @since 17.01.0
	 * @access public
	 *
	 * @return string The user REST field type.
	 */
	public function get_rest_field_type() {
		return 'user';
	}
}
