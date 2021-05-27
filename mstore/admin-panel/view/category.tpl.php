<?php
/**
 * Category.
 *
 * @package Template.
 * @var array $page Page data.
 */

?>
<section class="product-admin-wrapper">
	<div class="container">
		<a href="?action=add-category" class="button add-category">Add category</a>
		<?php if ( ! $page['category'] ) : ?>
			<h4 class="title">Not category</h4>
		<?php endif; ?>
		<?php foreach ( $page['category'] as $product ) : ?>
			<div class="product-admin">
				<div class="product-inner">
					<h4 class="title">
						<?php echo esc_html( $product['category'] ); ?>
					</h4>
				</div>
				<div class="btn-group" role="group">
					<a href="?action=category&remove-category=<?php echo esc_html( $product['id'] ); ?>" class="btn btn-danger">Remove</a>
					<a href="?action=edit-category&id=<?php echo esc_html( $product['id'] ); ?>" class="btn btn-warning">Edit</a>
					<a href="../index.php?action=single-product&id=<?php echo esc_html( $product['id'] ); ?>" class="btn btn-success">View</a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</section>
