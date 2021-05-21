(function ($) {
	function countNumber() {
		$('.num-min').on('click', function () {
			let $number = $('.input-number').val() - 1;
			if ( 0 > $number ) {
				$number = 0;
			}
			$('.input-number').val( $number );
		});
		$('.num-plus').on('click', function () {
			let $number = $('.input-number').val();
			$('.input-number').val( ++$number );
		})
	}

	$( document ).ready( function () {
		countNumber();
	});
})(jQuery);
