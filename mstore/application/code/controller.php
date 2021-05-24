<?php
/**
 * Controller.
 *
 * @package Function.
 */

/**
 * Home page generation.
 */
function ol_home_page() {
	ol_add_card_with_single();
	ol_add_card_with_card();
	ol_remove_product();
	ol_add_order();
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
	$page = ol_view_page_product();
	ol_add_product_to_car();
	ol_remove_product();
	show_template(
		array(
			'action'     => 'shop',
			'products'   => ol_get_product_db( $page ),
			'pagination' => ol_get_count_product_db(),
		)
	);
}

/**
 * Single-product page generation.
 */
function ol_single_product_page() {
	if ( empty( $_GET['id'] ) ) {
		ol_clear_url();
	}

	ol_remove_product();
	show_template(
		array(
			'action'  => 'single-product',
			'product' => ol_get_product_by_id_db( esc_html( $_GET['id'] ) ),
		)
	);
}

/**
 * View card page generation.
 */
function ol_view_card() {
	ol_remove_product();
	show_template(
		array(
			'action' => 'view-card',
			'card'   => ol_get_product_with_card(),
		)
	);
}

/**
 * Checkout page generation.
 */
function ol_checkout() {
	show_template(
		array(
			'action' => 'checkout',
		)
	);
}

/**
 * Order Complete page generation.
 */
function ol_order_complete() {
	show_template(
		array(
			'action'  => 'order',
			'product' => ol_get_product_with_card(),
		)
	);
	unset( $_SESSION['card'] );
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
