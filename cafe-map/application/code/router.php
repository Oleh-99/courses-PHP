<?php

/**
 * Site routing
 */
function router() {
	$action = esc_html( $_GET['action'] );

	if ( empty( $action ) ) {
		$action = 'home';
	}

	switch ( $action ) {
		case 'home':
			home_page_action();
			break;

		case 'contact':
			contact_page_action();
			break;

		default:
			page_404();
			break;
	}
}
