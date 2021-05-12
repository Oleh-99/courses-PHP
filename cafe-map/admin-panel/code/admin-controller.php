<?php

function admin_page_action() {

	ol_sing_up_user();
	$pagination = get_ol_click_pagination();

	show_template(
		array(
			'action'      => 'admin-php',
			'restaurants' => get_restaurants_db( $pagination ),
			'pagination'  => get_ol_count_cafe(),
		)
	);
}

function add_post_action() {

	ol_create_post();

	show_template(
		array(
			'action' => 'create-post',
		)
	);
}

function page_404() {
	show_template(
		array(
			'action' => '404',
		)
	);
}

function ol_exit_account() {
	unset( $_SESSION['login'] );
	header( 'Location: ../index.php' );
}

function admin_remove_cafe() {
	if ( empty( $_GET['id'] ) ) {
		return;
	}

	remove_restaurant_db( esc_html( $_GET['id'] ) );
	header( 'Location: index.php' );
}

function admin_edit_cafe() {
	if ( empty( $_GET['id'] ) ) {
		return;
	}
	ol_edit_post();

	show_template(
		array(
			'action'     => 'edit-post',
			'restaurant' => get_restaurant_by_id_db( esc_html( $_GET['id'] ) ),
		)
	);
}

