<?php
/**
 * Fungsi penyesuaian untuk tema saat ini.
 *
 */

// IMPORT STYLE INDUK
function child_theme_enqueue_styles() {
    $parent_style = 'divi-style'; // Style 'divi-style' untuk divinesia child theme.
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'child_theme_enqueue_styles' );

/* Fungsi untuk mengganti jumlah excerpt pada modul blog
       lihat pada folder 'custom-modules/cbm.php' */
function divi_child_theme_setup() {
    if ( ! class_exists('ET_Builder_Module') ) {
        return;
    }
 
   get_template_part( 'custom-modules/cbm' );
 
    $cbm = new Custom_ET_Builder_Module_Blog();
 
    remove_shortcode( 'et_pb_blog' );
 
    add_shortcode( 'et_pb_blog', array($cbm, '_shortcode_callback') );
 
}
add_action( 'wp', 'divi_child_theme_setup', 9999 );

/* Fungsi untuk mengubah lebar x tinggi thumbnail
       pada loop/ arsip blog */
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
