<?php
/**
 * Function.
 *
 * @package Function.
 */

session_start();

/**
 * Renders data.
 *
 * @param mixed $data Data.
 */
function esc_html( $data ) {
	return htmlspecialchars( trim( $data ) );
}

/**
 * Array output.
 *
 * @param array $data Array data.
 */
function ar( $data ) {
	echo '<pre>';
	print_r( $data );
	echo '</pre>';
}

/**
 * Clear url.
 *
 * @param string $action Action page.
 */
function ol_clear_url( $action = '' ) {
	header( 'Location: index.php' . $action );
	die();
}

/**
 * Adding products to cart.
 */
function ol_add_product_to_car() {
	if ( empty( $_GET['add-card'] ) ) {
		return;
	}

	$product_id  = esc_html( $_GET['add-card'] );
	$action_page = '';

	ol_add_to_cart( $product_id );

	if ( ! empty( $_GET['page'] ) ) {
		$action_page = '&page=' . esc_html( $_GET['page'] );
	}

	ol_clear_url( '?action=' . esc_html( $_GET['action'] ) . $action_page );
}

/**
 * Processes the form on single product.
 */
function ol_add_card_with_single() {
	if ( empty( $_GET['id'] ) || empty( $_GET['numbers'] ) ) {
		return;
	}

	$product_id = esc_html( $_GET['id'] );
	$count      = esc_html( $_GET['numbers'] ) - 1;

	if ( 0 > $count ) {
		return;
	}

	ol_add_to_cart( $product_id, $count );

	 ol_clear_url( '?action=single-product&id=' . $product_id );
}

/**
 * Processes the form on card.
 */
function ol_add_card_with_card() {
	if ( empty( $_GET['card_id'] ) || empty( $_GET['card_numbers'] ) ) {
		return;
	}

	$product_id = esc_html( $_GET['card_id'] );
	$count      = esc_html( $_GET['card_numbers'] ) - 1;

	if ( 0 > $count ) {
		return;
	}

	ol_add_to_cart( $product_id, $count );

	ol_clear_url( '?action=view-card' );
}

function ol_add_order() {
	if ( ! isset( $_GET['checkout'] ) ) {
		return;
	}

	if ( empty( $_GET['name'] ) ) {
		ol_add_errors( 'Enter a name' );
	}
	if ( empty( $_GET['last-name'] ) ) {
		ol_add_errors( 'Enter a last-name' );
	}
	if ( empty( $_GET['country'] ) ) {
		ol_add_errors( 'Enter a country' );
	}
	if ( empty( $_GET['city'] ) ) {
		ol_add_errors( 'Enter a city' );
	}
	if ( empty( $_GET['address'] ) ) {
		ol_add_errors( 'Enter a address' );
	}
	if ( empty( $_GET['zip'] ) ) {
		ol_add_errors( 'Enter a zip' );
	}
	if ( empty( $_GET['phone'] ) ) {
		ol_add_errors( 'Enter a phone' );
	}
	if ( empty( $_GET['email'] ) ) {
		ol_add_errors( 'Enter a email' );
	}

	if ( ol_get_check_error() ) {
		ol_clear_url( '?action=checkout' );
		return;
	}

	$result = ol_add_order_db(
		array(
			'name'      => esc_html( $_GET['name'] ),
			'last-name' => esc_html( $_GET['last-name'] ),
			'country'   => esc_html( $_GET['country'] ),
			'city'      => esc_html( $_GET['city'] ),
			'address'   => esc_html( $_GET['address'] ),
			'zip'       => esc_html( $_GET['zip'] ),
			'phone'     => esc_html( $_GET['phone'] ),
			'email'     => esc_html( $_GET['email'] ),
			'price'     => esc_html( ol_sum_product() ),
			'card'      => serialize( $_SESSION['card'] ),
		)
	);

	if ( $result ) {
		ol_clear_url( '?action=order-complete' );
	} else {
		ol_add_errors( 'Error' );
		ol_clear_url( '?action=checkout' );
	}
}

/**
 * Add or update data in card.
 *
 * @param int $product_id Id product.
 * @param int $count Count product.
 */
function ol_add_to_cart( $product_id, $count = '' ) {
	$card         = $_SESSION['card'];
	$availability = false;

	if ( $_SESSION['card'] ) {
		for ( $i = 0; $i <= count( $card ); $i++ ) {
			if ( $card[ $i ]['id'] === $product_id ) {
				if ( '' !== $count ) {
					$_SESSION['card'][ $i ]['count'] = $count;
				} else {
					$_SESSION['card'][ $i ]['count']++;
				}

				$availability = true;
			}
		}
	}

	if ( ! $availability ) {
		$_SESSION['card'][] = array(
			'id'    => $product_id,
			'count' => $count,
		);
	}
}

