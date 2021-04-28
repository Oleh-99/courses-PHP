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
	echo str_replace( array( 'a', 'b', 'c' ), array( 1, 2, 3 ), $text );
}

ol_todo_17( 'Lorem ipsum bolor sit amet, consectetur adipisicing elit.' );
?>

<h3>18. Дана строка с буквами и цифрами, например, '1a2b3c4b5d6e7f8g9h0'. Удалите из нее все цифры. То есть в нашем случае должна получится строка 'abcbdefgh'.</h3>

<?php
function ol_todo_18( $text ) {
	echo str_replace( array( 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ), '', $text );
}

ol_todo_18( '1a2b3c4b5d6e7f8g9h0' );
?>

<h1>Работа с strtr</h1>
<h6>Для решения задач данного блока вам понадобятся следующие функции: strtr.</h6>
<h3>19. Дана строка $str. Замените в ней все буквы 'a' на цифру 1, буквы 'b' - на 2, а буквы 'c' - на 3. Решите задачу двумя способами работы с функцией strtr (массив замен и две строки замен).</h3>

<?php
function ol_todo_19_1( $text ) {
	echo strtr(
		$text,
		array(
			'1' => 'a',
			'2' => 'b',
			'3' => 'c',
		)
	) . '<br>';
}

function ol_todo_19_2( $text ) {
	echo strtr( $text, '123', 'abc' );
}

ol_todo_19_1( '1a2b3c4b5d6e7f8g9h0' );
ol_todo_19_2( '1a2b3c4b5d6e7f8g9h0' );
?>

<h1>Работа с substr_replace</h1>
<h6>Для решения задач данного блока вам понадобятся следующие функции: substr_replace.</h6>
<h3>20. Дана строка $str. Вырежите из нее подстроку с 3-го символа (отсчет с нуля), 5 штук и вместо нее вставьте '!!!'.</h3>

<?php
function ol_todo_20( $text ) {
	echo substr_replace( $text, '!!!', 3, 5 );
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
	if ( strpos( $text, '..' ) || 0 === strpos( $text, '..' ) ) {
		echo 'есть';
	} else {
		echo 'нет';
	}
}

ol_todo_25( 'aaa aaa.. aaa aaa aaa' );
?>

<h3>26. Проверьте, что строка начинается на 'http://'. Если это так - выведите 'да', если не так - 'нет'.</h3>

<?php
function ol_todo_26( $text ) {
	if ( 0 === strpos( $text, 'http://' ) ) {
		echo 'есть';
	} else {
		echo 'нет';
	}
}

ol_todo_26( 'http://old.code.mu/tasks/php/base/rabota-so-strokovymi-funkciyami-v-php.html' );
?>

<h1>Работа с explode, implode</h1>
<h3>27. Дана строка 'html css php'. С помощью функции explode запишите каждое слово этой строки в отдельный элемент массива.</h3>

<?php
function ol_todo_27( $text ) {
	$arr = explode( ' ', $text );
	var_dump( $arr );
}

ol_todo_27( 'html css php' );
?>

<h3>28. Дан массив с элементами 'html', 'css', 'php'. С помощью функции implode создайте строку из этих элементов, разделенных запятыми.</h3>

<?php
function ol_todo_28( $arr ) {
	echo implode( ' ', $arr );
}

ol_todo_28( array( 'html', 'css', 'php' ) );
?>

<h3>29. В переменной $date лежит дата в формате '2013-12-31'. Преобразуйте эту дату в формат '31.12.2013'.</h3>

<?php
function ol_todo_29( $date ) {
	$arr = explode( '-', $date );
	$arr = array_reverse( $arr );
	echo implode( '.', $arr );
}

ol_todo_29( '2013-12-31' );
?>

<h1>Работа с str_split</h1>
<h3>30. Дана строка '1234567890'. Разбейте ее на массив с элементами '12', '34', '56', '78', '90'.</h3>

<?php
function ol_todo_30( $text ) {
	$arr = str_split( $text, 2 );
	var_dump( $arr );
}

ol_todo_30( '1234567890' );
?>

<h3>31.  Дана строка '1234567890'. Разбейте ее на массив с элементами '1', '2', '3', '4', '5', '6', '7', '8', '9', '0'.</h3>

<?php
function ol_todo_31( $text ) {
	$arr = str_split( $text );
	var_dump( $arr );
}

ol_todo_31( '1234567890' );
?>

