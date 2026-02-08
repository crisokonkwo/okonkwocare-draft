<?php
/**
 * Template Name: Thank You Page
 * Template Post Type: page
 * Description: Custom template for the thank you page
 */

get_header('simple');
?>

<?php
// Allow Elementor or block editor content
if (have_posts()) :
    while (have_posts()) : the_post();
        the_content();
    endwhile;
endif;
?>

<?php get_footer(); ?>
