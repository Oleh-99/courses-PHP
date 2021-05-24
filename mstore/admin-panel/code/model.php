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

	$stmt = $ol_dbh->prepare( 'SELECT * FROM mstore' );
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

	$stmt = $ol_dbh->prepare( 'SELECT * FROM mstore_order' );
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

	$stmt = $ol_dbh->query( $request );
	return $stmt->fetchAll();
}
