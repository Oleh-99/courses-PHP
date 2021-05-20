<?php
session_start();

/**
 * Renders data.
 *
 * @param mixed $data data.
 */
function esc_html( $data ) {
	return htmlspecialchars( trim( $data ) );
}

/**
 * Array output.+
 *
 * @param array $data data.
 */
function ar( $data ) {
	echo '<pre>';
	print_r( $data );
	echo '</pre>';
}

/**
 * Clean the url string.
 *
 * @param string $action action page.
 */
function ol_clear_url( $action = '' ) {
	header( 'Location: index.php' . $action );
	die();
}

/**
 * Administrator initialization.
 */
function ol_sing_up_user() {
	if ( ! isset( $_POST['sing_up'] ) ) {
		return;
	}

	if ( empty( $_POST['login'] ) ) {
		ol_add_errors( 'Enter your login' );
	}
	if ( empty( $_POST['password'] ) ) {
		ol_add_errors( 'Enter your password' );
	}

	if ( ol_get_check_error() ) {
		return;
	}

	$login      = esc_html( $_POST['login'] );
	$password   = esc_html( $_POST['password'] );
	$data_users = ol_get_users_restaurants_db( $login );

	foreach ( $data_users as $value ) {
		if ( $value['login'] === $login && password_verify( $password, $value['password'] ) ) {
			$_SESSION['login'] = $value['login'];
			$_SESSION['id']    = $value['id'];
		}
	}

	if ( ! $_SESSION['login'] ) {
		ol_add_errors( 'Invalid login or password' );
	}
}

/**
 * Data processing to create a new post.
 */
function ol_create_post() {
	if ( ! isset( $_POST['btn_post'] ) ) {
		return;
	}

	ol_check_empty_form();

	if ( ol_get_check_error() ) {
		return;
	}

	$new_name_file = ol_save_photo();

	$result = ol_loading_restaurant_db(
		array(
			'name'       => esc_html( $_POST['name'] ),
			'type'       => esc_html( $_POST['type'] ),
			'phone'      => esc_html( $_POST['phone'] ),
			'address'    => esc_html( $_POST['address'] ),
			'start_time' => esc_html( $_POST['start_time'] ),
			'end_time'   => esc_html( $_POST['end_time'] ),
			'rating'     => esc_html( $_POST['rating'] ),
			'reviews'    => esc_html( $_POST['reviews'] ),
			'url_photo'  => $new_name_file,
			'lat'        => esc_html( $_POST['lat'] ),
			'lon'        => esc_html( $_POST['lon'] ),
		)
	);

	if ( $result ) {
		ol_add_errors( 'The post has been added to the database', 'success' );
		ol_clear_url();
	} else {
		ol_add_errors( 'The post has not added to the database' );
	}
}

/**
 * Save the photo to the server.
 *
 * @return string Name the photo.
 */
function ol_save_photo() {
	$new_name_file = '';

	if ( isset( $_FILES['uploaded_file'] ) && $_FILES['uploaded_file']['error'] === UPLOAD_ERR_OK ) {
		$file_tmp_path           = $_FILES['uploaded_file']['tmp_name'];
		$file_name               = $_FILES['uploaded_file']['name'];
		$array                   = explode( '.', $file_name );
		$file_extension          = strtolower( end( $array ) );
		$new_name_file           = esc_html( $_POST['name'] ) . '.' . $file_extension;
		$allowed_file_extensions = array( 'jpg', 'gif', 'png' );

		if ( in_array( $file_extension, $allowed_file_extensions ) ) {
			$dest_path = '../img/' . $new_name_file;
			move_uploaded_file( $file_tmp_path, $dest_path );
		} else {
			ol_add_errors( 'Failed to load image' );
		}
	}

	if ( $new_name_file ) {
		$new_name_file = 'img/' . $new_name_file;
	}

	return $new_name_file;
}

/**
 * Checks for empty forms.
 */
function ol_check_empty_form() {
	if ( empty( $_POST['name'] ) ) {
		ol_add_errors( 'Enter a name' );
	}
	if ( empty( $_POST['type'] ) ) {
		ol_add_errors( 'Enter the type of institution' );
	}
	if ( empty( $_POST['phone'] ) ) {
		ol_add_errors( 'Enter the phone' );
	}
	if ( empty( $_POST['address'] ) ) {
		ol_add_errors( 'Enter the address' );
	}
	if ( empty( $_POST['start_time'] ) ) {
		ol_add_errors( 'Enter the start time' );
	}
	if ( empty( $_POST['end_time'] ) ) {
		ol_add_errors( 'Enter the end time' );
	}
	if ( 5 < $_POST['rating'] ) {
		ol_add_errors( 'The rating cannot be more than 5 stars' );
	}
}

