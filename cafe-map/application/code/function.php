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
 * Number of restaurants in the database.
 *
 * @return int Number of restaurants.
 */
function ol_get_count_cafe() {
	return ol_get_count_restaurants_db();
}

/**
 * Checks which page of the asset.
 *
 * @return integer Pagination.
 */
function ol_get_click_pagination() {
	$pagination = esc_html( $_GET['pagination'] );

	if ( empty( $_GET['pagination'] ) ) {
		$pagination = 0;
	}

	return $pagination;
}

/**
 * Check for active or page.
 *
 * @param mixed $data Data.
 * @param mixed $id Id page.
 * @return string
 */
function ol_get_current( $data, $id = 0 ) {
	$class = '';

	if ( ( $data === $_GET['action'] && 0 === $id ) || ( $data === $_GET['action'] && $_GET['id'] === $id ) || ( empty( $_GET['action'] ) && 'home' === $data ) ) {
		$class = 'active';
	}

	return $class;
}

/**
 * We process data from the form.
 */
function ol_render_form() {
	if ( ! isset( $_POST['sing_up'] ) && ! isset( $_POST['registration'] ) ) {
		return;
	}

	if ( empty( $_POST['login'] ) ) {
		ol_add_errors( 'Enter the login' );
	}
	if ( empty( $_POST['password'] ) ) {
		ol_add_errors( 'Enter the password' );
	}

	if ( ol_get_check_error() ) {
		return;
	}

	if ( isset( $_POST['sing_up'] ) ) {
		ol_sing_up_users();
	}

	if ( isset( $_POST['registration'] ) ) {
		ol_registration_users();
	}
}

/**
 * User login to the account.
 */
function ol_sing_up_users() {
	$login      = esc_html( $_POST['login'] );
	$password   = esc_html( $_POST['password'] );
	$users_data = ol_get_login_in_db( $login );

	foreach ( $users_data as $user ) {
		if ( $user['login'] === $login && password_verify( $password, $user['password'] ) ) {
			$_SESSION['login'] = $login;
			$_SESSION['id']    = $user['id'];
		}
	}

	if ( ! $_SESSION['login'] ) {
		ol_add_errors( 'Invalid login or password' );
		return;
	}

	ol_clear_url();
}

/**
 * User registration.
 */
function ol_registration_users() {
	$login    = esc_html( $_POST['login'] );
	$password = password_hash( esc_html( $_POST['password'] ), PASSWORD_DEFAULT );

	if ( 8 > strlen( $_POST['password'] ) ) {
		ol_add_errors( 'The minimum password length is 8 characters' );
		return;
	}

	if ( ol_get_login_in_db( $login ) ) {
		ol_add_errors( 'A user with this login already exists' );
		return;
	}

	$result = ol_registration_in( $login, $password );

	if ( $result ) {
		ol_add_errors( 'You are registered', 'success' );
		$_SESSION['login'] = $login;
		$_SESSION['id']    = $result;
		ol_clear_url();
	} else {
		ol_add_errors( 'You are not registered' );
	}
}

/**
 * Adds or removes from the list of favorites.
 *
 * @param array $favorites List of favorite restaurants from the database.
 */
function ol_render_favorite( $favorites ) {
	if ( empty( $_GET['add-favorite'] ) ) {
		return;
	}

	$user_id        = 0;
	$user_favorites = array();
	$restoran_id    = esc_html( $_GET['add-favorite'] );

	foreach ( $favorites as $favorite ) {
		$user_id        = $favorite['id'];
		$user_favorites = unserialize( $favorite['favorite'] );
	}

	if ( $user_favorites ) {
		$number_favorite = array_search( $restoran_id, $user_favorites );

		if ( $number_favorite === 0 || $number_favorite ) {
			unset( $user_favorites[ $number_favorite ] );
		} else {
			$user_favorites[] = $restoran_id;
		}
	} else {
		$user_favorites[] = $restoran_id;
	}

	$result = ol_add_favorite_in_db(
		array(
			'id'       => $user_id,
			'favorite' => serialize( $user_favorites ),
		)
	);

	if ( $result ) {
		ol_add_errors( 'The restaurant is update to favorites', 'success' );
		$action = '?';

		if ( ! empty( $_GET['action'] ) ) {
			$action .= 'action=' . esc_html( $_GET['action'] );
		}

		if ( ! empty( $_GET['pagination'] ) ) {
			$action .= '&pagination=' . esc_html( $_GET['pagination'] );
		}

		ol_clear_url( $action );
	} else {
		ol_add_errors( 'The restaurant is not update to favorites' );
	}
}

/**
 * Forms the user's favorite restaurants.
 *
 * @return array Date restaurants.
 */
function ol_get_favorite() {
	$result         = ol_get_data_in_db( $_SESSION['id'] );
	$user_favorites = array();

	foreach ( $result as $favorite ) {
		$user_favorites = unserialize( $favorite['favorite'] );
	}

	return $user_favorites;
}

/**
 * Checks in an array of favorite restaurant.
 *
 * @param array $favorite Array of id favorite restaurants.
 * @param int   $id Id of the current restaurant.
 * @return string
 */
function ol_check_favorite( $favorite, $id ) {
	$class = '';

	if ( in_array( $id, $favorite, true ) ) {
		$class = 'active';
	}

	return $class;
}

/**
 * The user's favorite restaurants are generated.
 *
 * @return array Favorite restaurants.
 */
function ol_get_restaurants_favorite() {
	$favorite_post    = ol_get_favorite();
	$data_restaurants = array();

	if ( ! $favorite_post ) {
		return;
	}

	foreach ( $favorite_post as $id_restaurant ) {
		$data_restaurants[] = ol_get_restaurant_by_id_db( $id_restaurant );
	}

	return $data_restaurants;
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
 * @param array $restaurants array data.
 */
function show_template( $restaurants ) {
	include 'application/view/header.tpl.php';
	include 'application/view/' . $restaurants['action'] . '.tpl.php';
	include 'application/view/footer.tpl.php';

	ol_echo_errors();
}
