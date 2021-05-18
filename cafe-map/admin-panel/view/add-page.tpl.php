<section>
	<div class="container">
		<form method="post">
			<?php foreach ( $restaurants['edit'] as $value ): ?>
				<input type="hidden" name="page_id" value="<?php echo $value['id']?>">
				<label for="page_name">Title</label>
				<input type="text" id="page_name" name="page_name" placeholder="Title" value="<?php echo $value['title']?>">
				<label for="content">Content</label>
				<textarea id="content" name="page_content"><?php echo $value['content']?></textarea>
				<button type="submit" name="create_page" class="btn btn-warning"><?php echo $restaurants['btn-name']?></button>
			<?php endforeach; ?>
		</form>
	</div>
</section>

<script src="../lib/jquery-3.6.0.min.js"></script>
<script src="../lib/tinymce.min.js"></script>
<script src="../js/main.js"></script>