/**
 * Data processing to edit the post.
 */
function ol_edit_post() {
	if ( ! isset( $_POST['btn_post'] ) ) {
		return;
	}

	ol_check_empty_form();

	if ( empty( $_POST['rating'] ) ) {
		ol_add_errors( 'Enter the rating' );
	}
	if ( empty( $_POST['reviews'] ) ) {
		ol_add_errors( 'Enter the reviews' );
	}

	if ( ol_get_check_error() ) {
		return;
	}

	$new_name_file = ol_save_photo();

	$result = ol_loading_restaurant_db(
		array(
			'id'         => esc_html( $_POST['id'] ),
			'name'       => esc_html( $_POST['name'] ),
			'type'       => esc_html( $_POST['type'] ),
			'phone'      => esc_html( $_POST['phone'] ),
			'address'    => esc_html( $_POST['address'] ),
			'start_time' => esc_html( $_POST['start_time'] ),
			'end_time'   => esc_html( $_POST['end_time'] ),
			'rating'     => esc_html( $_POST['rating'] ),
			'reviews'    => esc_html( $_POST['reviews'] ),
			'url_photo'  => $new_name_file,
			'lat'        => esc_html( $_POST['lat'] ),
			'lon'        => esc_html( $_POST['lon'] ),
		),
		'update'
	);

	if ( $result ) {
		ol_add_errors( 'The post has been updated to the database', 'success' );
		ol_clear_url();
	} else {
		ol_add_errors( 'The post has not been updated to the database' );
	}
}

/**
 * You will learn the number of posts from the database.
 *
 * @return integer
 */
function ol_get_count_cafe() {
	return ol_get_count_restaurants_db();
}

/**
 * Checks which page of the asset.
 *
 * @return integer
 */
function ol_get_click_pagination() {
	$pagination = $_GET['pagination'];

	if ( empty( $_GET['pagination'] ) ) {
		$pagination = 0;
	}

	return $pagination;
}

/**
 * Creating a page.
 */
function ol_add_page__from_db() {
	if ( ! isset( $_POST['create_page'] ) ) {
		return;
	}

	if ( empty( $_POST['page_name'] ) ) {
		ol_add_errors( 'Enter the title' );
	}
	if ( empty( $_POST['page_content'] ) ) {
		ol_add_errors( 'Enter the content' );
	}

	if ( ol_get_check_error() ) {
		return;
	}

	$result = ol_loading_page_db(
		array(
			'title'   => esc_html( $_POST['page_name'] ),
			'content' => $_POST['page_content'],
		)
	);

	if ( $result ) {
		ol_add_errors( 'The page has been added to the database', 'success' );
		ol_clear_url( '?admin-action=page' );
	} else {
		ol_add_errors( 'The page has not been added to the database' );
	}
}

/**
 * Update data in databases.
 */
function ol_edit_page__from_db() {
	if ( ! isset( $_POST['create_page'] ) ) {
		return;
	}

	if ( empty( $_POST['page_name'] ) ) {
		ol_add_errors( 'Enter the title' );
	}
	if ( empty( $_POST['page_content'] ) ) {
		ol_add_errors( 'Enter the content' );
	}

	if ( ol_get_check_error() ) {
		return;
	}

	$result = ol_loading_page_db(
		array(
			'id'      => esc_html( $_POST['page_id'] ),
			'title'   => esc_html( $_POST['page_name'] ),
			'content' => $_POST['page_content'],
		),
		'update'
	);

	if ( $result ) {
		ol_add_errors( 'The page has been edited to the database', 'success' );
		ol_clear_url( '?admin-action=page' );
	} else {
		ol_add_errors( 'The page has not been edited to the database' );
	}
}

/**
 * Check for active or page.
 *
 * @param string $data data.
 * @return string
 */
function ol_get_current( $data ) {
	$current = '';

	if ( $data === $_GET['admin-action'] || empty( $_GET['admin-action'] ) && 'admin' === $data ) {
		$current = 'active';
	}

	return $current;
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
 * Checks the role of the user.
 */
function ol_check_role_user() {
	if ( ! ol_get_role_users( $_SESSION['login'] ) && $_SESSION['login'] ) {
		ol_add_errors( 'You are not an administrator' );
		header( 'Location: ../index.php' );
		die();
	}
}

/**
 * Generate a page for the user.
 *
 * @param array $restaurants array data restaurants.
 */
function ol_show_template( $restaurants ) {
	if ( ! $_SESSION['login'] ) {
		$restaurants['action'] = 'sing-in';
	}

	ol_check_role_user();

	include 'view/header.tpl.php';
	include 'view/' . $restaurants['action'] . '.tpl.php';
	include 'view/footer.tpl.php';

	ol_echo_errors();
}
