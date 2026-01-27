<?php
/**
 * Plugin Name: Jenish Search Tracker
 * Plugin URI: https://wordpress.org/plugins/jenish-search-tracker/
 * Description: Tracks anonymous website search activity for analytics purposes.
 * Version: 1.0.1
 * Author: Jenish Kotiya
 * Author URI: https://profiles.wordpress.org/jenish1234/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: jenish-search-tracker
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Plugin Constants (Prefixed)
 */
define( 'JST_VERSION', '1.0.1' );
define( 'JST_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'JST_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/**
 * Activation Hook
 */
require_once JST_PLUGIN_PATH . 'includes/class-jst-database.php';
register_activation_hook( __FILE__, array( 'JST_Database', 'create_table' ) );

/**
 * Load Core Plugin Files
 */
require_once JST_PLUGIN_PATH . 'includes/class-jst-tracker.php';
require_once JST_PLUGIN_PATH . 'includes/class-jst-admin.php';
