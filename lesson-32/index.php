<?php
session_start();
ob_start();
?>

<h3>1. По заходу на страницу запишите в сессию текст 'test'. Затем обновите страницу и выведите содержимое сессии на экран.</h3>

<?php
function esc_html( $data ) {
	return htmlspecialchars( trim( $data ) );
}

function ol_todo_1() {
	if ( empty( $_SESSION['todo_32_1'] ) ) {
		$_SESSION['todo_32_1'] = 'test';
	} else {
		echo $_SESSION['todo_32_1'];
	}
}

ol_todo_1();
?>

<h3>2. Пусть у вас есть две страницы сайта. Запишите на первой странице что-нибудь в сессию, а затем выведите это при заходе на другую страницу.</h3>
<form action="" method="get">
	<input type="text" name="input_2">
	<input type="submit">
</form>

<?php
function ol_todo_2() {
	if ( ! empty( $_GET['input_2'] ) ) {
		$_SESSION['todo_32_2'] = esc_html( $_GET['input_2'] );
		header( 'Location: page.php' );
	}
}

ol_todo_2();
?>

<h3>3. Сделайте счетчик обновления страницы пользователем. Данные храните в сессии. Скрипт должен выводить на экран количество обновлений. При первом заходе на страницу он должен вывести сообщение о том, что вы еще не обновляли страницу.</h3>

<?php
function ol_todo_3() {
	if ( empty( $_SESSION['todo_32_3'] ) ) {
		$_SESSION['todo_32_3'] = 1;
		echo 'Вы еще не обновляли страницу';
	} else {
		$_SESSION['todo_32_3'] = ++$_SESSION['todo_32_3'];
		echo 'Вы обновили эту страницу ' . $_SESSION['todo_32_3'] . ' раз!';
	}
}

ol_todo_3();
?>

<h3>4. Сделайте две страницы: index.php и test.php. При заходе на index.php спросите с помощью формы страну пользователя, запишите ее в сессию (форма при этом должна отправится на эту же страницу). Пусть затем пользователь зайдет на страницу test.php - выведите там страну пользователя. </h3>
<form action="" method="get">
	<input type="text" name="input_4">
	<input type="submit">
</form>

<?php
function ol_todo_4() {
	if ( ! empty( $_GET['input_4'] ) ) {
		$_SESSION['todo_32_2'] = esc_html( $_GET['input_4'] );
		header( 'Location: page.php' );
	}
}

ol_todo_4();
?>

<h3>5. Запишите в сессию время захода пользователя на сайт. При обновлении страницы выводите сколько секунд назад пользователь зашел на сайт.</h3>

<?php
function ol_todo_5() {
	if ( empty( $_SESSION['session-time'] ) ) {
		$_SESSION['session-time'] = time();
	} else {
		echo time() - $_SESSION['session-time'];
	}
}

ol_todo_5();
?>

<h3>6. Спросите у пользователя email с помощью формы. Затем сделайте так, чтобы в другой форме (поля: имя, фамилия, пароль, email) при ее открытии поле email было автоматически заполнено.</h3>

<?php
function ol_todo_6() {
	if ( empty( $_SESSION['todo_32_6'] ) ) {
		?>
		<form action="" method="get">
			<input type="email" name="email_6">
			<input type="submit">
		</form>
		<?php

		if ( ! empty( $_GET['email_6'] ) ) {
			$_SESSION['todo_32_6'] = esc_html( $_GET['email_6'] );
		}
	}

}


ol_todo_6();
?>

<form action="" method="get">
	<input type="text"><br><br>
	<input type="text"><br><br>
	<input type="password"><br><br>
	<input type="email" value="<?php echo $_SESSION['todo_32_6']; ?>"><br><br>
	<input type="submit">
</form>