<?php
/**
 * Template Name: Document Intake — Overview
 *
 * Main promo/sales page for Document Intake for WordPress.
 */

$xpressui_active_route = '';
$download_url  = 'https://github.com/lybaba/xpressui-wordpress-bridge/releases/latest';
$repo_url      = 'https://github.com/lybaba/xpressui-wordpress-bridge';
$console_url   = 'https://xpressui.iakpress.com/console/';
$contact_url   = home_url( '/contact/' );
$demo_video_url = 'https://www.youtube.com/watch?v=tXjWmTetHpQ';
$demo_embed_url = 'https://www.youtube.com/embed/tXjWmTetHpQ';

$gallery_shots = [
  ['src' => xpressui_asset_url( 'front-step-2.png' ),            'title' => 'Guided intake',       'caption' => 'Clients move through a focused multi-step flow instead of dumping everything into email.'],
  ['src' => xpressui_asset_url( 'front-step-3.png' ),            'title' => 'File collection',     'caption' => 'Drag-and-drop uploads help you collect documents and assets before kickoff.'],
  ['src' => xpressui_asset_url( 'admin-project-inbox.png' ),     'title' => 'Operator inbox',      'caption' => 'New submissions land in one WordPress workspace, not across multiple inboxes.'],
  ['src' => xpressui_asset_url( 'admin-submission-detail.png' ), 'title' => 'Submission detail',   'caption' => 'Review answers, downloads, and notes in one screen when you start the project.'],
];

$value_points = [
  'Multi-step client intake that feels polished out of the box',
  'WordPress bridge plugin and shortcode flow included',
  'File uploads, structured answers, and admin review screens',
  'Open source plugin available to download on GitHub',
];

$trust_points = [
  'Built for freelancers and agencies',
  'No custom rebuild required',
  'Includes WordPress admin review flow',
  'Install in minutes',
];

$compare_rows = [
  ['feature' => 'CSS Styling',    'xpressui' => '<strong>Theme-Proof by design.</strong> CSS is strictly scoped, preventing conflicts with your WordPress theme. Saves hours of debugging.',         'others' => '<strong>Theme-dependent.</strong> Often requires many CSS overrides to fix styling conflicts with themes like Elementor/Divi.'],
  ['feature' => 'Architecture',   'xpressui' => '<strong>Decoupled.</strong> A lightweight WordPress plugin connects to a fast, modern visual builder. Keeps your wp-admin clean.',                 'others' => '<strong>Monolithic.</strong> The builder lives inside WordPress, which can become heavy and slow down your admin dashboard.'],
  ['feature' => 'Performance',    'xpressui' => '<strong>Lightweight &amp; Fast.</strong> Renders natively with a tiny vanilla JS runtime. No React on the frontend.',                            'others' => '<strong>Can be heavy.</strong> Performance can degrade with many add-ons, impacting page load speed and user experience.'],
  ['feature' => 'Best For',       'xpressui' => '<strong>Structured Client Portals.</strong> Ideal for professional onboarding, document collection, and multi-step workflows.',                    'others' => '<strong>General-Purpose Forms.</strong> A powerful and flexible tool for a wide variety of forms, from simple contact forms to complex surveys.'],
];

get_header('xpressui');
?>

