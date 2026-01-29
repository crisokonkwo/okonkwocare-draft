<?php
/**
 * Template Name: ADHD Page
 * Description: Custom template for the ADHD program page
 */

get_header();
?>

<?php get_template_part('template-parts/adhd-hero'); ?>
<?php get_template_part('template-parts/adhd-intro-grid'); ?>
<?php get_template_part('template-parts/adhd-comparison'); ?>
<?php get_template_part('template-parts/adhd-program-approach'); ?>
<?php get_template_part('template-parts/adhd-cta'); ?>

<?php
// Allow Elementor or block editor content
if (have_posts()) :
    while (have_posts()) : the_post();
        the_content();
    endwhile;
endif;
?>

<?php get_footer(); ?>
