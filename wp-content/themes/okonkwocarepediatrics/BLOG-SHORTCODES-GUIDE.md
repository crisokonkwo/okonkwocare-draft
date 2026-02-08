# Blog Shortcodes - Static HTML for Elementor

This guide shows you how to use the blog shortcodes in Elementor to create dynamic blog layouts with static HTML.

## Available Shortcodes

### 1. Featured Posts Carousel
**Shortcode:** `[okc_featured_posts]`

**Parameters:**
- `limit` (optional) - Number of featured posts to show. Default: -1 (all)

**Usage in Elementor:**
1. Add a new **Shortcode** widget
2. Paste: `[okc_featured_posts]`
3. Or with limit: `[okc_featured_posts limit="5"]`

**What it displays:**
- Horizontal scrolling carousel of featured posts
- Featured posts are determined by the `featured_post` custom field set to `1`
- Includes navigation buttons (Prev/Next) on desktop
- Includes dot indicators on mobile
- Automatically filters with blog search/category filters

---

### 2. Blog Post Grid
**Shortcode:** `[okc_blog_grid]`

**Parameters:**
- `limit` (optional) - Number of posts to show. Default: -1 (all)
- `category` (optional) - Filter by category slug
- `show_filters` (optional) - Show search and category filters. Default: "true"
- `columns` (optional) - Number of columns in grid. Default: "3"

**Usage in Elementor:**
1. Add a new **Shortcode** widget
2. Paste one of these:
   - All posts with filters: `[okc_blog_grid]`
   - Limit to 9 posts: `[okc_blog_grid limit="9"]`
   - Specific category: `[okc_blog_grid category="pediatric-care"]`
   - No filters, 2 columns: `[okc_blog_grid show_filters="false" columns="2"]`

**What it displays:**
- Grid of blog post cards
- Optional search bar and category filter chips
- Load more button (shows 6 posts initially, loads 6 more at a time)
- Responsive grid (1 column mobile, 2 columns tablet, 3+ columns desktop)

---

### 3. Single Post Meta
**Shortcode:** `[okc_post_meta]`

**Parameters:** None

**Usage in Elementor:**
1. Add a new **Shortcode** widget on your single post template
2. Paste: `[okc_post_meta]`

**What it displays:**
- Post category badge
- Post title (H1)
- Post excerpt
- Author name and publication date
- Social share buttons (Facebook, X/Twitter, LinkedIn)

**Note:** Only works on single post pages. Returns empty on other pages.

---

### 4. Related Posts
**Shortcode:** `[okc_related_posts]`

**Parameters:**
- `limit` (optional) - Number of related posts to show. Default: 3

**Usage in Elementor:**
1. Add a new **Shortcode** widget on your single post template
2. Paste: `[okc_related_posts]`
3. Or with custom limit: `[okc_related_posts limit="4"]`

**What it displays:**
- Grid of related posts from the same category
- Excludes the current post
- Shows random selection from the same category
- Each card shows: category, title, and excerpt

**Note:** Only works on single post pages. Returns empty on other pages.

---

### 5. Dynamic Category Filter Chips
**Shortcode:** `[okc_blog_category_chips]`

**Parameters:**
- `show_all` (optional) - Show "All" button. Default: "1" (show)
- `hide_empty` (optional) - Hide categories with no posts. Default: "1" (hide empty)

**Usage in Elementor:**
1. Add a new **Shortcode** widget
2. Paste one of these:
   - With "All" button: `[okc_blog_category_chips]`
   - Without "All" button: `[okc_blog_category_chips show_all="0"]`
   - Show all categories (even empty): `[okc_blog_category_chips hide_empty="0"]`

**What it displays:**
- Horizontal row of category filter chips
- Dynamically generated from WordPress categories
- "All" button to clear filters (optional)
- Works with the blog grid and featured posts filtering
- Categories use slug for data-category attribute (lowercase)

**Use Case:**
Perfect for creating custom blog layouts where you want to separate the category filters from the search bar or position them independently in your Elementor design. Use with `[okc_blog_grid show_filters="false"]` to avoid duplicate filters.

