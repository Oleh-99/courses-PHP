<?php

function router() {
	$action = esc_html( $_GET['admin-action'] );

	if ( empty( $action ) ) {
		$action = 'admin';
	}

	switch ( $action ) {
		case 'admin':
			admin_page_action();
			break;

		case 'contact':
			contact_page_action();
			break;

		default:
			page_404();
			break;
	}
}