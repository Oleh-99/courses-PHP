<?php
$dbh = new PDO( 'mysql:host=localhost;dbname=courses', 'root', 'root' );
?>

<h3>1. Выбрать работника с id = 3.</h3>

<?php
function ol_todo_1() {
	global $dbh;

	foreach ( $dbh->query( 'SELECT * from bg1 WHERE id = 3' ) as $row ) {
		for ( $i = 0; $i < count( $row ); $i++ ) {
			echo $row[ $i ] . ' ';
		}
	}
}
ol_todo_1();
?>

<h3>2. Выбрать работников с зарплатой 1000$.</h3>

<?php
function ol_todo_2() {
	global $dbh;

	foreach ( $dbh->query( 'SELECT * from bg1 WHERE salary = 1000' ) as $row ) {
		echo $row['name'] . ' ' . $row['salary'] . '<br>';
	}
}
ol_todo_2();
?>

<h3>3. Выбрать работников в возрасте 23 года.</h3>

<?php
function ol_todo_3() {
	global $dbh;

	foreach ( $dbh->query( 'SELECT * from bg1 WHERE age = 23' ) as $row ) {
		echo $row['name'] . ' ' . $row['age'] . '<br>';
	}
}
ol_todo_3();
?>

<h3>4. Выбрать работников с зарплатой более 400$.</h3>

<?php
function ol_todo_4() {
	global $dbh;

	foreach ( $dbh->query( 'SELECT * from bg1 WHERE salary > 400' ) as $row ) {
		echo $row['name'] . ' ' . $row['salary'] . '<br>';
	}
}
ol_todo_4();
?>

<h3>5. Выбрать работников с зарплатой равной или большей 500$.</h3>

<?php
function ol_todo_5() {
	global $dbh;

	foreach ( $dbh->query( 'SELECT * from bg1 WHERE salary >= 500' ) as $row ) {
		echo $row['name'] . ' ' . $row['salary'] . '<br>';
	}
}
ol_todo_5();
?>

<h3>6. Выбрать работников с зарплатой НЕ равной 500$.</h3>

<?php
function ol_todo_6() {
	global $dbh;

	foreach ( $dbh->query( 'SELECT * from bg1 WHERE salary != 500' ) as $row ) {
		echo $row['name'] . ' ' . $row['salary'] . '<br>';
	}
}
ol_todo_6();
?>

<h3>7. Выбрать работников с зарплатой равной или меньшей 900$.</h3>

<?php
function ol_todo_7() {
	global $dbh;

	foreach ( $dbh->query( 'SELECT * from bg1 WHERE salary <= 900' ) as $row ) {
		echo $row['name'] . ' ' . $row['salary'] . '<br>';
	}
}
ol_todo_7();
?>

<h3>8. Узнайте зарплату и возраст Васи.</h3>

<?php
function ol_todo_8() {
	global $dbh;

	foreach ( $dbh->query( 'SELECT * from bg1 WHERE name = "Вася"' ) as $row ) {
		echo $row['name'] . ' ' . $row['age'] . ' age ' . ' ' . $row['salary'] . '<br>';
	}
}
ol_todo_8();
?>

<h3>9. Выбрать работников в возрасте от 25 (не включительно) до 28 лет (включительно).</h3>

<?php
function ol_todo_9() {
	global $dbh;

	foreach ( $dbh->query( 'SELECT * from bg1 WHERE age > 25 AND age <= 28' ) as $row ) {
		echo $row['name'] . ' ' . $row['age'] . ' age ' . ' ' . $row['salary'] . '<br>';
	}
}
ol_todo_9();
?>

<h3>10. Выбрать работника Петю.</h3>

<?php
function ol_todo_10() {
	global $dbh;

	foreach ( $dbh->query( 'SELECT * from bg1 WHERE name = "Петя"' ) as $row ) {
		echo $row['name'] . ' ' . $row['age'] . ' age ' . ' ' . $row['salary'] . '<br>';
	}
}
ol_todo_10();
?>

<h3>11. Выбрать работников Петю и Васю.</h3>

<?php
function ol_todo_11() {
	global $dbh;

	foreach ( $dbh->query( 'SELECT * from bg1 WHERE name = "Петя" OR name = "Вася"' ) as $row ) {
		echo $row['name'] . ' ' . $row['age'] . ' age ' . ' ' . $row['salary'] . '<br>';
	}
}
ol_todo_11();
?>

<h3>12. Выбрать всех, кроме работника Петя.</h3>

<?php
function ol_todo_12() {
	global $dbh;

	foreach ( $dbh->query( 'SELECT * from bg1 WHERE name != "Петя"' ) as $row ) {
		echo $row['name'] . ' ' . $row['age'] . ' age ' . ' ' . $row['salary'] . '<br>';
	}
}
ol_todo_12();
?>

<h3>13. Выбрать всех работников в возрасте 27 лет или с зарплатой 1000$.</h3>

