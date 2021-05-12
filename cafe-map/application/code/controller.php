<?php

/**
 * Home_page_action
 * Generates a home page
 */
function home_page_action() {
	$restaurants                = array();
	$restaurants['restaurants'] = get_restaurants_db();
	$restaurants['action']      = 'home';

	show_template( $restaurants );
}

/**
 * Contact_page_action
 * Generates a contact page
 */
function contact_page_action() {
	$restaurants           = array();
	$restaurants['action'] = 'contact';

	show_template( $restaurants );
}

/**
 * Page_404
 * Generates a 404 page
 */
function page_404() {
	$restaurants           = array();
	$restaurants['action'] = '404';

	show_template( $restaurants );
}
