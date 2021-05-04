
<h3>1. Из таблицы workers достаньте первые 6 записей.</h3>

<?php
function ol_todo_1() {
	$dbh = new PDO( 'mysql:host=localhost;dbname=courses', 'root', 'root' );

	foreach ( $dbh->query( 'SELECT * from bg1 LIMIT 6' ) as $row ) {
		echo $row['name'] . ' ' . $row['age'] . ' ' . $row['salary'] . '<br>';
	}
}
ol_todo_1();
?>

<h3>2. Из таблицы workers достаньте записи со вторую, 3 штуки.</h3>

<?php
function ol_todo_2() {
	$dbh = new PDO( 'mysql:host=localhost;dbname=courses', 'root', 'root' );

	foreach ( $dbh->query( 'SELECT * from bg1 LIMIT 2, 3' ) as $row ) {
		echo $row['name'] . ' ' . $row['age'] . ' ' . $row['salary'] . '<br>';
	}
}
ol_todo_2();
?>

<h3>3. Из таблицы workers достаньте всех работников и отсортируйте их по возрастанию зарплаты.</h3>

<?php
function ol_todo_3() {
	$dbh = new PDO( 'mysql:host=localhost;dbname=courses', 'root', 'root' );

	foreach ( $dbh->query( 'SELECT * from bg1 ORDER BY salary' ) as $row ) {
		echo $row['name'] . ' ' . $row['age'] . ' ' . $row['salary'] . '<br>';
	}
}
ol_todo_3();
?>

<h3>4. Из таблицы workers достаньте всех работников и отсортируйте их по убыванию зарплаты.</h3>

<?php
function ol_todo_4() {
	$dbh = new PDO( 'mysql:host=localhost;dbname=courses', 'root', 'root' );

	foreach ( $dbh->query( 'SELECT * from bg1 ORDER BY salary DESC' ) as $row ) {
		echo $row['name'] . ' ' . $row['age'] . ' ' . $row['salary'] . '<br>';
	}
}
ol_todo_4();
?>

<h3>5. Из таблицы workers достаньте работников со второго по шестого и отсортируйте их по возрастанию возраста.</h3>

<?php
function ol_todo_5() {
	$dbh = new PDO( 'mysql:host=localhost;dbname=courses', 'root', 'root' );

	foreach ( $dbh->query( 'SELECT * from bg1 ORDER BY salary LIMIT 1, 4' ) as $row ) {
		echo $row['name'] . ' ' . $row['age'] . ' ' . $row['salary'] . '<br>';
	}
}
ol_todo_5();
?>

<h3>6. В таблице workers подсчитайте всех работников.</h3>

<?php
function ol_todo_6() {
	$dbh = new PDO( 'mysql:host=localhost;dbname=courses', 'root', 'root' );

	foreach ( $dbh->query( 'SELECT COUNT(*) from bg1' ) as $row ) {
		print_r( $row );
	}
}
ol_todo_6();
?>

<h3>7. В таблице workers подсчитайте всех работников c зарплатой 300$.</h3>

<?php
function ol_todo_7() {
	$dbh = new PDO( 'mysql:host=localhost;dbname=courses', 'root', 'root' );

	foreach ( $dbh->query( 'SELECT COUNT(*) from bg1 WHERE salary = 300' ) as $row ) {
		print_r( $row );
	}
}
ol_todo_7();
?>

<br><br><br>
<a href="page.php" style="font-size:20px; font-weight:700; color:#000">LIKE</a>

<h3>10. В таблице workers найти строки, в которых возраст работника начинается с числа 3, а далее идет только одна цифра.</h3>

<?php
function ol_todo_10() {
	$dbh = new PDO( 'mysql:host=localhost;dbname=courses', 'root', 'root' );

	foreach ( $dbh->query( 'SELECT * from bg1 WHERE age LIKE "3_"' ) as $row ) {
		echo $row['name'] . ' ' . $row['age'] . ' ' . $row['salary'] . '<br>';
	}
}
ol_todo_10();
?>

<h3>11. В таблице workers найти строки, в которых имя работника заканчивается на "я".</h3>

<?php
function ol_todo_11() {
	$dbh = new PDO( 'mysql:host=localhost;dbname=courses', 'root', 'root' );

	foreach ( $dbh->query( 'SELECT * from bg1 WHERE name LIKE "%я"' ) as $row ) {
		echo $row['name'] . ' ' . $row['age'] . ' ' . $row['salary'] . '<br>';
	}
}
ol_todo_11();
?>