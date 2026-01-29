<?php
/**
 * Template Name: Services Page
 * Template Post Type: page
 * Description: Custom template for the services page
 */

get_header();

// Helper function to render service icons
function okc_service_icon($icon_name) {
  $icons = [
    'stethoscope' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M11 2v2"/><path d="M5 2v2"/><path d="M5 3H4a2 2 0 0 0-2 2v4a6 6 0 0 0 12 0V5a2 2 0 0 0-2-2h-1"/><path d="M8 15a6 6 0 0 0 12 0v-3"/><circle cx="20" cy="10" r="2"/></svg>',
    'brain' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5a3 3 0 1 0-5.997.125 4 4 0 0 0-2.526 5.77 4 4 0 0 0 .556 6.588A4 4 0 1 0 12 18Z"/><path d="M12 5a3 3 0 1 1 5.997.125 4 4 0 0 1 2.526 5.77 4 4 0 0 1-.556 6.588A4 4 0 1 1 12 18Z"/><path d="M15 13a4.5 4.5 0 0 1-3-4 4.5 4.5 0 0 1-3 4"/><path d="M17.599 6.5a3 3 0 0 0 .399-1.375"/><path d="M6.003 5.125A3 3 0 0 0 6.401 6.5"/><path d="M3.477 10.896a4 4 0 0 1 .585-.396"/><path d="M19.938 10.5a4 4 0 0 1 .585.396"/><path d="M6 18a4 4 0 0 1-1.967-.516"/><path d="M19.967 17.484A4 4 0 0 1 18 18"/></svg>',
    'heart-pulse' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/><path d="M3.22 12H9.5l.5-1 2 4.5 2-7 1.5 3.5h5.27"/></svg>',
    'shield-check' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>',
    'thermometer' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M14 4v10.54a4 4 0 1 1-4 0V4a2 2 0 0 1 4 0Z"/></svg>',
    'clipboard-list' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="M12 11h4"/><path d="M12 16h4"/><path d="M8 11h.01"/><path d="M8 16h.01"/></svg>',
    'leaf' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/></svg>',
    'pill' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="m10.5 20.5 10-10a4.95 4.95 0 1 0-7-7l-10 10a4.95 4.95 0 1 0 7 7Z"/><path d="m8.5 8.5 7 7"/></svg>',
  ];
  return $icons[$icon_name] ?? '';
}

$services = [
  [
    'title' => 'Concierge Membership',
    'desc' => 'Longer, unlimited, unrushed visits. Direct text messaging and phone calls to the doctor. Telehealth visits.',
    'icon' => 'stethoscope',
    'href' => home_url('/services/membership'),
  ],
  [
    'title' => 'Holistic ADHD Management',
    'desc' => 'Functional medicine approach to diagnosing and treating the root causes of ADHD, with limited or no medication.',
    'icon' => 'brain',
    'href' => home_url('/services/adhd'),
  ],
  [
    'title' => 'Chronic Disease Management',
    'desc' => 'Provides individualized plans, close monitoring, and specialist communications to sustain long term health in children.',
    'icon' => 'heart-pulse',
  ],
  [
    'title' => 'Preventive Pediatric Care',
    'desc' => 'Focuses on routine check-ups and empathetic guidance to promote lifelong health and emotional well-being.',
    'icon' => 'shield-check',
  ],
  [
    'title' => 'Acute Illness Care',
    'desc' => 'Care for common childhood ailments, prioritizing comfort, holistic options, and empathetic family support.',
    'icon' => 'thermometer',
  ],
  [
    'title' => 'Developmental Screenings',
    'desc' => 'Monitors milestones with compassionate evaluations to identify early needs and nurture your child\'s healthy growth and development.',
    'icon' => 'clipboard-list',
  ],
  [
    'title' => 'Nutrition & Wellness Counseling',
    'desc' => 'Guides families with empathetic advice on nutrition and lifestyles to boost children\'s vitality, emotional health, and daily wellness.',
    'icon' => 'leaf',
  ],
  [
    'title' => 'Holistic Health Support',
    'desc' => 'Integrates conventional medicine with holistic approaches to nurture comprehensive well-being for children compassionately.',
    'icon' => 'pill',
  ],
];
?>

<!-- Services Cards Slider Section -->
<section class="bg-white">
  <div class="mx-auto max-w-7xl px-4 py-10 md:py-10">
    <header class="text-center">
      <h2 class="text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
        What Okonkwo Care Pediatrics Offers
      </h2>
      <p class="mx-auto mt-3 max-w-2xl text-sm leading-5 text-slate-600">
        Concierge-style pediatric care that blends evidence-based medicine with integrative support.
      </p>
    </header>

    <div class="mt-10">
      <div
        data-offer-viewport="services"
        class="overflow-x-auto sm:overflow-visible offer-hide-scrollbar
               scroll-smooth sm:scroll-auto
               snap-x snap-mandatory sm:snap-none
               scroll-px-4"
      >
        <div class="flex gap-5 sm:grid sm:grid-cols-2 lg:grid-cols-4 min-w-full sm:min-w-0">
          <?php foreach ($services as $service): ?>
            <article class="group shrink-0 w-80 sm:w-auto snap-start rounded-2xl border border-slate-200 bg-slate-50 p-5 shadow-soft transition hover:shadow-md <?php echo !empty($service['href']) ? 'hover:border-brand-200' : ''; ?>">
              <div class="space-y-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-50 ring-1 ring-brand-700/15">
                  <div class="h-6 w-6 text-brand-700" aria-hidden="true">
                    <?php echo okc_service_icon($service['icon']); ?>
                  </div>
                </div>

                <div>
                  <h3 class="text-base font-semibold text-slate-900">
                    <?php echo esc_html($service['title']); ?>
                  </h3>

                  <p class="mt-1 text-sm leading-6 text-slate-600">
                    <?php echo esc_html($service['desc']); ?>
                  </p>

                  <?php if (!empty($service['href'])): ?>
                    <a
                      href="<?php echo esc_url($service['href']); ?>"
                      class="mt-2 inline-flex items-center gap-1 text-sm font-medium text-brand-700
                             transition group-hover:gap-2 hover:underline
                             focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 rounded"
                    >
                      Learn more
                      <svg class="h-4 w-4 transition-transform group-hover:translate-x-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </a>
                  <?php endif; ?>
                </div>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Pagination dots - mobile only -->
      <div
        data-offer-pagination="services"
        class="offer-pagination mt-6 flex justify-center gap-3 sm:hidden"
      >
        <?php for ($i = 0; $i < count($services); $i++): ?>
          <button
            class="dot h-3 w-3 rounded-full bg-slate-300"
            aria-label="Go to slide <?php echo ($i + 1); ?>"
            type="button"
          ></button>
        <?php endfor; ?>
      </div>
    </div>
  </div>
</section>

<?php get_template_part('template-parts/four-step-process'); ?>

<?php
// Allow Elementor or block editor content
if (have_posts()) :
    while (have_posts()) : the_post();
        the_content();
    endwhile;
endif;
?>

<?php get_footer(); ?>
