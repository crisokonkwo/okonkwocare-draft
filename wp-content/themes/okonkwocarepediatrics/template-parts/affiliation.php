<?php
/**
 * Template part: Professional Affiliations
 */

$items = [
  [
    'src' => get_theme_file_uri('images/affiliations/dpc-alliance.png'),
    'name' => 'DPC Alliance',
    'href' => 'https://dpcalliance.org',
  ],
  [
    'src' => get_theme_file_uri('images/affiliations/pcrm.png'),
    'name' => 'Physicians Committee for Responsible Medicine',
    'href' => 'https://pcrm.org',
  ],
  [
    'src' => get_theme_file_uri('images/affiliations/ammg.png'),
    'name' => 'Age Management Medicine Group',
    'href' => 'https://www.agemed.org',
  ],
];
?>

<section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-soft">
  <h3 class="text-sm font-semibold text-slate-900">Professional affiliations</h3>
  <p class="mt-1 text-xs leading-5 text-slate-600">
    Memberships and professional involvement.
  </p>

  <div class="mt-4 grid grid-cols-3 items-center gap-4">
    <?php foreach ($items as $it): ?>
      <a
        href="<?php echo esc_url($it['href']); ?>"
        target="_blank"
        rel="noreferrer"
        class="group flex items-center justify-center rounded-2xl border border-slate-200 bg-slate-50 p-3 transition hover:border-brand-200 hover:bg-white focus-visible:ring-2 focus-visible:ring-brand-600"
        aria-label="<?php echo esc_attr('Open ' . $it['name'] . ' website'); ?>"
      >
        <img
          src="<?php echo esc_url($it['src']); ?>"
          alt="<?php echo esc_attr($it['name']); ?>"
          class="h-10 w-auto object-contain opacity-80 grayscale transition group-hover:opacity-100 group-hover:grayscale-0"
          loading="lazy"
          decoding="async"
        />
      </a>
    <?php endforeach; ?>
  </div>
</section>
