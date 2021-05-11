<?php

/**
 * Esc_html
 *
 * @param  mixed $data
 * renders data
 */
function esc_html( $data ) {
	return htmlspecialchars( trim( $data ) );
}

/**
 * Ar
 *
 * @param  mixed $data => array
 * array output
 */
function ar( $data ) {
	echo '<pre>';
	print_r( $data );
	echo '</pre>';
}
