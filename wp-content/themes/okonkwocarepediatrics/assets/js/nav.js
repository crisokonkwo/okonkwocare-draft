/**
 * assets/js/nav.js
 * Handles mobile drawer, accordions, and desktop dropdowns
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

  // ---------------------------
  // Mobile Drawer (Full-screen with CSS animations)
  // ---------------------------
  function initMobileDrawer() {
    const btn = document.getElementById("menu-button");
    const drawer = document.getElementById("mobile-drawer");
    const closeBtn = document.getElementById("drawer-close");
    const overlay = document.getElementById("drawer-overlay");

    if (!btn || !drawer || !closeBtn || !overlay) return;

    // Ensure initial state
    btn.setAttribute("aria-expanded", "false");
    drawer.setAttribute("data-open", "false");

    let lastFocused = null;

    function setPageScrollLocked(isLocked) {
      document.documentElement.classList.toggle("overflow-hidden", isLocked);
      document.body.classList.toggle("overflow-hidden", isLocked);
    }

    function open() {
      if (drawer.getAttribute("data-open") === "true") return;

      lastFocused = document.activeElement;

      drawer.classList.remove("hidden");
      // Force reflow before adding data-open for CSS transition
      void drawer.offsetHeight;
      drawer.setAttribute("data-open", "true");
      btn.setAttribute("aria-expanded", "true");
      setPageScrollLocked(true);

      closeBtn.focus({ preventScroll: true });
    }

    function close() {
      if (drawer.getAttribute("data-open") !== "true") return;

      drawer.setAttribute("data-open", "false");
      btn.setAttribute("aria-expanded", "false");
      setPageScrollLocked(false);

      // Wait for transition to complete before hiding
      setTimeout(() => {
        if (drawer.getAttribute("data-open") !== "true") {
          drawer.classList.add("hidden");
        }
      }, 220);

      if (lastFocused && typeof lastFocused.focus === "function") {
        lastFocused.focus({ preventScroll: true });
      } else {
        btn.focus({ preventScroll: true });
      }
      lastFocused = null;
    }

    function toggle() {
      const isOpen = drawer.getAttribute("data-open") === "true";
      isOpen ? close() : open();
    }

    btn.addEventListener("click", (e) => {
      e.preventDefault();
      toggle();
    });

    closeBtn.addEventListener("click", (e) => {
      e.preventDefault();
      close();
    });

    overlay.addEventListener("click", (e) => {
      e.preventDefault();
      close();
    });

    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape" && drawer.getAttribute("data-open") === "true") {
        close();
      }
    });

    // Close on navigation link click
    drawer.addEventListener("click", (e) => {
      const target = e.target instanceof Element ? e.target : null;
      if (target && target.hasAttribute("data-nav-link")) {
        close();
      }
    });
  }

  // ---------------------------
  // Mobile Accordions (single-open)
  // ---------------------------
  function initMobileAccordions() {
    document.addEventListener("click", (e) => {
      const target = e.target instanceof Element ? e.target : null;
      if (!target) return;

      const trigger = target.closest("[data-accordion-trigger]");
      if (!trigger) return;

      const key = trigger.getAttribute("data-accordion-trigger");
      if (!key) return;

      const panel = document.querySelector(`[data-accordion-panel="${cssEscape(key)}"]`);
      const chevron = document.querySelector(`[data-accordion-chevron="${cssEscape(key)}"]`);
      if (!panel) return;

      const isOpen = panel.classList.contains("block");

      // Close all other panels
      document.querySelectorAll("[data-accordion-panel]").forEach((p) => {
        if (!(p instanceof HTMLElement)) return;

        const pKey = p.getAttribute("data-accordion-panel");
        if (!pKey || pKey === key) return;

        p.classList.add("hidden");
        p.classList.remove("block");

        const otherTrigger = document.querySelector(
          `[data-accordion-trigger="${cssEscape(pKey)}"]`
        );
        otherTrigger?.setAttribute("aria-expanded", "false");

        const otherChevron = document.querySelector(
          `[data-accordion-chevron="${cssEscape(pKey)}"]`
        );
        otherChevron?.classList.remove("rotate-180");
      });

      // Toggle current panel
      panel.classList.toggle("hidden", isOpen);
      panel.classList.toggle("block", !isOpen);
      trigger.setAttribute("aria-expanded", (!isOpen).toString());
      if (chevron) chevron.classList.toggle("rotate-180", !isOpen);
    });
  }

  // ---------------------------
  // Desktop Dropdowns (click-to-toggle)
  // ---------------------------
  function initDesktopDropdowns() {
    const triggers = Array.from(document.querySelectorAll("[data-dropdown-trigger]"));
    if (!triggers.length) return;

    function closeDropdown(trigger) {
      const id = trigger.getAttribute("data-dropdown-trigger");
      if (!id) return;

      const menu = document.querySelector(`[data-dropdown-menu="${cssEscape(id)}"]`);
      const chevron = document.querySelector(`[data-dropdown-chevron="${cssEscape(id)}"]`);

      trigger.setAttribute("aria-expanded", "false");
      menu?.classList.remove("!opacity-100", "!pointer-events-auto");
      chevron?.classList.remove("rotate-180");
    }

    function openDropdown(trigger) {
      const id = trigger.getAttribute("data-dropdown-trigger");
      if (!id) return;

      const menu = document.querySelector(`[data-dropdown-menu="${cssEscape(id)}"]`);
      const chevron = document.querySelector(`[data-dropdown-chevron="${cssEscape(id)}"]`);

      trigger.setAttribute("aria-expanded", "true");
      menu?.classList.add("!opacity-100", "!pointer-events-auto");
      chevron?.classList.add("rotate-180");
    }

    function closeAllExcept(exceptionTrigger) {
      triggers.forEach((t) => {
        if (exceptionTrigger && t === exceptionTrigger) return;
        closeDropdown(t);
      });
    }

    triggers.forEach((trigger) => {
      if (!trigger.hasAttribute("aria-expanded")) {
        trigger.setAttribute("aria-expanded", "false");
      }

      trigger.addEventListener("click", (e) => {
        e.preventDefault();
        e.stopPropagation();

        const isOpen = trigger.getAttribute("aria-expanded") === "true";

        if (isOpen) {
          closeDropdown(trigger);
        } else {
          closeAllExcept(trigger);
          openDropdown(trigger);
        }
      });

      trigger.addEventListener("keydown", (e) => {
        const key = e.key;

        if (key === "Enter" || key === " ") {
          e.preventDefault();
          const isOpen = trigger.getAttribute("aria-expanded") === "true";
          if (isOpen) {
            closeDropdown(trigger);
          } else {
            closeAllExcept(trigger);
            openDropdown(trigger);
          }
        } else if (key === "Escape") {
          e.preventDefault();
          closeDropdown(trigger);
          trigger.focus({ preventScroll: true });
        }
      });
    });

    // Click outside closes all
    document.addEventListener("click", (e) => {
      const target = e.target instanceof Element ? e.target : null;
      if (!target) return;

      if (
        target.closest("[data-dropdown-container]") ||
        target.closest("[data-dropdown-trigger]")
      ) {
        return;
      }
      closeAllExcept(null);
    });

    // Escape closes all
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape") {
        closeAllExcept(null);
      }
    });

    // Close when focus leaves
    document.addEventListener("focusin", (e) => {
      const target = e.target instanceof Element ? e.target : null;
      if (!target) return;

      if (target.closest("[data-dropdown-container]")) return;

      closeAllExcept(null);
    });
  }

  // ---------------------------
  // Utilities
  // ---------------------------
  function cssEscape(value) {
    if (window.CSS && typeof window.CSS.escape === "function") {
      return window.CSS.escape(value);
    }
    return String(value).replace(/"/g, '\\"');
  }

  // ---------------------------
  // Initialize
  // ---------------------------
  onReady(initMobileDrawer);
  onReady(initMobileAccordions);
  onReady(initDesktopDropdowns);
})();
