<?php
function devbenji_theme_setup() {
    // Add support for title tag
    add_theme_support('title-tag');

    // Add support for post thumbnails
    add_theme_support('post-thumbnails');
    
    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'devbenji-ecommerce'),
        'footer'  => __('Footer Menu', 'devbenji-ecommerce'),
    ));
}
add_action('after_setup_theme', 'devbenji_theme_setup');

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

function devbenji_enqueue_styles() {
    // Enqueue the main stylesheet
    wp_enqueue_style('devbenji-style', get_stylesheet_uri());

    // Enqueue the header stylesheet
    wp_enqueue_style('devbenji-header-style', get_template_directory_uri() . '/assets/styles/header.css');
}
add_action('wp_enqueue_scripts', 'devbenji_enqueue_styles');