---

## Complete Example Layouts

### Blog Archive Page (Elementor)

Create a page template in Elementor with these sections:

#### Section 1: Hero Header
Use a **Heading** widget and **Text Editor** widget:
```html
<!-- Heading widget -->
Okonkwo Care Blog - Your Resource for Insights & Guidance

<!-- Text Editor widget -->
Evidence-informed perspectives on pediatric health, ADHD, integrative care, and holistic pediatric healthcare.
```

#### Section 2: Featured Posts
Add a **Shortcode** widget:
```
[okc_featured_posts]
```

#### Section 3: All Posts
Add a **Shortcode** widget:
```
[okc_blog_grid]
```

---

### Blog Archive with Custom Category Layout (Elementor)

For more design flexibility, use separate category chips:

#### Section 1: Hero Header
Add **Heading** and **Text Editor** widgets

#### Section 2: Category Filters
Add a **Shortcode** widget:
```
[okc_blog_category_chips]
```

#### Section 3: Featured Posts
Add a **Shortcode** widget:
```
[okc_featured_posts]
```

#### Section 4: All Posts
Add a **Shortcode** widget (note: filters disabled to avoid duplicates):
```
[okc_blog_grid show_filters="false"]
```

This layout gives you full control over the spacing and positioning of category filters.

---

### Single Post Template (Elementor)

Create a single post template in **Theme Builder** with these sections:

#### Section 1: Post Header
Add a **Shortcode** widget:
```
[okc_post_meta]
```

#### Section 2: Post Content
Add a **Post Content** widget (native Elementor widget)
This will display the full post content with proper formatting.

**Optional styling:** Add this CSS to your Elementor section:
```css
.prose a {
    overflow-wrap: break-word;
    word-wrap: break-word;
    word-break: break-word;
    hyphens: auto;
}
```

#### Section 3: Related Posts
Add a **Shortcode** widget:
```
[okc_related_posts]
```

---

## Static HTML Alternative

If you prefer to paste HTML directly instead of using shortcodes, here are the static versions:

### Blog Grid Card (Single Post Card)
```html
<article class="group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-soft hover:shadow-md transition">
    <a href="#" class="block no-underline!">
        <div class="aspect-video bg-slate-100 overflow-hidden">
            <img
                src="https://via.placeholder.com/800x450"
                alt="Post title"
                loading="lazy"
                class="h-full w-full object-cover transition duration-300 group-hover:scale-[1.02]"
            />
        </div>

        <div class="p-5">
            <p class="text-xs uppercase tracking-wide text-brand-700">
                Category Name
            </p>

            <h3 class="mt-2 text-base font-semibold text-slate-900 group-hover:text-brand-800">
                Your Post Title Here
            </h3>

            <p class="mt-2 text-sm leading-6 text-slate-600 line-clamp-3">
                Your post excerpt goes here. This is a brief description of what the post is about.
            </p>

            <div class="mt-4 flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between text-xs text-slate-500">
                <div class="flex items-center flex-wrap gap-x-1.5 gap-y-1">
                    <span>Okonkwo Care Pediatrics</span>
                    <span class="text-slate-400" aria-hidden="true">•</span>
                    <time>Feb 8, 2026</time>
                    <span class="text-slate-400" aria-hidden="true">•</span> 
                    <span>5 min read</span>
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
```

**To make it dynamic:** Replace the static HTML with the `[okc_blog_grid]` shortcode.

---

