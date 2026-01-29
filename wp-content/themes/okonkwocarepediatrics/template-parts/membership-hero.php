<?php
/**
 * Template part: Membership Hero Section
 */

$site = okc_site();
?>

<section class="bg-linear-to-b from-slate-50 to-white border-b border-slate-200">
  <div class="mx-auto max-w-7xl px-4 py-10 md:py-10">
    <div class="max-w-3xl">
      <p class="text-xs font-semibold tracking-widest text-brand-700 uppercase">
        Concierge Membership
      </p>

      <h1 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
        Personalized pediatric care with continuity and access
      </h1>

      <p class="mt-4 text-base leading-7 text-slate-700">
        We offer a membership model so families can receive unrushed visits, direct communication, and a consistent care plan—built around your child.
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

      <p class="mt-4 text-sm text-slate-500">
        Please contact our office to schedule a consult to discuss the 6 month program, its cost, and how it can help your child focus, flourish and thrive.
      </p>
    </div>
  </div>
</section>
