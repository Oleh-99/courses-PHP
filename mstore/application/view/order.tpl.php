<?php
/**
 * Order.
 *
 * @package Template.
 * @var array $page Page data.
 */

?>

<section class="navigation">
	<div class="container">
		<h2>Order complete</h2>
	</div>
</section>
<section class="orders-wrapper">
	<div class="container">
		<table class="orders">
			<thead>
			<tr>
				<th class="table-title">Product</th>
				<th class="table-number">Quantity</th>
				<th class="table-price">Total</th>
			</tr>
			</thead>
			<tbody>
				<?php foreach ( $page['product'] as $product ) : ?>
				<tr>
					<td>
						<a href="?action=single-product&id=<?php echo esc_html( $product['id'] ); ?>">
							<?php echo esc_html( $product['title'] ); ?>
						</a>
					</td>
					<td>
						×<?php echo esc_html( ++$product['count'] ); ?>
					</td>
					<td>
						$<?php echo esc_html( ol_get_price( $product['price'] * $product['count'] ) ); ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
			<tfoot>
				<tr>
					<th>Total:</th>
					<th></th>
					<th>
						$<?php echo esc_html( ol_sum_product() ); ?>
					</th>
				</tr>
			</tfoot>
		</table>
		<div class="order-link">
			<a href="?action=home" class="button">Home</a>
		</div>
	</div>
</section>
