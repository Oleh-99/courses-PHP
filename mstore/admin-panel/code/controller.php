<?php
/**
 * Controller.
 *
 * @package Funtion.
 */

/**
 * Home page generation.
 */
function ol_admin_page() {
	show_template(
		array(
			'action'  => 'home',
			'product' => ol_get_product_db(),
		)
	);
}

/**
 * Orders page generation.
 */
function ol_order_page() {
	show_template(
		array(
			'action' => 'orders',
			'orders' => ol_get_orders_db(),
		)
	);
}

/**
 * View order page generation.
 */
function ol_view_order_page() {
	show_template(
		array(
			'action' => 'order-view',
			'order'  => ol_get_order_by_id_db( esc_html( $_GET['id'] ) ),
		)
	);
}

/**
 * 404 page generation.
 */
function ol_page_404() {
	show_template(
		array(
			'action' => '404',
		)
	);
}
