<?php $site = okc_site(); ?>

</main>

<footer class="border-t border-slate-200 bg-slate-50">
  <div class="mx-auto max-w-7xl px-4 py-4">
    <div class="grid gap-10 md:grid-cols-3 md:items-start">
      <div class="text-sm">
        <div class="font-semibold text-slate-900"><?php echo esc_html($site['name']); ?></div>
        <p class="mt-2 leading-5 text-slate-600"><?php echo esc_html($site['tagline']); ?></p>
      </div>

      <div class="flex justify-center md:justify-center">
        <img
          src="<?php echo esc_url(get_theme_file_uri($site['logo'])); ?>"
          alt="<?php echo esc_attr($site['name']); ?> logo"
          width="150" height="99"
          class="h-10 object-contain"
          loading="lazy" decoding="async"
        />
      </div>

      <div class="space-y-1 text-slate-700 md:text-end">
        <div class="text-xs font-semibold uppercase tracking-wide text-slate-900">Contact &amp; Location</div>

        <p class="mt-2 text-sm text-slate-600 leading-5">
          <?php echo esc_html($site['addressLine1']); ?><br />
          <?php echo esc_html($site['addressLine2']); ?><br />
          <a class="no-underline underline hover:text-slate-900" href="<?php echo esc_url($site['mapUrl']); ?>" target="_blank" rel="noreferrer">Get directions</a>
        </p>

        <p class="mt-2 text-sm text-slate-600 leading-6">
          <a href="tel:<?php echo esc_attr($site['phoneTel']); ?>" class="underline hover:text-slate-900">
            <?php echo esc_html($site['phoneDisplay']); ?>
          </a>
        </p>

        <div class="mt-3 text-xs font-semibold uppercase tracking-wide text-slate-900">Follow us</div>
        <p class="text-xs text-slate-600">For updates &amp; notices</p>

        <div class="mt-1 flex items-center gap-4 md:justify-end">
          <?php if (!empty($site['socials']['facebook'])): ?>
            <a aria-label="Visit our Facebook page"
                class="rounded-lg transition hover:opacity-80 focus-visible:ring-2 focus-visible:ring-brand-600" href="<?php echo esc_url($site['socials']['facebook']); ?>" target="_blank" rel="noreferrer">
              <!-- your FB SVG here (same as Astro) -->
               <!-- Facebook icon -->
                <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="#1877F2"
                class="h-9 w-9"
                aria-hidden="true"
              >
                <path d="M22.675 0h-21.35C.597 0 0 .597 0 1.326v21.348C0 23.403.597 24 1.326 24h11.495v-9.294H9.692V11.01h3.129V8.309c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24h-1.918c-1.504 0-1.796.715-1.796 1.763v2.313h3.587l-.467 3.696h-3.12V24h6.116C23.403 24 24 23.403 24 22.674V1.326C24 .597 23.403 0 22.675 0z"/>
              </svg>
              <!-- <span class="sr-only">Facebook</span> -->
            </a>
          <?php endif; ?>

          <?php if (!empty($site['socials']['instagram'])): ?>
            <a aria-label="Visit our Instagram profile"
                class="rounded-lg transition hover:opacity-80 focus-visible:ring-2 focus-visible:ring-brand-600" href="<?php echo esc_url($site['socials']['instagram']); ?>" target="_blank" rel="noreferrer">
              <!-- your IG SVG here (same as Astro) -->
                <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                class="h-9 w-9"
                aria-hidden="true"
              >
                <defs>
                  <radialGradient id="instagram-gradient" cx="25%" cy="100%">
                    <stop offset="0%" style="stop-color:#FD5;stop-opacity:1" />
                    <stop offset="25%" style="stop-color:#FF543E;stop-opacity:1" />
                    <stop offset="50%" style="stop-color:#C837AB;stop-opacity:1" />
                    <stop offset="100%" style="stop-color:#4168B7;stop-opacity:1" />
                  </radialGradient>
                </defs>
                <path fill="url(#instagram-gradient)" d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.343 3.608 1.318.975.975 1.256 2.242 1.318 3.608.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.062 1.366-.343 2.633-1.318 3.608-.975.975-2.242 1.256-3.608 1.318-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.366-.062-2.633-.343-3.608-1.318-.975-.975-1.256-2.242-1.318-3.608C2.175 15.584 2.163 15.204 2.163 12s.012-3.584.07-4.85c.062-1.366.343-2.633 1.318-3.608.975-.975 2.242-1.256 3.608-1.318C8.416 2.175 8.796 2.163 12 2.163zm0-2.163C8.741 0 8.332.014 7.052.072 5.775.13 4.602.426 3.635 1.393 2.668 2.36 2.372 3.533 2.314 4.81.256 8.741 0 12 0 12s.256 3.259.314 7.19c.058 1.277.354 2.45 1.321 3.417.967.967 2.14 1.263 3.417 1.321C8.332 23.986 8.741 24 12 24s3.668-.014 4.948-.072c1.277-.058 2.45-.354 3.417-1.321.967-.967 1.263-2.14 1.321-3.417.058-1.28.072-1.689.072-4.948s-.014-3.668-.072-4.948c-.058-1.277-.354-2.45-1.321-3.417-.967-.967-2.14-1.263-3.417-1.321C15.668.014 15.259 0 12 0zm0 5.838A6.162 6.162 0 1 0 18.162 12 6.169 6.169 0 0 0 12 5.838zm0 10.162A4 4 0 1 1 16 12a4.005 4.005 0 0 1-4 4zm6.406-11.845a1.44 1.44 0 1 0 1.44 1.44 1.439 1.439 0 0 0-1.44-1.44z"/>
              </svg>
              <!-- <span class="sr-only">Instagram</span> -->
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <div class="mt-4 text-xs text-slate-500">
      © <?php echo esc_html(date('Y')); ?> <?php echo esc_html($site['name']); ?>. All rights reserved.
    </div>
  </div>
</footer>


<!-- Mobile sticky CTA -->
<?php if (!is_page('contact') && !is_page('thank-you')) : ?>
<div class="fixed inset-x-0 bottom-0 z-50 border-t border-slate-200 bg-white/95 backdrop-blur lg:hidden">
  <div class="mx-auto max-w-7xl px-4 py-3">
    <a
      href="tel:<?php echo esc_attr($site['phoneTel']); ?>"
      class="block w-full rounded-xl bg-brand-700 px-5 py-3 text-center text-sm font-semibold text-white no-underline hover:bg-brand-800"
    >
      Contact Us <?php echo esc_html($site['phoneDisplay']); ?>
    </a>
  </div>
</div>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
