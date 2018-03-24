<?php
/**
 * Admin Styles
 */

function jh_admin_scripts() {
    if(is_admin()){
        wp_enqueue_script('admin-script', get_bloginfo('template_url').'/js/admin.js', array('jquery'));
    }
}

function admin_color_schemes() {
    $theme_dir = get_template_directory_uri();
    wp_admin_css_color( 'green', __( 'JH Colors' ),
        $theme_dir . '/css/admin-colors.css',
        array( '#1DE9B6', '#000', '#004D40', '#f2fcff' )
    );
}

function set_default_admin_color($user_id) {
    $args = array(
        'ID' => $user_id,
        'admin_color' => 'orange'
    );
    wp_update_user($args);
}

function adminbar_styles() {
    if ( is_admin_bar_showing() ) {
        $theme_dir = get_template_directory_uri();
        wp_enqueue_style( 'admin-bar-overrides', $theme_dir . '/css/admin-colors.css', array( 'admin-bar' ), null, 'all' );
    }
}

add_action('admin_init', 'admin_color_schemes');
add_action('user_register', 'set_default_admin_color');
add_action( 'wp_head', 'adminbar_styles' );
add_action('admin_enqueue_scripts', 'jh_admin_scripts');