<?php

function router() {
	$action = esc_html( $_GET['admin-action'] );

	if ( empty( $action ) ) {
		$action = 'admin';
	}

	if ( ! $_SESSION['login'] && ! $_POST ) {
		show_template( array(
			'action' => 'sing-in',
		) );
		return;
	}

	switch ( $action ) {
		case 'admin':
			admin_page_action();
			break;

		case 'add':
			add_post_action();
			break;

		case 'exit':
			ol_exit_account();
			break;

		case 'edit':
			admin_edit_cafe();
			break;

		case 'remove':
			admin_remove_cafe();
			break;

		default:
			page_404();
			break;
	}
}