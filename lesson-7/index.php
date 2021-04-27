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

<h3>11. Дана строка. Проверьте, что она начинается на 'http://'. Если это так, выведите 'да', если не так - 'нет'.</h3>

<?php
function ol_todo_11( $text ) {
	if ( 'http://' === substr( $text, 0, 7 ) ) {
		echo 'Yes';
	} else {
		echo 'No';
	}
}

ol_todo_11( 'http://old.code.mu/tasks/php/base/rabota-so-strokovymi-funkciyami-v-php.html' );
?>

<h3>12. Дана строка. Проверьте, что она начинается на 'http://' или на 'https://'. Если это так, выведите 'да', если не так - 'нет'.</h3>

<?php
function ol_todo_12( $text ) {
	if ( 'http://' === substr( $text, 0, 7 ) || 'https://' === substr( $text, 0, 8 ) ) {
		echo 'Yes';
	} else {
		echo 'No';
	}
}

ol_todo_12( 'https://old.code.mu/tasks/php/base/rabota-so-strokovymi-funkciyami-v-php.html' );
?>

<h3>13. Дана строка. Проверьте, что она заканчивается на '.png'. Если это так, выведите 'да', если не так - 'нет'.</h3>

<?php
function ol_todo_13( $text ) {
	$num = strlen( $text ) - 4;
	if ( '.png' === substr( $text, $num ) ) {
		echo 'Yes';
	} else {
		echo 'No';
	}
}

ol_todo_13( 'https://old.code.mu/tasks/php/base/rabota-so-strokovymi-funkciyami-v-php.png' );
?>

<h3>14. Дана строка. Проверьте, что она заканчивается на '.png' или на '.jpg'. Если это так, выведите 'да', если не так - 'нет'.</h3>

<?php
function ol_todo_14( $text ) {
	$num = strlen( $text ) - 4;
	if ( '.png' === substr( $text, $num ) || '.jpg' === substr( $text, $num ) ) {
		echo 'Yes';
	} else {
		echo 'No';
	}
}

ol_todo_14( 'https://old.code.mu/tasks/php/base/rabota-so-strokovymi-funkciyami-v-php.jpg' );
?>

<h3>15. Дана строка. Если в этой строке более 5-ти символов - вырежите из нее первые 5 символов, добавьте троеточие в конец и выведите на экран. Если же в этой строке 5 и менее символов - просто выведите эту строку на экран.</h3>

<?php
function ol_todo_15( $text ) {
	if ( 5 <= strlen( $text ) ) {
		echo substr( $text, 0, 5 ) . '...';
	} else {
		echo $text;
	}
}

ol_todo_15( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.' );
?>

<h1>Работа с str_replace</h1>
<h6>Для решения задач данного блока вам понадобятся следующие функции: str_replace.</h6>

<h3>16. Дана строка '31.12.2013'. Замените все точки на дефисы.</h3>

<?php
function ol_todo_16( $text ) {
	echo str_replace( '.', '-', $text );
}

ol_todo_16( '31.12.2013' );
?>

<h3>17. Дана строка $str. Замените в ней все буквы 'a' на цифру 1, буквы 'b' - на 2, а буквы 'c' - на 3.</h3>

<?php
function ol_todo_17( $text ) {
	echo str_replace( ['a', 'b', 'c'], [ 1, 2, 3 ], $text );
}

ol_todo_17( 'Lorem ipsum bolor sit amet, consectetur adipisicing elit.' );
?>

<h3>18. Дана строка с буквами и цифрами, например, '1a2b3c4b5d6e7f8g9h0'. Удалите из нее все цифры. То есть в нашем случае должна получится строка 'abcbdefgh'.</h3>

<?php
function ol_todo_18( $text ) {
	echo str_replace( [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ], '', $text );
}

ol_todo_18( '1a2b3c4b5d6e7f8g9h0' );
?>

<h1>Работа с strtr</h1>
<h6>Для решения задач данного блока вам понадобятся следующие функции: strtr.</h6>
<h3>19. Дана строка $str. Замените в ней все буквы 'a' на цифру 1, буквы 'b' - на 2, а буквы 'c' - на 3. Решите задачу двумя способами работы с функцией strtr (массив замен и две строки замен).</h3>

<?php
function ol_todo_19_1( $text ) {
	echo strtr($text, [ '1' => 'a', '2' => 'b', '3' => 'c' ] ) . '<br>';
}

function ol_todo_19_2( $text ) {
	echo strtr($text, '123', 'abc' );
}

ol_todo_19_1( '1a2b3c4b5d6e7f8g9h0' );
ol_todo_19_2( '1a2b3c4b5d6e7f8g9h0' );
?>

<h1>Работа с substr_replace</h1>
<h6>Для решения задач данного блока вам понадобятся следующие функции: substr_replace.</h6>
<h3>20. Дана строка $str. Вырежите из нее подстроку с 3-го символа (отсчет с нуля), 5 штук и вместо нее вставьте '!!!'.</h3>

<?php
function ol_todo_20( $text ) {
	echo substr_replace($text, '!!!', 3, 5);
}

ol_todo_20( '1a2b3c4b5d6e7f8g9h0' );
?>

<h1>Работа с strpos, strrpos</h1>
<h6>Для решения задач данного блока вам понадобятся следующие функции: strpos, strrpos.</h6>
<h3>21. Дана строка 'abc abc abc'. Определите позицию первой буквы 'b'.</h3>

<?php
function ol_todo_21( $text ) {
	echo strpos( $text, 'b' );
}

ol_todo_21( 'abc abc abc' );
?>

<h3>22. Дана строка 'abc abc abc'. Определите позицию последней буквы 'b'.</h3>

<?php
function ol_todo_22( $text ) {
	echo strrpos( $text, 'b' );
}

ol_todo_22( 'abc abc abc' );
?>

<h3>23. Дана строка 'abc abc abc'. Определите позицию первой найденной буквы 'b', если начать поиск не с начала строки, а с позиции 3.</h3>

<?php
function ol_todo_23( $text ) {
	echo strpos( $text, 'b', 3 );
}

ol_todo_23( 'abc abc abc' );
?>

<h3>24. Дана строка 'aaa aaa aaa aaa aaa'. Определите позицию второго пробела.</h3>

<?php
function ol_todo_24( $text ) {
	echo strpos( $text, ' ', 4 );
}

ol_todo_24( 'aaa aaa aaa aaa aaa' );
?>

<h3>25. Проверьте, что в строке есть две точки подряд. Если это так - выведите 'есть', если не так - 'нет'.</h3>

<?php
function ol_todo_25( $text ) {
	if ( strpos( $text, '..' ) ) {
		echo 'есть';
	} else {
		echo 'нет';
	}
}

ol_todo_25( 'aaa aaa..aaa aaa aaa' );
?>

<h3>26. Проверьте, что строка начинается на 'http://'. Если это так - выведите 'да', если не так - 'нет'.</h3>

<?php
function ol_todo_26( $text ) {
	if ( strpos( $text, 'http://', 0 ) ) {
		echo 'есть';
	} else {
		echo 'нет';
	}
}

ol_todo_26( 'http://old.code.mu/tasks/php/base/rabota-so-strokovymi-funkciyami-v-php.html' );
?>