### Featured Post Card
```html
<article class="featured-slide group shrink-0">
    <a href="#" class="block overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-soft transition hover:shadow-md no-underline!">
        <div class="aspect-video bg-slate-100 overflow-hidden">
            <img
                src="https://via.placeholder.com/800x450"
                alt="Featured post title"
                loading="eager"
                class="h-full w-full object-cover transition duration-300 group-hover:scale-[1.02]"
            />
        </div>

        <div class="p-5">
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center rounded-full bg-brand-50 px-2 py-0.5 text-xs font-semibold text-brand-800 ring-1 ring-brand-700/10">
                    Featured
                </span>
                <span class="text-xs uppercase tracking-wide text-slate-500">
                    Category Name
                </span>
            </div>

            <h3 class="mt-2 text-base font-semibold text-slate-900 group-hover:text-brand-800">
                Your Featured Post Title
            </h3>

            <p class="mt-2 text-sm leading-6 text-slate-600 line-clamp-2">
                Brief excerpt of the featured post content.
            </p>

            <div class="mt-4 flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between text-xs text-slate-500">
                <div class="flex items-center flex-wrap gap-x-1.5 gap-y-1">
                    <span>Okonkwo Care Pediatrics</span>
                    <span class="text-slate-400" aria-hidden="true">•</span>
                    <time>Feb 8, 2026</time>
                    <span class="text-slate-400" aria-hidden="true">•</span> 
                    <span>5 min read</span>
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
```

**To make it dynamic:** Replace with the `[okc_featured_posts]` shortcode.

---

## How Featured Posts Work

To mark a post as featured:
1. Edit the post in WordPress
2. Scroll to **Custom Fields** (if not visible, enable it in Screen Options)
3. Add a new custom field:
   - **Name:** `featured_post`
   - **Value:** `1`
4. Save/Update the post

The post will now appear in the featured carousel.

---

## Styling Notes

All shortcodes use the same Tailwind CSS classes as your existing theme. The CSS custom properties used are:

- `--color-brand-50` through `--color-brand-800` (brand colors)
- `--color-slate-*` (neutral colors)

Make sure your theme's CSS file includes these variables or the Tailwind utility classes.

---

## Filtering & Search

The blog grid includes built-in filtering:
- **Search bar** - Searches title, excerpt, category, author, date, and body text
- **Category chips** - Filter by category (or "All")
- **Load more** - Shows 6 posts initially, loads 6 more on click
- Filters work together (search + category)
- Filters also apply to featured posts on the same page

To disable filters, use: `[okc_blog_grid show_filters="false"]`

---

## Technical Details

### Dependencies
The shortcodes rely on these helper functions (already in your theme):
- `okc_reading_time()` - Calculate reading time from content
- `okc_get_post_category()` - Get primary category name
- `okc_get_post_author()` - Get author name (defaults to "Okonkwo Care Pediatrics")

If these functions don't exist, the shortcodes use fallback values.

### Performance
- All queries respect WordPress caching
- Images use lazy loading (except featured posts use eager loading)
- JavaScript is inline and self-contained
- No external dependencies (pure vanilla JS)

### Browser Support
- Modern browsers (Chrome, Firefox, Safari, Edge)
- Uses Intersection Observer API for sticky filter detection
- Uses scroll-behavior: smooth (graceful degradation)
- CSS custom properties (IE11 not supported)

---

## Troubleshooting

**Shortcode displays as text instead of content:**
- Make sure the shortcodes file is loaded in functions.php
- Check that the file path is correct: `/inc/blog-shortcodes.php`
- Clear WordPress and browser cache

**Featured posts not showing:**
- Verify posts have the `featured_post` custom field set to `1`
- Check that posts are published (not draft)
- Try a different limit value: `[okc_featured_posts limit="10"]`

**Filters not working:**
- JavaScript might be blocked or conflicting
- Check browser console for errors
- Ensure the page has `id="blog-search"` and `.blog-chip` elements

**Styling looks broken:**
- Verify Tailwind CSS or equivalent is loaded
- Check that CSS custom properties are defined
- Inspect elements to ensure classes are present

---

## Next Steps

1. **Upload this document** to your WordPress Media Library for reference
2. **Create an Elementor template** for blog archive pages
3. **Create an Elementor template** for single posts in Theme Builder
4. **Test the shortcodes** on a sample page first
5. **Mark posts as featured** to populate the carousel
6. **Customize styling** in Elementor's custom CSS if needed

---

## Support

For questions or issues with these shortcodes, check:
- WordPress admin > Custom Fields (to set featured posts)
- Elementor > Theme Builder (for single post templates)
- Browser developer console (for JavaScript errors)
- `wp-content/themes/okonkwocarepediatrics/inc/blog-shortcodes.php` (source code)
