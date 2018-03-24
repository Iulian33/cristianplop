<?php
/**
 * Register widget area.
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */

function JH_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'jhfw' ),
        'id'            => 'sidebar-1',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<div class="widget-title">',
        'after_title'   => '</div>',
    ) );
}

add_action( 'widgets_init', 'JH_widgets_init' );
