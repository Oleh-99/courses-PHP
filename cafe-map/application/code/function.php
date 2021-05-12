<?php

/**
 * Show_template
 * Page generation
 * @param array $restaurants
 */
function show_template( $restaurants ) {
	extract( $restaurants );

	include 'application/view/header.tpl.php';
	include 'application/view/' . $action . '.tpl.php';
	include 'application/view/footer.tpl.php';
}

function get_current_route() {
	return esc_html( $_GET['action'] );
}

/**
 * Esc_html
 *
 * @param  string $data
 * renders data
 */
function esc_html( $data ) {
	return htmlspecialchars( trim( $data ) );
}

/**
 * Ar
 *
 * @param  array $data
 * array output
 */
function ar( $data ) {
	echo '<pre>';
	print_r( $data );
	echo '</pre>';
}
