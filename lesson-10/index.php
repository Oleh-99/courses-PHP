<h3>1. Спросите имя пользователя с помощью формы. Результат запишите в переменную $name. Выведите на экран фразу 'Привет, %Имя%'.</h3>

<form action="" method="GET">
	<input type="text" name="name_1"><br><br>
	<input type="submit">
</form>

<?php

function esc_html( $data ) {
	return htmlspecialchars( trim( $data ) );
}

function ol_todo_1() {
	$name = '';

	if ( ! empty( $_GET['name_1'] ) ) {
		$name = esc_html( $_GET['name_1'] );
		echo 'Привіт ' . $name;
	}
}

ol_todo_1();
?>

<h3>2. Спросите у пользователя имя, возраст, а также попросите его ввести сообщение (его сделайте в textarea). Выведите эти данные на экран в формате, приведенном под данной задачей. Позаботьтесь о том, чтобы пользователь не мог вводить теги (просто удаляйте их) и таким образом сломать сайт.</h3>

<form action="" method="GET">
	<input type="text" name="name_2"><br><br>
	<input type="text" name="age_2"><br><br>
	<textarea name="text_2"></textarea><br><br>
	<input type="submit">
</form>

<?php
function ol_todo_2() {
	if ( ! empty( $_GET['name_2'] ) && ! empty( $_GET['age_2'] ) && ! empty( $_GET['text_2'] ) ) {
		$name = esc_html( $_GET['name_2'] );
		$age  = esc_html( $_GET['age_2'] );
		$text = esc_html( $_GET['text_2'] );
		echo 'Привет, ' . $name . ', ' . $age . ' лет. <br> Твое сообщение: ' . $text;
	}
}

ol_todo_2();
?>

<h3>3. Спросите возраст пользователя. Если форма была отправлена и введен возраст, то выведите его на экран, а форму уберите. Если же форма не была отправлена (это будет при первом заходе на страницу) - просто покажите ее.</h3>

<?php
function ol_todo_3() {
	if ( empty( $_GET['age_3'] ) ) {
		?>
			<form action="" method="GET">
				<input type="text" name="age_3"><br><br>
				<input type="submit">
			</form>
		<?php
	}

	if ( ! empty( $_GET['age_3'] ) ) {
		$age = htmlspecialchars( trim( $_GET['age_3'] ) );
		echo 'Ваш возраст - ' . $age;
	}
}

ol_todo_3();
?>

<h3>4. Спросите у пользователя логин и пароль (в браузере должен быть звездочками). Сравните их с логином $login и паролем $pass, хранящихся в файле. Если все верно - выведите 'Доступ разрешен!', в противном случае - 'Доступ запрещен!'. Сделайте так, чтобы скрипт обрезал концевые пробелы в строках, которые ввел пользователь.</h3>

<form action="" method="POST">
	<input type="text" name="login"><br><br>
	<input type="password" name="password"><br><br>
	<input type="submit">
</form>

<?php
function ol_todo_4() {
	if ( ! empty( $_POST['login'] ) && ! empty( $_POST['password'] ) ) {
		$handle   = file_get_contents( 'login.txt' );
		$arr_data = json_decode( $handle, true );
		$login    = esc_html( $_POST['login'] );
		$password = esc_html( $_POST['password'] );
		$access   = false;

		foreach ( $arr_data as $value ) {
			if ( $value['login'] === $login && $value['password'] === $password ) {
				$access = true;
			}
		}

		if ( $access ) {
			echo 'Доступ разрешен!';
		} else {
			echo 'Доступ запрещен!';
		}
	}
}

ol_todo_4();
?>

<h3>5. Спросите имя пользователя с помощью формы. Результат запишите в переменную $name. Сделайте так, чтобы после отправки формы значения ее полей не пропадали. </h3>

<?php
function ol_todo_5() {
	$name = '';

	if ( ! empty( $_GET['name_5'] ) ) {
		$name = esc_html( $_GET['name_5'] );
	}

	?>
	<form action="" method="GET">
		<input type="text" name="name_5" value="<?php echo $name; ?>"><br><br>
		<input type="submit">
	</form>
	<?php
}

ol_todo_5();
?>

<h3>6. Спросите у пользователя имя, а также попросите его ввести сообщение (textarea). Сделайте так, чтобы после отправки формы значения его полей не пропадали</h3>

<?php
function ol_todo_6() {
	$name = '';
	$text = '';
	
	if ( ! empty( $_GET['name_6'] ) && ! empty( $_GET['text_6'] ) ) {
		$name = esc_html( $_GET['name_6'] );
		$text = esc_html( $_GET['text_6'] );
	}

	?>
	<form action="" method="GET">
		<input type="text" name="name_6" value="<?php echo $name; ?>"><br><br>
		<textarea name="text_6"><?php echo $text; ?></textarea><br><br>
		<input type="submit">
	</form>
	<?php
}

ol_todo_6();
?>
