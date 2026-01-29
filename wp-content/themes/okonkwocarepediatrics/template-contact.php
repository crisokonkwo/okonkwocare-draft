<?php
/**
 * Template Name: Contact Page
 * Template Post Type: page
 * Description: Custom template for the contact page
 */

get_header();
$site = okc_site();

$directionsUrl = "https://www.google.com/maps/place/Okonkwo+Care+Pediatrics/@25.8279117,-80.1949499,1410m/data=!3m1!1e3!4m21!1m14!4m13!1m5!1m1!1s0x88d9b304a17ee5a7:0xacaf16bbcb558741!2m2!1d-80.1872992!2d25.8276284!1m6!1m2!1s0x88d9b304a17ee5a7:0xacaf16bbcb558741!2s5582+NE+4th+Ct+Suite+9,+Miami,+FL+33137!2m2!1d-80.1872992!2d25.8276284!3m5!1s0x88d9b304a17ee5a7:0xacaf16bbcb558741!8m2!3d25.8276263!4d-80.1873757!16s%2Fg%2F11t6yftsps!5m1!1e1?entry=ttu";

$embedMapSrc = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3591.2706261066533!2d-80.18737569999999!3d25.827626299999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d9b304a17ee5a7%3A0xacaf16bbcb558741!2sOkonkwo%20Care%20Pediatrics!5e0!3m2!1sen!2sus!4v1761570098563!5m2!1sen!2sus";

$smsHref = !empty($site['phoneTel']) ? 'sms:' . $site['phoneTel'] : '#';
?>

<main>
  <!-- Hero  -->
  <section class="bg-linear-to-b from-slate-50 to-white border-b border-slate-200">
    <div class="mx-auto max-w-5xl px-4 py-12 md:py-14 text-center">
      <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">Let's Connect</h1>
      <p class="mx-auto mt-3 max-w-2xl text-sm leading-6 text-slate-600">
        Send a message below, or reach us quickly by phone. We'll respond as soon as available.
      </p>

      <div class="mt-6 grid gap-3 sm:grid-cols-3">
        <a
          href="tel:<?php echo esc_attr($site['phoneTel']); ?>"
          class="inline-flex items-center justify-center gap-2 rounded-2xl bg-brand-700 px-4 py-3 text-sm font-semibold text-white no-underline hover:bg-brand-100 focus-visible:ring-2 focus-visible:ring-brand-600"
        >
          <svg class="h-4 w-4" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
          </svg>
          Call <?php echo esc_html($site['phoneDisplay']); ?>
        </a>

        <a
          href="<?php echo esc_attr($smsHref); ?>"
          class="inline-flex items-center justify-center gap-2 rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm font-semibold text-slate-900 no-underline hover:bg-slate-50 focus-visible:ring-2 focus-visible:ring-brand-600"
        >
          <svg class="h-4 w-4 text-brand-700" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
          </svg>
          Text us
        </a>

        <a
          href="<?php echo esc_url($directionsUrl); ?>"
          target="_blank"
          rel="noreferrer"
          class="inline-flex items-center justify-center gap-2 rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm font-semibold text-slate-900 no-underline hover:bg-slate-50 focus-visible:ring-2 focus-visible:ring-brand-600"
        >
          <svg class="h-4 w-4 text-brand-700" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
          Directions
        </a>
      </div>
    </div>
  </section>

  <!-- Main -->
  <section class="bg-white">
    <div class="mx-auto max-w-7xl px-4 py-10 md:py-10">
      <div class="grid gap-8 lg:grid-cols-12 lg:items-start">

        <!-- LEFT: Form (primary) -->
        <div class="lg:col-span-7">
          <div class="rounded-3xl border border-slate-200 bg-white shadow-soft">
            <div class="border-b border-slate-200 px-6 py-5">
              <h2 class="text-base font-semibold text-slate-900">How can we help?</h2>
              <p class="mt-1 text-sm text-slate-600">
                Please don't include sensitive medical details. If this is a medical emergency, please dial 911.
              </p>
            </div>

            <!-- <div class="p-5"> -->
            <iframe
              src="https://link.wellnesswisecrm.com/widget/form/c771AwH1O2hhTmnk9oA5"
              style="width:100%;height:100%;border:none;border-radius:0px"
              id="inline-c771AwH1O2hhTmnk9oA5" 
              data-layout="{'id':'INLINE'}"
              data-trigger-type="alwaysShow"
              data-trigger-value=""
              data-activation-type="alwaysActivated"
              data-activation-value=""
              data-deactivation-type="neverDeactivate"
              data-deactivation-value=""
              data-form-name="Contact Us Form - New"
              data-height="undefined"
              data-layout-iframe-id="inline-c771AwH1O2hhTmnk9oA5"
              data-form-id="c771AwH1O2hhTmnk9oA5"
              title="Contact Us Form - New"
                  >
            </iframe>
            <script src="https://link.wellnesswisecrm.com/js/form_embed.js"></script>
            <!-- </div> -->
          </div>
        </div>

        <!-- RIGHT: Location (secondary) -->
        <aside class="lg:col-span-5 space-y-6">
          <div class="rounded-3xl border border-slate-200 bg-slate-50 p-6 shadow-soft">
            <h2 class="text-base font-semibold text-slate-900">Our location</h2>
            <p class="mt-2 text-sm leading-6 text-slate-600">
              Serving families throughout Miami-Dade and Broward County.
              Boca Raton location coming soon.
            </p>

            <div class="mt-4 rounded-2xl border border-slate-200 bg-white p-4">
              <div class="flex items-start gap-3">
                <div class="mt-0.5 flex h-9 w-9 items-center justify-center rounded-xl bg-brand-50 ring-1 ring-brand-700/15">
                  <svg class="h-5 w-5 text-brand-700" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                </div>
                <div class="text-sm text-slate-700">
                  <div class="font-semibold text-slate-900">Okonkwo Care Pediatrics</div>
                  <div class="mt-1 leading-6">
                    <div><?php echo esc_html($site['addressLine1']); ?></div>
                    <div><?php echo esc_html($site['addressLine2']); ?></div>
                  </div>
                </div>
              </div>

              <a
                href="<?php echo esc_url($directionsUrl); ?>"
                target="_blank"
                rel="noreferrer"
                class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-brand-700 no-underline hover:underline focus-visible:ring-2 focus-visible:ring-brand-600 rounded"
              >
                Get directions
                <svg class="h-4 w-4" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                </svg>
              </a>
            </div>
          </div>

          <!-- Map (smaller, calmer) -->
          <div class="rounded-3xl border border-slate-200 bg-white shadow-soft overflow-hidden">
            <div class="border-b border-slate-200 px-6 py-4">
              <h3 class="text-sm font-semibold text-slate-900">Map</h3>
              <p class="mt-1 text-xs text-slate-600">Tap "Directions" for your preferred navigation app.</p>
            </div>
            <div class="aspect-4/3">
              <iframe
                src="<?php echo esc_url($embedMapSrc); ?>"
                class="h-full w-full"
                style="border:0;"
                allowfullscreen
                referrerpolicy="no-referrer-when-downgrade"
                title="Map to Okonkwo Care Pediatrics"
              ></iframe>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </section>
</main>

<?php
// Allow Elementor or block editor content
if (have_posts()) :
    while (have_posts()) : the_post();
        the_content();
    endwhile;
endif;
?>

<?php get_footer(); ?>
