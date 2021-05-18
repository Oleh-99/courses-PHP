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
 * Renders data.
 * @param  string $data
 */
function esc_html( $data ) {
	return htmlspecialchars( trim( $data ) );
}

/**
 * array output.
 * @param  array $data
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

/**
 * Check for active or page.
 * @return string
 */
function ol_get_current( $data, $id = 0 ) {
	if ( ( $data === $_GET['action'] && 0 === $id ) || ( $data === $_GET['action'] && $_GET['id'] === $id ) || ( empty( $_GET['action'] ) && 'home' === $data ) ) {
		return 'active';
	} else {
		return '';
	}
}
