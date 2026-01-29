<?php
/**
 * 404 Page Template
 * Displayed when no page matches the requested URL
 */

get_header();
?>

<main>
  <section class="mx-auto max-w-3xl px-4 py-16 text-center space-y-5">
    <h1 class="text-2xl font-bold text-slate-900">Page not found</h1>
    <p class="text-slate-600">Sorry, we couldn't find that page.</p>
    <div class="flex justify-center">
      <a 
        href="<?php echo esc_url(home_url('/')); ?>" 
        class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-900 no-underline transition hover:bg-slate-50 focus-visible:ring-2 focus-visible:ring-brand-600"
      >
        Go home
      </a>
    </div>
  </section>
</main>

<?php get_footer(); ?>
