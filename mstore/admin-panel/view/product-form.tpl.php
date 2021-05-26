<?php
/**
 * Product form.
 *
 * @package Template.
 * @var array $page Page data.
 */

?>
<section>
	<div class="container">
		<form method="post" class="checkout-form" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo esc_html( $page['product']['id'] ); ?>">
			<input type="hidden" name="photo" value="<?php echo esc_html( $page['product']['photo'] ); ?>">
			<label for="title">Title<span>*</span></label>
			<input type="text" name="title" id="title" value="<?php echo ( $_POST['title'] ) ? esc_html( $_POST['title'] ) : esc_html( $page['product']['title'] ); ?>">
			<label for="description">Description<span>*</span></label>
			<textarea name="description" id="description" rows="5">
				<?php echo ( $_POST['description'] ) ? esc_html( $_POST['description'] ) : esc_html( $page['product']['description'] ); ?>
			</textarea>
			<label for="price">Price<span>*</span></label>
			<input type="text" name="price" id="price" value="<?php echo ( $_POST['price'] ) ? esc_html( $_POST['price'] ) : esc_html( $page['product']['price'] ); ?>">
			<label for="label">Label</label>
			<select name="label" id="label">
				<option <?php echo ( '' === $page['product']['label'] ) ? 'selected' : ''; ?>></option>
				<option <?php echo ( 'hot' === $page['product']['label'] ) ? 'selected' : ''; ?>>hot</option>
				<option <?php echo ( 'new' === $page['product']['label'] ) ? 'selected' : ''; ?>>new</option>
				<option <?php echo ( 'sale' === $page['product']['label'] ) ? 'selected' : ''; ?>>sale</option>
			</select>
			<label for="stars">Stars</label>
			<input type="number" id="stars" name="stars" value="<?php echo ( $_POST['stars'] ) ? esc_html( $_POST['stars'] ) : esc_html( $page['product']['stars'] ); ?>">
			<label for="file">Photo product<span>*</span></label>
			<input type="file" id="file" name="uploaded_file" accept="image/jpeg,image/png"><br>
			<button type="submit" class="button" name="btn-product">
				<?php echo esc_html( $page['btn-name'] ); ?>
			</button>
		</form>
	</div>
</section>
