<?php
require 'mixin.php';

$dbh = new PDO( 'mysql:host=192.168.1.84;dbname=courses', 'cours', 'cours' );

/**
 * Ol_user_initialization
 */
function ol_user_initialization() {
	if ( empty( $_POST['user_login'] ) || empty( $_POST['user_password'] ) ) {
		if ( ! empty( $_POST['log_in'] ) || ! empty( $_POST['sing_up'] ) ) {
			if ( empty( $_POST['user_login'] ) ) {
				ol_add_errors( ' Enter a login ' );
			}
			if ( empty( $_POST['user_password'] ) ) {
				ol_add_errors( ' Enter a password ' );
			}
		}
		return;
	}

	if ( 8 >= strlen( $_POST['user_password'] ) ) {
		ol_add_errors( ' The minimum password length is 8 characters ' );
		return;
	}

	$login    = esc_html( $_POST['user_login'] );
	$password = esc_html( $_POST['user_password'] );

	if ( ! empty( $_POST['log_in'] ) ) {
		ol_log_up( $login, $password );
	}
	if ( ! empty( $_POST['sing_up'] ) ) {
		ol_sing_up( $login, $password );
	}
}

/**
 * Ol_log_up
 *
 * @param string $login
 * @param string $password
 */
 function ol_log_up( $login, $password ) {
	global $dbh;
	$stmt = $dbh->prepare( 'SELECT * FROM userstodo WHERE login = :login' );
	$stmt->bindParam( ':login', $login );
	$stmt->execute();
	$data = $stmt->fetchAll();

	foreach ( $data as $value ) {
		if ( $value['login'] === $login && password_verify( $password, $value['password'] ) ) {
			$_SESSION['login'] = $login;
		}
	}

	if ( ! $_SESSION['login'] ) {
		ol_add_errors( ' Wrong login or password ' );
	}
}


/**
 * Ol_sing_up
 * user registration in the database
 * @param string $login
 * @param string $password
 */
 function ol_sing_up( $login, $password ) {
	global $dbh;
	$stmt = $dbh->prepare( 'SELECT * FROM userstodo WHERE login = :login' );
	$stmt->bindParam( ':login', $login );
	$stmt->execute();
	$data = $stmt->fetchAll();

	foreach ( $data as $value ) {
		if ( $value['login'] === $login) {
			ol_add_errors( ' The user with such a login exists ' );
			return;
		}
	}

	$stmt = $dbh->prepare( 'INSERT INTO userstodo ( login, password ) VALUES ( :login, :password )' );
	$stmt->bindParam( ':login', $login );
	$stmt->bindParam( ':password', password_hash($password, PASSWORD_DEFAULT) );
	$stmt->execute();
	$_SESSION['login'] = $login;
}

/**
 * Ol_exit_profile
 *
 * Exit_profile
 */
function ol_exit_profile() {
	if ( empty( $_GET['exit_profile'] ) ) {
		return;
	}

	unset( $_SESSION['user_id'] );
	unset( $_SESSION['login'] );
	header( 'Location: /todo/registr.php' );
}

/**
 * Ol_add_user_id
 *
 * Add user id in SESSION
 */
 function ol_add_user_id() {
	if ( ! $_SESSION['login'] ) {
		return;
	}
	
	global $dbh;
	$stm = $dbh->prepare( 'SELECT * FROM userstodo WHERE login = :login' );
	$stm->bindParam( ':login', $_SESSION['login'] );
	$stm->execute();
	$data = $stm->fetchAll();

	foreach ( $data as $value ) {
		$_SESSION['user_id'] = $value['id'];
	}
}

/**
 * Ol_sending_data
 * sends data to the database
 */
