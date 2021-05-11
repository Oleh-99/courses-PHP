<div class="container-fluid">
	<div class="row">
		<div class="col-4">
			<?php foreach ( $restaurants as $restaurant ) : ?>
				<div class="cart-cafe">
					<h3 class="title"><?php echo $restaurant['name']?></h3>
					<div class="cafe-info row">
						<div class="col-7">
							<div class="type"><?php echo $restaurant['type']?></div>
							<div class="phone">Telephone: +<?php echo $restaurant['phone']?></div>
							<div class="adress">Adress: <?php echo $restaurant['adress']?></div>
						</div>
						<div class="col-5">
							<div class="foto-wrappper">
								<img src="<?php echo $restaurant['url_foto']?>" alt="">
							</div>
						</div>
					</div>
					<div>Графік роботи <?php echo $restaurant['time_start']?> - <?php echo $restaurant['time_end']?></div>
					<div><?php echo $restaurant['rating']?> <i class="fas fa-star"></i> <?php echo $restaurant['number of reviews']?> <i class="far fa-comments"></i></div>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="col-8"></div>
	</div>
</div>
