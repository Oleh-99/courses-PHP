
<?php

function router() {
	$result = esc_html( $_GET['action'] );

	switch ( $result ) {
		case 'home':
			set_link_controller( 'home' );
			break;

		case '':
			set_link_controller( 'home' );
			break;

		case 'contact':
			set_link_controller( 'contact' );
			echo 'contact';
			break;

		default:
			set_link_controller( '404' );
			break;
	}
}