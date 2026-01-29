<?php
function okonkwocare_assets() {
  wp_enqueue_style(
    'okonkwocare-theme',
    get_stylesheet_directory_uri() . '/assets/css/theme.css',
    [],
    filemtime(get_stylesheet_directory() . '/assets/css/theme.css')
  );

  // Swiper CSS from CDN
  wp_enqueue_style(
    'swiper-css',
    'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
    [],
    '11.0.0'
  );

  // Swiper JS from CDN
  wp_enqueue_script(
    'swiper-js',
    'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
    [],
    '11.0.0',
    true
  );

  wp_enqueue_script(
    'okonkwocare-nav',
    get_theme_file_uri('/assets/js/nav.js'),
    [],
    filemtime(get_theme_file_path('/assets/js/nav.js')),
    true
  );

  wp_enqueue_script(
    'okonkwocare-swiper',
    get_theme_file_uri('/assets/js/swiper-init.js'),
    ['swiper-js'],
    filemtime(get_theme_file_path('/assets/js/swiper-init.js')),
    true
  );

  wp_enqueue_script(
    'okonkwocare-services-slider',
    get_theme_file_uri('/assets/js/services-slider.js'),
    [],
    filemtime(get_theme_file_path('/assets/js/services-slider.js')),
    true
  );

  wp_enqueue_script(
    'okonkwocare-membership-adhd-slider',
    get_theme_file_uri('/assets/js/membership-adhd-slider.js'),
    [],
    filemtime(get_theme_file_path('/assets/js/membership-adhd-slider.js')),
    true
  );
}
add_action('wp_enqueue_scripts', 'okonkwocare_assets');

// Register navigation menus
function okonkwocare_menus() {
  register_nav_menus([
    'primary' => 'Primary Menu (Desktop)',
    'mobile' => 'Mobile Menu'
  ]);
}
add_action('after_setup_theme', 'okonkwocare_menus');

require_once get_theme_file_path('/inc/site-config.php');

function okc_current_url(): string {
  $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
  return $scheme . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}

function okc_normalize_url(string $url): string {
  $u = strtok($url, '#');          // drop hash
  $u = strtok($u, '?') ?: $u;      // drop query
  return rtrim($u, '/') . '/';     // normalize trailing slash
}

function okc_is_active_prefix(string $href): bool {
  $current = okc_normalize_url(okc_current_url());
  $hrefN   = okc_normalize_url($href);
  return str_starts_with($current, $hrefN);
}

function okc_is_active_exact(string $href): bool {
  $current = okc_normalize_url(okc_current_url());
  $hrefN   = okc_normalize_url($href);
  return $current === $hrefN;
}

// Helper function to calculate reading time
function okc_reading_time($content) {
  $word_count = str_word_count(strip_tags($content));
  $minutes = max(1, ceil($word_count / 200));
  return $minutes;
}

// Helper function to get post category
function okc_get_post_category($post_id) {
  $cats = get_the_category($post_id);
  return !empty($cats) ? $cats[0]->name : 'Blog';
}

// Helper function to get post author
function okc_get_post_author($post_id) {
  return 'Okonkwo Care Pediatrics';
}

// Enable featured images
add_theme_support('post-thumbnails');