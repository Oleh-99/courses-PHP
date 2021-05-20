<?php
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
	$key_product = array_search( $product_id, $_SESSION['card'], true );

	if ( $key_product || 0 === $key_product ) {
		unset( $_SESSION['card'][ $key_product ] );
	} else {
		$_SESSION['card'][] = $product_id;
	}

	ol_clear_url( '?action=' . esc_html( $_GET['action'] ) );
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
		$data_product = ol_get_product_by_id_db( $id_product );
		$sum_product += $data_product['price'];
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
		$data_product[] = ol_get_product_by_id_db( $id_product );
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

	unset( $data_product[ array_search( $id_product, $data_product, true ) ] );
	$_SESSION['card'] = $data_product;
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
