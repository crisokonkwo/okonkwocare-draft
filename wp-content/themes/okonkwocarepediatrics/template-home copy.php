<?php
/**
 * Template Name: Home Page
 * Template Post Type: page
 * Description: Custom template for the homepage
 */

get_header();

$site = okc_site();
?>

<?php
// Allow Elementor or block editor content
if (have_posts()) :
    while (have_posts()) : the_post();
        the_content();
    endwhile;
endif;
?>

<section class="bg-linear-to-b from-slate-50 to-white">
  <div class="mx-auto max-w-7xl px-4 py-10 md:py-10">
    <div class="grid items-start gap-10 lg:grid-cols-2">
      <div class="space-y-6">
        <header class="text-center lg:text-center">
          <p class="text-xs font-semibold uppercase tracking-wide text-brand-700">
            Welcome to Okonkwo Care Pediatrics
          </p>
          <h1 class="text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
            Trusted Holistic Integrative Pediatric Care in Miami, Florida
          </h1>
        </header>

        <p class="text-base sm:text-md leading-7 text-slate-700">
          Okonkwo Care Pediatrics is a concierge-style practice led by Dr. Margaret Okonkwo, offering personalized, unrushed visits that integrate evidence-based traditional pediatrics with holistic approach to support your child's physical, emotional, and social well-being. From comprehensive preventive care to specialized ADHD evaluations and management, we prioritize strong doctor-patient relationships to ensure every child receives tailored, compassionate care from infancy to young adulthood.
        </p>

        <h2 class="text-xl font-bold tracking-tight text-slate-900 sm:text-xl mb-2">
          Two ways Okonkwo Care Pediatrics support your child's health
        </h2>

        <p class="mx-auto mt-2 max-w-xl text-sm leading-6 text-slate-600 lg:mx-0">
          Our practice is built around two core offerings: a <span class="font-semibold text-slate-900">Holistic ADHD Program</span> and a <span class="font-semibold text-slate-900">Concierge Membership</span> for unrushed, relationship-based pediatric care. Thoughtfully designed care paths for families seeking deeper support and long-term partnership.
        </p>

        <ul class="space-y-3 text-sm sm:text-base text-slate-700">
            <li class="flex items-start gap-3">
            <span class="mt-1 flex h-5 w-5 flex-none items-center justify-center rounded-full bg-brand-50 ring-1 ring-brand-700/20">
              <svg class="h-3 w-3 text-brand-700" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
              </svg>
            </span>
            <span>Personalized, unrushed visits focused on your child's unique needs</span>
          </li>
          <li class="flex items-start gap-3">
            <span class="mt-1 flex h-5 w-5 flex-none items-center justify-center rounded-full bg-brand-50 ring-1 ring-brand-700/20">
              <svg class="h-3 w-3 text-brand-700" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
              </svg>
            </span>
            <!-- <span>Personalized, unrushed 60-90 minute visits focused on your child's unique needs</span> -->
            <span>Holistic ADHD evaluations and root-cause integrative support </span>
          </li>
          <li class="flex items-start gap-3">
            <span class="mt-1 flex h-5 w-5 flex-none items-center justify-center rounded-full bg-brand-50 ring-1 ring-brand-700/20">
              <svg class="h-3 w-3 text-brand-700" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
              </svg>
            </span>
            <!-- <span>Direct access to Dr. Okonkwo via text, email, and phone - no insurance barriers</span> -->
            <span>Concierge access for longer visits, continuity, and direct communication</span>
          </li>
          <li class="flex items-start gap-3">
            <span class="mt-1 flex h-5 w-5 flex-none items-center justify-center rounded-full bg-brand-50 ring-1 ring-brand-700/20">
              <svg class="h-3 w-3 text-brand-700" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
              </svg>
            </span>
            <!-- <span>Integrative approach combining conventional pediatrics with holistic wellness</span> -->
            <span>Whole-child care blending traditional and holistic pediatric approaches</span>
          </li>

        </ul>

        <div class="text-xs text-slate-500">
          Questions? Call <a class="text-brand-700 underline underline-offset-2" href="tel:<?php echo esc_attr($site['phoneTel']); ?>"><?php echo esc_html($site['phoneDisplay']); ?></a>
        </div>
      </div>

      <div class="space-y-4">
        <h2 class="text-xl font-semibold tracking-tight text-slate-900 text-center lg:text-left">
          What makes our care different
        </h2>

        <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft">
          <div class="overflow-hidden rounded-2xl bg-slate-100">
            <img
              src="<?php echo esc_url(get_theme_file_uri('/images/doctor-okonkwo.webp')); ?>"
              alt="Dr. Margaret Okonkwo with patient"
              class="w-full h-auto"
              loading="eager"
              decoding="async"
            />
          </div>

          <div class="mt-4 grid gap-3 sm:grid-cols-3 lg:grid-cols-1">
            <div class="rounded-2xl bg-slate-50 p-3">
              <p class="text-xs font-semibold text-slate-900">20+ Years Experience</p>
              <p class="mt-1 text-xs text-slate-600">Board-certified pediatrician.</p>
            </div>
            <div class="rounded-2xl bg-slate-50 p-3">
              <p class="text-xs font-semibold text-slate-900">Unrushed Visits</p>
              <p class="mt-1 text-xs text-slate-600">Time to listen, explain, and plan, direct access.</p>
            </div>
            <div class="rounded-2xl bg-slate-50 p-3">
              <p class="text-xs font-semibold text-slate-900">Integrative Approach</p>
              <p class="mt-1 text-xs text-slate-600">Traditional pediatrics + holistic options, whole-child wellness focus.</p>
            </div>
            <div class="rounded-2xl bg-slate-50 p-3">
              <p class="text-xs font-semibold text-slate-900">Continuity</p>
              <p class="mt-1 text-xs text-slate-600">Trusted long-term relationship, personalized care.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-10 grid gap-6 md:grid-cols-2">
      <div class="space-y-2">
        <span class="inline-block rounded-full border border-slate-200 bg-white px-3 py-1 text-xs font-medium text-slate-700">Primary Care Model</span>
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-soft">
          <h3 class="text-xl font-bold text-slate-900">Concierge Membership</h3>
          <p class="mt-2 text-sm text-slate-600">
            Direct access to your pediatrician, unrushed visits, same-day communication, and continuity of care — without insurance barriers.
          </p>
          <a
            href="<?php echo esc_url(home_url('/services/membership')); ?>"
            class="mt-4 inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-900 hover:bg-slate-50"
          >
            Explore Membership
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </a>
        </div>
      </div>

      <div class="space-y-2">
        <span class="inline-block rounded-full bg-brand-50 px-3 py-1 text-xs font-medium text-brand-800">Specialty Program</span>
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-soft">
          <h3 class="text-xl font-bold text-slate-900">Holistic ADHD Program</h3>
          <p class="mt-2 text-sm text-slate-600">
            A comprehensive, evidence-informed ADHD program that addresses root causes influenced by neurobiological, environmental, genetic, nutritional, and lifestyle factors.
          </p>
          <a
            href="<?php echo esc_url(home_url('/services/adhd')); ?>"
            class="mt-4 inline-flex items-center gap-2 rounded-xl bg-brand-700 px-4 py-2 text-sm font-semibold text-white hover:bg-brand-100"
          >
            Learn about the ADHD Program
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </a>
        </div>
      </div>
    </div>

    <p class="mt-4 text-xs text-slate-500">
      Evidence-informed care. Personalized relationships. A whole-child approach.
    </p>
  </div>
