<?php

/**
 * The main page is generated in the admin panel.
 */
function ol_admin_page_action() {
	$pagination = ol_get_click_pagination();

	ol_sing_up_user();
	ol_show_template(
		array(
			'action'      => 'admin',
			'restaurants' => ol_get_restaurants_db( $pagination ),
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
			'action' => 'create-post',
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

	ol_remove_restaurant_db( esc_html( $_GET['id'] ) );
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
			'action'     => 'edit-post',
			'restaurant' => ol_get_restaurant_by_id_db( esc_html( $_GET['id'] ) ),
		)
	);
}

