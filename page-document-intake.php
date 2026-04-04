<?php
/**
 * The template for displaying the /document-intake/ live demo page.
 */

get_header(); ?>

<div class="font-sans text-gray-900 antialiased bg-gray-50 min-h-screen pb-20">
  
  <!-- Header -->
  <div class="bg-gray-900 pt-16 pb-24 text-center px-4 sm:px-6 lg:px-8">
    <h1 class="text-4xl font-extrabold text-white tracking-tight sm:text-5xl">
      Live Demo: Document Intake
    </h1>
    <p class="mt-4 text-xl text-gray-400 max-w-3xl mx-auto leading-relaxed">
      Test the client portal below. It runs completely isolated from your WordPress theme, guaranteeing zero CSS conflicts and a premium experience out of the box.
    </p>
  </div>

  <!-- Demo Container -->
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12">
    <div class="bg-white rounded-2xl shadow-2xl ring-1 ring-black ring-opacity-5 overflow-hidden">
      <div class="p-4 sm:p-8 md:p-12 min-h-[400px]">
        
        <?php
        // Affiche dynamiquement le shortcode XPressUI
        echo do_shortcode('[xpressui id="document-intake"]');
        ?>

      </div>
      
      <div class="bg-gray-100 border-t border-gray-200 p-6 flex flex-col sm:flex-row items-center justify-between">
        <div class="text-sm text-gray-600 mb-4 sm:mb-0">
          <strong>Notice how smooth it is?</strong> That's because it's an isolated React app, not a standard WP form.
        </div>
        <a href="/#pricing" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-bold rounded-lg text-white bg-blue-600 hover:bg-blue-700 shadow-sm transition whitespace-nowrap shrink-0">Get the Agency License</a>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>