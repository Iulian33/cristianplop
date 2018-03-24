<?php
/**
 * Google Fonts Import
 */

function google_fonts() {
    $query_args = array(
        //'family' => 'Open+Sans:400,700|Oswald:700'
        //'subset' => 'latin',
    );
    wp_register_style( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
}

add_action('wp_enqueue_scripts', 'google_fonts');