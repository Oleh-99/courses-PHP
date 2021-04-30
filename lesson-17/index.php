
<h3>1. Сделайте функцию isNumberInRange, которая параметром принимает число и проверяет, что оно больше нуля и меньше 10. Если это так - пусть функция возвращает true, если не так - false.</h3>

<?php
function get_ol_is_number_in_range( $num ) {
	return 10 > $num && $num > 0;
}

echo get_ol_is_number_in_range( 3 + 1 );
?>

<h3>2. Дан массив с числами. Запишите в новый массив только те числа, которые больше нуля и меньше 10-ти. Для этого используйте вспомогательную функцию isNumberInRange из предыдущей задачи.</h3>

<?php
function ol_todo_2() {
	$arr     = array( 1, 3, 5, 7, 8, 11, 20, -3, -8, 1, 7 );
	$new_arr = array();

	foreach ( $arr as $value ) {
		if ( get_ol_is_number_in_range( $value ) ) {
			$new_arr[] = $value;
		}
	}

	print_r( $new_arr );
}

ol_todo_2();
?>

<h3>3. Сделайте функцию getDigitsSum (digit - это цифра), которая параметром принимает целое число и возвращает сумму его цифр.</h3>

<?php
function get_ol_digits_sum( $digit ) {
	$arr = str_split( $digit );
	return array_sum( $arr );
}

echo get_ol_digits_sum( 25 );
?>

<h3>4. Найдите все года от 1 до 2021, сумма цифр которых равна 13. Для этого используйте вспомогательную функцию getDigitsSum из предыдущей задачи.</h3>

<?php
function ol_todo_4() {
	for ( $i = 0; $i < 2021; $i++ ) {
		if ( 13 === get_ol_digits_sum( $i ) ) {
			echo $i . '<br>';
		}
	}
}

ol_todo_4();
?>

<h3>5. Сделайте функцию isEven() (even - это четный), которая параметром принимает целое число и проверяет: четное оно или нет. Если четное - пусть функция возвращает true, если нечетное - false.</h3>

<?php
function get_ol_is_even( $num ) {
	return 0 === $num % 2;
}

echo get_ol_is_even( 10 );
?>

<h3>6. Дан массив с целыми числами. Создайте из него новый массив, где останутся лежать только четные из этих чисел. Для этого используйте вспомогательную функцию isEven из предыдущей задачи.</h3>

<?php
function ol_todo_6() {
	$arr     = array( 1, 3, 5, 12, 8, 11, 20, 4, 10, 1, 7 );
	$new_arr = array();

	foreach ( $arr as $value ) {
		if ( get_ol_is_even( $value ) ) {
			$new_arr[] = $value;
		}
	}

	print_r( $new_arr );
}

ol_todo_6();
?>

<h3>7. Сделайте функцию getDivisors, которая параметром принимает число и возвращает массив его делителей (чисел, на которое делится данное число).</h3>

<?php
function get_ol_divisors( $num ) {
	$arr = array();

	for ( $i = 1; $i <= $num; $i++ ) {
		if ( 0 === $num % $i ) {
			$arr[] = $i;
		}
	}

	return $arr;
}
print_r( get_ol_divisors( 20 ) );
?>

<h3>8. Сделайте функцию getCommonDivisors, которая параметром принимает 2 числа, а возвращает массив их общих делителей. Для этого используйте вспомогательную функцию getDivisors из предыдущей задачи.</h3>

<?php
function get_ol_common_divisors( $num1, $num2 ) {
	$arr1 = get_ol_divisors( $num1 );
	$arr2 = get_ol_divisors( $num2 );

	return array_intersect( $arr1, $arr2 );
}
print_r( get_ol_common_divisors( 20, 15 ) );
?>
