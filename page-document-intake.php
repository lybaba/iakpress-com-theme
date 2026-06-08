<?php
/**
 * The template for displaying the /document-intake/ live demo page.
 */

$is_fr       = function_exists('iakpress_is_french_request') && iakpress_is_french_request();
$pricing_url = $is_fr ? home_url('/fr/pricing/') : home_url('/pricing/');
$contact_url = $is_fr ? home_url('/fr/contact/') : home_url('/contact/');
$pro_url     = $is_fr ? home_url('/fr/pro/')     : home_url('/pro/');

get_header(); ?>

<div class="font-sans text-gray-900 antialiased bg-gray-50 min-h-screen pb-20">

  <!-- Hero -->
  <section class="bg-white border-b border-gray-100 py-20 px-4 sm:px-6 lg:px-8 text-center">
    <div class="max-w-4xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-4">Live demo</p>
      <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight text-gray-900 mb-6 leading-tight">
        See the document intake workflow your clients will actually complete.
      </h1>
      <p class="text-xl text-gray-500 max-w-3xl mx-auto leading-relaxed mb-10">
        This is not just a form. It is a guided intake flow for collecting files, project details, and missing documents in one clean client-site or hosted experience.
      </p>
      <div class="flex flex-col sm:flex-row justify-center gap-4">
        <a href="#live-demo" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition shadow-lg shadow-blue-500/30">
          Try the portal below
        </a>
        <a href="<?php echo esc_url($pricing_url); ?>" class="bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-bold py-4 px-8 rounded-lg transition">
          See pricing
        </a>
      </div>
    </div>
  </section>

  <!-- Value strip -->
  <section class="bg-gray-50 border-b border-gray-100 py-10 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-4">
      <?php foreach ([
        ['title' => 'Clear for clients', 'body' => 'A guided flow that tells clients exactly what to upload and what is still missing.'],
        ['title' => 'Cleaner for your team', 'body' => 'Files, answers, and submission status are structured from the start instead of scattered in email.'],
        ['title' => 'Ready for delivery', 'body' => 'Use it on client sites or as a hosted workflow when the client needs a faster operational path.'],
      ] as $item): ?>
      <div class="bg-white rounded-2xl border border-gray-100 p-6 shadow-sm text-left">
        <h2 class="text-lg font-bold text-gray-900 mb-2"><?php echo esc_html($item['title']); ?></h2>
        <p class="text-sm text-gray-500 leading-relaxed"><?php echo esc_html($item['body']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- Demo -->
  <section id="live-demo" class="py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

      <div class="lg:col-span-8">
        <div class="bg-white rounded-3xl shadow-2xl ring-1 ring-black ring-opacity-5 overflow-hidden">
          <div class="px-6 pt-6 pb-4 border-b border-gray-100 bg-white">
            <p class="text-xs font-bold tracking-widest text-blue-600 uppercase mb-2">Interactive demo</p>
            <h2 class="text-2xl font-bold text-gray-900">Try the intake flow directly</h2>
            <p class="text-sm text-gray-500 mt-2">Complete a few steps, upload sample files if you want, and experience the portal as a client would.</p>
          </div>

          <div class="p-4 sm:p-8 md:p-12 min-h-[420px] bg-white">
            <?php echo do_shortcode('[xpressui id="document-intake"]'); ?>
          </div>

          <div class="bg-gray-50 border-t border-gray-200 p-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div class="text-sm text-gray-600 leading-relaxed">
              <strong class="text-gray-900">What to notice:</strong>
              the portal stays focused, structured, and easy to complete — exactly what you want when clients are sending critical documents.
            </div>
            <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex items-center justify-center px-6 py-3 text-base font-bold rounded-lg text-white bg-blue-600 hover:bg-blue-700 shadow-sm transition whitespace-nowrap shrink-0">Discuss Cloud plan</a>
          </div>
        </div>
      </div>

      <aside class="lg:col-span-4 space-y-6">
        <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-6">
          <p class="text-xs font-bold tracking-widest text-blue-600 uppercase mb-3">Why this matters</p>
          <h2 class="text-2xl font-bold text-gray-900 mb-4">It turns file chaos into a repeatable process.</h2>
          <ul class="space-y-3 text-sm text-gray-600">
            <li class="flex items-start gap-3"><span class="text-blue-600 font-bold">01</span><span>Clients know exactly what to submit and in what order.</span></li>
            <li class="flex items-start gap-3"><span class="text-blue-600 font-bold">02</span><span>You stop chasing missing files across long email threads.</span></li>
            <li class="flex items-start gap-3"><span class="text-blue-600 font-bold">03</span><span>Your intake feels more professional from the very first interaction.</span></li>
          </ul>
        </div>

        <div class="bg-gray-900 rounded-3xl p-6 text-white shadow-sm">
          <p class="text-xs font-bold tracking-widest text-blue-300 uppercase mb-3">Best fit</p>
          <h2 class="text-2xl font-bold mb-4">Built for agencies and service teams with document-heavy workflows.</h2>
          <ul class="space-y-3 text-sm text-gray-300">
            <li>• agencies collecting briefs and assets</li>
            <li>• freelancers onboarding new clients</li>
            <li>• teams gathering forms and supporting documents</li>
          </ul>
          <a href="<?php echo esc_url($pricing_url); ?>" class="mt-6 inline-flex items-center justify-center w-full px-6 py-3 rounded-lg bg-white text-gray-900 font-bold hover:bg-gray-100 transition">Compare plans</a>
        </div>
      </aside>

    </div>
  </section>

  <!-- Bottom CTA -->
  <section class="bg-white border-t border-gray-100 py-16 px-4 sm:px-6 lg:px-8 text-center">
    <div class="max-w-3xl mx-auto">
      <h2 class="text-3xl font-bold text-gray-900 mb-4">If the demo feels right, the next step is simple.</h2>
      <p class="text-gray-500 leading-relaxed mb-8">Start with IntakeFlow Starter when the workflow belongs on a client site, or use IntakeFlow Cloud when the team needs hosted links, catalogs, files, and operator review.</p>
      <div class="flex flex-col sm:flex-row justify-center gap-4">
        <a href="<?php echo esc_url($pricing_url); ?>" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition shadow-lg shadow-blue-500/30">See pricing</a>
        <a href="<?php echo esc_url($pro_url); ?>" class="bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-bold py-4 px-8 rounded-lg transition">Explore Starter</a>
      </div>
    </div>
  </section>
</div>

<?php get_footer(); ?>
