<?php
/**
 * The template for displaying the /contact/ page.
 */

get_header(); ?>

<div class="font-sans text-gray-900 antialiased">

  <!-- Hero -->
  <section class="bg-white py-16 px-4 sm:px-6 lg:px-8 border-b border-gray-100">
    <div class="max-w-3xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3">Contact</p>
      <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 mb-4">
        Need help deciding, installing,<br class="hidden md:block"/> or tailoring the workflow?
      </h1>
      <p class="text-gray-500 leading-relaxed">
        Fill in the form and we'll get back to you within 1–2 business days. For installation questions, include your WordPress version and active theme.
      </p>
    </div>
  </section>

  <!-- Form (shortcode) -->
  <section class="bg-gray-50 py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
      <?php the_content(); ?>
    </div>
  </section>

  <!-- XpressUI promo -->
  <section class="bg-gray-50 border-t border-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
      <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 flex flex-col sm:flex-row items-center gap-6">
        <div class="flex-1 min-w-0">
          <p class="text-xs font-bold tracking-widest text-blue-600 uppercase mb-1">Built with XPressUI</p>
          <p class="text-gray-900 font-bold mb-1">This form runs on a WordPress plugin.</p>
          <p class="text-sm text-gray-500 leading-relaxed">No code, no CSS conflicts. Designed in the visual console, deployed as a shortcode in under 30 minutes.</p>
        </div>
        <a href="/xpressui/" class="flex-shrink-0 inline-flex items-center bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-bold py-3 px-6 rounded-lg transition text-sm whitespace-nowrap">
          See how it works →
        </a>
      </div>
    </div>
  </section>

</div>

<?php get_footer(); ?>
