<?php
/**
 * Checkout.
 *
 * @package Template.
 */

?>
<section class="navigation">
	<div class="container">
		<h2>View card</h2>
	</div>
</section>
<section class="checkout-form">
	<div class="container">
		<form method="post" >
			<div class="row">
				<div class="col-6">
					<label for="name">Name<span>*</span></label>
					<input type="text" id="name" name="name" value="<?php echo esc_html( ol_view_user_data( 'name' ) ); ?>" placeholder="Name">
				</div>
				<div class="col-6">
					<label for="last-name">Last name<span>*</span></label>
					<input type="text" id="last-name" name="last-name" value="<?php echo esc_html( ol_view_user_data( 'last-name' ) ); ?>" placeholder="Last name">
				</div>
			</div>
			<label for="country">Country<span>*</span></label>
			<input type="text" id="country" name="country" value="<?php echo esc_html( ol_view_user_data( 'country' ) ); ?>" placeholder="Country">
			<label for="city">City<span>*</span></label>
			<input type="text" id="city" name="city" value="<?php echo esc_html( ol_view_user_data( 'city' ) ); ?>" placeholder="City">
			<label for="address">Address<span>*</span></label>
			<input type="text" id="address" name="address" value="<?php echo esc_html( ol_view_user_data( 'address' ) ); ?>" placeholder="address">
			<label for="zip">ZIP<span>*</span></label>
			<input type="text" id="zip" name="zip" value="<?php echo esc_html( ol_view_user_data( 'zip' ) ); ?>" placeholder="ZIP">
			<label for="phone">Telephone<span>*</span></label>
			<input type="tel" id="phone" name="phone" value="<?php echo esc_html( ol_view_user_data( 'phone' ) ); ?>" placeholder="Telephone">
			<label for="email">Email<span>*</span></label>
			<input type="tel" id="email" name="email" value="<?php echo esc_html( ol_view_user_data( 'email' ) ); ?>" placeholder="Email">
			<button type="submit" name="checkout" class="button">Place order</button>
		</form>
	</div>
</section>
