<?php
/**
 * Generic fallback template for Pages without a dedicated page-{slug}.php.
 *
 * The child theme ships bespoke page-*.php templates for every marketing page,
 * but generic Pages (e.g. an embedded XPressUI workflow created via the
 * [xpressui id="..."] shortcode) have no specific template. Without this file
 * the WordPress template hierarchy falls through to the parent theme's
 * index.php, which produces an empty document — a blank 0-byte response.
 *
 * This renders the standard loop so the_content() expands shortcodes (the
 * XPressUI form shell + runtime), wrapped in the theme's Tailwind chrome.
 */

get_header(); ?>

<div class="font-sans text-gray-900 antialiased">

  <?php while ( have_posts() ) : the_post(); ?>

  <main class="bg-white py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">

      <?php if ( get_the_title() ) : ?>
      <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-gray-900 mb-8 leading-tight">
        <?php the_title(); ?>
      </h1>
      <?php endif; ?>

      <div class="prose prose-lg prose-blue max-w-none
                  prose-headings:font-extrabold prose-headings:tracking-tight prose-headings:text-gray-900
                  prose-p:text-gray-600 prose-p:leading-relaxed
                  prose-a:text-blue-600 prose-a:no-underline hover:prose-a:underline
                  prose-strong:text-gray-900
                  prose-li:text-gray-600">
        <?php the_content(); ?>
      </div>

    </div>
  </main>

  <?php endwhile; ?>

</div>

<?php get_footer(); ?>
