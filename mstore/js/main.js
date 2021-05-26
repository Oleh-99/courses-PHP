(function ($) {
	function countNumber() {
		$( '.num-min' ).on('click', function () {
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

	function priceShop() {
		let $minInput = $( '.min-price' );
		let $maxInput = $( '.max-price' );
		let $price    = $( '.price-format' );
		let minValue  = $price.data('min');
		let maxValue  = $price.data('max');
		let step      = parseInt( maxValue / 50 );

		$( '.min-price, .max-price' ).on( 'change', function () {
			let minPrice = parseInt( $minInput.val() );
			let maxPrice = parseInt( $maxInput.val() );

			if (minPrice > maxPrice) {
				$( '.max-price' ).val( minPrice );
			}

			$( '.price-format' ).slider({
				values: [minPrice, maxPrice]
			});
		});

		let minPrice = parseInt( $minInput.val() );
		let maxPrice = parseInt( $maxInput.val() );

		if ( minPrice === maxPrice ) {
			maxPrice = minPrice + 100;

			$( '.min-price' ).val( minPrice );
			$( '.max-price' ).val( maxPrice );
		}

		$( '.price-format' ).slider({
			range: true,
			min: minValue,
			max: maxValue,
			values: [minPrice, maxPrice],
			step: step,

			slide: function (event, ui) {
				if ( ui.values[0] === ui.values[1] ) {
					return false;
				}

				$( '.min-price' ).val( parseInt( ui.values[0] ) );
				$( '.max-price' ).val( parseInt( ui.values[1] ) );
			}
		});
	}

	$( document ).ready( function () {
		countNumber();
		priceShop();
	});
})(jQuery);
