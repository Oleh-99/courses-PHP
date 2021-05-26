<?php
/**
 * Home admin panel.
 *
 * @package Template.
 * @var array $page Page data.
 */

?>
<section class="product-admin-wrapper">
	<div class="container">
		<?php foreach ( $page['product'] as $product ) : ?>
			<div class="product-admin">
				<div class="product-inner">
					<h4 class="title">
						<?php echo esc_html( $product['title'] ); ?>
					</h4>
					<div class="price">
						Price: <?php echo esc_html( $product['price'] ); ?>
					</div>
				</div>
				<div class="btn-group" role="group" aria-label="Basic mixed styles example">
					<a href="?action=remove&id=<?php echo esc_html( $product['id'] ); ?>" class="btn btn-danger">Remove</a>
					<a href="?action=edit&id=<?php echo esc_html( $product['id'] ); ?>" class="btn btn-warning">Edit</a>
					<a href="../index.php?action=single-product&id=<?php echo esc_html( $product['id'] ); ?>" class="btn btn-success">View</a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</section>
