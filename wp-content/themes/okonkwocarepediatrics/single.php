<?php
/**
 * Template for displaying single blog posts
 */

get_header();
$site = okc_site();

if (have_posts()) :
    while (have_posts()) : the_post();
        $post_id = get_the_ID();
        $category = okc_get_post_category($post_id);
        $author = okc_get_post_author($post_id);
        $pub_date = get_the_date('F j, Y');
        $pub_date_iso = get_the_date('c');
        
        // Get post URL for sharing
        $post_url = get_permalink();
        $encoded_url = rawurlencode($post_url);
        $encoded_title = rawurlencode(get_the_title());
        
        // Share URLs
        $share_facebook = "https://www.facebook.com/sharer/sharer.php?u=" . $encoded_url;
        $share_x = "https://twitter.com/intent/tweet?url=" . $encoded_url . "&text=" . $encoded_title;
        $share_linkedin = "https://www.linkedin.com/sharing/share-offsite/?url=" . $encoded_url;
        
        // Get related posts (same category, excluding current post)
        $related_args = array(
            'post_type' => 'post',
            'posts_per_page' => 3,
            'post__not_in' => array($post_id),
            'post_status' => 'publish',
            'orderby' => 'rand',
            'category_name' => get_the_category($post_id)[0]->slug ?? ''
        );
        $related_query = new WP_Query($related_args);
?>

<!-- Schema Markup -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BlogPosting",
  "headline": "<?php echo esc_js(get_the_title()); ?>",
  "description": "<?php echo esc_js(get_the_excerpt()); ?>",
  "image": "<?php echo esc_url(get_the_post_thumbnail_url($post_id, 'large')); ?>",
  "datePublished": "<?php echo esc_js($pub_date_iso); ?>",
  "dateModified": "<?php echo esc_js(get_the_modified_date('c')); ?>",
  "author": {
    "@type": "Organization",
    "name": "<?php echo esc_js($author); ?>"
  },
  "publisher": {
    "@type": "Organization",
    "name": "<?php echo esc_js($site['name']); ?>",
    "logo": {
      "@type": "ImageObject",
      "url": "<?php echo esc_url($site['logo']); ?>"
    }
  },
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "<?php echo esc_url($post_url); ?>"
  }
}
</script>

