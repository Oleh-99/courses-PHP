<?php

/**
 * Show_template
 * Page generation
 * @param array $restaurants
 */
function show_template( $restaurants ) {
	extract( $restaurants );

	include 'application/view/header.tpl.php';
	include 'application/view/' . $action . '.tpl.php';
	include 'application/view/footer.tpl.php';
}

function get_current_route() {
	return esc_html( $_GET['action'] );
}

/**
 * Esc_html
 *
 * @param  string $data
 * renders data
 */
function esc_html( $data ) {
	return htmlspecialchars( trim( $data ) );
}

/**
 * Ar
 *
 * @param  array $data
 * array output
 */
function ar( $data ) {
	echo '<pre>';
	print_r( $data );
	echo '</pre>';
}

function ol_sing_up_user() {
	if ( empty( $_POST['login'] ) || empty( $_POST['password'] ) ) {
		return;
	}

	$login = esc_html( $_POST['login'] );
	$password = esc_html( $_POST['password'] );
	$data_users = get_users_restaurants_db( $login );

	foreach ( $data_users as $value ) {
		if ( $value['login'] === $login && password_verify( $password, $value['password'] ) ) {
			$_SESSION['login'] = $login;
		}
	}

	if ( ! $_SESSION['login'] ) {
		echo 'Error';
	}

	$action = '404';
}
