<?php
/**
 * Hardcoded site + nav config (ported from my Astro file)
 */
// function okc_site(): array {
//   return [
//     'name'         => get_bloginfo('name'),
//     'tagline'      => get_bloginfo('description'),
//     'phoneTel'     => '+13053815507',
//     'phoneDisplay' => '(305) 381-5507',
//     'addressLine1' => '5582 N.E. 4th Ct Suite #9',
//     'addressLine2' => 'Miami, FL 33137',
//     'mapUrl'       => '#', // put Google Maps link here
//     'socials'      => [
//       'facebook'  => null, // 'https://facebook.com/...'
//       'instagram' => null, // 'https://instagram.com/...'
//     ],
//     // Logo path
//     'logo'         => 'assets/img/okonkwocare-logo.png',
//   ];
// }

function okc_site(): array {
  return [
    'name'         => 'Okonkwo Care Pediatrics',
    'tagline'      => 'Okonkwo Care Pediatrics provides trusted integrative pediatric care led by Dr. Margaret Okonkwo. Our concierge-style practice blends traditional and holistic medicine to support your child\'s physical, emotional, and social well-being.',
    'phoneTel'     => '+13053815507',
    'phoneDisplay' => '(305) 381-5507',
    'addressLine1' => '5582 N.E. 4th Ct Suite #9',
    'addressLine2' => 'Miami, FL 33137',
    'mapUrl'       => 'https://maps.app.goo.gl/p5RDXUgNxEsUCrUv7', // put Google Maps link here
    'socials'      => [
      'facebook'  => "https://www.facebook.com/OkonkwoCarePediatrics",
      'instagram' => "https://www.instagram.com/okonkwocarepediatrics/",
      'twitter'   => null, // Add if she has one
    ],
    // Logo path
    'logo'         => 'assets/img/okonkwocare-logo.png',
  ];
}

function okc_nav(): array {
  $base = trailingslashit(home_url('/'));

  return [
    [ 'href' => $base, 'label' => 'Home' ],

    [
      'href'          => $base . 'concierge-pediatrician/',
      'label'         => 'Services',
      'overviewLabel' => 'Services Overview',
      'children'      => [
        [ 'href' => $base . 'concierge-pediatrician/adhd/',       'label' => 'Holistic ADHD Program' ],
        [ 'href' => $base . 'concierge-pediatrician/membership/', 'label' => 'Concierge Membership' ],
      ],
    ],

    [
      'href'          => $base . 'resources/',
      'label'         => 'Resources',
      'children'      => [
        [ 'href' => $base . 'resources/patient-resources/', 'label' => 'Patient Resources' ],
        [ 'href' => $base . 'resources/faq',               'label' => 'FAQs' ],
      ],
    ],

    [ 'href' => $base . 'blog/',           'label' => 'Blog' ],
    [ 'href' => $base . 'about-dr-okonkwo/','label' => 'About' ],
    [ 'href' => $base . 'media/',          'label' => 'Media' ],
  ];
}