</section>

<?php get_template_part('template-parts/credibility-strip'); ?>

<?php get_template_part('template-parts/four-step-process'); ?>

<?php get_template_part('template-parts/testimonials-section'); ?>

<?php
// Featured Blog Posts Section
$featured_args = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'meta_query' => array(
        array(
            'key' => 'featured_post',
            'value' => '1',
            'compare' => '='
        )
    ),
    'orderby' => 'date',
    'order' => 'DESC'
);
$featured_query = new WP_Query($featured_args);

if ($featured_query->have_posts()) :
?>
<section class="bg-white border-t border-slate-200">
  <div class="mx-auto max-w-7xl px-4 py-16">
    <div class="mb-8 flex items-end justify-between">
      <div>
        <p class="text-xs font-semibold uppercase tracking-wide text-brand-700">
          From the blog
        </p>
        <h2 class="mt-2 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">
          Latest insights & guidance
        </h2>
        <p class="mt-2 text-sm text-slate-600">
          Evidence-informed perspectives on pediatric health, ADHD, and integrative care
        </p>
      </div>
      <a
        href="<?php echo esc_url(home_url('/blog')); ?>"
        class="hidden sm:inline-flex items-center gap-2 text-sm font-semibold text-brand-700 hover:text-brand-800"
      >
        View all posts
        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
      </a>
    </div>

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
      <?php while ($featured_query->have_posts()) : $featured_query->the_post();
        $post_id = get_the_ID();
        $category = okc_get_post_category($post_id);
        $author = okc_get_post_author($post_id);
        $pub_date = get_the_date('M j, Y');
        $reading_time = okc_reading_time(get_the_content());
        $thumbnail = get_the_post_thumbnail_url($post_id, 'large');
      ?>
      <article class="group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-soft hover:shadow-md transition">
        <a href="<?php the_permalink(); ?>" class="block no-underline">
          <div class="aspect-video bg-slate-100 overflow-hidden">
            <?php if ($thumbnail) : ?>
              <img
                src="<?php echo esc_url($thumbnail); ?>"
                alt="<?php echo esc_attr(get_the_title()); ?>"
                loading="lazy"
                class="h-full w-full object-cover transition duration-300 group-hover:scale-[1.02]"
              />
            <?php endif; ?>
          </div>

          <div class="p-5">
            <p class="text-xs uppercase tracking-wide text-brand-700">
              <?php echo esc_html($category); ?>
            </p>

            <h3 class="mt-2 text-base font-semibold text-slate-900 group-hover:text-brand-800">
              <?php the_title(); ?>
            </h3>

            <p class="mt-2 text-sm leading-6 text-slate-600 line-clamp-3">
              <?php echo esc_html(get_the_excerpt()); ?>
            </p>

            <div class="mt-4 flex items-center justify-between text-xs text-slate-500">
              <div class="flex items-center gap-1.5">
                <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html($pub_date); ?></time>
                <span class="text-slate-400" aria-hidden="true">•</span>
                <span><?php echo esc_html($reading_time); ?> min read</span>
              </div>

              <span class="inline-flex items-center gap-1 text-brand-700 font-medium group-hover:underline">
                Read
                <svg viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                  <path d="M9 18l6-6-6-6" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </span>
            </div>
          </div>
        </a>
      </article>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>

    <div class="mt-8 text-center sm:hidden">
      <a
        href="<?php echo esc_url(home_url('/blog')); ?>"
        class="inline-flex items-center gap-2 text-sm font-semibold text-brand-700 hover:text-brand-800"
      >
        View all posts
        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
      </a>
    </div>
  </div>
</section>
<?php endif; ?>

<?php get_footer(); ?>
