(function ($) {
	function viewCard() {
		$( '.cart' ).on('click', function (e) {
			e.preventDefault();

			$( this ).toggleClass( 'active' );
			$( '.cart-view' ).toggleClass( 'active' );
		});
	}

	$( document ).ready(function () {
		viewCard();
	});
})( jQuery );
