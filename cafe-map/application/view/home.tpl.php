<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<?php foreach ( $restaurants['restaurants'] as $restaurant ) : ?>
				<div class="cart-cafe">
					<h3 class="title">
						<?php echo esc_html( $restaurant['name'] ); ?>
					</h3>
					<div class="cafe-info row">
						<div class="col-7">
							<div class="type">
								<?php echo esc_html( $restaurant['type'] ); ?>
							</div>
							<div class="phone">
								Telephone:
								<?php echo esc_html( '+' . $restaurant['phone'] ); ?>
							</div>
							<div class="address" data-lat="<?php echo esc_html( $restaurant['lat'] ); ?>" data-lon="<?php echo esc_html( $restaurant['lon'] ); ?>">
								Address:
								<?php echo esc_html( $restaurant['address'] ); ?>
							</div>
						</div>
						<div class="col-5">
							<div class="foto-wrapper">
								<img src="<?php echo esc_html( $restaurant['url_photo'] ); ?>" alt="">
							</div>
						</div>
					</div>
					<div>
						Графік роботи
						<?php echo esc_html( $restaurant['time_start'] ); ?>
						-
						<?php echo esc_html( $restaurant['time_end'] ); ?>
					</div>
					<div>
						<?php echo esc_html( $restaurant['rating'] ); ?>
						<i class="fas fa-star"></i>
						<?php echo esc_html( $restaurant['number_of_reviews'] ); ?>
						<i class="far fa-comments"></i>
					</div>
					<?php if ( $_SESSION['login'] ) : ?>
						<a href="?action=<?php echo $_GET['action']?>&add-favorite=<?php echo esc_html( $restaurant['id'] ); ?>&pagination=<?php echo ol_get_click_pagination();?>" class="favorite <?php echo ol_check_favorite( $restaurants['favorite'], $restaurant['id'] ) ?>"></a>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
			<div class="btn-group" role="group" aria-label="">
				<?php $num = 1; ?>
				<?php for ( $i = 0; $i < $restaurants['pagination']; $i += 5 ) : ?>
					<a href="?pagination=<?php echo $i; ?>" class="btn btn-danger <?php echo $i === intval( $_GET['pagination'] ) ? 'active' : ''; ?>">
						<?php echo $num++; ?>
					</a>
				<?php endfor; ?>
			</div>
		</div>
		<div class="col-md-8">
			<div id="gmap"></div>
		</div
	</div>
</div>
