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
        Launch one workflow first.<br class="hidden md:block"/> Then decide what should scale.
      </h1>
      <p class="text-gray-500 leading-relaxed">
        Tell us what arrives today, who reviews it, and where the result should be delivered. We'll reply within 1-2 business days with a concrete first-workflow path.
      </p>
    </div>
  </section>

  <!-- Form -->
  <section class="bg-gray-50 py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto grid gap-8 lg:grid-cols-[0.85fr_1.15fr] items-start">
      <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
        <p class="text-xs font-bold tracking-widest text-blue-600 uppercase mb-3">What happens next</p>
        <h2 class="text-2xl font-extrabold tracking-tight text-gray-900 mb-4">A small pilot, not a vague discovery call.</h2>
        <div class="space-y-4 text-sm text-gray-600 leading-relaxed">
          <div class="flex gap-3">
            <span class="mt-1 h-2 w-2 rounded-full bg-blue-600 flex-shrink-0"></span>
            <p><strong class="text-gray-900">You describe one workflow.</strong> Documents, reservations, catalog orders, payment proofs, or another recurring intake.</p>
          </div>
          <div class="flex gap-3">
            <span class="mt-1 h-2 w-2 rounded-full bg-blue-600 flex-shrink-0"></span>
            <p><strong class="text-gray-900">You can share context.</strong> Add a form, spreadsheet, screenshot, or process document link if it helps explain the workflow.</p>
          </div>
          <div class="flex gap-3">
            <span class="mt-1 h-2 w-2 rounded-full bg-blue-600 flex-shrink-0"></span>
            <p><strong class="text-gray-900">We suggest the delivery path.</strong> Hosted link first, or client-site delivery when the workflow must live on an existing site.</p>
          </div>
          <div class="flex gap-3">
            <span class="mt-1 h-2 w-2 rounded-full bg-blue-600 flex-shrink-0"></span>
            <p><strong class="text-gray-900">You get a scoped next step.</strong> Paid assisted pilots start from 299 EUR. Client-site delivery starts from 790 EUR.</p>
          </div>
        </div>
      </div>
      <div class="min-w-0">
        <?php the_content(); ?>
      </div>
    </div>
  </section>

  <!-- XpressUI promo -->
  <section class="bg-gray-50 border-t border-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
      <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 flex flex-col sm:flex-row items-center gap-6">
        <div class="flex-1 min-w-0">
          <p class="text-xs font-bold tracking-widest text-blue-600 uppercase mb-1">Built with XPressUI</p>
          <p class="text-gray-900 font-bold mb-1">This form runs on XPressUI.</p>
          <p class="text-sm text-gray-500 leading-relaxed">No code, no CSS conflicts. Designed in the visual console, deployed on a client site in under 30 minutes.</p>
        </div>
        <a href="/xpressui/" class="flex-shrink-0 inline-flex items-center bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-bold py-3 px-6 rounded-lg transition text-sm whitespace-nowrap">
          See how it works →
        </a>
      </div>
    </div>
  </section>

</div>

<?php get_footer(); ?>
