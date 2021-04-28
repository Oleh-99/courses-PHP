<h1>Работа с count</h1>
<h3>1. Дан массив $arr. Подсчитайте количество элементов этого массива.</h3>

<?php
function ol_todo_1( $arr ) {
	echo count( $arr );
}

ol_todo_1( array( 1, 2, 3, 4, 5, 6, 7 ) );
?>

<h3>2. Дан массив $arr. С помощью функции count выведите последний элемент данного массива.</h3>

<?php
function ol_todo_2( $arr ) {
	$num = count( $arr );
	echo $arr[ $num - 1 ];
}

ol_todo_2( array( 1, 2, 3, 4, 5, 6, 7 ) );
?>

<h1>Работа с in_array</h1>
<h3>3. Дан массив с числами. Проверьте, что в нем есть элемент со значением 3.</h3>

<?php
function ol_todo_3( $arr ) {
	foreach ( $arr as $value ) {
		if ( 3 === $value ) {
			echo 'есть элемент со значением 3 <br>';
		}
	}
}

ol_todo_3( array( 1, 2, 3, 4, 5, 6, 7 ) );
?>

<h1>Работа с array_sum и array_product</h1>
<h3>4. Дан массив [1, 2, 3, 4, 5]. Найдите сумму элементов данного массива.</h3>

<?php
function ol_todo_4( $arr ) {
	echo array_sum( $arr );
}

ol_todo_4( array( 1, 2, 3, 4, 5 ) );
?>

<h3>5. Дан массив [1, 2, 3, 4, 5]. Найдите произведение (умножение) элементов данного массива.</h3>

<?php
function ol_todo_5( $arr ) {
	echo array_product( $arr );
}

ol_todo_5( array( 1, 2, 3, 4, 5 ) );
?>

<h3>6. Дан массив $arr. С помощью функций array_sum и count найдите среднее арифметическое элементов (сумма элементов делить на их количество) данного массива.</h3>

<?php
function ol_todo_6( $arr ) {
	$result = array_sum( $arr );
	echo $result / count( $arr );
}

ol_todo_6( array( 1, 2, 3, 4, 5 ) );
?>

<h1>Работа с range</h1>
<h3>Создайте массив, заполненный числами от 1 до 100.</h3>

<?php
function ol_todo_7() {
	var_dump( range( 1, 100 ) );
}

ol_todo_7();
?>

<h3>8. Создайте массив, заполненный буквами от 'a' до 'z'.</h3>

<?php
function ol_todo_8() {
	var_dump( range( 'a', 'z' ) );
}

ol_todo_8();
?>

<h3>9. Создайте строку '1-2-3-4-5-6-7-8-9' не используя цикл.</h3>

<?php
function ol_todo_9() {
	$arr = range( 1, 9 );
	echo implode( '-', $arr );
}

ol_todo_9();
?>

<h3>10. Найдите сумму чисел от 1 до 100 не используя цикл.</h3>

<?php
function ol_todo_10() {
	echo array_sum( range( 1, 100 ) );
}

ol_todo_10();
?>

<h3>11. Найдите произведение чисел от 1 до 10 не используя цикл.</h3>

<?php
function ol_todo_11() {
	echo array_product( range( 1, 10 ) );
}

ol_todo_11();
?>

<h1>Работа с array_merge</h1>
<h3>12. Даны два массива: первый с элементами 1, 2, 3, второй с элементами 'a', 'b', 'c'. Сделайте из них массив с элементами 1, 2, 3, 'a', 'b', 'c'.</h3>

<?php
function ol_todo_12( $arr1, $arr2 ) {
	var_dump( array_merge( $arr1, $arr2 ) );
}

ol_todo_12( array( 1, 2, 3 ), array( 'a', 'b', 'c' ) );
?>

<h1>Работа с array_slice</h1>
<h3>13. Дан массив с элементами 1, 2, 3, 4, 5. С помощью функции array_slice создайте из него массив $result с элементами 2, 3, 4.</h3>

