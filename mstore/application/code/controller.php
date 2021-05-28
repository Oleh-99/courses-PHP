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
	ol_view_category_product();
	ol_add_product_to_cart();
	ol_view_product_in_page();
	ol_grid_page();
	show_template(
		array(
			'action'     => 'shop',
			'products'   => ol_get_product_db( ol_view_page_product() ),
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

	ol_add_cart_with_single();
	ol_add_comment();
	show_template(
		array(
			'action'  => 'single-product',
			'product' => ol_get_product_by_id_db( esc_html( $_GET['id'] ) ),
			'comment' => ol_get_comment_product_db ( esc_html( $_GET['id'] ) )
		)
	);
}

/**
 * View card page generation.
 */
function ol_view_card() {
	if ( ! $_SESSION['mstore_cart'] ) {
		ol_clear_url();
	}

	ol_add_card_with_basket();
	show_template(
		array(
			'action' => 'view-cart',
			'card'   => ol_get_product_with_cart(),
		)
	);
}

/**
 * Checkout page generation.
 */
function ol_checkout() {
	if ( ! $_SESSION['mstore_cart'] ) {
		ol_clear_url();
	}

	ol_add_order();
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
	if ( ! $_SESSION['mstore_cart'] ) {
		ol_clear_url();
	}

	show_template(
		array(
			'action'  => 'order',
			'product' => ol_get_product_with_cart(),
		)
	);
	unset( $_SESSION['mstore_cart'] );
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
