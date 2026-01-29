<?php
/**
 * Template Name: FAQ Page
 * Template Post Type: page
 */

get_header();
$site = okc_site();

$faqs = [
  [
    'group' => 'Membership & Billing',
    'items' => [
      [
        'q' => 'What is Direct Primary Care (DPC)?',
        'a' => 'Direct Primary Care is a type of healthcare that focuses on providing a personalized and strong patient-physician relationship. The number of patients cared for by a DPC physician is limited versus the typical physician who has to take care of thousands of patients in a traditional medical practice. In South Florida, most pediatricians care for up to 10,000 patients. Dr. Okonkwo will only take care of a few hundred patients in her practice. A direct primary care practice offers a full range of primary care services and most in-office labs, medications and treatments. Direct Primary Care patients become members of the practice by paying a low monthly membership fee.',
      ],
      [
        'q' => 'Is DPC the same as concierge medicine?',
        'a' => 'DPC practices provide the same level of concierge care at a FRACTION of the cost of typical concierge practices. Patients of Okonkwo Care Pediatrics get easy access to Dr Okonkwo, easy and flexible appointment availability, and longer appointment times just like a typical concierge practice. Concierge practices usually charge high monthly fees and collect copays and deductibles. Okonkwo Care Pediatrics does not charge any copays or deductibles and charges a low monthly membership fee only.',
      ],
      [
        'q' => 'How do I pay for my child\'s membership?',
        'a' => 'Membership fees are charged monthly to your debit card, credit card, or bank account. Membership fees can also be paid annually. A one-time enrollment fee per family is due at the beginning of services.',
      ],
      [
        'q' => 'Can I use an FSA or HSA to pay for the membership?',
        'a' => 'Some patients have Health Savings Accounts or Flexible Spending Accounts which may be used to pay for the monthly membership fees. Please contact your health insurance representative or accountant for advice.',
      ],
      [
        'q' => 'What happens if we want to end the membership?',
        'a' => 'We ask for a 30-day written notice by email or a form completed in the office. There are no penalties. Annual memberships are reimbursed for unused months.',
      ],
    ],
  ],
  [
    'group' => 'Insurance & Coverage',
    'items' => [
      [
        'q' => 'Does Okonkwo Care Pediatrics take insurance?',
        'a' => 'We do take insurance. Patients can use their health insurance for vaccines, labs, radiology studies, specialist visits, and so on. All of the pediatric care Dr. Okonkwo provides is covered under the membership fee. This means that patients have the ability to access Dr. Okonkwo for office visits, telehealth, phone calls, emails and text messaging as often as they need to all covered by the low monthly membership fee. No copays and no deductible payments are required.',
      ],
      [
        'q' => 'Does my child still need insurance?',
        'a' => 'Okonkwo Care Pediatrics is not an insurance plan and is not a substitute for health insurance. It is recommended that patients retain their coverage with a health insurance plan to ensure they have coverage in the event of a catastrophic illness or hospitalization or need a specialist\'s care. Please consult with your insurance representative to discuss your health insurance coverage.',
      ],
    ],
  ],
  [
    'group' => 'Access & After-Hours',
    'items' => [
      [
        'q' => 'What if my child gets sick after hours or on a weekend?',
        'a' => 'The benefit of Direct Primary Care is that the patients have easy access to the pediatrician regardless if it\'s after hours or on a weekend. Patients may call or text with health concerns and the pediatrician will assist in a timely manner. Telehealth visits may also be available on a case-by-case basis.',
      ],
      [
        'q' => 'What if my child gets sick while we are traveling out of town?',
        'a' => 'One of the benefits of your child\'s membership is access to the pediatrician when your family is traveling. Virtual medical visits/telehealth, phone calls, or email can be used to communicate with the pediatrician. It may be possible to have prescriptions sent to a local pharmacy or for the physician to help coordinate your child\'s care at an urgent care or emergency room if necessary.',
      ],
      [
        'q' => 'Are telehealth or virtual visits available?',
        'a' => 'When appropriate, telehealth visits are available to members and can often reduce the need for an in-office visit.',
      ],
      [
        'q' => 'What happens when Dr. Okonkwo goes on vacation?',
        'a' => 'There are limited times when Dr. Okonkwo is unavailable. During those times, coverage will be provided by another pediatric provider.',
      ],
    ],
  ],
  [
    'group' => 'Office & Visits',
    'items' => [
      [
        'q' => 'Where is the office located?',
        'a' => 'The office is located in Miami, FL at 5582 N.E. 4th Ct Suite #9, Miami, FL 33137.',
      ],
      [
        'q' => 'What are the office hours?',
        'a' => 'The office is open Monday to Friday from 9:00 AM to 5:00 PM. Extended hours may be available on a case-by-case basis.',
      ],
      [
        'q' => 'How do I schedule an appointment?',
        'a' => 'Appointments can be scheduled by calling the office during business hours, or via email. Same-day and next-day appointments are often available.',
      ],
      [
        'q' => 'What should I expect during my child\'s visit?',
        'a' => 'Our visits are intentionally unrushed and focused on the whole child. We take time to discuss your child\'s medical history, development, behavior, and family concerns, and we encourage parents to ask questions so you leave feeling informed and supported.',
      ],
      [
        'q' => 'What types of visits are included in the membership?',
        'a' => 'The membership includes all types of primary care visits including well-child visits, sick visits, chronic condition management, developmental assessments, and preventive care. There are no limits to the number of office visits, telehealth visits, phone calls, or emails you can have with Dr. Okonkwo.',
      ],
      [
        'q' => 'How long are appointments, and do you run on time?',
        'a' => 'Appointments are typically longer than traditional pediatric visits, allowing for thorough discussion and personalized care. Because we schedule fewer patients per day, we strive to run on time and minimize waiting whenever possible.',
      ],
      [
        'q' => 'Can both parents or caregivers attend the visit?',
        'a' => 'Yes. We welcome parents, guardians, or caregivers to attend visits together, as long as the child is comfortable. Having everyone involved often leads to better communication and shared understanding of your child\'s care plan.',
      ],
    ],
  ]
];

