
<h3>1. Спросите у пользователя имя с помощью формы. Сделайте чекбокс: если он отмечен, то поприветствуйте пользователя, если не отмечен - попрощайтесь с пользователем.</h3>

<form action="" method="get">
	<input type="text" name="name_1"><br><br>
	<input type="checkbox" name="check_1" value="1"><br><br>
	<input type="submit">
</form>

<?php
function exc_html( $data ) {
	return htmlspecialchars( trim( $data ) );
}

function ol_todo_1() {
	if ( ! empty( $_REQUEST['name_1'] ) ) {
		$name = exc_html( $_REQUEST['name_1'] );

		if ( ! empty( $_REQUEST['check_1'] ) && '1' === $_REQUEST['check_1'] ) {
			echo 'Hello ' . $name;
		} else {
			echo 'Goodbye ' . $name;
		}
	}
}

ol_todo_1();
?>

<h3>2. Спросите у пользователя, какие из языков он знает: html, css, php, javascript. Выведите на экран те языки, которые знает пользователь.</h3>

<form action="" method="get">
	<input type="checkbox" name="check_2[]" value="html"><span>html</span><br><br>
	<input type="checkbox" name="check_2[]" value="css"><span>css</span><br><br>
	<input type="checkbox" name="check_2[]" value="php"><span>php</span><br><br>
	<input type="submit">
</form>

<?php
function ol_todo_2() {
	if ( ! empty( $_REQUEST['check_2'] ) ) {
		echo 'Вы знаете: ' . implode(', ', $_REQUEST['check_2']);
	}
}

ol_todo_2();
?>

<h3>3. Спросите у пользователя знает ли он PHP с помощью двух radio-кнопок. Выведите результат на экран. Сделайте так, чтобы по умолчанию один из вариантов был уже отмечен. </h3>

<form action="" method="get">
	<div>Знает ли ты PHP</div><br>
	<input type="radio" name="radio_3" value="yes" checked="checked"><span>Yes</span><br><br>
	<input type="radio" name="radio_3" value="no"><span>No</span><br><br>
	<input type="submit">
</form>

<?php
function ol_todo_3() {
	if ( ! empty( $_REQUEST['radio_3'] ) ) {
		$radiobtn = $_REQUEST['radio_3'];
		if ( 'yes' === $radiobtn ) {
			echo 'Вы знаете PHP';
		} elseif ( 'no' === $radiobtn ) {
			echo 'Вы не знаете PHP';
		}
	}
}

ol_todo_3();
?>

<h3>4. Спросите у пользователя его возраст с помощью нескольких radio-кнопок. Варианты ответа сделайте такими: менее 20 лет, 20-25, 26-30, более 30. </h3>

<form action="" method="get">
	<div>Ваш возраст</div><br>
	<input type="radio" name="radio_4" value="1"><span>менее 20 лет</span><br><br>
	<input type="radio" name="radio_4" value="2"><span>20-25 лет</span><br><br>
	<input type="radio" name="radio_4" value="3"><span>26-30 лет</span><br><br>
	<input type="radio" name="radio_4" value="4"><span>более 30 лет</span><br><br>
	<input type="submit">
</form>

<?php
function ol_todo_4() {
	if ( ! empty( $_REQUEST['radio_4'] ) ) {
		$radiobtn = $_REQUEST['radio_4'];
		if ( '1' === $radiobtn ) {
			echo 'Вам менее 20 лет';
		} elseif ( '2' === $radiobtn ) {
			echo 'Вам 20-25 лет';
		} elseif ( '3' === $radiobtn ) {
			echo 'Вам 26-30 лет';
		} elseif ( '4' === $radiobtn ) {
			echo 'Вам более 30 лет';
		}
	}
}

ol_todo_4();
?>

<h3>5. Спросите у пользователя его возраст с помощью select. Варианты ответа сделайте такими: менее 20 лет, 20-25, 26-30, более 30.</h3>

<form action="" method="get">
	<select name="select_5" id="">
		<option value="1">Вам менее 20 лет</option>
		<option value="2">Вам 20-25 лет</option>
		<option value="3">Вам 26-30 лет</option>
		<option value="4">Вам более 30 лет</option>
	</select>
	<input type="submit">
</form>

<?php
function ol_todo_5() {
	if ( ! empty( $_REQUEST['select_5'] ) ) {
		$select = $_REQUEST['select_5'];
		if ( '1' === $select ) {
			echo 'Вам менее 20 лет';
		} elseif ( '2' === $select ) {
			echo 'Вам 20-25 лет';
		} elseif ( '3' === $select ) {
			echo 'Вам 26-30 лет';
		} elseif ( '4' === $select ) {
			echo 'Вам более 30 лет';
		}
	}
}

ol_todo_5();
?>

<h3>6. Спросите у пользователя с помощью мультиселекта, какие из языков он знает: html, css, php, javascript. Выведите на экран те языки, которые знает пользователь.</h3>

<form action="" method="get">
	<select name="select_6[]" multiple="true">
		<option value="html">html</option>
		<option value="css">css</option>
		<option value="php">php</option>
		<option value="javascript">javascript</option>
	</select>
	<input type="submit">
</form>

<?php
function ol_todo_6() {
	if ( ! empty( $_REQUEST['select_6'] ) ) {
		echo 'Вы знаете: ' . implode(', ', $_REQUEST['select_6']);
	}
}

ol_todo_6();
?>

<h3>7. Сделайте функцию, которая создает обычный текстовый инпут. Функция должна иметь следующие параметры: type, name, value. <br>8. Модифицируйте функцию из предыдущей задачи так, чтобы она сохраняла значение инпута после отправки. </h3>
<form action="" method="get">
<?php
function get_ol_input( $type, $name, $value ) {
	if ( ! empty( $_REQUEST['input_8'] ) ) {
		$value = exc_html( $_REQUEST['input_8'] );
	}

	return '<input type="'. $type . '" name="' . $name . '" value="' . $value . '">';	
}

echo get_ol_input('text', 'input_7', '1');
?>
<input type="submit">
</form>
