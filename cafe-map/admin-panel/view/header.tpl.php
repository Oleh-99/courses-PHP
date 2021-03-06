<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<header class="main-header">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">Navbar</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="../index.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php echo esc_html( ol_get_current( 'admin' ) ); ?>" href="index.php">Admin page</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php echo esc_html( ol_get_current( 'page' ) ); ?>" href="?admin-action=page">Page</a>
						</li>
					</ul>
					<div class="initialization-user">
						<?php if ( $_SESSION['login'] ) : ?>
							<?php echo 'Hello, ' . esc_html( ucfirst( $_SESSION['login'] ) ); ?>
							<a href="?admin-action=exit" class="btn btn-danger exit">Exit</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</nav>
	</header>