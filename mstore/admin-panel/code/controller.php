<?php

/**
 * Home page generation.
 */
function ol_admin_page() {
	show_template(
		array(
			'action'  => 'home',
			'product' => ol_get_product_db(),
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
