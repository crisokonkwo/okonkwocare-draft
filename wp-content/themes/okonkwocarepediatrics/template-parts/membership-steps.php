<?php
/**
 * Template part: Membership Steps Section
 */

$args = wp_parse_args($args ?? [], [
  'title' => 'How membership works',
  'intro' => 'A straightforward enrollment process designed to keep care calm and accessible.',
  'steps' => [
    ['n' => '01', 'title' => 'Consult', 'desc' => 'Discuss your child\'s needs and ensure fit.'],
    ['n' => '02', 'title' => 'Enroll', 'desc' => 'Choose the membership option that matches your goals.'],
    ['n' => '03', 'title' => 'Care plan', 'desc' => 'We create a personalized plan with follow-ups.'],
    ['n' => '04', 'title' => 'Ongoing support', 'desc' => 'Direct access and continuity as your child grows.'],
  ],
]);
?>

<section class="bg-slate-50 border-y border-slate-200">
  <div class="mx-auto max-w-7xl px-4 py-10 md:py-10">
    <div class="grid gap-8 lg:grid-cols-12 lg:items-start">
      <div class="lg:col-span-4 max-w-3xl">
        <h2 class="text-2xl font-extrabold tracking-tight text-slate-900 sm:text-3xl">
          <?php echo esc_html($args['title']); ?>
        </h2>
        <p class="mt-3 text-base leading-7 text-slate-700">
          <?php echo esc_html($args['intro']); ?>
        </p>
      </div>

      <div class="lg:col-span-8">
        <ol class="grid gap-4 sm:grid-cols-2">
          <?php foreach ($args['steps'] as $step): ?>
            <li class="rounded-2xl border border-slate-200 bg-white p-5 shadow-soft">
              <div class="flex items-start gap-3">
                <div class="flex h-10 w-10 items-center justify-center shrink-0 rounded-xl bg-brand-800 text-white">
                  <span class="text-sm font-bold"><?php echo esc_html($step['n']); ?></span>
                </div>
                <div>
                  <h3 class="text-base font-semibold text-slate-900"><?php echo esc_html($step['title']); ?></h3>
                  <p class="mt-1 text-sm leading-6 text-slate-600"><?php echo esc_html($step['desc']); ?></p>
                </div>
              </div>
            </li>
          <?php endforeach; ?>
        </ol>
      </div>
    </div>
  </div>
</section>

