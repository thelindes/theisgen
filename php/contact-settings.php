<?php
//Product custom post type
function contact_post_type() {
   
   // Labels
  $labels = array(
    'name' => _x("Kontaktinfos", "post type general name"),
    'singular_name' => _x("Kontaktinfos", "post type singular name"),
    'menu_name' => 'Kontaktinfos',
    'add_new' => _x("Neue Kontaktinformation", "Produkt"),
    'add_new_item' => __("Kontaktinformation Hinzufügen"),
    'edit_item' => __("Kontaktinformation bearbeiten"),
    'new_item' => __("Neue Kontaktinformation"),
    'view_item' => __("Kontaktinformation öffnen"),
    'search_items' => __("Kontaktinformation suchen"),
    'not_found' =>  __("Keine Kontaktinformationen gefunden."),
    'not_found_in_trash' => __("Keine Kontaktinformationen im Papierkorb gefunden."),
    'parent_item_colon' => ''
  );
  
  // Register post type
  register_post_type('contactinfo' , array(
    'labels' => $labels,
    'public' => true,
    'has_archive' => false,
    'menu_icon' => 'dashicons-id-alt',
    'rewrite' => array('slug' => 'contactinfo'),
    'supports' => array('title', 'editor')
  ) );
}
add_action( 'init', 'contact_post_type', 0 );

