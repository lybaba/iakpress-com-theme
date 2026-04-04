<?php
/**
 * The template for displaying the /services/ page.
 */

get_header(); ?>

<div class="font-sans text-gray-900 antialiased bg-gray-50 min-h-screen pb-24">
  
  <!-- Hero Section -->
  <section class="bg-gray-900 py-20 px-4 sm:px-6 lg:px-8 text-center">
    <div class="max-w-4xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-400 uppercase mb-4">Done-For-You Service</p>
      <h1 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight mb-6">
        We build your client portal. <br class="hidden md:block" />You take the credit.
      </h1>
      <p class="text-xl text-gray-400 max-w-2xl mx-auto leading-relaxed">
        Too busy to configure fields, match branding, and set up routing? Let our experts install and perfectly tailor the Document Intake portal for your agency.
      </p>
    </div>
  </section>

  <!-- Services Details -->
  <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8">
    <div class="bg-white rounded-2xl shadow-xl ring-1 ring-black ring-opacity-5 overflow-hidden">
      <div class="grid grid-cols-1 md:grid-cols-2">
        <!-- Left Column: What's included -->
        <div class="p-8 md:p-12 border-b md:border-b-0 md:border-r border-gray-100">
          <h3 class="text-2xl font-bold text-gray-900 mb-6">White-Glove Setup</h3>
          <ul class="space-y-5">
            <li class="flex items-start">
              <svg class="h-6 w-6 text-green-500 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
              <span class="text-gray-700"><strong>Full Installation:</strong> We install XPressUI Pro and deploy the Document Intake pack on your (or your client's) server.</span>
            </li>
            <li class="flex items-start">
              <svg class="h-6 w-6 text-green-500 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
              <span class="text-gray-700"><strong>Custom Fields:</strong> We map and configure up to 30 custom fields to perfectly match your onboarding process.</span>
            </li>
            <li class="flex items-start">
              <svg class="h-6 w-6 text-green-500 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
              <span class="text-gray-700"><strong>Branding:</strong> We adjust the workflow theme (colors, fonts, radii) to seamlessly blend with your WordPress site.</span>
            </li>
            <li class="flex items-start">
              <svg class="h-6 w-6 text-green-500 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
              <span class="text-gray-700"><strong>Testing & Routing:</strong> End-to-end testing of file uploads, email notifications, and post-submission redirects.</span>
            </li>
          </ul>
        </div>
        
        <!-- Right Column: Pricing & CTA -->
        <div class="p-8 md:p-12 bg-gray-50 flex flex-col justify-center">
          <h3 class="text-xl font-bold text-gray-900 mb-2">Turnkey Delivery</h3>
          <p class="text-gray-500 mb-8">Delivered in 48 hours. XPressUI Agency License included.</p>
          <div class="mb-8">
            <span class="text-5xl font-extrabold text-gray-900">€499</span>
            <span class="text-gray-500 font-medium">/ portal</span>
          </div>
        <a href="mailto:hello@iakpress.com?subject=Turnkey%20Portal%20Setup%20Inquiry" class="w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded-lg transition duration-200 shadow-lg shadow-blue-600/30">Request a Setup</a>
          <p class="mt-4 text-sm text-gray-500 text-center">Or <a href="/#pricing" class="text-blue-600 font-medium hover:underline">buy the license</a> and do it yourself.</p>
        </div>
      </div>
    </div>
  </section>
</div>

<?php get_footer(); ?>