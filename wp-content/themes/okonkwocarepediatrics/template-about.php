<?php
/**
 * Template Name: About Dr. Okonkwo Page
 * Template Post Type: page
 * Description: Custom template for the about Dr. Okonkwo page
 */

get_header();
?>

<script type="application/ld+json">
<?php echo wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
</script>



<?php
// Allow Elementor or block editor content
if (have_posts()) :
    while (have_posts()) : the_post();
        the_content();
    endwhile;
endif;
?>

<?php get_footer(); ?>
