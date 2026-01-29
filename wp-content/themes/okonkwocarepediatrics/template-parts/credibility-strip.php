<?php
/**
 * Template part: Credibility Strip
 * Displays media carousel with videos and images
 */

$site = okc_site();

$media_items = [
  [
    'type' => 'video',
    'src' => get_theme_file_uri('/videos/surgeon-general-meeting.mp4'),
    'poster' => get_theme_file_uri('/images/surgeon-general-meeting-poster.webp'),
    'caption' => 'Video: Professional public health meeting',
    'fit' => 'cover',
  ],
  [
    'type' => 'video',
    'src' => get_theme_file_uri('/videos/astronaut_interview.mp4'),
    'poster' => get_theme_file_uri('/images/media2-poster.webp'),
    'caption' => 'Video: I had the honor of interviewing NASA astronaut Mike Hopkins, where we discussed how critical nutrition and exercise are to the success of every space mission and how those same principles apply here on Earth.',
    'fit' => 'cover',
  ],
  [
    'type' => 'image',
    'src' => get_theme_file_uri('/images/boston-harvard-club_1.jpg'),
    'alt' => 'Dr. Okonkwo speaking at Harvard Club of Boston',
    'caption' => 'Speaking at the Harvard Club of Boston provided an opportunity to share how direct access to physicians and personalized, trust-based care models lead to better outcomes.',
    'fit' => 'cover',
  ],
  [
    'type' => 'image',
    'src' => get_theme_file_uri('/images/meet5-Joel-Osteen.webp'),
    'alt' => 'Dr. Okonkwo with Joel Osteen',
    'caption' => 'Dr. Okonkwo with Joel Osteen',
    'fit' => 'contain',
  ],
  [
    'type' => 'image',
    'src' => get_theme_file_uri('/images/boston-harvard-club_2.jpg'),
    'alt' => 'Dr. Okonkwo participating in a professional panel discussion at Harvard Club of Boston',
    'caption' => 'Speech at Harvard Club of Boston: Discussing how giving patients direct access to physicians and building personalized, trusted relationships leads to stronger outcomes and lasting health.',
    'fit' => 'cover',
  ],
  [
    'type' => 'image',
    'src' => get_theme_file_uri('/images/NYCityBar.jpg'),
    'alt' => 'Dr. Okonkwo speaking at New York City Bar Association',
    'caption' => 'It was an honor to speak at the New York Academy of Medicine on how children thrive when families have direct access to their pediatrician. We explored how a holistic approach to ADHD focuses on identifying root causes not just managing symptoms.',
    'fit' => 'cover',
  ],
  [
    'type' => 'image',
    'src' => get_theme_file_uri('/images/nasdaq-billboard.webp'),
    'alt' => 'Dr. Okonkwo featured on Nasdaq billboard in Times Square',
    'caption' => 'Featured on Nasdaq billboard in Times Square, NYC',
    'fit' => 'contain',
  ],
];
?>

