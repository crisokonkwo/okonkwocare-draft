<?php
/**
 * Template Name: Patient Resources Page
 * Template Post Type: page
 */

get_header();
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
