<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <section class="error-404 not-found">
            <header class="page-header">
                <h1 class="page-title"><?php _e('Oops! That page can’t be found.', 'devbenji-ecommerce'); ?></h1>
            </header>

            <div class="page-content">
                <p><?php _e('It looks like nothing was found at this location. Maybe try a search?', 'devbenji-ecommerce'); ?></p>
                <?php get_search_form(); ?>
            </div>
        </section>
    </main>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
