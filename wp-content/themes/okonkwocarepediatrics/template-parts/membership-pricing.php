<?php
/**
 * Template part: Membership Pricing Section
 */
?>

<section class="bg-linear-to-b from-slate-50 to-slate-30 border-slate-200">
  <div class="mx-auto max-w-7xl px-4 py-10 md:py-10">
    <div class="max-w-3xl">
      <h2 class="text-2xl font-extrabold tracking-tight text-slate-900 sm:text-2xl">
        Membership details
      </h2>
      <p class="mt-3 text-base leading-7 text-slate-700">
        A simple monthly model designed to support continuity, access, and personalized follow-up.
      </p>
    </div>

    <div class="mt-10 grid gap-6 lg:grid-cols-3">
      <!-- Pricing card -->
      <div class="rounded-3xl border border-brand-700/15 bg-brand-50 p-6 shadow-soft">
        <p class="text-xs font-semibold tracking-widest text-brand-700 uppercase">Monthly membership</p>
        <div class="mt-2 flex items-baseline gap-2">
          <span class="text-4xl font-extrabold tracking-tight text-slate-900">$299</span>
          <span class="text-sm text-slate-700">/ child / month</span>
        </div>
        <p class="mt-3 text-sm leading-6 text-slate-700">
          For families with 3 or more children, contact us for rates.
        </p>

        <a
          href="<?php echo esc_url(home_url('/contact')); ?>"
          class="mt-6 inline-flex w-full items-center justify-center rounded-xl bg-brand-700 px-5 py-3 text-sm font-semibold text-white no-underline hover:bg-brand-200"
        >
          Get started
        </a>

        <p class="mt-3 text-xs text-slate-500">
          Enrollment begins with a consultation to confirm fit.
        </p>
      </div>

      <!-- Included list -->
      <div class="lg:col-span-2 rounded-3xl border border-slate-200 bg-white p-6 shadow-soft">
        <h3 class="text-sm font-semibold text-slate-900">What's included</h3>

        <div class="mt-4 grid gap-4 sm:grid-cols-2">
          <?php
          $included = [
            'Longer, unrushed visits',
            'Direct email and phone access',
            'Care coordination when needed',
            'Thoughtful follow-up planning',
            'Telehealth visits when appropriate',
            'ADHD program participation (when recommended)',
          ];
          
          foreach ($included as $item):
          ?>
            <div class="flex items-start gap-3">
              <span class="mt-1 inline-flex h-6 w-6 items-center justify-center rounded-lg bg-brand-50 ring-1 ring-brand-700/15">
                <svg class="h-4 w-4 text-brand-700" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>
              </span>
              <p class="text-sm leading-6 text-slate-700"><?php echo esc_html($item); ?></p>
            </div>
          <?php endforeach; ?>
        </div>

        <div class="mt-6 rounded-2xl border border-slate-200 bg-slate-50 p-4 text-xs leading-5 text-slate-600">
          <strong class="text-slate-800">Note:</strong> The membership model supports continuity and accessibility. It is not insurance.
        </div>
      </div>
    </div>
  </div>
</section>
