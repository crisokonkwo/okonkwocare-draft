<?php
/**
 * OKC Blog Shortcodes
 * - [okc_blog_featured]
 * - [okc_blog_grid]
 * - [okc_blog_category_chips]
 */

if (!defined('ABSPATH')) exit;

/** Reading time (rough) */
function okc_reading_time_minutes($content) {
  $text = wp_strip_all_tags($content);
  $words = str_word_count($text);
  $minutes = (int) ceil($words / 200); // 200 wpm
  return max(1, $minutes);
}

/** Safe lowercase string for data-attributes (your JS uses this for matching) */
function okc_lower_attr($value) {
  $value = wp_strip_all_tags((string) $value);
  $value = html_entity_decode($value, ENT_QUOTES, 'UTF-8');
  $value = mb_strtolower($value);
  $value = preg_replace('/\s+/', ' ', trim($value));
  return esc_attr($value);
}

/** Primary category name */
function okc_primary_category_name($post_id) {
  $cats = get_the_category($post_id);
  if (!empty($cats) && !is_wp_error($cats)) {
    return $cats[0]->name;
  }
  return 'General';
}

/** Primary category slug (for filtering) */
function okc_primary_category_slug($post_id) {
  $cats = get_the_category($post_id);
  if (!empty($cats) && !is_wp_error($cats)) {
    return strtolower($cats[0]->slug);
  }
  return 'general';
}

/** Card markup (shared by both featured + grid) */
function okc_render_post_card($post_id, $is_featured = false, $hidden = false) {
  $title   = get_the_title($post_id);
  $url     = get_permalink($post_id);
  $author  = get_the_author_meta('display_name', get_post_field('post_author', $post_id));
  $date_iso = get_the_date('c', $post_id);
  $date_human = get_the_date('F j, Y', $post_id);

  $excerpt = get_the_excerpt($post_id);
  if (!$excerpt) {
    $excerpt = wp_trim_words(wp_strip_all_tags(get_post_field('post_content', $post_id)), 24);
  }

  $cat_name = okc_primary_category_name($post_id);
  $cat_slug = okc_primary_category_slug($post_id);

  $content = get_post_field('post_content', $post_id);
  $read_min = okc_reading_time_minutes($content);

  $img_url = get_the_post_thumbnail_url($post_id, 'large');
  if (!$img_url) {
    $img_url = ''; // optionally set a fallback image URL
  }

  // data-* fields for your client-side filter/search
  $data_title = okc_lower_attr($title);
  $data_desc  = okc_lower_attr($excerpt);
  $data_cat   = esc_attr($cat_slug); // Use slug for consistent filtering
  $data_author= okc_lower_attr($author);
  $data_date  = okc_lower_attr($date_human);
  $data_body  = okc_lower_attr(wp_trim_words(wp_strip_all_tags($content), 80));

  $wrapper_class = $is_featured ? 'featured-slide group shrink-0' : 'group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-soft hover:shadow-md transition';
  if ($hidden) $wrapper_class .= ' okc-hidden';

  ob_start(); ?>
  <article
    class="<?php echo esc_attr($wrapper_class); ?>"
    data-title="<?php echo $data_title; ?>"
    data-desc="<?php echo $data_desc; ?>"
    data-category="<?php echo $data_cat; ?>"
    data-author="<?php echo $data_author; ?>"
    data-date="<?php echo $data_date; ?>"
    data-body="<?php echo $data_body; ?>"
  >
    <a href="<?php echo esc_url($url); ?>" class="block no-underline! hover:no-underline! <?php echo $is_featured ? 'overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-soft transition hover:shadow-md' : ''; ?>">
      <div class="aspect-video bg-slate-100 overflow-hidden">
        <?php if ($img_url): ?>
          <img
            src="<?php echo esc_url($img_url); ?>"
            alt="<?php echo esc_attr($title); ?>"
            class="h-full w-full object-cover transition duration-300 group-hover:scale-[1.02]"
            loading="lazy"
          />
        <?php endif; ?>
      </div>

      <div class="p-5">
        <?php if ($is_featured): ?>
          <div class="flex items-center gap-2">
            <span class="inline-flex items-center rounded-full bg-brand-50 px-2 py-0.5 text-xs font-semibold text-brand-800 ring-1 ring-brand-700/10">Featured</span>
            <span class="text-xs uppercase tracking-wide text-slate-500"><?php echo esc_html($cat_name); ?></span>
          </div>
        <?php else: ?>
          <p class="text-xs uppercase tracking-wide text-brand-700"><?php echo esc_html($cat_name); ?></p>
        <?php endif; ?>

        <h3 class="mt-2 text-base font-semibold text-slate-900 group-hover:text-brand-800">
          <?php echo esc_html($title); ?>
        </h3>

        <p class="mt-2 text-sm leading-6 text-slate-600 <?php echo $is_featured ? 'line-clamp-2' : 'line-clamp-3'; ?>">
          <?php echo esc_html($excerpt); ?>
        </p>

        <div class="mt-4 flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between text-xs text-slate-500">
          <div class="flex items-center flex-wrap gap-x-1.5 gap-y-1">
            <span><?php echo esc_html($author); ?></span>
            <span class="text-slate-400" aria-hidden="true">•</span>
            <time datetime="<?php echo esc_attr($date_iso); ?>"><?php echo esc_html($date_human); ?></time>
            <span class="text-slate-400" aria-hidden="true">•</span>
            <span><?php echo esc_html($read_min); ?> min read</span>
          </div>

          <span class="inline-flex items-center gap-1 text-brand-700 font-medium group-hover:underline">
            Read
            <svg viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
              <path d="M9 18l6-6-6-6" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </span>
        </div>
      </div>
    </a>
  </article>
  <?php
  return ob_get_clean();
}

