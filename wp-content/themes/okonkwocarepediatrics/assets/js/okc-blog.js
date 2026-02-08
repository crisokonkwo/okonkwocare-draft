(function () {
  const searchInput = document.getElementById("blog-search");
  const chips = Array.from(document.querySelectorAll(".blog-chip"));

  const featuredSection = document.getElementById("featured-section");
  const featuredTrack = document.querySelector(".featured-track");
  const featuredPrev = document.querySelector(".featured-prev");
  const featuredNext = document.querySelector(".featured-next");
  const featuredDotsWrap = document.querySelector(".featured-dots");

  const blogList = document.getElementById("blog-list");
  const loadMoreBtn = document.getElementById("load-more-btn");

  const blogEmpty = document.getElementById("blog-empty");
  const featuredEmpty = document.getElementById("featured-empty");

  if (!blogList) return;

  const allBlogCards = Array.from(blogList.querySelectorAll("article"));
  const allFeaturedCards = featuredTrack ? Array.from(featuredTrack.querySelectorAll("article")) : [];

  let activeCategory = "all";
  let query = "";

  function matches(card) {
    const title = card.getAttribute("data-title") || "";
    const desc = card.getAttribute("data-desc") || "";
    const cat = card.getAttribute("data-category") || "";
    const author = card.getAttribute("data-author") || "";
    const date = card.getAttribute("data-date") || "";
    const body = card.getAttribute("data-body") || "";

    const haystack = `${title} ${desc} ${cat} ${author} ${date} ${body}`;
    const categoryOk = (activeCategory === "all") || (cat === activeCategory);
    const queryOk = !query || haystack.includes(query);

    return categoryOk && queryOk;
  }

  function setEmptyState(listEl, emptyEl, isEmpty) {
    if (!emptyEl || !listEl) return;
    emptyEl.classList.toggle("hidden", !isEmpty);
    listEl.classList.toggle("hidden", isEmpty);
  }

  // ---------- Featured slider controls ----------
  function getScrollAmount() {
    if (!featuredTrack) return 0;
    const firstSlide = featuredTrack.querySelector("article");
    if (!firstSlide) return 0;

    const slideRect = firstSlide.getBoundingClientRect();
    const trackStyles = window.getComputedStyle(featuredTrack);
    const gap = parseFloat(trackStyles.columnGap || trackStyles.gap || "0") || 0;
    return Math.max(1, Math.round(slideRect.width + gap));
  }

  function scrollFeatured(dir) {
    if (!featuredTrack) return;
    const amt = getScrollAmount() || 300;
    featuredTrack.scrollBy({ left: dir * amt, behavior: "smooth" });
  }

  function buildDots() {
    if (!featuredDotsWrap || !featuredTrack) return;
    // Only for mobile (you already hide on sm+). Still safe to build always.
    featuredDotsWrap.innerHTML = "";
    const visibleSlides = Array.from(featuredTrack.querySelectorAll("article")).filter(
      (el) => !el.classList.contains("hidden")
    );

    const count = visibleSlides.length;
    if (count <= 1) return;

    for (let i = 0; i < count; i++) {
      const b = document.createElement("button");
      b.type = "button";
      b.className = "featured-dot h-2.5 w-2.5 rounded-full bg-slate-300";
      b.dataset.index = String(i);
      b.setAttribute("aria-label", `Go to featured item ${i + 1}`);
      b.addEventListener("click", () => {
        const amt = getScrollAmount() || 300;
        featuredTrack.scrollTo({ left: i * amt, behavior: "smooth" });
      });
      featuredDotsWrap.appendChild(b);
    }
  }

  if (featuredPrev) featuredPrev.addEventListener("click", () => scrollFeatured(-1));
  if (featuredNext) featuredNext.addEventListener("click", () => scrollFeatured(1));

  // ---------- Filtering + load more ----------
  function applyFilters() {
    const blogVisible = [];
    allBlogCards.forEach((card) => {
      const ok = matches(card);
      card.classList.toggle("hidden", !ok);
      if (ok) blogVisible.push(card);
    });

    // Featured cards filter
    if (featuredTrack && allFeaturedCards.length) {
      const featuredVisible = [];
      allFeaturedCards.forEach((card) => {
        const ok = matches(card);
        card.classList.toggle("hidden", !ok);
        if (ok) featuredVisible.push(card);
      });

      // Hide the whole featured section if none match
      if (featuredSection) {
        const hasAny = featuredVisible.length > 0;
        featuredSection.classList.toggle("hidden", !hasAny);
      }

      if (featuredEmpty) {
        // show empty only if section exists but no visible
        const showEmpty = featuredSection && !featuredSection.classList.contains("hidden");
        featuredEmpty.classList.toggle("hidden", showEmpty);
      }

      buildDots();
    }

    setEmptyState(blogList, blogEmpty, blogVisible.length === 0);

    if (loadMoreBtn) {
      const hasHidden = blogVisible.some((c) => c.classList.contains("okc-hidden"));
      loadMoreBtn.classList.toggle("load-more-hidden", !hasHidden);
    }
  }

  if (searchInput) {
    searchInput.addEventListener("input", (e) => {
      query = (e.target.value || "").trim().toLowerCase();
      applyFilters();
    });
  }

  chips.forEach((chip) => {
    chip.addEventListener("click", () => {
      chips.forEach((c) => c.setAttribute("aria-pressed", "false"));
      chip.setAttribute("aria-pressed", "true");

      const raw = (chip.getAttribute("data-category") || "all").toLowerCase();
      activeCategory = raw;
      applyFilters();
    });
  });

  if (loadMoreBtn) {
    loadMoreBtn.addEventListener("click", () => {
      const BATCH = 9;
      const candidates = allBlogCards.filter(
        (c) => !c.classList.contains("hidden") && c.classList.contains("okc-hidden")
      );
      candidates.slice(0, BATCH).forEach((c) => c.classList.remove("okc-hidden"));

      const stillHidden = allBlogCards.some(
        (c) => !c.classList.contains("hidden") && c.classList.contains("okc-hidden")
      );
      loadMoreBtn.classList.toggle("load-more-hidden", !stillHidden);
    });
  }

  // Initial
  buildDots();
  applyFilters();
})();
