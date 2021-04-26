<h1>Работа с foreach</h1>
<h3>Дан массив с элементами 'html', 'css', 'php', 'js', 'jq'. С помощью цикла foreach выведите эти слова в столбик.</h3>

<?php
	function ol_todo_1() {
		$arr = ['html', 'css', 'php', 'js', 'jq'];
		foreach ($arr as &$value) {
			echo $value;
		}
	}

?>