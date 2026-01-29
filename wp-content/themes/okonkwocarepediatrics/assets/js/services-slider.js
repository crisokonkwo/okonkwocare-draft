/**
 * Services Cards Slider
 * Horizontal scroll with pagination dots on mobile
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

  function initServicesSlider() {
    const id = "services";
    const viewport = document.querySelector(`[data-offer-viewport="${id}"]`);
    const dots = Array.from(
      document.querySelectorAll(`[data-offer-pagination="${id}"] .dot`)
    );

    if (!viewport || !dots.length) return;

    const scroller = viewport;

    const getCards = () => {
      const row = scroller.firstElementChild;
      if (!row) return [];
      return Array.from(row.children).filter((el) => el instanceof HTMLElement);
    };

    // Find which card's LEFT edge is closest to the scroller's LEFT "snap line"
    const nearestIndex = () => {
      const cards = getCards();
      if (!cards.length) return 0;

      const scrollerRect = scroller.getBoundingClientRect();

      // If you're using scroll-px-4 (16px), the snap line effectively starts after padding.
      const styles = window.getComputedStyle(scroller);
      const scrollPadLeft = parseFloat(styles.scrollPaddingLeft || "0") || 0;

      const snapLineX = scrollerRect.left + scrollPadLeft;

      let bestIdx = 0;
      let bestDist = Infinity;

      cards.forEach((card, idx) => {
        const r = card.getBoundingClientRect();
        const dist = Math.abs(r.left - snapLineX);
        if (dist < bestDist) {
          bestDist = dist;
          bestIdx = idx;
        }
      });

      // Clamp to dots length in case you intentionally show fewer dots than cards
      return Math.min(bestIdx, dots.length - 1);
    };

    const setActiveDot = (idx) => {
      dots.forEach((dot, i) => dot.classList.toggle("is-active", i === idx));
    };

    const updateDots = () => setActiveDot(nearestIndex());

    // Init
    updateDots();

    // Update on scroll (throttled by rAF)
    let ticking = false;
    scroller.addEventListener("scroll", () => {
      if (ticking) return;
      ticking = true;
      window.requestAnimationFrame(() => {
        updateDots();
        ticking = false;
      });
    });

    // Update on resize (layout changes can move bounding boxes)
    window.addEventListener("resize", updateDots);

    // Dot click: scroll the corresponding card into view
    dots.forEach((dot, i) => {
      dot.addEventListener("click", () => {
        const cards = getCards();
        const target = cards[i];
        if (!target) return;
        target.scrollIntoView({
          behavior: "smooth",
          inline: "start",
          block: "nearest",
        });
      });
    });
  }

  onReady(initServicesSlider);
})();
