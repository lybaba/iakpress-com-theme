<?php
/**
 * Template for the /xpressui/ page.
 * WordPress automatically loads this for a page with slug "xpressui".
 */

$download_url   = 'https://github.com/lybaba/xpressui-packages/releases/latest';
$repo_url       = 'https://github.com/lybaba/xpressui-packages';
$console_url    = 'https://xpressui.iakpress.com/console/';
$contact_url    = home_url('/contact/');
$agency_pilot_url = home_url('/agency-pilot/');
$demo_video_url = 'https://www.youtube.com/watch?v=G8dXHAbIgac';
$demo_embed_url = 'https://www.youtube.com/embed/G8dXHAbIgac';

$gallery_shots = [
  ['src' => xpressui_asset_url('front-step-2.png'),            'title' => 'Client portal flow',  'caption' => 'Clients move through a clear multi-step portal instead of sending everything across scattered emails.'],
  ['src' => xpressui_asset_url('front-step-3.png'),            'title' => 'Document upload',     'caption' => 'Collect briefs, assets, and required files in one structured intake flow.'],
  ['src' => xpressui_asset_url('admin-project-inbox.png'),     'title' => 'Submission inbox',    'caption' => 'Every submission lands in one operator workspace so nothing gets lost before kickoff.'],
  ['src' => xpressui_asset_url('admin-submission-detail.png'), 'title' => 'Submission review',   'caption' => 'Review answers, downloads, and project context in one screen before work starts.'],
];

$value_points = [
  'Launch hosted or client-site workflows for real business requests',
  'Collect files, structured answers, products, dates, and service choices in one flow',
  'Review submissions on the client site or Console instead of chasing email threads',
  'Use reusable catalogs so prices, slots, options, and members are not duplicated across workflows',
];

$compare_rows = [
  ['feature' => 'What it is',        'xpressui' => '<strong>Client intake delivery.</strong> Built for document intake, registrations, service requests, product choices, and operator review.', 'others' => '<strong>Single interaction.</strong> Useful for collecting input, but not designed as a full intake or operations flow.'],
  ['feature' => 'Dynamic data',      'xpressui' => '<strong>Reusable catalogs.</strong> Products, prices, service slots, dates, options, and members can be maintained outside each workflow.', 'others' => '<strong>Static choices.</strong> Lists often live inside each workflow and need manual updates across projects.'],
  ['feature' => 'Client-site fit',     'xpressui' => '<strong>Theme-proof by design.</strong> UI stays consistent without fighting theme CSS on every project.', 'others' => '<strong>Theme-dependent.</strong> Styling often needs extra overrides or custom fixes.'],
  ['feature' => 'Best use case',     'xpressui' => '<strong>Agencies and service teams.</strong> Best when you repeatedly collect structured requests, documents, bookings, or catalog-driven choices.', 'others' => '<strong>Generic collection.</strong> Best when you only need a simple one-off request.'],
];

$catalog_cards = [
  ['title' => 'Products and options', 'body' => 'Keep SKUs, prices, quantities, and selectable options in a reusable catalog instead of copying choices into every workflow.'],
  ['title' => 'Services and slots', 'body' => 'Publish available services, dates, capacities, and booking choices so operators can review requests with context.'],
  ['title' => 'Members and lists', 'body' => 'Reuse member, subscriber, or client lists when a workflow needs verification or a known audience.'],
];

$use_cases = [
  ['title' => 'Document intake', 'body' => 'Collect files, missing information, and approvals before an operator starts review.'],
  ['title' => 'Service requests', 'body' => 'Route one branded request form into a repeatable review path with status and follow-up.'],
  ['title' => 'Catalog orders', 'body' => 'Let clients choose products, quantities, prices, or options without hardcoding lists in the form.'],
  ['title' => 'Reservations', 'body' => 'Expose dates, slots, capacities, and exceptions without rebuilding the workflow every month.'],
];

$done_for_you_cards = [
  ['title' => 'Hosted workflow setup', 'price' => 'from €299 setup', 'body' => 'We configure one branded hosted workflow with operator email and a generated document summary.'],
  ['title' => 'Client-site delivery', 'price' => 'from €790 setup', 'body' => 'We install IntakeFlow Starter, configure the workflow, test submissions, and hand it over with a short walkthrough.'],
  ['title' => 'Agency pilot', 'price' => '3 months guided', 'body' => 'For agencies with complex forms, we help ship the first client workflow and turn the result into a repeatable offer.'],
];

