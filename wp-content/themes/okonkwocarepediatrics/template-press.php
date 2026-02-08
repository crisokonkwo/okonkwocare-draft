<?php
/**
 * Template Name: Press & Media Page
 * Template Post Type: page
 * Description: Custom template for the press and media page
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
