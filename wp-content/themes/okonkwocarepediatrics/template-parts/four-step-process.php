<?php
/**
 * Template part: Four Step Process
 * Displays the 4-step enrollment process
 */

$args = wp_parse_args($args ?? [], [
  'title' => 'Our 4-step Process',
  'intro' => 'A concierge-style pediatric experience designed for unrushed visits, direct access, and a whole-child approach. We emphasizes integrative care, blending traditional and holistic approaches to nurture your child\'s physical, emotional, and social well-being. Follow these four steps to join our caring community and begin your family\'s journey toward holistic pediatric care:',
  'steps' => [
    ['n' => '01', 'title' => 'Family health goals', 'desc' => 'Schedule a meet-and-greet to discuss your child\'s needs and priorities.'],
    ['n' => '02', 'title' => 'Enroll family', 'desc' => 'Choose a membership option that fits your child\'s age and needs.'],
    ['n' => '03', 'title' => 'Access care', 'desc' => 'Get direct access via unrushed visits, calls, emails, and telehealth.'],
    ['n' => '04', 'title' => 'Begin journey', 'desc' => 'Ongoing guidance and integrative support tailored to your child\'s unique needs.'],
  ],
]);
?>

<section class="bg-white">
  <div class="mx-auto max-w-7xl px-4 py-12">
    <div class="grid gap-8 lg:grid-cols-12 lg:items-start">
      <div class="lg:col-span-4">
        <h2 class="text-2xl font-bold tracking-tight text-slate-900">
          <?php echo esc_html($args['title']); ?>
        </h2>
        <p class="mt-3 text-sm leading-6 text-slate-600 whitespace-pre-line">
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
