<?php

/**
 * Generates a home page.
 */
function ol_home_page_action() {
	show_template(
		array(
			'action'      => 'home',
			'restaurants' => ol_get_restaurants_db( ol_get_click_pagination() ),
			'pagination'  => ol_get_count_cafe(),
			'page'        => ol_get_view_page_db(),
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
