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

  // Load blog-specific JavaScript on blog pages
  if (is_page('blog') || is_home() || is_post_type_archive('post') || is_single()) {
    wp_enqueue_script(
      'okc-blog',
      get_theme_file_uri('/assets/js/okc-blog.js'),
      [],
      filemtime(get_theme_file_path('/assets/js/okc-blog.js')),
      true
    );
  }
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
require_once get_theme_file_path('/inc/blog-shortcodes.php');

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

// Enable dynamic title tags
add_theme_support('title-tag');
// Enable featured images
add_theme_support('post-thumbnails');

// reCAPTCHA v2 Configuration
define('RECAPTCHA_SITE_KEY', '6LfhyWQsAAAAAAnZZu9FaWuTU0sC8zhX-NekeOr2');
define('RECAPTCHA_SECRET_KEY', '6LfhyWQsAAAAACE1pTQhHpQnDZkTz3iucu08XlY6');

// Enqueue reCAPTCHA v2 script globally (it only activates where needed)
function okc_enqueue_recaptcha() {
  wp_enqueue_script(
    'google-recaptcha',
    'https://www.google.com/recaptcha/api.js',
    [],
    null,
    true
  );
}
add_action('wp_enqueue_scripts', 'okc_enqueue_recaptcha');

// Verify reCAPTCHA v2 token
function okc_verify_recaptcha($token) {
  error_log('reCAPTCHA token received: ' . ($token ? 'Yes' : 'No'));
  
  if (empty($token)) {
    error_log('reCAPTCHA token is empty');
    return false;
  }
  
  $response = wp_remote_post('https://www.google.com/recaptcha/api/siteverify', [
    'body' => [
      'secret' => RECAPTCHA_SECRET_KEY,
      'response' => $token,
      'remoteip' => $_SERVER['REMOTE_ADDR']
    ]
  ]);
  
  if (is_wp_error($response)) {
    error_log('reCAPTCHA verification error: ' . $response->get_error_message());
    return false;
  }
  
  $body = wp_remote_retrieve_body($response);
  error_log('reCAPTCHA API response: ' . $body);
  
  $result = json_decode($body, true);
  
  // For v2, just check success
  $is_valid = isset($result['success']) && $result['success'] === true;
  error_log('reCAPTCHA validation result: ' . ($is_valid ? 'PASSED' : 'FAILED'));
  
  if (!$is_valid && isset($result['error-codes'])) {
    error_log('reCAPTCHA error codes: ' . implode(', ', $result['error-codes']));
  }
  
  return $is_valid;
}

// Handle Contact Form Submission
function okc_handle_contact_form() {
  error_log('OKC contact handler reached');
  error_log('POST data keys: ' . implode(', ', array_keys($_POST)));
  
  // ---- Verify reCAPTCHA ----
  $recaptcha_response = $_POST['g-recaptcha-response'] ?? '';
  error_log('g-recaptcha-response value: ' . substr($recaptcha_response, 0, 50) . '...');
  
  if (!okc_verify_recaptcha($recaptcha_response)) {
    error_log('reCAPTCHA verification FAILED - blocking submission');
    wp_die('reCAPTCHA verification failed. Please try again or contact us directly.', 'Security Check Failed', ['response' => 403]);
  }
  
  error_log('reCAPTCHA verification PASSED - proceeding with form');
  
  // ---- Required fields ----
  if (
    empty($_POST['email']) ||
    !is_email($_POST['email']) ||
    empty($_POST['acknowledgement'])
  ) {
    wp_die('Invalid or incomplete submission');
  }

  // ---- Sanitize form fields ----
  $first_name = sanitize_text_field($_POST['first_name'] ?? '');
  $last_name  = sanitize_text_field($_POST['last_name'] ?? '');
  $email      = sanitize_email($_POST['email'] ?? '');
  $phone      = sanitize_text_field($_POST['phone'] ?? '');
  $topic      = sanitize_text_field($_POST['topic'] ?? '');
  $children   = sanitize_text_field($_POST['children'] ?? '');
  $message    = sanitize_textarea_field($_POST['message'] ?? '');

  // Acknowledgement (required checkbox)
  $acknowledgement = sanitize_text_field($_POST['acknowledgement']);

  // ---- Email ----
  // $to = 'drmargaretokonkwo@yahoo.com';
  $to = 'drmargaretokonkwo@yahoo.com';
  // $to = 'crisokonkwo@gmail.com';
  $subject = 'New Contact Form Submission – Okonkwo Care Pediatrics';

  $site_title = get_bloginfo('name');
  $site_url = home_url();

  $body = "
New contact form submission:

Name: $first_name $last_name
Email: $email
Phone: $phone
Topic: $topic
Number of Children: $children

Acknowledgement:
$acknowledgement

Message:
$message


-- 
This is a notification that a contact form was submitted on your website ($site_title $site_url).
";

  $headers = [
    'Content-Type: text/plain; charset=UTF-8',
    'From: Okonkwo Care Pediatrics <drmargaretokonkwo@yahoo.com>',
  ];

  $mail_sent = wp_mail($to, $subject, $body, $headers);
  
  if (!$mail_sent) {
    error_log('Email failed to send to: ' . $to);
    wp_die(
      'There was an error sending your message. Please try again later or contact us directly at ' . $to,
      'Email Delivery Error',
      [
        'response' => 500,
        'back_link' => true
      ]
    );
  }
  
  error_log('Email successfully sent to: ' . $to);

  // ---- Redirect after submission ----
  $redirect = esc_url_raw($_POST['redirect_to'] ?? home_url());
  wp_safe_redirect($redirect);
  exit;
}

// Hook the contact form handler to WordPress admin-post
add_action('admin_post_nopriv_okc_contact_form', 'okc_handle_contact_form'); // For non-logged-in users
add_action('admin_post_okc_contact_form', 'okc_handle_contact_form'); // For logged-in users