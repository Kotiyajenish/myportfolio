<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class JST_Database {

	/**
	 * Create database table on plugin activation
	 */
	public static function create_table() {
		global $wpdb;

		$table_name      = $wpdb->prefix . 'jst_visitor_logs';
		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE wp_jst_visitor_logs (
				id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
				visitor_id VARCHAR(100) NOT NULL,
				ip_address VARCHAR(45) DEFAULT NULL,
				user_id BIGINT DEFAULT NULL,
				page_url TEXT,
				user_agent TEXT,
				country VARCHAR(100),
				region VARCHAR(100),
				city VARCHAR(100),
				visited_at DATETIME NOT NULL,
				PRIMARY KEY (id),
				KEY visitor_id (visitor_id)
		) {$charset_collate};";

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		dbDelta( $sql );
	}
}
