<?php

$ol_dbh = new PDO( 'mysql:host=192.168.1.84;dbname=courses', 'cours', 'cours' );

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
 * Find out the number of posts in the database.
 * @return integer
 */
function ol_get_count_restaurants_db() {
	global $ol_dbh;
	$stmt = $ol_dbh->query( 'SELECT COUNT(*) from restaurants' );
	$stmt->execute();

	return $stmt->fetchColumn();
}

function ol_get_view_page_db() {
	global $ol_dbh;
	$stmt = $ol_dbh->prepare( 'SELECT * FROM restaurants_page' );
	$stmt->execute();
	
	return $stmt->fetchAll();
}

function ol_get_view_page_by_id_db( $id ) {
	global $ol_dbh;
	$stmt = $ol_dbh->prepare( 'SELECT * FROM restaurants_page WHERE id = :id' );
	$stmt->bindParam(':id', $id );
	$stmt->execute();
	
	return $stmt->fetchAll();
}
