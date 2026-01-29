<?php
$site = okc_site();
$nav  = okc_nav();
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
        <!-- <div class="hidden sm:block">
            <div class="text-sm font-semibold text-slate-900"><?php echo esc_html($site['name']); ?></div>
            <div class="text-xs text-slate-600"><?php echo esc_html($site['tagline']); ?></div>
        </div> -->
    </a>


    <!-- Desktop nav -->
    <nav class="hidden items-center gap-6 text-sm lg:flex" aria-label="Primary">
      <?php foreach ($nav as $item): ?>
        <?php
          $hasChildren = !empty($item['children']);
          $isHome = okc_normalize_url($item['href']) === okc_normalize_url(home_url('/'));
          
          // Check if any child is active
          $anyChildActive = false;
          if ($hasChildren) {
            foreach ($item['children'] as $child) {
              if (okc_is_active_exact($child['href'])) {
                $anyChildActive = true;
                break;
              }
            }
            // Also check overview page if it exists
            if (!empty($item['overviewHref']) && okc_is_active_exact($item['overviewHref'])) {
              $anyChildActive = true;
            }
          }
          
          $active = $hasChildren
            ? ($anyChildActive || okc_is_active_prefix($item['href']))
            : ($isHome ? okc_is_active_exact($item['href']) : okc_is_active_prefix($item['href']));

          $baseLinkClasses = 'no-underline rounded-lg px-2 py-1 transition';
          $activeClasses   = $active ? 'text-brand-800 bg-brand-50' : 'text-slate-700 hover:text-slate-900 hover:bg-slate-50';

          $dropdownId = 'dd-' . sanitize_title($item['label']);
        ?>

        <?php if (!$hasChildren): ?>
          <a
            href="<?php echo esc_url($item['href']); ?>"
            aria-current="<?php echo $active ? 'page' : 'false'; ?>"
            class="<?php echo esc_attr($baseLinkClasses . ' ' . $activeClasses); ?>"
          >
            <?php echo esc_html($item['label']); ?>
          </a>

        <?php else: ?>
          <div class="relative group" data-dropdown-container="<?php echo esc_attr($dropdownId); ?>">
            <button
              type="button"
              data-dropdown-trigger="<?php echo esc_attr($dropdownId); ?>"
              aria-expanded="false"
              aria-haspopup="true"
              class="<?php echo esc_attr('inline-flex items-center gap-1 ' . $baseLinkClasses . ' cursor-pointer ' . $activeClasses); ?>"
            >
              <?php echo esc_html($item['label']); ?>
              <svg
                class="h-4 w-4 text-slate-500 group-hover:text-slate-700 transition-transform"
                data-dropdown-chevron="<?php echo esc_attr($dropdownId); ?>"
                fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
              >
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
              </svg>
            </button>

            <div
              data-dropdown-menu="<?php echo esc_attr($dropdownId); ?>"
              class="absolute left-0 top-full mt-2 w-72 rounded-2xl opacity-0 pointer-events-none transition
                     group-hover:opacity-100 group-hover:pointer-events-auto
                     group-focus-within:opacity-100 group-focus-within:pointer-events-auto"
            >
              <div class="absolute left-0 right-0 -top-2 h-2"></div>

              <div class="rounded-2xl border border-slate-200 bg-white p-2 shadow-lg">
                <?php if (!empty($item['overviewLabel'])): ?>
                  <?php
                    $overviewHref = !empty($item['overviewHref']) ? $item['overviewHref'] : $item['href'];
                    $overviewActive = okc_is_active_exact($overviewHref);
                  ?>
                  <a
                    href="<?php echo esc_url($overviewHref); ?>"
                    class="<?php echo esc_attr(
                      'block rounded-xl px-3 py-2 text-xs font-semibold uppercase tracking-wide no-underline transition border-b border-slate-100 mb-1 ' .
                      ($overviewActive ? 'bg-brand-50 text-brand-800' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900')
                    ); ?>"
                  >
                    <?php echo esc_html($item['overviewLabel']); ?>
                  </a>
                <?php endif; ?>

                <?php foreach ($item['children'] as $child): ?>
                  <?php $childActive = okc_is_active_exact($child['href']); ?>
                  <a
                    href="<?php echo esc_url($child['href']); ?>"
                    class="<?php echo esc_attr(
                      'block rounded-xl px-3 py-2 text-sm no-underline transition ' .
                      ($childActive ? 'bg-brand-50 text-brand-800' : 'text-slate-700 hover:bg-slate-50 hover:text-slate-900')
                    ); ?>"
                  >
                    <?php echo esc_html($child['label']); ?>
                  </a>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>

      <a
        href="<?php echo esc_url(home_url('/contact')); ?>"
        class="rounded-xl bg-brand-700 px-4 py-2 text-sm font-semibold text-white no-underline hover:bg-brand-100"
      >
        Contact Us
      </a>
    </nav>

    <!-- Mobile actions -->
    <div class="flex items-center gap-2 lg:hidden">
      <a
        href="<?php echo esc_url(home_url('/contact')); ?>"
        class="block w-full rounded-xl border text-center border-slate-200 bg-white px-3 py-2 text-sm font-semibold text-slate-900 no-underline hover:bg-slate-50"
      >
        Contact Us
      </a>

      <button
        id="menu-button"
        type="button"
        aria-label="Open menu"
        aria-expanded="false"
        aria-controls="mobile-drawer"
        class="rounded-xl border border-slate-200 bg-white p-2 hover:bg-slate-50 focus-visible:ring-2 focus-visible:ring-brand-600"
      >
        <svg class="h-6 w-6 text-slate-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>
  </div>
