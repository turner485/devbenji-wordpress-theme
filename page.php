<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

if (has_post_thumbnail()) : ?>
    <div class="page-banner">
        <?php the_post_thumbnail('full'); // Display the featured image ?>
    </div>

<?php endif; ?>

<?php
get_header();
?>

<div class="page-content">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            the_content();
        endwhile;
    else :
        echo '<p>No content found.</p>';
    endif;
    ?>
</div>

<?php
get_footer();