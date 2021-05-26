<?php
/**
 * Sing-in.
 *
 * @package Template.
 */

?>
<section class="sing-in-wrapper">
	<div class="container">
		<form method="post" class="checkout-form">
			<label for="login">Login</label>
			<input type="text" id="login" name="login" value="<?php echo esc_html( $_POST['login'] ); ?>">
			<label for="password">Password</label>
			<input type="password" id="password" name="password" value="<?php echo esc_html( $_POST['password'] ); ?>">
			<button type="submit" name="sing-in" class="button">Sing-in</button>
		</form>
	</div>
</section>
