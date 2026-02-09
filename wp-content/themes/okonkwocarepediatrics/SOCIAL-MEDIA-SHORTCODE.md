# Social Media Gallery Shortcode

## Usage

Add this shortcode to any page in Elementor (using a Shortcode widget):

```
[okc_social_gallery]
```

## Parameters

- `count` - Number of posts to display (default: 5)
- `category` - Category slug to pull posts from (default: "social-media")

### Examples

**Show 5 posts (default):**
```
[okc_social_gallery]
```

**Show 10 posts:**
```
[okc_social_gallery count="10"]
```

**Pull from a different category:**
```
[okc_social_gallery category="instagram"]
```

## Setup Instructions

### Option 1: Use WordPress Posts (Recommended)

1. **Create a category** called "Social Media" in WordPress
   - Go to Posts → Categories
   - Add name: "Social Media"
   - Click "Add New Category"

2. **Create posts** for each social media image:
   - Go to Posts → Add New
   - **Title:** Brief description (e.g., "March 2026 Wellness Tips")
   - **Featured Image:** Upload your social media image
   - **Category:** Check "Social Media"
   
3. **Add Instagram/Facebook link (Optional):**
   - Scroll down to the bottom of the post editor
   - Look for "Custom Fields" section
   - If you don't see it, click the **⋮** menu (top right) → **Options** → Enable "Custom Fields"
   - Click **"Add New Custom Field"** or select from dropdown if it exists
   - **Name:** `social_media_link`
   - **Value:** Paste your Instagram/Facebook post URL (e.g., `https://instagram.com/p/ABC123`)
   - Click **"Add Custom Field"** or **"Update"**

4. **Publish the post**

5. **Add the shortcode** to your page in Elementor

### Option 2: Static HTML Alternative

If you prefer not to use WordPress posts, you can use this HTML in an HTML widget:

```html
<section class="social-media-section py-16">
  <div class="container mx-auto px-4">
    <h2 class="text-4xl font-bold text-center text-slate-900 mb-3">Social Media Posts</h2>
    <p class="text-center text-slate-600 mb-12">This is a gallery to showcase images from your recent social posts</p>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
      <!-- Post 1 -->
      <a href="YOUR_INSTAGRAM_LINK" target="_blank" rel="noopener" 
         class="social-post-card block rounded-lg overflow-hidden bg-slate-100 hover:opacity-90 transition-opacity aspect-square">
        <img src="YOUR_IMAGE_URL" alt="Social post" class="w-full h-full object-cover">
      </a>
      
      <!-- Post 2 -->
      <a href="YOUR_INSTAGRAM_LINK" target="_blank" rel="noopener" 
         class="social-post-card block rounded-lg overflow-hidden bg-slate-100 hover:opacity-90 transition-opacity aspect-square">
        <img src="YOUR_IMAGE_URL" alt="Social post" class="w-full h-full object-cover">
      </a>
      
      <!-- Add more posts as needed -->
    </div>
  </div>
</section>
```

## How It Works

1. The shortcode queries WordPress posts from the "social-media" category
2. Displays their featured images in a responsive grid (1-5 columns depending on screen size)
3. Links to the post permalink by default
4. If a custom field `social_media_link` exists, it links to that URL instead (opens in new tab)
5. Shows placeholder icons if no posts are found

## Styling

The gallery uses Tailwind CSS classes and is fully responsive:
- Mobile: 1 column
- Tablet: 2-3 columns
- Desktop: 5 columns

All images are square (aspect-square) with object-cover for consistent sizing.
