<?php
	require 'function.php';

	ol_sending_data();
	ol_delete_todo();
	ol_done_todo();
	ol_edit_todo();
	ol_save_edit_todo();
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
	<link rel="stylesheet" href="css/bootstrap.css">
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
	<section class="add-todo">
		<div class="container">
			<div class="add-todo-wrapper">
				<h3>Add to do list</h3>
				<form action="" method="get">
					<input type="text" name="title_todo" placeholder="Title" value=>
					<textarea name="text_todo" cols="30" rows="5" placeholder="Description"></textarea>
					<input type="submit" class="btn btn-primary" value="Create">
					<input type="date" name="date_todo" value="<?php echo date( 'Y-m-d' )?>" >
				</form>
			</div>
		</div>
	</section>
	<section class="todos">
		<div class="container">
			<?php
				ol_data_download();
			?>
		</div>	
	</section>
</body>
</html>