<?php
/**
 * Category form.
 *
 * @package Template.
 * @var array $page Page data.
 */

?>
<section class="title-category">
	<div class="container">
		<h3 class="title">
			<?php echo esc_html( $page['btn-name'] ); ?>
		</h3>
	</div>
</section>
<section>
	<div class="container">
		<form method="post" class="checkout-form">
			<input type="hidden" name="id" value="<?php echo esc_html( $page['category']['id'] ); ?>">
			<label for="category">Category</label>
			<input type="text" id="category" name="category" value="<?php echo ( $_POST['category'] ) ? esc_html( $_POST['category'] ) : esc_html( $page['category']['category'] ); ?>">
			<button type="submit" class="button" name="category-form">
				<?php echo esc_html( $page['btn-name'] ); ?>
			</button>
		</form>
	</div>
</section>
