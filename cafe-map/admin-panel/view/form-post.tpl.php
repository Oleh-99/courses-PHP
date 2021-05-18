<section>
	<div class="container">
		<form action="" method="post" enctype = "multipart/form-data">
			<?php foreach ( $restaurants['restaurant'] as $value ): ?>
				<input type="hidden" name="id" value="<?php echo esc_html( $value['id'] ); ?>">
				<label for="name">Назва *</label>
				<input type="text" id="name" name="name" placeholder="Name" value="<?php echo esc_html( $value['name'] ); ?>">
				<label for="type">Тип *</label>
				<input type="text" id="type" name="type" placeholder="Type" value="<?php echo esc_html( $value['type'] ); ?>">
				<label for="phone">Телефон *</label>
				<input type="tel" id="phone" name="phone" placeholder="Telephone" value="<?php echo esc_html( $value['phone'] ); ?>">
				<label for="address">Адреса *</label>
				<input type="text" id="address" name="address" placeholder="Address" value="<?php echo esc_html( $value['address'] ); ?>">
                <label for="lat">Latitude</label>
                <input type="text" id="lat" name="lat" value="<?php echo esc_html( $value['lat'] ); ?>" placeholder="Latitude">
                <label for="lon">Longitude</label>
                <input type="text" id="lon" name="lon" value="<?php echo esc_html( $value['lon'] ); ?>" placeholder="Longitude">
				<label for="rating">Рейтинг</label>
				<input type="text" id="rating" name="rating" placeholder="Rating" value="<?php echo esc_html( $value['rating'] ); ?>">
				<label for="reviews">Коментарі</label>
				<input type="number" id="reviews" name="reviews" placeholder="Number of reviews" value="<?php echo esc_html( $value['number_of_reviews'] ); ?>"><br>
				<label>Години роботи *</label><br>
				<label for="start_time">Від</label>
				<input type="time" id="start_time" name="start_time" value="<?php echo esc_html( $value['time_start'] ); ?>">
				<label for="end_time">До</label>
				<input type="time" id="end_time" name="end_time" value="<?php echo esc_html( $value['time_end'] ); ?>"><br>
				<input type="file" name="uploaded_file" accept="image/jpeg,image/png"><br><br>
				<button type="submit" name="btn_post" class="btn btn-warning" aria-label="<?php echo esc_html( $restaurants['btn-name'] ); ?>"><?php echo esc_html( $restaurants['btn-name'] ); ?></button>
			<?php endforeach; ?>
		</form>
	</div>
</section>
