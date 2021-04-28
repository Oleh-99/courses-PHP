
<h3>1. Дан массив с числами. Найдите среднее арифметическое его элементов (сумма элементов делить на количество) не используя цикл.</h3>

<?php
function ol_todo_1( $arr ) {
	$result = array_sum( $arr );
	echo $result / 2;
}

ol_todo_1( array( 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ) );
?>

<h3>2. Найдите сумму чисел от 1 до 100 не используя цикл</h3>

<?php
function ol_todo_2() {
	$arr = range( 1, 100 );
	echo array_sum( $arr );
}

ol_todo_2();
?>

<h3>3. Выведите столбец чисел от 1 до 100 не используя цикл.</h3>

<?php
function ol_todo_3() {
	$arr = range( 1, 100 );
	echo implode( '<br>', $arr );
}

ol_todo_3();
?>

<h3>4. Заполните массив 10-ю иксами не используя цикл</h3>

<?php
function ol_todo_4() {
	$result = array_pad( array(), 10, 'x' );
	var_dump( $result );
}

ol_todo_4();
?>

<h3>5. Заполните массив 10-ю случайными числами от 1 до 10 так, чтобы они не повторялись. Цикл использовать нельзя.</h3>

<?php
function ol_todo_5() {
	$arr = range( 1, 10 );
	shuffle( $arr );
	var_dump( $arr );
}

ol_todo_5();
?>

<h3>6. Найдите факториал заданного числа не используя цикл. Факториал - это произведение чисел от 1 до заданного числа включительно.</h3>

<?php
function ol_todo_6( $num ) {
	$arr = range( 1, $num );
	echo array_product( $arr );
}

ol_todo_6( 5 );
?>

<h3>7. Дано число. Найдите сумму цифр этого числа не используя цикл.</h3>

<?php
function ol_todo_7( $num ) {
	$arr = str_split( $num );
	echo array_sum( $arr );
}

ol_todo_7( 555 );
?>

<h3>8. Дана строка. Сделайте заглавным последний символ этой строки не используя цикл.</h3>

<?php
function ol_todo_8( $text ) {
	$text[-1] = strtoupper( $text[-1] );
	echo $text;
}

ol_todo_8( 'lorem' );
?>

<h3>9. Дан массив с числами. Получите из него массив с квадратными корнями этих чисел не используя цикл.</h3>

<?php
function ol_todo_9( $arr ) {
	$result = array_map( 'sqrt', $arr );
	var_dump( $result );
}

ol_todo_9( array( 1, 2, 3, 4, 5 ) );
?>

<h3>10. Заполните массив числами от 1 до 26 так, чтобы ключами этих чисел были буквы английского алфавита: ['a'=>1, 'b'=>2...]. Сделайте это не используя цикл</h3>

<?php
function ol_todo_10() {
	var_dump( array_combine( range( 'a', 'z' ), range( 1, 26 ) ) );
}

ol_todo_10();
?>

<h3>11. Дана строка с числами '1234567890'. Найдите сумму пар чисел: 12+34+56+78+90. Решите задачу, не используя цикл</h3>

<?php
function ol_todo_11( $text ) {
	$arr = str_split( $text, 2 );
	echo array_sum( $arr );
}

ol_todo_11( '1234567890' );
?>
