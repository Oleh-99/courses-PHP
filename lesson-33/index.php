<?php
ob_start();

function esc_html( $data ) {
	return htmlspecialchars( trim( $data ) );
}
?>

<h3>1. По заходу на страницу запишите в куку с именем test текст '123'. Затем обновите страницу и выведите содержимое этой куки на экран.</h3>

<?php
function ol_todo_1() {
	if ( empty( $_COOKIE['test'] ) ) {
		setcookie( 'test', '123' );
	} else {
		echo $_COOKIE['test'];
	}
}

ol_todo_1();
?>

<h3>2. Удалите куку с именем test.</h3>
<form action="" method="get">
	<input type="submit" name="button_2">
</form>

<?php
function ol_todo_2() {
	if ( ! empty( $_GET['button_2'] ) && ! empty( $_COOKIE['test'] ) ) {
		setcookie( 'test', '', time() );
	}
}

ol_todo_2();
?>

<h3>3. Сделайте счетчик посещения сайта посетителем. Каждый раз, заходя на сайт, он должен видеть надпись: 'Вы посетили наш сайт % раз!'.</h3>

<?php
function ol_todo_3() {
	$num = ++$_COOKIE['site_visits'];
	setcookie( 'site_visits', $num );
	echo 'Вы посетили наш сайт ' . $num . ' раз!';
}

ol_todo_3();
?>

<h3>4. Спросите дату рождения пользователя. При следующем заходе на сайт напишите сколько дней осталось до его дня рождения. Если сегодня день рождения пользователя - поздравьте его!</h3>

<?php
function ol_todo_4() {
	if ( empty( $_COOKIE['birthday-user'] ) ) {
		?>
		<form action="" method="get">
			<input type="date" name="date_4" id="">
			<input type="submit">
		</form>
		<?php
		if ( ! empty( $_GET['date_4'] ) ) {
			setcookie( 'birthday-user', esc_html( $_GET['date_4'] ) );
		}
	} else {
		$arr  = explode( '-', $_COOKIE['birthday-user'] );
		$days = round( strtotime( $arr[2] . '-' . $arr[1] . '-' . date( 'Y' ) ) - strtotime( date( 'd-m-Y' ) ) );
		$days = intval( $days / ( 3600 * 24 ) );
		if ( 0 === $days ) {
			echo 'Happy birthday';
			return;
		}
		if ( 0 > $days ) {
			$days += 365;
		}
		echo $days;
	}

}

ol_todo_4();
?>
