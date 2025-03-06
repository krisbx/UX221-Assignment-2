<?php
/**
 * Skincare Product Store functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package skincare-product-store
 * @since skincare-product-store 1.0
 */

if ( ! function_exists( 'skincare_product_store_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since skincare-product-store 1.0
	 *
	 * @return void
	 */
	function skincare_product_store_support() {

		load_theme_textdomain( 'skincare-product-store', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		add_theme_support( 'align-wide' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

		add_theme_support( 'responsive-embeds' );
		
		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );
	}

endif;

add_action( 'after_setup_theme', 'skincare_product_store_support' );

if ( ! function_exists( 'skincare_product_store_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since skincare-product-store 1.0
	 *
	 * @return void
	 */
	function skincare_product_store_styles() {

		// Register theme stylesheet.
		wp_register_style(
			'skincare-product-store-style',
			get_template_directory_uri() . '/style.css',
			array(),
			wp_get_theme()->get( 'Version' )
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'skincare-product-store-style' );

		wp_style_add_data( 'skincare-product-store-style', 'rtl', 'replace' );

		wp_enqueue_style( 'dashicons' );
	}

endif;

add_action( 'wp_enqueue_scripts', 'skincare_product_store_styles' );

/* Enqueue Custom Js */
function skincare_product_store_scripts() {

	wp_enqueue_script(
        'skincare-product-store-scroll-to-top',
        esc_url(get_template_directory_uri()) . '/assets/js/scroll-to-top.js',
        array(), 
        null, 
        true // Load in footer
    );
}
add_action( 'wp_enqueue_scripts', 'skincare_product_store_scripts' );

// Add block patterns
require get_template_directory() . '/inc/block-pattern.php';

// Add block Style
require get_template_directory() . '/inc/block-style.php';

// TGM
require get_template_directory() . '/inc/tgm/plugin-activation.php';

// Get Started
require get_template_directory() . '/get-started/getstart.php';

// Get Notice
require get_template_directory() . '/get-started/notice.php';

// Get Notice
require get_template_directory() . '/inc/customizer.php';