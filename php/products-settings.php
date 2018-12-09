<?php
//Product custom post type
function product_post_type() {
   
   // Labels
  $labels = array(
    'name' => _x("Produkte", "post type general name"),
    'singular_name' => _x("Produkt", "post type singular name"),
    'menu_name' => 'Produkte',
    'add_new' => _x("Neues Produkt", "Produkt"),
    'add_new_item' => __("Produkt Hinzufügen"),
    'edit_item' => __("Produkt bearbeiten"),
    'new_item' => __("Neues Produkt"),
    'view_item' => __("Produkt öffnen"),
    'search_items' => __("Produkt suchen"),
    'not_found' =>  __("Keine Produkte gefunden."),
    'not_found_in_trash' => __("Keine Produkte im Papierkorb gefunden."),
    'featured_image' => __( 'Produktbild' ),
    'set_featured_image' => __( 'Produktbild hinzufügen' ),
    'remove_featured_image' => __( 'Produktbild entfernen' ),
    'use_featured_image' => __( 'Als Produktbild verwenden' ),
    'parent_item_colon' => ''
  );
  
  // Register post type
  register_post_type('product' , array(
    'labels' => $labels,
    'public' => true,
    'has_archive' => false,
    'menu_icon' => 'dashicons-cart',
    'rewrite' => array('slug' => 'product'),
    'supports' => array('title', 'editor', 'thumbnail')
  ) );
}
add_action( 'init', 'product_post_type', 0 );

//Taxonomy for Products
function products_taxonomy() {
  
  // Labels
  $singular = 'Produktkategorie';
  $plural = 'Produktkategorien';
  $labels = array(
    'name' => _x( $plural, "taxonomy general name"),
    'singular_name' => _x( $singular, "taxonomy singular name"),
    'search_items' =>  __("Search $singular"),
    'all_items' => __("All $singular"),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __("Edit $singular"),
    'update_item' => __("Update $singular"),
    'add_new_item' => __("Add New $singular"),
    'new_item_name' => __("New $singular Name")

  );

  // Register and attach to 'products' post type
  register_taxonomy( 'products_taxonomy', 'product', array(
    'public' => true,
    'show_ui' => true,
    'show_in_nav_menus' => true,
    'hierarchical' => true,
    'query_var' => true,
    'rewrite' => false,
    'labels' => $labels
  ) );
}
add_action( 'init', 'products_taxonomy', 0 );

?>