<div class="page-shell">

  <!-- Promo strip -->
  <section class="promo-strip">
    <div class="container promo-strip-inner">
      <span class="promo-strip-eyebrow">Free to download</span>
      <p>Free to download. Install on any WordPress site in minutes.</p>
      <a href="<?php echo esc_url($download_url); ?>" target="_blank" rel="noreferrer" class="promo-strip-link">Download the plugin</a>
    </div>
  </section>

  <!-- Hero -->
  <section class="hero-section">
    <div class="container hero-grid">
      <div class="hero-copy">
        <span class="hero-badge">Document Intake for WordPress</span>
        <h1>Collect briefs, files, and project requirements in one WordPress intake flow.</h1>
        <p class="hero-lead">
          Built for freelancers and agencies, this plugin replaces scattered kickoff emails with a polished multi-step client intake, file uploads, and admin-side review inside WordPress.
        </p>
        <div class="hero-actions">
          <a href="<?php echo esc_url($download_url); ?>" target="_blank" rel="noreferrer" class="btn btn-primary">Download the plugin →</a>
          <a href="<?php echo esc_url( home_url( '/pro/' ) ); ?>" class="btn btn-secondary">Get Pro →</a>
        </div>
        <div class="hero-trust-row">
          <?php foreach ($trust_points as $point): ?>
          <span><?php echo esc_html($point); ?></span>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="hero-stage">
        <div class="hero-stage-label">See the workflow</div>
        <button
          type="button"
          class="hero-image-button"
          data-lightbox-src="<?php echo esc_attr( xpressui_asset_url( 'hero-demo.webp' ) ); ?>"
          data-lightbox-title="Product walkthrough"
          data-lightbox-caption="A quick view of the front-end intake experience."
        >
          <img src="<?php echo esc_url( xpressui_asset_url( 'hero-demo.webp' ) ); ?>" alt="Document intake workflow preview">
        </button>
        <div class="demo-video-card">
          <div class="demo-video-header">
            <div>
              <strong>Watch the demo</strong>
              <span>See the intake flow and WordPress review experience in action.</span>
            </div>
            <a href="<?php echo esc_url($demo_video_url); ?>" target="_blank" rel="noreferrer" class="demo-video-link">Open on YouTube</a>
          </div>
          <div class="demo-video-frame">
            <iframe
              src="<?php echo esc_url($demo_embed_url); ?>"
              title="Document Intake for WordPress demo video"
              loading="lazy"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              referrerpolicy="strict-origin-when-cross-origin"
              allowfullscreen
            ></iframe>
          </div>
        </div>
        <div class="hero-stage-grid">
          <div>
            <strong>Client side</strong>
            <span>Clean multi-step flow with uploads and progress.</span>
          </div>
          <div>
            <strong>Admin side</strong>
            <span>Submission inbox, detail screens, and workflow control.</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <main class="container page-stack">

    <!-- Value band -->
    <section class="value-band">
      <div class="value-copy">
        <p class="section-kicker">Why teams use it</p>
        <h2>It removes the slowest part of many client projects: the chaotic start.</h2>
        <p>Most kickoffs involve 3–5 scattered emails over several days. This replaces them with a single focused flow your client completes in one sitting — and you review everything in one place inside WordPress.</p>
      </div>
      <div class="value-list">
        <?php foreach ($value_points as $point): ?>
        <div class="value-item">
          <span class="value-dot"></span>
          <span><?php echo esc_html($point); ?></span>
        </div>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- Screenshot gallery -->
    <section class="section-block">
      <div class="section-heading">
        <p class="section-kicker">What it looks like</p>
        <h2>The important screens are already designed.</h2>
        <p>Use the included intake flow, upload states, and WordPress review screens instead of assembling the experience from generic plugins.</p>
      </div>
      <div class="shot-grid">
        <?php foreach ($gallery_shots as $shot): ?>
        <button
          type="button"
          class="shot-card"
          data-lightbox-src="<?php echo esc_attr($shot['src']); ?>"
          data-lightbox-title="<?php echo esc_attr($shot['title']); ?>"
          data-lightbox-caption="<?php echo esc_attr($shot['caption']); ?>"
        >
          <div class="shot-frame"><img src="<?php echo esc_attr($shot['src']); ?>" alt="<?php echo esc_attr($shot['title']); ?>"></div>
          <div class="shot-copy">
            <h3><?php echo esc_html($shot['title']); ?></h3>
            <p><?php echo esc_html($shot['caption']); ?></p>
          </div>
        </button>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- Inside the plugin / Best fit -->
    <section class="section-block split-grid">
      <div class="panel">
        <p class="section-kicker">Inside the plugin</p>
        <h2>Everything needed to ship the workflow quickly.</h2>
        <ul class="check-list">
          <li>Client-facing multi-step intake page</li>
          <li>File upload flow for project documents and assets</li>
          <li>WordPress bridge plugin and package upload flow</li>
          <li>Admin inbox and submission detail screens</li>
          <li>Shortcode-based embedding and setup docs</li>
        </ul>
      </div>
      <div class="panel muted-panel">
        <p class="section-kicker">Best fit</p>
        <h2>Built for people who onboard clients repeatedly.</h2>
        <ul class="check-list check-list-neutral">
          <li>Freelancers building WordPress sites</li>
          <li>Agencies that want a cleaner kickoff process</li>
          <li>Service teams collecting briefs and files before work starts</li>
        </ul>
        <a href="<?php echo esc_url($contact_url); ?>" class="text-link">Talk to us about your setup</a>
      </div>
    </section>

    <!-- Process -->
    <section class="section-block process-strip">
      <div class="section-heading">
        <p class="section-kicker">Simple rollout</p>
        <h2>Three steps to a live intake page.</h2>
      </div>
      <div class="process-grid">
        <article class="process-card">
          <span class="process-number">01</span>
          <h3>Download the plugin</h3>
          <p>Get the latest release from <a href="<?php echo esc_url($repo_url); ?>" target="_blank" rel="noreferrer">GitHub</a> and upload it to WordPress.</p>
        </article>
        <article class="process-card">
          <span class="process-number">02</span>
          <h3>Embed with shortcode</h3>
          <p>Paste <code>[xpressui id="document-intake"]</code> on any page — the bundled workflow is ready immediately.</p>
        </article>
        <article class="process-card">
          <span class="process-number">03</span>
          <h3>Review submissions</h3>
          <p>New submissions land in wp-admin with status tracking, team assignment, and file downloads built in.</p>
        </article>
      </div>
    </section>

    <!-- Comparison table: XPressUI vs Gravity Forms -->
    <section class="section-block">
      <div class="section-heading">
        <p class="section-kicker">How it's different</p>
        <h2>XPressUI vs. Gravity Forms</h2>
        <p>Gravity Forms is a fantastic general-purpose form builder. XPressUI is different by design: a specialized tool for complex, theme-proof intake workflows that won't break when your client's theme updates.</p>
      </div>
      <div style="border:1px solid #e2e8f0;border-radius:18px;overflow:hidden;background:#fff;box-shadow:0 16px 34px rgba(18,32,51,0.05)">
        <div style="display:grid;grid-template-columns:1fr 2fr 2fr;background:#f8fafc;border-bottom:1px solid #e2e8f0">
          <div style="padding:12px 16px;font-size:.8rem;font-weight:700;color:#475569">Feature</div>
          <div style="padding:12px 16px;font-size:.8rem;font-weight:700;color:#475569;border-left:1px solid #e2e8f0">XPressUI</div>
          <div style="padding:12px 16px;font-size:.8rem;font-weight:700;color:#475569;border-left:1px solid #e2e8f0">Gravity Forms / Others</div>
        </div>
        <?php foreach ($compare_rows as $i => $row): $is_last = ($i === count($compare_rows) - 1); ?>
        <div style="display:grid;grid-template-columns:1fr 2fr 2fr;align-items:start;<?php echo $is_last ? '' : 'border-bottom:1px solid #e2e8f0'; ?>">
          <div style="padding:16px;font-size:.9rem;font-weight:600;color:#1e293b"><?php echo esc_html($row['feature']); ?></div>
          <div style="padding:16px;font-size:.9rem;line-height:1.6;color:#475569;border-left:1px solid #e2e8f0"><?php echo wp_kses_post($row['xpressui']); ?></div>
          <div style="padding:16px;font-size:.9rem;line-height:1.6;color:#475569;border-left:1px solid #e2e8f0"><?php echo wp_kses_post($row['others']); ?></div>
        </div>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- Pro promo band -->
    <div style="padding:24px 28px;border-radius:24px;background:linear-gradient(135deg,#05422f 0%,#0a7a5a 100%);display:flex;align-items:center;justify-content:space-between;gap:20px;flex-wrap:wrap;box-shadow:0 20px 48px rgba(5,66,47,0.25)">
      <div>
        <p style="margin:0 0 4px;font-size:.7rem;font-weight:800;text-transform:uppercase;letter-spacing:.1em;color:rgba(255,255,255,0.6)">XPressUI Pro</p>
        <p style="margin:0;font-size:1rem;font-weight:700;color:#ffffff">Need a fully custom workflow? Build any intake flow and export it to WordPress in one click.</p>
      </div>
      <a href="<?php echo esc_url( home_url( '/pro/' ) ); ?>" class="btn" style="background:#ffffff;color:#05422f;font-weight:800;white-space:nowrap;flex-shrink:0">Get Pro — €49 lifetime →</a>
    </div>

    <!-- Pricing cards -->
    <section class="section-block pricing-shell" id="contact-cta">
      <div class="pricing-intro">
        <p class="section-kicker">Get started</p>
        <h2>Free to use. Pro when you need more.</h2>
        <p>Start with the open-source plugin at no cost. Upgrade to Pro for the visual workflow builder and priority support.</p>
      </div>
      <div class="pricing-grid">
        <article class="pricing-card">
          <span class="pricing-tag">Free</span>
          <h3>Open source plugin</h3>
          <div class="price-row">
            <strong>€0</strong>
            <span>available on GitHub</span>
          </div>
          <ul class="check-list">
            <li>Bundled Document Intake workflow</li>
            <li>WordPress submission inbox</li>
            <li>File uploads &amp; admin review screens</li>
          </ul>
          <div class="pricing-card-footer">
            <a href="<?php echo esc_url($download_url); ?>" target="_blank" rel="noreferrer" class="btn btn-primary btn-block">Download the plugin</a>
          </div>
        </article>
        <article class="pricing-card pricing-card-featured">
          <span class="pricing-tag pricing-tag-dark">Pro</span>
          <h3>Visual workflow builder</h3>
          <div class="price-row">
            <strong>€49</strong>
            <span>one-time · lifetime license · 5 sites</span>
          </div>
          <ul class="check-list">
            <li>Everything in Free</li>
            <li>Custom workflow builder &amp; pack install</li>
            <li>Advanced field types &amp; design tokens</li>
            <li>Priority email support</li>
          </ul>
          <div class="pricing-card-footer">
            <a href="<?php echo esc_url( home_url( '/pro/' ) ); ?>" class="btn btn-dark btn-block">Get Pro — €49 →</a>
          </div>
        </article>
      </div>
      <p style="text-align:center;margin-top:20px">
        <a href="<?php echo esc_url( home_url( '/pricing/' ) ); ?>" class="text-link">See full feature comparison →</a>
      </p>
    </section>

    <!-- Final CTA -->
    <section class="final-cta-band">
      <div>
        <p class="section-kicker">Ready to try it?</p>
        <h2>Give your next project a better start.</h2>
        <p>Download the plugin from GitHub and have it running in 30 minutes.</p>
      </div>
      <div style="display:flex;gap:1rem;flex-wrap:wrap">
        <a href="<?php echo esc_url($download_url); ?>" target="_blank" rel="noreferrer" class="btn btn-primary">Download the plugin →</a>
        <a href="<?php echo esc_url($repo_url); ?>" target="_blank" rel="noreferrer" class="btn btn-outline">View on GitHub</a>
      </div>
    </section>

  </main>
</div>

<!-- Lightbox -->
<div id="xpressui-lightbox" class="lightbox" hidden>
  <button id="lightbox-close" class="lightbox-close" type="button">Close</button>
  <figure id="lightbox-content" class="lightbox-content">
    <img id="lightbox-img" src="" alt="">
    <figcaption>
      <strong id="lightbox-title"></strong>
      <span id="lightbox-caption"></span>
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
      lb.removeAttribute('hidden');
    });
  });

  lb.addEventListener('click', function () { lb.setAttribute('hidden', ''); });
  document.getElementById('lightbox-close').addEventListener('click', function (e) {
    e.stopPropagation();
    lb.setAttribute('hidden', '');
  });
  document.getElementById('lightbox-content').addEventListener('click', function (e) {
    e.stopPropagation();
  });
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') lb.setAttribute('hidden', '');
  });
})();
</script>

<?php get_footer('xpressui'); ?>
