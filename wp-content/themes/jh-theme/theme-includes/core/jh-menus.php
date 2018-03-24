<?php
/**
 * Menu Registration file
 */

// This theme uses wp_nav_menu() in one location.

register_nav_menus(array(
    'primary' => __('Primary Menu', 'jhfw'),
    'footer' => __('Footer Menu', 'jhfw'),
));