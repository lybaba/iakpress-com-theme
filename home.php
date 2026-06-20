<?php
/**
 * The template for displaying the blog posts index (Posts page).
 */

get_header(); ?>

<div class="font-sans text-gray-900 antialiased">

  <?php $iakpress_blog_fr = function_exists( 'iakpress_is_french_request' ) && iakpress_is_french_request(); ?>

  <!-- Header -->
  <section class="bg-white py-16 px-4 sm:px-6 lg:px-8 border-b border-gray-100">
    <div class="max-w-3xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3"><?php echo $iakpress_blog_fr ? 'Le Blog' : 'From the Blog'; ?></p>
      <h1 class="text-4xl font-extrabold tracking-tight text-gray-900"><?php echo $iakpress_blog_fr ? 'Actualités' : 'Articles'; ?></h1>
      <p class="text-gray-500 mt-3"><?php echo $iakpress_blog_fr ? 'Le hors-flux, la collecte guidée et le positionnement produit, pour les cabinets d’expertise comptable.' : 'Insights on IntakeFlow, agency workflow, client delivery, and decoupled development.'; ?></p>
    </div>
  </section>

  <!-- Posts list -->
  <section class="bg-white py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto space-y-6">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <a href="<?php the_permalink(); ?>"
           class="group block bg-gray-50 hover:bg-blue-50 border border-gray-100 hover:border-blue-200 rounded-2xl p-8 transition-all duration-200">

          <?php
          $eyebrow_cat = function_exists( 'iakpress_post_display_category' ) ? iakpress_post_display_category() : null;
          if ( $eyebrow_cat ) : ?>
            <p class="text-xs font-bold tracking-widest text-blue-600 uppercase mb-2">
              <?php echo esc_html( $eyebrow_cat->name ); ?>
            </p>
          <?php endif; ?>

          <h2 class="text-xl font-extrabold text-gray-900 group-hover:text-blue-700 mb-2 transition-colors leading-snug">
            <?php the_title(); ?>
          </h2>

          <p class="text-gray-500 text-sm leading-relaxed mb-4">
            <?php echo esc_html( wp_trim_words( get_the_excerpt(), 25, '…' ) ); ?>
          </p>

          <div class="flex items-center justify-between">
            <time class="text-xs text-gray-400" datetime="<?php echo get_the_date( 'c' ); ?>">
              <?php echo get_the_date(); ?>
              &middot;
              <?php echo ceil( str_word_count( get_the_content() ) / 200 ); ?> <?php echo $iakpress_blog_fr ? 'min de lecture' : 'min read'; ?>
            </time>
            <span class="text-sm font-bold text-blue-600 group-hover:underline">
              <?php echo $iakpress_blog_fr ? 'Lire' : 'Read'; ?> <?php echo xpressui_arrow_svg(); ?>
            </span>
          </div>
        </a>

      <?php endwhile; ?>

      <!-- Pagination -->
      <?php if ( get_next_posts_link() || get_previous_posts_link() ) : ?>
        <div class="flex justify-between pt-6">
          <div><?php next_posts_link( xpressui_arrow_left_svg() . ' Older articles' ); ?></div>
          <div><?php previous_posts_link( 'Newer articles ' . xpressui_arrow_svg() ); ?></div>
        </div>
      <?php endif; ?>

      <?php else : ?>
        <p class="text-gray-500 text-center py-16"><?php echo $iakpress_blog_fr ? 'Pas encore d’articles. Revenez bientôt.' : 'No articles yet. Check back soon.'; ?></p>
      <?php endif; ?>

    </div>
  </section>

</div>

<?php get_footer(); ?>
