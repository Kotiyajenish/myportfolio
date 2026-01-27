<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @package Jenish_Search_Tracker
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

global $wpdb;

/**
 * Delete custom database table
 */
$table_name = $wpdb->prefix . 'jst_visitor_logs';
$wpdb->query( "DROP TABLE IF EXISTS {$table_name}" );

/**
 * Delete plugin options (if any in future)
 */
// delete_option( 'jst_settings' );
