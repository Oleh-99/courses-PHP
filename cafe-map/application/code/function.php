<?php

function show_template( $name, $data_db = '' ) {
	include 'application/view/header.php';
	include 'application/view/' . $name . '.php';
	include 'application/view/footer.php';
}