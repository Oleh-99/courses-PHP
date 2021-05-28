<?php
/**
 * Order view.
 *
 * @package Template.
 * @var array $page Page data.
 */

$cart_user = unserialize( $page['order']['card'] );
?>

<section>
	<div class="container">
		<table class="orders-table">
			<thead>
			<tr>
				<th>№</th>
				<th>Name</th>
				<th>Price</th>
				<th>Address</th>
				<th>Telephone</th>
				<th>Email</th>
			</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<?php echo esc_html( $page['order']['id'] ); ?>
					</td>
					<td>
						<?php echo esc_html( $page['order']['name'] . ' ' . $page['order']['last_name'] ); ?>
					</td>
					<td>
						<?php echo esc_html( $page['order']['price'] ); ?>
					</td>
					<td>
						<?php echo esc_html( $page['order']['country'] . ', ' . $page['order']['city'] . ', ' . $page['order']['address'] ); ?>
					</td>
					<td>
						<?php echo esc_html( $page['order']['phone'] ); ?>
					</td>
					<td>
						<?php echo esc_html( $page['order']['email'] ); ?>
					</td>
				</tr>
			</tbody>
		</table>
		<h4 class="order-title">Orders</h4>
		<table class="order-product">
			<thead>
				<tr>
					<th>№</th>
					<th>Title</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Subtotal</th>
				</tr>
			</thead>
			<?php foreach ( ol_get_product_user( $cart_user ) as $product ) : ?>
				<?php $count = ol_get_product_count( $cart_user, $product['id'] ); ?>
				<tr>
					<td>
						<?php echo esc_html( $product['id'] ); ?>
					</td>
					<td>
						<?php echo esc_html( $product['title'] ); ?>
					</td>
					<td>
						<?php echo esc_html( $product['price'] ); ?>
					</td>
					<td>
						<?php echo esc_html( $count ); ?>
					</td>
					<td>
						<?php echo esc_html( $count * $product['price'] ); ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
</section>

