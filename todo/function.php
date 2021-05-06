<?php
require 'mixin.php';

$dbh = new PDO( 'mysql:host=192.168.1.116;dbname=courses', 'cours', 'cours' );
/**
 * Ol_sending_data
 * sends data to the database
 */
function ol_sending_data() {
	if ( empty( $_POST['title_todo'] ) || empty( $_POST['date_todo'] ) || empty( $_POST['category_todo'] ) ) {
		if ( ! empty( $_POST['add_todo'] ) ) {
			if ( empty( $_POST['title_todo'] ) ) {
				?>
				<div class="info-error">
					<div class="alert alert-danger" role="alert">Введіть назву</div>
				</div>
				<?php
			}
			if ( empty( $_POST['category_todo'] ) ) {
				?>
					<div class="info-error">
						<div class="alert alert-danger" role="alert">Введіть категорію</div>
					</div>
					<?php
			}
			if ( empty( $_POST['date_todo'] ) ) {
				?>
				<div class="info-error">
					<div class="alert alert-danger" role="alert">Введіть дату</div>
				</div> 
				<?php
			}
		}
		return;
	}

	$title_todo    = esc_html( $_POST['title_todo'] );
	$category_todo = esc_html( $_POST['category_todo'] );
	$date_todo     = esc_html( $_POST['date_todo'] );

	global $dbh;
	$stmt = $dbh->prepare( 'INSERT INTO todo ( name, category, date, done ) VALUES ( :name, :category, :date, 0 )' );
	$stmt->bindParam( ':name', $title_todo );
	$stmt->bindParam( ':category', $category_todo );
	$stmt->bindParam( ':date', $date_todo );
	$stmt->execute();

	header( 'Location: /todo/index.php' );
}

/**
 * Ol_data_download
 *
 * Download data from the database
 */
function ol_data_download() {
	global $dbh;
	$category = '';
	$counter  = 1;

	if ( ! empty( $_GET['category'] ) ) {
		$category = esc_html( $_GET['category'] );
	}

	if ( '' !== $category ) {
		$stm = $dbh->prepare( 'SELECT * FROM todo WHERE category = :category ORDER BY id DESC' );
		$stm->bindParam( ':category', $category );
	} else {
		$stm = $dbh->prepare( 'SELECT * FROM todo ORDER BY id DESC' );
	}

	$stm->execute();
	$data = $stm->fetchAll();

	foreach ( $data as $value ) {
		$date       = strtotime( date( 'd-m-Y' ) ) - strtotime( $value['date'] );
		$date_class = '';
		$done_class = '';
		if ( 0 < $date ) {
			$date_class = ' mixin-color-red';
		}
		if ( $value['done'] ) {
			$done_class = ' done';
		}
		?>
			<div class="todo<?php echo $done_class; ?>" data-id="<?php echo $value['id']; ?>">
				<div class="todo-name">
					<span><?php
					echo $counter++ . '. ';
					?></span>
					<span class="todo-name-inner"><?php
					echo $value['name'];
					?></span>
				</div>
				<div class="todo-text"><?php
					echo $value['category'];
				?></div>
				<div class="btn-group">
					<a href="?delete=<?php echo $value['id']; ?>" class="btn btn-danger todo-delete"><i class="fas fa-times"></i></a>
					<a href="?edit=<?php echo $value['id']; ?>" class="btn btn-warning todo-edit"><i class="far fa-edit"></i></a>
					<a href="?done=<?php echo $value['done']; ?>&id=<?php echo $value['id']; ?>" class="btn btn-success todo-done"><i class="fas fa-check"></i></a>
				</div>
				<div class="todo-date<?php echo $date_class; ?>"><?php
					echo $value['date'];
					?></div>
			</div>
		<?php
	}
}


/**
 * Ol_download_category
 *
 * Loading categories from the database
 */
function ol_download_category() {
	global $dbh;
	$stm = $dbh->prepare( 'SELECT category FROM todo ORDER BY id DESC' );
	$stm->execute();
	$data = $stm->fetchAll();
	$arr = [];

	?>
	<ul>
		<li><a href="?category=">All</a></li>
	<?php
	foreach ( $data as $value ) {
		if ( ! in_array( $value['category'], $arr ) ) {
			$arr[] = $value['category'];
			?>
			<li><a href="?category=<?php echo $value['category']; ?>"><?php echo ucfirst( $value['category'] ); ?></a></li>
			<?php
			}
	}
	?>
	</ul>
	<?php
}

