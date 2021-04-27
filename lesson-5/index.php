<h1>Работа с foreach</h1>
<h3>1. Дан массив с элементами 'html', 'css', 'php', 'js', 'jq'. С помощью цикла foreach выведите эти слова в столбик.</h3>

<?php
function ol_todo_1() {
	$arr = array( 'html', 'css', 'php', 'js', 'jq' );

	foreach ( $arr as $value ) {
		echo $value . '<br>';
	}
}

ol_todo_1();
?>

<h3>2. Дан массив с элементами 1, 2, 3, 4, 5. С помощью цикла foreach найдите сумму элементов этого массива. Запишите ее в переменную $result.</h3>

<?php
function ol_todo_2() {
	$arr    = array( 1, 2, 3, 4, 5 );
	$result = 0;

	foreach ( $arr as $value ) {
		$result += $value;
	}

	echo $result;
}

ol_todo_2();
?>

<h3>3. Дан массив с элементами 1, 2, 3, 4, 5. С помощью цикла foreach найдите сумму квадратов элементов этого массива. Результат запишите переменную $result.</h3>

<?php
function ol_todo_3() {
	$arr    = array( 1, 2, 3, 4, 5 );
	$result = 0;

	foreach ( $arr as $value ) {
		$result += $value ** 2;
	}

	echo $result;
}

ol_todo_3();
?>

<h1>Работа с ключами</h1>
<h3>4. Дан массив $arr. С помощью цикла foreach выведите на экран столбец ключей и элементов в формате 'green - зеленый'.</h3>

<?php
function ol_todo_4() {
	$arr = array(
		'green' => 'зеленый',
		'red'   => 'красный',
		'blue'  => 'голубой',
	);

	foreach ( $arr as $key => $value ) {
		echo $key . ' - ' . $value . '<br>';
	}
}

ol_todo_4();
?>

<h3>5. Дан массив $arr с ключами 'Коля', 'Вася', 'Петя' и с элементами '200', '300', '400'. С помощью цикла foreach выведите на экран столбец строк такого формата: 'Коля - зарплата 200 долларов.'.</h3>

<?php
function ol_todo_5() {
	$arr = array(
		'Коля' => '200',
		'Вася' => '300',
		'Петя' => '400',
	);

	foreach ( $arr as $key => $value ) {
		echo $key . ' - зарплата ' . $value . 'долларов <br>';
	}
}

ol_todo_5();
?>

<h1>Циклы while и for</h1>
<h6>Решите эти задачи сначала через цикл while, а затем через цикл for.</h6>
<h3>6. Выведите столбец чисел от 1 до 100.</h3>

<?php
function ol_todo_6() {
	$i = 1;

	while ( $i <= 100 ) {
		echo $i++ . '<br>';
	}

	for ( $i = 1; $i <= 100; $i++ ) {
		echo $i . '<br>';
	}
}

ol_todo_6();
?>

<h3>7. Выведите столбец чисел от 11 до 33.</h3>

<?php
function ol_todo_7() {
	$i = 11;

	while ( $i <= 33 ) {
		echo $i++ . '<br>';
	}

	for ( $i = 11; $i <= 33; $i++ ) {
		echo $i . '<br>';
	}
}

ol_todo_7();
?>

<h3>8. Выведите столбец четных чисел в промежутке от 0 до 100.</h3>

<?php
function ol_todo_8() {
	$i = 0;

	while ( $i <= 100 ) {
		if ( $i++ % 2 ) {
			echo $i . '<br>';
		}
	}

	for ( $i = 0; $i <= 100; $i++ ) {
		if ( $i % 2 ) {
			echo ++$i . '<br>';
		}
	}
}

ol_todo_8();
?>

<h3>9. С помощью цикла найдите сумму чисел от 1 до 100.</h3>

<?php
function ol_todo_9() {
	$i       = 1;
	$result1 = 0;
	$result2 = 0;

	while ( $i <= 100 ) {
		$result1 += $i++;
	}

	for ( $i = 0; $i <= 100; $i++ ) {
		$result2 += $i;
	}

	echo $result1 . '<br>';
	echo $result2;
}

ol_todo_9();
?>

<h1>Задачи</h1>
<h3>10. Дан массив с элементами 2, 5, 9, 15, 0, 4. С помощью цикла foreach и оператора if выведите на экран столбец тех элементов массива, которые больше 3-х, но меньше 10.</h3>

<?php
function ol_todo_10() {
	$arr = array( 2, 5, 9, 15, 0, 4 );

	foreach ( $arr as $value ) {
		if ( 3 < $value && $value < 10 ) {
			echo $value . '<br>';
		}
	}
}

ol_todo_10();
?>

<h3>11. Дан массив с числами. Числа могут быть положительными и отрицательными. Найдите сумму положительных элементов этого массива.</h3>

