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
