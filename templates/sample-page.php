<?php
/**
 * Template Name: Sample Page
 * Description: A sample page template showcasing theme capabilities
 */

get_header(); ?>

<div class="sample-page">
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1><?php echo get_theme_mod('sample_hero_title', 'Welcome to Our Site'); ?></h1>
            <p><?php echo get_theme_mod('sample_hero_description', 'Discover amazing features and possibilities.'); ?></p>
            <div class="cta-buttons">
                <a href="#" class="button primary">Get Started</a>
                <a href="#" class="button secondary">Learn More</a>
            </div>
        </div>
    </section>

    <!-- Feature Cards -->
    <section class="features">
        <div class="container">
            <div class="feature-grid">
                <?php for($i = 1; $i <= 3; $i++) : ?>
                    <div class="feature-card">
                        <div class="icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <h3>Feature <?php echo $i; ?></h3>
                        <p>Description for feature <?php echo $i; ?></p>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="content">
        <div class="container">
            <div class="content-grid">
                <div class="text-content">
                    <h2>About Us</h2>
                    <p>Sample content showcasing typography and layout.</p>
                    <ul>
                        <li>Feature point 1</li>
                        <li>Feature point 2</li>
                        <li>Feature point 3</li>
                    </ul>
                </div>
                <div class="image-content">
                    <img src="<?php echo get_theme_file_uri('assets/images/placeholder.jpg'); ?>" alt="Placeholder">
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="statistics">
        <div class="container">
            <div class="stats-grid">
                <?php
                $stats = array(
                    array('number' => '100+', 'label' => 'Clients'),
                    array('number' => '500+', 'label' => 'Projects'),
                    array('number' => '50+', 'label' => 'Awards')
                );
                foreach($stats as $stat) : ?>
                    <div class="stat-card">
                        <div class="number"><?php echo $stat['number']; ?></div>
                        <div class="label"><?php echo $stat['label']; ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta">
        <div class="container">
            <h2>Ready to Get Started?</h2>
            <p>Join us today and transform your digital presence.</p>
            <a href="#" class="button primary">Contact Us</a>
        </div>
    </section>
</div>

<?php get_footer(); ?>