
<h3>1. Сделайте функцию, которая возвращает квадрат числа. Число передается параметром.</h3>

<?php
function get_ol_square_of_numbers( $num ) {
	return pow( $num, 2 );
}

echo get_ol_square_of_numbers( 2 );
?>

<h3>2. Сделайте функцию, которая возвращает сумму двух чисел. Числа передаются параметрами функции.</h3>

<?php
function get_ol_sum_of_numbers( $num1, $num2 ) {
	return $num1 + $num2;
}

echo get_ol_sum_of_numbers( 2, 6 );
?>

<h3>3. Сделайте функцию, которая отнимает от первого числа второе и делит на третье.</h3>

<?php
function get_ol_sum_and_difference_of_numbers( $num1, $num2, $num3 ) {
	return ( $num1 - $num2 ) / $num3;
}

echo get_ol_sum_and_difference_of_numbers( 8, 2, 2 );
?>

<h3>4. Сделайте функцию, которая принимает параметром число от 1 до 7, а возвращает день недели на русском языке.</h3>

<?php
function get_ol_what_day( $day ) {
	$week = array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday' );
	return $week[ --$day ];
}

echo get_ol_what_day( 2 );
?>