<h3>32.  Дана строка '1234567890'. Сделайте из нее строку '12-34-56-78-90' не используя цикл.</h3>

<?php
function ol_todo_32( $text ) {
	$arr = str_split( $text, 2 );
	echo implode( '-', $arr );
}

ol_todo_32( '1234567890' );
?>

<h1>Работа с trim, ltrim, rtrim</h1>
<h3>33. Дана строка. Очистите ее от концевых пробелов.</h3>

<?php
function ol_todo_33( $text ) {
	echo trim( $text );
}

ol_todo_33( ' словo   ' );
?>

<h3>34. Дана строка '/php/'. Сделайте из нее строку 'php', удалив концевые слеши.</h3>

<?php
function ol_todo_34( $text ) {
	echo trim( $text, '/' );
}

ol_todo_34( '/php/' );
?>

<h3>35. Дана строка 'слова слова слова.'. В конце этой строки может быть точка, а может и не быть. Сделайте так, чтобы в конце этой строки гарантировано стояла точка. То есть: если этой точки нет - ее надо добавить, а если есть - ничего не делать. Задачу решите через rtrim без всяких ифов.</h3>

<?php
function ol_todo_35( $text ) {
	echo rtrim( $text, '.' ) . '.';
}

ol_todo_35( 'слова слова слова.' );
?>

<h1>Работа с strrev</h1>
<h3>36. Дана строка '12345'. Сделайте из нее строку '54321'.</h3>

<?php
function ol_todo_36( $text ) {
	echo strrev( $text );
}

ol_todo_36( '12345' );
?>

<h3>37. Проверьте, является ли слово палиндромом (одинаково читается во всех направлениях, примеры таких слов: madam, otto, kayak, nun, level).</h3>

<?php
function ol_todo_37( $text ) {
	if ( $text === strrev( $text ) ) {
		echo $text . ' палиндромом <br>';
	}
}

ol_todo_37( 'madam' );
ol_todo_37( 'otto' );
ol_todo_37( 'kayak' );
ol_todo_37( 'nun' );
ol_todo_37( 'level' );
?>

<h1>Работа с str_shuffle</h1>
<h3>38. Дана строка. Перемешайте символы этой строки в случайном порядке.</h3>

<?php
function ol_todo_38( $text ) {
	echo str_shuffle( $text );
}

ol_todo_38( 'lorem ipsum dolor sit amet, consectetur adipisicing elit.' );
?>

<h3>39. Создайте строку из 6-ти случайных маленьких латинских букв так, чтобы буквы не повторялись. Нужно сделать так, чтобы в нашей строке могла быть любая латинская буква, а не ограниченный набор.</h3>

<?php
function ol_todo_39( $text ) {
	$text = str_shuffle( $text );
	echo substr( $text, 0, 6 );
}

ol_todo_39( 'loremipsumdolorsitamet' );
?>

<h1>Работа с number_format</h1>
<h3>40. Дана строка '12345678'. Сделайте из нее строку '12 345 678'.</h3>

<?php
function ol_todo_40( $num ) {
	echo number_format( $num );
}

ol_todo_40( '12345678' );
?>

<h1>Работа с str_repeat</h1>
<h3>41. Нарисуйте пирамиду, как показано на рисунке, только у вашей пирамиды должно быть 9 рядов, а не 5. Решите задачу с помощью одного цикла и функции str_repeat.</h3>

<?php
function ol_todo_41() {
	for ( $i = 1; $i <= 9; $i++ ) {
		echo str_repeat( 'x', $i ) . '<br>';
	}
}

ol_todo_41();
?>

<h3>42. Нарисуйте пирамиду, как показано на рисунке. Решите задачу с помощью одного цикла и функции str_repeat.</h3>

<?php
function ol_todo_42() {
	for ( $i = 1; $i <= 9; $i++ ) {
		echo str_repeat( $i, $i ) . '<br>';
	}
}

ol_todo_42();
?>

<h1>Работа с strip_tags и htmlspecialchars</h1>
<h3>43. Дана строка 'html, <b>php</b>, js'. Удалите теги из этой строки.</h3>

<?php
function ol_todo_43( $text ) {
	echo strip_tags( $text );
}

ol_todo_43( 'html, <b>php</b>, js' );
?>

<h3>44. Дана строка $str. Удалите все теги из этой строки, кроме тегов <b> и <i>.</h3>

<?php
function ol_todo_44( $str ) {
	echo strip_tags( $str, '<b><i>' );
}

