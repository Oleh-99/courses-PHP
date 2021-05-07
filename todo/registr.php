<?php
	require 'function.php';
	session_start();
	ol_user_initialization();
	ol_exit_profile();

	if( $_SESSION['login'] ) {
		header( 'Location: /todo/index.php' );
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<section>
		<div class="container">
			<form class="users-wrapper" method="post">
				<div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">Login</label>
					<input type="text"  class="form-control" name="user_login">
				</div>
				<div class="mb-3">
					<label for="exampleInputPassword1" class="form-label">Password</label>
					<input type="password" class="form-control" name="user_password">
				</div>
				<input type="submit" name="log_in" value="Log In" class="btn btn-primary">
				<input type="submit" name="sing_up" value="Sing up" class="btn btn-primary">
			</form>
		</div>
	</section>
</body>
</html>