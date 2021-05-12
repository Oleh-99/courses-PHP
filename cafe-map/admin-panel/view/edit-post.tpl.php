<section>
	<div class="container">
		<form action="?admin-action" method="post" enctype = "multipart/form-data">
			<?php foreach ( $restaurant as $value ): ?>
				<input type="hidden" name="edit_id" value="<?php echo $value['id'] ?>">
				<label>Назва</label>
				<input type="text" name="edit_name" placeholder="Name" value="<?php echo $value['name']; ?>">
				<label>Тип</label>
				<input type="text" name="edit_type" placeholder="Type" value="<?php echo $value['type']; ?>">
				<label>Телефон</label>
				<input type="tel" name="edit_phone" placeholder="Telephone" value="<?php echo $value['phone']; ?>">
				<label>Адреса</label>
				<input type="text" name="edit_adress" placeholder="Adress" value="<?php echo $value['adress']; ?>">
				<label>Рейтинг</label>
				<input type="numbers" name="edit_rating" placeholder="Rating" value="<?php echo $value['rating']; ?>">
				<label>Коментарі</label>
				<input type="numbers" name="edit_reviews" placeholder="Number of reviews" value="<?php echo $value['number_of_reviews']; ?>"><br>
				<label>Години роботи </label><br>
				<label>Від</label>
				<input type="time" name="edit_start_time" value="<?php echo $value['time_start']; ?>">
				<label>До</label>
				<input type="time" name="edit_end_time" value="<?php echo $value['time_end']; ?>"><br>
				<input type="file" name="edit_file" accept="image/jpeg,image/png"><br><br>
				<input type="submit" value="Edit">
			<?php endforeach; ?>
		</form>
	</div>
</section>
