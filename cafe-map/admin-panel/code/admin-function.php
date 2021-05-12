<?php
session_start();

function show_template( $restaurants ) {
	extract( $restaurants );

	include 'view/header.tpl.php';
	include 'view/' . $action . '.tpl.php';
	include 'view/footer.tpl.php';
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

	$login      = esc_html( $_POST['login'] );
	$password   = esc_html( $_POST['password'] );
	$data_users = get_users_restaurants_db( $login );

	foreach ( $data_users as $value ) {
		if ( $value['login'] === $login && password_verify( $password, $value['password'] ) ) {
			$_SESSION['login'] = $login;
		}
	}

	if ( ! $_SESSION['login'] ) {
		echo 'Error';
	}

}

function ol_create_post() {
	if ( empty( $_POST['name'] ) && empty( $_POST['type'] ) && empty( $_POST['phone'] ) && empty( $_POST['adress'] ) && empty( $_POST['start_time'] ) && empty( $_POST['end_time'] ) ) {
		return;
	}

	insert_restaurant_db(
		array(
			'name'       => esc_html( $_POST['name'] ),
			'type'       => esc_html( $_POST['type'] ),
			'phone'      => esc_html( $_POST['phone'] ),
			'adress'     => esc_html( $_POST['adress'] ),
			'start_time' => esc_html( $_POST['start_time'] ),
			'end_time'   => esc_html( $_POST['end_time'] ),
		)
	);
}

function ol_edit_post() {
	if ( empty( $_POST['edit_id'] ) && empty( $_POST['edit_name'] ) && empty( $_POST['edit_type'] ) && empty( $_POST['edit_phone'] ) && empty( $_POST['edit_adress'] ) && empty( $_POST['edit_start_time'] ) && empty( $_POST['edit_end_time'] ) && empty( $_POST['edit_rating'] ) && empty( $_POST['edit_reviews'] ) ) {
		return;
	}

	update_restaurant_db(
		array(
			'id'         => esc_html( $_POST['edit_id'] ),
			'name'       => esc_html( $_POST['edit_name'] ),
			'type'       => esc_html( $_POST['edit_type'] ),
			'phone'      => esc_html( $_POST['edit_phone'] ),
			'adress'     => esc_html( $_POST['edit_adress'] ),
			'start_time' => esc_html( $_POST['edit_start_time'] ),
			'end_time'   => esc_html( $_POST['edit_end_time'] ),
			'rating'     => esc_html( $_POST['edit_rating'] ),
			'reviews'    => esc_html( $_POST['edit_reviews'] ),
		)
	);
}

function get_ol_count_cafe() {
	$count = get_count_restaurants_db();
	return $count[0][0];
}

function get_ol_click_pagination() {
	if ( empty( $_GET['pagination'] ) ) {
		return 0;
	}

	return esc_html( $_GET['pagination'] );
}