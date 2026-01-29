<?php
/**
 * Template part: ADHD Hero Section
 */

$site = okc_site();

// Get ACF fields (with fallbacks to original content)
$eyebrow = get_field('adhd_hero_eyebrow') ?: 'Six-Month Integrative Holistic ADHD Program';
$title = get_field('adhd_hero_title') ?: 'A Root-Cause Approach to ADHD Treatment';
$description = get_field('adhd_hero_description') ?: 'Our Holistic ADHD Program is a structured, physician-led, six-month integrative care model designed to uncover and address the underlying contributors to ADHD — not just manage symptoms.';
?>

<section class="bg-white">
  <div class="mx-auto max-w-7xl px-4 py-10 md:py-10">
    <div class="max-w-3xl">
      <p class="text-xs font-semibold uppercase tracking-wide text-brand-700">
        <?php echo esc_html($eyebrow); ?>
      </p>

      <h1 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
        <?php echo esc_html($title); ?>
      </h1>

      <p class="mt-4 text-base leading-7 text-slate-700">
        <?php echo esc_html($description); ?>
      </p>
    </div>
  </div>
</section>
