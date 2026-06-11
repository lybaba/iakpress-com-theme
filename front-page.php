<?php
/**
 * The front page template file for IAKPress.com
 */

$console_url = '';
$hero_client_portal = xpressui_asset_url('front-step-2.png');
$hero_upload_flow = xpressui_asset_url('front-step-3.png');
$hero_inbox = xpressui_asset_url('admin-project-inbox.png');
$intro_video_url = 'https://www.youtube.com/watch?v=G8dXHAbIgac';
$intro_video_embed_url = 'https://www.youtube.com/embed/G8dXHAbIgac';

get_header(); ?>

<div class="iak-home-landing font-sans text-gray-900 antialiased selection:bg-blue-200">
  
  <!-- SECTION 1 : HERO -->
  <section class="relative bg-white py-16 md:py-24 px-4 sm:px-6 lg:px-8 overflow-hidden">
    <!-- Premium background glow blobs -->
    <div class="absolute inset-0 -z-10 overflow-hidden pointer-events-none" aria-hidden="true">
      <div class="absolute top-0 left-1/4 w-[500px] h-[500px] bg-gradient-to-tr from-blue-400/10 to-indigo-400/5 rounded-full filter blur-[80px]"></div>
      <div class="absolute bottom-10 right-1/4 w-[400px] h-[400px] bg-gradient-to-br from-indigo-400/10 to-blue-400/5 rounded-full filter blur-[80px]"></div>
    </div>

    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
      <div class="lg:col-span-5 text-center lg:text-left">
        <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-4">Client follow-up workflows for agencies and service teams</p>
        <h1 class="text-5xl md:text-6xl font-extrabold tracking-tight text-gray-900 mb-6 leading-tight">
          Stop chasing clients for <span class="bg-gradient-to-r from-blue-600 via-indigo-600 to-blue-800 bg-clip-text text-transparent">missing files.</span>
        </h1>
        <p class="text-xl text-gray-500 mb-10 leading-relaxed">
          Send one private link, collect files and answers in a guided checklist, and see exactly what is still missing before your team starts reviewing.
        </p>
        <div class="flex flex-col sm:flex-row justify-center lg:justify-start gap-4">
          <a href="/contact/"
             class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold py-4 px-8 rounded-xl transition-all duration-300 shadow-lg shadow-blue-500/25 hover:shadow-indigo-500/35 hover:-translate-y-0.5 transform whitespace-nowrap">
            Try the missing-file workflow
          </a>
          <a href="/pricing/" class="bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-bold py-4 px-8 rounded-xl transition duration-200 whitespace-nowrap">
            See how it works
          </a>
        </div>
        <div class="mt-6 flex flex-wrap justify-center lg:justify-start gap-3 text-sm text-gray-500">
          <?php foreach (['One client link', 'Missing-file status', 'Review inbox'] as $point): ?>
          <span class="inline-flex rounded-full border border-blue-100 bg-blue-50/70 px-4 py-2 font-semibold text-blue-900"><?php echo esc_html($point); ?></span>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="lg:col-span-7">
        <div class="relative rounded-[2rem] bg-gray-950 p-4 md:p-6 shadow-2xl shadow-blue-900/20 ring-1 ring-gray-900/10 hover:-translate-y-0.5 transition-all duration-500">
          <div class="absolute -left-6 top-10 hidden md:block rounded-2xl bg-white p-3 shadow-xl ring-1 ring-gray-200 hover:-translate-y-1 hover:-translate-x-1 transition-all duration-300 hover:shadow-2xl">
            <p class="mb-2 text-xs font-extrabold uppercase tracking-widest text-blue-600">Client portal</p>
            <img src="<?php echo esc_url($hero_client_portal); ?>" alt="IntakeFlow client intake portal" class="h-40 w-56 rounded-xl object-cover object-top">
          </div>
          <div class="overflow-hidden rounded-2xl bg-white shadow-2xl ring-1 ring-white/10">
            <img src="<?php echo esc_url($hero_upload_flow); ?>" alt="Guided upload workflow in IntakeFlow" class="h-auto w-full object-cover object-top">
          </div>
          <div class="absolute -right-4 -bottom-8 hidden md:block w-72 overflow-hidden rounded-2xl bg-white p-3 shadow-2xl ring-1 ring-gray-200 hover:translate-y-1 hover:translate-x-1 transition-all duration-300 hover:shadow-2xl">
            <p class="mb-2 text-xs font-extrabold uppercase tracking-widest text-blue-600">Operator inbox</p>
            <img src="<?php echo esc_url($hero_inbox); ?>" alt="IntakeFlow operator inbox" class="h-36 w-full rounded-xl object-cover object-top">
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-gradient-to-b from-blue-50/20 via-white to-blue-50/20 border-y border-blue-100/50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
      <p class="mb-6 text-center text-sm font-bold uppercase tracking-widest text-blue-600">From scattered requests to one reviewable submission</p>
      <div class="grid grid-cols-1 gap-5 md:grid-cols-[1fr_auto_1fr] md:items-center">
        <div class="rounded-2xl border border-red-100/60 bg-white p-6 shadow-sm hover:shadow-red-500/5 hover:border-red-200 transition-all duration-300">
          <p class="mb-4 text-sm font-extrabold uppercase tracking-widest text-red-500">Before IntakeFlow</p>
          <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
            <?php foreach (['Email attachment', 'Drive link', 'WhatsApp message', 'Missing ID', 'Half answer', 'No clear status'] as $item): ?>
            <span class="rounded-xl border border-gray-100 bg-gray-50/50 px-4 py-3 text-sm font-semibold text-gray-600"><?php echo esc_html($item); ?></span>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="hidden h-12 w-12 items-center justify-center rounded-full bg-blue-600 text-lg font-black text-white shadow-lg shadow-blue-500/20 md:flex hover:scale-110 transition-transform duration-300">→</div>
        <div class="rounded-2xl border border-blue-200 bg-white p-6 shadow-md shadow-blue-500/5 hover:shadow-blue-500/10 hover:border-blue-300 transition-all duration-300">
          <p class="mb-4 text-sm font-extrabold uppercase tracking-widest text-blue-600">With IntakeFlow</p>
          <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
            <?php foreach (['One private link', 'Required checklist', 'Guided upload', 'Missing-file status', 'Operator inbox', 'Ready to review'] as $item): ?>
            <span class="rounded-xl border border-blue-100 bg-blue-50/50 px-4 py-3 text-sm font-semibold text-blue-950"><?php echo esc_html($item); ?></span>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-white py-16 px-4 sm:px-6 lg:px-8 border-b border-gray-100">
    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
      <div class="lg:col-span-4 text-center lg:text-left">
        <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3">Workflow intro</p>
        <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight text-gray-900 mb-4">See how a messy client request becomes one reviewable submission.</h2>
        <p class="text-gray-600 leading-relaxed mb-6">
          A quick tour of the client link, guided submission, notification email, and operator review workflow.
        </p>
        <a href="<?php echo esc_url($intro_video_url); ?>" target="_blank" rel="noreferrer" class="inline-flex justify-center rounded-lg border border-blue-100 bg-blue-50 px-5 py-3 text-sm font-bold text-blue-700 transition hover:bg-blue-100 whitespace-nowrap">
          Open on YouTube
        </a>
      </div>
      <div class="lg:col-span-8">
        <div class="overflow-hidden rounded-3xl border border-gray-200 bg-gray-950 shadow-2xl shadow-blue-900/10">
          <div class="aspect-video">
            <iframe
              src="<?php echo esc_url($intro_video_embed_url); ?>"
              title="IntakeFlow product intro"
              loading="lazy"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              allowfullscreen
              referrerpolicy="strict-origin-when-cross-origin"
              style="width: 100%; height: 100%; border: 0;"
            ></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SECTION 2 : THE PROBLEM -->
  <section class="bg-gray-50 py-20 px-4 sm:px-6 lg:px-8 border-y border-gray-100">
    <div class="max-w-6xl mx-auto">
      <h2 class="text-3xl font-bold text-center mb-16 text-gray-900">Client document collection is still too manual</h2>
      
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="landing-problem-card bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-xl hover:border-blue-500/15 hover:-translate-y-1.5 transition-all duration-300">
          <div class="w-14 h-14 rounded-xl bg-blue-50/60 flex items-center justify-center text-3xl mb-6 shadow-sm border border-blue-100/40">📧</div>
          <h3 class="text-xl font-bold mb-3 text-gray-900">Files arrive everywhere</h3>
          <p class="text-gray-600 leading-relaxed">Invoices, IDs, statements, and certificates land in email threads, shared drives, WhatsApp messages, and random attachments.</p>
        </div>
        <div class="landing-problem-card bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-xl hover:border-blue-500/15 hover:-translate-y-1.5 transition-all duration-300">
          <div class="w-14 h-14 rounded-xl bg-blue-50/60 flex items-center justify-center text-3xl mb-6 shadow-sm border border-blue-100/40">📎</div>
          <h3 class="text-xl font-bold mb-3 text-gray-900">Submissions are incomplete</h3>
          <p class="text-gray-600 leading-relaxed">Your team loses time checking what is missing, asking again, and manually rebuilding the client file.</p>
        </div>
        <div class="landing-problem-card bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-xl hover:border-blue-500/15 hover:-translate-y-1.5 transition-all duration-300">
          <div class="w-14 h-14 rounded-xl bg-blue-50/60 flex items-center justify-center text-3xl mb-6 shadow-sm border border-blue-100/40">📋</div>
          <h3 class="text-xl font-bold mb-3 text-gray-900">No clear status</h3>
          <p class="text-gray-600 leading-relaxed">Clients do not know what is expected, and your team cannot instantly see what is complete, pending, or wrong.</p>
        </div>
      </div>

      <p class="text-center text-lg font-semibold mt-10 text-gray-900">You do not need another form builder. You need a client follow-up workflow.</p>
      <div class="text-center mt-8">
        <a href="/agency-pilot/" class="inline-flex justify-center bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold py-3.5 px-8 rounded-xl transition-all duration-300 shadow-lg shadow-blue-500/25 hover:-translate-y-0.5 whitespace-nowrap">
          Scope the first pilot
        </a>
      </div>
    </div>
  </section>

  <!-- SECTION 3 : THE SOLUTION -->
  <section class="bg-white py-24 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto text-center">
      <h2 class="text-3xl md:text-4xl font-bold mb-6 text-gray-900">A structured workflow your clients can actually complete</h2>
      <p class="text-lg text-gray-600 mb-12 max-w-3xl mx-auto">Create a secure document intake, send one private link, and receive a complete, organized file set for review.</p>
      
      <div class="text-left space-y-8 bg-gradient-to-br from-white to-blue-50/20 border border-blue-100/50 p-8 md:p-12 rounded-3xl shadow-lg shadow-blue-500/5 hover:shadow-blue-500/10 transition-shadow duration-300">
        <div class="flex items-start">
          <div class="flex-shrink-0 h-8 w-8 rounded-full bg-gradient-to-br from-blue-600 to-indigo-600 text-white font-extrabold flex items-center justify-center mr-4 mt-1 shadow-sm shadow-blue-500/20">1</div>
          <div>
            <h4 class="text-xl font-bold text-gray-900 mb-1">Build the checklist</h4>
            <p class="text-gray-600 leading-relaxed">Define exactly which documents each client must submit: invoices, bank statements, IDs, contracts, certificates, or custom requirements.</p>
          </div>
        </div>
        <div class="flex items-start">
          <div class="flex-shrink-0 h-8 w-8 rounded-full bg-gradient-to-br from-blue-600 to-indigo-600 text-white font-extrabold flex items-center justify-center mr-4 mt-1 shadow-sm shadow-blue-500/20">2</div>
          <div>
            <h4 class="text-xl font-bold text-gray-900 mb-1">Send one private link</h4>
            <p class="text-gray-600 leading-relaxed">Your client sees a clean portal with clear instructions, expected files, and submission status.</p>
          </div>
        </div>
        <div class="flex items-start">
          <div class="flex-shrink-0 h-8 w-8 rounded-full bg-gradient-to-br from-blue-600 to-indigo-600 text-white font-extrabold flex items-center justify-center mr-4 mt-1 shadow-sm shadow-blue-500/20">3</div>
          <div>
            <h4 class="text-xl font-bold text-gray-900 mb-1">Receive a complete file set</h4>
            <p class="text-gray-600 leading-relaxed">Everything arrives structured, traceable, and ready for review — with less manual follow-up for your team.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SECTION 3B : AI VALUE -->
  <section class="bg-gray-50 py-20 px-4 sm:px-6 lg:px-8 border-y border-gray-100">
    <div class="max-w-5xl mx-auto text-center">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-4">Built for 2026 workflows</p>
      <h2 class="text-3xl font-bold mb-6 text-gray-900">Go beyond file collection when you are ready.</h2>
      <p class="text-lg text-gray-600 mb-12 max-w-3xl mx-auto">Start with a reliable intake workflow now. Then add AI-assisted review layers as your process matures.</p>
      <div class="grid md:grid-cols-4 gap-6 text-left">
        <div class="landing-value-card bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg hover:border-blue-500/15 hover:-translate-y-1 transition-all duration-300">
          <h3 class="font-bold text-lg mb-3 text-gray-900">OCR-ready foundation</h3>
          <p class="text-gray-600">Your document flow is structured so OCR layers can be added without redoing intake.</p>
        </div>
        <div class="landing-value-card bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg hover:border-blue-500/15 hover:-translate-y-1 transition-all duration-300">
          <h3 class="font-bold text-lg mb-3 text-gray-900">Data extraction path</h3>
          <p class="text-gray-600">Prepare for targeted extraction from invoices, certificates, and recurring client documents.</p>
        </div>
        <div class="landing-value-card bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg hover:border-blue-500/15 hover:-translate-y-1 transition-all duration-300">
          <h3 class="font-bold text-lg mb-3 text-gray-900">Missing-file checks</h3>
          <p class="text-gray-600">Track which required documents are submitted, pending, or rejected.</p>
        </div>
        <div class="landing-value-card bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg hover:border-blue-500/15 hover:-translate-y-1 transition-all duration-300">
          <h3 class="font-bold text-lg mb-3 text-gray-900">Review summaries</h3>
          <p class="text-gray-600">Turn uploaded files into clearer review queues for your team.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- SECTION 3C : DIFFERENTIATION -->
  <section class="bg-white py-20 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto text-center">
      <h2 class="text-3xl font-bold mb-12 text-gray-900">Why not email, Drive, or another SaaS?</h2>
      <div class="grid md:grid-cols-2 gap-10 text-left">
        <div class="landing-compare-card bg-red-50/5 p-8 rounded-2xl border border-red-100/60 hover:shadow-md transition-shadow">
          <h3 class="font-bold text-lg mb-4 text-red-700">Generic tools</h3>
          <ul class="text-gray-600 space-y-2">
            <li>• Email and Drive create messy, manual follow-up</li>
            <li>• Form plugins collect inputs, not complete client workflows</li>
            <li>• Generic SaaS adds another login without matching your workflow model</li>
            <li>• DIY AI scripts are hard to trust, support, and standardize</li>
          </ul>
        </div>
        <div class="landing-compare-card bg-emerald-50/5 p-8 rounded-2xl border border-emerald-100/60 shadow-sm hover:shadow-md transition-shadow">
          <h3 class="font-bold text-lg mb-4 text-emerald-800">IntakeFlow</h3>
          <ul class="text-gray-600 space-y-2">
            <li>• IntakeFlow Starter for site-owned delivery, IntakeFlow Cloud when operations should live in IntakeFlow</li>
            <li>• Clear checklists, private links, and submission status</li>
            <li>• A branded experience your clients already recognize</li>
            <li>• A foundation for AI-assisted review and validation</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- SECTION 3D : BUSINESS VALUE -->
  <section class="bg-gray-50 py-20 px-4 sm:px-6 lg:px-8 border-y border-gray-100">
    <div class="max-w-5xl mx-auto text-center">
      <h2 class="text-3xl font-bold mb-12 text-gray-900">Designed for firms managing recurring client documents</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="landing-value-card bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg hover:border-blue-500/15 hover:-translate-y-1 transition-all duration-300">
          <h3 class="text-xl font-bold mb-3 text-gray-900">Reduce follow-ups</h3>
          <p class="text-gray-600">Give clients a clear checklist and reduce the time spent asking for missing documents.</p>
        </div>
        <div class="landing-value-card bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg hover:border-blue-500/15 hover:-translate-y-1 transition-all duration-300">
          <h3 class="text-xl font-bold mb-3 text-gray-900">Standardize intake</h3>
          <p class="text-gray-600">Use repeatable workflows instead of rebuilding the process for every client or every month.</p>
        </div>
        <div class="landing-value-card bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg hover:border-blue-500/15 hover:-translate-y-1 transition-all duration-300">
          <h3 class="text-xl font-bold mb-3 text-gray-900">Choose the right pack</h3>
          <p class="text-gray-600">Use IntakeFlow Starter first, then move to IntakeFlow Cloud from €39/month when shared operations, quotas, catalogs, and review should live in Console.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- SECTION : LATEST ARTICLE -->
  <?php
  $latest_post = get_posts( [ 'numberposts' => 1, 'post_status' => 'publish' ] );
  if ( ! empty( $latest_post ) ) :
    $post = $latest_post[0];
    setup_postdata( $post );
  ?>
  <section class="bg-white py-20 px-4 sm:px-6 lg:px-8 border-t border-gray-100">
    <div class="max-w-4xl mx-auto">
      <div class="flex items-center justify-between mb-10">
        <h2 class="text-2xl font-bold text-gray-900">From the Blog</h2>
        <a href="/blog/" class="text-sm font-bold text-blue-600 hover:text-blue-800 transition">All articles &rarr;</a>
      </div>

      <a href="<?php echo get_permalink( $post->ID ); ?>"
         class="group block bg-gray-50 hover:bg-blue-50 border border-gray-100 hover:border-blue-200 rounded-2xl p-8 md:p-10 transition-all duration-200">
        <?php
        $cats = get_the_category( $post->ID );
        if ( ! empty( $cats ) ) : ?>
          <p class="text-xs font-bold tracking-widest text-blue-600 uppercase mb-3">
            <?php echo esc_html( $cats[0]->name ); ?>
          </p>
        <?php endif; ?>

        <h3 class="text-2xl font-extrabold text-gray-900 group-hover:text-blue-700 mb-3 transition-colors leading-snug">
          <?php echo esc_html( get_the_title( $post->ID ) ); ?>
        </h3>
        <p class="text-gray-500 leading-relaxed mb-6">
          <?php echo esc_html( wp_trim_words( get_the_excerpt( $post->ID ), 28, '…' ) ); ?>
        </p>
        <span class="inline-flex items-center text-sm font-bold text-blue-600 group-hover:underline">
          Read the article
          <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
          </svg>
        </span>
      </a>
    </div>
  </section>
  <?php wp_reset_postdata(); endif; ?>

  <!-- SECTION 4 : PRICING -->
  <section id="pricing" class="bg-gradient-to-b from-gray-900 to-gray-950 py-24 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-extrabold text-white sm:text-4xl">Simple pricing to launch your first repeatable intake workflow</h2>
          <p class="mt-4 text-xl text-gray-400">Start with IntakeFlow Free or IntakeFlow Starter for client-site delivery. Use IntakeFlow Cloud when your team wants hosted workflow operations.</p>
      </div>

      <div class="bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col md:flex-row border border-blue-500/5">
        <div class="p-8 md:p-10 md:w-2/3">
          <h3 class="text-2xl font-bold text-gray-900 mb-2">IntakeFlow Starter</h3>
          <p class="text-gray-500 mb-8">Build structured client document portals on the client site and replace scattered email follow-ups with a clear intake workflow.</p>
          <ul class="space-y-4">
            <li class="flex items-center"><svg class="h-6 w-6 text-green-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="text-gray-700">Use it on <strong>1 production site</strong></span></li>
            <li class="flex items-center"><svg class="h-6 w-6 text-green-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="text-gray-700">Automatic updates via the client-site admin</span></li>
            <li class="flex items-center"><svg class="h-6 w-6 text-green-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="text-gray-700">Starter components included for document collection</span></li>
            <li class="flex items-center"><svg class="h-6 w-6 text-green-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="text-gray-700">Visual Builder access and local workflow builder</span></li>
          </ul>
        </div>
        <div class="bg-gradient-to-br from-gray-50 to-blue-50/30 p-8 md:p-10 md:w-1/3 flex flex-col justify-center items-center text-center border-l border-gray-100">
          <p class="text-gray-500 text-sm font-bold uppercase tracking-widest mb-2">Yearly subscription</p>
          <div class="flex items-baseline justify-center text-6xl font-extrabold text-gray-900"><span>€99</span></div>
          <p class="mt-2 text-gray-500 text-sm">per site per year, excl. VAT.</p>
          <a href="<?php echo esc_url(xpressui_starter_buy_url()); ?>" class="mt-8 w-full block bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 shadow-lg shadow-blue-600/25 hover:shadow-indigo-600/35 hover:-translate-y-0.5 transform whitespace-nowrap">Buy IntakeFlow Starter</a>
        </div>
      </div>
    </div>
  </section>

</div>
    </div>
  </section>

</div>

<?php get_footer(); ?>
