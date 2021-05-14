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
 * Add a post to the database.
 * @param array $restaurant
 */
function ol_insert_restaurant_db( $restaurant ) {
	global $ol_dbh;
	$stmt = $ol_dbh->prepare( 'INSERT INTO restaurants ( name, type, phone, address, time_start, time_end, rating, number_of_reviews, url_photo, lat, lon ) VALUES ( :name, :type, :phone, :address, :time_start, :time_end, :rating, :reviews, :url_photo, :lat, :lon )' );
	$stmt->bindParam( ':name', $restaurant['name'] );
	$stmt->bindParam( ':type', $restaurant['type'] );
	$stmt->bindParam( ':phone', $restaurant['phone'] );
	$stmt->bindParam( ':address', $restaurant['address'] );
	$stmt->bindParam( ':time_start', $restaurant['start_time'] );
	$stmt->bindParam( ':time_end', $restaurant['end_time'] );
	$stmt->bindParam( ':rating', $restaurant['rating'] );
	$stmt->bindParam( ':reviews', $restaurant['reviews'] );
	$stmt->bindParam( ':url_photo', $restaurant['url_photo'] );
	$stmt->bindParam( ':lat', $restaurant['lat'] );
	$stmt->bindParam( ':lon', $restaurant['lon'] );
	if ( $stmt->execute() ) {
		ol_add_errors( ' The post has been added to the database ', 'success' );
	} else {
		ol_add_errors( ' The post has not added to the database ' );
	}
}

/**
 * Remove the post from the database.
 * @param integer $id
 */
function ol_remove_restaurant_db( $id ) {
	global $ol_dbh;
	$stmt = $ol_dbh->prepare( 'DELETE FROM restaurants WHERE id = :id' );
	$stmt->bindParam( ':id', $id );
	if ( $stmt->execute() ) {
		ol_add_errors( ' This post has been deleted ', 'success' );
	} else {
		ol_add_errors( ' This post has not been deleted ' );
	}
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
 * Updates posting data in the database
 * @param array $restaurant
 */
function ol_update_restaurant_db( $restaurant ) {
	global $ol_dbh;
	$stmt = $ol_dbh->prepare( 'UPDATE restaurants SET name = :name, type = :type, phone = :phone, address = :address,rating = :rating, number_of_reviews = :reviews, time_start = :time_start, time_end = :time_end, url_photo = :url_photo WHERE id = :id' );
	$stmt->bindParam( ':id', $restaurant['id'] );
	$stmt->bindParam( ':name', $restaurant['name'] );
	$stmt->bindParam( ':type', $restaurant['type'] );
	$stmt->bindParam( ':phone', $restaurant['phone'] );
	$stmt->bindParam( ':address', $restaurant['address'] );
	$stmt->bindParam( ':time_start', $restaurant['start_time'] );
	$stmt->bindParam( ':time_end', $restaurant['end_time'] );
	$stmt->bindParam( ':rating', $restaurant['rating'] );
	$stmt->bindParam( ':reviews', $restaurant['reviews'] );
	$stmt->bindParam( ':url_photo', $restaurant['url_photo'] );
	if ( $stmt->execute() ) {
		ol_add_errors( ' The post has been updated to the database ', 'success' );
	} else {
		ol_add_errors( ' The post has not been updated to the database ' );
	}
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
