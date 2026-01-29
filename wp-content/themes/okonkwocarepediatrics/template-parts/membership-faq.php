<?php
/**
 * Template part: Membership FAQ Section
 */

$faqs = [
  [
    'q' => 'Is this insurance?',
    'a' => 'No. Membership supports access and continuity. Families may still use insurance separately for covered services elsewhere.',
  ],
  [
    'q' => 'Do you offer telehealth?',
    'a' => 'Yes, when appropriate and clinically safe, telehealth can be part of follow-up care.',
  ],
  [
    'q' => 'How does this connect to the ADHD program?',
    'a' => 'If your child is a fit for the Holistic ADHD Program, membership supports continuity, follow-up, and ongoing guidance.',
  ],
];
?>

<section class="bg-white">
  <div class="mx-auto max-w-7xl px-4 py-12 md:py-16">
    <div class="max-w-3xl">
      <h2 class="text-2xl font-extrabold tracking-tight text-slate-900 sm:text-3xl">
        Common questions
      </h2>
    </div>

    <div class="mt-8 grid gap-5 lg:grid-cols-3">
      <?php foreach ($faqs as $faq): ?>
        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-soft">
          <h3 class="text-sm font-semibold text-slate-900"><?php echo esc_html($faq['q']); ?></h3>
          <p class="mt-2 text-sm leading-6 text-slate-700"><?php echo esc_html($faq['a']); ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
