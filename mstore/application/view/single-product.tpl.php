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
		<h2>Single product</h2>
	</div>
</section>
<section class="single-product">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-7 single-photo">
				<?php if ( $page['product']['sale'] ) : ?>
					<div class="product-sale-label">
						-<?php echo esc_html( ol_get_sale_interest( $page['product']['price'], $page['product']['sale'] ) ); ?>%
					</div>
				<?php endif; ?>
				<img src="<?php echo esc_html( $page['product']['photo'] ); ?>" alt="alt">
			</div>
			<div class="col-md-12 col-lg-5">
				<div class="product-page-text">
					<h3 class="title">
						<?php echo esc_html( $page['product']['title'] ); ?>
					</h3>
					<div class="category">Category:
						<a href="?action=shop&category=<?php echo esc_html( $page['product']['category'] ); ?>">
							<?php echo esc_html( $page['product']['category'] ); ?>
						</a>
					</div>
					<div class="price">
						<?php if ( $page['product']['sale'] ) : ?>
							<span class="single-old-price">
								$ <?php echo esc_html( ol_get_price( $page['product']['price'] ) ); ?>
							</span>
							<span>
								$ <?php echo esc_html( ol_get_price( $page['product']['sale'] ) ); ?>
							</span>
						<?php else : ?>
							$ <?php echo esc_html( ol_get_price( $page['product']['price'] ) ); ?>
						<?php endif; ?>
					</div>
					<p>
						<?php echo esc_html( $page['product']['description'] ); ?>
					</p>
					<div class="rating-product">
						<span style="width: <?php echo esc_html( ol_get_stars_product( $page['product']['AVG(stars)'] ) ); ?>%"></span>
					</div>
					<form method="get" class="add-to-card" >
						<input type="hidden" name="action" value="single-product">
						<input type="hidden" name="id" value="<?php echo esc_html( $page['product']['id'] ); ?>">
						<span class="number-product">
							<span class="num-min">-</span>
							<input type="number" class="input-number" aria-label="numbers" name="numbers" value="<?php echo esc_html( ol_get_count_product( $page['product']['id'] ) ); ?>">
							<span class="num-plus">+</span>
						</span>
						<button type="submit" class="button button-cart">Add to cart</button>
						<button class="button button-product"><i class="far fa-heart"></i></button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="product-comment">
	<div class="container">
		<h3 class="title">Review
			<span>
				(<?php echo count( $page['comment'] ); ?>)
			</span>
		</h3>
		<div class="row">
			<div class="col-md-12 col-lg-6">
				<?php if ( $page['comment'] ) : ?>
					<?php foreach ( $page['comment'] as $user_comment ) : ?>
						<div class="single-comment">
							<div class="comm-title-wrapper">
								<div>
									<div class="comm-name">
										<?php echo esc_html( ucfirst( $user_comment['name'] ) ); ?>
									</div>

									<div class="rating-product">
										<span style="width: <?php echo esc_html( ol_get_stars_product( $user_comment['stars'] ) ); ?>%"></span>
									</div>
								</div>
								<div class="comm-date">
									<?php echo esc_html( date( 'F j, Y', strtotime( $user_comment['date'] ) ) ); ?>
								</div>
							</div>
							<div class="comm-rewires">
								<p>
									<?php echo esc_html( $user_comment['description'] ); ?>
								</p>
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
			<div class="col-md-12 col-lg-6">
				<form method="post" class="checkout-form">
					<input type="hidden" name="id" value="<?php echo esc_html( $page['product']['id'] ); ?>">
					<label for="user-name">Your name<span>*</span></label>
					<input type="text" id="user-name" name="comm-name" placeholder="Your name" value="<?php echo esc_html( $_POST['comm-name'] ); ?>">
					<label for="description">Your review<span>*</span></label>
					<textarea name="comm-description" id="description" rows="5" placeholder="Your review"><?php echo esc_html( $_POST['comm-description']); ?></textarea>
					<label for="rating">Your rating<span>*</span></label>
					<input type="text" name="comm-rating" id="rating" min="0" max="5" placeholder="Your rating" value="<?php echo esc_html( $_POST['comm-rating']); ?>">
					<button type="submit" class="button" name="add-comment">Add comment</button>
				</form>
			</div>
		</div>
	</div>
</section>
