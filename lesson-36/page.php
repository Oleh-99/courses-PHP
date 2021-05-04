<?php
$dbh = new PDO( 'mysql:host=localhost;dbname=courses', 'root', 'root' );
?>

<h3>8. В таблице pages найти строки, в которых фамилия автора заканчивается на "ов".</h3>

<?php
function ol_todo_8() {
	global $dbh;

	foreach ( $dbh->query( 'SELECT * from bg2 WHERE athor LIKE "%ов"' ) as $row ) {
		echo $row['athor'] . ' => ' . $row['article'] . '<br>';
	}
}
ol_todo_8();
?>

<h3>9. В таблице pages найти строки, в которых есть слово "элемент" (искать только по колонке article).</h3>

<?php
function ol_todo_9() {
	global $dbh;

	foreach ( $dbh->query( 'SELECT * from bg2 WHERE article LIKE "%элемент%"' ) as $row ) {
		echo $row['athor'] . ' => ' . $row['article'] . '<br>';
	}
}
ol_todo_9();
?>