// Flatten for JSON-LD
$all_faqs = [];
foreach ($faqs as $group) {
  foreach ($group['items'] as $item) {
    $all_faqs[] = array_merge($item, ['group' => $group['group']]);
  }
}

// JSON-LD structured data
$faq_jsonld = [
  '@context' => 'https://schema.org',
  '@type' => 'FAQPage',
  'mainEntity' => array_map(function($x) {
    return [
      '@type' => 'Question',
      'name' => $x['q'],
      'acceptedAnswer' => [
        '@type' => 'Answer',
        'text' => str_replace("\n", '<br/>', $x['a']),
      ],
    ];
  }, $all_faqs),
];
?>

<script type="application/ld+json">
<?php echo wp_json_encode($faq_jsonld, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
</script>

  <!-- Hero -->
  <section class="bg-linear-to-b from-slate-50 to-white border-b border-slate-200 sticky top-0 z-30 transition-shadow duration-200" id="faq-sticky-header">
    <div class="mx-auto max-w-3xl px-4 py-10 md:py-10 text-center">
      <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
        Frequently Asked Questions
      </h1>
      <!-- <p class="mx-auto mt-3 max-w-2xl text-sm leading-6 text-slate-600">
        Quick answers about membership, insurance, after-hours access, and how our care model works.
      </p> -->

      <!-- Search -->
      <div class="mt-6">
        <label class="sr-only" for="faq-search">Search FAQs</label>
        <div class="relative">
          <svg class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
          <input
            id="faq-search"
            type="search"
            placeholder="Search questions (e.g., insurance, telehealth, weekend)…"
            class="w-full rounded-2xl border border-slate-200 bg-white px-12 py-3 text-sm text-slate-900 shadow-soft
                   placeholder:text-slate-400 focus:border-brand-300 focus:outline-none focus:ring-2 focus:ring-brand-600/30"
          />
        </div>
      </div>

      <!-- Jump links -->
      <!-- <nav class="mt-4 flex flex-wrap items-center justify-center gap-2 text-xs" aria-label="FAQ sections">
        <a
          href="#membership-billing"
          class="rounded-full border border-slate-200 bg-white px-3 py-1 text-slate-700 no-underline hover:bg-slate-50
                focus-visible:ring-2 focus-visible:ring-brand-600"
        >
          Membership
        </a>
        <span class="text-slate-400" aria-hidden="true">•</span>
        <a
          href="#insurance-coverage"
          class="rounded-full border border-slate-200 bg-white px-3 py-1 text-slate-700 no-underline hover:bg-slate-50
                focus-visible:ring-2 focus-visible:ring-brand-600"
        >
          Insurance
        </a>
        <span class="text-slate-400" aria-hidden="true">•</span>
        <a
          href="#access-after-hours"
          class="rounded-full border border-slate-200 bg-white px-3 py-1 text-slate-700 no-underline hover:bg-slate-50
                focus-visible:ring-2 focus-visible:ring-brand-600"
        >
          After-hours
        </a>
      </nav> -->
      <?php $sections = ['Membership & Billing', 'Insurance & Coverage', 'Office & Visits', 'Access & After-Hours']; ?>
      
      <nav class="mt-4 flex flex-wrap items-center justify-center gap-2 text-xs" aria-label="FAQ sections">
        <?php foreach ($sections as $i => $label): ?>
          <a
            href="#<?php echo esc_attr( sanitize_title($label) ); ?>"
            class="rounded-full border border-slate-200 bg-white px-3 py-1 text-slate-700 no-underline hover:bg-slate-50
                  focus-visible:ring-2 focus-visible:ring-brand-600"
          >
            <?php echo esc_html($label); ?>
          </a>
          <?php if ($i < count($sections) - 1): ?>
            <span class="text-slate-400" aria-hidden="true">•</span>
          <?php endif; ?>
        <?php endforeach; ?>
      </nav>


    </div>
  </section>

  <style>
    #faq-sticky-header.is-stuck {
      box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
    }
    
    .faq-group {
      scroll-margin-top: 280px;
    }
  </style>

  <!-- FAQ content -->
  <section class="bg-white">
    <div class="mx-auto max-w-4xl px-4 py-10 md:py-10">
      <div class="space-y-10" id="faq-groups">
        <?php foreach ($faqs as $group): ?>
          <div
            class="faq-group"
            id="<?php echo esc_attr( sanitize_title($group['group']) ); ?>"
            data-group="<?php echo esc_attr($group['group']); ?>"
          >
            <h2 class="text-m font-semibold tracking-wide text-slate-900">
              <?php echo esc_html($group['group']); ?>
            </h2>

            <div class="mt-4 space-y-3">
              <?php foreach ($group['items'] as $item): ?>
                <details class="faq-item group rounded-2xl border border-slate-200 bg-white shadow-soft">
                  <summary
                    class="flex cursor-pointer list-none items-start justify-between gap-4 px-5 py-4 text-left"
                  >
                    <span class="text-sm font-semibold text-slate-600">
                      <?php echo esc_html($item['q']); ?>
                    </span>
                    <svg
                      class="mt-0.5 h-5 w-5 shrink-0 text-brand-700 transition-transform group-open:rotate-180"
                      stroke-width="1.75"
                      aria-hidden="true"
                      fill="none"
                      stroke="currentColor"
                      viewBox="0 0 24 24"
                    >
                      <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                  </summary>

                  <div class="px-5 pb-5 -mt-1">
                    <p class="text-sm leading-6 text-slate-700 whitespace-pre-line">
                      <?php echo esc_html($item['a']); ?>
                    </p>
                  </div>
                </details>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- CTA -->
      <div class="mt-12 rounded-3xl border border-brand-700/15 bg-brand-50 p-6 md:p-10 ">
          <div class="max-w-3xl text-center">
            <h3 class="text-base font-semibold text-slate-900">Still have questions?</h3>
            <p class="mt-1 text-sm leading-6 text-slate-600">
              Call us and we'll help you choose the right next step for your child.
            </p>
          </div>

          <div class="mt-6 flex flex-col gap-3 sm:flex-row justify-center">
            <div>
              <a
                href="<?php echo esc_url(home_url('/contact')); ?>"
                class="inline-flex items-center justify-center gap-2 rounded-2xl bg-brand-700 px-5 py-3 text-sm font-semibold text-white no-underline
                      hover:bg-brand-100 focus-visible:ring-2 focus-visible:ring-brand-600"
              >
                Schedule a consult
              </a>
          </div>
            <div>
              <a
                href="tel:<?php echo esc_attr($site['phoneTel']); ?>"
                class="inline-flex items-center justify-center rounded-2xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-900 no-underline
                      hover:bg-slate-50 focus-visible:ring-2 focus-visible:ring-brand-600"
              >
                Call <?php echo esc_html($site['phoneDisplay']); ?>
              </a>
            </div>
      </div>
    </div>
  </section>

  <script>
    // Sticky header shadow on scroll
    const stickyHeader = document.getElementById("faq-sticky-header");
    
    if (stickyHeader) {
      const observer = new IntersectionObserver(
        ([e]) => {
          stickyHeader.classList.toggle("is-stuck", e.intersectionRatio < 1);
        },
        { threshold: [1], rootMargin: "-1px 0px 0px 0px" }
      );
      observer.observe(stickyHeader);
    }

    const input = document.getElementById("faq-search");
    const groups = document.querySelectorAll("#faq-groups .faq-group");

    const normalize = (s) => (s || "").toLowerCase().trim();

    if (input) {
      input.addEventListener("input", () => {
        const q = normalize(input.value);

        groups.forEach((group) => {
          const items = group.querySelectorAll(".faq-item");
          let anyVisible = false;

          items.forEach((d) => {
            const summary = d.querySelector("summary");
            const body = d.querySelector("p");
            const summaryText = summary ? summary.textContent : "";
            const bodyText = body ? body.textContent : "";
            const text = normalize(summaryText + " " + bodyText);

            const match = !q || text.includes(q);
            d.style.display = match ? "" : "none";
            if (match) anyVisible = true;

            // Optional: collapse items when filtering
            if (q && !match) d.removeAttribute("open");
          });

          group.style.display = anyVisible ? "" : "none";
        });
      });
    }

    // Add smooth scroll with offset for jump links
    document.querySelectorAll('nav[aria-label="FAQ sections"] a').forEach(function(link) {
      link.addEventListener('click', function(e) {
        e.preventDefault();
        const href = link.getAttribute('href');
        if (!href) return;
        
        const targetId = href.slice(1);
        const target = document.getElementById(targetId);
        
        if (target) {
          // Get the main site header and FAQ sticky header heights
          const mainHeader = document.querySelector('header');
          const faqHeader = document.getElementById('faq-sticky-header');
          
          const mainHeaderHeight = mainHeader ? mainHeader.offsetHeight : 0;
          const faqHeaderHeight = faqHeader ? faqHeader.offsetHeight : 0;
          
          // Calculate total offset (both headers + small buffer)
          const totalOffset = mainHeaderHeight + faqHeaderHeight + 24;
          
          // Calculate target position
          const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - totalOffset;
          
          // Scroll to position
          window.scrollTo({
            top: targetPosition,
            behavior: 'smooth'
          });
        }
      });
    });
  </script>

<?php
// Allow Elementor or block editor content
if (have_posts()) :
    while (have_posts()) : the_post();
        the_content();
    endwhile;
endif;
?>

<?php get_footer(); ?>
