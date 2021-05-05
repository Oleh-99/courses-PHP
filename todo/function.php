<?php
ob_start();

require '../mixin/mixin.php';

$dbh = new PDO( 'mysql:host=localhost;dbname=courses', 'root', 'root' );

/**
 * Ol_sending_data
 * sends data to the database
 */
function ol_sending_data() {
	if ( ! empty( $_GET['title_todo'] ) && ! empty( $_GET['date_todo'] ) ) {
		$title_todo = esc_html( $_GET['title_todo'] );
		$text_todo  = esc_html( $_GET['text_todo'] );
		$date_todo  = esc_html( $_GET['date_todo'] );

		global $dbh;
		$stmt = $dbh->prepare( 'INSERT INTO todo ( name, description, date, done ) VALUES ( :name, :description, :date, 0 )' );
		$stmt->bindParam( ':name', $title_todo );
		$stmt->bindParam( ':description', $text_todo );
		$stmt->bindParam( ':date', $date_todo );
		$stmt->execute();

		header( 'Location: /todo/index.php' );
	}
}

/**
 * Ol_data_download
 *
 * Download data from the database
 */
function ol_data_download() {
	global $dbh;
	$stm = $dbh->prepare( 'SELECT * FROM todo' );
	$stm->execute();
	$data = $stm->fetchAll();

	foreach ( $data as $value ) {
		$date       = strtotime( date( 'd-m-Y' ) ) - strtotime( $value['date'] );
		$date_class = '';
		if ( 0 < $date ) {
			$date_class = 'mixin-color-red';
		}
		?>
			<div class="todo">
				<div class="todo-name"> <?php echo $value['id'] . '. ' . $value['name']; ?></div>
				<div class="todo-text"><?php echo $value['description']; ?></div>
				<form class="btn-group" method="get" role="group" aria-label="Basic mixed styles example">
					<button name="delete" value="<?php echo $value['id']; ?>" class="btn btn-danger">Delete</button>
					<button name="edit" value="<?php echo $value['id']; ?>" class="btn btn-warning">Edit</button>
					<?php
					if ( $value['done'] ) {
						echo '<button name="done" value="' . $value['id'] . '-' . $value['done'] . '" class="btn btn-success">Do again</button>';
					} else {
						echo '<button name="done" value="' . $value['id'] . '-' . $value['done'] . '" class="btn btn-success">Done</button>';}
					?>
				</form>
				<div class="todo-date <?php echo $date_class; ?> "><?php echo $value['date']; ?></div>
			</div>
		<?php
	}
}

/**
 * Ol_delete_todo
 *
 * Delete a job from the database
 */
function ol_delete_todo() {
	if ( ! empty( $_GET['delete'] ) ) {
		$id = esc_html( $_GET['delete'] );

		global $dbh;
		$stmt = $dbh->prepare( 'DELETE FROM todo WHERE id = :id' );
		$stmt->bindParam( ':id', $id );
		$stmt->execute();

		header( 'Location: /todo/index.php' );
	}
}

/**
 * Ol_done_todo
 *
 * Completed task
 */
function ol_done_todo() {
	if ( ! empty( $_GET['done'] ) ) {
		$data = esc_html( $_GET['done'] );
		$arr  = explode( '-', $data );
		$id   = $arr[0];
		$done = $arr[1];

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
	if ( ! empty( $_GET['edit'] ) ) {
		$id_todo    = esc_html( $_GET['edit'] );
		$title_todo = '';
		$text_todo  = '';
		$date_todo  = date( 'Y-m-d' );

		global $dbh;
		$stm = $dbh->prepare( 'SELECT * FROM todo WHERE id = :id' );
		$stm->bindParam( ':id', $id_todo );
		$stm->execute();
		$data = $stm->fetchAll();

		foreach ( $data as $value ) {
			$title_todo = $value['name'];
			$text_todo  = $value['description'];
			$date_todo  = $value['date'];
		}
		
		ol_create_form( $id_todo, $title_todo, $text_todo, $date_todo );
	}
}

/**
 * Ol_create_form
 * Show the user the data
 *
 * @param  mixed $id_todo  id todo => int
 * @param  mixed $title_todo title todo => text
 * @param  mixed $text_todo text todo => text
 * @param  mixed $date_todo date todo => date
 * @return void
 */
function ol_create_form( $id_todo, $title_todo, $text_todo, $date_todo ) {
	?>
		<div class="edit-todo">
			<form action="" method="get">
				<input type="text" name="title_edit" placeholder="Title" value="<?php echo $title_todo; ?>">
				<textarea name="text_edit" cols="30" rows="5" placeholder="Description"><?php echo $text_todo; ?></textarea>
				<input type="submit" class="btn btn-primary" value="Edit">
				<input type="date" name="date_edit" value="<?php echo $date_todo; ?>">
				<input type="hidden" name="todo_id" value="<?php echo $id_todo; ?>">
			</form>
		</div>
	<?php
}

/**
 * ol_save_edit_todo
 *
 * save edits to do list
 */
function ol_save_edit_todo() {
	if ( ! empty( $_GET['title_edit'] ) && ! empty( $_GET['text_edit'] ) && ! empty( $_GET['date_edit'] ) && ! empty( $_GET['todo_id'] ) ) {
		$id_todo    = esc_html( $_GET['todo_id'] );
		$title_todo = esc_html( $_GET['title_edit'] );
		$text_todo  = esc_html( $_GET['text_edit'] );
		$date_todo  = esc_html( $_GET['date_edit'] );

		global $dbh;
		$stmt = $dbh->prepare( 'UPDATE todo SET name = :name, description = :description, date = :date WHERE id = :id' );
		$stmt->bindParam( ':name', $title_todo );
		$stmt->bindParam( ':description', $text_todo );
		$stmt->bindParam( ':date', $date_todo );
		$stmt->bindParam( ':id', $id_todo );
		$stmt->execute();
		header( 'Location: /todo/index.php' );
	}
}
