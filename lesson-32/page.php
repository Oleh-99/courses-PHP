<?php
session_start();
ob_start();

if ( ! empty( $_SESSION['todo_32_2'] ) ) {
	echo $_SESSION['todo_32_2'];
}
if ( ! empty( $_SESSION['todo_32_4'] ) ) {
	echo $_SESSION['todo_32_4'];
}
