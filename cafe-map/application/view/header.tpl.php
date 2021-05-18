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
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
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
							<a class="nav-link <?php echo ol_get_current( 'home' ) ?>" aria-current="page" href="?action=home">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="admin-panel/index.php">Admin sing-in</a>
						</li>
					<?php foreach ( $restaurants['page'] as $page ): ?>
						<li class="nav-item">
							<a class="nav-link <?php echo ol_get_current( 'page', $page['id'] ) ?>" href="?action=page&id=<?php echo $page['id'];?>"><?php echo ucfirst( $page['title'] );?></a>
						</li>
					<?php endforeach;?>
					</ul>
				</div>
			</div>
		</nav>
	</header>