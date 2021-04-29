
<h3>1. Сделайте функцию, которая параметрами принимает 2 числа. Если эти числа равны - пусть функция вернет true, а если не равны - false.</h3>

<?php
function get_ol_todo_1( $num1, $num2 ) {
	return $num1 === $num2;
}

echo get_ol_todo_1( 10, 10 );
?>

<h3>2. Сделайте функцию, которая параметрами принимает 2 числа. Если их сумма больше 10 - пусть функция вернет true, а если нет - false.</h3>

<?php
function get_ol_todo_2( $num1, $num2 ) {
	if ( 10 < $num1 + $num2 ) {
		return true;
	} else {
		return false;
	}
}

echo get_ol_todo_2( 7, 4 );
?>

<h3>3. Сделайте функцию, которая параметром принимает число и проверяет - отрицательное оно или нет. Если отрицательное - пусть функция вернет true, а если нет - false.</h3>

<?php
function get_ol_todo_3( $num ) {
	if ( 0 > $num ) {
		return true;
	} else {
		return false;
	}
}

echo get_ol_todo_3( -1 );
?>
