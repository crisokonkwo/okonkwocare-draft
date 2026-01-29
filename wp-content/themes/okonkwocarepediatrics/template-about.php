<?php
/**
 * Template Name: About Dr. Okonkwo Page
 * Template Post Type: page
 * Description: Custom template for the about Dr. Okonkwo page
 */

get_header();
$site = okc_site();

$clinicName = "Okonkwo Care Pediatrics";
$doctorName = "Dr. Margaret Okonkwo";
$city = "Miami";
$state = "Florida";

$focusAreas = [
  "Preventive care from infancy through young adulthood",
  "Integrative and holistic approaches to pediatric health",
  "ADHD evaluations and ongoing management",
  "Parent education and long-term physician–family relationships",
];

$approachPillars = [
  [
    'title' => 'Evidence-informed care',
    'body' => 'Clinical decisions grounded in pediatric best practices, tailored to each child and family context.',
  ],
  [
    'title' => 'Whole-child perspective',
    'body' => 'Attention to physical health, development, emotional well-being, and family support systems.',
  ],
  [
    'title' => 'Unrushed visits',
    'body' => 'Time to listen, explain, and build a care plan that parents can follow with confidence.',
  ],
  [
    'title' => 'Continuity & accessibility',
    'body' => 'A consistent relationship that supports families across milestones, questions, and concerns.',
  ],
];

// Schema linking
$schema = [
  '@context' => 'https://schema.org',
  '@type' => 'Physician',
  '@id' => home_url('/about-dr-okonkwo/'),
  'name' => 'Dr. Margaret Okonkwo',
  'url' => home_url('/about-dr-okonkwo/'),
  'image' => get_theme_file_uri('images/dr-okonkwo-headshot_v2.jpg'),
  'worksFor' => [
    '@type' => 'MedicalBusiness',
    '@id' => home_url('/#clinic'),
  ],
  'medicalSpecialty' => 'Pediatrics',
];
?>

<script type="application/ld+json">
<?php echo wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
</script>

