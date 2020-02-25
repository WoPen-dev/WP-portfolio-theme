<?php
/**
 * portfolio Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package portfolio
 */

// Définition des constantes
define("CPT_DIR", get_stylesheet_directory() ."/post-types/");

// on ajoute les CPT
foreach (glob(CPT_DIR."*.php") as $filename) {
	require $filename;
}

add_action( 'wp_enqueue_scripts', 'starter_parent_theme_enqueue_styles' );

/**
 * Enqueue scripts and styles.
 */
function starter_parent_theme_enqueue_styles() {
	wp_enqueue_style( 'starter-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'portfolio-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'starter-style' )
	);

}
