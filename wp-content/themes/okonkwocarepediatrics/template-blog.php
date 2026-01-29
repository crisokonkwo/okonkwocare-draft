<?php
/**
 * Template Name: Blog Page
 * Template Post Type: page
 * Description: Custom template for the blog page
 */

get_header();
$site = okc_site();

// Query all posts
$args = array(
    'post_type' => 'post',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC'
);
$all_posts = new WP_Query($args);

// Query featured posts (posts with 'featured' tag or custom field)
$featured_args = array(
    'post_type' => 'post',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'meta_query' => array(
        array(
            'key' => 'featured_post',
            'value' => '1',
            'compare' => '='
        )
    ),
    'orderby' => 'date',
    'order' => 'DESC'
);
$featured_query = new WP_Query($featured_args);
$featured_posts = array();
if ($featured_query->have_posts()) {
    while ($featured_query->have_posts()) {
        $featured_query->the_post();
        $featured_posts[] = get_post();
    }
    wp_reset_postdata();
}

// Get all categories
$categories = get_categories(array(
    'orderby' => 'name',
    'order' => 'ASC',
    'hide_empty' => true
));
?>

<!-- HERO -->
<main>
    <section class="bg-linear-to-b from-slate-50 to-white border-b border-slate-200">
        <div class="mx-auto max-w-7xl px-4 py-10 mb:py-10 pb-5 md:pb-5">
            <div class="max-w-3xl">
                <p class="text-xs font-semibold tracking-widest text-brand-700 uppercase">
                    Blog
                </p>

                <h1 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                    Okonkwo Care Blog - Your Resource for Insights & Guidance
                </h1>

                <p class="mt-4 text-base leading-7 text-slate-700">
                    Evidence-informed perspectives on pediatric health, ADHD, integrative care, and holistic pediatric healthcare.
                </p>
            </div>
        </div>
    </section>

    <!-- Filters -->
    <div id="sticky-filters" class="sticky top-30 z-30 bg-white border-b border-slate-200 transition-shadow duration-200">
        <div class="mx-auto max-w-3xl px-4 py-4">
            <div class="space-y-3">
                <div class="mt-">
                    <label class="sr-only" for="blog-search">Search posts</label>
                    <input
                        id="blog-search"
                        type="search"
                        placeholder="Search posts"
                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-900 shadow-sm outline-none placeholder:text-slate-400 focus:ring-2 focus:ring-brand-600"
                    />
                </div>

                <div>
                    <div class="flex flex-wrap gap-2 justify-center">
                        <button
                            type="button"
                            class="blog-chip shrink-0 rounded-full border border-slate-200 bg-white px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 focus-visible:ring-2 focus-visible:ring-brand-600"
                            data-category="All"
                            aria-pressed="true"
                        >
                            All
                        </button>
                        <?php foreach ($categories as $cat) : ?>
                            <button
                                type="button"
                                class="blog-chip shrink-0 rounded-full border border-slate-200 bg-white px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 focus-visible:ring-2 focus-visible:ring-brand-600"
                                data-category="<?php echo esc_attr($cat->name); ?>"
                                aria-pressed="false"
                            >
                                <?php echo esc_html($cat->name); ?>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="bg-white">
        <div class="mx-auto max-w-7xl px-4 py-10 md:py-10">
            
            <?php if (!empty($featured_posts)) : ?>
            <!-- Featured Posts -->
            <section>
                <div class="flex items-end justify-between gap-4">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-brand-700">
                            Featured
                        </p>
                        <h2 class="mt-1 text-lg font-semibold text-slate-900">
                            Highlights
                        </h2>
                    </div>

                    <div class="hidden sm:flex items-center gap-2">
                        <button
                            type="button"
                            class="featured-prev rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm text-slate-700 hover:bg-slate-50 focus-visible:ring-2 focus-visible:ring-brand-600"
                            aria-label="Previous featured post"
                        >
                            Prev
                        </button>
                        <button
                            type="button"
                            class="featured-next rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm text-slate-700 hover:bg-slate-50 focus-visible:ring-2 focus-visible:ring-brand-600"
                            aria-label="Next featured post"
                        >
                            Next
                        </button>
                    </div>
                </div>

                <div id="featured-empty" class="hidden mt-4 rounded-2xl border border-slate-200 bg-slate-50 p-6 text-sm text-slate-600">
                    No posts match your filters.
                </div>

                <div class="featured-track mt-4 flex gap-4 overflow-x-auto pb-3" aria-label="Featured posts">
                    <?php foreach ($featured_posts as $post) : 
                        setup_postdata($post);
                        $post_id = $post->ID;
                        $pub_date = get_the_date('M j, Y', $post_id);
                        $reading_time = okc_reading_time(get_the_content(null, false, $post_id));
                        $category = okc_get_post_category($post_id);
                        $author = okc_get_post_author($post_id);
                        $thumbnail = get_the_post_thumbnail_url($post_id, 'large');
                        $content_text = wp_strip_all_tags(get_the_content(null, false, $post_id));
                    ?>
                    <article 
                        class="featured-slide group shrink-0"
                        data-title="<?php echo esc_attr(strtolower(get_the_title($post_id))); ?>"
                        data-desc="<?php echo esc_attr(strtolower(get_the_excerpt($post_id))); ?>"
                        data-category="<?php echo esc_attr(strtolower($category)); ?>"
                        data-author="<?php echo esc_attr(strtolower($author)); ?>"
                        data-date="<?php echo esc_attr(strtolower($pub_date)); ?>"
                        data-body="<?php echo esc_attr(strtolower(preg_replace('/\s+/', ' ', $content_text))); ?>"
                    >
                        <a
                            href="<?php echo esc_url(get_permalink($post_id)); ?>"
                            class="block overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-soft transition hover:shadow-md no-underline!"
                        >
                            <div class="aspect-video bg-slate-100 overflow-hidden">
                                <?php if ($thumbnail) : ?>
                                    <img
                                        src="<?php echo esc_url($thumbnail); ?>"
                                        alt="<?php echo esc_attr(get_the_title($post_id)); ?>"
                                        loading="eager"
                                        class="h-full w-full object-cover transition duration-300 group-hover:scale-[1.02]"
                                    />
                                <?php endif; ?>
                            </div>

                            <div class="p-5">
                                <div class="flex items-center gap-2">
                                    <span class="inline-flex items-center rounded-full bg-brand-50 px-2 py-0.5 text-xs font-semibold text-brand-800 ring-1 ring-brand-700/10">
                                        Featured
                                    </span>
                                    <span class="text-xs uppercase tracking-wide text-slate-500">
                                        <?php echo esc_html($category); ?>
                                    </span>
                                </div>

                                <h3 class="mt-2 text-base font-semibold text-slate-900 group-hover:text-brand-800">
                                    <?php echo esc_html(get_the_title($post_id)); ?>
                                </h3>

                                <p class="mt-2 text-sm leading-6 text-slate-600 line-clamp-2">
                                    <?php echo esc_html(get_the_excerpt($post_id)); ?>
                                </p>

                                <div class="mt-4 flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between text-xs text-slate-500">
                                    <div class="flex items-center flex-wrap gap-x-1.5 gap-y-1">
                                        <span><?php echo esc_html($author); ?></span>
                                        <span class="text-slate-400" aria-hidden="true">•</span>
                                        <time datetime="<?php echo esc_attr(get_the_date('c', $post_id)); ?>"><?php echo esc_html($pub_date); ?></time>
                                        <span class="text-slate-400" aria-hidden="true">•</span> 
                                        <span><?php echo esc_html($reading_time); ?> min read</span>
                                    </div>
                                    
                                    <span class="text-brand-700 font-medium group-hover:underline inline-flex items-center gap-1">
                                        Read
                                        <svg viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                            <path d="M9 18l6-6-6-6" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </article>
                    <?php endforeach; wp_reset_postdata(); ?>
                </div>

                <div class="featured-dots mt-2 flex justify-center gap-2 sm:hidden" aria-label="Featured pagination">
                    <?php foreach ($featured_posts as $i => $post) : ?>
                        <button
                            type="button"
                            class="featured-dot h-2.5 w-2.5 rounded-full bg-slate-300"
                            aria-label="Go to featured item <?php echo $i + 1; ?>"
                            data-index="<?php echo $i; ?>"
                        ></button>
                    <?php endforeach; ?>
                </div>
            </section>
            <?php endif; ?>

            <!-- Regular Posts -->
            <div>
                <div class="mb-4 flex items-center justify-between">
                    <h2 class="mt-10 text-lg font-semibold text-slate-900">
                        Latest posts
                    </h2>
                </div>

                <div id="blog-empty" class="hidden mt-4 rounded-2xl border border-slate-200 bg-slate-50 p-6 text-sm text-slate-600">
                    No posts match your filters.
                </div>

                <div id="blog-list" class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <?php 
                    if ($all_posts->have_posts()) :
                        while ($all_posts->have_posts()) : $all_posts->the_post();
                            $post_id = get_the_ID();
                            $pub_date = get_the_date('M j, Y');
                            $upd_date = get_the_modified_date('M j, Y');
                            $reading_time = okc_reading_time(get_the_content());
                            $category = okc_get_post_category($post_id);
                            $author = okc_get_post_author($post_id);
                            $thumbnail = get_the_post_thumbnail_url($post_id, 'large');
                            $content_text = wp_strip_all_tags(get_the_content());
                            $has_update = $upd_date !== $pub_date;
                    ?>
                    <article 
                        class="group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-soft hover:shadow-md transition"
                        data-title="<?php echo esc_attr(strtolower(get_the_title())); ?>"
                        data-desc="<?php echo esc_attr(strtolower(get_the_excerpt())); ?>"
                        data-category="<?php echo esc_attr(strtolower($category)); ?>"
                        data-author="<?php echo esc_attr(strtolower($author)); ?>"
                        data-date="<?php echo esc_attr(strtolower($pub_date)); ?>"
                        data-body="<?php echo esc_attr(strtolower(preg_replace('/\s+/', ' ', $content_text))); ?>"
                    >
                        <a href="<?php the_permalink(); ?>" class="block no-underline! hover:no-underline!">
                            <div class="aspect-video bg-slate-100 overflow-hidden">
                                <?php if ($thumbnail) : ?>
                                    <img
                                        src="<?php echo esc_url($thumbnail); ?>"
                                        alt="<?php echo esc_attr(get_the_title()); ?>"
                                        loading="eager"
                                        class="h-full w-full object-cover transition duration-300 group-hover:scale-[1.02]"
                                    />
                                <?php endif; ?>
                            </div>

                            <div class="p-5">
                                <p class="text-xs uppercase tracking-wide text-brand-700">
                                    <?php echo esc_html($category); ?>
                                </p>

                                <h3 class="mt-2 text-base font-semibold text-slate-900 group-hover:text-brand-800">
                                    <?php the_title(); ?>
                                </h3>

                                <p class="mt-2 text-sm leading-6 text-slate-600 line-clamp-3">
                                    <?php echo esc_html(get_the_excerpt()); ?>
                                </p>

                                <div class="mt-4 flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between text-xs text-slate-500">
                                    <div class="flex items-center flex-wrap gap-x-1.5 gap-y-1">
                                        <span><?php echo esc_html($author); ?></span>
                                        <span class="text-slate-400" aria-hidden="true">•</span>
                                        <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html($pub_date); ?></time>
                                        <span class="text-slate-400" aria-hidden="true">•</span> 
                                        <span><?php echo esc_html($reading_time); ?> min read</span>

                                        <?php if ($has_update) : ?>
                                            <span class="text-slate-400" aria-hidden="true">•</span>
                                            <span class="text-slate-500">
                                                Updated <time datetime="<?php echo esc_attr(get_the_modified_date('c')); ?>"><?php echo esc_html($upd_date); ?></time>
                                            </span>
                                        <?php endif; ?>
                                    </div>

                                    <span class="inline-flex items-center gap-1 text-brand-700 font-medium group-hover:underline">
                                        Read
                                        <svg viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                            <path d="M9 18l6-6-6-6" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </article>
                    <?php 
                        endwhile;
                        wp_reset_postdata();
                    endif; 
                    ?>
                </div>

                <div class="mt-8 flex justify-center">
                    <button
                        id="load-more-btn"
                        type="button"
                        class="hidden rounded-full bg-brand-600 px-8 py-3 text-sm font-semibold text-white shadow-md hover:bg-brand-700 focus-visible:outline focus-visible:outline-offset-2 focus-visible:outline-brand-600 transition"
                    >
                        Load more posts
                    </button>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
    .blog-hide-scroll::-webkit-scrollbar { display: none; }
    .blog-hide-scroll { scrollbar-width: none; }
    .blog-chip[aria-pressed="true"] {
        border-color: var(--color-brand-300);
        background: var(--color-brand-100);
        color: var(--color-brand-800);
    }
    
    /* Add shadow when sticky bar is scrolled */
    #sticky-filters.is-stuck {
        box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
    }
    
    /* Hide posts beyond initial load */
    .load-more-hidden {
        display: none !important;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Sticky filter bar shadow on scroll
    const stickyFilters = document.getElementById("sticky-filters");
    
    if (stickyFilters) {
        const observer = new IntersectionObserver(
            ([e]) => {
                stickyFilters.classList.toggle("is-stuck", e.intersectionRatio < 1);
            },
            { threshold: [1], rootMargin: "-1px 0px 0px 0px" }
        );
        observer.observe(stickyFilters);
    }

    const input = document.getElementById("blog-search");
    const chips = Array.from(document.querySelectorAll(".blog-chip"));
    const list = document.getElementById("blog-list");
    const empty = document.getElementById("blog-empty");
    const featuredEmpty = document.getElementById("featured-empty");
    const regularItems = list ? Array.from(list.querySelectorAll("article")) : [];
    const featuredItems = Array.from(document.querySelectorAll(".featured-slide"));
    const items = [...featuredItems, ...regularItems];
    const loadMoreBtn = document.getElementById("load-more-btn");

    let activeCategory = (chips.find(c => c.getAttribute("aria-pressed") === "true"))?.dataset.category || "All";
    let debounceTimer;
    let itemsToShow = 6; // Initial number of posts to show
    const itemsPerLoad = 6; // Load 6 more at a time

    function updateLoadMoreButton() {
        if (!loadMoreBtn) return;
        
        // Count visible regular items that are not hidden by filters
        const visibleFiltered = regularItems.filter(el => !el.classList.contains("hidden")).length;
        const visibleDisplayed = regularItems.filter(el => 
            !el.classList.contains("hidden") && !el.classList.contains("load-more-hidden")
        ).length;
        
        // Show button if there are more filtered items to display
        if (visibleFiltered > visibleDisplayed) {
            loadMoreBtn.classList.remove("hidden");
        } else {
            loadMoreBtn.classList.add("hidden");
        }
    }

    function applyLoadMore() {
        let count = 0;
        regularItems.forEach((el) => {
            if (!el.classList.contains("hidden")) {
                if (count < itemsToShow) {
                    el.classList.remove("load-more-hidden");
                    count++;
                } else {
                    el.classList.add("load-more-hidden");
                }
            }
        });
        updateLoadMoreButton();
    }

    function applyFilters() {
        const q = (input?.value || "").trim().toLowerCase();

        let visibleCount = 0;
        let visibleRegularCount = 0;

        for (const el of items) {
            const title = el.dataset.title || "";
            const desc = el.dataset.desc || "";
            const cat = el.dataset.category || "uncategorized";
            const author = el.dataset.author || "";
            const date = el.dataset.date || "";
            const body = el.dataset.body || "";

            const matchesText = !q || title.includes(q) || desc.includes(q) || cat.includes(q) || author.includes(q) || date.includes(q) || body.includes(q);
            const matchesCat = activeCategory === "All" || cat === activeCategory.toLowerCase();

            const show = matchesText && matchesCat;
            el.classList.toggle("hidden", !show);
            if (show) {
                visibleCount++;
                if (regularItems.includes(el)) {
                    visibleRegularCount++;
                }
            }
        }

        // Show empty message only when regular posts are empty
        empty?.classList.toggle("hidden", visibleRegularCount !== 0);
        
        // Handle featured section visibility
        const featuredSection = document.querySelector("section:has(.featured-track)");
        const visibleFeatured = featuredItems.filter(el => !el.classList.contains("hidden")).length;
        const featuredTrack = document.querySelector(".featured-track");
        
        if (featuredSection) {
            // Show featured section if there are any featured posts at all
            featuredSection.classList.toggle("hidden", featuredItems.length === 0);
            
            // Show/hide the track and empty state based on filtered results
            featuredTrack?.classList.toggle("hidden", visibleFeatured === 0);
            featuredEmpty?.classList.toggle("hidden", visibleFeatured !== 0 || featuredItems.length === 0);
        }
        
        // Apply load more after filtering
        applyLoadMore();
    }

    chips.forEach((chip) => {
        chip.addEventListener("click", () => {
            const next = chip.dataset.category || "All";
            activeCategory = next;

            chips.forEach((c) => c.setAttribute("aria-pressed", c === chip ? "true" : "false"));
            itemsToShow = itemsPerLoad; // Reset to initial count when category changes
            applyFilters();
        });
    });

    // Debounced search input
    input?.addEventListener("input", () => {
        clearTimeout(debounceTimer);
        debounceTimer = window.setTimeout(() => {
            itemsToShow = itemsPerLoad; // Reset to initial count when searching
            applyFilters();
        }, 300); // 300ms delay
    });

    // Load more button
    loadMoreBtn?.addEventListener("click", () => {
        itemsToShow += itemsPerLoad;
        applyLoadMore();
    });

    // Initial
    applyFilters();

    // Featured carousel logic
    const track = document.querySelector(".featured-track");
    const slides = track ? Array.from(track.querySelectorAll(".featured-slide")) : [];
    const dots = Array.from(document.querySelectorAll(".featured-dot"));
    const prevBtn = document.querySelector(".featured-prev");
    const nextBtn = document.querySelector(".featured-next");

    function setActiveDot(i) {
        dots.forEach((d, idx) => d.classList.toggle("is-active", idx === i));
    }

    function scrollToIndex(i) {
        const el = slides[i];
        if (!el || !track) return;
        el.scrollIntoView({ behavior: "smooth", inline: "start", block: "nearest" });
    }

    function nearestByBoundingBox() {
        if (!track || slides.length === 0) return 0;
        const trackRect = track.getBoundingClientRect();
        const trackLeft = trackRect.left;

        let bestIdx = 0;
        let bestDist = Infinity;

        slides.forEach((el, idx) => {
            const r = el.getBoundingClientRect();
            const dist = Math.abs(r.left - trackLeft);
            if (dist < bestDist) {
                bestDist = dist;
                bestIdx = idx;
            }
        });

        return bestIdx;
    }

    let raf = 0;
    function onScroll() {
        cancelAnimationFrame(raf);
        raf = requestAnimationFrame(() => {
            const i = nearestByBoundingBox();
            setActiveDot(i);
        });
    }

    track?.addEventListener("scroll", onScroll, { passive: true });
    setActiveDot(0);

    prevBtn?.addEventListener("click", () => {
        const i = nearestByBoundingBox();
        scrollToIndex(Math.max(0, i - 1));
    });

    nextBtn?.addEventListener("click", () => {
        const i = nearestByBoundingBox();
        scrollToIndex(Math.min(slides.length - 1, i + 1));
    });

    dots.forEach((dot) => {
        dot.addEventListener("click", () => {
            const i = Number(dot.getAttribute("data-index") || "0");
            scrollToIndex(i);
        });
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
