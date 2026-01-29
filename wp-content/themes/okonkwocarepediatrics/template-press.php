<?php
/**
 * Template Name: Press & Media Page
 * Template Post Type: page
 * Description: Custom template for the press and media page
 */

get_header();
$site = okc_site();
?>

<main>
  <section class="bg-linear-to-b from-slate-50 to-white">
    <div class="mx-auto max-w-4xl px-4 py-12 md:py-16 space-y-10">

      <!-- Header -->
      <header class="space-y-3">
        <h1 class="text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
          Media & Speaking
        </h1>
        <p class="text-sm text-slate-600">
          Public education, professional dialogue, and community engagement in pediatric care.
        </p>
      </header>

      <!-- Purpose -->
      <section class="space-y-3">
        <p class="text-base leading-7 text-slate-700">
          Dr. Margaret Okonkwo is regularly invited to speak and provide expert
          commentary on pediatric health, integrative medicine, and parent education. Her contributions focus on evidence-informed care, holistic approaches
          to child health, and strengthening physician-family relationships through
          education and dialogue.
        </p>
      </section>

      <!-- Speaking -->
      <section class="space-y-4">
        <h2 class="text-xl font-semibold text-slate-900">
          Speaking Engagements
        </h2>
        <p class="text-sm text-slate-600">
          Educational and professional presentations for medical, parent, and community audiences.
        </p>

        <!-- Carousel -->
        <div class="mt-6">
          <div
            class="flex gap-4 overflow-x-auto pb-3 snap-x snap-mandatory scroll-px-4 [-webkit-overflow-scrolling:touch]"
            aria-label="Community and media highlights"
          >
            <!-- Slide 4 -->
            <figure class="snap-start shrink-0 w-[85%] sm:w-[60%] lg:w-[32%] space-y-2">
              <div class="overflow-hidden rounded-xl bg-slate-100 ring-1 ring-brand-700/10 aspect-video">
                <img
                  src="<?php echo esc_url(get_theme_file_uri('images/boston-harvard-club_1.jpg')); ?>"
                  alt="Dr. Okonkwo speaking at an academic venue"
                  class="h-full w-full object-cover cursor-pointer hover:opacity-90 transition-opacity"
                  loading="lazy"
                  decoding="async"
                  onclick="openPressLightbox(this)"
                />
              </div>
              <figcaption class="text-xs text-slate-500">Panel & interviews</figcaption>
            </figure>

            <!-- Slide 5 -->
            <figure class="snap-start shrink-0 w-[85%] sm:w-[60%] lg:w-[32%] space-y-2">
              <div class="overflow-hidden rounded-xl bg-slate-100 ring-1 ring-brand-700/10 aspect-video">
                <img
                  src="<?php echo esc_url(get_theme_file_uri('images/boston-harvard-club_2.jpg')); ?>"
                  alt="Dr. Okonkwo presenting at a lecture"
                  class="h-full w-full object-cover cursor-pointer hover:opacity-90 transition-opacity"
                  loading="lazy"
                  decoding="async"
                  onclick="openPressLightbox(this)"
                />
              </div>
              <figcaption class="text-xs text-slate-500">Panel & interviews</figcaption>
            </figure>
          </div>
        </div>
      </section>

      <!-- Media -->
      <section class="space-y-4">
        <h2 class="text-xl font-semibold text-slate-900">
          Media & Interviews
        </h2>
        <p class="text-sm text-slate-600">
          Expert commentary and educational interviews focused on child health and family care.
        </p>

        <!-- Carousel -->
        <div class="mt-6">
          <div
            class="flex gap-4 overflow-x-auto pb-3 snap-x snap-mandatory scroll-px-4 [-webkit-overflow-scrolling:touch]"
            aria-label="Community and media highlights"
          >
            <!-- Slide 1 -->
            <figure class="snap-start shrink-0 w-[85%] sm:w-[60%] lg:w-[32%] space-y-2">
              <div class="overflow-hidden rounded-xl bg-slate-100 ring-1 ring-brand-700/10">
                <video
                  controls
                  preload="metadata"
                  class="h-full w-full object-cover aspect-video"
                  poster="<?php echo esc_url(get_theme_file_uri('images/media2-poster.webp')); ?>"
                >
                  <source 
                    src="<?php echo esc_url(get_theme_file_uri('videos/astronaut_interview.mp4')); ?>" 
                    type="video/mp4" 
                  />
                  Your browser does not support the video tag.
                </video>
              </div>
              <figcaption class="text-xs text-slate-500">Video: 1 minute 26 seconds.</figcaption>
            </figure>   
          </div>
        </div>
      </section>

      <!-- Public Service & National Engagements -->
      <section class="space-y-4">
        <h2 class="text-xl font-semibold text-slate-900">
          Public Service & National Engagements
        </h2>

        <p class="text-sm text-slate-600">
          Participation in professional discussions related to pediatric and public health.
          Appearance for informational purposes and does not imply endorsement.
        </p>
        
        <figure class="snap-start shrink-0 w-[85%] sm:w-[60%] lg:w-[32%] space-y-2">
          <div class="overflow-hidden rounded-xl bg-slate-100 ring-1 ring-brand-700/10">
            <video
              controls
              preload="metadata"
              class="h-full w-full object-cover aspect-video"
              poster="<?php echo esc_url(get_theme_file_uri('images/surgeon-general-meeting-poster.webp')); ?>"
            >
              <source 
                src="<?php echo esc_url(get_theme_file_uri('videos/surgeon-general-meeting.mp4')); ?>" 
                type="video/mp4" 
              />
              Your browser does not support the video tag.
            </video>
          </div>
          <figcaption class="text-xs text-slate-500">Video: 1 minute 26 seconds.</figcaption>
        </figure>
      </section>

      <!-- Highlights -->
      <section class="space-y-4">
        <h2 class="text-xl font-semibold text-slate-900">
          Selected Highlights
        </h2>

        <!-- Bento Box Grid -->
        <div class="mt-6 grid grid-cols-2 md:grid-cols-4 gap-3 auto-rows-[200px]">
          <!-- Large featured image - spans 2x2 -->
          <figure class="col-span-2 row-span-2 group m-0">
            <div class="h-full overflow-hidden rounded-2xl bg-slate-100 ring-1 ring-slate-200 shadow-sm hover:shadow-lg transition-all duration-300">
              <img
                src="<?php echo esc_url(get_theme_file_uri('images/nasdaq-billboard.webp')); ?>"
                alt="Dr. Okonkwo featured on Nasdaq billboard"
                class="h-full w-full object-cover object-center group-hover:scale-105 transition-transform duration-500 cursor-pointer block"
                loading="lazy"
                decoding="async"
                onclick="openPressLightbox(this)"
              />
            </div>
          </figure>

          <!-- Tall image - spans 1x2 -->
          <figure class="col-span-1 row-span-2 group m-0">
            <div class="h-auto overflow-hidden rounded-2xl bg-slate-100 ring-1 ring-slate-200 shadow-sm hover:shadow-lg transition-all duration-300">
              <img
                src="<?php echo esc_url(get_theme_file_uri('images/dr-okonkwo_2.webp')); ?>"
                alt="Dr. Okonkwo"
                class="h-full w-full object-fill group-hover:scale-105 transition-transform duration-500 cursor-pointer block"
                loading="lazy"
                decoding="async"
                onclick="openPressLightbox(this)"
              />
            </div>
          </figure>

          <!-- Regular image -->
          <figure class="col-span-1 row-span-1 group m-0">
            <div class="h-full overflow-hidden rounded-2xl bg-slate-100 ring-1 ring-slate-200 shadow-sm hover:shadow-lg transition-all duration-300">
              <img
                src="<?php echo esc_url(get_theme_file_uri('images/meet5-Joel-Osteen.webp')); ?>"
                alt="Community event"
                class="h-full w-full object-cover object-top group-hover:scale-105 transition-transform duration-500 cursor-pointer block"
                loading="lazy"
                decoding="async"
                onclick="openPressLightbox(this)"
              />
            </div>
          </figure>

          <!-- Regular image -->
          <figure class="col-span-1 row-span-1 group m-0">
            <div class="h-full overflow-hidden rounded-2xl bg-slate-100 ring-1 ring-slate-200 shadow-sm hover:shadow-lg transition-all duration-300">
              <img
                src="<?php echo esc_url(get_theme_file_uri('images/meet4-astronaut.webp')); ?>"
                alt="Community event"
                class="h-full w-full object-cover object-top group-hover:scale-105 transition-transform duration-500 cursor-pointer block"
                loading="lazy"
                decoding="async"
                onclick="openPressLightbox(this)"
              />
            </div>
          </figure>

          <!-- Regular image -->
          <figure class="col-span-1 row-span-1 group m-0">
            <div class="h-auto overflow-hidden rounded-2xl bg-slate-100 ring-1 ring-slate-200 shadow-sm hover:shadow-lg transition-all duration-300">
              <img
                src="<?php echo esc_url(get_theme_file_uri('images/surgeon-general-meeting-poster.webp')); ?>"
                alt="Community event"
                class="h-full w-auto mx-auto object-contain object-center group-hover:scale-105 transition-transform duration-500 cursor-pointer block"
                loading="lazy"
                decoding="async"
                onclick="openPressLightbox(this)"
              />
            </div>
          </figure>

          <!-- Regular image -->
          <figure class="col-span-1 row-span-1 group m-0">
            <div class="h-auto overflow-hidden rounded-2xl bg-slate-100 ring-1 ring-slate-200 shadow-sm hover:shadow-lg transition-all duration-300">
              <img
                src="<?php echo esc_url(get_theme_file_uri('images/media2-poster.webp')); ?>"
                alt="Community event"
                class="h-full w-auto mx-auto object-contain object-center group-hover:scale-105 transition-transform duration-500 cursor-pointer block"
                loading="lazy"
                decoding="async"
                onclick="openPressLightbox(this)"
              />
            </div>
          </figure>

          <!-- Tall wide image - spans 2x2 -->
          <figure class="col-span-2 row-span-2 group m-0">
            <div class="h-full overflow-hidden rounded-2xl bg-slate-100 ring-1 ring-slate-200 shadow-sm hover:shadow-lg transition-all duration-300">
              <img
                src="<?php echo esc_url(get_theme_file_uri('images/nasdaq-billboard_2.jpg')); ?>"
                alt="Community event"
                class="h-full w-full object-cover object-center group-hover:scale-105 transition-transform duration-500 cursor-pointer block"
                loading="lazy"
                decoding="async"
                onclick="openPressLightbox(this)"
              />
            </div>
          </figure>
        </div>
      </section>

      <!-- Contact -->
      <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-soft">
        <h3 class="text-base font-semibold text-slate-900">
          Media & Speaking Inquiries
        </h3>
        <p class="mt-2 text-sm text-slate-600">
          For interview requests, speaking engagements, or collaborations:
        </p>
        <p class="mt-3 text-sm font-medium text-slate-900">
          <a href="mailto:<?php echo esc_attr($site['email']); ?>" class="underline">
            <?php echo esc_html($site['email']); ?>
          </a>
        </p>
        <a
          href="<?php echo esc_url(home_url('/contact')); ?>"
          class="inline-flex items-center justify-center rounded-xl bg-brand-700 px-5 py-3 text-sm font-semibold text-white no-underline hover:bg-brand-100 mt-3"
        >
          Contact Dr. Okonkwo
        </a>
      </section>
    </div>
  </section>

  <!-- Image Lightbox Modal -->
  <div id="press-lightbox" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/90 p-4" onclick="closePressLightbox(event)">
    <button
      type="button"
      class="absolute top-4 right-4 z-10 flex h-10 w-10 items-center justify-center rounded-full bg-white/10 hover:bg-white/20 text-white transition-colors"
      onclick="closePressLightbox()"
      aria-label="Close lightbox"
    >
      <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
    
    <div class="max-h-[90vh] max-w-[90vw]" onclick="event.stopPropagation()">
      <img id="press-lightbox-image" src="" alt="" class="max-h-[85vh] w-auto mx-auto rounded-lg shadow-2xl" />
    </div>
  </div>
</main>

<script>
function openPressLightbox(imgElement) {
  const lightbox = document.getElementById('press-lightbox');
  const lightboxImg = document.getElementById('press-lightbox-image');
  
  lightboxImg.src = imgElement.src;
  lightboxImg.alt = imgElement.alt;
  
  lightbox.classList.remove('hidden');
  lightbox.classList.add('flex');
  document.body.style.overflow = 'hidden';
}

function closePressLightbox(event) {
  if (event && event.target.id !== 'press-lightbox') return;
  
  const lightbox = document.getElementById('press-lightbox');
  lightbox.classList.add('hidden');
  lightbox.classList.remove('flex');
  document.body.style.overflow = '';
}

// Close on Escape key
document.addEventListener('keydown', (e) => {
  if (e.key === 'Escape') closePressLightbox();
});
</script>

<?php get_footer(); ?>
