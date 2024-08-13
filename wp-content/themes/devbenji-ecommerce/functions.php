<?php
function my_custom_theme_setup() {
    // Add support for title tag
    add_theme_support('title-tag');

    // Add support for post thumbnails
    add_theme_support('post-thumbnails');

    // Register a navigation menu
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'devbenji-ecommerce'),
    ));
}
add_action('after_setup_theme', 'my_custom_theme_setup');

function my_custom_theme_widgets_init() {
    register_sidebar(array(
        'name'          => __('Main Sidebar', 'devbenji-ecommerce'),
        'id'            => 'main-sidebar',
        'description'   => __('Widgets in this area will be shown in the sidebar.', 'devbenji-ecommerce'),
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'my_custom_theme_widgets_init');


function my_custom_theme_enqueue_scripts() {
    // Enqueue
}