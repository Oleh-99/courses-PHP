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
					<a href="" class="btn btn-danger">Remove</a>
					<a href="" class="btn btn-warning">Edit</a>
					<a class="btn btn-success">View</a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</section>