<?php
/**
 * Template part: Membership CTA Section
 */

$site = okc_site();
?>

<section class="bg-white">
  <div class="mx-auto max-w-7xl px-4 py-10 md:py-10">
    <div class="rounded-3xl border border-slate-200 bg-white p-6 md:p-10 shadow-soft">
      <div class="max-w-3xl">
        <h2 class="text-xl font-extrabold tracking-tight text-slate-900 sm:text-2xl">
          Want to confirm fit before enrolling?
        </h2>
        <p class="mt-3 text-sm leading-6 text-slate-700">
          Schedule a consultation. We'll discuss your goals and whether membership is right for your family.
        </p>

        <div class="mt-6 flex flex-col gap-3 sm:flex-row">
          <a
            href="<?php echo esc_url(home_url('/contact')); ?>"
            class="inline-flex items-center justify-center rounded-xl bg-brand-700 px-5 py-3 text-sm font-semibold text-white no-underline hover:bg-brand-100"
          >
            Request enrollment
          </a>
          <a
            href="tel:<?php echo esc_attr($site['phoneTel']); ?>"
            class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-900 no-underline hover:bg-slate-50"
          >
            Call <?php echo esc_html($site['phoneDisplay']); ?>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
