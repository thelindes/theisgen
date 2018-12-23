<?php

/*add_action( 'wp_ajax_nopriv_ajax_pagination', 'my_ajax_pagination' );
add_action( 'wp_ajax_ajax_pagination', 'my_ajax_pagination' );*/

// Add Google Fonts
function startwordpress_google_fonts() {
    wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Rubik:400,600,800');
    wp_enqueue_style('googleFonts');
}

add_action('wp_print_styles', 'startwordpress_google_fonts');


function kb_ignore_upload_ext($checked, $file, $filename, $mimes){

	if(!$checked['type']){
	$wp_filetype = wp_check_filetype( $filename, $mimes );
	$ext = $wp_filetype['ext'];
	$type = $wp_filetype['type'];
	$proper_filename = $filename;
   
	if($type && 0 === strpos($type, 'image/') && $ext !== 'svg'){
	$ext = $type = false;
	}
   
	$checked = compact('ext','type','proper_filename');
	}
   
	return $checked;
   }
   
   add_filter('wp_check_filetype_and_ext', 'kb_ignore_upload_ext', 10, 4);

function kb_svg ( $svg_mime ){
	$svg_mime['svg'] = 'image/svg+xml';
	return $svg_mime;
}

add_filter( 'upload_mimes', 'kb_svg' );


/**
 * Return SVG markup.
 *
 * @param string $icon SVG icon id.
 * @return string $svg SVG markup.
 */
function theme_slug_get_svg( $icon = null ) {
	// Return early if no icon was defined.
	if ( empty( $icon ) ) {
		return;
	}

	// Create SVG markup.
	$svg = '<svg class="icon icon-' . esc_attr( $icon ) . '" aria-hidden="true" role="img">';
    $svg .= ' <use xlink:href="' . get_parent_theme_file_uri( '/fonts/theisgen.svg#' ) . esc_html( $icon ) . '"></use> ';
	$svg .= '</svg>';

	return $svg;
}
