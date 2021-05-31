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
	$request    = ol_get_request_for_db();
	$sort_price = ol_get_sort_price();
	$count      = ol_get_view_product_in_page();

	$stmt = $ol_dbh->prepare( 'SELECT * FROM ( SELECT * FROM mstore ' . $request . $sort_price . ' LIMIT :start_pos, :count) AS product LEFT JOIN ( SELECT product_id, AVG(stars),COUNT(*) FROM mstore_comment GROUP BY product_id ) AS comment ON comment.product_id = product.id' );
	$stmt->bindValue( ':start_pos', $start_pos, PDO::PARAM_INT );
	$stmt->bindValue( ':count', $count, PDO::PARAM_INT );
	$stmt->execute();

	return $stmt->fetchAll();
}

/**
 * Finds out the prices of products on the page.
 *
 * @param int $start_pos issues posts.
 * @return array Price product.
 */
function ol_get_price_db( $start_pos = 0 ) {
	global $ol_dbh;
	$request    = ol_get_request_for_db();
	$sort_price = ol_get_sort_price();
	$count      = ol_get_view_product_in_page();

	$stmt = $ol_dbh->prepare( 'SELECT price FROM mstore ' . $request . $sort_price . ' LIMIT :start_pos, :count' );
	$stmt->bindValue( ':start_pos', $start_pos, PDO::PARAM_INT );
	$stmt->bindValue( ':count', $count, PDO::PARAM_INT );
	$stmt->execute();

	return $stmt->fetchAll( PDO::FETCH_COLUMN );
}

/**
 * We make a request to the database on id.
 *
 * @param int $id Id product.
 * @return array Data product.
 */
function ol_get_product_by_id_db( $id ) {
	global $ol_dbh;

	$stmt = $ol_dbh->prepare( 'SELECT * FROM mstore AS product LEFT JOIN ( SELECT product_id, AVG(stars),COUNT(*) FROM mstore_comment GROUP BY product_id ) AS comment ON comment.product_id = product.id WHERE id = :id' );
	$stmt->bindParam( ':id', $id );
	$stmt->execute();

	return $stmt->fetch();
}

/**
 * We make a request to the database on id.
 *
 * @param string $request String product.
 * @return array Data product.
 */
function ol_get_product_request_db( $request ) {
	global $ol_dbh;

	$stmt = $ol_dbh->prepare( 'SELECT * FROM mstore WHERE ' . $request );
	$stmt->execute();

	return $stmt->fetchAll();
}

/**
 * The number of products in the database.
 *
 * @return int
 */
function ol_get_count_product_db() {
	global $ol_dbh;
	$request = ol_get_request_for_db();

	$stmt = $ol_dbh->query( 'SELECT COUNT(*) from mstore ' . $request );
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

/**
 * Find out the maximum price of the products in the database.
 *
 * @return mixed Maximum price of the product.
 */
function ol_get_full_max_price() {
	global $ol_dbh;

	$stmt = $ol_dbh->query( 'SELECT MAX(price) from mstore' );
	$stmt->execute();

	return $stmt->fetchColumn();
}

/**
 * Find out the minimum price of the products in the database.
 *
 * @return mixed Minimum price of the product.
 */
function ol_get_full_min_price() {
	global $ol_dbh;

	$stmt = $ol_dbh->query( 'SELECT MIN(price) from mstore' );
	$stmt->execute();

	return $stmt->fetchColumn();
}

/**
 * Publishes existing categories in the table.
 *
 * @return array Categories.
 */
function ol_get_category_db() {
	global $ol_dbh;

	$stmt = $ol_dbh->prepare( 'SELECT category FROM mstore_category' );
	$stmt->execute();

	return $stmt->fetchAll( PDO::FETCH_COLUMN );
}

/**
 * Stores comments in a database.
 *
 * @param array $comment Comments data.
 * @return bool
 */
function ol_save_comment_db( $comment ) {
	global $ol_dbh;

	$stmt = $ol_dbh->prepare( 'INSERT INTO mstore_comment ( product_id, name, description, stars ) VALUES ( :product_id, :name, :description, :stars )' );
	$stmt->bindParam( ':product_id', $comment['product_id'] );
	$stmt->bindParam( ':name', $comment['name'] );
	$stmt->bindParam( ':description', $comment['description'] );
	$stmt->bindParam( ':stars', $comment['stars'] );

	return $stmt->execute();
}

/**
 * Takes comments for the product.
 *
 * @param int $id Id product.
 * @return array
 */
function ol_get_comment_product_db( $id ) {
	global $ol_dbh;

	$stmt = $ol_dbh->prepare( 'SELECT * FROM mstore_comment WHERE product_id = :product_id' );
	$stmt->bindParam( ':product_id', $id );
	$stmt->execute();

	return $stmt->fetchAll();
}
