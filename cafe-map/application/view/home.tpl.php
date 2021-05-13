<div class="container-fluid">
	<div class="row">
		<div class="col-4">
			<?php foreach ( $restaurants['restaurants'] as $restaurant ) : ?>
				<div class="cart-cafe">
					<h3 class="title"><?php echo $restaurant['name']?></h3>
					<div class="cafe-info row">
						<div class="col-7">
							<div class="type"><?php echo $restaurant['type']?></div>
							<div class="phone">Telephone: +<?php echo $restaurant['phone']?></div>
							<div class="address">Address: <?php echo $restaurant['address']?></div>
						</div>
						<div class="col-5">
							<div class="foto-wrappper">
								<img src="<?php echo $restaurant['url_photo']?>" alt="">
							</div>
						</div>
					</div>
					<div>Графік роботи <?php echo $restaurant['time_start']?> - <?php echo $restaurant['time_end']?></div>
					<div><?php echo $restaurant['rating']?> <i class="fas fa-star"></i> <?php echo $restaurant['number_of_reviews']?> <i class="far fa-comments"></i></div>
				</div>
			<?php endforeach; ?>
			<div class="btn-group" role="group" aria-label="">
				<?php $num = 1; ?>
				<?php for ( $i = 0; $i < $restaurants['pagination']; $i += 5 ) : ?>
					<a href="?pagination=<?php echo $i; ?>" class="btn btn-danger <?php echo $i === intval( $_GET['pagination'] ) ? 'active' : ''; ?>"><?php echo $num++; ?></a>
				<?php endfor; ?>
			</div>
		</div>
		<div class="col-8"></div>
	</div>
</div>
