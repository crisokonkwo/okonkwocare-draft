/**
 * Swiper initialization for carousels
 * Using Swiper from CDN (bundle includes all modules)
 */

(function () {
  "use strict";

  function onReady(fn) {
    if (document.readyState === "loading") {
      document.addEventListener("DOMContentLoaded", fn, { once: true });
    } else {
      fn();
    }
  }

  function waitForSwiper(callback) {
    if (typeof Swiper !== 'undefined') {
      callback();
    } else {
      setTimeout(() => waitForSwiper(callback), 100);
    }
  }

  // Credibility Strip Swiper
  function initCredibilitySwiper() {
    const el = document.querySelector(".credibility-swiper");
    if (!el) return;

    const pauseAllVideos = () => {
      el.querySelectorAll("video").forEach((v) => {
        try { v.pause(); } catch {}
      });
    };

    // Store swiper instance globally for lightbox access
    window.credibilitySwiper = new Swiper(el, {
      slidesPerView: 1,
      spaceBetween: 16,
      loop: true,
      speed: 650,
      autoplay: {
        delay: 4000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
      },
      keyboard: { enabled: true },
      pagination: {
        el: el.querySelector(".swiper-pagination"),
        clickable: true,
      },
      navigation: {
        nextEl: el.querySelector(".credibility-next-btn"),
        prevEl: el.querySelector(".credibility-prev-btn"),
      },
      a11y: { enabled: true },
      breakpoints: {
        640: { slidesPerView: 2, spaceBetween: 18 },
        1024: { slidesPerView: 3, spaceBetween: 20 },
      },
      on: {
        slideChangeTransitionStart: () => pauseAllVideos(),
      },
    });

    // Stop autoplay when video plays, resume when paused/ended
    el.querySelectorAll("video").forEach((video) => {
      video.addEventListener("play", () => {
        window.credibilitySwiper.autoplay.stop();
      });
      
      video.addEventListener("pause", () => {
        if (!video.seeking) { // Don't resume if just seeking
          window.credibilitySwiper.autoplay.start();
        }
      });
      
      video.addEventListener("ended", () => {
        window.credibilitySwiper.autoplay.start();
      });
    });

    // Only pause videos when clicking outside the swiper entirely
    document.addEventListener("click", (e) => {
      if (!el.contains(e.target)) {
        pauseAllVideos();
      }
    });
  }

  // Testimonials Swiper
  function initTestimonialsSwiper() {
    const el = document.querySelector(".testimonials-swiper");
    if (!el) return;

    new Swiper(el, {
      slidesPerView: 1,
      spaceBetween: 20,
      loop: true,
      speed: 500,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
        reverseDirection: false, // set true if you want opposite direction
      },
      keyboard: { enabled: true },
      pagination: {
        el: el.querySelector(".swiper-pagination"),
        clickable: true,
      },
      a11y: { enabled: true },
    });
  }

  function initAllSwipers() {
    waitForSwiper(() => {
      initCredibilitySwiper();
      initTestimonialsSwiper();
    });
  }

  onReady(initAllSwipers);
})();
