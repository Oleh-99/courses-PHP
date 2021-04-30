
<h3>1. Выведите текущее время в формате timestamp.</h3>

<?php
function ol_todo_1() {
	echo time();
}

ol_todo_1();
?>

<h3>2. Выведите 1 марта 2025 года в формате timestamp.</h3>

<?php
function ol_todo_2() {
	echo mktime( 11, 00, 00, 1, 03, 2025 );
}

ol_todo_2();
?>

<h3>3. Выведите 31 декабря текущего года в формате timestamp. Скрипт должен работать независимо от года, в котором он запущен.</h3>

<?php
function ol_todo_3() {
	echo mktime( 00, 00, 00, 12, 31, date( 'Y' ) );
}

ol_todo_3();
?>

<h3>4. Найдите количество секунд, прошедших с 13:12:59 15-го марта 2000 года до настоящего момента времени.</h3>

<?php
function ol_todo_4() {
	echo time() - mktime( 13, 12, 59, 03, 15, 2000 );
}

ol_todo_4();
?>

<h3>5. Найдите количество целых часов, прошедших с 7:23:48 текущего дня до настоящего момента времени.</h3>

<?php
function ol_todo_5() {
	echo date( 'H', ( time() - mktime( 7, 23, 48 ) ) ) - 2;
}

ol_todo_5();
?>

<h1>Функция date</h1>
<h3>6. Выведите на экран текущий год, месяц, день, час, минуту, секунду.</h3>

<?php
function ol_todo_6() {
	echo date( 'Y.m.d H:i:s' );
}

ol_todo_6();
?>

<h3>7. Выведите текущую дату-время в форматах '2025-12-31', '31.12.2025', '31.12.13', '12:59:59'.</h3>

<?php
function ol_todo_7() {
	echo date( 'Y-m-d' ) . '<br>';
	echo date( 'd.m.Y' ) . '<br>';
	echo date( 'd.m.y' ) . '<br>';
	echo date( 'H:i:s' );
}

ol_todo_7();
?>

<h3>8. С помощью функций mktime и date выведите 12 февраля 2025 года в формате '12.02.2025'.</h3>

<?php
function ol_todo_8() {
	echo date( 'd.m.Y', mktime( 00, 00, 00, 02, 12, 2025 ) ) . '<br>';
}

ol_todo_8();
?>

<h3>9. Создайте массив дней недели $week. Выведите на экран название текущего дня недели с помощью массива $week и функции date. Узнайте какой день недели был 06.06.2006, в ваш день рождения.</h3>

<?php
function ol_todo_9() {
	$week = array( 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday' );
	$day  = date( 'w', mktime( 0, 0, 0, 06, 06, 2006 ) );
	echo $week[ $day ];
}

ol_todo_9();
?>

<h3>10. Создайте массив месяцев $month. Выведите на экран название текущего месяца с помощью массива $month и функции date.</h3>

<?php
function ol_todo_10() {
	$month = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );
	$num   = date( 'm' );

	if ( '0' === $num[0] ) {
		$num = substr_replace( $num, '', 0, 1 );
	}

	echo $month[ $num ];
}

ol_todo_10();
?>

<h3>11. Найдите количество дней в текущем месяце. Скрипт должен работать независимо от месяца, в котором он запущен.</h3>

<?php
function ol_todo_11() {
	echo date( 't' );
}

 ol_todo_11();
?>

<h3>12. Сделайте поле ввода, в которое пользователь вводит год (4 цифры), а скрипт определяет високосный ли год.</h3>
<form action="" method="get">
	<input type="numbers" name="year"><br><br>
	<input type="submit">
</form>

<?php
function ol_todo_12() {
	if ( ! empty( $_GET['year'] ) ) {
		if ( date( 'L', mktime( 00, 00, 00, 01, 01, $_GET['year'] ) ) ) {
			echo 'високосный ';
		} else {
			echo 'не високосный ';
		}
	}
}

 ol_todo_12();
?>

<h3>13. Сделайте форму, которая спрашивает дату в формате '31.12.2025'. С помощью функций mktime и explode переведите эту дату в формат timestamp. Узнайте день недели (словом) за введенную дату.</h3>
<form action="" method="get">
	<input type="date" name="date_13"><br><br>
	<input type="submit">
</form>

<?php
function ol_todo_13() {
	if ( ! empty( $_GET['date_13'] ) ) {
		$date = $_GET['date'];
		$arr  = explode( '-', $date );
		echo mktime( 00, 00, 00, $arr[2], $arr[1], $arr[0] );
	}
}

 ol_todo_13();
?>

<h3>14. Сделайте форму, которая спрашивает дату в формате '2025-12-31'. С помощью функций mktime и explode переведите эту дату в формат timestamp. Узнайте месяц (словом) за введенную дату.</h3>
<form action="" method="get">
	<input type="text" name="date_14"><br><br>
	<input type="submit">
</form>

<?php
function ol_todo_14() {
	if ( ! empty( $_GET['date_14'] ) ) {
		$date = $_GET['date_14'];
		$arr  = explode( '-', $date );
		echo mktime( 00, 00, 00, $arr[2], $arr[1], $arr[0] );
	}
}

 ol_todo_14();
