<?php
/**
 * Template for the /purchase-confirmed/ page — post-purchase onboarding steps.
 * WordPress automatically loads this for a page with slug "purchase-confirmed".
 */

$xpressui_active_route = '';

$steps = [
  [
    'n'    => '01',
    'title'=> 'Check your email',
    'body' => 'Your license key and download link have been sent to your inbox. Check your spam folder if it doesn\'t show up within a minute.',
  ],
  [
    'n'    => '02',
    'title'=> 'Download and install the free plugin',
    'body' => 'Install and activate XPressUI Bridge on your WordPress site first. This is the base runtime the Pro plugin requires.',
    'cta'  => ['label' => 'Download XPressUI Bridge on GitHub', 'href' => 'https://github.com/lybaba/xpressui-wordpress-bridge/releases/latest'],
  ],
  [
    'n'    => '03',
    'title'=> 'Install Bridge Pro from your email link',
    'body' => 'Download the Pro plugin ZIP from your email, then upload and activate it in WordPress › Plugins › Add New › Upload Plugin.',
  ],
  [
    'n'    => '04',
    'title'=> 'Enter your license key',
    'body' => 'In wp-admin, go to XPressUI › Settings › License. Paste your license key from the email and click Activate. A green badge confirms it\'s active.',
  ],
  [
    'n'    => '05',
    'title'=> 'Upload your workflow pack',
    'body' => 'Go to XPressUI › Workflows › Upload and install your workflow pack ZIP. Create a page with the shortcode to go live.',
    'code' => '[xpressui id="your-pack-slug"]',
  ],
];

get_header('xpressui');
?>

<main class="subpage-shell">
  <div class="container">

    <section class="subpage-hero">
      <span style="display:inline-flex;align-items:center;gap:6px;background:rgba(5,150,105,.1);color:#059669;border:1px solid rgba(5,150,105,.2);border-radius:999px;padding:5px 14px;font-size:13px;font-weight:700;margin-bottom:20px">
        ✓ Payment confirmed
      </span>
      <p class="section-kicker">You're in</p>
      <h1>Welcome to XPressUI Pro.</h1>
      <p>Your license key and download link are on their way to your inbox. Follow the steps below to go from ZIP file to live intake page.</p>
    </section>

    <section class="subpage-stack">

      <!-- Email notice -->
      <div style="display:flex;align-items:flex-start;gap:16px;padding:20px 24px;border-radius:18px;background:rgba(37,99,235,.05);border:1px solid rgba(37,99,235,.15)">
        <span style="font-size:24px;line-height:1;flex-shrink:0">📬</span>
        <div>
          <strong style="display:block;color:#122033;margin-bottom:4px">Check your email</strong>
          <p style="margin:0;font-size:14px;line-height:1.65;color:#526071">
            We've sent your <strong>license key</strong> and a protected <strong>download link</strong> to your inbox.
            If it doesn't arrive within a couple of minutes, check your spam folder or
            <a href="mailto:hello@iakpress.com?subject=XPressUI%20Pro%20%E2%80%94%20missing%20license%20email" style="color:#2563eb;font-weight:600;text-decoration:none">contact support</a>.
          </p>
        </div>
      </div>

      <!-- Steps -->
      <?php foreach ($steps as $step): ?>
      <article class="subpage-card">
        <div class="step-pill"><?php echo esc_html($step['n']); ?></div>
        <div>
          <h2><?php echo esc_html($step['title']); ?></h2>
          <p><?php echo esc_html($step['body']); ?></p>
          <?php if (!empty($step['cta'])): ?>
          <a href="<?php echo esc_url($step['cta']['href']); ?>" target="_blank" rel="noreferrer" class="btn btn-primary" style="margin-top:1rem;min-height:48px">
            <?php echo esc_html($step['cta']['label']); ?>
          </a>
          <?php endif; ?>
          <?php if (!empty($step['code'])): ?>
          <pre style="margin-top:1rem;padding:12px 16px;border-radius:10px;background:#f8fafc;border:1px solid #e2e8f0;font-size:13px;color:#0f172a;font-family:'Fira Mono','Courier New',monospace"><?php echo esc_html($step['code']); ?></pre>
          <?php endif; ?>
        </div>
      </article>
      <?php endforeach; ?>

      <!-- Need help -->
      <div style="padding:24px 28px;border-radius:20px;background:rgba(18,32,51,.03);border:1px solid rgba(18,32,51,.08);display:flex;align-items:center;justify-content:space-between;gap:20px;flex-wrap:wrap">
        <div>
          <strong style="display:block;color:#122033;margin-bottom:4px">Need help with the setup?</strong>
          <p style="margin:0;font-size:14px;line-height:1.65;color:#526071">We can walk you through installation or help tailor the workflow to your site.</p>
        </div>
        <a href="mailto:hello@iakpress.com?subject=XPressUI%20Pro%20%E2%80%94%20setup%20help" class="btn btn-primary" style="white-space:nowrap;flex-shrink:0">Email support</a>
      </div>

      <a href="<?php echo esc_url( home_url( '/install/' ) ); ?>" style="font-size:13px;color:#94a3b8;text-decoration:none">← Full install guide</a>

    </section>
  </div>
</main>

<?php get_footer('xpressui'); ?>
