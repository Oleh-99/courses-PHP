<?php
/**
 * Order view.
 *
 * @package Template.
 * @var array $page Page data.
 */

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
	</div>
</section>

