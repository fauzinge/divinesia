<?php
/**
 * Custom Functions file for current theme.
 *
 */

// IMPORT PARENT STYLE
function child_theme_enqueue_styles() {
    $parent_style = 'divi-style'; // This is 'divi-style' for the Divi theme.
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'child_theme_enqueue_styles' );

// Load javascript mobile menu
add_action( 'wp_enqueue_scripts', 'menu_scripts' );
function menu_scripts() {
wp_enqueue_script( 'responsive-menu', get_bloginfo( 'stylesheet_directory' ) . '/js/responsive-menu.js', array( 'jquery' ), '1.0.0' );
wp_enqueue_script(
    'custom-script',
    get_stylesheet_directory_uri() . '/js/dvns-mobile-menu.js',
    array( 'jquery' )
);
        }

// Fungsi untuk mengubah lebar x tinggi thumbnail
function dva_index_thumbnail_width( $width ) {
	if( !is_single() ) {
	 	return 400; //index thumbnail width dalam pixels
	} else {
		return $width;
	}
}
add_filter( 'et_pb_index_blog_image_width', 'dva_index_thumbnail_width');

function dva_index_thumbnail_height( $height ) {
	if( !is_single() ) {
		return 284; //index thumbnail height dalam pixels
	} else {
		return $height;
	}
}
add_filter( 'et_pb_index_blog_image_height', 'dva_index_thumbnail_height');
?>
