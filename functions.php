
<?php
if (!defined('ABSPATH')) exit;

function minimal_theme_setup() {
    // Theme Support
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('woocommerce');
    
    // Register Navigation Menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'minimal-theme'),
        'footer' => __('Footer Menu', 'minimal-theme')
    ));
}
add_action('after_setup_theme', 'minimal_theme_setup');

// Enqueue scripts and styles
function minimal_theme_scripts() {
    // Enqueue Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');
    
    // Enqueue main stylesheet
    wp_enqueue_style('minimal-theme-style', get_stylesheet_uri());
    
    // Enqueue JavaScript
    wp_enqueue_script('minimal-theme-script', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
    
    // Localize script for dark mode
    wp_localize_script('minimal-theme-script', 'themeSettings', array(
        'darkMode' => get_theme_mod('enable_dark_mode', true)
    ));
}
add_action('wp_enqueue_scripts', 'minimal_theme_scripts');

// Register widget areas
function minimal_theme_widgets_init() {
    register_sidebar(array(
        'name' => __('Footer Widget Area', 'minimal-theme'),
        'id' => 'footer-widget-area',
        'description' => __('Add widgets here to appear in footer.', 'minimal-theme'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
}
add_action('widgets_init', 'minimal_theme_widgets_init');

// Customizer settings
function minimal_theme_customize_register($wp_customize) {
    // Logo Position
    $wp_customize->add_setting('logo_position', array(
        'default' => 'above',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('logo_position', array(
        'label' => __('Logo Position', 'minimal-theme'),
        'section' => 'title_tagline',
        'type' => 'select',
        'choices' => array(
            'above' => __('Above Navigation', 'minimal-theme'),
            'inline' => __('Inside Navigation (Left)', 'minimal-theme'),
        ),
    ));

    // Typography
    $wp_customize->add_section('typography', array(
        'title' => __('Typography', 'minimal-theme'),
        'priority' => 35,
    ));

    // Body Font Size
    $wp_customize->add_setting('body_font_size', array(
        'default' => '14',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('body_font_size', array(
        'label' => __('Body Font Size (px)', 'minimal-theme'),
        'section' => 'typography',
        'type' => 'number',
    ));

    // Dark Mode
    $wp_customize->add_section('dark_mode', array(
        'title' => __('Dark Mode', 'minimal-theme'),
        'priority' => 40,
    ));

    $wp_customize->add_setting('enable_dark_mode', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    $wp_customize->add_control('enable_dark_mode', array(
        'label' => __('Enable Dark Mode Toggle', 'minimal-theme'),
        'section' => 'dark_mode',
        'type' => 'checkbox',
    ));
}
add_action('customize_register', 'minimal_theme_customize_register');

// Add lazy loading to images
function add_lazy_loading($content) {
    return preg_replace('/<img(.*?)src=/is', '<img$1loading="lazy" src=', $content);
}
add_filter('the_content', 'add_lazy_loading');

// Add default footer widgets
function minimal_theme_default_widgets() {
    // Only run if widgets haven't been set up
    if (!get_option('minimal_theme_widgets_installed')) {
        // Quick Links Widget
        $quick_links = array(
            'title' => 'Quick Links',
            'nav_menu' => wp_get_nav_menu_object('Primary Menu')->term_id
        );
        update_option('widget_nav_menu', array(2 => $quick_links, '_multiwidget' => 1));
        
        // Social Links Widget
        $social_links = array(
            'title' => 'Connect With Us',
            'text' => '<a href="#">Facebook</a><br><a href="#">Twitter</a><br><a href="#">Instagram</a>'
        );
        update_option('widget_text', array(2 => $social_links, '_multiwidget' => 1));

        // Add widgets to footer area
        update_option('sidebars_widgets', array(
            'footer-widget-area' => array(
                'nav_menu-2',
                'text-2'
            ),
            'array_version' => 3
        ));

        update_option('minimal_theme_widgets_installed', true);
    }
}
add_action('after_switch_theme', 'minimal_theme_default_widgets');

function minimal_theme_setup_default_pages() {
    // Check if the pages have been created before
    if (!get_option('minimal_theme_pages_created')) {

        // Log to confirm function is being triggered
        error_log('Minimal Theme: Creating default pages');

        // Create the Home page
        $home_page_id = wp_insert_post(array(
            'post_title'    => 'Home',
            'post_content'  => '<!-- wp:cover {"url":"' . get_template_directory_uri() . '/assets/images/hero-image.jpg","dimRatio":50} -->
                <div class="wp-block-cover" style="background-image:url(' . get_template_directory_uri() . '/assets/hero-image.jpg);">
                    <div class="wp-block-cover__inner-container">
                        <!-- wp:heading {"level":1} -->
                        <h1>Welcome to Minimal Theme</h1>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph -->
                        <p>Experience the best design and functionality out of the box.</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:buttons -->
                        <div class="wp-block-buttons">
                            <div class="wp-block-button"><a class="wp-block-button__link" href="#">Learn More</a></div>
                        </div>
                        <!-- /wp:buttons -->
                    </div>
                </div>
                <!-- /wp:cover -->

                <!-- wp:columns -->
                <div class="wp-block-columns">
                    <!-- wp:column -->
                    <div class="wp-block-column">
                        <!-- wp:heading -->
                        <h2>Beautiful Designs</h2>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph -->
                        <p>Our theme comes with stunning design elements to enhance your website.</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:column -->

                    <!-- wp:column -->
                    <div class="wp-block-column">
                        <!-- wp:heading -->
                        <h2>Fast & Secure</h2>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph -->
                        <p>Optimized for speed and security, ensuring great performance.</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:column -->

                    <!-- wp:column -->
                    <div class="wp-block-column">
                        <!-- wp:heading -->
                        <h2>Fully Responsive</h2>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph -->
                        <p>Your website will look great on any device, from desktops to mobiles.</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:column -->
                </div>
                <!-- /wp:columns -->

            
                <!-- wp:heading -->
                <h2>Get Started Today</h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p>Set up your website in minutes with Minimal Theme.</p>
                <!-- /wp:paragraph -->',
            'post_status'   => 'publish',
            'post_type'     => 'page',
        ));

        // Log if there was an error creating the Home page
        if (is_wp_error($home_page_id)) {
            error_log('Error creating Home page: ' . $home_page_id->get_error_message());
        } else {
            error_log('Home page created with ID: ' . $home_page_id);
        }

        // Create the Blog page (this one seems optional but you can add it)
        $blog_page_id = wp_insert_post(array(
            'post_title'    => 'Blog',
            'post_content'  => '',
            'post_status'   => 'publish',
            'post_type'     => 'page',
        ));

        // Log if there was an error creating the Blog page
        if (is_wp_error($blog_page_id)) {
            error_log('Error creating Blog page: ' . $blog_page_id->get_error_message());
        } else {
            error_log('Blog page created with ID: ' . $blog_page_id);
        }

        // Set the pages for Front and Blog
        if ($home_page_id && $blog_page_id) {
            update_option('show_on_front', 'page');
            update_option('page_on_front', $home_page_id);
            update_option('page_for_posts', $blog_page_id);
        }

        // Mark pages as created
        update_option('minimal_theme_pages_created', true);
    }
}
add_action('after_switch_theme', 'minimal_theme_setup_default_pages');
