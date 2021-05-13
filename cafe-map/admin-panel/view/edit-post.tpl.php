<section>
	<div class="container">
		<form action="" method="post" enctype = "multipart/form-data">
			<?php foreach ( $restaurants['restaurant'] as $value ): ?>
				<input type="hidden" name="edit_id" value="<?php echo $value['id'] ?>">
				<label for="edit_name">Назва</label>
				<input type="text" id="edit_name" name="edit_name" placeholder="Name" value="<?php echo $value['name']; ?>">
				<label for="edit_type">Тип</label>
				<input type="text" id="edit_type" name="edit_type" placeholder="Type" value="<?php echo $value['type']; ?>">
				<label for="edit_phone">Телефон</label>
				<input type="tel" id="edit_phone" name="edit_phone" placeholder="Telephone" value="<?php echo $value['phone']; ?>">
				<label for="edit_address">Адреса</label>
				<input type="text" id="edit_address" name="edit_address" placeholder="address" value="<?php echo $value['address']; ?>">
				<label for="edit_rating">Рейтинг</label>
				<input type="text" id="edit_rating" name="edit_rating" placeholder="Rating" value="<?php echo $value['rating']; ?>">
				<label for="edit_reviews">Коментарі</label>
				<input type="number" id="edit_reviews" name="edit_reviews" placeholder="Number of reviews" value="<?php echo $value['number_of_reviews']; ?>"><br>
				<label>Години роботи </label><br>
				<label for="edit_start_time">Від</label>
				<input type="time" id="edit_start_time" name="edit_start_time" value="<?php echo $value['time_start']; ?>">
				<label for="edit_end_time">До</label>
				<input type="time" id="edit_end_time" name="edit_end_time" value="<?php echo $value['time_end']; ?>"><br>
				<input type="file" name="uploadedFile" accept="image/jpeg,image/png"><br><br>
				<button type="submit" name="edit_post" class="btn btn-warning" aria-label="Edit">Edit</button>
			<?php endforeach; ?>
		</form>
	</div>
</section>
