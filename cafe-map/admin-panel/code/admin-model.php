<?php

$dbh = new PDO( 'mysql:host=192.168.1.84;dbname=courses', 'cours', 'cours' );

function get_users_restaurants_db( $login ) {
	global $dbh;
	$stmt = $dbh->prepare( 'SELECT * FROM users_restaurants WHERE login =:login' );
	$stmt->bindParam( ':login', $login );
	$stmt->execute();

	return $stmt->fetchAll();
}

function get_restaurants_db( $start_pos = 0 ) {
	global $dbh;
	$stmt = $dbh->prepare( 'SELECT * FROM restaurants LIMIT :start_pos, 5' );
	$stmt->bindValue ( ':start_pos', $start_pos, PDO::PARAM_INT);
	$stmt->execute();

	return $stmt->fetchAll();
}

function insert_restaurant_db( $restaurant ) {
	extract( $restaurant );

	global $dbh;
	$stmt = $dbh->prepare( 'INSERT INTO restaurants ( name, type, phone, adress, time_start, time_end ) VALUES ( :name, :type, :phone, :adress, :time_start, :time_end )' );
	$stmt->bindParam( ':name', $name );
	$stmt->bindParam( ':type', $type );
	$stmt->bindParam( ':phone', $phone );
	$stmt->bindParam( ':adress', $adress );
	$stmt->bindParam( ':time_start', $start_time);
	$stmt->bindParam( ':time_end', $end_time );
//	$stmt->bindParam( ':url_foto', $url_foto );
	$stmt->execute();
}

function remove_restaurant_db( $id ) {
	global $dbh;
	$stmt = $dbh->prepare( 'DELETE FROM restaurants WHERE id = :id' );
	$stmt->bindParam( ':id', $id );
	$stmt->execute();
}

function get_restaurant_by_id_db( $id ) {
	global $dbh;
	$stmt = $dbh->prepare( 'SELECT * FROM restaurants WHERE id = :id' );
	$stmt->bindParam( ':id', $id );
	$stmt->execute();

	return $stmt->fetchAll();
}

function update_restaurant_db( $restaurant ) {
	extract( $restaurant );

	global $dbh;
	$stmt = $dbh->prepare( 'UPDATE restaurants SET name = :name, type = :type, phone = :phone, adress = :adress,rating = :rating, number_of_reviews = :reviews, time_start = :time_start, time_end = :time_end WHERE id = :id' );
	$stmt->bindParam( ':id', $id );
	$stmt->bindParam( ':name', $name );
	$stmt->bindParam( ':type', $type );
	$stmt->bindParam( ':phone', $phone );
	$stmt->bindParam( ':adress', $adress );
	$stmt->bindParam( ':time_start', $start_time);
	$stmt->bindParam( ':time_end', $end_time );
	$stmt->bindParam( ':rating', $rating );
	$stmt->bindParam( ':reviews', $reviews );
	$stmt->execute();
}

function get_count_restaurants_db() {
	global $dbh;
	$stmt = $dbh->prepare( 'SELECT COUNT(*) from restaurants' );
	$stmt->execute();

	return $stmt->fetchAll();
}
