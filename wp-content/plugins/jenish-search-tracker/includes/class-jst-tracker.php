<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class JST_Tracker {

	public function __construct() {
		add_action( 'init', array( $this, 'set_visitor_id' ), 0 );
		add_action( 'template_redirect', array( $this, 'capture_visit' ) );
	}

	/**
	 * Set unique visitor ID (cookie)
	 */
	public function set_visitor_id() {

		if ( is_admin() || headers_sent() ) {
			return;
		}

		if ( isset( $_COOKIE['jst_visitor_id'] ) ) {
			return;
		}

		$visitor_id = wp_generate_uuid4();

		setcookie(
			'jst_visitor_id',
			$visitor_id,
			time() + ( 30 * DAY_IN_SECONDS ),
			COOKIEPATH,
			COOKIE_DOMAIN,
			is_ssl(),
			true
		);

		$_COOKIE['jst_visitor_id'] = $visitor_id;
	}

	/**
	 * Get Country, Region, City from IP
	 */
	private function get_location_by_ip( $ip ) {

		if ( empty( $ip ) || $ip === '127.0.0.1' ) {
			return false;
		}

		$response = wp_remote_get(
			"http://ip-api.com/json/{$ip}",
			array( 'timeout' => 5 )
		);

		if ( is_wp_error( $response ) ) {
			return false;
		}

		$data = json_decode( wp_remote_retrieve_body( $response ), true );

		if ( empty( $data['status'] ) || 'success' !== $data['status'] ) {
			return false;
		}

		return array(
			'country' => sanitize_text_field( $data['country'] ?? '' ),
			'region'  => sanitize_text_field( $data['regionName'] ?? '' ),
			'city'    => sanitize_text_field( $data['city'] ?? '' ),
		);
	}

	/**
	 * Capture visit data
	 */
	public function capture_visit() {

		if ( is_admin() ) {
			return;
		}

		$visitor_id = $_COOKIE['jst_visitor_id'] ?? null;
		if ( ! $visitor_id ) {
			return;
		}

		static $logged = false;
		if ( $logged ) return;
		$logged = true;

		global $wpdb;
		$wpdb->show_errors();

		$table = $wpdb->prefix . 'jst_visitor_logs';

		if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table}'" ) !== $table ) {
			error_log( 'JST TABLE NOT FOUND' );
			return;
		}

		$ip = sanitize_text_field( $_SERVER['REMOTE_ADDR'] ?? '' );

		$location = $this->get_location_by_ip( $ip );
		$location = $location ?: array(
			'country' => '',
			'region'  => '',
			'city'    => '',
		);

		$user_id = get_current_user_id();
		$user_id = $user_id ? $user_id : 0;

		$wpdb->insert(
			$table,
			array(
				'visitor_id' => sanitize_text_field( $visitor_id ),
				'ip_address' => $ip,
				'user_id'    => $user_id,
				'page_url'   => esc_url_raw( home_url( add_query_arg( null, null ) ) ),
				'user_agent'=> sanitize_textarea_field( $_SERVER['HTTP_USER_AGENT'] ?? '' ),
				'country'   => $location['country'],
				'region'    => $location['region'],
				'city'      => $location['city'],
				'visited_at'=> current_time( 'mysql' ),
			),
			array( '%s','%s','%d','%s','%s','%s','%s','%s','%s' )
		);

		if ( ! $wpdb->insert_id ) {
			error_log( 'JST INSERT ERROR: ' . $wpdb->last_error );
		}
	}

}

new JST_Tracker();
