<footer class="site-footer">
        <div class="footer-widgets">
            <?php dynamic_sidebar( 'footer-widget-area' ); ?>
        </div>
        
        <nav class="footer-navigation">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'footer',
                'menu_class'     => 'footer-menu',
            ) );
            ?>
        </nav>
        
        <div class="site-info">
            <?php echo get_theme_mod( 'copyright_text', '© ' . date('Y') . ' ' . '//devbenji' ); ?>
        </div>
    </footer>

    <button class="back-to-top" aria-label="Back to top">↑</button>
    <button class="dark-mode-toggle" aria-label="Toggle dark mode">🌓</button>
    
    <?php wp_footer(); ?>
</body>
</html>