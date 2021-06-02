<?php
/**
 * Functions.
 *
 * @package Functions.
 */

if ( ! function_exists( 'ol_theme_support' ) ) {
	/**
	 * Connection theme support.
	 */
	function ol_theme_support() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'custom-logo' );
		add_theme_support( 'post-thumbnails' );
	}

	add_action( 'after_setup_theme', 'ol_theme_support' );
}

if ( ! function_exists( 'ol_menu' ) ) {
	/**
	 * Menu initialization.
	 */
	function ol_menu() {
		$location = array(
			'primary' => 'Menu Sidebar',
			'footer'  => 'Footer menu',
		);

		register_nav_menus( $location );
	}

	add_action( 'init', 'ol_menu' );
}

if ( ! function_exists( 'ol_register_style' ) ) {
	/**
	 * Theme register style.
	 */
	function ol_register_style() {
		wp_enqueue_style( 'ol_style', get_template_directory_uri() . '/style.css', array( 'ol_bootstrap' ), wp_get_theme()->get( 'Version' ), 'all' );
		wp_enqueue_style( 'ol_bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', array(), '4.4.1' );
		wp_enqueue_style( 'ol_font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css', array(), '5.13.0' );
	}

	add_action( 'wp_enqueue_scripts', 'ol_register_style' );
}

if ( ! function_exists( 'ol_register_scripts' ) ) {
	/**
	 * Theme register scripts.
	 */
	function ol_register_scripts() {
		$version = wp_get_theme()->get( 'Version' );

		wp_enqueue_script( 'ol_jsdeliver', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), '1.16.0', true );
		wp_enqueue_script( 'ol_bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array(), '4.4.1', true );
		wp_enqueue_script( 'ol_js', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), $version, true );
	}

	add_action( 'wp_enqueue_scripts', 'ol_register_scripts' );
}
