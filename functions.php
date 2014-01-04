<?php

// DEFINE global variable THEME_ROOT to make requiring files easier:
define(THEME_ROOT, realpath(__DIR__));

function piss_off() {
    $out = "this is the output of this functin";
    echo $out;
}

/**
 * Register our sidebars and widgetized areas.
 *
 */
function ronald_widgets_init() {

    register_sidebar( array(
        'name' => 'Sidebar',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="rounded">',
        'after_title' => '</h2>',
    ) );
}
add_action( 'widgets_init', 'ronald_widgets_init' );

