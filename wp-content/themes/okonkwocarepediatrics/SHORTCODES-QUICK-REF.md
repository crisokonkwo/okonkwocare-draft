# Quick Reference: Blog Shortcodes for Elementor

## 📋 Copy & Paste These Into Elementor Shortcode Widgets

### Blog Archive Page
```
[okc_featured_posts]

[okc_blog_grid]
```

### Blog Archive (Limited Posts)
```
[okc_featured_posts limit="5"]

[okc_blog_grid limit="9"]
```

### Blog Archive (No Filters)
```
[okc_blog_grid show_filters="false"]
```

### Blog Archive (Specific Category)
```
[okc_blog_grid category="pediatric-care"]
```

### Blog Archive (2 Column Grid)
```
[okc_blog_grid columns="2"]
```

### Blog Archive (Custom Layout with Separate Category Chips)
```
[okc_blog_category_chips]

[okc_blog_grid show_filters="false"]
```

### Category Chips Only (No "All" Button)
```
[okc_blog_category_chips show_all="0"]
```

### Single Post Template
```
[okc_post_meta]

<!-- Add Elementor's "Post Content" widget here -->

[okc_related_posts]
```

### Single Post (More Related Posts)
```
[okc_post_meta]

<!-- Add Elementor's "Post Content" widget here -->

[okc_related_posts limit="6"]
```

---

## 🎯 Where to Use Each Shortcode

| Shortcode | Where to Use | Purpose |
|-----------|-------------|---------|
| `[okc_featured_posts]` | Blog archive page | Show featured posts carousel |
| `[okc_blog_grid]` | Blog archive page | Show all posts in a grid |
| `[okc_blog_category_chips]` | Blog archive page | Show dynamic category filter chips |
| `[okc_post_meta]` | Single post template | Show post header & share buttons |
| `[okc_related_posts]` | Single post template | Show related posts from same category |

---

## ⚙️ Parameters Reference

### okc_featured_posts
- `limit` - Number of featured posts (default: all)

### okc_blog_grid
- `limit` - Number of posts (default: all)
- `category` - Category slug to filter (default: none)
- `show_filters` - Show search/filters (default: "true")
- `columns` - Grid columns (default: "3")

### okc_blog_category_chips
- `show_all` - Show "All" button (default: "1")
- `hide_empty` - Hide empty categories (default: "1")

### okc_post_meta
- No parameters

### okc_related_posts
- `limit` - Number of related posts (default: 3)

---

## 🎨 Page Layout Examples

### Simple Blog Page
1. Add Heading: "Blog"
2. Add Shortcode: `[okc_blog_grid]`

### Full-Featured Blog Page
1. Add Heading: "Blog"
2. Add Text: "Your blog description"
3. Add Shortcode: `[okc_featured_posts]`
4. Add Heading: "All Posts"
5. Add Shortcode: `[okc_blog_grid]`

### Category-Specific Page
1. Add Heading: "Pediatric Care Articles"
2. Add Shortcode: `[okc_blog_grid category="pediatric-care" show_filters="false"]`

### Custom Layout with Separate Category Chips
1. Add Heading: "Blog"
2. Add Text: "Your blog description"
3. Add Shortcode: `[okc_blog_category_chips]`
4. Add Shortcode: `[okc_featured_posts]`
5. Add Heading: "All Posts"
6. Add Shortcode: `[okc_blog_grid show_filters="false"]`

### Single Post Layout (Theme Builder)
1. Add Shortcode: `[okc_post_meta]`
2. Add Widget: **Post Content** (Elementor widget)
3. Add Shortcode: `[okc_related_posts]`

---

## ✨ How to Mark Posts as Featured

To make a post appear in `[okc_featured_posts]`:

1. Edit the post in WordPress admin
2. Scroll to **Custom Fields** section
   - If not visible: Click **Screen Options** (top right) → Enable **Custom Fields**
3. Click **Add New Custom Field**
4. Enter:
   - **Name:** `featured_post`
   - **Value:** `1`
5. Click **Add Custom Field**
6. Update/Publish the post

The post will now show in the featured carousel!

---

## 🔧 Common Combinations

### Blog Homepage
```
[okc_featured_posts limit="3"]
[okc_blog_grid limit="6" show_filters="false"]
```

### Archive with Search Only
```
[okc_blog_grid]
```

### Archive with Categories Only (No Search)
Add this to Elementor Custom CSS:
```css
#blog-search { display: none; }
```
Then use: `[okc_blog_grid]`

### Minimal Single Post
```
[okc_post_meta]
```
(Just header with share buttons, use Elementor's Post Content widget below)

---

## 🎬 Getting Started in 3 Steps

1. **Create a new page** in WordPress
2. **Edit with Elementor**
3. **Add a Shortcode widget** and paste one of the codes above

That's it! The shortcodes will automatically pull your blog posts.

---

## 📱 Responsive Behavior

All shortcodes are fully responsive:
- **Featured carousel**: Scrollable on mobile, navigation buttons on desktop
- **Blog grid**: 1 column mobile → 2 columns tablet → 3 columns desktop
- **Filters**: Stack vertically on mobile
- **Post cards**: Optimize spacing for each screen size

---

## Need Help?

See the full guide: `BLOG-SHORTCODES-GUIDE.md`
