<?php
/**
 * Template Name: Patient Resources Page
 * Template Post Type: page
 */

get_header();
$site = okc_site();

$dosing = [
  [
    'title' => 'Acetaminophen (Tylenol) Dosing Chart',
    'href' => 'https://drive.google.com/file/d/1RBakngDqCUzwOoF8n9kDj_RF22cBbKPI/view?usp=drive_link',
    'note' => 'Use your child\'s weight when possible. If you\'re unsure, call the office before dosing.',
    'type' => 'PDF',
    'updated' => 'January 2026',
  ],
  [
    'title' => 'Ibuprofen (Motrin) Dosing Chart',
    'href' => 'https://drive.google.com/file/d/1FyYj9z0Z45UWIryaEJ3kvwTN00mSswz2/view?usp=drive_link',
    'note' => 'Not for infants under 6 months unless directed by a clinician.',
    'type' => 'PDF',
    'updated' => 'January 2026',
  ],
];

$sites = [
  [
    'title' => 'American Academy of Pediatrics (AAP)',
    'href' => 'https://www.aap.org/',
    'desc' => 'Dedicated to the health of all children. Read more on their website for reliable advice on a variety of children\'s health topics.',
  ],
  [
    'title' => 'AAP HealthyChildren.org',
    'href' => 'https://www.healthychildren.org/English/Pages/default.aspx',
    'desc' => 'The official parenting website of the AAP which has a range of resources as well as advice on a variety of pediatric topics.',
  ],
  [
    'title' => 'KidsHealth',
    'href' => 'https://kidshealth.org/',
    'desc' => 'One of the largest and most visited websites providing doctor-approved health information about children and adolescents.',
  ],
];
?>

<main>
  <!-- HERO -->
  <section class="bg-linear-to-b from-slate-50 to-white border-b border-slate-200">
    <div class="mx-auto max-w-7xl px-4 py-10 md:py-10">
      <p class="text-xs font-semibold tracking-widest text-brand-700 uppercase">
        Patient resources
      </p>
      <h1 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
        Patient Resources
      </h1>
      <p class="mt-4 max-w-2xl text-base leading-7 text-slate-700">
        Below are reliable websites and practical references for common pediatric questions.
        Please contact our office if you have questions about your child's symptoms or care.
      </p>
    </div>
  </section>

  <!-- DOSING CHARTS -->
  <section class="bg-white">
    <div class="mx-auto max-w-7xl px-4 py-10 md:py-10">
      <div class="flex items-end justify-between gap-6">
        <div class="max-w-2xl">
          <h2 class="text-2xl font-extrabold tracking-tight text-slate-900 sm:text-3xl">
            Medication Dosing Charts
          </h2>
        </div>
      </div>

      <div class="mt-8 grid gap-5 md:grid-cols-2">
        <?php foreach ($dosing as $item): ?>
          <article class="rounded-3xl border border-slate-200 bg-slate-50 p-6 shadow-soft">
            <div class="flex items-start gap-3">
              <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-brand-50 ring-1 ring-brand-700/15">
                <svg class="h-5 w-5 text-brand-700" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
              </span>

              <div class="min-w-0">
                <h3 class="flex items-center gap-2 text-base font-semibold text-slate-900">
                  <?php echo esc_html($item['title']); ?>
                  <span class="inline-flex items-center rounded-md border border-slate-200 bg-white px-2 py-0.5 text-[11px] font-medium text-slate-600">
                    <?php echo esc_html($item['type']); ?>
                  </span>
                </h3>

                <p class="mt-2 text-sm leading-6 text-slate-700">
                  <?php echo esc_html($item['note']); ?>
                </p>

                <p class="<?php echo (strpos($item['updated'], '2025') !== false) ? 'mt-2 text-xs text-amber-600' : 'mt-2 text-xs text-slate-500'; ?>">
                  Last updated: <?php echo esc_html($item['updated']); ?>
                </p>

                <a
                  href="<?php echo esc_url($item['href']); ?>"
                  target="_blank"
                  rel="noreferrer"
                  class="mt-4 inline-flex items-center gap-2 rounded-xl bg-brand-700 px-4 py-2 text-sm font-semibold text-white no-underline hover:bg-brand-100 focus-visible:ring-2 focus-visible:ring-brand-600"
                >
                  View chart
                  <svg class="h-4 w-4" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                  </svg>
                </a>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>

      <div class="mt-8 rounded-2xl border border-slate-200 bg-white p-4 text-xs leading-5 text-slate-600">
        <div class="flex items-start gap-2">
          <svg class="mt-0.5 h-4 w-4 text-brand-700" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
          </svg>
          <p>
            <strong class="text-slate-800">Safety note:</strong> Always follow your clinician's instructions.
            If your child has trouble breathing, severe lethargy, or worsening symptoms, seek urgent care.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- TRUSTED SITES -->
  <section class="bg-slate-50 border-t border-slate-200">
    <div class="mx-auto max-w-7xl px-4 py-12 md:py-16">
      <h2 class="text-2xl font-extrabold tracking-tight text-slate-900 sm:text-3xl">
        General Pediatric Sites
      </h2>
      <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-700">
        Evidence-based resources we recommend for parents.
      </p>

      <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
        <?php foreach ($sites as $s): ?>
          <article class="rounded-3xl border border-slate-200 bg-white p-6 shadow-soft">
            <h3 class="text-base font-semibold text-slate-900"><?php echo esc_html($s['title']); ?></h3>
            <p class="mt-2 text-sm leading-6 text-slate-700"><?php echo esc_html($s['desc']); ?></p>
            <a
              href="<?php echo esc_url($s['href']); ?>"
              target="_blank"
              rel="noreferrer"
              class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-brand-700 hover:underline focus-visible:ring-2 focus-visible:ring-brand-600 rounded"
            >
              Visit site
              <svg class="h-4 w-4" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
              </svg>
            </a>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

</main>

<?php
// Allow Elementor or block editor content
if (have_posts()) :
    while (have_posts()) : the_post();
        the_content();
    endwhile;
endif;
?>

<?php get_footer(); ?>
