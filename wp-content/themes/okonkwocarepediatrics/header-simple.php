<?php
$site = okc_site();
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <?php
  // DO NOT hardcode title/meta here — let Yoast/RankMath handle SEO.
  wp_head();
  ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="sr-only focus:not-sr-only focus:fixed focus:top-2 focus:left-2 focus:z-50 focus:rounded focus:bg-white focus:px-3 focus:py-2"
   href="#main">
  Skip to content
</a>

<header class="sticky top-0 z-40 border-b border-slate-200 bg-white/90 backdrop-blur">
  <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-5">

    <!-- Brand -->
    <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-3 no-underline">
        <img
            src="<?php echo esc_url(get_theme_file_uri($site['logo'])); ?>"
            alt="<?php echo esc_attr($site['name']); ?> logo"
            width="150" height="99"
            class="h-16 object-contain"
            loading="eager"
            decoding="async"
        />
    </a>

  </div>
</header>
