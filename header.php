<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
    <header class="site-header">
        <?php if ( get_theme_mod('logo_position', 'above') === 'above' ) : ?>
            <div class="site-branding">
                <?php the_custom_logo(); ?>
            </div>
        <?php endif; ?>
        
        <nav class="main-navigation">
            <?php if ( get_theme_mod('logo_position', 'above') === 'inline' ) : ?>
                <?php the_custom_logo(); ?>
            <?php endif; ?>
            
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_class'     => 'primary-menu',
            ) );
            ?>
        </nav>
    </header>