<article class="mx-auto max-w-3xl px-4 py-12">
    <header class="border-b border-slate-200 pb-6">
        <p class="text-xs uppercase tracking-wide text-brand-700">
            <?php echo esc_html($category); ?>
        </p>
        <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">
            <?php the_title(); ?>
        </h1>
        <p class="mt-3 text-sm leading-6 text-slate-600">
            <?php echo esc_html(get_the_excerpt()); ?>
        </p>

        <div class="mt-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <!-- Author + date -->
            <div class="text-xs text-slate-500">
                <?php echo esc_html($author); ?>
                <span class="mx-1 text-slate-400" aria-hidden="true">•</span>
                <time datetime="<?php echo esc_attr($pub_date_iso); ?>"><?php echo esc_html($pub_date); ?></time>
            </div>

            <!-- Share buttons -->
            <div class="flex items-center gap-3">
                <span class="text-xs text-slate-500">Share</span>

                <a
                    href="<?php echo esc_url($share_facebook); ?>"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="Share on Facebook"
                    class="rounded-full border border-slate-200 bg-white p-2 text-slate-600 hover:text-brand-700 hover:border-brand-200 focus-visible:ring-2 focus-visible:ring-brand-600"
                >
                    <!-- Facebook -->
                    <svg viewBox="0 0 24 24" class="h-4 w-4" fill="currentColor">
                        <path d="M22.675 0h-21.35C.597 0 0 .597 0 1.326v21.348C0 23.403.597 24 1.326 24h11.495v-9.294H9.692V11.01h3.129V8.309c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24h-1.918c-1.504 0-1.796.715-1.796 1.763v2.313h3.587l-.467 3.696h-3.12V24h6.116C23.403 24 24 23.403 24 22.674V1.326C24 .597 23.403 0 22.675 0z"/>
                    </svg>
                </a>

                <a
                    href="<?php echo esc_url($share_x); ?>"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="Share on X"
                    class="rounded-full border border-slate-200 bg-white p-2 text-slate-600 hover:text-brand-700 hover:border-brand-200 focus-visible:ring-2 focus-visible:ring-brand-600"
                >
                    <!-- X -->
                    <svg viewBox="0 0 24 24" class="h-4 w-4" fill="currentColor">
                        <path d="M18.244 2H21.6l-7.344 8.39L23 22h-6.828l-5.344-6.68L4.68 22H1.32l7.856-8.98L1 2h7l4.828 6.06L18.244 2z"/>
                    </svg>
                </a>

                <a
                    href="<?php echo esc_url($share_linkedin); ?>"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="Share on LinkedIn"
                    class="rounded-full border border-slate-200 bg-white p-2 text-slate-600 hover:text-brand-700 hover:border-brand-200 focus-visible:ring-2 focus-visible:ring-brand-600"
                >
                    <!-- LinkedIn -->
                    <svg viewBox="0 0 24 24" class="h-4 w-4" fill="currentColor">
                        <path d="M22.23 0H1.77C.79 0 0 .774 0 1.727v20.545C0 23.227.79 24 1.77 24h20.46c.98 0 1.77-.773 1.77-1.728V1.727C24 .774 23.21 0 22.23 0zM7.09 20.452H3.56V9h3.53v11.452zM5.325 7.433c-1.13 0-2.047-.924-2.047-2.06 0-1.137.917-2.06 2.047-2.06s2.047.923 2.047 2.06c0 1.136-.917 2.06-2.047 2.06zM20.452 20.452h-3.53v-5.569c0-1.328-.026-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.94v5.666h-3.53V9h3.389v1.561h.047c.472-.9 1.624-1.852 3.341-1.852 3.571 0 4.23 2.351 4.23 5.406v6.337z"/>
                    </svg>
                </a>
            </div>
        </div>
    </header>

    <!-- Post content -->
    <div class="prose prose-slate mt-8 max-w-none prose-headings:scroll-mt-24 prose-a:text-brand-700">
        <?php the_content(); ?>
    </div>

    <style>
        /* Prevent reference links and long URLs from overflowing */
        .prose a {
            overflow-wrap: break-word;
            word-wrap: break-word;
            word-break: break-word;
            hyphens: auto;
        }
        
        /* Ensure all prose content respects container bounds */
        .prose {
            overflow-wrap: break-word;
            word-wrap: break-word;
        }
        
        /* Specifically handle ordered/unordered lists with long links */
        .prose ol,
        .prose ul {
            overflow-wrap: break-word;
            word-wrap: break-word;
        }
        
        .prose li {
            overflow-wrap: break-word;
            word-wrap: break-word;
        }
    </style>

    <?php if ($related_query->have_posts()) : ?>
    <!-- Related posts -->
    <section class="mt-12 border-t border-slate-200 pt-8">
        <h2 class="text-base font-semibold text-slate-900">Related posts</h2>
        <div class="mt-4 grid gap-4 sm:grid-cols-3">
            <?php while ($related_query->have_posts()) : $related_query->the_post(); 
                $related_category = okc_get_post_category(get_the_ID());
            ?>
            <a
                href="<?php the_permalink(); ?>"
                class="rounded-2xl border border-slate-200 bg-white p-4 no-underline shadow-soft hover:shadow-md transition"
            >
                <p class="text-xs uppercase tracking-wide text-brand-700">
                    <?php echo esc_html($related_category); ?>
                </p>
                <p class="mt-2 text-sm font-semibold text-slate-900">
                    <?php the_title(); ?>
                </p>
                <p class="mt-2 text-xs text-slate-600 line-clamp-3">
                    <?php echo esc_html(get_the_excerpt()); ?>
                </p>
            </a>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </section>
    <?php endif; ?>
</article>

<?php
    endwhile;
endif;

get_footer();
?>
