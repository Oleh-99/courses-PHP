<?php

$ol_dbh = new PDO( 'mysql:host=192.168.1.84;dbname=courses', 'cours', 'cours' );

/**
 * Issues posts from the set limit.
 *
 * @param integer $start_pos issues posts.
 * @return array
 */
function ol_get_restaurants_db( $start_pos = 0 ) {
	global $ol_dbh;

	$stmt = $ol_dbh->prepare( 'SELECT * FROM restaurants ORDER BY id DESC LIMIT :start_pos, 5' );
	$stmt->bindValue( ':start_pos', $start_pos, PDO::PARAM_INT );
	$stmt->execute();

	return $stmt->fetchAll();
}

/**
 * Find out the number of posts in the database.
 *
 * @return array
 */
function ol_get_count_restaurants_db() {
	global $ol_dbh;

	$stmt = $ol_dbh->query( 'SELECT COUNT(*) from restaurants' );
	$stmt->execute();

	return $stmt->fetchColumn();
}

/**
 * Publishes pages from the database.
 *
 * @return array
 */
function ol_get_view_page_db() {
	global $ol_dbh;

	$stmt = $ol_dbh->prepare( 'SELECT * FROM restaurants_page' );
	$stmt->execute();

	return $stmt->fetchAll();
}

/**
 * Search the page by id in the database.
 *
 * @param int $id id page.
 * @return array
 */
function ol_get_view_page_by_id_db( $id ) {
	global $ol_dbh;

	$stmt = $ol_dbh->prepare( 'SELECT * FROM restaurants_page WHERE id = :id' );
	$stmt->bindParam( ':id', $id );
	$stmt->execute();

	return $stmt->fetchAll();
}

function ol_get_login_in_db( $login ) {
	global $ol_dbh;

	$stmt = $ol_dbh->prepare( 'SELECT * FROM users_restaurants WHERE login = :login' );
	$stmt->bindParam( ':login', $login );
	$stmt->execute();

	return $stmt->fetchAll();
}

function ol_registration_in( $login, $password ) {
	global $ol_dbh;

	$stmt = $ol_dbh->prepare( 'INSERT INTO users_restaurants ( login, password ) VALUES ( :login, :password )' );
	$stmt->bindParam( ':login', $login );
	$stmt->bindParam( ':password', $password );
	$stmt->execute();

	return $ol_dbh->lastInsertId();
}

function ol_add_favorite_in_db( $favorite ) {
	global $ol_dbh;

	$stmt = $ol_dbh->prepare( 'UPDATE users_restaurants SET favorite = :favorite WHERE id = :id' );
	$stmt->bindParam( ':id', $favorite['id'] );
	$stmt->bindParam( ':favorite', $favorite['favorite'] );

	return $stmt->execute();
}

function ol_get_data_in_db( $id ) {
	global $ol_dbh;

	$stmt = $ol_dbh->prepare( 'SELECT * FROM users_restaurants WHERE id = :id' );
	$stmt->bindParam( ':id', $id );
	$stmt->execute();

	return $stmt->fetchAll();
}

/**
 *
 *
 * @return array
 */
function ol_get_restaurant_by_id_db( $id ) {
	global $ol_dbh;

	$stmt = $ol_dbh->prepare( 'SELECT * FROM restaurants WHERE id = :id' );
	$stmt->bindParam( ':id', $id );
	$stmt->execute();

	return $stmt->fetch();
}