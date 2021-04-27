<h1>Работа с регистром символов</h1>
<h6>Для решения задач данного блока вам понадобятся следующие функции: strtolower, strtoupper, ucfirst, lcfirst, ucwords.</h6>
<h3>1.Дана строка 'php'. Сделайте из нее строку 'PHP'.</h3>

<?php
function ol_todo_1( $text ) {
	echo strtoupper( $text );
}

ol_todo_1( 'php' );
?>

<h3>2.Дана строка 'PHP'. Сделайте из нее строку 'php'.</h3>

<?php
function ol_todo_2( $text ) {
	echo strtolower( $text );
}

ol_todo_2( 'PHP' );
?>

<h3>3.Дана строка 'london'. Сделайте из нее строку 'London'.</h3>

<?php
function ol_todo_3( $text ) {
	echo ucfirst( $text );
}

ol_todo_3( 'london' );
?>

<h3>4.Дана строка 'London'. Сделайте из нее строку 'london'.</h3>

<?php
function ol_todo_4( $text ) {
	echo lcfirst( $text );
}

ol_todo_4( 'London' );
?>

<h3>5.Дана строка 'london is the capital of great britain'. Сделайте из нее строку 'London Is The Capital Of Great Britain'.</h3>

<?php
function ol_todo_5( $text ) {
	echo ucwords( $text );
}

ol_todo_5( 'london is the capital of great britain' );
?>

<h3>6.Дана строка 'LONDON'. Сделайте из нее строку 'London'.</h3>

<?php
function ol_todo_6( $text ) {
	echo ucfirst( strtolower( $text ) );
}

ol_todo_6( 'LONDON' );
?>

<h3>7.Дана строка 'html css php'. Найдите количество символов в этой строке.</h3>

<?php
function ol_todo_7( $text ) {
	echo strlen( $text );
}

ol_todo_7( 'html css php' );
?>

<h3>8.Дана переменная $password, в которой хранится пароль пользователя. Если количество символов пароля больше 5-ти и меньше 10-ти, то выведите пользователю сообщение о том, что пароль подходит, иначе сообщение о том, что нужно придумать другой пароль.</h3>

<?php
function ol_todo_8( $password ) {
	if ( 5 < strlen( $password ) && strlen( $password ) < 10 ) {
		echo 'пароль подходит';
	} else {
		echo 'нужно придумать другой пароль';
	}
}

ol_todo_8( 'html12css' );
?>

<h1>Работа с substr</h1>
<h6>Для решения задач данного блока вам понадобятся следующие функции: substr.</h6>
<h3>9. Дана строка 'html css php'. Вырежьте из нее и выведите на экран слово 'html', слово 'css' и слово 'php'.</h3>

<?php
function ol_todo_9( $text ) {
	echo substr( $text, 0, 4 ) . '<br>';
	echo substr( $text, 5, 3 ) . '<br>';
	echo substr( $text, 9 ) . '<br>';
}

ol_todo_9( 'html css php' );
?>

<h3>10. Дана строка 'html css php'. Вырежьте из нее и выведите на экран слово 'html', слово 'css' и слово 'php'.</h3>

<?php
function ol_todo_10( $text ) {
	$num = strlen( $text ) - 3;
	echo substr( $text, $num );
}

ol_todo_10( 'html css php' );
?>
