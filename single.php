<?php
/**
 * The template for displaying single blog posts for IAKPress.com
 */

get_header(); ?>

<div class="font-sans text-gray-900 antialiased">

  <?php while ( have_posts() ) : the_post(); ?>

  <?php
  $post_is_fr  = function_exists( 'iakpress_post_is_french' ) ? iakpress_post_is_french() : false;
  $blog_href   = $post_is_fr ? '/fr/blog/' : '/blog/';
  $back_label  = $post_is_fr ? 'Tous les articles' : 'All articles';
  ?>

  <!-- Article Header -->
  <section class="bg-white py-16 px-4 sm:px-6 lg:px-8 border-b border-gray-100">
    <div class="max-w-3xl mx-auto">

      <!-- Back link -->
      <a href="<?php echo esc_url( $blog_href ); ?>" class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-800 mb-8 transition">
        <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        <?php echo esc_html( $back_label ); ?>
      </a>

      <!-- Category / Tag -->
      <?php
      $eyebrow_cat = function_exists( 'iakpress_post_display_category' ) ? iakpress_post_display_category() : null;
      if ( $eyebrow_cat ) : ?>
        <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-4">
          <?php echo esc_html( $eyebrow_cat->name ); ?>
        </p>
      <?php endif; ?>

      <!-- Title -->
      <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-gray-900 mb-6 leading-tight">
        <?php the_title(); ?>
      </h1>

      <!-- Meta -->
      <div class="flex items-center space-x-4 text-sm text-gray-400">
        <time datetime="<?php echo get_the_date( 'c' ); ?>">
          <?php echo get_the_date(); ?>
        </time>
        <span><?php echo $post_is_fr ? ceil( str_word_count( get_the_content() ) / 200 ) . ' min de lecture' : ceil( str_word_count( get_the_content() ) / 200 ) . ' min read'; ?></span>
      </div>
    </div>
  </section>

  <!-- Featured image -->
  <?php if ( has_post_thumbnail() ) : ?>
  <section class="bg-white pt-4 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
      <figure class="rounded-2xl overflow-hidden border border-gray-100 shadow-sm">
        <?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-auto block', 'loading' => 'eager' ) ); ?>
      </figure>
    </div>
  </section>
  <?php endif; ?>

  <!-- Article Body -->
  <section class="bg-white py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
      <div class="prose prose-lg prose-blue max-w-none
                  prose-headings:font-extrabold prose-headings:tracking-tight prose-headings:text-gray-900
                  prose-h3:text-2xl prose-h3:mt-12 prose-h3:mb-4
                  prose-p:text-gray-600 prose-p:leading-relaxed
                  prose-a:text-blue-600 prose-a:no-underline hover:prose-a:underline
                  prose-strong:text-gray-900
                  prose-code:text-blue-700 prose-code:bg-blue-50 prose-code:px-1 prose-code:rounded prose-code:text-sm
                  prose-table:text-sm
                  prose-th:bg-gray-50 prose-th:font-bold prose-th:text-gray-900
                  prose-td:text-gray-600
                  prose-li:text-gray-600">
        <?php the_content(); ?>
      </div>
    </div>
  </section>

  <!-- CTA Banner -->
  <section class="bg-blue-50 border-y border-blue-100 py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto text-center">
      <h2 class="text-2xl font-extrabold text-gray-900 mb-3"><?php echo $post_is_fr ? 'Prêt à voir le sas de pré-collecte en action ?' : 'Ready to see the pre-collection gateway in action?'; ?></h2>
      <p class="text-gray-600 mb-8"><?php echo $post_is_fr ? 'Découvrez la démo en ligne &mdash; sans inscription.' : 'See the live demo &mdash; no signup required.'; ?></p>
      <div class="flex flex-col sm:flex-row justify-center gap-4">
        <a href="<?php echo $post_is_fr ? '/fr/document-intake/' : '/document-intake/'; ?>"
           class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg transition duration-200 shadow-lg shadow-blue-500/30">
          <?php echo $post_is_fr ? 'Essayer la démo' : 'Try the Live Demo'; ?>
        </a>
        <a href="<?php echo $post_is_fr ? '/fr/contact/' : '/contact/'; ?>"
           class="bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-bold py-3 px-8 rounded-lg transition duration-200">
          <?php echo $post_is_fr ? 'Discuter du plan Cloud' : 'Discuss Cloud plan'; ?> <?php echo xpressui_arrow_svg(); ?>
        </a>
      </div>
    </div>
  </section>

  <?php endwhile; ?>

</div>

<?php get_footer(); ?>
