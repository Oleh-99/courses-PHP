<section class="add-page">
	<div class="container">
		<a href="?admin-action=add_page" class="btn btn-success">Add page</a>
	</div>
</section>
<section class="full-page">
	<div class="container">
		<?php foreach ( $restaurants['pages'] as $page ): ?>
			<div class="page-wrapper">
				<div class="title"><?php echo esc_html( $page['title'] );?></div>
				<div class="btn-group" role="group">
					<a href="../index.php?action=page&id=<?php echo esc_html( $page['id'] );?>" class="btn btn-success">View</a>
					<a href="?admin-action=delete-page&id=<?php echo esc_html( $page['id'] );?>" class="btn btn-danger">Remove</a>
					<a href="?admin-action=edit-page&id=<?php echo esc_html( $page['id'] );?>" class="btn btn-warning">Edit</a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</section>
