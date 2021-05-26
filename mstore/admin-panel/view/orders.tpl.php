<?php
/**
 * Orders.
 *
 * @package Template.
 * @var array $page Page data.
 */

?>
<section class="admin-orders">
	<div class="container">
		<table class="orders-table">
			<thead>
				<tr>
					<th>№</th>
					<th>Name</th>
					<th>Price</th>
					<th>Address</th>
					<th>Telephone</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ( $page['orders'] as $orders ) : ?>
					<tr>
						<td>
							<?php echo esc_html( $orders['id'] ); ?>
						</td>
						<td>
							<?php echo esc_html( $orders['name'] . ' ' . $orders['last_name'] ); ?>
						</td>
						<td>
							<?php echo esc_html( $orders['price'] ); ?>
						</td>
						<td>
							<?php echo esc_html( $orders['country'] . ', ' . $orders['city'] . ', ' . $orders['address'] ); ?>
						</td>
						<td>
							<?php echo esc_html( $orders['phone'] ); ?>
						</td>
						<td>
							<a href="?action=view-order&id=<?php echo esc_html( $orders['id'] ); ?>" class="button">View order</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</section>
