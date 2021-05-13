<section>
	<div class="container">
		<form action="" method="post" enctype="multipart/form-data">
			<label for="name">Name</label>
			<input type="text" id="name" name="name" placeholder="Name">
			<label for="type">Type</label>
			<input type="text" id="type" name="type" placeholder="Type">
			<label for="phone">Telephone</label>
			<input type="tel" id="phone" name="phone" placeholder="Telephone">
			<label for="address">Address</label>
			<input type="text" id="address" name="address" placeholder="Address">
			<label for="start_time">Години роботи </label><br>
			<label for="start_time">Від</label>
			<input type="time" id="start_time" name="start_time">
			<label for="end_time">До</label>
			<input type="time" id="end_time" name="end_time"><br>
			<label for="rating">Рейтинг</label>
			<input type="text" id="rating" name="rating" placeholder="Rating">
			<label for="reviews">Коментарі</label>
			<input type="number" id="reviews" name="reviews" placeholder="Number of reviews"><br>
			<input type="file" name="uploadedFile" accept="image/jpeg,image/png"><br><br>
			<button type="submit" name="add_post" class="btn btn-warning" aria-label="Create">Create</button>
		</form>
	</div>
</section>
