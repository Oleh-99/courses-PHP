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
			var $todoTitle = $this.parent().siblings('.todo-name').find('.todo-name-inner').text();
			var $todoText = $this.parent().siblings('.todo-text').text();
			var $todoDate = $this.parent().siblings('.todo-date').text();
			
			$this.addClass('active');
		
			if ( ! $thisParent.find('.form-edit-todo').length ) {
				$thisParent.append(
					`<form class="form-edit-todo">
						<input type="text" name="title_edit" placeholder="Title" value="${$todoTitle}">
						<textarea name="text_edit" cols="30" rows="5" placeholder="Description">${$todoText}</textarea>
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
			
			$this = $(this);
			$id = $this.find('[name="todo_id"]').val();
			$title = $this.find('[name="title_edit"]').val();
			$text = $this.find('[name="text_edit"]').val();
			$date = $this.find('[name="date_edit"]').val();
			
			$this.siblings('.todo-name').find('.todo-name-inner').text($title);
			$this.siblings('.todo-text').text($text);
			$this.siblings('.todo-date').text($date);

			$this.slideToggle(300);

			$.ajax({
				url: `?title_edit=${$title}&text_edit=${$text}&date_edit=${$date}&todo_id=${$id}`,
				error: function() {
					alert('Error');
				},
			});
			
		})
	}

	function sortable() {
		$('.todos-inner').sortable().disableSelection();
	}

	$(document).ready(function() {
		olTodoDelete();
		olTodoEdit();
		olTodoDone();
		olTodoSaveEdit();
		sortable();
	});

})(jQuery);