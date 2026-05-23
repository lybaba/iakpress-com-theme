<?php
/**
 * The template for displaying single blog posts for IAKPress.com
 */

get_header(); ?>

<div class="font-sans text-gray-900 antialiased">

  <?php while ( have_posts() ) : the_post(); ?>

  <!-- Article Header -->
  <section class="bg-white py-16 px-4 sm:px-6 lg:px-8 border-b border-gray-100">
    <div class="max-w-3xl mx-auto">

      <!-- Back link -->
      <a href="/blog/" class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-800 mb-8 transition">
        <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        All articles
      </a>

      <!-- Category / Tag -->
      <?php
      $categories = get_the_category();
      if ( ! empty( $categories ) ) : ?>
        <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-4">
          <?php echo esc_html( $categories[0]->name ); ?>
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
        <span><?php echo ceil( str_word_count( get_the_content() ) / 200 ); ?> min read</span>
      </div>
    </div>
  </section>

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
      <h2 class="text-2xl font-extrabold text-gray-900 mb-3">Ready to make peace with your themes?</h2>
      <p class="text-gray-600 mb-8">See the decoupled architecture in action on our live demo &mdash; no signup required.</p>
      <div class="flex flex-col sm:flex-row justify-center gap-4">
        <a href="/document-intake/"
           class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg transition duration-200 shadow-lg shadow-blue-500/30">
          Try the Live Demo
        </a>
        <a href="/#pricing"
           class="bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-bold py-3 px-8 rounded-lg transition duration-200">
          Get XPressUI Pro &rarr;
        </a>
      </div>
    </div>
  </section>

  <?php endwhile; ?>

</div>

<?php get_footer(); ?>
