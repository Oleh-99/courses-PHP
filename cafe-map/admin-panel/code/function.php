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
 */
function ol_clear_url() {
	header( 'Location: index.php' );
	die();
}


/**
 *
 */
function ol_sing_up_user() {
	if ( ! isset( $_POST['sing_up'] ) ) {
		return;
	}

	if ( isset( $_POST['sing_up'] ) ) {
		if ( empty( $_POST['login'] ) ) {
			ol_add_errors( 'Enter your login' );
		}

		if ( empty( $_POST['password'] ) ) {
			ol_add_errors( 'Enter your password' );
		}
	}

	if ( $_SESSION['errors']['danger'] ) {
		return;
	}

	$login      = esc_html( $_POST['login'] );
	$password   = esc_html( $_POST['password'] );
	$data_users = ol_get_users_restaurants_db( $login );

	foreach ( $data_users as $value ) {
		if ( $value['login'] === $login && password_verify( $password, $value['password'] ) ) {
			$_SESSION['login'] = $login;
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

	if ( isset( $_POST['btn_post'] ) ) {

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

	if ( $_SESSION['errors']['danger'] ) {
		return;
	}

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
 * Data processing to edit the post.
 */
function ol_edit_post() {
	if ( ! isset( $_POST['btn_post'] ) ) {
		return;
	}

	if ( isset( $_POST['btn_post'] ) ) {

		if ( empty( $_POST['name'] ) ) {
			ol_add_errors( 'Enter the name' );
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
		if ( empty( $_POST['rating'] ) ) {
			ol_add_errors( 'Enter the rating' );
		}
		if ( empty( $_POST['reviews'] ) ) {
			ol_add_errors( 'Enter the reviews' );
		}
		if ( 5 < $_POST['rating'] ) {
			ol_add_errors( 'The rating cannot be more than 5 stars' );
		}
	}

	if ( $_SESSION['errors']['danger'] ) {
		return;
	}

	$new_name_file = '';

	if ( isset( $_FILES['uploaded_file'] ) && $_FILES['uploaded_file']['error'] === UPLOAD_ERR_OK ) {
		$file_tmp_path           = $_FILES['uploaded_file']['tmp_name'];
		$file_name               = $_FILES['uploaded_file']['name'];
		$file_extension          = strtolower( end( explode( '.', $file_name ) ) );
		$new_name_file           = esc_html( $_POST['name'] ) . '.' . $file_extension;
		$allowed_file_extensions = array( 'jpg', 'gif', 'png' );

		if ( in_array( $file_extension, $allowed_file_extensions ) ) {
			$dest_path = '../img/' . $new_name_file;
			move_uploaded_file( $file_tmp_path, $dest_path );
		} else {
			ol_add_errors( ' Failed to load image, ' );
		}
	}

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
			'url_photo'  => 'img/' . $new_name_file,
			'lat'        => esc_html( $_POST['lat'] ),
			'lon'        => esc_html( $_POST['lon'] ),
		),
		'update'
	);

	if ( $result ) {
		ol_clear_url();
		ol_add_errors( 'The post has been updated to the database', 'success' );
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
	if ( empty( $_GET['pagination'] ) ) {
		return 0;
	}

	return esc_html( $_GET['pagination'] );
}

/**
 * Creating a page.
 */
function ol_add_page__from_db() {
	if ( ! isset( $_POST['create_page'] ) ) {
		return;
	}

	if ( isset( $_POST['create_page'] ) ) {

		if ( empty( $_POST['page_name'] ) ) {
			ol_add_errors( 'Enter the title' );
		}
		if ( empty( $_POST['page_content'] ) ) {
			ol_add_errors( 'Enter the content' );
		}
	}

	if ( $_SESSION['errors']['danger'] ) {
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
		header( 'Location: index.php?admin-action=page' );
		die();
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

	if ( isset( $_POST['create_page'] ) ) {

		if ( empty( $_POST['page_name'] ) ) {
			ol_add_errors( 'Enter the title' );
		}
		if ( empty( $_POST['page_content'] ) ) {
			ol_add_errors( 'Enter the content' );
		}
	}

	if ( $_SESSION['errors']['danger'] ) {
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
		header( 'Location: index.php?admin-action=page' );
		die();
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
function ol_get_current( string $data ) {
	if ( $data === $_GET['admin-action'] || empty( $_GET['admin-action'] ) && 'admin' === $data ) {
		return 'active';
	} else {
		return '';
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
 * Generate a page for the user.
 *
 * @param array $restaurants array data restaurants.
 */
function ol_show_template( $restaurants ) {
	if ( ! $_SESSION['login'] ) {
		$restaurants['action'] = 'sing-in';
	}

	include 'view/header.tpl.php';
	include 'view/' . $restaurants['action'] . '.tpl.php';
	include 'view/footer.tpl.php';

	ol_echo_errors();
}