$workflow_steps = [
  ['num' => '01', 'title' => 'Install IntakeFlow Free', 'body' => 'Download IntakeFlow Free and activate it on your site in a few minutes.'],
  ['num' => '02', 'title' => 'Install a workflow', 'body' => 'Use the bundled starter or upload a workflow pack exported from the Console. Upgrade to Starter when you want Console Sync and advanced customization.'],
  ['num' => '03', 'title' => 'Collect everything cleanly', 'body' => 'Clients submit files and answers in one place, and your team reviews it on client sites.'],
];

$faq_items = [
  ['q' => 'What is IntakeFlow?', 'a' => 'IntakeFlow is a client intake portal system: private links, guided document upload, dynamic choices, and operator review in one delivery path.'],
  ['q' => 'Can I start for free?', 'a' => 'Yes. IntakeFlow Free includes the client-site runtime, a bundled document intake workflow, and custom workflow ZIP installation so you can test the setup on a real site.'],
  ['q' => 'What is IntakeFlow Starter?', 'a' => 'IntakeFlow Starter is the fastest path to production today: plugin install, workflow setup, and submission review directly in the client-site admin.'],
  ['q' => 'What is IntakeFlow Cloud?', 'a' => 'IntakeFlow Cloud is the next delivery path for teams that want IntakeFlow to host the public workflow link, submissions inbox, files, catalogs, and operator review outside a client site. Cloud PRO starts at €39/month, and Cloud ENTERPRISE is €149/month.'],
  ['q' => 'When should I get Starter?', 'a' => 'Upgrade when you want advanced field types, Customize Workflow in the client-site admin, direct Console Sync, commercial updates, and the full Starter runtime.'],
  ['q' => 'Who is it for?', 'a' => 'It fits agencies, operators, and service teams that repeatedly collect client files, briefs, and onboarding information.'],
];

get_header();
?>

