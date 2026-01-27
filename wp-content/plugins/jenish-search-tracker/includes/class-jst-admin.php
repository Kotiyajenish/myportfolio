<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class JST_Admin {

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'register_menu' ) );
	}

	/**
	 * Register admin menu
	 */
	public function register_menu() {
		add_menu_page(
			__( 'Website Visitor Tracking', 'jenish-search-tracker' ),
			__( 'Visitor Tracking', 'jenish-search-tracker' ),
			'manage_options',
			'jst-search-tracker',
			array( $this, 'render_page' ),
			'dashicons-location',
			25
		);
	}

	/**
	 * Render admin page
	 */
	public function render_page() {
		global $wpdb;

		$table = $wpdb->prefix . 'jst_visitor_logs';

		$results = $wpdb->get_results(
			"SELECT 
				visitor_id,
				ip_address,
				country,
				region,
				city,
				COUNT(*) AS visit_count,
				MIN(visited_at) AS first_visit,
				MAX(visited_at) AS last_visit
			FROM {$table}
			GROUP BY visitor_id
			ORDER BY last_visit DESC"
		);
		?>
		<div class="wrap">
			<h1><?php esc_html_e( 'Website Visitor Tracking', 'jenish-search-tracker' ); ?></h1>

			<table class="widefat striped">
				<thead>
					<tr>
						<th><?php esc_html_e( 'Visitor ID', 'jenish-search-tracker' ); ?></th>
						<th><?php esc_html_e( 'IP Address', 'jenish-search-tracker' ); ?></th>
						<th><?php esc_html_e( 'Total Visits', 'jenish-search-tracker' ); ?></th>
						<th><?php esc_html_e( 'Country', 'jenish-search-tracker' ); ?></th>
						<th><?php esc_html_e( 'Region', 'jenish-search-tracker' ); ?></th>
						<th><?php esc_html_e( 'City', 'jenish-search-tracker' ); ?></th>
						<th><?php esc_html_e( 'First Visit', 'jenish-search-tracker' ); ?></th>
						<th><?php esc_html_e( 'Last Visit', 'jenish-search-tracker' ); ?></th>
					</tr>
				</thead>
				<tbody>
				<?php if ( $results ) : ?>
					<?php foreach ( $results as $row ) : ?>
						<tr>
							<td><?php echo esc_html( $row->visitor_id ); ?></td>
							<td><?php echo esc_html( $row->ip_address ); ?></td>
							<td><?php echo esc_html( $row->visit_count ); ?></td>
							<td><?php echo esc_html( $row->country ?: '-' ); ?></td>
							<td><?php echo esc_html( $row->region ?: '-' ); ?></td>
							<td><?php echo esc_html( $row->city ?: '-' ); ?></td>
							<td><?php echo esc_html( $row->first_visit ); ?></td>
							<td><?php echo esc_html( $row->last_visit ); ?></td>
						</tr>
					<?php endforeach; ?>
				<?php else : ?>
					<tr>
						<td colspan="8"><?php esc_html_e( 'No visits yet.', 'jenish-search-tracker' ); ?></td>
					</tr>
				<?php endif; ?>
				</tbody>
			</table>
		</div>
		<?php
	}
}

new JST_Admin();
