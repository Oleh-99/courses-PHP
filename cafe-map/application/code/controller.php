<?php

/**
 * Generates a home page.
 */
function ol_home_page_action() {
	ol_add_favorite();
	show_template(
		array(
			'action'      => 'home',
			'restaurants' => ol_get_restaurants_db( ol_get_click_pagination() ),
			'pagination'  => ol_get_count_cafe(),
			'page'        => ol_get_view_page_db(),
			'favorite'    => ol_get_favorite(),
		)
	);
}

/**
 * Generates a page.
 */
function ol_view_page() {
	if ( empty( $_GET['id'] ) ) {
		ol_page_404();
		return;
	}

	show_template(
		array(
			'action'  => 'page',
			'page'    => ol_get_view_page_db(),
			'content' => ol_get_view_page_by_id_db( esc_html( $_GET['id'] ) ),
		)
	);
}

/**
 * User login.
 */
function ol_sing_in() {
	ol_render_form();
	show_template(
		array(
			'action' => 'sing-in',
			'page'   => ol_get_view_page_db(),
		)
	);
}

/**
 * User output.
 */
function ol_exit() {
	unset( $_SESSION['login'] );
	unset( $_SESSION['id'] );
	ol_clear_url();
}

/**
 * Adding favorite restaurants.
 */
function ol_add_favorite() {
	$favorite_user = ol_get_data_in_db( $_SESSION['id'] );

	ol_render_favorite( $favorite_user );
}

/**
 * Generate a page with your favorite restaurants.
 */
function ol_view_favorite() {
	ol_add_favorite();
	$favorite_cafe = ol_get_restaurants_favorite();
	$action        = 'home';

	if ( ! $favorite_cafe ) {
		$action = 'not-favorite';
	}

	show_template(
		array(
			'action'      => $action,
			'restaurants' => $favorite_cafe,
			'pagination'  => 0,
			'page'        => ol_get_view_page_db(),
			'favorite'    => ol_get_favorite(),
		)
	);
}

/**
 * Generates a 404 page.
 */
function ol_page_404() {
	show_template(
		array(
			'action' => '404',
			'page'   => ol_get_view_page_db(),
		)
	);
}
