<?php
/**
 * Resets of Default theme
 */

// Remove WP version param from any enqueued scripts
function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}

function remove_wp_logo( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'wp-logo' );
}

function remove_type_atribute($tag) {
    return preg_replace("/type=['\"]text\/(javascript|css)['\"]/", '', $tag);
}

function admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}

function custom_menu_page_removing() {
    remove_menu_page( 'edit-comments.php' );
    remove_post_type_support('page', 'editor');
}

function footer_admin_credentials() {
    $footer_admin_text = 'Developed by ';
    $author_website = 'Julian Hook';
    echo $footer_admin_text . '<a href="http://julianhook.com/" 
                                  target="_blank">' . $author_website . '</a>';
}

function remove_default_post_type() {
    remove_menu_page('edit.php');
}




//add_filter('acf/settings/show_admin', '__return_false');
add_action('admin_menu','remove_default_post_type');
add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );
add_action( 'wp_before_admin_bar_render', 'admin_bar_render' );
add_action( 'admin_menu', 'custom_menu_page_removing' );
add_filter('style_loader_tag', 'remove_type_atribute', 10, 2);
add_filter('script_loader_tag', 'remove_type_atribute', 10, 2);
add_filter('admin_footer_text', 'footer_admin_credentials');
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
