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

		case 'sing-in':
			ol_sing_in();
			break;

		case 'exit':
			ol_exit();
			break;

		case 'add-favorite':
			ol_add_favorite();
			break;

		case 'favorite':
			ol_view_favorite();
			break;

		default:
			ol_page_404();
			break;
	}
}
