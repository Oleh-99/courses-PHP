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
			ol_home_page_action();
			break;
			
		case 'page':
			ol_view_page();
			break;
			
		default:
			ol_page_404();
			break;
	}
}
