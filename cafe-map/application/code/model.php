<?php

$dbh = new PDO( 'mysql:host=192.168.1.84;dbname=courses', 'cours', 'cours' );

function get_restaurants_db() {
	global $dbh;
	$stmt = $dbh->prepare( 'SELECT * FROM restaurants LIMIT 5' );
	$stmt->execute();

	return $stmt->fetchAll();
}