<section class="border-y border-slate-200 bg-slate-50">
  <div class="mx-auto max-w-7xl px-4 py-10 sm:py-10">
    <div class="text-center space-y-2">
      <p class="text-xs font-semibold uppercase tracking-wide text-brand-700">
        Community &amp; Media
      </p>
      <h3 class="text-base font-semibold text-slate-900">
        Sharing pediatric expertise beyond the clinic
      </h3>
      <p class="mx-auto max-w-xl text-sm text-slate-600">
        Dr. Okonkwo is regularly invited to speak and share insights on pediatric health, holistic care, and parent education.
      </p>
    </div>

    <div class="mt-6">
      <div class="swiper credibility-swiper">
        <div class="swiper-wrapper">
          <?php foreach ($media_items as $item): ?>
            <div class="swiper-slide">
              <figure class="<?php echo esc_attr('space-y-2' . ($item['fit'] === 'contain' ? ' flex flex-col items-center justify-center h-full' : '')); ?>">
                <div class="<?php echo esc_attr(
                  'overflow-hidden rounded-xl ring-brand-700/10 ' .
                  ($item['fit'] === 'contain' ? ' ring-0 bg-slate-100 max-w-45 max-h-50 sm:max-w-45 sm:max-h-57 flex items-center justify-center' : ' aspect-video ring-1 bg-slate-100')
                ); ?>">
                  <?php if ($item['type'] === 'video'): ?>
                    <video
                      class="h-full w-full object-<?php echo esc_attr($item['fit']); ?> aspect-video"
                      controls
                      preload="metadata"
                      poster="<?php echo esc_url($item['poster']); ?>"
                    >
                      <source src="<?php echo esc_url($item['src']); ?>" type="video/mp4" />
                      Your browser does not support the video tag.
                    </video>
                  <?php else: ?>
                    <img
                      src="<?php echo esc_url($item['src']); ?>"
                      alt="<?php echo esc_attr($item['alt']); ?>"
                      class="<?php echo $item['fit'] === 'contain' ? ' w-auto h-full object-contain' : ' w-full h-full object-cover'; ?> cursor-pointer hover:opacity-90 transition-opacity"
                      loading="lazy"
                      decoding="async"
                      data-lightbox="true"
                      data-caption="<?php echo esc_attr($item['caption']); ?>"
                      onclick="openImageLightbox(this)"
                    />
                  <?php endif; ?>
                </div>

                <figcaption class="text-xs text-slate-500">
                  <?php echo esc_html($item['caption']); ?>
                </figcaption>
              </figure>
            </div>
          <?php endforeach; ?>
        </div>

        <div class="swiper-pagination"></div>

        <div class="mt-4 mb-4 flex items-center justify-end gap-4 pr-5 sm:pr-10">
          <button
            type="button"
            class="credibility-prev-btn flex h-10 w-10 items-center justify-center rounded-full bg-slate-800 hover:bg-slate-700 shadow-md transition-colors duration-200"
            aria-label="Previous slide"
          >
            <svg class="h-6 w-6 text-slate-100" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
          </button>

          <button
            type="button"
            class="credibility-next-btn flex h-10 w-10 items-center justify-center rounded-full bg-slate-200 hover:bg-slate-300 shadow-md transition-colors duration-200"
            aria-label="Next slide"
          >
            <svg class="h-6 w-6 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <div class="mt-4 text-center text-xs font-medium text-brand-600">
      <a
        href="<?php echo esc_url(home_url('/about-dr-okonkwo')); ?>"
        class="hover:underline focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 focus-visible:ring-offset-2"
      >
        Learn more about Dr. Okonkwo →
      </a>
    </div>
  </div>

  <!-- Image Lightbox Modal -->
  <div id="image-lightbox" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/90 p-4" onclick="closeImageLightbox(event)">
    <button
      type="button"
      class="absolute top-4 right-4 z-10 flex h-10 w-10 items-center justify-center rounded-full bg-white/10 hover:bg-white/20 text-white transition-colors"
      onclick="closeImageLightbox()"
      aria-label="Close lightbox"
    >
      <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
    
    <div class="max-h-[90vh] max-w-[90vw]" onclick="event.stopPropagation()">
      <img id="lightbox-image" src="" alt="" class="max-h-[85vh] w-auto mx-auto rounded-lg shadow-2xl" />
      <p id="lightbox-caption" class="mt-4 text-center text-sm text-white/90"></p>
    </div>
  </div>
</section>

<script>
function openImageLightbox(imgElement) {
  const lightbox = document.getElementById('image-lightbox');
  const lightboxImg = document.getElementById('lightbox-image');
  const lightboxCaption = document.getElementById('lightbox-caption');
  
  lightboxImg.src = imgElement.src;
  lightboxImg.alt = imgElement.alt;
  lightboxCaption.textContent = imgElement.dataset.caption || imgElement.alt;
  
  // Pause swiper autoplay
  if (window.credibilitySwiper && window.credibilitySwiper.autoplay) {
    window.credibilitySwiper.autoplay.stop();
  }
  
  lightbox.classList.remove('hidden');
  lightbox.classList.add('flex');
  document.body.style.overflow = 'hidden';
}

function closeImageLightbox(event) {
  if (event && event.target.id !== 'image-lightbox') return;
  
  const lightbox = document.getElementById('image-lightbox');
  lightbox.classList.add('hidden');
  lightbox.classList.remove('flex');
  document.body.style.overflow = '';
  
  // Resume swiper autoplay
  if (window.credibilitySwiper && window.credibilitySwiper.autoplay) {
    window.credibilitySwiper.autoplay.start();
  }
}

// Close on Escape key
document.addEventListener('keydown', (e) => {
  if (e.key === 'Escape') closeImageLightbox();
});
</script>
