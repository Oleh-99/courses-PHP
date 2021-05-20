<section class="navigation">
	<div class="container">
		<h2>Single product</h2>
	</div>
</section>
<section class="single-product">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-7 single-photo">
				<img src="<?php echo esc_html( $page['product']['photo'] ); ?>" alt="">
			</div>
			<div class="col-md-12 col-lg-5">
				<div class="product-page-text">
					<h3 class="title">
						<?php echo esc_html( $page['product']['title'] ); ?>
					</h3>
					<div class="price">
						<?php echo esc_html( ol_get_price( $page['product']['price'] ) ); ?>
					</div>
					<p>
						<?php echo esc_html( $page['product']['description'] ); ?>
					</p>
					<div class="star star-<?php echo esc_html( $page['product']['stars'] ); ?>">
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
					</div>
					<form class="add-to-card">
						<input type="number">
						<button class="button button-cart">Add to cart</button>
						<button class="button button-product"><i class="far fa-heart"></i></button>
					</form>
				</div>
		</div>
	</div>
</section>
