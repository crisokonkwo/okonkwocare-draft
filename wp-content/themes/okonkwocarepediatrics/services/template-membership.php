<?php
/**
 * Template Name: Membership Page
 * Description: Custom template for the Membership page
 */

get_header();
?>

<?php get_template_part('template-parts/membership-hero'); ?>
<?php get_template_part('template-parts/membership-who-its-for'); ?>
<?php get_template_part('template-parts/membership-pricing'); ?>
<?php get_template_part('template-parts/membership-adhd-options'); ?>
<?php get_template_part('template-parts/membership-steps'); ?>
<?php get_template_part('template-parts/membership-faq'); ?>
<?php get_template_part('template-parts/membership-cta'); ?>

<?php get_footer(); ?>