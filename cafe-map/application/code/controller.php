<?php

/**
 * Generates a home page.
 */
function ol_home_page_action() {
	$count = ol_get_click_pagination();

	show_template(
		array(
			'action'      => 'home',
			'restaurants' => ol_get_restaurants_db( $count ),
			'pagination'  => ol_get_count_cafe(),
			'page'        => ol_get_view_page_db(),
		)
	);
}

function ol_view_page() {
	if ( empty( $_GET['id'] ) ) {
		ol_page_404();
		return;
	}
	
	$id = esc_html( $_GET['id'] );
	
	show_template(
		array(
			'action'  => 'page',
			'page'    => ol_get_view_page_db(),
			'content' => ol_get_view_page_by_id_db( $id ),
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
