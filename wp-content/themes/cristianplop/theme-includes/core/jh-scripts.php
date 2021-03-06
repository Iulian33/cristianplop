<?php
/**
 * Theme scripts and styles
 */

function JH_scripts() {

    // Imports of styles
    wp_enqueue_style('fonts-awesome', get_template_directory_uri() . '/vendor/css/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/vendor/css/owl.carousel/owl.carousel.css');
    wp_enqueue_style('mmenu', get_template_directory_uri() . '/vendor/css/mmenu/jquery.mmenu.all.css');
    wp_enqueue_style('main-style', get_template_directory_uri() . '/style.css');


    // Import Of Scripts
    wp_enqueue_script('JH-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true);
    wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/vendor/js/owl.carousel/owl.carousel.min.js', array('jquery'), '', true);
    wp_enqueue_script('mmenu', get_template_directory_uri() . '/vendor/js/mmenu/jquery.mmenu.min.all.js', array('jquery'), '', true);
    wp_enqueue_script('dropkick', get_template_directory_uri() . '/vendor/js/dropkick.min.js', array('jquery'), '', true);
    wp_enqueue_script('mainjs', get_template_directory_uri() . '/js/main.js', array('jquery'), '', true);

    if (is_page_template('tpl-contact.php')) {
        wp_enqueue_script(
            'google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDPEng8fkd9N8nWbWDZBjoyKT0Q_ZM1r2Q',
            array('jquery'),
            '',
            true
        );
    }

}

function JH_jquery_to_footer() {
    if (is_admin())
        return;

    wp_script_add_data('jquery', 'group', 1);
    wp_script_add_data('jquery-core', 'group', 1);
    wp_script_add_data('jquery-migrate', 'group', 1);
}


function wrap_gform_cdata_open($content = '') {
    if ((defined('DOING_AJAX') && DOING_AJAX) || isset($_POST['gform_ajax'])) {
        return $content;
    }
    $content = 'document.addEventListener( "DOMContentLoaded", function() { ';
    return $content;
}


function wrap_gform_cdata_close($content = '') {
    if ((defined('DOING_AJAX') && DOING_AJAX) || isset($_POST['gform_ajax'])) {
        return $content;
    }
    $content = ' }, false );';
    return $content;
}




add_action('wp_enqueue_scripts', 'JH_scripts');
add_action('wp', 'JH_jquery_to_footer');

add_filter('gform_init_scripts_footer', '__return_true');
add_filter('gform_cdata_open', 'wrap_gform_cdata_open', 1);
add_filter('gform_cdata_close', 'wrap_gform_cdata_close', 99);