<?php
function ol_todo_13( $arr ) {
	$count = count( $arr ) - 1;

	var_dump( array_slice( $arr, 1, $count - 1 ) );
}

ol_todo_13( array( 1, 2, 3, 4, 5 ) );
?>

<h1>Работа с array_splice</h1>
<h3>14. Дан массив [1, 2, 3, 4, 5]. С помощью функции array_splice преобразуйте массив в [1, 4, 5].</h3>

<?php
function ol_todo_14( $arr ) {
	array_splice( $arr, 1, 2 );
	var_dump( $arr );
}

ol_todo_14( array( 1, 2, 3, 4, 5 ) );
?>

<h3>15. Дан массив [1, 2, 3, 4, 5]. С помощью функции array_splice запишите в новый массив элементы [2, 3, 4].</h3>

<?php
function ol_todo_15( $arr ) {
	$result = array_splice( $arr, 1, 3 );
	var_dump( $result );
}

ol_todo_15( array( 1, 2, 3, 4, 5 ) );
?>

<h3>16.Дан массив [1, 2, 3, 4, 5]. С помощью функции array_splice сделайте из него массив [1, 2, 3, 'a', 'b', 'c', 4, 5].</h3>

<?php
function ol_todo_16( $arr ) {
	array_splice( $arr, 3, 0, array( 'a', 'b', 'c' ) );
	var_dump( $arr );
}

ol_todo_16( array( 1, 2, 3, 4, 5 ) );
?>

<h3>17. Дан массив [1, 2, 3, 4, 5]. С помощью функции array_splice сделайте из него массив [1, 'a', 'b', 2, 3, 4, 'c', 5, 'e'].</h3>

<?php
function ol_todo_17( $arr ) {
	array_splice( $arr, 1, 0, array( 'a', 'b' ) );
	array_splice( $arr, -1, 0, array( 'c' ) );
	var_dump( $arr );
}

ol_todo_17( array( 1, 2, 3, 4, 5 ) );
?>

<h1>Работа с array_keys, array_values, array_combine</h1>
<h3>18. Дан массив 'a'=>1, 'b'=>2, 'c'=>3'. Запишите в массив $keys ключи из этого массива, а в $values – значения.</h3>

<?php
function ol_todo_18( $arr ) {
	var_dump( array_values( $arr ) );
}

ol_todo_18(
	array(
		'a' => 1,
		'b' => 2,
		'c' => 3,
	)
);
?>

<h3>19. Даны два массива: ['a', 'b', 'c'] и [1, 2, 3]. Создайте с их помощью массив 'a'=>1, 'b'=>2, 'c'=>3'.</h3>

<?php
function ol_todo_19( $arr1, $arr2 ) {
	var_dump( array_combine( $arr1, $arr2 ) );
}

ol_todo_19( array( 'a', 'b', 'c' ), array( 1, 2, 3 ) );
?>

<h1>Работа с array_flip, array_reverse</h1>
<h3>20. Дан массив 'a'=>1, 'b'=>2, 'c'=>3. Поменяйте в нем местами ключи и значения.</h3>

<?php
function ol_todo_20( $arr ) {
	var_dump( array_flip( $arr ) );
}

ol_todo_20(
	array(
		'a' => 1,
		'b' => 2,
		'c' => 3,
	)
);
?>

<h3>21. Дан массив с элементами 1, 2, 3, 4, 5. Сделайте из него массив с элементами 5, 4, 3, 2, 1.</h3>

<?php
function ol_todo_21( $arr ) {
	var_dump( array_reverse( $arr ) );
}

ol_todo_21( array( 1, 2, 3, 4, 5 ) );
?>

<h1>Работа с array_search</h1>
<h3>22. Дан массив ['a', '-', 'b', '-', 'c', '-', 'd']. Найдите позицию первого элемента '-'.</h3>

<?php
function ol_todo_22( $arr ) {
	echo array_search( '-', $arr );
}

