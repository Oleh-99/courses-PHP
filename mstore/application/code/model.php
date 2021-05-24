<?php
/**
 * Model.
 *
 * @package Funtion.
 */

$ol_dbh = new PDO( 'mysql:host=192.168.1.84;dbname=courses', 'cours', 'cours' );

/**
 * Issues products from the set limit.
 *
 * @param integer $start_pos issues posts.
 * @return array Data products.
 */
function ol_get_product_db( $start_pos = 0 ) {
	global $ol_dbh;

	$stmt = $ol_dbh->prepare( 'SELECT * FROM mstore LIMIT :start_pos, 9' );
	$stmt->bindValue( ':start_pos', $start_pos, PDO::PARAM_INT );
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
 * Records a user order.
 *
 * @param array $order_data Order data.
 * @return bool
 */
function ol_add_order_db( $order_data ) {
	global $ol_dbh;

	$stmt = $ol_dbh->prepare( 'INSERT INTO mstore_order (name, last_name, country, city, address, zip, phone, email, price, card) VALUES ( :name, :last_name, :country, :city, :address, :zip, :phone, :email, :price, :card)' );
	$stmt->bindParam( ':name', $order_data['name'] );
	$stmt->bindParam( ':last_name', $order_data['last-name'] );
	$stmt->bindParam( ':country', $order_data['country'] );
	$stmt->bindParam( ':city', $order_data['city'] );
	$stmt->bindParam( ':address', $order_data['address'] );
	$stmt->bindParam( ':zip', $order_data['zip'] );
	$stmt->bindParam( ':phone', $order_data['phone'] );
	$stmt->bindParam( ':email', $order_data['email'] );
	$stmt->bindParam( ':price', $order_data['price'] );
	$stmt->bindParam( ':card', $order_data['card'] );

	return $stmt->execute();
}
