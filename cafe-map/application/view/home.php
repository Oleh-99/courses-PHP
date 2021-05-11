<?php foreach ( $data_db as $value ) : ?>
	<div class="cart-cafe">
		<h3><?php echo $value['name']?></h3>
		<p><?php echo $value['type']?></p>
		<div class="phone"><?php echo $value['phone']?></div>
		<div class="adress"><?php echo $value['adress']?></div>
	</div>
<?php endforeach; ?>