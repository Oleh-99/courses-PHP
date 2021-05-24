<?php
/**
 * Header.
 *
 * @package Template.
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://use.fontawesome.com/24f5e681bf.js"></script>
	<title>Document</title>
</head>
<body>
<header>
	<div class="top-bar">
		<div class="container">
			<div class="tel">
				(+84).898.058.000 <span>|</span> min101092@gmail.com
			</div>
			<div class="lang">
				Language: <strong>ENG</strong> <span>|</span> Currency: <strong>USD</strong>
			</div>
		</div>
	</div>
	<div class="bottom-bar">
		<div class="container">
			<div class="logo"><a href="?action=home"><img src="img/Logo.png" alt=""></a></div>
			<ul class="menu">
				<li><a href="?action=home">Home</a></li>
				<li><a href="?action=shop">Shop</a></li>
				<li><a href="admin-panel/index.php">Admin panel</a></li>
				<li><a href="#">Accessories <i class="fas fa-sort-down"></i></a>
					<ul class="dropdown">
						<li><a href="#">Item 1</a></li>
						<li><a href="#">Item 2</a></li>
						<li><a href="#">Item 3 <i class="fas fa-caret-right"></i></a>
							<ul class="dropdown">
								<li><a href="#">Item 1</a></li>
								<li><a href="#">Item 2 <i class="fas fa-caret-right"></i></a>
									<ul class="dropdown">
										<li><a href="#">Item 1</a></li>
										<li><a href="#">Item 2</a></li>
										<li><a href="#">Item 3</a></li>
										<li><a href="#">Item 4</a></li>
										<li><a href="#">Item 5</a></li>
									</ul>
								</li>
								<li><a href="#">Item 3</a></li>
								<li><a href="#">Item 4</a></li>
								<li><a href="#">Item 5</a></li>
							</ul>
						</li>
						<li><a href="#">Item 4</a></li>
						<li><a href="#">Item 5</a></li>
					</ul>
				</li>
				<li><a href="#">Contact</a></li>
			</ul>
			<div class="icon-header">
				<a href="#"><i class="fas fa-search"></i></a>
				<a href="#"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
				<a href="#"><i class="far fa-heart"></i></a>
				<div class="cart">
					<span>
						<i class="fa fa-shopping-basket" aria-hidden="true"></i>
						<span class="numbers-cart">
							<?php echo esc_html( ol_get_check_card() ); ?>
						</span>
					</span>
					<span>
						$<?php echo esc_html( ol_sum_product() ); ?>
					</span>
					<ul class="cart-view">
						<?php $products = ol_get_product_with_card(); ?>
						<?php if ( $products ) : ?>
							<?php foreach ( $products as $product ) : ?>
								<li class="product-cart">
									<img src="<?php echo esc_html( $product['photo'] ); ?>" alt="">
									<div class="product-cart-wrapper">
										<h5>
											<a href="">
												<?php echo esc_html( $product['title'] ); ?>
											</a>
										</h5>
										<div class="price">
											<?php echo esc_html( '$' . ol_get_price( $product['price'] ) ); ?>
											<?php if ( $product['count'] ) : ?>
												<span class="count">
													<?php echo esc_html( ++$product['count'] ); ?>
												</span>
											<?php endif; ?>
										</div>
									</div>
									<a href="?action=single-product&id=<?php echo esc_html( $product['id'] ); ?>" class="link-full"></a>
									<a href="?action=<?php echo esc_html( $_GET['action'] ) . '&id=' . esc_html( $product['id'] ) . '&remove-card=' . esc_html( $product['id'] . ol_view_link_page() ); ?>" class="remove-product">
										<i class="fas fa-times"></i>
									</a>
								</li>
							<?php endforeach; ?>
								<li class="view-card-wrapper">
									<a href="?action=view-card" class="button">View card</a>
								</li>
						<?php else : ?>
							<h4 class="not-product">Not product</h4>
						<?php endif; ?>
					</ul>
				</div>
			</div>
			<div class="burger-wrapper">
				<button class="burger"><i class="fas fa-bars"></i></button>
			</div>
		</div>
	</div>
</header>
