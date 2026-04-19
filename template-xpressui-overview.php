<?php
/**
 * Template Name: Document Intake — Overview
 *
 * Main promo/sales page for Document Intake for WordPress.
 */

$download_url  = 'https://github.com/lybaba/xpressui-packages/releases/latest';
$repo_url      = 'https://github.com/lybaba/xpressui-packages';
$console_url   = 'https://xpressui.iakpress.com/console/';
$contact_url   = home_url('/contact/');
$demo_video_url = 'https://www.youtube.com/watch?v=tXjWmTetHpQ';
$demo_embed_url = 'https://www.youtube.com/embed/tXjWmTetHpQ';

$gallery_shots = [
  ['src' => xpressui_asset_url('front-step-2.png'),            'title' => 'Guided intake',     'caption' => 'Clients move through a focused multi-step flow instead of dumping everything into email.'],
  ['src' => xpressui_asset_url('front-step-3.png'),            'title' => 'File collection',   'caption' => 'Drag-and-drop uploads help you collect documents and assets before kickoff.'],
  ['src' => xpressui_asset_url('admin-project-inbox.png'),     'title' => 'Operator inbox',    'caption' => 'New submissions land in one WordPress workspace, not across multiple inboxes.'],
  ['src' => xpressui_asset_url('admin-submission-detail.php'), 'title' => 'Submission detail', 'caption' => 'Review answers, downloads, and notes in one screen when you start the project.'],
];

$value_points = [
  'Multi-step client intake that feels polished out of the box',
  'WordPress bridge plugin and shortcode flow included',
  'File uploads, structured answers, and admin review screens',
  'Open source plugin available to download on GitHub',
];

$compare_rows = [
  ['feature' => 'CSS Styling',  'xpressui' => '<strong>Theme-Proof by design.</strong> CSS is strictly scoped, preventing conflicts with your WordPress theme. Saves hours of debugging.',        'others' => '<strong>Theme-dependent.</strong> Often requires many CSS overrides to fix styling conflicts with themes like Elementor/Divi.'],
  ['feature' => 'Architecture', 'xpressui' => '<strong>Decoupled.</strong> A lightweight WordPress plugin connects to a fast, modern visual builder. Keeps your wp-admin clean.',                'others' => '<strong>Monolithic.</strong> The builder lives inside WordPress, which can become heavy and slow down your admin dashboard.'],
  ['feature' => 'Performance',  'xpressui' => '<strong>Lightweight &amp; Fast.</strong> Renders natively with a tiny vanilla JS runtime. No React on the frontend.',                           'others' => '<strong>Can be heavy.</strong> Performance can degrade with many add-ons, impacting page load speed and user experience.'],
  ['feature' => 'Best For',     'xpressui' => '<strong>Structured Client Portals.</strong> Ideal for professional onboarding, document collection, and multi-step workflows.',                   'others' => '<strong>General-Purpose Forms.</strong> A powerful and flexible tool for a wide variety of forms, from simple contact forms to complex surveys.'],
];

get_header();
?>

