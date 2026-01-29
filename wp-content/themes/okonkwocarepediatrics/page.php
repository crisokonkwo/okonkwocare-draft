<?php get_header(); ?>

<main class="mx-auto max-w-7xl px-4 py-12">
  <?php while (have_posts()) : the_post(); ?>
    <article>
      <h1 class="text-3xl font-bold text-slate-900 mb-6"><?php the_title(); ?></h1>
      <div class="prose max-w-none">
        <?php the_content(); ?>
      </div>
    </article>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
