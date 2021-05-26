<?php
/**
 * Model.
 *
 * @package Funtion.
 */

$ol_dbh = new PDO( 'mysql:host=192.168.1.84;dbname=courses', 'cours', 'cours' );

/**
 * Issues products.
 *
 * @return array Data products.
 */
function ol_get_product_db() {
	global $ol_dbh;

	$stmt = $ol_dbh->prepare( 'SELECT * FROM mstore ORDER BY id DESC' );
	$stmt->execute();

	return $stmt->fetchAll();
}

/**
 * We make a request to the database on id.
 *
 * @param int $id Id product.
 * @return array Data product.
 */
function ol_get_product_by_id_db( $id ) {
	global $ol_dbh;

	$stmt = $ol_dbh->prepare( 'SELECT * FROM mstore WHERE id = :id' );
	$stmt->bindParam( ':id', $id );
	$stmt->execute();

	return $stmt->fetch();
}

/**
 * The number of products in the database.
 *
 * @return int
 */
function ol_get_count_product_db() {
	global $ol_dbh;

	$stmt = $ol_dbh->query( 'SELECT COUNT(*) from mstore' );
	$stmt->execute();

	return $stmt->fetchColumn();
}

/**
 * Get orders database.
 *
 * @return array Orders.
 */
function ol_get_orders_db() {
	global $ol_dbh;

	$stmt = $ol_dbh->prepare( 'SELECT * FROM mstore_order ORDER BY id DESC ' );
	$stmt->execute();

	return $stmt->fetchAll();
}

/**
 * Get order by id database.
 *
 * @param int $id Order id.
 * @return mixed Data order.
 */
function ol_get_order_by_id_db( $id ) {
	global $ol_dbh;

	$stmt = $ol_dbh->prepare( 'SELECT * FROM mstore_order WHERE id = :id' );
	$stmt->bindParam( ':id', $id );
	$stmt->execute();

	return $stmt->fetch();
}

/**
 * Get order by id.
 *
 * @param string $request Request with id.
 * @return array
 */
function ol_get_product_by_string_id_db( $request ) {
	global $ol_dbh;

	$stmt = $ol_dbh->query( 'SELECT * FROM mstore WHERE' . $request );
	return $stmt->fetchAll();
}

/**
 * Insert or update product database.
 *
 * @param array  $product Data product.
 * @param string $action Action.
 * @return bool
 */
function ol_product_db( $product, $action = '' ) {
	global $ol_dbh;

	if ( 'update' === $action ) {
		$stmt = $ol_dbh->prepare( 'UPDATE mstore SET title = :title, price = :price, photo = :photo, description = :description, label = :label, stars = :stars WHERE id = :id' );
		$stmt->bindParam( ':id', $product['id'] );
	} else {
		$stmt = $ol_dbh->prepare( 'INSERT INTO mstore ( title, price, photo, description, label, stars ) VALUE ( :title, :price, :photo, :description, :label, :stars )' );
	}
	$stmt->bindParam( ':title', $product['title'] );
	$stmt->bindParam( ':price', $product['price'] );
	$stmt->bindParam( ':description', $product['description'] );
	$stmt->bindParam( ':label', $product['label'] );
	$stmt->bindParam( ':photo', $product['photo'] );
	$stmt->bindParam( ':stars', $product['stars'] );

	return $stmt->execute();
}

/**
 * Remove product by id.
 *
 * @param int $id Id product.
 * @return bool
 */
function ol_remove_product_db( $id ) {
	global $ol_dbh;

	$stmt = $ol_dbh->prepare( 'DELETE FROM mstore WHERE id = :id ' );
	$stmt->bindParam( ':id', $id );

	return $stmt->execute();
}

/**
 * Check if there is a login in the database.
 *
 * @param int $login Login users.
 * @return array
 */
function ol_sing_in_user_db( $login ) {
	global $ol_dbh;

	$stmt = $ol_dbh->prepare( 'SELECT * FROM mstore_users WHERE login = :login ' );
	$stmt->bindParam( ':login', $login );
	$stmt->execute();

	return $stmt->fetchAll();
}