?>

<h1>Сравнение дат</h1>
<h3>15. Сделайте форму, которая спрашивает две даты в формате '2025-12-31'. Первую дату запишите в переменную $date1, а вторую в $date2. Сравните, какая из введенных дат больше. Выведите ее на экран.</h3>
<form action="" method="get">
	<input type="date" name="date_15_1"><br><br>
	<input type="date" name="date_15_2"><br><br>
	<input type="submit">
</form>

<?php
function ol_todo_15() {
	if ( ! empty( $_GET['date_15_1'] ) && ! empty( $_GET['date_15_2'] ) ) {
		$date1      = $_GET['date_15_1'];
		$date2      = $_GET['date_15_2'];
		$arr1       = explode( '-', $date1 );
		$arr2       = explode( '-', $date2 );
		$datestamp1 = mktime( 00, 00, 00, $arr1[1], $arr1[2], $arr1[0] );
		$datestamp2 = mktime( 00, 00, 00, $arr2[1], $arr2[2], $arr2[0] );

		if ( $datestamp1 <= $datestamp2 ) {
			echo $date2;
		} else {
			echo $date1;
		}
	}
}

 ol_todo_15();
?>

<h1>На strtotime</h1>
<h3>16. Дана дата в формате '2025-12-31'. С помощью функции strtotime и функции date преобразуйте ее в формат '31-12-2025'.</h3>

<form action="" method="get">
	<input type="date" name="date_16"><br><br>
	<input type="submit">
</form>


<?php
function ol_todo_16() {
	if ( ! empty( $_GET['date_16'] ) ) {
		$date = $_GET['date_16'];
		echo date( 'd-m-Y', strtotime( $date ) );
	}
}

 ol_todo_16();
?>

<h3>17. Сделайте форму, которая спрашивает дату-время в формате '2025-12-31T12:13:59'. С помощью функции strtotime и функции date преобразуйте ее в формат '12:13:59 31.12.2025'.</h3>

<?php
function ol_todo_17() {
	$date = '2025-12-31T12:13:59';
	echo date( 'H:i:s d.m.Y', strtotime( $date ) );
}

 ol_todo_17();
?>

<h1>Прибавление и отнимание дат</h1>
<h3>18. В переменной $date лежит дата в формате '2025-12-31'. Прибавьте к этой дате 2 дня, 1 месяц и 3 дня, 1 год. Отнимите от этой даты 3 дня.</h3>

<form action="" method="get">
	<input type="date" name="date_18"><br><br>
	<input type="submit">
</form>

<?php
function ol_todo_18() {
	if ( ! empty( $_GET['date_18'] ) ) {
		$date = date_create( $_GET['date_18'] );
		date_modify( $date, '2 day 1 month 3 day 1 year -3 day' );
		echo date_format( $date, 'd.m.Y' );
	}
}

 ol_todo_18();
?>

<h1>Задачи</h1>
<h3>19. Узнайте сколько дней осталось до Нового Года. Скрипт должен работать в любом году.</h3>

<?php
function ol_todo_19() {
	$today = date( 'z' );
	if ( date( 'L' ) ) {
		echo 366 - $today;
	} else {
		echo 365 - $today;
	}
}

 ol_todo_19();
?>

<h3>20. Сделайте форму с одним полем ввода, в которое пользователь вводит год. Найдите все пятницы 13-е в этом году. Результат выведите в виде массива дат.</h3>

<form action="" method="get">
	<input type="numbers" name="year_20"><br><br>
	<input type="submit">
</form>

<?php
function ol_todo_20() {
	if ( ! empty( $_GET['year_20'] ) && 4 === strlen( $_GET['year_20'] ) ) {
		$year        = $_GET['year_20'];
		$friday      = 0;
		$friday_date = array();

		for ( $month = 1; $month <= 12; $month++ ) {
			$days_in_month = date( 't', mktime( 0, 0, 0, $month, 1, $year ) );

			for ( $day = 1; $day <= $days_in_month; $day++ ) {
				if ( '5' === date( 'w', mktime( 0, 0, 0, $month, $day, $year ) ) ) {
					if ( '13' === date( 'd', mktime( 0, 0, 0, $month, $day, $year ) ) ) {
						$friday++;
						$friday_date .= '<br>' . date( 'd.m.Y', mktime( 0, 0, 0, $month, $day, $year ) );
					}
				}
			}
		}

		echo 'В ' . $year . ' году есть ' . $friday. ' пятници 13 числа <br>';
		echo '<pre>';
		print_r( $friday_date );
		echo '</pre>';
	}
}

ol_todo_20();
?>

<h3>21. Узнайте какой день недели был 100 дней назад.</h3>

<?php
function ol_todo_21() {
	$week  = array( 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday' );
	$today = date_create( date( 'Y-m-d' ) );

	date_modify( $today, '-100 day' );

	$day     = intval( strtotime( date_format( $today, 'Y-m-d' ) ) );
	$num_day = date( 'w', $day );

	echo $week[ $num_day ];
}

 ol_todo_21();
?>