<div class="iak-xpressui-page font-sans text-gray-900 antialiased">

  <section class="bg-gradient-to-b from-white via-blue-50/40 to-white py-20 px-4 sm:px-6 lg:px-8 border-b border-gray-100">
    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-10 items-center xpressui-hero-shell">
      <div class="lg:col-span-6 text-center lg:text-left">
        <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-4">Client intake portals for agencies and service teams</p>
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight text-gray-900 mb-6 leading-tight">
          Build client intake portals without stitching together plugins, storage, and review screens.
        </h1>
        <p class="text-lg sm:text-xl text-gray-500 mb-8 leading-relaxed">
          IntakeFlow gives agencies and service teams one delivery system for private intake links, document upload, dynamic choices, and operator review. Use it on client WordPress sites or host the workflow with IntakeFlow Cloud.
        </p>
        <div class="flex flex-col sm:flex-row justify-center lg:justify-start gap-4 mb-8">
          <a href="<?php echo esc_url(home_url('/document-intake/')); ?>"
             class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition shadow-lg shadow-blue-500/30">
            Try live intake →
          </a>
          <a href="<?php echo esc_url(home_url('/pricing/')); ?>"
             class="bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-bold py-4 px-8 rounded-lg transition">
            See pricing
          </a>
        </div>
        <div class="xpressui-hero-points flex flex-wrap justify-center lg:justify-start gap-x-3 gap-y-3 text-sm text-gray-500">
          <?php foreach (['Private intake links', 'Guided uploads', 'Operator inbox', 'WordPress or Cloud'] as $point): ?>
          <span class="inline-flex items-center rounded-full border border-blue-100 bg-white/90 px-4 py-2 shadow-sm"><?php echo esc_html($point); ?></span>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="lg:col-span-6">
        <div class="rounded-3xl overflow-hidden shadow-2xl border border-gray-200 bg-white ring-1 ring-black/5">
          <img src="<?php echo esc_url(xpressui_asset_url('front-step-2.png')); ?>" alt="IntakeFlow client intake portal" class="w-full h-auto object-cover object-top">
        </div>
        <div class="mt-4 flex flex-col sm:flex-row gap-3 justify-center lg:justify-end text-sm">
          <a href="<?php echo esc_url($demo_video_url); ?>" target="_blank" rel="noreferrer" class="text-blue-600 font-semibold hover:underline">Open video</a>
          <span class="hidden sm:inline text-gray-300">•</span>
          <span class="text-gray-500">Portal, file collection, and admin review in one flow.</span>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-white py-16 px-4 sm:px-6 lg:px-8 border-b border-gray-100">
    <div class="max-w-6xl mx-auto">
      <div class="max-w-3xl mx-auto text-center mb-10">
        <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3">First workflows to sell</p>
        <h2 class="text-3xl font-bold text-gray-900 mb-4">Start with the processes that already create manual follow-up.</h2>
        <p class="text-gray-600 leading-relaxed">
          IntakeFlow is easiest to sell when the buyer already feels the pain: missing files, outdated lists, unclear requests, or schedule changes.
        </p>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <?php foreach ($use_cases as $case): ?>
        <article class="rounded-2xl border border-gray-100 bg-gray-50 p-5">
          <h3 class="font-bold text-gray-900 mb-2"><?php echo esc_html($case['title']); ?></h3>
          <p class="text-sm text-gray-600 leading-relaxed"><?php echo esc_html($case['body']); ?></p>
        </article>
        <?php endforeach; ?>
      </div>
      <div class="mt-8 text-center">
        <a href="<?php echo esc_url($agency_pilot_url); ?>" class="inline-flex justify-center rounded-lg bg-blue-600 px-6 py-3 text-sm font-bold text-white shadow-lg shadow-blue-500/20 transition hover:bg-blue-700">
          Pick one pilot workflow
        </a>
      </div>
    </div>
  </section>

  <section class="bg-blue-50/50 border-t border-b border-blue-100 py-20 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
      <div class="max-w-3xl mx-auto text-center mb-12">
        <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3">Dynamic catalogs</p>
        <h2 class="text-3xl font-bold text-gray-900 mb-4">Your workflows should not be full of static lists.</h2>
        <p class="text-gray-600 leading-relaxed">Products, prices, service slots, dates, options, and members become reusable data your team can maintain once and connect to multiple workflows.</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <?php foreach ($catalog_cards as $card): ?>
        <article class="bg-white rounded-2xl border border-blue-100 p-7 shadow-sm">
          <h3 class="text-xl font-bold text-gray-900 mb-3"><?php echo esc_html($card['title']); ?></h3>
          <p class="text-sm text-gray-600 leading-relaxed"><?php echo esc_html($card['body']); ?></p>
        </article>
        <?php endforeach; ?>
      </div>
      <p class="text-center text-sm text-gray-500 mt-8">Best for agencies and teams replacing spreadsheets, duplicated choice lists, and manually maintained prices or schedules.</p>
    </div>
  </section>

  <section class="bg-white py-20 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
      <div class="max-w-3xl mx-auto text-center mb-12">
        <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3">Done For You</p>
        <h2 class="text-3xl font-bold text-gray-900 mb-4">Want the first workflow live quickly?</h2>
        <p class="text-gray-600 leading-relaxed">We can configure the first workflow with you, test it, and leave you with a reusable pattern for the next client or service.</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <?php foreach ($done_for_you_cards as $card): ?>
        <article class="bg-gray-50 rounded-2xl border border-gray-100 p-7 shadow-sm flex flex-col">
          <p class="text-sm font-bold text-blue-600 mb-2"><?php echo esc_html($card['price']); ?></p>
          <h3 class="text-xl font-bold text-gray-900 mb-3"><?php echo esc_html($card['title']); ?></h3>
          <p class="text-sm text-gray-600 leading-relaxed flex-1"><?php echo esc_html($card['body']); ?></p>
        </article>
        <?php endforeach; ?>
      </div>
      <div class="text-center mt-10">
        <a href="<?php echo esc_url($agency_pilot_url); ?>" class="inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition shadow-lg shadow-blue-500/30">
          Request a setup call
        </a>
      </div>
    </div>
  </section>

  <section class="bg-white py-20 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
      <div>
        <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3">Why it converts better</p>
        <h2 class="text-3xl font-bold text-gray-900 mb-4">You do not need another inbox full of attachments. You need a guided intake system.</h2>
        <p class="text-gray-500 leading-relaxed">Most onboarding starts badly: missing files, vague briefs, and too many follow-up emails. IntakeFlow replaces that chaos with a clear portal your client can actually complete in one sitting.</p>
      </div>
      <ul class="space-y-4 pt-2">
        <?php foreach ($value_points as $point): ?>
        <li class="flex items-start gap-4">
          <div class="flex-shrink-0 h-6 w-6 rounded-full bg-blue-100 flex items-center justify-center mt-0.5">
            <svg class="h-4 w-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
          </div>
          <span class="text-gray-700 leading-relaxed"><?php echo esc_html($point); ?></span>
        </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </section>

  <section class="bg-gray-50 border-t border-gray-100 py-20 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3 text-center">How it works</p>
      <h2 class="text-3xl font-bold text-gray-900 mb-4 text-center">A cleaner start for every client project.</h2>
      <p class="text-gray-500 text-center mb-12 max-w-2xl mx-auto">The key screens are already there, so you can move faster without stitching together a fragile onboarding flow from generic plugins.</p>
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <?php foreach ($gallery_shots as $shot): ?>
        <button
          type="button"
          class="group bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm hover:shadow-md transition-shadow text-left"
          data-lightbox-src="<?php echo esc_attr($shot['src']); ?>"
          data-lightbox-title="<?php echo esc_attr($shot['title']); ?>"
          data-lightbox-caption="<?php echo esc_attr($shot['caption']); ?>"
        >
          <div class="aspect-video bg-gray-100 overflow-hidden">
            <img src="<?php echo esc_attr($shot['src']); ?>" alt="<?php echo esc_attr($shot['title']); ?>" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-300">
          </div>
          <div class="p-5">
            <h3 class="font-bold text-gray-900 mb-1"><?php echo esc_html($shot['title']); ?></h3>
            <p class="text-sm text-gray-500 leading-relaxed"><?php echo esc_html($shot['caption']); ?></p>
          </div>
        </button>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="bg-white py-20 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
      <div class="bg-blue-50/60 border border-blue-100 rounded-2xl p-8 shadow-sm xpressui-audience-card">
        <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3">For agencies</p>
        <h3 class="text-2xl font-bold text-gray-900 mb-4">Package it as a premium onboarding feature.</h3>
        <p class="text-gray-600 leading-relaxed">Turn a messy kickoff into a cleaner client experience you can actually sell as part of your client-site delivery.</p>
      </div>
      <div class="bg-white border border-gray-100 rounded-2xl p-8 shadow-sm xpressui-audience-card">
        <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3">For freelancers</p>
        <h3 class="text-2xl font-bold text-gray-900 mb-4">Save hours on follow-ups.</h3>
        <p class="text-gray-600 leading-relaxed">Get the right files, the right answers, and the right context before the build starts instead of chasing details afterward.</p>
      </div>
      <div class="bg-gray-50 border border-gray-100 rounded-2xl p-8 shadow-sm xpressui-audience-card">
        <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3">For teams</p>
        <h3 class="text-2xl font-bold text-gray-900 mb-4">Keep everything on the client site.</h3>
        <p class="text-gray-600 leading-relaxed">Your team reviews submissions, tracks status, and downloads project files without moving between disconnected tools.</p>
      </div>
    </div>
  </section>

  <section class="bg-gray-50 border-t border-gray-100 py-20 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3 text-center">Simple rollout</p>
      <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">Three steps to a live portal.</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <?php foreach ($workflow_steps as $step): ?>
        <div class="bg-white rounded-2xl border border-gray-100 p-8 shadow-sm xpressui-step-card">
          <span class="text-4xl font-extrabold text-blue-600 block mb-4"><?php echo esc_html($step['num']); ?></span>
          <h3 class="text-xl font-bold text-gray-900 mb-3"><?php echo esc_html($step['title']); ?></h3>
          <p class="text-gray-500 leading-relaxed text-sm"><?php echo esc_html($step['body']); ?></p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="bg-white py-20 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3 text-center">Why it stands out</p>
      <h2 class="text-3xl font-bold text-gray-900 mb-4 text-center">Built for intake, not scattered follow-up.</h2>
      <p class="text-gray-500 text-center mb-10 max-w-2xl mx-auto">IntakeFlow is aimed at the full client intake path: the private link, the guided upload, the submission status, and the operator review screen.</p>
      <div class="rounded-2xl border border-gray-100 overflow-hidden bg-white shadow-sm xpressui-compare-table">
        <div class="grid bg-gray-50 border-b border-gray-100" style="grid-template-columns:140px 1fr 1fr">
          <div class="py-3 px-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Feature</div>
          <div class="py-3 px-4 text-xs font-bold text-blue-600 border-l border-gray-100 uppercase tracking-wider">IntakeFlow</div>
          <div class="py-3 px-4 text-xs font-bold text-gray-500 border-l border-gray-100 uppercase tracking-wider">Generic collection tools</div>
        </div>
        <?php foreach ($compare_rows as $i => $row): $is_last = ($i === count($compare_rows) - 1); ?>
        <div class="grid items-start <?php echo $is_last ? '' : 'border-b border-gray-100'; ?>" style="grid-template-columns:140px 1fr 1fr">
          <div class="py-4 px-4 text-sm font-bold text-gray-900"><?php echo esc_html($row['feature']); ?></div>
          <div class="py-4 px-4 text-sm text-gray-600 leading-relaxed border-l border-gray-100"><?php echo wp_kses_post($row['xpressui']); ?></div>
          <div class="py-4 px-4 text-sm text-gray-600 leading-relaxed border-l border-gray-100"><?php echo wp_kses_post($row['others']); ?></div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="bg-gray-50 border-t border-gray-100 py-20 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3 text-center">Plans</p>
      <h2 class="text-3xl font-bold text-gray-900 mb-4 text-center">Start with IntakeFlow Starter now. Move to hosted when operations need to scale.</h2>
      <p class="text-gray-500 text-center mb-10">Launch quickly with IntakeFlow Free, upgrade to IntakeFlow Starter for production client-site delivery, then add IntakeFlow Cloud PRO when you want IntakeFlow to manage links, inbox, files, quotas, and team review.</p>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <article class="bg-white rounded-2xl border border-gray-100 p-8 flex flex-col shadow-sm">
          <span class="inline-block px-3 py-1 rounded-full bg-gray-100 text-xs font-bold text-gray-600 uppercase tracking-wider mb-4 w-fit">IntakeFlow Free</span>
          <h3 class="text-xl font-bold text-gray-900 mb-2">Ship the intake workflow on client sites</h3>
          <div class="flex items-baseline gap-2 mb-6">
            <span class="text-4xl font-extrabold text-gray-900">€0</span>
            <span class="text-gray-500 text-sm">free entry path</span>
          </div>
          <ul class="space-y-3 mb-8 flex-1">
            <?php foreach (['Bundled document intake workflow', 'Custom workflow ZIP installation', 'Submission inbox on the client site', 'File uploads and review screens'] as $item): ?>
            <li class="flex items-start gap-3 text-sm text-gray-600">
              <svg class="h-5 w-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
              <?php echo esc_html($item); ?>
            </li>
            <?php endforeach; ?>
          </ul>
          <a href="<?php echo esc_url($download_url); ?>" target="_blank" rel="noreferrer"
             class="block text-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition">
            Start with IntakeFlow Free
          </a>
        </article>
        <article class="bg-gray-900 rounded-2xl border border-gray-800 p-8 flex flex-col shadow-sm">
          <span class="inline-block px-3 py-1 rounded-full bg-blue-600 text-xs font-bold text-white uppercase tracking-wider mb-4 w-fit">Cloud PRO</span>
          <h3 class="text-xl font-bold text-white mb-2">Let IntakeFlow host the workflow and operations inbox</h3>
          <div class="flex items-baseline gap-2 mb-6">
            <span class="text-4xl font-extrabold text-white">€39</span>
            <span class="text-gray-400 text-sm">/month</span>
          </div>
          <ul class="space-y-3 mb-8 flex-1">
            <?php foreach (['Publish hosted public submission links', 'Operate submissions and files from Console', 'Use workspace quotas and audit trail', 'Add team review without sharing client-site access'] as $item): ?>
            <li class="flex items-start gap-3 text-sm text-gray-300">
              <svg class="h-5 w-5 text-blue-400 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
              <?php echo esc_html($item); ?>
            </li>
            <?php endforeach; ?>
          </ul>
          <a href="<?php echo esc_url($contact_url); ?>"
             class="block text-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition">
            Discuss Cloud plan →
          </a>
        </article>
      </div>
    </div>
  </section>

  <section class="bg-white py-20 px-4 sm:px-6 lg:px-8 border-t border-gray-100">
    <div class="max-w-4xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3 text-center">FAQ</p>
      <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">Questions people ask before trying it.</h2>
      <div class="space-y-4">
        <?php foreach ($faq_items as $item): ?>
        <div class="bg-gray-50 border border-gray-100 rounded-2xl p-6 xpressui-faq-card">
          <h3 class="text-lg font-bold text-gray-900 mb-2"><?php echo esc_html($item['q']); ?></h3>
          <p class="text-gray-600 leading-relaxed"><?php echo esc_html($item['a']); ?></p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="bg-gray-900 py-24 px-4 sm:px-6 lg:px-8 text-center">
    <div class="max-w-2xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-400 uppercase mb-4">Ready to launch your first intake portal?</p>
      <h2 class="text-3xl font-extrabold text-white mb-4">Give your next client project a better start.</h2>
      <p class="text-gray-400 mb-10">Start with IntakeFlow Free, then discuss the hosted or client-site path once the first workflow is clear.</p>
      <div class="flex flex-col sm:flex-row justify-center gap-4">
        <a href="<?php echo esc_url($contact_url); ?>"
           class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition shadow-lg shadow-blue-500/30">
          Discuss Cloud plan →
        </a>
        <a href="<?php echo esc_url($download_url); ?>" target="_blank" rel="noreferrer"
           class="bg-white/10 border border-white/20 hover:bg-white/20 text-white font-bold py-4 px-8 rounded-lg transition">
          Download IntakeFlow Free
        </a>
      </div>
    </div>
  </section>

