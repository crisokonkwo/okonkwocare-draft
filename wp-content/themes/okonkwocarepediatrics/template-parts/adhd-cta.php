<?php
/**
 * Template part: ADHD CTA Section
 */
?>

<section class="bg-white">
  <div class="mx-auto max-w-7xl px-4 py-10 md:py-10">
    <div class="rounded-3xl border border-brand-700/15 bg-brand-50/50 px-6 py-5 sm:px-5 md:py-6">
      <div class="max-w-3xl">
        <h2 class="text-xl font-extrabold tracking-tight text-slate-900 sm:text-2xl">
          Ready to explore whether this program is a fit?
        </h2>
        <p class="mt-3 text-sm leading-6 text-slate-700">
          This program is not designed for families looking for quick fixes. It is for those seeking a thoughtful, individualized, medically grounded approach to ADHD care.
        </p>

        <div class="mt-6 flex flex-col gap-3 sm:flex-row">
          <a
            href="<?php echo esc_url(home_url('/services/membership')); ?>"
            class="inline-flex items-center justify-center rounded-xl bg-brand-700 px-5 py-3 text-sm font-semibold text-white no-underline hover:bg-brand-100"
          >
            View membership details
          </a>
          <a
            href="<?php echo esc_url(home_url('/contact')); ?>"
            class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-900 no-underline hover:bg-slate-50"
          >
            Schedule a consult
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
