<?php

/**
 * Page generation
 * @param array $restaurants
 */
function show_template( $restaurants ) {
	include 'application/view/header.tpl.php';
	include 'application/view/' . $restaurants['action'] . '.tpl.php';
	include 'application/view/footer.tpl.php';
}

/**
 * Esc_html
 * @param  string $data
 * renders data
 */
function esc_html( $data ) {
	return htmlspecialchars( trim( $data ) );
}

/**
 * Ar
 * @param  array $data
 * array output
 */
function ar( $data ) {
	echo '<pre>';
	print_r( $data );
	echo '</pre>';
}

function ol_get_count_cafe() {
	return ol_get_count_restaurants_db();
}

/**
 * Checks which page of the asset.
 * @return integer
 */
function ol_get_click_pagination() {
	if ( empty( $_GET['pagination'] ) ) {
		return 0;
	}

	return esc_html( $_GET['pagination'] );
}