/**
 * Ol_delete_todo
 *
 * Delete a job from the database
 */
function ol_delete_todo() {
	if ( empty( $_GET['delete'] ) ) {
		return;
	}

	$id = esc_html( $_GET['delete'] );

	global $dbh;
	$stmt = $dbh->prepare( 'DELETE FROM todo WHERE id = :id' );
	$stmt->bindParam( ':id', $id );
	$stmt->execute();

	header( 'Location: /todo/index.php' );
}

/**
 * Ol_done_todo
 *
 * Completed task
 */
function ol_done_todo() {
	if ( ! empty( $_GET['done'] ) || $_GET['done'] === '0' ) {
		$done = esc_html( $_GET['done'] );
		$id   = esc_html( $_GET['id'] );

		if ( $done ) {
			$done = 0;
		} else {
			$done = 1;
		}

		global $dbh;
		$stmt = $dbh->prepare( 'UPDATE todo SET done = :done WHERE id = :id' );
		$stmt->bindParam( ':done', $done );
		$stmt->bindParam( ':id', $id );
		$stmt->execute();

		header( 'Location: /todo/index.php' );
	}
}

/**
 * Ol_edit_todo
 *
 * We take data from the database
 */
function ol_edit_todo() {
	if ( empty( $_GET['edit'] ) ) {
		return;
	}

	$id_todo       = esc_html( $_GET['edit'] );
	$title_todo    = '';
	$category_todo = '';
	$date_todo     = date( 'Y-m-d' );

	global $dbh;
	$stm = $dbh->prepare( 'SELECT * FROM todo WHERE id = :id' );
	$stm->bindParam( ':id', $id_todo );
	$stm->execute();
	$data = $stm->fetchAll();

	foreach ( $data as $value ) {
		$title_todo    = $value['name'];
		$category_todo = $value['category'];
		$date_todo     = $value['date'];
	}

	ol_create_form( $id_todo, $title_todo, $category_todo, $date_todo );
}

/**
 * Ol_create_form
 * Show the user the data
 *
 * @param  int $id_todo 
 * @param  text $title_todo
 * @param  text $category_todo
 * @param  date $date_todo
 * @return void
 */
function ol_create_form( $id_todo, $title_todo, $category_todo, $date_todo ) {
	?>
		<div class="edit-todo">
			<form action="" method="get">
				<input type="text" name="title_edit" placeholder="Title" value="<?php echo $title_todo; ?>">
				<input type="text" name="category_edit" placeholder="Category" value="<?php echo $category_todo; ?>">
				<input type="submit" class="btn btn-primary" value="Edit">
				<input type="date" name="date_edit" value="<?php echo $date_todo; ?>">
				<input type="hidden" name="todo_id" value="<?php echo $id_todo; ?>">
			</form>
		</div>
	<?php
}

/**
 * Ol_save_edit_todo
 *
 * Save edits to do list
 */
function ol_save_edit_todo() {
	if ( empty( $_GET['title_edit'] ) && empty( $_GET['category_edit'] ) && empty( $_GET['date_edit'] ) && empty( $_GET['todo_id'] ) ) {
		return;
	}

	$id_todo       = esc_html( $_GET['todo_id'] );
	$title_todo    = esc_html( $_GET['title_edit'] );
	$category_todo = esc_html( $_GET['category_edit'] );
	$date_todo     = esc_html( $_GET['date_edit'] );

	global $dbh;
	$stmt = $dbh->prepare( 'UPDATE todo SET name = :name, category = :category, date = :date WHERE id = :id' );
	$stmt->bindParam( ':name', $title_todo );
	$stmt->bindParam( ':category', $category_todo );
	$stmt->bindParam( ':date', $date_todo );
	$stmt->bindParam( ':id', $id_todo );
	$stmt->execute();
	header( 'Location: /todo/index.php' );
}
