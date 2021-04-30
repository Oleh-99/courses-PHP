
<h3>1. Заполните массив следующим образом: в первый элемент запишите 'x', во второй 'xx', в третий 'xxx' и так далее.</h3>

<?php
function ol_todo_1() {
	$arr = array();

	for ( $i = 1; $i <= 3; $i++ ) {
		$arr[] .= str_repeat( 'x', $i );
	}

	print_r( $arr );
}

ol_todo_1();
?>

<h3>2. С помощью двух вложенных циклов заполните массив следующим образом: в первый элемент запишите '1', во второй '22', в третий '333' и так далее.</h3>

<?php
function ol_todo_2() {
	$arr = array();

	for ( $i = 1; $i <= 3; $i++ ) {
		for ( $n = 1; $n <= $i; $n++ ) {
			$arr[ $i ] .= $i;
		}
	}

	print_r( $arr );
}

ol_todo_2();
?>

<h3>3. Сделайте функцию arrayFill, которая будет заполнять массив заданными значениями. Первым параметром функция принимает значение, которым заполнять массив, а вторым - сколько элементов должно быть в массиве. Пример: arrayFill('x', 5) сделает массив ['x', 'x', 'x', 'x', 'x'].</h3>

<?php
function ol_todo_3() {
	$array = array();
	$array = get_ol_arrayFill( $array, 'x', 5 );

	print_r( $array );
}

function get_ol_arrayFill( $array = array(), $str, $num ) {
	for ( $i = 0; $i <= $num; $i++ ) {
		$array[] .= $str;
	}

	return $array;
}

ol_todo_3();
?>

<h3>4. Дан массив с числами. Узнайте сколько элементов с начала массива надо сложить, чтобы в сумме получилось больше 10-ти. Считайте, что в массиве есть нужное количество элементов.</h3>

<?php
function ol_todo_4() {
	$arr    = array( 3, 2, 5, 4, 3, 1, 8, 7 );
	$result = 0;

	for ( $i = 0; $i <= count( $arr ); $i++ ) {
		$result += $arr[ $i ];

		if ( 10 < $result ) {
			echo $i;
			break;
		}
	}
}

ol_todo_4();
?>

<h3>5. Дан двухмерный массив с числами, например [[1, 2, 3], [4, 5], [6]]. Найдите сумму элементов этого массива. Массив, конечно же, может быть произвольным.</h3>

<?php
function ol_todo_5() {
	$arr    = array( array( 1, 2, 3 ), array( 4, 5 ), array( 6 ) );
	$result = 0;

	foreach ( $arr as $value ) {
		$result += array_sum( $value );
	}

	echo $result;
}

ol_todo_5();
?>

<h3>6. Дан трехмерный массив с числами, например [[[1, 2], [3, 4]], [[5, 6], [7, 8]]]. Найдите сумму элементов этого массива. Массив, конечно же, может быть произвольным.</h3>

<?php
function ol_todo_6() {
	$arr    = array( array( array( 1, 2 ), array( 3, 4 ) ), array( array( 5, 6 ), array( 7, 8 ) ) );
	$result = 0;

	foreach ( $arr as $val ) {
		foreach ( $val as $value ) {
			$result += array_sum( $value );
		}
	}

	echo $result;
}

ol_todo_6();
?>

<h3>7. С помощью двух циклов создайте массив [[1, 2, 3], [4, 5, 6], [7, 8, 9]].</h3>

<?php
function ol_todo_7() {
	$arr = array();

	for ( $i = 1; $i <= 3; $i++ ) {
		for ( $n = $i * 3 - 3; $n < $i * 3; $n++ ) {
			$arr[ $i ][] .= $n + 1;
		}
	}

	print_r( $arr );
}

ol_todo_7();
?>
