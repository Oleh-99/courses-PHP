(function($) {
	function olTodoDelete() {
		$(document).on('click', '.todo-delete', function(e) {
			e.preventDefault();

			var $this = $(this);
			var href = $this.attr('href');

			$this.parents('.todo').fadeOut(300);

			$.ajax({
				url: `${href}`,
				error: function() {
					alert('Error');
				},
			});
		})
	}

	function olTodoEdit() {
		$(document).on('click', '.todo-edit', function(e) {
			e.preventDefault();

			var $this = $(this);
			var $thisParent = $this.parents('.todo');

			if( $this.hasClass('active') ) {
				$this.removeClass('active');
				$thisParent.find('.form-edit-todo').slideToggle(300);
				return;
			}

			var $todoId = $thisParent.data('id');
			var $todoTitle = $this.parent().siblings('.todo-name').find('.todo-name-inner').text().trim();
			var $todoText = $this.parent().siblings('.todo-text').text().trim();
			var $todoDate = $this.parent().siblings('.todo-date').text().trim();
			
			$this.addClass('active');
		
			if ( ! $thisParent.find('.form-edit-todo').length ) {
				$thisParent.append(
					`<form class="form-edit-todo">
						<input type="text" name="title_edit" placeholder="Title" value="${$todoTitle}">
						<input type="text" name="category_edit" placeholder="Category" value="${$todoText}">
						<input type="date" name="date_edit" value="${$todoDate}">
						<input type="submit" class="btn btn-primary" value="Edit">
						<input type="hidden" name="todo_id" value="${$todoId}">
					</form>`
				);
			}
			
			$this.parents('.todo').find('.form-edit-todo').slideToggle(300);
		})	
	}

	function olTodoDone() {
		$(document).on('click', '.todo-done', function(e) {
			e.preventDefault();

			var $this = $(this);
			var href = $this.attr('href');
			var $thisParents = $this.parents('.todo');

			if ( $thisParents.hasClass('done')) {
				$thisParents.removeClass('done');
			} else {
				$thisParents.addClass('done');
			}

			if ( $this.hasClass('done')) {
				$this.removeClass('done');
			} else {
				$this.addClass('done');
			}
			
			$.ajax({
				url: `${href}`,
				error: function() {
					alert('Error');
				},
			});
		})
	}

	function olTodoSaveEdit() {
		$(document).on('submit', '.form-edit-todo', function(e) {
			e.preventDefault();
			
			var $this = $(this);
			var $id = $this.find('[name="todo_id"]').val();
			var $title = $this.find('[name="title_edit"]').val();
			var $text = $this.find('[name="category_edit"]').val();
			var $date = $this.find('[name="date_edit"]').val();

			if ( '' === $title || '' === $text || '' === $date ) {
				return;
			}

			var date = new Date();
			var month = date.getMonth() + 1;
			var day = date.getDate();
	
			if (month <= 9) {
				month = "0" + month;
			}
			if (day <= 9) {
				day = "0" + day;
			}
	
			var strDate = date.getFullYear() + "-" + month + "-" + day;

			if ( strDate >= $date ) {
				$this.siblings('.todo-date').addClass('mixin-color-red');
			}

			if ( strDate <= $date ) {
				$this.siblings('.todo-date').removeClass('mixin-color-red');
			}

			$this.siblings('.todo-name').find('.todo-name-inner').text($title);
			$this.siblings('.todo-text').text($text);
			$this.siblings('.todo-date').text($date);

			$this.slideToggle(300);

			$.ajax({
				url: `?title_edit=${$title}&category_edit=${$text}&date_edit=${$date}&todo_id=${$id}`,
				error: function() {
					alert('Error');
				},
			});
			
		})
	}

	function olTodoSortable() {
		$('.todos-inner').sortable({
			update: function( ) {
				var arr = [];
				var order = $('.todos-inner').sortable('serialize').split('&');
				for (let i = 0; i < order.length; i++) {
					var count =  order[i].split('=');
					arr[i] = count[1];
				}
			
				for (let i = 1; i <= arr.length; i++) {
					var index = arr.length - i;

					$.ajax({
						url: `?order=${i}&id=${arr[index]}`,
						error: function() {
							alert('Error');
						},
					});
				}
			}
		});
		$('.todos-inner').disableSelection();
	}

	function olAvailability()  {
		if ( ! $('.todo').length ) {
			$('.todos-inner').append(
				`<div class="not-availability alert alert-danger" role="alert">
					<h4>You have no tasks</h4>
				</div>`
			);
		} else {
			$('.not-availability').remove();
		}
	}

	function olHideCategory() {
		var $category = $('.category').find('li');

		if ( 1 >= $category.length ) {
			$category.parent().fadeOut();
		}
	}

	$(document).ready(function() {
		olTodoDelete();
		olTodoEdit();
		olTodoDone();
		olTodoSaveEdit();
		olTodoSortable();
		olAvailability();
		olHideCategory();
	});

})(jQuery);