</div>

<div id="xpressui-lightbox" class="fixed inset-0 bg-black/80 z-50 items-center justify-center p-4" style="display:none">
  <button id="lightbox-close" type="button" class="absolute top-4 right-4 text-white/70 hover:text-white text-sm font-bold bg-white/10 hover:bg-white/20 px-4 py-2 rounded-lg transition">Close</button>
  <figure id="lightbox-content" class="max-w-4xl w-full bg-white rounded-2xl overflow-hidden shadow-2xl">
    <img id="lightbox-img" src="" alt="" class="w-full h-auto">
    <figcaption class="p-5">
      <strong id="lightbox-title" class="block font-bold text-gray-900 mb-1"></strong>
      <span id="lightbox-caption" class="text-sm text-gray-500"></span>
    </figcaption>
  </figure>
</div>

<script>
(function () {
  var lb = document.getElementById('xpressui-lightbox');
  var lbImg = document.getElementById('lightbox-img');
  var lbTitle = document.getElementById('lightbox-title');
  var lbCaption = document.getElementById('lightbox-caption');

  document.querySelectorAll('[data-lightbox-src]').forEach(function (btn) {
    btn.addEventListener('click', function () {
      lbImg.src = btn.dataset.lightboxSrc;
      lbImg.alt = btn.dataset.lightboxTitle;
      lbTitle.textContent = btn.dataset.lightboxTitle;
      lbCaption.textContent = btn.dataset.lightboxCaption;
      lb.style.display = 'flex';
    });
  });

  lb.addEventListener('click', function () { lb.style.display = 'none'; });
  document.getElementById('lightbox-close').addEventListener('click', function (e) {
    e.stopPropagation();
    lb.style.display = 'none';
  });
  document.getElementById('lightbox-content').addEventListener('click', function (e) {
    e.stopPropagation();
  });
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') lb.style.display = 'none';
  });
})();
</script>

<?php get_footer(); ?>
