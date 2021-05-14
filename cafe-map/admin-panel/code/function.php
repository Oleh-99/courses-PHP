<?php
session_start();

/**
 * Renders data.
 * @param  string $data
 */
function esc_html( $data ) {
	return htmlspecialchars( trim( $data ) );
}

/**
 * Array output.
 * @param  array $data
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
	$url = 'Location: index.php';

	if ( ! empty( $_GET['pagination'] ) ) {
		$url = 'Location: index.php?pagination=' . esc_html( $_GET['pagination'] );
	}

	header( $url );
}

/**
 * Login admin panel.
 */
function ol_sing_up_user() {
	if ( empty( $_POST['login'] ) || empty( $_POST['password'] ) ) {
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
		echo 'Error';
	}
}

/**
 * Data processing to create a new post.
 */
function ol_create_post() {
	if ( ! isset( $_POST['add_post'] ) ) {
	    return;
	}

	if ( isset( $_POST['add_post'] ) ) {

		if ( empty( $_POST['name'] ) ) {
			ol_add_errors( ' Enter a name, ' );
		}
		if ( empty( $_POST['type'] ) ) {
			ol_add_errors( ' Enter the type of institution, ' );
		}
		if ( empty( $_POST['phone'] ) ) {
			ol_add_errors( ' Enter the phone, ' );
		}
		if ( empty( $_POST['address'] ) ) {
			ol_add_errors( ' Enter the address, ' );
		}
		if ( empty( $_POST['start_time'] ) ) {
			ol_add_errors( ' Enter the start time, ' );
		}
		if ( empty( $_POST['end_time'] ) ) {
			ol_add_errors( ' Enter the end time, ' );
		}
		if ( 5 < $_POST['rating'] ) {
			ol_add_errors( 'The rating cannot be more than 5 stars ' );
		}
	}

	if ( $_SESSION['errors']['danger'] ) {
		return;
	}

	if ( isset( $_FILES['uploadedFile'] ) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK ) {
		$file_tmp_path           = $_FILES['uploadedFile']['tmp_name'];
		$file_name               = $_FILES['uploadedFile']['name'];
		$array                   = explode('.', $file_name);
		$file_extension          = strtolower( end($array) );
		$new_name_file           = esc_html( $_POST['name'] ) . '.' . $file_extension;
		$allowed_file_extensions = array( 'jpg', 'gif', 'png' );

		if ( in_array( $file_extension, $allowed_file_extensions ) ) {
			$dest_path = '../img/' . $new_name_file;
			move_uploaded_file( $file_tmp_path, $dest_path );
		} else {
			ol_add_errors( ' Failed to load image, ' );
		}
	}

	ol_insert_restaurant_db(
		[
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
		]
	);
	ol_clear_url();
}

/**
 * Data processing to edit the post.
 */
function ol_edit_post() {
	if ( ! isset( $_POST['edit_post'] ) ) {
        return;
	}

	if ( isset( $_POST['edit_post'] ) ) {

		if ( empty( $_POST['edit_name'] ) ) {
			ol_add_errors( ' Enter the name, ' );
		}
		if ( empty( $_POST['edit_type'] ) ) {
			ol_add_errors( ' Enter the type of institution, ' );
		}
		if ( empty( $_POST['edit_phone'] ) ) {
			ol_add_errors( ' Enter the phone, ' );
		}
		if ( empty( $_POST['edit_address'] ) ) {
			ol_add_errors( ' Enter the address, ' );
		}
		if ( empty( $_POST['edit_start_time'] ) ) {
			ol_add_errors( ' Enter the start time, ' );
		}
		if ( empty( $_POST['edit_end_time'] ) ) {
			ol_add_errors( ' Enter the end time, ' );
		}
		if ( empty( $_POST['edit_rating'] ) ) {
			ol_add_errors( ' Enter the rating, ' );
		}
		if ( empty( $_POST['edit_reviews'] ) ) {
			ol_add_errors( ' Enter the reviews, ' );
		}
		if ( 5 < $_POST['edit_rating'] ) {
			ol_add_errors( 'The rating cannot be more than 5 stars ' );
		}
	}

	if ( $_SESSION['errors']['danger'] ) {
		return;
	}

	if ( isset( $_FILES['uploadedFile'] ) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK ) {
		$file_tmp_path           = $_FILES['uploadedFile']['tmp_name'];
		$file_name               = $_FILES['uploadedFile']['name'];
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

	ol_update_restaurant_db(
		array(
			'id'         => esc_html( $_POST['edit_id'] ),
			'name'       => esc_html( $_POST['edit_name'] ),
			'type'       => esc_html( $_POST['edit_type'] ),
			'phone'      => esc_html( $_POST['edit_phone'] ),
			'address'    => esc_html( $_POST['edit_address'] ),
			'start_time' => esc_html( $_POST['edit_start_time'] ),
			'end_time'   => esc_html( $_POST['edit_end_time'] ),
			'rating'     => esc_html( $_POST['edit_rating'] ),
			'reviews'    => esc_html( $_POST['edit_reviews'] ),
			'url_photo'  => 'img/' . $new_name_file,
		)
	);
	ol_clear_url();
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
 * @return integer
 */
function ol_get_click_pagination() {
	if ( empty( $_GET['pagination'] ) ) {
		return 0;
	}

	return esc_html( $_GET['pagination'] );
}

/**
 * Adding errors.
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
        <div class="errors-wrapper alert alert-<?php echo $key; ?>" role="alert">
			<?php foreach ( $error_type as $error ) : ?>
                <div>
					<?php echo $error; ?>
                </div>
			<?php endforeach; ?>
        </div>
		<?php
    }
}

/**
 * Generate a page for the user.
 *
 * @param array $restaurants
 */
function ol_show_template( $restaurants ) {
	include 'view/header.tpl.php';
	include 'view/' . $restaurants['action'] . '.tpl.php';
	include 'view/footer.tpl.php';

	ol_echo_errors();
}
