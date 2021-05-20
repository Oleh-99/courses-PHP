<?php

/**
 * Home page generation.
 */
function ol_home_page() {
	ol_remove_product();
	show_template(
		array(
			'action' => 'home',
		)
	);
}

/**
 * Shop page generation.
 */
function ol_shop_page() {
	ol_add_product_to_car();
	ol_remove_product();
	show_template(
		array(
			'action'   => 'shop',
			'products' => ol_get_product_db(),
		)
	);
}

/**
 * 404 page generation.
 */
function ol_page_404() {
	show_template(
		array(
			'action' => '404',
		)
	);
}