/**
 * Get category ID to exclude from blog (social media posts)
 */
function okc_get_excluded_category_id() {
  $cat = get_category_by_slug('social-media');
  return $cat ? $cat->term_id : 0;
}

/**
 * [okc_blog_featured limit="10"]
 * Requires ACF or post meta: featured_post = 1 (string/number)
 */
function okc_blog_featured_shortcode($atts) {
  $atts = shortcode_atts([
    'limit' => 10,
  ], $atts, 'okc_blog_featured');

  $exclude_cat = okc_get_excluded_category_id();
  $query_args = [
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => (int) $atts['limit'],
    'orderby'        => 'date',
    'order'          => 'DESC',
    'meta_query'     => [
      [
        'key'     => 'featured_post',
        'value'   => '1',
        'compare' => '=',
      ],
    ],
  ];
  
  if ($exclude_cat) {
    $query_args['category__not_in'] = [$exclude_cat];
  }

  $q = new WP_Query($query_args);

  if (!$q->have_posts()) {
    return '<div class="mt-4 rounded-2xl border border-slate-200 bg-slate-50 p-6 text-sm text-slate-600">No featured posts yet.</div>';
  }

  ob_start(); ?>
  <div class="featured-track mt-4 flex gap-4 overflow-x-auto pb-3" aria-label="Featured posts">
    <?php while ($q->have_posts()): $q->the_post();
      echo okc_render_post_card(get_the_ID(), true, false);
    endwhile; wp_reset_postdata(); ?>
  </div>
  <?php
  return ob_get_clean();
}
add_shortcode('okc_blog_featured', 'okc_blog_featured_shortcode');

/**
 * [okc_blog_grid limit="-1" initial="9"]
 * - limit: -1 = all posts
 * - initial: how many visible before "Load more" reveals the rest
 */
function okc_blog_grid_shortcode($atts) {
  $atts = shortcode_atts([
    'limit'   => -1,
    'initial' => 9,
  ], $atts, 'okc_blog_grid');

  $limit = (int) $atts['limit'];
  $initial = max(1, (int) $atts['initial']);

  $exclude_cat = okc_get_excluded_category_id();
  $query_args = [
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => $limit,
    'orderby'        => 'date',
    'order'          => 'DESC',
  ];
  
  if ($exclude_cat) {
    $query_args['category__not_in'] = [$exclude_cat];
  }

  $q = new WP_Query($query_args);

  if (!$q->have_posts()) {
    return '<div class="mt-4 rounded-2xl border border-slate-200 bg-slate-50 p-6 text-sm text-slate-600">No posts found.</div>';
  }

  $i = 0;
  ob_start(); ?>
  <div id="blog-list" class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
    <?php while ($q->have_posts()): $q->the_post();
      $i++;
      $hidden = ($i > $initial);
      echo okc_render_post_card(get_the_ID(), false, $hidden);
    endwhile; wp_reset_postdata(); ?>
  </div>

  <div class="mt-8 flex justify-center">
    <button
      id="load-more-btn"
      type="button"
      class="rounded-full bg-brand-600 px-8 py-3 text-sm font-semibold text-white shadow-md hover:bg-brand-700 focus-visible:outline focus-visible:outline-offset-2 focus-visible:outline-brand-600 transition <?php echo ($i > $initial) ? '' : 'load-more-hidden'; ?>"
    >
      Load more posts
    </button>
  </div>

  <style>
    .okc-hidden { display: none !important; }
    .load-more-hidden { display: none !important; }
  </style>
  <?php
  return ob_get_clean();
}
add_shortcode('okc_blog_grid', 'okc_blog_grid_shortcode');

