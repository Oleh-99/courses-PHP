<section class="navigation">
	<div class="container">
		<h2>Shop page</h2>
	</div>
</section>
<section class="product">
	<div class="container">
		<div class="title-wrapper">
			<h2 class="title">Feauture Product</h2>
			<a href="#">All Product</a>
		</div>
		<div class="row">
			<?php foreach ( $page['products'] as $product ) : ?>
				<div class="col-sm-12 col-md-6 col-lg-4">
					<div class="product-foto">
						<img src="<?php echo esc_html( $product['photo'] ); ?>" alt="">
						<a href="?action=single-product&id=<?php echo esc_html( $product['id'] ); ?>"></a>
						<?php if ( $product['label'] ) : ?>
							<div class="product-banner <?php echo esc_html( $product['label'] ); ?>">
								<?php echo esc_html( $product['label'] ); ?>
							</div>
						<?php endif; ?>
						<div class="product-hover">
							<a href="?action=shop&add-card=<?php echo esc_html( $product['id'] . ol_view_link_page() ); ?>">
								<i class="fa fa-shopping-basket" aria-hidden="true"></i>
							</a>
							<a href="?action=shop&add-favorite=<?php echo esc_html( $product['id'] . ol_view_link_page() ); ?>">
								<i class="far fa-heart"></i>
							</a>
							<a href="#">
								<i class="fas fa-search-plus"></i>
							</a>
						</div>
					</div>
					<div class="product-text">
						<h5>
							<a href="?action=single-product&id=<?php echo esc_html( $product['id'] ); ?>">
								<?php echo esc_html( $product['title'] ); ?>
							</a>
						</h5>
						<div class="price-wrapper">
							<div class="price">
								$<?php echo esc_html( ol_get_price( $product['price'] ) ); ?>
							</div>
							<div class="star star-<?php echo esc_html( $product['stars'] ); ?>">
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="page-numbers">
			<?php for ( $i = 0; $i <= $page['pagination'] / 9; $i++ ) : ?>
				<a href="?action=shop&page=<?php echo esc_html( $i ); ?>" class="<?php echo esc_html( ol_check_page( $i ) ); ?>">
					<?php echo esc_html( $i + 1 ); ?>
				</a>
			<?php endfor; ?>
		</div>
	</div>
</section>