ol_todo_44( 'html, <b>php</b>, js' );
?>

<h3>45. Дана строка 'html, <b>php</b>, js'. Выведите ее на экран 'как есть': то есть браузер не должен преобразовать <b> в жирный.</h3>

<?php
function ol_todo_45( $str ) {
	echo htmlspecialchars( $str );
}

ol_todo_45( 'html, <b>php</b>, js' );
?>

<h1>Работа с chr и ord</h1>
<h3>46. Узнайте код символов 'a', 'b', 'c', пробела.</h3>

<?php
function ol_todo_46( $str ) {
	echo ord( $str ) . '<br>';
}

ol_todo_46( 'a' );
ol_todo_46( 'b' );
ol_todo_46( 'c' );
ol_todo_46( ' ' );
?>

<h3>47. Изучите таблицу ASCII. Определите границы, в которых располагаются буквы английского алфавита.</h3>

<?php
function ol_todo_47() {
	for ( $i = 65; $i <= 90; $i++ ) {
		echo chr( $i ) . ' ';
	}

	echo '<br>';

	for ( $i = 97; $i <= 122; $i++ ) {
		echo chr( $i ) . ' ';
	}
}

ol_todo_47();
?>

<h3>48. Выведите на экран символ с кодом 33.</h3>

<?php
function ol_todo_48( $num ) {
	echo chr( $num );
}

ol_todo_48( 33 );
?>

<h3>49. Запишите в переменную $str случайный символ - большую букву латинского алфавита. Подсказка: с помощью таблицы ASCII определите какие целые числа соответствуют большим буквам латинского алфавита.</h3>

<?php
function ol_todo_49() {
	$str = mt_rand( 65, 90 );
	echo chr( $str );
}

ol_todo_49();
?>

<h3>50. Запишите в переменную $str случайную строку $len длиной, состоящую из маленьких букв латинского алфавита. Подсказка: воспользуйтесь циклом for или while.</h3>

<?php
function ol_todo_50( $len ) {
	for ( $i = 0; $i <= $len; $i++ ) {
		$str = mt_rand( 97, 122 );
		echo chr( $str );
	}
}

ol_todo_50( 10 );
?>

<h3>51. Дана буква английского алфавита. Узнайте, она маленькая или большая.</h3>

<?php
function ol_todo_51( $str ) {
	if ( 65 <= ord( $str ) && ord( $str ) <= 90 ) {
		echo 'большая';
	} elseif ( 97 <= ord( $str ) && ord( $str ) <= 122 ) {
		echo 'маленькая';
	} else {
		echo 'error';
	}
}

ol_todo_51( 'A' );
?>

<h1>Работа с strchr, strrchr</h1>
<h3>52. Дана строка 'ab-cd-ef'. С помощью функции strchr выведите на экран строку '-cd-ef'.</h3>

<?php
function ol_todo_52( $str ) {
	echo strchr( $str, '-' );
}

ol_todo_52( 'ab-cd-ef' );
?>

<h3>53. Дана строка 'ab-cd-ef'. С помощью функции strchr выведите на экран строку '-cd-ef'.</h3>

<?php
function ol_todo_53( $str ) {
	echo strrchr( $str, '-' );
}

ol_todo_53( 'ab-cd-ef' );
?>

<h1>Работа с strstr</h1>
<h3>54. Дана строка 'ab--cd--ef'. С помощью функции strstr выведите на экран строку '--cd--ef'.</h3>

<?php
function ol_todo_54( $str ) {
	echo strstr( $str, '--' );
}

ol_todo_54( 'ab--cd--ef' );
?>

<h1>Задачи</h1>
<h3>55. Преобразуйте строку 'var_test_text' в 'varTestText'. Скрипт, конечно же, должен работать с любыми аналогичными строками.</h3>

<?php
function ol_todo_55( $str ) {
	echo str_replace( ' ', '', ucwords( str_replace( '_', ' ', $str ) ) );
}

ol_todo_55( 'var_test_text' );
?>

<h3>56. Дан массив с числами. Выведите на экран все числа, в которых есть цифра 3.</h3>

<?php
function ol_todo_56( $arr ) {
	foreach ( $arr as $value ) {
		if ( strpos( $value, '3' ) || 0 === strpos( $value, '3' ) ) {
			echo $value . '<br>';
		}
	}
}

ol_todo_56( array( 1, 3, 35, 253, 135 ) );
?>