/**
 * Dynamic Category Filter Chips Shortcode
 * 
 * Usage: [okc_blog_category_chips]
 * 
 * Displays category filter chips dynamically from WordPress categories
 * Can be used separately from the blog grid for custom Elementor layouts
 */
function okc_blog_category_chips_shortcode($atts) {
  $atts = shortcode_atts([
    'show_all' => '1',
    'hide_empty' => '1',
  ], $atts, 'okc_blog_category_chips');

  $hide_empty = $atts['hide_empty'] === '1';
  $cats = get_categories([
    'taxonomy' => 'category',
    'hide_empty' => $hide_empty,
    'orderby' => 'name',
    'order' => 'ASC',
  ]);

  ob_start(); ?>
  <div class="flex flex-wrap gap-2 justify-center">
    <?php if ($atts['show_all'] === '1'): ?>
      <button type="button"
        class="blog-chip shrink-0 rounded-full border border-slate-200 bg-white px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 focus-visible:ring-2 focus-visible:ring-brand-600"
        data-category="all"
        aria-pressed="true">All</button>
    <?php endif; ?>

    <?php foreach ($cats as $cat):
      $slug = strtolower($cat->slug);
      ?>
      <button type="button"
        class="blog-chip shrink-0 rounded-full border border-slate-200 bg-white px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 focus-visible:ring-2 focus-visible:ring-brand-600"
        data-category="<?php echo esc_attr($slug); ?>"
        aria-pressed="false"><?php echo esc_html($cat->name); ?></button>
    <?php endforeach; ?>
  </div>
  <?php
  return ob_get_clean();
}
add_shortcode('okc_blog_category_chips', 'okc_blog_category_chips_shortcode');

/**
 * Social Media Posts Gallery
 * Usage: [okc_social_gallery count="5"]
 */
function okc_social_gallery_shortcode($atts) {
  $atts = shortcode_atts([
    'count' => 5,
    'category' => 'social-media', // posts from this category
  ], $atts, 'okc_social_gallery');
  
  $count = max(1, min(20, intval($atts['count'])));
  
  // Query posts from social media category
  $args = [
    'post_type' => 'post',
    'posts_per_page' => $count,
    'category_name' => sanitize_text_field($atts['category']),
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
  ];
  
  $query = new WP_Query($args);
  
  ob_start();
  ?>
  <section class="bg-linear-to-b from-slate-150 to-white">
    <div class="mx-auto max-w-7xl px-4 py-10">
        <header class="text-center mb-10">
            <h2 class="text-3xl font-bold uppercase tracking-tight text-slate-900 sm:text-4xl">Social Media Posts</h2>
            <p class="text-sm text-center leading-5 text-slate-800">This is a gallery to showcase images from our recent social posts</p>
        </header>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
        <?php
        if ($query->have_posts()) :
          while ($query->have_posts()) : $query->the_post();
            $post_id = get_the_ID();
            $url = get_permalink($post_id);
            $title = get_the_title($post_id);
            $img_url = get_the_post_thumbnail_url($post_id, 'medium');
            
            // Get social media link from custom field (optional)
            $social_link = get_post_meta($post_id, 'social_media_link', true);
            $final_link = !empty($social_link) ? esc_url($social_link) : $url;
            $target = !empty($social_link) ? ' target="_blank" rel="noopener"' : '';
            ?>
            <a href="<?php echo $final_link; ?>"<?php echo $target; ?> 
               class="social-post-card block rounded-lg overflow-hidden bg-slate-100 hover:opacity-90 transition-opacity aspect-square">
              <?php if ($img_url) : ?>
                <img src="<?php echo esc_url($img_url); ?>" 
                     alt="<?php echo esc_attr($title); ?>"
                     class="w-full h-full object-cover">
              <?php else : ?>
                <div class="w-full h-full flex items-center justify-center">
                  <svg class="w-16 h-16 text-slate-300" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                  </svg>
                </div>
              <?php endif; ?>
            </a>
            <?php
          endwhile;
          wp_reset_postdata();
        else :
          // Show placeholder images if no posts found
          for ($i = 0; $i < $count; $i++) : ?>
            <div class="social-post-card rounded-lg overflow-hidden bg-slate-100 aspect-square flex items-center justify-center">
              <svg class="w-16 h-16 text-slate-300" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
              </svg>
            </div>
          <?php endfor;
        endif;
        ?>
      </div>
    </div>
  </section>
  <?php
  return ob_get_clean();
}
add_shortcode('okc_social_gallery', 'okc_social_gallery_shortcode');