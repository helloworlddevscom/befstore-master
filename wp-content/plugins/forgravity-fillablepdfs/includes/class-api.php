<?php

namespace ForGravity\Fillable_PDFs;

use Exception;

/**
 * Fillable PDFs API library.
 *
 * @since     1.0
 * @package   FillablePDFs
 * @author    ForGravity
 * @copyright Copyright (c) 2017, ForGravity
 */
class API {

	/**
	 * Base Fillable PDFs API URL.
	 *
	 * @since  1.0
	 * @var    string
	 * @access protected
	 */
	public static $api_url = FG_FILLABLEPDFS_API_URL;

	/**
	 * License key.
	 *
	 * @since 1.0
	 * @var   string
	 */
	protected $license_key;

	/**
	 * Site home URL.
	 *
	 * @since 1.0
	 * @var   string
	 */
	protected $site_url;

	/**
	 * Initialize Fillable PDFs API library.
	 *
	 * @since  1.0
	 * @access public
	 *
	 * @param string $license_key License key.
	 */
	public function __construct( $license_key ) {

		$this->license_key = $license_key;
		$this->site_url    = home_url();

	}





	// # FILES ---------------------------------------------------------------------------------------------------------

	/**
	 * Get PDF file fields.
	 *
	 * @since  2.0
	 *
	 * @param array $file       Temporary file details.
	 * @param bool  $has_fields Check if file has fields.
	 *
	 * @return array
	 * @throws Exception
	 */
	public function get_file_meta( $file, $has_fields = false ) {

		// Build request URL.
		$request_url = self::$api_url . 'files/meta';
		$request_url = $has_fields ? add_query_arg( [ 'has_fields' => 'true' ], $request_url ) : $request_url;

		// Generate boundary.
		$boundary = wp_generate_password( 24 );

		// Prepare request body.
		$body = '--' . $boundary . "\r\n";
		$body .= 'Content-Disposition: form-data; name="pdf_file"; filename="' . $file['name'] . '"' . "\r\n\r\n";
		$body .= file_get_contents( $file['tmp_name'] ) . "\r\n";
		$body .= '--' . $boundary . '--';

		// Build request arguments.
		$args = [
			'body'    => $body,
			'method'  => 'POST',
			'timeout' => 30,
			'headers' => [
				'Authorization' => 'Basic ' . base64_encode( $this->site_url . ':' . $this->license_key ),
				'Content-Type'  => 'multipart/form-data; boundary=' . $boundary,
			],
		];

		// Execute request.
		$response = wp_remote_request( $request_url, $args );

		// If request attempt threw a WordPress error, throw exception.
		if ( is_wp_error( $response ) ) {
			throw new Exception( $response->get_error_message() );
		}

		// Decode response.
		$response = json_decode( $response['body'], true );

		// If error response was received, throw exception.
		if ( isset( $response['error'] ) ) {
			throw new Exception( $response['message'] );
		}

		return $response;

	}





	// # TEMPLATES -----------------------------------------------------------------------------------------------------

	/**
	 * Create template.
	 *
	 * @since  1.0
	 *
	 * @param string $name      Template name.
	 * @param array  $file      Temporary file details.
	 *
	 * @return array
	 * @throws Exception
	 */
	public function create_template( $name = '', $file = [] ) {

		// Build request URL.
		$request_url = self::$api_url . 'templates';

		// Generate boundary.
		$boundary = wp_generate_password( 24 );

		// Prepare request body.
		$body  = '--' . $boundary . "\r\n";
		$body .= 'Content-Disposition: form-data; name="name"' . "\r\n\r\n" . $name . "\r\n";
		$body .= '--' . $boundary . "\r\n";
		$body .= 'Content-Disposition: form-data; name="pdf_file"; filename="' . $file['name'] . '"' . "\r\n\r\n";
		$body .= file_get_contents( $file['tmp_name'] ) . "\r\n";
		$body .= '--' . $boundary . '--';

		// Build request arguments.
		$args = [
			'body'    => $body,
			'method'  => 'POST',
			'timeout' => 30,
			'headers' => [
				'Authorization' => 'Basic ' . base64_encode( $this->site_url . ':' . $this->license_key ),
				'Content-Type'  => 'multipart/form-data; boundary=' . $boundary,
			],
		];

		// Execute request.
		$response = wp_remote_request( $request_url, $args );

		// If request attempt threw a WordPress error, throw exception.
		if ( is_wp_error( $response ) ) {
			throw new Exception( $response->get_error_message() );
		}

		// Decode response.
		$response = json_decode( $response['body'], true );

		// If error response was received, throw exception.
		if ( isset( $response['error'] ) ) {
			throw new Exception( $response['message'] );
		}

		return $response;

	}

	/**
	 * Delete template.
	 *
	 * @since  1.0
	 *
	 * @param string $template_id Template ID.
	 *
	 * @return array
	 * @throws Exception
	 */
	public function delete_template( $template_id = '' ) {

		return $this->make_request( 'templates/' . $template_id, [], 'DELETE' );

	}

	/**
	 * Get specific template.
	 *
	 * @since  1.0
	 *
	 * @param string $template_id Template ID.
	 *
	 * @return array
	 * @throws Exception
	 */
	public function get_template( $template_id = '' ) {

		return $this->make_request( 'templates/' . $template_id );

	}

	/**
	 * Get number of templates registered to license.
	 *
	 * @since  3.0
	 *
	 * @return array
	 * @throws Exception
	 */
	public function get_template_count() {

		return $this->make_request( 'templates/_count' );

	}

