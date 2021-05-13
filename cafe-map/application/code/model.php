<?php

$dbh = new PDO( 'mysql:host=192.168.1.84;dbname=courses', 'cours', 'cours' );

/**
 * Issues posts from the set limit.
 * @param integer $start_pos
 * @return array
 */
function get_restaurants_db( $start_pos = 0 ) {
	global $dbh;
	$stmt = $dbh->prepare( 'SELECT * FROM restaurants LIMIT :start_pos, 5' );
	$stmt->bindValue( ':start_pos', $start_pos, PDO::PARAM_INT );
	$stmt->execute();

	return $stmt->fetchAll();
}

/**
 * Find out the number of posts in the database.
 * @return integer
 */
function get_count_restaurants_db() {
	global $dbh;
	$stmt = $dbh->query( 'SELECT COUNT(*) from restaurants' );
	$stmt->execute();

	return $stmt->fetchColumn();
}