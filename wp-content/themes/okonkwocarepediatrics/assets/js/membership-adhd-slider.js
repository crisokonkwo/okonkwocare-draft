/**
 * Membership ADHD Options Slider
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

  function initADHDOptionsSlider() {
    const viewport = document.querySelector("[data-adhd-options-viewport]");
    const dots = Array.from(
      document.querySelectorAll("[data-adhd-options-pagination] .dot")
    );

    if (!viewport || !dots.length) return;

    const scroller = viewport;

    const getCards = () => {
      const row = scroller.firstElementChild;
      if (!row) return [];
      return Array.from(row.children).filter((el) => el instanceof HTMLElement);
    };

    const nearestIndex = () => {
      const cards = getCards();
      if (!cards.length) return 0;

      const scrollerRect = scroller.getBoundingClientRect();
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

      return Math.min(bestIdx, dots.length - 1);
    };

    const setActiveDot = (idx) => {
      dots.forEach((dot, i) => dot.classList.toggle("is-active", i === idx));
    };

    const updateDots = () => setActiveDot(nearestIndex());

    // Init
    updateDots();

    // Update on scroll
    let ticking = false;
    scroller.addEventListener("scroll", () => {
      if (ticking) return;
      ticking = true;
      window.requestAnimationFrame(() => {
        updateDots();
        ticking = false;
      });
    });

    // Update on resize
    window.addEventListener("resize", updateDots);

    // Dot click
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

  onReady(initADHDOptionsSlider);
})();
