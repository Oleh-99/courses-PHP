<?php

/**
 * The main page is generated in the admin panel.
 */
function ol_admin_page_action() {
	ol_sing_up_user();
	ol_show_template(
		array(
			'action'      => 'admin',
			'restaurants' => ol_get_restaurants_db( ol_get_click_pagination() ),
			'pagination'  => ol_get_count_cafe(),
		)
	);
}

/**
 * A form is generated to add a post to the admin panel.
 */
function ol_add_post_action() {
	ol_create_post();
	ol_show_template(
		array(
			'action'     => 'form-post',
			'btn-name'   => 'Create',
			'restaurant' => array( [] ),
		)
	);
}

/**
 * 404 pages are generated.
 */
function ol_page_404() {
	ol_show_template(
		array(
			'action' => '404',
		)
	);
}

/**
 * Log out of the admin panel account.
 */
function ol_exit_account() {
	unset( $_SESSION['login'] );
	header( 'Location: ../index.php' );
}

/**
 * Delete from the post database.
 */
function ol_admin_remove_cafe() {
	if ( empty( $_GET['id'] ) ) {
		return;
	}

	$result = ol_remove_restaurant_db( esc_html( $_GET['id'] ) );

	if ( $result ) {
		ol_add_errors( ' This post has been deleted ', 'success' );
	} else {
		ol_add_errors( ' This post has not been deleted ' );
	}

	ol_clear_url();
}

/**
 * A form is generated to edit the post.
 */
function ol_admin_edit_cafe() {
	if ( empty( $_GET['id'] ) ) {
		return;
	}

	ol_edit_post();
	ol_show_template(
		array(
			'action'     => 'form-post',
			'btn-name'   => 'Edit',
			'restaurant' => ol_get_restaurant_by_id_db( esc_html( $_GET['id'] ) ),
		)
	);
}

/**
 * Output of pages.
 */
function ol_page() {
	ol_show_template(
		array(
			'action' => 'pages',
			'pages'  => ol_get_page_db(),
		)
	);
}

/**
 * Delete page.
 */
function ol_delete_page() {
	if ( empty( $_GET['id'] ) ) {
		return;
	}

	$result = ol_remove_page_db( esc_html( $_GET['id'] ) );

	if ( $result ) {
		ol_add_errors( ' This page has been deleted ', 'success' );
	} else {
		ol_add_errors( ' This page has not been deleted ' );
	}

	header( 'Location: index.php?admin-action=page' );
}

/**
 * Add a page.
 */
function ol_add_page() {
	ol_add_page__from_db();
	ol_show_template(
		array(
			'action'   => 'add-page',
			'edit'     => array( [] ),
			'btn-name' => 'Create',
		)
	);
}

/**
 * Editing a page.
 */
function ol_edit_page() {
	if ( empty( $_GET['id'] ) ) {
		return;
	}

	ol_edit_page__from_db();
	ol_show_template(
		array(
			'action'   => 'add-page',
			'edit'     => ol_get_page_by_id_db( esc_html( $_GET[ 'id' ] ) ),
			'btn-name' => 'Edit',
		)
	);
}