<?php
function ol_todo_11() {
	$arr    = array( 2, 5, 9, 15, 0, 4, -5 );
	$result = 0;

	foreach ( $arr as $value ) {
		if ( 0 <= $value ) {
			$result += $value;
		}
	}

	echo $result;
}

ol_todo_11();
?>

<h3>12. Дан массив с элементами 1, 2, 5, 9, 4, 13, 4, 10. С помощью цикла foreach и оператора if проверьте есть ли в массиве элемент со значением, равным 4. Если есть - выведите на экран 'Есть!' и выйдите из цикла. Если нет - ничего делать не надо.</h3>

<?php
function ol_todo_12() {
	$arr = array( 1, 2, 5, 9, 4, 13, 4, 10 );

	foreach ( $arr as $value ) {
		if ( 4 === $value ) {
			echo 'Есть!';
			break;
		}
	}
}

ol_todo_12();
?>

<h3>13.Дан массив числами, например: ['10', '20', '30', '50', '235', '3000']. Выведите на экран только те числа из массива, которые начинаются на цифру 1, 2 или 5.</h3>

<?php
function ol_todo_13() {
	$arr = array( '10', '20', '30', '50', '235', '3000' );

	foreach ( $arr as $value ) {
		if ( '1' === $value[0] || '2' === $value[0] || '5' === $value[0] ) {
			echo $value . '<br>';
		}
	}
}

ol_todo_13();
?>

<h3>14. Дан массив с элементами 1, 2, 3, 4, 5, 6, 7, 8, 9. С помощью цикла foreach создайте строку '-1-2-3-4-5-6-7-8-9-'.</h3>

<?php
function ol_todo_14() {
	$arr    = array( 1, 2, 3, 4, 5, 6, 7, 8, 9 );
	$result = '-';

	foreach ( $arr as $value ) {
		$result .= $value . '-';
	}

	echo $result;
}

ol_todo_14();
?>

<h3>15. Составьте массив дней недели. С помощью цикла foreach выведите все дни недели, а выходные дни выведите жирным.</h3>

<?php
function ol_todo_15() {
	$arr = array( 'Понеділок', 'Вівторок', 'Середа', 'Четвер', 'Пятниця', 'Субота', 'Неділя' );

	foreach ( $arr as $value ) {
		if ( 'Субота' === $value || 'Неділя' === $value ) {
			echo '<strong>' . $value . '</strong>' . '<br>';
		} else {
			echo $value . '<br>';
		}
	}
}

ol_todo_15();
?>

<h3>16. Составьте массив дней недели. С помощью цикла foreach выведите все дни недели, а текущий день выведите курсивом. Текущий день должен храниться в переменной $day.</h3>

<?php
function ol_todo_16( $day ) {
	$arr = array( 'Понеділок', 'Вівторок', 'Середа', 'Четвер', 'Пятниця', 'Субота', 'Неділя' );

	foreach ( $arr as $value ) {
		if ( $day === $value ) {
			echo '<em>' . $value . '</em>' . '<br>';
		} else {
			echo $value . '<br>';
		}
	}
}

ol_todo_16( 'Вівторок' );
?>

<h1>Задачи посложнее</h1>
<h3>17. С помощью цикла for заполните массив числами от 1 до 100. То есть у вас должен получится массив [1, 2, 3... 100].</h3>

<?php
function ol_todo_17() {
	$arr = array();

	for ( $i = 1; $i <= 100; $i++ ) {
		$arr[] = $i;
	}

	var_dump( $arr );
}

ol_todo_17();
?>

<h3>18. Дан массив $arr. С помощью цикла foreach запишите английские названия в массив $en, а русские - в массив $ru.</h3>

<?php
function ol_todo_18() {
	$arr     = array(
		'green' => 'зеленый',
		'red'   => 'красный',
		'blue'  => 'голубой',
	);
	$new_arr = array();

	foreach ( $arr as $key => $value ) {
		$new_arr['ru'][] = $value;
		$new_arr['en'][] = $key;
	}

	var_dump( $new_arr );
}

ol_todo_18();
?>

<h3>19.  Дано число $num=1000. Делите его на 2 столько раз, пока результат деления не станет меньше 50. Какое число получится? Посчитайте количество итераций, необходимых для этого (итерация - это проход цикла). Решите задачу сначала через цикл while, а потом через цикл for.</h3>

<?php
function ol_todo_19_1( $num ) {
	$i = 0;

	while ( 50 <= $num ) {
		$num /= 2;
		$i++;
	}

	echo $i . '<br>';
}

function ol_todo_19_2( $num ) {
	for ( $i = 0; 50 <= $num; $i++ ) {
		$num /= 2;
	}

	echo $i;
}

ol_todo_19_1( 1000 );
ol_todo_19_2( 1000 );
?>
