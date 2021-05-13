<?php

/**
 * Generates a home page
 */
function home_page_action() {
	$restaurants                = array();
	$restaurants['restaurants'] = get_restaurants_db();
	$restaurants['action']      = 'home';
	// $restaurants['pagination']  = get_count_cafe();

	show_template( $restaurants );
}

/**
 * Generates a 404 page
 */
function page_404() {
	$restaurants           = array();
	$restaurants['action'] = '404';

	show_template( $restaurants );
}
