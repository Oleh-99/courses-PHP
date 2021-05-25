<?php
/**
 * Router.
 *
 * @package Funtion.
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

		default:
			ol_page_404();
			break;
	}
}