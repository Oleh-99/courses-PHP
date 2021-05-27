<?php
/**
 * Single product.
 *
 * @package Template.
 * @var array $page Page data.
 */

?>
<section class="navigation">
	<div class="container">
		<h2>Shop page</h2>
	</div>
</section>
<section class="product">
	<div class="container">
		<div class="title-wrapper">
			<h2 class="title">Feature Product</h2>
		</div>
		<div class="row">
			<div class="col-md-12 col-lg-3">
				<div class="product-category">
					<h5>Price</h5>
					<div class="price-format" data-max="<?php echo esc_html( ol_get_full_max_price() ); ?>" data-min="<?php echo esc_html( ol_get_full_min_price() ); ?>"></div>
					<form method="get" class="price-form">
						<input type="hidden" name="action" value="shop">
						<input type="hidden" name="page" value="<?php echo esc_html( $_GET['page'] ); ?>">
						<input type="number" name="min-price" min="0" class="min-price" value="<?php echo ( min( ol_get_price_db( ol_view_page_product() ) ) ) ? esc_html( intval( min( ol_get_price_db( ol_view_page_product() ) ) ) ) : esc_html( ( $_GET['min-price'] ) ); ?>" placeholder="min" aria-label="min-price">
						<input type="number" name="max-price" min="0" class="max-price" value="<?php echo ( max( ol_get_price_db( ol_view_page_product() ) ) ) ? esc_html( intval( max( ol_get_price_db( ol_view_page_product() ) ) ) ) : esc_html( ( $_GET['max-price'] ) ) ; ?>" placeholder="max" aria-label="max-price">
						<button type="submit" class="sort-price">Sort</button>
					</form>
				</div>
				<div class="product-category">
					<h5>Category</h5>
					<ul class="list-category">
						<li>
							<a href="?action=shop<?php echo esc_html( ol_get_price_url() ); ?>&category=all" class="<?php echo ( ol_get_active_category( 'all' ) ) ? 'active' : ''; ?>">All</a>
						</li>
						<?php $categories = ol_get_category_db(); ?>
						<?php foreach ( $categories as $category ) : ?>
							<li>
								<a href="?action=shop<?php echo esc_html( ol_get_price_url() . '&category=' . $category ); ?>" class="<?php echo ( ol_get_active_category( $category ) ) ? 'active' : ''; ?>">
									<?php echo esc_html( $category ); ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<div class="col-md-12 col-lg-9">
				<div class="shop-tools">
					<div class="products-per-page">
						<span class="show">Show:</span>
						<a href="?action=shop<?php echo esc_html( ol_get_price_url() ); ?>&view-count=6" class="<?php echo ( ol_get_active_count_product( 6 ) ) ? 'active' : ''; ?>">6</a>
						<span>/</span>
						<a href="?action=shop<?php echo esc_html( ol_get_price_url() ); ?>&view-count=9" class="<?php echo ( ol_get_active_count_product( 9 ) ) ? 'active' : ''; ?>">9</a>
						<span>/</span>
						<a href="?action=shop<?php echo esc_html( ol_get_price_url() ); ?>&view-count=12" class="<?php echo ( ol_get_active_count_product( 12 ) ) ? 'active' : ''; ?>">12</a>
						<span>/</span>
						<a href="?action=shop<?php echo esc_html( ol_get_price_url() ); ?>&view-count=18" class="<?php echo ( ol_get_active_count_product( 18 ) ) ? 'active' : ''; ?>">18</a>
					</div>
					<div class="products-view-grid">
						<a href="?action=shop<?php echo esc_html( ol_get_price_url() ); ?>&grid-view=6" class="<?php echo ( 6 === ol_check_grid_product() ) ? 'active' : ''; ?>">
							<img src="img/grid2x2.png" alt="">
						</a>
						<a href="?action=shop<?php echo esc_html( ol_get_price_url() ); ?>&grid-view=4" class="<?php echo ( 4 === ol_check_grid_product() ) ? 'active' : ''; ?>">
							<img src="img/grid3x3.png" alt="">
						</a>
						<a href="?action=shop<?php echo esc_html( ol_get_price_url() ); ?>&grid-view=3" class="<?php echo ( 3 === ol_check_grid_product() ) ? 'active' : ''; ?>">
							<img src="img/grid4x4.png" alt="">
						</a>
					</div>
				</div>
				<div class="row">
					<?php if ( ! $page['products'] ) : ?>
						<h3 style="font-size: 30px;">Not product</h3>
					<?php endif; ?>
					<?php foreach ( $page['products'] as $product ) : ?>
						<div class="col-sm-12 col-md-6 col-lg-<?php echo esc_html( ol_check_grid_product() ); ?> product-mstore">
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
									<!--							<a href="">-->
									<!--								<i class="far fa-heart"></i>-->
									<!--							</a>-->
									<!--							<a href="#">-->
									<!--								<i class="fas fa-search-plus"></i>-->
									<!--							</a>-->
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
					<?php $count = ol_get_view_product_in_page(); ?>
					<?php if ( $count < $page['pagination'] ) : ?>
						<?php for ( $i = 0; $i < $page['pagination'] / $count; $i++ ) : ?>
							<a href="?action=shop&page=<?php echo esc_html( $i . ol_sort_price_with_pagination() ); ?>" class="<?php echo esc_html( ol_check_page( $i ) ); ?>">
								<?php echo esc_html( $i + 1 ); ?>
							</a>
						<?php endfor; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
