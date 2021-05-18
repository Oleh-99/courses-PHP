<?php

/**
 * Site routing.
 */
function ol_router() {
	$action = esc_html( $_GET['admin-action'] );

	if ( empty( $action ) ) {
		$action = 'admin';
	}

	switch ( $action ) {
		case 'admin':
			ol_admin_page_action();
			break;

		case 'add':
			ol_add_post_action();
			break;

		case 'page':
			ol_page();
			break;

		case 'add_page':
			ol_add_page();
			break;

		case 'edit-page':
			ol_edit_page();
			break;

		case 'delete-page':
			ol_delete_page();
			break;

		case 'exit':
			ol_exit_account();
			break;

		case 'edit':
			ol_admin_edit_cafe();
			break;

		case 'remove':
			ol_admin_remove_cafe();
			break;

		default:
			ol_page_404();
			break;
	}
}
