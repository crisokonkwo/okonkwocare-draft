<?php get_header(); ?> 

<main>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; else : ?>
        <p><?php esc_html_e('Sorry, no page matched your criteria.', 'okonkwocare'); ?></p>
    <?php endif; ?>
    
</main>

<?php get_footer(); ?>