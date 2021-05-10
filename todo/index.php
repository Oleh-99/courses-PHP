<?php
	require 'function.php';
	session_start();

	ol_sending_data();
	ol_delete_todo();
	ol_done_todo();
	ol_edit_todo();
	ol_save_edit_todo();
	ol_update_order_todo();
	ol_exit_profile();

	if ( ! $_SESSION['login'] ) {
		header( 'Location: /todo/registr.php' );
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
	<link rel="stylesheet" href="css/jquery-ui.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
		<div class="container">
			<div class="header-inner">
				<h3>To do list</h3>
			</div>
		</div>
	</header>
	<section class="todos">
		<div class="container">
			<div class="row">
				<div class="col-3">
				<div class="add-todo-wrapper">
						<h3>Hello, <?php echo $_SESSION['login']; ?>!</h3>
						<a href="?exit_profile=1" class="exit-profile">Exit</a>
					</div>
					<div class="add-todo-wrapper">
						<h3>Add to do list</h3>
						<form action="" method="post">
							<input type="text" name="title_todo" placeholder="Title">
							<input type="text" name="category_todo" placeholder="Category">
							<input type="date" name="date_todo" value="<?php echo date( 'Y-m-d' )?>" >
							<input type="submit" name="add_todo" class="btn btn-primary" value="Create">
						</form>
					</div>
					<?php
						ol_download_category();
					?>
				</div>
				<div class="col-9 todos-inner">
					<?php
						ol_data_download();
					?>
				</div>
			</div>
		</div>	
	</section>
	<script src="lib/jquery-3.6.0.min.js"></script>
	<script src="lib/jquery-ui.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>