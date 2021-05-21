<?php

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
