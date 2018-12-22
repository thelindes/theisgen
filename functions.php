<?php

function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}

// WordPress Titles
add_theme_support( 'title-tag' );

// Add scripts and stylesheets
function startwordpress_scripts() {
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'style-min', get_template_directory_uri() . '/dist/css/style.min.css' );
    
    wp_enqueue_script( 'animations', get_stylesheet_directory_uri() . '/dist/js/animations.min.js', array('jquery'), true );
    wp_enqueue_script( 'jquery-ui', get_stylesheet_directory_uri() . '/dist/js/jquery-ui.min.js', array('jquery'), true );
    wp_enqueue_script( 'lory-js', get_stylesheet_directory_uri() . '/dist/js/lory.min.js', true );
    wp_enqueue_script( 'formvalidation', get_stylesheet_directory_uri() . '/dist/js/form-validation.min.js', array('jquery'), true );   	
}

add_action( 'wp_enqueue_scripts', 'startwordpress_scripts');



require_once( __DIR__ . '/php/font-functions.php');
require_once( __DIR__ . '/php/products-settings.php');
require_once( __DIR__ . '/php/contact-settings.php');

    
if ( ! function_exists( 'theme_slug_setup' ) ) :
    /**
     * Sets up theme and registers support for various WordPress features.
     */
    function theme_slug_setup() {
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 800, 800, true );
    }
endif;
add_action( 'after_setup_theme', 'theme_slug_setup' );
