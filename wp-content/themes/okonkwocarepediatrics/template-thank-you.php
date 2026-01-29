<?php
/**
 * Template Name: Thank You Page
 * Template Post Type: page
 * Description: Custom template for the thank you page
 */

get_header('simple');
?>


  <section class="bg-white">
    <div class="mx-auto max-w-3xl px-4 py-16 text-center">
      <h1 class="text-3xl font-extrabold tracking-tight text-slate-900">Thank you</h1>
      <p class="mx-auto mt-3 max-w-xl text-sm leading-6 text-slate-600">
        Thank you for taking the time to complete this form. We will respond as soon as possible.
      </p>
      <a 
        href="<?php echo esc_url(home_url('/')); ?>" 
        class="mt-6 inline-flex rounded-2xl bg-brand-700 px-5 py-3 text-sm font-semibold text-white no-underline hover:bg-brand-100"
      >
        Return home
      </a>
    </div>
  </section>