/**
 * Counts the number of items in the cart.
 *
 * @return int The amount of products.
 */
function ol_get_check_card() {
	$count = 0;

	if ( $_SESSION['card'] ) {
		$count = count( $_SESSION['card'] );
	}

	return $count;
}

/**
 * Price generation.
 *
 * @param  mixed $price Price.
 * @return mixed|string
 */
function ol_get_price( $price ) {
	if ( ! stristr( $price, '.' ) ) {
		$price .= '.00';
	}
	return $price;
}

/**
 * The amount of products in the card.
 *
 * @return mixed|string Amount of products.
 */
function ol_sum_product() {
	if ( ! $_SESSION['card'] ) {
		return '0.00';
	}

	$id_products = $_SESSION['card'];
	$sum_product = 0;

	foreach ( $id_products as $id_product ) {
		$data_product = ol_get_product_by_id_db( $id_product['id'] );
		$count        = ++$id_product['count'];
		$sum_product += $data_product['price'] * $count;
	}

	if ( ! stristr( $sum_product, '.' ) ) {
		$sum_product .= '.00';
	}

	return $sum_product;
}

/**
 * Compiles product data from the cart.
 *
 * @return array|void Array products.
 */
function ol_get_product_with_card() {
	if ( ! $_SESSION['card'] ) {
		return;
	}

	$data_product = array();
	$id_products  = $_SESSION['card'];

	foreach ( $id_products as $id_product ) {
		$count['count'] = $id_product['count'];
		$data_product[] = array_merge( ol_get_product_by_id_db( $id_product['id'] ), $count );
	}

	return $data_product;
}

/**
 * Removal of goods from the card.
 */
function ol_remove_product() {
	if ( empty( $_GET['remove-card'] ) ) {
		return;
	}

	$id_product   = esc_html( $_GET['remove-card'] );
	$data_product = $_SESSION['card'];
	$action_page  = '';

	for ( $i = 0; $i <= count( $data_product ); $i++ ) {
		if ( $data_product[ $i ]['id'] === $id_product ) {
			unset( $data_product[ $i ] );
		}
	}

	$_SESSION['card'] = array_values( $data_product );

	if ( ! empty( $_GET['page'] ) ) {
		$action_page .= '&page=' . esc_html( $_GET['page'] );
	}
	if ( ! empty( $_GET['id'] ) ) {
		$action_page .= '&id=' . esc_html( $_GET['id'] );
	}

	ol_clear_url( '?action=' . esc_html( $_GET['action'] ) . $action_page );
}

/**
 * Switches content pages.
 *
 * @return int Page number.
 */
function ol_view_page_product() {
	$page = 0;

	if ( ! empty( $_GET['page'] ) ) {
		$page = esc_html( $_GET['page'] ) * 9;
	}

	return $page;
}

/**
 * Checks the active page.
 *
 * @param int $page Number page.
 * @return string
 */
function ol_check_page( $page ) {
	$action = '';

	if ( $page === intval( $_GET['page'] ) || 0 === $page && empty( $_GET['page'] ) ) {
		$action = 'active';
	}

	return $action;
}

/**
 * Output of the number of this page with products.
 *
 * @return string
 */
function ol_view_link_page() {
	$action = '';

	if ( ! empty( $_GET['page'] ) ) {
		$action = '&page=' . esc_html( $_GET['page'] );
	}

	return $action;
}

/**
 * Adding errors.
 *
 * @param string $string errors string.
 * @param string $type type errors.
 */
function ol_add_errors( $string, $type = 'danger' ) {
	$_SESSION['errors'][ $type ][] = $string;
}

/**
 * Check error.
 *
 * @return array errors.
 */
function ol_get_check_error() {
	return $_SESSION['errors']['danger'];
}

/**
 * Error output
 */
function ol_echo_errors() {
	if ( ! $_SESSION['errors'] ) {
		return;
	}

	$errors = $_SESSION['errors'];
	unset( $_SESSION['errors'] );

	foreach ( $errors as $key => $error_type ) {
		?>
		<div class="errors-wrapper alert alert-<?php echo esc_html( $key ); ?>" role="alert">
			<?php foreach ( $error_type as $error ) : ?>
				<div>
					<?php echo esc_html( $error ); ?>
				</div>
			<?php endforeach; ?>
		</div>
		<?php
	}
}

/**
 * Page generation
 *
 * @param array $page array data.
 */
function show_template( $page ) {
	include 'application/view/header.tpl.php';
	include 'application/view/' . $page['action'] . '.tpl.php';
	include 'application/view/footer.tpl.php';

	ol_echo_errors();
}