<div class="font-sans text-gray-900 antialiased">

  <!-- Hero -->
  <section class="bg-white py-24 px-4 sm:px-6 lg:px-8 text-center border-b border-gray-100">
    <div class="max-w-4xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-4">Document Intake for WordPress</p>
      <h1 class="text-5xl md:text-6xl font-extrabold tracking-tight text-gray-900 mb-6 leading-tight">
        Collect briefs, files, and project requirements in one WordPress intake flow.
      </h1>
      <p class="text-xl text-gray-500 mb-10 max-w-2xl mx-auto leading-relaxed">
        Built for freelancers and agencies. Replaces scattered kickoff emails with a polished multi-step client intake, file uploads, and admin-side review inside WordPress.
      </p>
      <div class="flex flex-col sm:flex-row justify-center gap-4 mb-8">
        <a href="<?php echo esc_url($download_url); ?>" target="_blank" rel="noreferrer"
           class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition shadow-lg shadow-blue-500/30">
          Download the plugin →
        </a>
        <a href="<?php echo esc_url(home_url('/pro/')); ?>"
           class="bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-bold py-4 px-8 rounded-lg transition">
          Get Pro →
        </a>
      </div>
      <div class="flex flex-wrap justify-center gap-x-6 gap-y-2 text-sm text-gray-400">
        <?php foreach (['Built for freelancers and agencies', 'No custom rebuild required', 'Includes WordPress admin review flow', 'Install in minutes'] as $point): ?>
        <span><?php echo esc_html($point); ?></span>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Demo video -->
  <section class="bg-gray-50 border-b border-gray-100 py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3 text-center">See the workflow</p>
      <div class="rounded-2xl overflow-hidden shadow-sm border border-gray-100 aspect-video">
        <iframe
          src="<?php echo esc_url($demo_embed_url); ?>"
          title="Document Intake for WordPress demo video"
          loading="lazy"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          referrerpolicy="strict-origin-when-cross-origin"
          allowfullscreen
          class="w-full h-full"
        ></iframe>
      </div>
    </div>
  </section>

  <!-- Value band -->
  <section class="bg-white py-20 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
      <div>
        <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3">Why teams use it</p>
        <h2 class="text-3xl font-bold text-gray-900 mb-4">It removes the slowest part of many client projects: the chaotic start.</h2>
        <p class="text-gray-500 leading-relaxed">Most kickoffs involve 3–5 scattered emails over several days. This replaces them with a single focused flow your client completes in one sitting — and you review everything in one place inside WordPress.</p>
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

  <!-- Screenshot gallery -->
  <section class="bg-gray-50 border-t border-gray-100 py-20 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3 text-center">What it looks like</p>
      <h2 class="text-3xl font-bold text-gray-900 mb-4 text-center">The important screens are already designed.</h2>
      <p class="text-gray-500 text-center mb-12 max-w-2xl mx-auto">Use the included intake flow, upload states, and WordPress review screens instead of assembling the experience from generic plugins.</p>
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

  <!-- Inside the plugin / Best fit -->
  <section class="bg-white py-20 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8">
      <div class="bg-blue-50/50 border border-blue-100 rounded-2xl p-8 md:p-10">
        <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3">Inside the plugin</p>
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Everything needed to ship the workflow quickly.</h2>
        <ul class="space-y-4">
          <?php foreach (['Client-facing multi-step intake page', 'File upload flow for project documents and assets', 'WordPress bridge plugin and package upload flow', 'Admin inbox and submission detail screens', 'Shortcode-based embedding and setup docs'] as $item): ?>
          <li class="flex items-start gap-3">
            <svg class="h-5 w-5 text-blue-600 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            <span class="text-gray-700 text-sm leading-relaxed"><?php echo esc_html($item); ?></span>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="bg-gray-50 border border-gray-100 rounded-2xl p-8 md:p-10">
        <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3">Best fit</p>
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Built for people who onboard clients repeatedly.</h2>
        <ul class="space-y-4 mb-6">
          <?php foreach (['Freelancers building WordPress sites', 'Agencies that want a cleaner kickoff process', 'Service teams collecting briefs and files before work starts'] as $item): ?>
          <li class="flex items-start gap-3">
            <svg class="h-5 w-5 text-gray-400 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            <span class="text-gray-700 text-sm leading-relaxed"><?php echo esc_html($item); ?></span>
          </li>
          <?php endforeach; ?>
        </ul>
        <a href="<?php echo esc_url($contact_url); ?>" class="text-sm font-bold text-blue-600 hover:text-blue-800 transition">Talk to us about your setup →</a>
      </div>
    </div>
  </section>

  <!-- Process steps -->
  <section class="bg-gray-50 border-t border-gray-100 py-20 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3 text-center">Simple rollout</p>
      <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">Three steps to a live intake page.</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <?php foreach ([
          ['num' => '01', 'title' => 'Download the plugin',   'body' => 'Get the latest release from <a href="' . esc_url($repo_url) . '" target="_blank" rel="noreferrer" class="text-blue-600 hover:underline">GitHub</a> and upload it to WordPress.'],
          ['num' => '02', 'title' => 'Embed with shortcode',  'body' => 'Paste <code class="bg-gray-100 px-1 rounded text-sm font-mono">[xpressui id="document-intake"]</code> on any page — the bundled workflow is ready immediately.'],
          ['num' => '03', 'title' => 'Review submissions',    'body' => 'New submissions land in wp-admin with status tracking, team assignment, and file downloads built in.'],
        ] as $step): ?>
        <div class="bg-white rounded-2xl border border-gray-100 p-8 shadow-sm">
          <span class="text-4xl font-extrabold text-blue-600 block mb-4"><?php echo esc_html($step['num']); ?></span>
          <h3 class="text-xl font-bold text-gray-900 mb-3"><?php echo esc_html($step['title']); ?></h3>
          <p class="text-gray-500 leading-relaxed text-sm"><?php echo wp_kses_post($step['body']); ?></p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Comparison table -->
  <section class="bg-white py-20 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3 text-center">How it's different</p>
      <h2 class="text-3xl font-bold text-gray-900 mb-4 text-center">XPressUI vs. Gravity Forms</h2>
      <p class="text-gray-500 text-center mb-10 max-w-2xl mx-auto">Gravity Forms is a fantastic general-purpose form builder. XPressUI is different by design: a specialized tool for complex, theme-proof intake workflows.</p>
      <div class="rounded-2xl border border-gray-100 overflow-hidden bg-white shadow-sm">
        <div class="grid bg-gray-50 border-b border-gray-100" style="grid-template-columns:140px 1fr 1fr">
          <div class="py-3 px-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Feature</div>
          <div class="py-3 px-4 text-xs font-bold text-blue-600 border-l border-gray-100 uppercase tracking-wider">XPressUI</div>
          <div class="py-3 px-4 text-xs font-bold text-gray-500 border-l border-gray-100 uppercase tracking-wider">Gravity Forms / Others</div>
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

  <!-- Pricing cards -->
  <section class="bg-gray-50 border-t border-gray-100 py-20 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3 text-center">Get started</p>
      <h2 class="text-3xl font-bold text-gray-900 mb-4 text-center">Free to use. Pro when you need more.</h2>
      <p class="text-gray-500 text-center mb-10">Start with the open-source plugin at no cost. Upgrade to Pro for the visual workflow builder and priority support.</p>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <article class="bg-white rounded-2xl border border-gray-100 p-8 flex flex-col shadow-sm">
          <span class="inline-block px-3 py-1 rounded-full bg-gray-100 text-xs font-bold text-gray-600 uppercase tracking-wider mb-4 w-fit">Free</span>
          <h3 class="text-xl font-bold text-gray-900 mb-2">Open source plugin</h3>
          <div class="flex items-baseline gap-2 mb-6">
            <span class="text-4xl font-extrabold text-gray-900">€0</span>
            <span class="text-gray-500 text-sm">available on GitHub</span>
          </div>
          <ul class="space-y-3 mb-8 flex-1">
            <?php foreach (['Bundled Document Intake workflow', 'WordPress submission inbox', 'File uploads & admin review screens'] as $item): ?>
            <li class="flex items-start gap-3 text-sm text-gray-600">
              <svg class="h-5 w-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
              <?php echo esc_html($item); ?>
            </li>
            <?php endforeach; ?>
          </ul>
          <a href="<?php echo esc_url($download_url); ?>" target="_blank" rel="noreferrer"
             class="block text-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition">
            Download the plugin
          </a>
        </article>
        <article class="bg-gray-900 rounded-2xl border border-gray-800 p-8 flex flex-col shadow-sm">
          <span class="inline-block px-3 py-1 rounded-full bg-blue-600 text-xs font-bold text-white uppercase tracking-wider mb-4 w-fit">Pro</span>
          <h3 class="text-xl font-bold text-white mb-2">Visual workflow builder</h3>
          <div class="flex items-baseline gap-2 mb-6">
            <span class="text-4xl font-extrabold text-white">€49</span>
            <span class="text-gray-400 text-sm">one-time · lifetime · 5 sites</span>
          </div>
          <ul class="space-y-3 mb-8 flex-1">
            <?php foreach (['Everything in Free', 'Custom workflow builder & pack install', 'Advanced field types & design tokens', 'Priority email support'] as $item): ?>
            <li class="flex items-start gap-3 text-sm text-gray-300">
              <svg class="h-5 w-5 text-blue-400 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
              <?php echo esc_html($item); ?>
            </li>
            <?php endforeach; ?>
          </ul>
          <a href="<?php echo esc_url(home_url('/pro/')); ?>"
             class="block text-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition">
            Get Pro — €49 →
          </a>
        </article>
      </div>
      <p class="text-center mt-6">
        <a href="<?php echo esc_url(home_url('/pricing/')); ?>" class="text-sm font-bold text-blue-600 hover:text-blue-800 transition">See full feature comparison →</a>
      </p>
    </div>
  </section>

  <!-- Final CTA -->
  <section class="bg-gray-900 py-24 px-4 sm:px-6 lg:px-8 text-center">
    <div class="max-w-2xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-400 uppercase mb-4">Ready to try it?</p>
      <h2 class="text-3xl font-extrabold text-white mb-4">Give your next project a better start.</h2>
      <p class="text-gray-400 mb-10">Download the plugin from GitHub and have it running in 30 minutes.</p>
      <div class="flex flex-col sm:flex-row justify-center gap-4">
        <a href="<?php echo esc_url($download_url); ?>" target="_blank" rel="noreferrer"
           class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition shadow-lg shadow-blue-500/30">
          Download the plugin →
        </a>
        <a href="<?php echo esc_url($repo_url); ?>" target="_blank" rel="noreferrer"
           class="bg-white/10 border border-white/20 hover:bg-white/20 text-white font-bold py-4 px-8 rounded-lg transition">
          View on GitHub
        </a>
      </div>
    </div>
  </section>

</div>

<!-- Lightbox -->
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
