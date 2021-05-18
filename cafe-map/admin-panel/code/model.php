<?php

$ol_dbh = new PDO( 'mysql:host=192.168.1.84;dbname=courses', 'cours', 'cours' );

/**
 * Checks if the user is in the database.
 * @param string $login
 * @return array
 */
function ol_get_users_restaurants_db( $login ) {
	global $ol_dbh;
	$stmt = $ol_dbh->prepare( 'SELECT * FROM users_restaurants WHERE login =:login' );
	$stmt->bindParam( ':login', $login );
	$stmt->execute();

	return $stmt->fetchAll();
}

/**
 * Issues posts from the set limit.
 * @param integer $start_pos
 * @return array
 */
function ol_get_restaurants_db( $start_pos = 0 ) {
	global $ol_dbh;
	$stmt = $ol_dbh->prepare( 'SELECT * FROM restaurants LIMIT :start_pos, 5' );
	$stmt->bindValue( ':start_pos', $start_pos, PDO::PARAM_INT );
	$stmt->execute();

	return $stmt->fetchAll();
}

/**
 * Loading a post to the database.
 * @param array $restaurant
 * @param string $action
 * @return boolean
 */
function ol_loading_restaurant_db( $restaurant, $action = '' ) {
	global $ol_dbh;
	if ( 'update' === $action) {
		$stmt = $ol_dbh->prepare( 'UPDATE restaurants SET name = :name, type = :type, phone = :phone, address = :address,rating = :rating, number_of_reviews = :reviews, time_start = :time_start, time_end = :time_end, url_photo = :url_photo, lat = :lat, lon = :lon WHERE id = :id' );
		$stmt->bindParam( ':id', $restaurant['id'] );
	} else {
		$stmt = $ol_dbh->prepare( 'INSERT INTO restaurants ( name, type, phone, address, time_start, time_end, rating, number_of_reviews, url_photo, lat, lon ) VALUES ( :name, :type, :phone, :address, :time_start, :time_end, :rating, :reviews, :url_photo, :lat, :lon )' );
	}
	$stmt->bindParam( ':name', $restaurant['name'] );
	$stmt->bindParam( ':type', $restaurant['type'] );
	$stmt->bindParam( ':phone', $restaurant['phone'] );
	$stmt->bindParam( ':address', $restaurant['address'] );
	$stmt->bindParam( ':time_start', $restaurant['start_time'] );
	$stmt->bindParam( ':time_end', $restaurant['end_time'] );
	$stmt->bindParam( ':rating', $restaurant['rating'] );
	$stmt->bindParam( ':reviews', $restaurant['reviews'] );
	$stmt->bindParam( ':lat', $restaurant['lat'] );
	$stmt->bindParam( ':lon', $restaurant['lon'] );

	if ( $restaurant['url_photo'] ) {
		$stmt->bindParam( ':url_photo', $restaurant['url_photo'] );
	}

	return $stmt->execute();
}

/**
 * Remove the post from the database.
 * @param integer $id
 * @return boolean
 */
function ol_remove_restaurant_db( $id ) {
	global $ol_dbh;
	$stmt = $ol_dbh->prepare( 'DELETE FROM restaurants WHERE id = :id' );
	$stmt->bindParam( ':id', $id );

	return $stmt->execute();
}

/**
 * Receives post data by id.
 * @param integer $id
 * @return array
 */
function ol_get_restaurant_by_id_db( $id ) {
	global $ol_dbh;
	$stmt = $ol_dbh->prepare( 'SELECT * FROM restaurants WHERE id = :id' );
	$stmt->bindParam( ':id', $id );
	$stmt->execute();

	return $stmt->fetchAll();
}

/**
 * Find out the number of posts in the database.
 * @return integer
 */
function ol_get_count_restaurants_db() {
	global $ol_dbh;
	$stmt = $ol_dbh->query( 'SELECT COUNT(*) from restaurants' );
	$stmt->execute();

	return $stmt->fetchColumn();
}

/**
 * Loading a page to the database.
 * @param array $page
 * @param string $action
 * @return boolean
 */
function ol_loading_page_db( $page, $action = '' ) {
	global $ol_dbh;
	if ( 'update' === $action ) {
		$stmt = $ol_dbh -> prepare( 'UPDATE restaurants_page SET title = :title, content = :content WHERE id = :id' );
		$stmt -> bindParam( ':id', $page['id'] );
	} else {
		$stmt = $ol_dbh -> prepare( 'INSERT INTO restaurants_page ( title, content ) VALUES ( :title, :content )' );
	}
	$stmt -> bindParam( ':title', $page['title'] );
	$stmt -> bindParam( ':content', $page['content'] );
	
	return $stmt -> execute();
}

/**
 * Issues page.
 * @return array
 */
function ol_get_page_db() {
	global $ol_dbh;
	$stmt = $ol_dbh->prepare( 'SELECT * FROM restaurants_page' );
	$stmt->execute();
	
	return $stmt->fetchAll();
}

/**
 * Remove the page from the database.
 * @param integer $id
 * @return boolean
 */
function ol_remove_page_db( $id ) {
	global $ol_dbh;
	$stmt = $ol_dbh->prepare( 'DELETE FROM restaurants_page WHERE id = :id' );
	$stmt->bindParam( ':id', $id );
	
	return $stmt->execute();
}

/**
 * Receives post data by id.
 * @param integer $id
 * @return array
 */
function ol_get_page_by_id_db( $id ) {
	global $ol_dbh;
	$stmt = $ol_dbh->prepare( 'SELECT * FROM restaurants_page WHERE id = :id' );
	$stmt->bindParam( ':id', $id );
	$stmt->execute();
	
	return $stmt->fetchAll();
}
