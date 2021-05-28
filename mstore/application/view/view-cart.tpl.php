<?php
/**
 * View product.
 *
 * @package Template.
 * @var array $page Page data.
 */

?>
<section class="navigation">
	<div class="container">
		<h2>View card</h2>
	</div>
</section>
<section class="view-card">
	<div class="container">
		<?php if ( $page['card'] ) : ?>
			<form method="post">
				<table class="card-product-wrapper">
					<thead>
					<tr>
						<th class="product-remove"></th>
						<th class="product-photo"></th>
						<th class="product-name">Product</th>
						<th class="product-price">Price</th>
						<th class="product-quantity">Quantity</th>
						<th class="product-subtotal">Subtotal</th>
					</tr>
					</thead>
					<tbody>
						<?php foreach ( $page['card'] as $product ) : ?>
							<tr>
								<th class="product-remove">
									<a href="?action=<?php echo esc_html( $_GET['action'] ) . '&id=' . esc_html( $product['id'] ) . '&remove-card=' . esc_html( $product['id'] . ol_view_link_page() ); ?>" class="remove-product">
										<i class="fas fa-times"></i>
									</a>
								</th>
								<th class="product-photo">
									<img src="<?php echo esc_html( $product['photo'] ); ?>" alt="">
								</th>
								<th class="product-name">
									<h3 class="title">
										<a href="?action=single-product&id=<?php echo esc_html( $product['id'] ); ?>">
											<?php echo esc_html( $product['title'] ); ?>
										</a>
									</h3>
								</th>
								<th class="product-price">
									<?php if ( $product['sale'] ) : ?>
										<?php $price = esc_html( $product['sale'] ); ?>
										<?php echo esc_html( '$' . ol_get_price( $product['sale'] ) ); ?>
									<?php else : ?>
										<?php $price = esc_html( $product['price'] ); ?>
										<?php echo esc_html( '$' . ol_get_price( $product['price'] ) ); ?>
									<?php endif; ?>
								</th>
								<th class="product-quantity">
									<span class="number-product">
										<span class="num-min">-</span>
										<input type="number" class="input-number" aria-label="numbers" name="cart_numbers[<?php echo esc_html( $product['id'] ); ?>]" value="<?php echo esc_html( ol_get_count_product( $product['id'] ) ); ?>">
										<span class="num-plus">+</span>
									</span>
								</th>
								<th class="product-subtotal">
									<?php $subtotal = $price * ( ol_get_count_product( $product['id'] ) ); ?>
									<?php echo esc_html( '$' . ol_get_price( $subtotal ) ); ?>
								</th>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			<div class="subtotal">
				<button type="submit" class="button update-card">Update-cart</button>
				Total:
				<span>
					$<?php echo esc_html( ol_sum_product() ); ?>
				</span>
			</div>
		</form>
		<div class="btn-wrapper">
			<a href="?action=checkout" class="button checkout">Checkout</a>
		</div>
		<?php else : ?>
			<div class="not-product-card">
				<h3 class="title">Not product</h3>
			</div>
		<?php endif; ?>
	</div>
</section>
