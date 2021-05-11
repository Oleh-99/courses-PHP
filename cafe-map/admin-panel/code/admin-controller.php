<?php

function admin_page_action() {
	$admin_panel          = array();
	$admin_panel['action'] = 'sing-up';

	show_template( $admin_panel );
}
