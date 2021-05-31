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
	$request = '';

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
 * Sing in user.
 */
function ol_sing_in_user() {
	if ( ! isset( $_POST['sing-in'] ) ) {
		return;
	}

	if ( empty( $_POST['login'] ) ) {
		ol_add_errors( 'Enter a login' );
	}
	if ( empty( $_POST['password'] ) ) {
		ol_add_errors( 'Enter a password' );
	}

	if ( ol_get_check_error() ) {
		return;
	}

	$users_data = ol_sing_in_user_db( esc_html( $_POST['login'] ) );

	foreach ( $users_data as $user_data ) {
		if ( $user_data['login'] === esc_html( $_POST['login'] ) && password_verify( esc_html( $_POST['password'] ), $user_data['password'] ) ) {
			$_SESSION['mstore-login'] = esc_html( $_POST['login'] );
		}
	}

	if ( ! $_SESSION['mstore-login'] ) {
		ol_add_errors( 'Wrong login or password' );
	}
}

/**
 * Adding posts to the database.
 */
function ol_add_product() {
	if ( ! isset( $_POST['btn-product'] ) ) {
		return;
	}

	ol_check_form_error();

	if ( ! isset( $_FILES['uploaded_file'] ) && $_FILES['uploaded_file']['error'] !== UPLOAD_ERR_OK ) {
		ol_add_errors( 'Enter a photo' );
	}

	if ( ol_get_check_error() ) {
		return;
	}

	$result = ol_product_db(
		array(
			'title'       => esc_html( $_POST['title'] ),
			'price'       => (double) esc_html( $_POST['price'] ),
			'sale-price'  => (double) esc_html( $_POST['sale-price'] ),
			'description' => esc_html( $_POST['description'] ),
			'category'    => esc_html( $_POST['category'] ),
			'label'       => esc_html( $_POST['label'] ),
			'photo'       => ol_save_photo(),
		)
	);

	if ( $result ) {
		ol_clear_url();
	} else {
		ol_add_errors( 'Error writing to database' );
	}
}

/**
 * Edit product.
 */
function ol_edit_product() {
	if ( ! isset( $_POST['btn-product'] ) ) {
		return;
	}

	ol_check_form_error();

	if ( ol_get_check_error() ) {
		return;
	}

	if ( isset( $_FILES['uploaded_file'] ) && $_FILES['uploaded_file']['error'] === UPLOAD_ERR_OK ) {
		unlink( '../' . esc_html( $_POST['photo'] ) );
		$new_name_photo = ol_save_photo();
	} else {
		$new_name_photo = esc_html( $_POST['photo'] );
	}

	$result = ol_product_db(
		array(
			'id'          => esc_html( $_POST['id'] ),
			'title'       => esc_html( $_POST['title'] ),
			'price'       => esc_html( $_POST['price'] ),
			'sale-price'  => esc_html( $_POST['sale-price'] ),
			'description' => esc_html( $_POST['description'] ),
			'category'    => esc_html( $_POST['category'] ),
			'label'       => esc_html( $_POST['label'] ),
			'photo'       => $new_name_photo,
		),
		'update'
	);

	if ( $result ) {
		ol_clear_url();
	} else {
		ol_add_errors( 'Error editing to database' );
	}
}

/**
 * Check is not empty form.
 */
function ol_check_form_error() {
	if ( empty( $_POST['title'] ) ) {
		ol_add_errors( 'Enter a title' );
	}
	if ( empty( $_POST['description'] ) ) {
		ol_add_errors( 'Enter a description' );
	}
	if ( empty( $_POST['price'] ) ) {
		ol_add_errors( 'Enter a price' );
	}
	if ( empty( $_POST['category'] ) ) {
		ol_add_errors( 'Enter a category' );
	}
}

/**
 * Save photo on server.
 *
 * @return string new name photo.
 */
function ol_save_photo() {
	$file_tmp_path           = $_FILES['uploaded_file']['tmp_name'];
	$file_name               = $_FILES['uploaded_file']['name'];
	$array                   = explode( '.', $file_name );
	$file_extension          = strtolower( end( $array ) );
	$new_name_file           = esc_html( $_POST['title'] ) . '.' . $file_extension;
	$allowed_file_extensions = array( 'jpg', 'gif', 'png' );

	if ( in_array( $file_extension, $allowed_file_extensions, true ) ) {
		$dest_path = '../img/' . $new_name_file;
		move_uploaded_file( $file_tmp_path, $dest_path );
	} else {
		ol_add_errors( 'Failed to load image' );
	}

	return 'img/' . $new_name_file;
}

/**
 * Add category.
 */
function ol_add_category() {
	if ( ! isset( $_POST['category-form'] ) ) {
		return;
	}

	if ( empty( $_POST['category'] ) ) {
		ol_add_errors( 'Enter a category' );
	}

	if ( ol_get_check_error() ) {
		return;
	}

	$result = ol_add_category_db(
		array(
			'category' => ucfirst( esc_html( $_POST['category'] ) ),
		)
	);

	if ( $result ) {
		ol_add_errors( 'Category success adding', 'success' );
		ol_clear_url( '?action=category' );
	} else {
		ol_add_errors( 'Category is not adding' );
	}
}

/**
 * Remove category.
 */
function ol_remove_category() {
	if ( empty( $_GET['remove-category'] ) ) {
		return;
	}

	$result = ol_remove_category_db( esc_html( $_GET['remove-category'] ) );

	if ( $result ) {
		ol_add_errors( 'Category success remove', 'success' );
	} else {
		ol_add_errors( 'Category is not remove' );
	}

	ol_clear_url( '?action=category' );
}

/**
 * Edit category.
 */
function ol_edit_category() {
	if ( ! isset( $_POST['category-form'] ) ) {
		return;
	}

	if ( empty( $_POST['category'] ) ) {
		ol_add_errors( 'Enter a category' );
	}

	if ( ol_get_check_error() ) {
		return;
	}

	$result = ol_add_category_db(
		array(
			'id'       => esc_html( $_POST['id'] ),
			'category' => esc_html( $_POST['category'] ),
		),
		'update'
	);

	if ( $result ) {
		ol_add_errors( 'Category success update', 'success' );
		ol_clear_url( '?action=category' );
	} else {
		ol_add_errors( 'Category is not update' );
	}
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
	if ( ! $_SESSION['mstore-login'] ) {
		$page['action'] = 'sing-in';
	}

	include 'view/header.tpl.php';
	include 'view/' . $page['action'] . '.tpl.php';
	include 'view/footer.tpl.php';

	ol_echo_errors();
}