ol_todo_22( array( 'a', '-', 'b', '-', 'c', '-', 'd' ) );
?>

<h3>23. Дан массив ['a', '-', 'b', '-', 'c', '-', 'd']. Найдите позицию первого элемента '-' и удалите его с помощью функции array_splice.</h3>

<?php
function ol_todo_23( $arr ) {
	$num = array_search( '-', $arr );
	array_splice( $arr, $num, 1 );
	var_dump( $arr );
}

ol_todo_23( array( 'a', '-', 'b', '-', 'c', '-', 'd' ) );
?>

<h1>Работа с array_replace</h1>
<h3>24. Дан массив ['a', 'b', 'c', 'd', 'e']. Поменяйте элемент с ключом 0 на '!', а элемент с ключом 3 - на '!!'.</h3>

<?php
function ol_todo_24( $arr ) {
	$result = array_replace(
		$arr,
		array(
			0 => '!',
			3 => '!!',
		)
	);
	var_dump( $result );
}

ol_todo_24( array( 'a', 'b', 'c', 'd', 'e' ) );
?>

<h1>Работа с сортировку</h1>
<h3>25. Дан массив '3'=>'a', '1'=>'c', '2'=>'e', '4'=>'b'. Попробуйте на нем различные типы сортировок.</h3>

<?php
function ol_todo_25_1( $arr ) {
	sort( $arr );
	var_dump( $arr );
	echo '<br>';
}

function ol_todo_25_2( $arr ) {
	asort( $arr );
	var_dump( $arr );
	echo '<br>';
}

function ol_todo_25_3( $arr ) {
	arsort( $arr );
	var_dump( $arr );
	echo '<br>';
}

function ol_todo_25_4( $arr ) {
	ksort( $arr );
	var_dump( $arr );
	echo '<br>';
}

function ol_todo_25_5( $arr ) {
	krsort( $arr );
	var_dump( $arr );
	echo '<br>';
}

function ol_todo_25_6( $arr ) {
	natsort( $arr );
	var_dump( $arr );
	echo '<br>';
}

ol_todo_25_1(
	array(
		'3' => 'a',
		'1' => 'c',
		'2' => 'e',
		'4' => 'b',
	)
);
ol_todo_25_2(
	array(
		'3' => 'a',
		'1' => 'c',
		'2' => 'e',
		'4' => 'b',
	)
);
ol_todo_25_3(
	array(
		'3' => 'a',
		'1' => 'c',
		'2' => 'e',
		'4' => 'b',
	)
);
ol_todo_25_4(
	array(
		'3' => 'a',
		'1' => 'c',
		'2' => 'e',
		'4' => 'b',
	)
);
ol_todo_25_5(
	array(
		'3' => 'a',
		'1' => 'c',
		'2' => 'e',
		'4' => 'b',
	)
);
ol_todo_25_6(
	array(
		'3' => 'a',
		'1' => 'c',
		'2' => 'e',
		'4' => 'b',
	)
);
?>

<h1>Работа с array_rand</h1>
<h3>26. Дан массив с элементами 'a'=>1, 'b'=>2, 'c'=>3. Выведите на экран случайный ключ из данного массива.</h3>

<?php
function ol_todo_26( $arr ) {
	echo array_rand( $arr );
}

ol_todo_26(
	array(
		'a' => 1,
		'b' => 2,
		'c' => 3,
	)
);
?>

<h3>27. Дан массив с элементами 'a'=>1, 'b'=>2, 'c'=>3. Выведите на экран случайный элемент данного массива.</h3>

<?php
function ol_todo_27( $arr ) {
	$key = array_rand( $arr );
	echo $arr[ $key ];
}

ol_todo_27(
	array(
		'a' => 1,
		'b' => 2,
		'c' => 3,
	)
);
?>

<h1>Работа с shuffle</h1>
<h3>28. Дан массив $arr. Перемешайте его элементы в случайном порядке.</h3>

<?php
function ol_todo_28( $arr ) {
	shuffle( $arr );
	var_dump( $arr );
}

