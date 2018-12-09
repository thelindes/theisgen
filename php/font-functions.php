<?php

/*add_action( 'wp_ajax_nopriv_ajax_pagination', 'my_ajax_pagination' );
add_action( 'wp_ajax_ajax_pagination', 'my_ajax_pagination' );*/

// Add Google Fonts
function startwordpress_google_fonts() {
    wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Rubik:400,600,800');
    wp_enqueue_style('googleFonts');
}

add_action('wp_print_styles', 'startwordpress_google_fonts');


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
