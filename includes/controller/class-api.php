<?php
/**
 * Research Software Directory - Controller API
 *
 * @package     RSD_WP
 * @category    API
 * @link        https://research-software-directory.org
 * @since       1.0.0
 */

namespace RSD;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * API class.
 *
 * @since 1.0.0
 */
class Api {
	/**
	 * The API endpoint.
	 *
	 * @since 1.0.0
	 * @access private
	 * @var string
	 */
	private static $endpoint = 'https://research-software-directory.org/api';

	/**
	 * The API version.
	 *
	 * @since 1.0.0
	 * @access private
	 * @var string
	 */
	private static $version = 'v1';

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	private function __construct() {
	}

	/**
	 * Get the API endpoint.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string
	 */
	public static function get_endpoint() {
		return self::$endpoint;
	}

	/**
	 * Get the API version.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string
	 */
	public static function get_version() {

		return self::$version;
	}

	/**
	 * Build the API path.
	 *
	 * @since 1.1.0
	 * @access public
	 * @param string $path The variable path part.
	 * @param array  $params The query parameters.
	 * @return string
	 */
	public static function build_path( $path, $params = array() ) {
		if ( ! empty( $params ) && is_array( $params ) ) {
			return sprintf( $path . '?%s', http_build_query( $params ) );
		} else {
			return $path;
		}
	}

	/**
	 * Get the API URL.
	 *
	 * @since 1.0.0
	 * @access public
	 * @param string $path The path.
	 * @return string
	 */
	public static function get_url( $path ) {
		return self::$endpoint . '/' . self::$version . '/' . ltrim( $path, '/' );
	}

	/**
	 * Get the API response.
	 *
	 * @since 1.0.0
	 * @access public
	 * @param string $path The path.
	 * @param array  $args The arguments.
	 * @return array
	 */
	public static function get_response( $path, $args = array() ) {
		// Call the API.
		$url      = self::get_url( $path );
		$response = wp_remote_get( $url, $args );

		if ( is_wp_error( $response ) ) {
			return 'Error: ' . $response->get_error_message();
		}

		// Decode the API response.
		$data = json_decode( wp_remote_retrieve_body( $response ), true );

		// Return the data.
		return $data;
	}
}
