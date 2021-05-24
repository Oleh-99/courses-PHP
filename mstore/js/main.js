(function ($) {
	function countNumber() {
		$('.num-min').on('click', function () {
			let $this = $(this);
			let $number = $this.siblings('.input-number').val() - 1;

			if ( 0 > $number ) {
				$number = 0;
			}

			$this.siblings('.input-number').val( $number );
		});
		$('.num-plus').on('click', function () {
			let $this = $(this);
			let $number = $this.siblings('.input-number').val();
			$this.siblings('.input-number').val( ++$number );
		});
	}

	$( document ).ready( function () {
		countNumber();
	});
})(jQuery);