function ol_sending_data() {
	if ( empty( $_POST['title_todo'] ) || empty( $_POST['date_todo'] ) || empty( $_POST['category_todo'] ) ) {
		if ( ! empty( $_POST['add_todo'] ) ) {
			if ( empty( $_POST['title_todo'] ) ) {
				ol_add_errors( ' Enter a title ' );
			}
			if ( empty( $_POST['category_todo'] ) ) {
				ol_add_errors( ' Enter a category ' );
			}
			if ( empty( $_POST['date_todo'] ) ) {
				ol_add_errors( ' Enter the date ' );
			}
		}
		return;
	}

	$title_todo    = esc_html( $_POST['title_todo'] );
	$category_todo = esc_html( $_POST['category_todo'] );
	$date_todo     = esc_html( $_POST['date_todo'] );
	$order         = 0;
	header( 'Location: /todo/index.php' );

	global $dbh;
	$stm = $dbh->query( 'SELECT COUNT(*) FROM todo' );
	foreach ( $stm as $value ) {
		$order = $value[0];
	}

	if ( ! $_SESSION['user_id'] ) {
		ol_add_user_id();
	}

	$user_id = $_SESSION['user_id'];

	$stmt = $dbh->prepare( 'INSERT INTO todo ( name, category, date, orders, userId ) VALUES ( :name, :category, :date, :orders, :userId )' );
	$stmt->bindParam( ':name', $title_todo );
	$stmt->bindParam( ':category', $category_todo );
	$stmt->bindParam( ':date', $date_todo );
	$stmt->bindParam( ':orders', ++$order );
	$stmt->bindParam( ':userId', $user_id );
	$stmt->execute();
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

	if ( ! $_SESSION['user_id'] ) {
		ol_add_user_id();
	}

	$user_id = $_SESSION['user_id'];

	if ( '' !== $category ) {
		$stm = $dbh->prepare( 'SELECT * FROM todo WHERE category = :category, userId = :userId ORDER BY orders DESC' );
		$stm->bindParam( ':category', $category );
	} else {
		$stm = $dbh->prepare( 'SELECT * FROM todo WHERE userId = :userId ORDER BY orders DESC LIMIT 10' );
	}

	$stm->bindParam( ':userId', $user_id );
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
			<div class="todo<?php echo $done_class; ?>" data-id="<?php echo $value['id']; ?> " id="order_<?php echo $value['orders'] . '_' . $value['id']; ?>">
				<div class="todo-name">
					<span>
						<?php
						echo $counter++ . '. ';
						?>
					</span>
					<span class="todo-name-inner">
						<?php
						echo $value['name'];
						?>
					</span>
				</div>
				<div class="todo-text">
					<?php
						echo $value['category'];
					?>
				</div>
				<div class="btn-group">
					<a href="?delete=<?php echo $value['id']; ?>" class="btn btn-danger todo-delete"><i class="fas fa-times"></i></a>
					<a href="?edit=<?php echo $value['id']; ?>" class="btn btn-warning todo-edit"><i class="far fa-edit"></i></a>
					<a href="?done=<?php echo $value['done']; ?>&id=<?php echo $value['id']; ?>" class="btn btn-success todo-done<?php echo $done_class; ?>">  </a>
				</div>
				<div class="todo-date<?php echo $date_class; ?>">
					<?php
						echo $value['date'];
					?>
				</div>
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
	if ( ! $_SESSION['user_id'] ) {
		ol_add_user_id();
	}

	$user_id = $_SESSION['user_id'];
	global $dbh;
	$stm = $dbh->prepare( 'SELECT category FROM todo WHERE userId =:userId ORDER BY id DESC' );
	$stm->bindParam( ':userId', $user_id );
	$stm->execute();
	$data = $stm->fetchAll();
	$arr  = array();

	?>
	<ul>
		<li>
			<a href="?category=">All</a>
		</li>
		<?php foreach ( $data as $value ) : ?>
			<?php if ( ! in_array( $value['category'], $arr ) ) : ?>
				<?php $arr[] = $value['category']; ?>
				<li>
					<a href="?category=<?php echo $value['category']; ?>">
					<?php echo ucfirst( $value['category'] ); ?></a>
				</li>
			<?php endif; ?>
		<?php endforeach; ?>
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
 * @param  int  $id_todo
 * @param string $title_todo
 * @param string $category_todo
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


/**
 * Ol_update_orders_todo
 *
 * Installation order todo
 */
function ol_update_orders_todo() {
	if ( empty( $_GET['order'] ) && empty( $_GET['id'] ) ) {
		return;
	}

	$order   = esc_html( $_GET['order'] );
	$id_todo = esc_html( $_GET['id'] );

	header( 'Location: /todo/index.php' );

	global $dbh;
	$stmt = $dbh->prepare( 'UPDATE todo SET orders = :orders WHERE id = :id' );
	$stmt->bindParam( ':orders', $order );
	$stmt->bindParam( ':id', $id_todo );
	$stmt->execute();
}

/**
 * Ol_add_errors
 *
 * Adding errors to cookies 
 * @param string $date
 */
function ol_add_errors( $date ) {
	ob_start();

	$cookie        = stripslashes( $_COOKIE['Errors'] );
	$saved_array   = json_decode( $cookie, true );
	$saved_array[] = $date;
	$json          = json_encode( $saved_array );

	setcookie( 'Errors', $json );
	ol_error_output( $saved_array );
	setcookie( 'Errors', '', time() );
}

/**
 * Ol_error_output
 *
 * Error output 
 * @param array $arr
 */
function ol_error_output( $arr ) {
	?>
	<div class="info-error alert alert-danger" role="alert">
		<?php
		foreach ( $arr as $value ) {
			echo $value . '<br>';
		}
		?>
	</div>
	<?php
}
