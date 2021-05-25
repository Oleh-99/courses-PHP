<?php
/**
 * Function.
 *
 * @package Funtion.
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
 * Generates a query to the database.
 *
 * @param array $products Array with id products.
 * @return array Data.
 */
function ol_get_product_user( $products ) {
	$request = 'SELECT * FROM mstore WHERE';

	foreach ( $products as $product ) {
		$request .= ' id = ' . $product['id'] . ' OR';
	}

	$request = mb_substr( $request, 0, -2 );

	return ol_get_product_by_string_id_db( $request );
}

/**
 * Check count product.
 *
 * @param array $products Data product.
 * @param int   $id Id product.
 * @return int|mixed
 */
function ol_get_product_count( $products, $id ) {
	$count = 1;

	foreach ( $products as $product ) {
		if ( $product['id'] === $id ) {
			$count = ++$product['count'];
		}
	}

	return $count;
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
	include 'view/header.tpl.php';
	include 'view/' . $page['action'] . '.tpl.php';
	include 'view/footer.tpl.php';

	ol_echo_errors();
}
