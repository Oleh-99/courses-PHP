<?php

/**
 * Generates a home page.
 */
function ol_home_page_action() {
	$count = ol_get_click_pagination();
	$restaurants                = array();
	$restaurants['action']      = 'home';
	$restaurants['restaurants'] = ol_get_restaurants_db( $count );
	$restaurants['pagination']  = ol_get_count_cafe();

	show_template( $restaurants );
}

/**
 * Generates a 404 page.
 */
function ol_page_404() {
	$restaurants           = array();
	$restaurants['action'] = '404';

	show_template( $restaurants );
}
