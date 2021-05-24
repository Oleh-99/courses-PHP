<?php
/**
 * Router.
 *
 * @package Function.
 */

/**
 * Site routing.
 */
function ol_router() {
	$action = esc_html( $_GET['action'] );

	if ( empty( $action ) ) {
		$action = 'home';
	}

	switch ( $action ) {
		case 'home':
			ol_home_page();
			break;

		case 'shop':
			ol_shop_page();
			break;

		case 'single-product':
			ol_single_product_page();
			break;

		case 'view-card':
			ol_view_card();
			break;

		case 'checkout':
			ol_checkout();
			break;

		case 'order-complete':
			ol_order_complete();
			break;

		default:
			ol_page_404();
			break;
	}
}