ol_todo_28( array( 1, 2, 3, 4, 5 ) );
?>

<h3>29. Заполните массив числами от 1 до 25 с помощью range, а затем перемешайте его элементы в случайном порядке.</h3>

<?php
function ol_todo_29() {
	$arr = range( 1, 25 );
	shuffle( $arr );
	var_dump( $arr );
}

ol_todo_29();
?>

<h3>30. Заполните массив числами от 1 до 25 с помощью range, а затем перемешайте его элементы в случайном порядке.</h3>

<?php
function ol_todo_30() {
	$arr = range( 'a', 'z' );
	shuffle( $arr );
	var_dump( $arr );
}

ol_todo_30();
?>

<h3>31. Сделайте строку длиной 6 символов, состоящую из маленьких английских букв, расположенных в случайном порядке. Буквы не должны повторяться.</h3>

<?php
function ol_todo_31() {
	$arr = range( 'a', 'z' );
	shuffle( $arr );
	$arr = implode( '', $arr );
	echo substr( $arr, 0, 6 );
}

ol_todo_31();
?>

<h1>Работа с array_unique</h1>
<h3>32. Дан массив с элементами 'a', 'b', 'c', 'b', 'a'. Удалите из него повторяющиеся элементы.</h3>

<?php
function ol_todo_32( $arr ) {
	var_dump( array_unique( $arr ) );
}

ol_todo_32( array( 'a', 'b', 'c', 'b', 'a' ) );
?>

<h1>Работа с array_shift, array_pop, array_unshift, array_push</h1>
<h3>33. Дан массив с элементами 1, 2, 3, 4, 5. Выведите на экран его первый и последний элемент, причем так, чтобы в исходном массиве они исчезли.</h3>

<?php
function ol_todo_33( $arr ) {
	array_shift( $arr );
	array_pop( $arr );
	var_dump( $arr );
}

ol_todo_33( array( 1, 2, 3, 4, 5 ) );
?>

<h3>34. Дан массив с элементами 1, 2, 3, 4, 5. Добавьте ему в начало элемент 0, а в конец - элемент 6.</h3>

<?php
function ol_todo_34( $arr ) {
	array_unshift( $arr, 0 );
	array_push( $arr, 6 );
	var_dump( $arr );
}

ol_todo_34( array( 1, 2, 3, 4, 5 ) );
?>

<h3>35.  Дан массив с элементами 1, 2, 3, 4, 5, 6, 7, 8. С помощью цикла и функций array_shift и array_pop выведите на экран его элементы в следующем порядке: 18273645.</h3>

<?php
function ol_todo_35( $arr ) {
	for ( $i = 0; $i <= count( $arr ) / 2; $i++ ) {
		echo array_shift( $arr );
		echo array_pop( $arr );
	}

	echo implode( '', $arr );
}

ol_todo_35( array( 1, 2, 3, 4, 5, 6, 7, 8 ) );
?>

<h1>Работа с array_pad, array_fill, array_fill_keys, array_chunk</h1>
<h3>36. Дан массив с элементами 'a', 'b', 'c'. Сделайте из него массив с элементами 'a', 'b', 'c', '-', '-', '-'.</h3>

<?php
function ol_todo_36( $arr ) {
	$result = array_pad( $arr, 6, '-' );
	var_dump( $result );
}

ol_todo_36( array( 'a', 'b', 'c' ) );
?>

<h3>37. Заполните массив 10-ю буквами 'x'.</h3>

<?php
function ol_todo_37() {
	$arr    = array();
	$result = array_pad( $arr, 10, 'x' );
	var_dump( $result );
}

ol_todo_37();
?>

<h3>38.  Создайте массив, заполненный целыми числами от 1 до 20. С помощью функции array_chunk разбейте этот массив на 5 подмассивов ([1, 2, 3, 4]; [5, 6, 7, 8] и т.д.).</h3>

<?php
function ol_todo_38() {
	$arr    = range( 1, 20 );
	$result = array_chunk( $arr, 4 );
	var_dump( $result );
}

