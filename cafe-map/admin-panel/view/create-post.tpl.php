<section>
	<div class="container">
		<form action="?admin-action" method="post" enctype = "multipart/form-data">
			<input type="text" name="name" placeholder="Name">
			<input type="text" name="type" placeholder="Type">
			<input type="tel" name="phone" placeholder="Telephone">
			<input type="text" name="adress" placeholder="Adress">
			<label>Години роботи </label><br>
			<label>Від</label>
			<input type="time" name="start_time">
			<label>До</label>
			<input type="time" name="end_time"><br>
			<input type="file" name="file" accept="image/jpeg,image/png"><br><br>
			<input type="submit" value="Create">
		</form>
	</div>
</section>
