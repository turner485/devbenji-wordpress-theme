<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

if (has_post_thumbnail()) : ?>
    <div class="page-banner">
        <?php the_post_thumbnail('full'); // Display the featured image ?>
    </div>

<?php endif; ?>

<?php

get_header(); // Include the header

if (have_posts()) : 
    while (have_posts()) : 
        the_post(); 
        ?>
        <main id="main-content">
            <h1><?php the_title(); ?></h1>
            <div><?php the_content(); ?></div>
        </main>
        <?php 
    endwhile; 
else : 
    echo '<p>No content available for the homepage.</p>'; 
endif;

get_footer(); // Include the footer
?>
