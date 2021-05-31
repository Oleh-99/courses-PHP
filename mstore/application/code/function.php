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
function ol_add_product_to_cart() {
	if ( empty( $_GET['add-cart'] ) ) {
		return;
	}

	$product_id  = esc_html( $_GET['add-cart'] );
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
function ol_add_cart_with_single() {
	if ( empty( $_GET['id'] ) || empty( $_GET['numbers'] ) ) {
		return;
	}

	$product_id = esc_html( $_GET['id'] );
	$count      = esc_html( $_GET['numbers'] );

	if ( 0 > $count ) {
		return;
	}

	ol_add_to_cart( $product_id, $count );

	ol_clear_url( '?action=single-product&id=' . $product_id );
}

/**
 * Check count product.
 *
 * @param int $id Id product.
 * @return int
 */
function ol_get_count_product( $id ) {
	$count = 0;

	foreach ( $_SESSION['mstore_cart'] as $product ) {
		if ( $product['id'] === $id ) {
			$count = $product['count'];
		}
	}

	return $count;
}

/**
 * Processes the form on card.
 */
function ol_add_card_with_basket() {
	if ( empty( $_POST['cart_numbers'] ) ) {
		return;
	}

	$cart = $_POST['cart_numbers'];

	foreach ( $cart as $id => $count ) {
		if ( 0 < $count ) {
			ol_add_to_cart( esc_html( $id ), esc_html( $count ) );
		}
	}

	ol_clear_url( '?action=view-card' );
}

/**
 * Insert cart database.
 */
function ol_add_order() {
	if ( ! isset( $_POST['checkout'] ) ) {
		return;
	}

	if ( empty( $_POST['name'] ) ) {
		ol_add_errors( 'Enter a name' );
	}
	if ( empty( $_POST['last-name'] ) ) {
		ol_add_errors( 'Enter a last-name' );
	}
	if ( empty( $_POST['country'] ) ) {
		ol_add_errors( 'Enter a country' );
	}
	if ( empty( $_POST['city'] ) ) {
		ol_add_errors( 'Enter a city' );
	}
	if ( empty( $_POST['address'] ) ) {
		ol_add_errors( 'Enter a address' );
	}
	if ( empty( $_POST['zip'] ) ) {
		ol_add_errors( 'Enter a zip' );
	}
	if ( empty( $_POST['phone'] ) ) {
		ol_add_errors( 'Enter a phone' );
	}
	if ( empty( $_POST['email'] ) ) {
		ol_add_errors( 'Enter a email' );
	}
	if ( ol_get_check_error() ) {
		return;
	}

	$result = ol_add_order_db(
		array(
			'name'      => esc_html( $_POST['name'] ),
			'last-name' => esc_html( $_POST['last-name'] ),
			'country'   => esc_html( $_POST['country'] ),
			'city'      => esc_html( $_POST['city'] ),
			'address'   => esc_html( $_POST['address'] ),
			'zip'       => esc_html( $_POST['zip'] ),
			'phone'     => esc_html( $_POST['phone'] ),
			'email'     => esc_html( $_POST['email'] ),
			'price'     => esc_html( ol_sum_product() ),
			'card'      => serialize( $_SESSION['mstore_cart'] ),
		)
	);

	if ( $result ) {
		ol_clear_url( '?action=order-complete' );
	} else {
		ol_add_errors( 'Error recording your data' );
	}
}

/**
 * Gives the deadline from the request.
 *
 * @param string $type Type GET request.
 * @return mixed
 */
function ol_view_user_data( $type ) {
	return $_POST[ $type ];
}

/**
 * Add or update data in card.
 *
 * @param int $product_id Id product.
 * @param int $count Count product.
 */
function ol_add_to_cart( $product_id, $count = '' ) {
	$card         = $_SESSION['mstore_cart'];
	$availability = false;

	if ( $card ) {
		for ( $i = 0; $i <= count( $card ); $i++ ) {
			if ( $card[ $i ]['id'] === $product_id ) {
				if ( '' !== $count ) {
					$_SESSION['mstore_cart'][ $i ]['count'] += $count;
				} else {
					$_SESSION['mstore_cart'][ $i ]['count']++;
				}

				$availability = true;
			}
		}
	}

	if ( '' === $count ) {
		$count = 1;
	}

	if ( ! $availability ) {
		$_SESSION['mstore_cart'][] = array(
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
function ol_get_check_cart() {
	$count = 0;

	if ( ! $_SESSION['mstore_cart'] ) {
		return 0;
	}

	for ( $i = 0; $i <= count( $_SESSION['mstore_cart'] ); $i++ ) {
		$count += (int) $_SESSION['mstore_cart'][ $i ]['count'];
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
	if ( ! $_SESSION['mstore_cart'] ) {
		return '0.00';
	}

	$sum_product = 0;
	$request     = '';

	foreach ( $_SESSION['mstore_cart'] as $id_product ) {
		$request .= ' id = ' . $id_product['id'] . ' OR';
	}

	$request = mb_substr( $request, 0, -2 );

	$result = ol_get_product_request_db( $request );

	foreach ( $result as $product ) {
		$price = $product['price'];

		if ( $product['sale'] ) {
			$price = $product['sale'];
		}

		$sum_product += (int) $price * ol_get_count_product( $product['id'] );
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
function ol_get_product_with_cart() {
	if ( ! $_SESSION['mstore_cart'] ) {
		return;
	}

	$request = '';

	foreach ( $_SESSION['mstore_cart'] as $id_product ) {
		$request .= ' id = ' . $id_product['id'] . ' OR';
	}

	$request = mb_substr( $request, 0, -2 );

	return ol_get_product_request_db( $request );
}

/**
 * Removal of goods from the card.
 */
function ol_remove_product() {
	if ( empty( $_GET['remove-card'] ) ) {
		return;
	}

	$id_product   = esc_html( $_GET['remove-card'] );
	$data_product = $_SESSION['mstore_cart'];
	$action_page  = '';

	for ( $i = 0; $i <= count( $data_product ); $i++ ) {
		if ( $data_product[ $i ]['id'] === $id_product ) {
			unset( $data_product[ $i ] );
		}
	}

	$_SESSION['mstore_cart'] = array_values( $data_product );

	if ( ! empty( $_GET['page'] ) ) {
		$action_page .= '&page=' . esc_html( $_GET['page'] );
	}
	if ( ! empty( $_GET['id'] ) ) {
		$action_page .= '&id=' . esc_html( $_GET['id'] );
	}

	ol_clear_url( '?action=' . esc_html( $_GET['action'] ) . $action_page );
}

/**
 * Sort by price.
 *
 * @return string Request to sort by price.
 */
function ol_sort_price() {
	if ( empty( $_GET['min-price'] ) || empty( $_GET['max-price'] ) ) {
		return '';
	}

	return ' price > ' . esc_html( $_GET['min-price'] ) . ' AND price < ' . esc_html( $_GET['max-price'] );
}

/**
 * Generation of price sorting with active pagination.
 *
 * @return string Request to sort by price.
 */
function ol_sort_price_with_pagination() {
	if ( empty( $_GET['min-price'] ) || empty( $_GET['max-price'] ) ) {
		return '';
	}

	return '&min-price=' . esc_html( $_GET['min-price'] ) . '&max-price=' . esc_html( $_GET['max-price'] );
}

/**
 * Switches content pages.
 *
 * @return int Page number.
 */
function ol_view_page_product() {
	$page = 0;

	if ( ! empty( $_GET['page'] ) ) {
		$count = ol_get_view_product_in_page();
		$page  = esc_html( $_GET['page'] ) * $count;
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
 * Active term url with minimum and maximum price filter.
 *
 * @return string Active term url with minimum and maximum price filter.
 */
function ol_get_price_url() {
	$action = '';

	if ( ! empty( $_GET['min-price'] ) || ! empty( $_GET['max-price'] ) ) {
		$action = '&min-price=' . esc_html( $_GET['min-price'] ) . '&max-price=' . esc_html( $_GET['max-price'] );
	}

	return $action;
}

/**
 * Adds an active category to the session.
 */
function ol_view_category_product() {
	if ( empty( $_GET['category'] ) ) {
		return;
	}

	$_SESSION['mstore_category'] = esc_html( $_GET['category'] );
}

/**
 * Generates a term from the active category.
 *
 * @return string Active category.
 */
function ol_get_check_category() {
	if ( ! isset( $_SESSION['mstore_category'] ) || 'all' === $_SESSION['mstore_category'] ) {
		return '';
	}

	return ' category = \'' . $_SESSION['mstore_category'] . '\'';
}

/**
 * Creates a query with active filters to be sent to the database query.
 *
 * @return string Query string in the database.
 */
function ol_get_request_for_db() {
	$request  = '';
	$category = ol_get_check_category();
	$price    = ol_sort_price();

	if ( ! $category && ! $price ) {
		return '';
	} elseif ( $category && ! $price ) {
		$request .= $category;
	} elseif ( ! $category && $price ) {
		$request .= $price;
	} else {
		$request .= $price . ' AND ' . $category;
	}

	return ' WHERE ' . $request;
}

/**
 * Checks for the active category.
 *
 * @param string $active Given Category.
 * @return bool
 */
function ol_get_active_category( $active ) {
	if ( ! isset( $_SESSION['mstore_category'] ) && 'all' === $active ) {
		return true;
	}

	return ( $active === $_SESSION['mstore_category'] );
}

/**
 * Adds the number of products per page to the session.
 */
function ol_view_product_in_page() {
	if ( empty( $_GET['view-count'] ) ) {
		return;
	}

	$_SESSION['mstore_view_count'] = esc_html( $_GET['view-count'] );
}

/**
 * Returns the number of products per page.
 *
 * @return int|mixed
 */
function ol_get_view_product_in_page() {
	$count = 9;

	if ( isset( $_SESSION['mstore_view_count'] ) ) {
		$count = $_SESSION['mstore_view_count'];
	}

	return $count;
}

/**
 * Returns the active number of products on the page.
 *
 * @param int $count Number of products.
 * @return bool
 */
function ol_get_active_count_product( $count ) {
	if ( ! isset( $_SESSION['mstore_view_count'] ) ) {
		return ( 9 === $count );
	}

	return ( intval( $_SESSION['mstore_view_count'] ) === $count );
}

/**
 * Adds grid values to the session.
 */
function ol_grid_page() {
	if ( empty( $_GET['grid-view'] ) ) {
		return;
	}

	$_SESSION['mstore_grid-view'] = esc_html( $_GET['grid-view'] );
}

/**
 * Checks the active grid.
 *
 * @return int
 */
function ol_check_grid_product() {
	$grid = 4;

	if ( isset( $_SESSION['mstore_grid-view'] ) ) {
		$grid = intval( $_SESSION['mstore_grid-view'] );
	}

	return $grid;
}

/**
 * Determines the difference between the old price and the discount in percent.
 *
 * @param int $price Old price.
 * @param int $sale_price Sale price.
 * @return int
 */
function ol_get_sale_interest( $price, $sale_price ) {
	return 100 - intval( $sale_price * 100 / $price );
}

/**
 * Saves user comments.
 */
function ol_add_comment() {
	if ( ! isset( $_POST['add-comment'] ) ) {
		return;
	}

	if ( empty( $_POST['comm-name'] ) ) {
		ol_add_errors( 'Enter a name' );
	}
	if ( empty( $_POST['comm-description'] ) ) {
		ol_add_errors( 'Enter a review' );
	}
	if ( empty( $_POST['comm-rating'] ) ) {
		ol_add_errors( 'Enter a rating' );
	}
	if ( 0 > $_POST['comm-rating'] || $_POST['comm-rating'] > 5 ) {
		ol_add_errors( 'The rating cannot be more than 5 and less than 0' );
	}

	if ( ol_get_check_error() ) {
		return;
	}

	$result = ol_save_comment_db(
		array(
			'product_id'  => esc_html( $_POST['id'] ),
			'name'        => esc_html( $_POST['comm-name'] ),
			'description' => esc_html( $_POST['comm-description'] ),
			'stars'       => esc_html( $_POST['comm-rating'] ),
		)
	);

	if ( $result ) {
		ol_add_errors( 'Comment successfully added', 'success' );
		ol_clear_url( '?action=single-product&id=' . esc_html( $_POST['id'] ) );
	} else {
		ol_add_errors( 'Comment not added' );
	}
}

/**
 * Calculate the rating as a percentage.
 *
 * @param int $rating Rating from 0 to 5.
 * @return float|int Rating as a percentage.
 */
function ol_get_stars_product( $rating ) {
	return $rating * 100 / 5;
}

/**
 * Sort by price.
 *
 * @return string Sort condition in the database.
 */
function ol_get_sort_price() {
	if ( empty( $_GET['sort-price'] ) ) {
		return '';
	}

	return ' ORDER BY ' . esc_html( $_GET['sort-price']);
}

/**
 * Returns active sorting by price.
 *
 * @return string
 */
function ol_get_action_sort_price() {
	if ( empty( $_GET['sort-price'] ) ) {
		return '';
	}

	return '&sort-price=' . esc_html( $_GET['sort-price']);
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
