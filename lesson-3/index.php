<h1>Работа с массивами</h1>

<h3>1.Создайте массив $arr=['a', 'b', 'c']. Выведите значение массива на экран с помощью функции var_dump().</h3>

<?php
function ol_todo_1() {
	$arr = array( 'a', 'b', 'c' );

	var_dump( $arr );
}

ol_todo_1();
?>

<h3>2. С помощью массива $arr из предыдущего номера выведите на экран содержимое первого, второго и третьего элементов.</h3>

<?php
function ol_todo_2() {
	$arr = array( 'a', 'b', 'c' );

	echo $arr[0] . '<br>';
	echo $arr[1] . '<br>';
	echo $arr[2] . '<br>';
}

ol_todo_2();
?>

<h3>3. Создайте массив $arr=['a', 'b', 'c', 'd'] и с его помощью выведите на экран строку 'a+b, c+d'.</h3>

<?php
function ol_todo_3() {
	$arr = array( 'a', 'b', 'c', 'd' );

	echo $arr[0] . '+' . $arr[1] . ', ' . $arr[2] . '+' . $arr[3];
}

ol_todo_3();
?>

<h3>4. Создайте массив $arr с элементами 2, 5, 3, 9. Умножьте первый элемент массива на второй, а третий элемент на четвертый. Результаты сложите, присвойте переменной $result. Выведите на экран значение этой переменной.</h3>

<?php
function ol_todo_4() {
	$arr    = array( 2, 5, 3, 9 );
	$result = $arr[0] * $arr[1] + $arr[2] * $arr[3];

	echo $result;
}

ol_todo_4();
?>

<h3>5. Заполните массив $arr числами от 1 до 5. Не объявляйте массив, а просто заполните его присваиванием $arr[] = новое значение.</h3>

<?php
function ol_todo_5() {
	$result[] = 1;
	$result[] = 2;
	$result[] = 3;
	$result[] = 4;
	$result[] = 5;

	var_dump( $result );
};

ol_todo_5();
?>

<h1>Ассоциативные массивы</h1>
<h3>6. Создайте массив $arr. Выведите на экран элемент с ключом 'c'.</h3>

<?php
function ol_todo_6() {
	$arr = array(
		'a' => '1',
		'b' => '2',
		'c' => '3',
		'd' => '4',
	);

	var_dump( $arr['c'] );
}

ol_todo_6();
?>

<h3>7. Создайте массив $arr. Найдите сумму элементов этого массива.</h3>

<?php
function ol_todo_7() {
	$arr    = array(
		'a' => '1',
		'b' => '2',
		'c' => '3',
	);
	$result = 0;

	foreach ( $arr as $value ) {
		$result += $value;
	};

	echo $result;
}

ol_todo_7();
?>

<h3>8. Создайте массив заработных плат $arr. Выведите на экран зарплату Пети и Коли.</h3>

<?php
function ol_todo_8() {
	$arr = array(
		'Коля' => '1000$',
		'Вася' => '500$',
		'Петя' => '200$',
	);

	echo $arr['Коля'] + $arr['Петя'];
}

ol_todo_8();
?>

<h3>9. Создайте ассоциативный массив дней недели. Ключами в нем должны служить номера дней от начала недели (понедельник - должен иметь ключ 1, вторник - 2 и т.д.). Выведите на экран текущий день недели.</h3>

<?php
function ol_todo_9() {
	$arr = array(
		'1' => 'Понеділок',
		'2' => 'Вівторок',
		'3' => 'Середа',
		'4' => 'Четвер',
		'5' => 'Пятниця',
		'6' => 'Субота',
		'7' => 'Неділя',
	);

	echo $arr['1'];
}

ol_todo_9();
?>

<h3>10. Пусть теперь номер дня недели хранится в переменной $day, например там лежит число 3. Выведите день недели, соответствующий значению переменной $day.</h3>

<?php
function ol_todo_10() {
	$arr = array(
		'1' => 'Понеділок',
		'2' => 'Вівторок',
		'3' => 'Середа',
		'4' => 'Четвер',
		'5' => 'Пятниця',
		'6' => 'Субота',
		'7' => 'Неділя',
	);
	$day = '1';

	echo $arr[ $day ];
}

ol_todo_10();
?>

<h1>Многомерные массивы</h1>

<h3>11. Создайте многомерный массив $arr. С его помощью выведите на экран слова 'joomla', 'drupal', 'зеленый', 'красный'.</h3>

<?php
function ol_todo_11() {
	$arr = array(
		'cms'    => array( 'joomla', 'wordpress', 'drupal' ),
		'colors' => array(
			'blue'  => 'голубой',
			'red'   => 'красный',
			'green' => 'зеленый',
		),
	);

	echo $arr['cms'][0] . ', ' . $arr['cms'][2] . ', ' . $arr['colors']['green'] . ', ' . $arr['colors']['red'];
}

ol_todo_11();
?>

<h3>12.Создайте двухмерный массив. Первые два ключа - это 'ru' и 'en'. Пусть первый ключ содержит элемент, являющийся массивом названий дней недели по-русски, а второй - по-английски. Выведите с помощью этого массива понедельник по-русски и среду по английски (пусть понедельник - это первый день).</h3>

<?php
function ol_todo_12() {
	$arr = array(
		'ru' => array(
			'1' => 'Понеділок',
			'2' => 'Вівторок',
			'3' => 'Середа',
			'4' => 'Четвер',
			'5' => 'Пятниця',
			'6' => 'Субота',
			'7' => 'Неділя',
		),
		'en' => array(
			'1' => 'Monday',
			'2' => 'Tuesday',
			'3' => 'Wednesday',
			'4' => 'Thursday',
			'5' => 'Friday',
			'6' => 'Saturday',
			'7' => 'Sunday',
		),
	);

	echo $arr['ru'][1] . '<br>' . $arr['en'][3];
}

ol_todo_12();
?>

<h3>13. Пусть теперь в переменной $lang хранится язык (она принимает одно из значений или 'ru', или 'en' - либо то, либо то), а в переменной $day - номер дня. Выведите словом день недели, соответствующий переменным $lang и $day. То есть: если, к примеру, $lang = 'ru' и $day = 3 - то выведем 'среда'.</h3>

<?php
function ol_todo_13() {
	$arr  = array(
		'ru' => array(
			'1' => 'Понеділок',
			'2' => 'Вівторок',
			'3' => 'Середа',
			'4' => 'Четвер',
			'5' => 'Пятниця',
			'6' => 'Субота',
			'7' => 'Неділя',
		),
		'en' => array(
			'1' => 'Monday',
			'2' => 'Tuesday',
			'3' => 'Wednesday',
			'4' => 'Thursday',
			'5' => 'Friday',
			'6' => 'Saturday',
			'7' => 'Sunday',
		),
	);
	$lang = 'ru';
	$day  = 3;

	echo $arr[ $lang ][ $day ];
};

ol_todo_13();
?>