</header>

<!-- Mobile drawer -->
<div id="mobile-drawer" class="mobile-drawer fixed inset-0 z-50 hidden lg:hidden" role="dialog" aria-modal="true" aria-label="Mobile navigation">
  <button id="drawer-overlay" type="button" class="drawer-overlay fixed inset-0 bg-black/30 backdrop-blur-sm" aria-label="Close menu" tabindex="-1"></button>

    <div class="drawer-panel bg-white/80 backdrop-blur-2xl fixed right-0 top-0 h-full w-80 max-w-[85vw] overflow-y-auto shadow-2xl border-l border-white" role="document">
      <div class="flex items-center justify-between border-b border-white/80 px-4 py-4">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-3 no-underline">
          <img
            src="<?php echo esc_url(get_theme_file_uri($site['logo'])); ?>"
            alt="<?php echo esc_attr($site['name']); ?> logo"
            width="160" height="99"
            class="h-10 object-contain"
            loading="lazy" decoding="async"
          />
        </a>

        <button
          id="drawer-close"
          type="button"
          class="rounded-xl border border-slate-200 bg-white p-2 hover:bg-slate-50 focus-visible:ring-2 focus-visible:ring-brand-600"
          aria-label="Close menu"
        >
          <svg class="h-6 w-6 text-slate-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <nav class="px-4 py-4 space-y-2 bg-white/80" aria-label="Mobile Primary">
        <?php foreach ($nav as $item): ?>
          <?php 
            $hasChildren = !empty($item['children']);
            $isHome = okc_normalize_url($item['href']) === okc_normalize_url(home_url('/'));
          ?>
          <?php if (!$hasChildren): ?>
            <?php
              $active = $isHome ? okc_is_active_exact($item['href']) : okc_is_active_prefix($item['href']);
            ?>
            <a
              href="<?php echo esc_url($item['href']); ?>"
              data-nav-link
              aria-current="<?php echo $active ? 'page' : 'false'; ?>"
              class="<?php echo esc_attr(
                'block rounded-xl px-4 py-3 text-sm font-medium no-underline transition ' .
                ($active ? 'bg-brand-50 text-brand-800 border border-brand-100' : 'text-slate-900 hover:bg-slate-50 border border-transparent')
              ); ?>"
            >
              <?php echo esc_html($item['label']); ?>
            </a>
          <?php else: ?>
            <?php
              $accId = 'acc-' . sanitize_title($item['label']);
              
              // Check if any child is active
              $anyChildActive = false;
              foreach ($item['children'] as $child) {
                if (okc_is_active_exact($child['href'])) {
                  $anyChildActive = true;
                  break;
                }
              }
              
              $overviewHref = !empty($item['overviewHref']) ? $item['overviewHref'] : $item['href'];
              // Also check overview page if it exists
              if (!empty($item['overviewHref']) && okc_is_active_exact($item['overviewHref'])) {
                $anyChildActive = true;
              }
              
              $active = $anyChildActive || okc_is_active_prefix($item['href']);
            ?>
            <div class="rounded-xl border border-slate-200 bg-white">
              <button
                type="button"
                data-accordion-trigger="<?php echo esc_attr($accId); ?>"
                aria-expanded="<?php echo $active ? 'true' : 'false'; ?>"
                class="<?php echo esc_attr(
                  'w-full flex items-center justify-between rounded-xl px-4 py-3 text-sm font-medium transition ' .
                  ($active ? 'text-brand-800 bg-brand-50' : 'text-slate-900 hover:bg-slate-50')
                ); ?>"
              >
                <span><?php echo esc_html($item['label']); ?></span>
                <svg
                  data-accordion-chevron="<?php echo esc_attr($accId); ?>"
                  class="<?php echo esc_attr('h-4 w-4 transition-transform' . ($active ? ' rotate-180' : '')); ?>"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                  aria-hidden="true"
                >
                  <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd" />
                </svg>
              </button>

              <div
                data-accordion-panel="<?php echo esc_attr($accId); ?>"
                class="<?php echo esc_attr('px-2 pb-2 py-1 space-y-1' . ($active ? ' block' : ' hidden')); ?>"
              >
                <?php if (!empty($item['overviewLabel'])): ?>
                  <?php $overviewActive = okc_is_active_exact($overviewHref); ?>
                  <a
                    href="<?php echo esc_url($overviewHref); ?>"
                    data-nav-link
                    class="<?php echo esc_attr(
                      'block rounded-xl px-3 py-2 text-xs font-semibold uppercase tracking-wide no-underline transition ' .
                      ($overviewActive ? 'bg-brand-50 text-brand-800' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900')
                    ); ?>"
                  >
                    <?php echo esc_html($item['overviewLabel']); ?>
                  </a>
                <?php endif; ?>

                <?php foreach ($item['children'] as $child): ?>
                  <?php $childActive = okc_is_active_exact($child['href']); ?>
                  <a
                    href="<?php echo esc_url($child['href']); ?>"
                    data-nav-link
                    class="<?php echo esc_attr(
                      'block rounded-xl px-3 py-2 text-sm no-underline transition ' .
                      ($childActive ? 'bg-brand-50 text-brand-800' : 'text-slate-700 hover:bg-slate-50 hover:text-slate-900')
                    ); ?>"
                  >
                    <?php echo esc_html($child['label']); ?>
                  </a>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>

        <a
          href="tel:<?php echo esc_attr($site['phoneTel']); ?>"
          class="mt-3 block rounded-xl bg-brand-700 px-4 py-3 text-center text-sm font-semibold text-white no-underline hover:bg-brand-800"
        >
          Call <?php echo esc_html($site['phoneDisplay']); ?>
        </a>

        <div class="mt-4 rounded-2xl border border-slate-200 bg-slate-50 p-4 text-xs leading-5 text-slate-600">
          For emergencies, dial 911. For urgent concerns, call the office.
        </div>
      </nav>
    </div>
  </div>
</header>

<main id="main" class="min-h-[60vh]">