<?php
function ol_todo_13() {
	global $dbh;

	foreach ( $dbh->query( 'SELECT * from bg1 WHERE age = 27 OR salary = 1000' ) as $row ) {
		echo $row['name'] . ' ' . $row['age'] . ' age ' . ' ' . $row['salary'] . '<br>';
	}
}
ol_todo_13();
?>

<h3>14. Выбрать всех работников в возрасте от 23 лет (включительно) до 27 лет (не включительно) или с зарплатой 1000$.</h3>

<?php
function ol_todo_14() {
	global $dbh;

	foreach ( $dbh->query( 'SELECT * from bg1 WHERE age >= 23 AND age < 27 OR salary = 1000' ) as $row ) {
		echo $row['name'] . ' ' . $row['age'] . ' age ' . ' ' . $row['salary'] . '<br>';
	}
}
ol_todo_14();
?>

<h3>15. Выбрать всех работников в возрасте от 23 лет до 27 лет или с зарплатой от 400$ до 1000$.</h3>

<?php
function ol_todo_15() {
	global $dbh;

	foreach ( $dbh->query( 'SELECT * from bg1 WHERE age > 23 AND age < 27 OR salary > 400 AND salary < 1000' ) as $row ) {
		echo $row['name'] . ' ' . $row['age'] . ' age ' . ' ' . $row['salary'] . '<br>';
	}
}
ol_todo_15();
?>

<h3>16. Выбрать всех работников в возрасте 27 лет или с зарплатой не равной 400$.</h3>

<?php
function ol_todo_16() {
	global $dbh;

	foreach ( $dbh->query( 'SELECT * from bg1 WHERE age = 27 OR salary != 400' ) as $row ) {
		echo $row['name'] . ' ' . $row['age'] . ' age ' . ' ' . $row['salary'] . '<br>';
	}
}
ol_todo_16();
?>

<h3>17. Добавьте нового работника Никиту, 26 лет, зарплата 300$. Воспользуйтесь первым синтаксисом.</h3>

<?php
function ol_todo_17() {
	global $dbh;
	$dbh->query( 'INSERT INTO bg1 SET name="Никита", age = 26, salary = 300' );
}
// ol_todo_17();
?>

<h3>18. Добавьте нового работника Светлану с зарплатой 1200$. Воспользуйтесь вторым синтаксисом.</h3>

<?php
function ol_todo_18() {
	global $dbh;
	$dbh->query( 'INSERT INTO bg1 ( name, age, salary ) VALUES ( "Светлану", 27, 1200 )' );
}
// ol_todo_18();
?>

<h3>19. Добавьте двух новых работников одним запросом: Ярослава с зарплатой 1200$ и возрастом 30, Петра с зарплатой 1000$ и возрастом 31.</h3>

<?php
function ol_todo_19() {
	global $dbh;
	$dbh->query( 'INSERT INTO bg1  (name, age, salary) VALUES ( "Ярослав", 30, 1200 ), ( "Петро", 31, 1000 )' );
}
// ol_todo_19();
?>

<h3>20. Удалите работника с id=15.</h3>

<?php
function ol_todo_20() {
	global $dbh;
	$dbh->query( 'DELETE from bg1 WHERE id = 15' );
}
// ol_todo_20();
?>

<h3>21. Удалите Никита.</h3>

<?php
function ol_todo_21() {
	global $dbh;
	$dbh->query( 'DELETE from bg1 WHERE name = "Никита"' );
}
// ol_todo_21();
?>

<h3>22. Удалите всех работников, у которых возраст 26 года.</h3>

<?php
function ol_todo_22() {
	global $dbh;
	$dbh->query( 'DELETE from bg1 WHERE age = 26' );
}
// ol_todo_22();
?>

<h3>23. Поставьте Васе зарплату в 200$.</h3>

<?php
function ol_todo_23() {
	global $dbh;
	$dbh->query( 'UPDATE bg1 SET salary = 200 WHERE name = "Вася"' );
}
// ol_todo_23();
?>

<h3>24. Работнику с id=4 поставьте возраст 35 лет.</h3>

<?php
function ol_todo_24() {
	global $dbh;
	$dbh->query( 'UPDATE bg1 SET age = 35 WHERE id = 4' );
}
// ol_todo_24();
?>

<h3>25. Всем, у кого зарплата 500$ сделайте ее 700$.</h3>

<?php
function ol_todo_25() {
	global $dbh;
	$dbh->query( 'UPDATE bg1 SET salary = 700 WHERE salary = 500' );
}
// ol_todo_25();
?>

<h3>26. Работникам с id больше 2 и меньше 5 включительно поставьте возраст 23.</h3>

<?php
function ol_todo_26() {
	global $dbh;
	$dbh->query( 'UPDATE bg1 SET age = 23 WHERE id > 2 AND id <= 5' );
}
// ol_todo_26();
?>

<h3>27. Поменяйте Васю на Женю и прибавьте ему зарплату до 900$.</h3>

<?php
function ol_todo_27() {
	global $dbh;
	$dbh->query( 'UPDATE bg1 SET name = "Женя", salary = 900  WHERE name = "Вася"' );
}
// ol_todo_27();
?>