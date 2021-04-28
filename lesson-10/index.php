<h3>1. Спросите имя пользователя с помощью формы. Результат запишите в переменную $name. Выведите на экран фразу 'Привет, %Имя%'.</h3>

<form action="" method="GET">
	<input type="text" name="name">
	<input type="submit">
</form>

<?php
if ( ! empty( $_REQUEST['name'] ) ) {
	$name = $_REQUEST['name'];
	echo 'Привіт ' . $name;
}
?>

<h3>2. Спросите у пользователя имя, возраст, а также попросите его ввести сообщение (его сделайте в textarea). Выведите эти данные на экран в формате, приведенном под данной задачей. Позаботьтесь о том, чтобы пользователь не мог вводить теги (просто удаляйте их) и таким образом сломать сайт.</h3>

<form action="" method="GET">
	<input type="text" name="name">
	<input type="text" name="age">
	<textarea name="text"></textarea>
	<input type="submit">
</form>

<?php
if ( ! empty( $_REQUEST['name'] ) && ! empty( $_REQUEST['age'] ) && ! empty( $_REQUEST['text'] ) ) {
	$name = $_REQUEST['name'];
	$age  = $_REQUEST['age'];
	$text = $_REQUEST['text'];
	echo 'Привет, ' . $name . ', ' . $age . ' лет. <br> Твое сообщение: ' . $text;
}
?>
