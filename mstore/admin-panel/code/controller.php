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
	ol_sing_in_user();
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
 * Add product generation.
 */
function ol_view_add_product() {
	ol_add_product();
	show_template(
		array(
			'action'   => 'product-form',
			'btn-name' => 'Add product',
		)
	);
}

/**
 * Remove product.
 */
function ol_remove_product() {
	if ( empty( $_GET['id'] ) ) {
		return;
	}

	$result = ol_remove_product_db( esc_html( $_GET['id'] ) );

	if ( $result ) {
		ol_add_errors( 'Product remove', 'success' );
		ol_clear_url();
	} else {
		ol_add_errors( 'Product not remove' );
	}
}

/**
 * Edit page generation.
 */
function ol_view_edit_product() {
	if ( empty( $_GET['id'] ) ) {
		return;
	}

	ol_edit_product();
	show_template(
		array(
			'action'   => 'product-form',
			'product'  => ol_get_product_by_id_db( esc_html( $_GET['id'] ) ),
			'btn-name' => 'Edit product',
		)
	);
}

/**
 * Exit user account.
 */
function ol_exit_user() {
	unset( $_SESSION['mstore-login'] );
	ol_clear_url();
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
