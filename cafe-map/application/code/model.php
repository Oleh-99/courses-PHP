<?php

$dbh = new PDO( 'mysql:host=192.168.1.84;dbname=courses', 'cours', 'cours' );

function download_date_db() {
	global $dbh;
	$stmt = $dbh->prepare( 'SELECT * FROM restaurants' );
	$stmt->execute();

	return $stmt->fetchAll();
}