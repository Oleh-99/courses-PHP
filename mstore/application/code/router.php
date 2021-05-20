<?php

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

		default:
			ol_page_404();
			break;
	}
}