	/**
	 * Get templates for license.
	 *
	 * @since  3.0 Added $page, $per_page parameters.
	 * @since  1.0
	 *
	 * @param int $page     Page number.
	 * @param int $per_page Templates per page.
	 *
	 * @return array
	 * @throws Exception
	 */
	public function get_templates( $page = 1, $per_page = 20 ) {

		$params = [
			'page'     => $page,
			'per_page' => $per_page,
		];

		/**
		 * Determine whether to show all templates for license or templates registered to site.
		 *
		 * @since 3.0
		 *
		 * @param bool $display_all_templates Display all templates for license.
		 */
		if ( ! apply_filters( 'fg_fillablepdfs_display_all_templates', true ) ) {
			$params['current_site'] = true;
		}

		return $this->make_request( 'templates', $params );

	}

	/**
	 * Get original file for template.
	 *
	 * @since  1.0
	 *
	 * @param string $template_id Template ID.
	 *
	 * @return array
	 * @throws Exception
	 */
	public function get_template_file( $template_id = '' ) {

		return $this->make_request( 'templates/' . $template_id . '/file' );

	}

	/**
	 * Create template.
	 *
	 * @since  1.0
	 *
	 * @param string     $template_id Template ID.
	 * @param string     $name        Template name.
	 * @param array|null $file        Temporary file details.
	 *
	 * @return array
	 * @throws Exception
	 */
	public function save_template( $template_id, $name, $file = null ) {

		// If no file is provided, use default method.
		if ( ! is_array( $file ) ) {
			return $this->make_request( 'templates/' . $template_id, [ 'name' => $name ], 'PUT' );
		}

		// Build request URL.
		$request_url = self::$api_url . 'templates/' . $template_id;

		// Generate boundary.
		$boundary = wp_generate_password( 24 );

		// Prepare request body.
		$body  = '--' . $boundary . "\r\n";
		$body .= 'Content-Disposition: form-data; name="name"' . "\r\n\r\n" . $name . "\r\n";
		$body .= '--' . $boundary . "\r\n";
		$body .= 'Content-Disposition: form-data; name="pdf_file"; filename="' . $file['name'] . '"' . "\r\n\r\n";
		$body .= file_get_contents( $file['tmp_name'] ) . "\r\n";
		$body .= '--' . $boundary . '--';

		// Build request arguments.
		$args = [
			'body'    => $body,
			'method'  => 'POST',
			'timeout' => 30,
			'headers' => [
				'Authorization' => 'Basic ' . base64_encode( $this->site_url . ':' . $this->license_key ),
				'Content-Type'  => 'multipart/form-data; boundary=' . $boundary,
			],
		];

		// Execute request.
		$response = wp_remote_request( $request_url, $args );

		// If request attempt threw a WordPress error, throw exception.
		if ( is_wp_error( $response ) ) {
			return $response;
		}

		// Decode response.
		$response = json_decode( $response['body'], true );

		// If error response was received, throw exception.
		if ( isset( $response['error'] ) ) {
			throw new Exception( $response['message'] );
		}

		return $response;

	}

	/**
	 * Generate PDF.
	 *
	 * @since  1.0
	 *
	 * @param string $template_id Template ID.
	 * @param array  $meta        PDF meta.
	 *
	 * @return string
	 * @throws Exception
	 */
	public function generate( $template_id = '', $meta = [] ) {

		return $this->make_request( 'templates/' . $template_id . '/generate', $meta, 'POST' );

	}





	// # LICENSE -------------------------------------------------------------------------------------------------------

	/**
	 * Get information about current license.
	 *
	 * @since  1.0
	 *
	 * @return array
	 * @throws Exception
	 */
	public function get_license_info() {

		static $license_info;

		if ( ! isset( $license_info ) ) {
			$license_info = $this->make_request( 'license' );
		}

		return $license_info;

	}





	// # REQUEST METHODS -----------------------------------------------------------------------------------------------

	/**
	 * Make API request.
	 *
	 * @since  1.0
	 *
	 * @param string $path    Request path.
	 * @param array  $options Request options.
	 * @param string $method  Request method. Defaults to GET.
	 *
	 * @return array|string
	 * @throws Exception
	 */
	private function make_request( $path, $options = [], $method = 'GET' ) {

		// Build request URL.
		$request_url = self::$api_url . $path;

		// Add options if this is a GET request.
		if ( 'GET' === $method ) {
			$request_url = add_query_arg( $options, $request_url );
		}

		// Build request arguments.
		$args = [
			'body'    => 'GET' !== $method ? wp_json_encode( $options ) : null,
			'method'  => $method,
			'timeout' => 30,
			'headers' => [
				'Authorization' => 'Basic ' . base64_encode( $this->site_url . ':' . $this->license_key ),
				'Content-Type'  => 'application/json'
			],
		];

		// Execute request.
		$response = wp_remote_request( $request_url, $args );

		// If request attempt threw a WordPress error, throw exception.
		if ( is_wp_error( $response ) ) {
			throw new Exception( $response->get_error_message() );
		}

		// Decode response.
		$response_body = fg_fillablepdfs()->maybe_decode_json( $response['body'] );

		// If error response was received, throw exception.
		if ( isset( $response_body['error'] ) ) {
			throw new Exception( $response_body['message'], wp_remote_retrieve_response_code( $response ) );
		}

		return $response_body;

	}

}
