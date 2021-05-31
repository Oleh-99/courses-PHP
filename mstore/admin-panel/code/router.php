<?php
/**
 * Router.
 *
 * @package Funсtion.
 */

/**
 * Site routing.
 */
function ol_router() {
	$action = esc_html( $_GET['action'] );

	if ( empty( $action ) ) {
		$action = 'admin';
	}

	switch ( $action ) {
		case 'admin':
			ol_admin_page();
			break;

		case 'orders':
			ol_order_page();
			break;

		case 'view-order':
			ol_view_order_page();
			break;

		case 'remove':
			ol_remove_product();
			break;

		case 'add-product':
			ol_view_add_product();
			break;

		case 'edit':
			ol_view_edit_product();
			break;

		case 'exit-user':
			ol_exit_user();
			break;

		case 'category':
			ol_category_view();
			break;

		case 'add-category':
			ol_add_category_view();
			break;

		case 'edit-category':
			ol_edit_category_view();
			break;

		default:
			ol_page_404();
			break;
	}
}
