<?php
/**
 * load JH login styles
 */

function JH_login_screen_style() {
    wp_enqueue_style( 'login-styles', get_template_directory_uri().'/css/JHfw_login_style.css', false );
    wp_enqueue_script( 'jquery' );
}

function header_form_logo(){
    echo '<h1 class="logo_insign"> <img src="'. get_template_directory_uri() . '/images/Jh-insign.png" alt="Julian Hook Theme"> </h1>';
}

add_action( 'login_enqueue_scripts', 'JH_login_screen_style', 10 );
add_action('login_message', 'header_form_logo');