ol_todo_38();
?>

<h1>Работа с array_count_values</h1>
<h3>39. Дан массив с элементами 'a', 'b', 'c', 'b', 'a'. Подсчитайте сколько раз встречается каждая из букв.</h3>

<?php
function ol_todo_39( $arr ) {
	var_dump( array_count_values( $arr ) );
}

ol_todo_39( array( 'a', 'b', 'c', 'b', 'a' ) );
?>

<h1>Работа с array_map</h1>
<h3>40. Дан массив с элементами 1, 2, 3, 4, 5. Создайте новый массив, в котором будут лежать квадратные корни данных элементов.</h3>

<?php
function ol_todo_40( $arr ) {
	$result = array_map( 'sqrt', $arr );
	var_dump( $result );
}

ol_todo_40( array( 1, 2, 3, 4, 5 ) );
?>

<h3>41. Дан массив с элементами '<b>php</b>', '<i>html</i>'. Создайте новый массив, в котором из элементов будут удалены теги.</h3>

<?php
function ol_todo_41( $arr ) {
	$result = array_map( 'strip_tags', $arr );
	var_dump( $result );
}

ol_todo_41( array( '<b>php</b>', '<i>html</i>' ) );
?>

<h3>42.Дан массив с элементами ' a ', ' b ', ' с '. Создайте новый массив, в котором будут данные элементы без концевых пробелов.</h3>

<?php
function ol_todo_42( $arr ) {
	$result = array_map( 'trim', $arr );
	var_dump( $result );
}

ol_todo_42( array( ' a ', ' b ', ' с ' ) );
?>

<h1>Работа с array_intersect, array_diff</h1>
<h3>43. Дан массив с элементами 1, 2, 3, 4, 5 и массив с элементами 3, 4, 5, 6, 7. Запишите в новый массив элементы, которые есть и в том, и в другом массиве.</h3>

<?php
function ol_todo_43( $arr1, $arr2 ) {
	$result = array_intersect( $arr1, $arr2 );
	var_dump( $result );
}

ol_todo_43( array( 1, 2, 3, 4, 5 ), array( 3, 4, 5, 6, 7 ) );
?>

<h3>44. Дан массив с элементами 1, 2, 3, 4, 5 и массив с элементами 3, 4, 5, 6, 7. Запишите в новый массив элементы, которые есть и в том, и в другом массиве.</h3>

<?php
function ol_todo_44( $arr1, $arr2 ) {
	$result = array_diff( $arr1, $arr2 );
	var_dump( $result );
}

ol_todo_44( array( 1, 2, 3, 4, 5 ), array( 3, 4, 5, 6, 7 ) );
?>

<h1>Задачи</h1>
<h3>45. Дана строка '1234567890'. Найдите сумму цифр из этой строки не используя цикл.</h3>

<?php
function ol_todo_45( $text ) {
	$arr = str_split( $text );
	echo array_sum( $arr );
}

ol_todo_45( '1234567890' );
?>

<h3>46. Создайте массив ['a'=>1, 'b'=2... 'z'=>26] не используя цикл.</h3>

<?php
function ol_todo_46() {
	var_dump( array_combine( range( 'a', 'z' ), range( 1, 26 ) ) );
}

ol_todo_46();
?>

<h3>47. Создайте массив вида [[1, 2, 3], [4, 5, 6], [7, 8, 9]] не используя цикл.</h3>

<?php
function ol_todo_47() {
	var_dump( array_chunk( range( 1, 9 ), 3 ) );
}

ol_todo_47();
?>

<h3>48. Дан массив с элементами 1, 2, 4, 5, 5. Найдите второй по величине элемент. В нашем случае это будет 4.</h3>

<?php
function ol_todo_48( $arr ) {
	$result = array_unique( $arr );
	rsort( $result );
	echo $result[1];
}

ol_todo_48( array( 1, 2, 4, 5, 5 ) );
?>
