<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package game-store
 * @since 1.0.0
 */

/**
 * Enqueue the CSS files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function game_store_enqueue() {
	wp_enqueue_style(
		'game-store-style',
		get_stylesheet_uri(),
		[],
		wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_style(
		'game-store-main-style',
		get_stylesheet_directory_uri() . '/assets/styles/gamestore.css',
		[],
		wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_style(
		'game-store-google-fonts',
		'https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;700&display=swap',
		[],
		wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_script(
		'game-store-main-script',
			get_stylesheet_directory_uri() . '/assets/js/gamestore.js',
		[],
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'game_store_enqueue' );
