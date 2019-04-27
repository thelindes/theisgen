<?php

function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
}
  
  function get_SliderId( $data ) {
      $masterSliderStart = strpos($data, '[masterslider id=');
      $masterSliderEnd = strpos($data, ']');
      $masterSlider = substr($data, $masterSliderStart, $masterSliderEnd+1);
      $masterSliderNumber = (int) filter_var($masterSlider, FILTER_SANITIZE_NUMBER_INT);
      return $masterSliderNumber;
  }
  
  function clean( $data , $type ) {
  
      if( $type === "comments" || $type === "slider"){
          if( $type == "comments") {
              $cleaned = substr($data, strpos($data, "<!--"), strpos($data, "-->")+3);
              $data = str_replace($cleaned, '', $data);
              return $data;
          }
  
          if( $type == "slider" ) {
              $masterSliderStart = strpos($data, 'masterslider id=')-1;
              $masterSliderEnd = strpos($data, ']');
              $masterSlider = substr($data, $masterSliderStart, $masterSliderEnd+1);
              $data = str_replace($masterSlider, '', $data);
              return $data;
          }
      } else {
          $data = str_replace($type, '', $data);
          return $data; 
      }
  
  }
  
  function get_contentPart( $data , $part ){
     if($part == "img"){
         $start = '<' . $part;
          $end = '<!--img-->';
          $result = substr($data, strpos( $data, $start) , strpos($data, $end ) + strlen($part) );
     } else {
         $start = '<' . $part . '>';
         $end = '</' .  $part . '>';
         $result = substr($data, strpos( $data, $start) , strpos($data, $end ) + strlen($part) + 3 );
     }
         
     return $result;
  }
  
  function get_normalizedText( $data ) {
      $data = str_replace("\r", "", $data);
      $data= str_replace("\n", "", $data);
  
      $data = preg_replace('/[ \t]+/', ' ', preg_replace('/[\r\n]+/', "\n", $data));
      return $data;
  }
  
  function get_liAsList( $data ){
      $array = [];
      $iterator = 0;
      $data = clean($data, "<ul>");
      $data = clean($data, "</ul>");
  
      while($iterator <= 6){
          $li = get_contentPart($data, "li");
          $data = clean($data, $li);
          $li = clean($li, "<li>");
          $li = clean($li, "</li>");
          $tempObject = []; 
  
          $h3 = get_H3($li);
          $tempObject[0] = get_H3($li);
          
          $img = get_IMG($li);
          $tempObject[1] = get_IMG($li);
  
          $li = clean($li, $h3);
          $li = clean($li, $img);
  
          $tempObject[2] = $li;
              $array[$iterator++] = $tempObject;
      }
      return $array;
  }
  
  function get_H3($li) {
      $li = get_normalizedText($li);
      return get_contentPart($li, "h3");
  }
  
  function get_IMG($li) {
      $li = get_normalizedText($li);
      $result = get_contentPart($li, "img");
      if(strlen($result) < 4 ){
          return null;
      }
      return $result;
  }

// WordPress Titles
add_theme_support( 'title-tag' );

// Add scripts and stylesheets
function startwordpress_scripts() {
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'style-min', get_template_directory_uri() . '/dist/css/style.min.css' );
    wp_enqueue_script( 'animations', get_stylesheet_directory_uri() . '/dist/js/animations.min.js', array('jquery'), true );
    wp_enqueue_script( 'filter-tax', get_stylesheet_directory_uri() . '/dist/js/filter-tax.min.js', array('jquery'), true );
    wp_enqueue_script( 'jquery-ui', get_stylesheet_directory_uri() . '/dist/js/jquery-ui.min.js', array('jquery'), true );
    wp_enqueue_script( 'lory-js', get_stylesheet_directory_uri() . '/dist/js/lory.min.js', true );
    wp_enqueue_script( 'formvalidation', get_stylesheet_directory_uri() . '/dist/js/form-validation.min.js', array('jquery'), true );   

}

add_action( 'wp_enqueue_scripts', 'startwordpress_scripts');
require_once( __DIR__ . '/php/font-functions.php');
require_once( __DIR__ . '/php/products-settings.php');
require_once( __DIR__ . '/php/contact-settings.php');
require_once( __DIR__ . '/php/duplicate-post.php');
require_once( __DIR__ . '/php/ajax-functions.php');
include( __DIR__ . '/php/customizer-settings.php');


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