<main>
  <section class="bg-linear-to-b from-slate-50 to-white">
    <div class="mx-auto max-w-7xl px-4 py-12 md:py-16">
      <div class="grid gap-10 lg:grid-cols-12 lg:items-start">

        <!-- Left: Main content -->
        <div class="order-2 lg:order-1 lg:col-span-7 space-y-8">
          <header class="space-y-3">
            <p class="text-xs font-semibold uppercase tracking-wide text-brand-700">
              About the Physician
            </p>
            <h1 class="text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
              <?php echo esc_html($doctorName); ?>
            </h1>
            <p class="text-base leading-7 text-slate-700">
              <?php echo esc_html($doctorName); ?> (pronounced Oh-kon-kwoh) is a board-certified pediatrician and Functional Medicine 
              ADHD certified expert with over twenty years of experience caring for children and families. 
              She is committed to evidence-informed, whole-child pediatric care grounded in long-term physician-family 
              relationships.
              <br><br>
              Raised in Virginia Beach, Virginia, Dr. Okonkwo completed her undergraduate studies at The College of William & Mary 
              and earned her medical degree at VCU's Medical College of Virginia in Richmond. She ventured to Florida and completed her pediatric residency 
              training at the University of Miami.
              <br><br>
              After residency, she served as a house physician in the cardiology department at Jackson Memorial Hospital. She later expanded her clinical 
              experience through work as a traveling pediatrician, supporting communities with diverse needs.
              <br><br>
              After a few years as a traveling doctor, Dr. Okonkwo returned to Miami to establish Kidstown Pediatrics, 
              where she provided pediatric care for sixteen years. In 2020, she closed the practice with plans to 
              pursue medical missions and return to travel-based clinical work.
              <br><br>
              During the pandemic, she traveled extensively, working as pediatrician in high-need areas across the United States.
              She contributed to early efforts supporting foundations dedicated to serving children in rural communities. 
              Over time, she missed the continuity of caring for families in Miami and recommitted to a practice model 
              centered on personalized, compassionate care.
              <br><br>
              She is thrilled to reconnect with families through her new practice, Okonkwo Care Pediatrics, offering empathetic 
              support for every child's unique health journey.
            </p>
          </header>

          <!-- Focus areas -->
          <section class="space-y-3">
            <h2 class="text-xl font-semibold text-slate-900">Clinical focus</h2>
            <ul class="space-y-2 text-sm text-slate-700">
              <?php foreach ($focusAreas as $item): ?>
                <li class="flex gap-3">
                  <span class="mt-2 h-2 w-2 rounded-full bg-brand-700 flex-none" aria-hidden="true"></span>
                  <span><?php echo esc_html($item); ?></span>
                </li>
              <?php endforeach; ?>
            </ul>
          </section>

          <!-- Approach pillars -->
          <section class="space-y-4">
            <h2 class="text-xl font-semibold text-slate-900">Care philosophy</h2>
            <div class="grid gap-4 sm:grid-cols-2">
              <?php foreach ($approachPillars as $p): ?>
                <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-soft">
                  <h3 class="text-sm font-semibold text-slate-900"><?php echo esc_html($p['title']); ?></h3>
                  <p class="mt-2 text-sm leading-6 text-slate-600"><?php echo esc_html($p['body']); ?></p>
                </div>
              <?php endforeach; ?>
            </div>
          </section>

          <!-- Academic-toned media block -->
          <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-soft space-y-3">
            <h2 class="text-lg font-semibold text-slate-900">Public education & speaking</h2>
            <p class="text-sm leading-6 text-slate-600">
              <?php echo esc_html($doctorName); ?> is regularly invited to speak and provide expert commentary on pediatric health,
              integrative medicine, and parent education. These contributions reflect her commitment to
              community learning and evidence-informed care.
            </p>
            <div class="flex flex-col gap-3 sm:flex-row">
              <a
                href="<?php echo esc_url(home_url('/media')); ?>"
                class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-900 no-underline transition hover:bg-slate-50 focus-visible:ring-2 focus-visible:ring-brand-600"
              >
                View Media & Speaking
              </a>
              <a
                href="<?php echo esc_url(home_url('/contact')); ?>"
                class="inline-flex items-center justify-center rounded-xl bg-brand-700 px-5 py-3 text-sm font-semibold text-white no-underline shadow-sm transition hover:bg-brand-100 focus-visible:ring-2 focus-visible:ring-brand-600"
              >
                Contact Dr. Okonkwo
              </a>
            </div>
          </section>
        </div>

        <!-- Right: Sidebar card (credentials + practical info) -->
        <aside class="order-1 lg:order-2 lg:col-span-5 space-y-6 lg:sticky lg:top-30">

          <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-soft">
            <div class="flex items-start gap-4">
              <div class="h-16 w-16 rounded-2xl bg-slate-100 flex items-center justify-center text-slate-500 text-xs">
                <img
                  src="<?php echo esc_url(get_theme_file_uri('images/dr-okonkwo-headshot_v2.jpg')); ?>"
                  alt="Dr. Margaret Okonkwo, board-certified pediatrician"
                  class="w-auto rounded-2xl object-cover aspect-3/4"
                  loading="eager"
                  decoding="async"
                />
              </div>

              <div class="min-w-0">
                <p class="text-sm font-semibold text-slate-900"><?php echo esc_html($doctorName); ?></p>
                <p class="mt-1 text-sm text-slate-600">
                  Integrative Pediatrics · <?php echo esc_html($city); ?>, <?php echo esc_html($state); ?>
                </p>
              </div>
            </div>

            <dl class="mt-6 space-y-4 text-sm">
              <div class="flex items-start justify-between gap-4">
                <dt class="text-slate-600">Practice</dt>
                <dd class="text-slate-900 text-right"><?php echo esc_html($clinicName); ?></dd>
              </div>
              <div class="flex items-start justify-between gap-4">
                <dt class="text-slate-600">Approach</dt>
                <dd class="text-slate-900 text-right">Evidence-informed, whole-child</dd>
              </div>
              <div class="flex items-start justify-between gap-4">
                <dt class="text-slate-600">Visit style</dt>
                <dd class="text-slate-900 text-right">Personalized, unrushed</dd>
              </div>
            </dl>

            <div class="mt-6 flex flex-col gap-3">
              <a
                href="<?php echo esc_url(home_url('/services')); ?>"
                class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-900 no-underline transition hover:bg-slate-50 focus-visible:ring-2 focus-visible:ring-brand-600"
              >
                Explore Services
              </a>
              <a
                href="<?php echo esc_url(home_url('/contact')); ?>"
                class="inline-flex items-center justify-center rounded-xl bg-brand-700 px-5 py-3 text-sm font-semibold text-white no-underline shadow-sm transition hover:bg-brand-100 focus-visible:ring-2 focus-visible:ring-brand-600"
              >
                Request an Appointment
              </a>
            </div>
          </div>

          <!-- Short "values" note (quiet authority) -->
          <div class="rounded-3xl border border-slate-200 bg-slate-50 p-6">
            <h3 class="text-sm font-semibold text-slate-900">What families can expect</h3>
            <ul class="mt-3 space-y-2 text-sm text-slate-700">
              <li class="flex gap-3">
                <span class="mt-2 h-2 w-2 rounded-full bg-brand-700 flex-none" aria-hidden="true"></span>
                Clear explanations and collaborative decision-making
              </li>
              <li class="flex gap-3">
                <span class="mt-2 h-2 w-2 rounded-full bg-brand-700 flex-none" aria-hidden="true"></span>
                Preventive guidance, development tracking, and long-term support
              </li>
              <li class="flex gap-3">
                <span class="mt-2 h-2 w-2 rounded-full bg-brand-700 flex-none" aria-hidden="true"></span>
                A calm, welcoming environment designed for families
              </li>
            </ul>
          </div>

          <?php get_template_part('template-parts/affiliation'); ?>
        </aside>

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
