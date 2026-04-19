<?php
/**
 * Template for the /install/ page — step-by-step install guide.
 * WordPress automatically loads this for a page with slug "install".
 */

$xpressui_active_route = 'install';
$github_release = 'https://github.com/lybaba/xpressui-wordpress-bridge/releases/latest';
$console_url    = 'https://xpressui.iakpress.com/console/';

$free_steps = [
  [
    'number' => '01',
    'title'  => 'Download and install the plugin',
    'body'   => 'Download the latest release from GitHub. Install and activate through wp-admin → Plugins → Add New → Upload Plugin.',
    'cta'    => ['label' => 'Download latest release →', 'href' => $github_release, 'external' => true],
    'note'   => 'Requires WordPress 5.9+ and PHP 7.4+.',
  ],
  [
    'number' => '02',
    'title'  => 'Create a page and paste the shortcode',
    'body'   => 'Create a new WordPress page, then paste one of the two built-in shortcodes below. No account or license key needed — these workflows are embedded in the plugin.',
    'code'   => '[xpressui id="document-intake"]',
    'note'   => 'Or use [xpressui id="validation-playground"] to explore the full field type library.',
  ],
  [
    'number' => '03',
    'title'  => 'Publish the page — you\'re live',
    'body'   => 'The form renders inline on your page, isolated from your theme. Submissions land in wp-admin → XPressUI → Submissions with status tracking (New / In Review / Done).',
  ],
];

$pro_steps = [
  [
    'number' => '01',
    'title'  => 'Build your workflow in the visual console',
    'body'   => 'Open the console, create a project, and design your intake flow — steps, fields, file uploads, conditional logic. When you\'re done, export it as a ZIP.',
    'cta'    => ['label' => 'Open the console →', 'href' => $console_url, 'external' => true],
  ],
  [
    'number' => '02',
    'title'  => 'Upload the workflow ZIP to WordPress',
    'body'   => 'In wp-admin → XPressUI → Workflows, upload the ZIP you exported. The plugin extracts the form config and registers the workflow slug automatically.',
    'note'   => 'A Pro license key is required to upload custom workflows.',
  ],
  [
    'number' => '03',
    'title'  => 'Embed with the shortcode',
    'body'   => 'Paste the shortcode on any WordPress page using the slug from your workflow.',
    'code'   => '[xpressui id="your-workflow-slug"]',
    'note'   => 'Optional: add redirect="https://yoursite.com/thank-you/" to send users to a custom success page after submission.',
  ],
];

$built_in = [
  ['id' => 'document-intake',      'label' => 'Document Intake',         'desc' => 'Multi-step client intake with file uploads and admin review.'],
  ['id' => 'validation-playground','label' => 'Validation Playground',   'desc' => 'Full field type library — text, select, upload, conditional logic.'],
];

get_header('xpressui');
?>

<main class="subpage-shell">
  <div class="container">

    <section class="subpage-hero">
      <p class="section-kicker">Install guide</p>
      <h1>Live intake page on WordPress in under 30 minutes.</h1>
      <p>Two paths: test the built-in workflows immediately with no account, or build a custom flow in the visual console and deploy it via ZIP upload.</p>
    </section>

    <!-- Free path -->
    <section class="subpage-stack">
      <div style="display:flex;align-items:center;gap:12px;margin-bottom:4px">
        <span style="padding:4px 12px;border-radius:999px;background:#f0fdf4;border:1px solid #bbf7d0;font-size:11px;font-weight:800;color:#059669;text-transform:uppercase;letter-spacing:.07em">Free</span>
        <h2 style="margin:0;font-size:20px;font-weight:800;color:#0f172a">Test the built-in workflows</h2>
      </div>
      <p style="margin:0 0 20px;font-size:14px;color:#64748b;line-height:1.6">
        The plugin ships with two ready-to-embed workflows. No account, no license key, no builder.
      </p>

      <div style="display:grid;gap:16px">
        <?php foreach ($free_steps as $step): ?>
        <article style="display:grid;grid-template-columns:48px 1fr;gap:20px;padding:28px;border-radius:20px;border:1px solid rgba(18,32,51,.08);background:#fff;box-shadow:0 4px 16px rgba(18,32,51,.05)">
          <div style="width:48px;height:48px;border-radius:14px;background:#f0fdf4;border:1px solid #bbf7d0;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:800;color:#059669;flex-shrink:0">
            <?php echo esc_html($step['number']); ?>
          </div>
          <div style="display:grid;gap:12px">
            <h3 style="margin:0;font-size:18px;font-weight:800;color:#0f172a;line-height:1.2"><?php echo esc_html($step['title']); ?></h3>
            <p style="margin:0;font-size:14px;line-height:1.7;color:#475569"><?php echo esc_html($step['body']); ?></p>
            <?php if (!empty($step['code'])): ?>
            <pre style="margin:0;padding:12px 16px;border-radius:10px;background:#f8fafc;border:1px solid #e2e8f0;font-size:13px;color:#0f172a;font-family:'Fira Mono','Courier New',monospace;overflow-x:auto"><?php echo esc_html($step['code']); ?></pre>
            <?php endif; ?>
            <?php if (!empty($step['note'])): ?>
            <p style="margin:0;font-size:12px;line-height:1.6;color:#94a3b8;border-left:2px solid #e2e8f0;padding-left:10px"><?php echo esc_html($step['note']); ?></p>
            <?php endif; ?>
            <?php if (!empty($step['cta'])): ?>
            <a href="<?php echo esc_url($step['cta']['href']); ?>"<?php echo !empty($step['cta']['external']) ? ' target="_blank" rel="noreferrer"' : ''; ?> class="btn btn-primary" style="margin-top:4px;width:fit-content;min-height:44px">
              <?php echo esc_html($step['cta']['label']); ?>
            </a>
            <?php endif; ?>
          </div>
        </article>
        <?php endforeach; ?>
      </div>

      <!-- Built-in workflows -->
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-top:8px">
        <?php foreach ($built_in as $w): ?>
        <div style="padding:20px;border-radius:16px;border:1px solid #e2e8f0;background:#f8fafc">
          <p style="margin:0 0 6px;font-size:12px;font-weight:700;color:#059669;text-transform:uppercase;letter-spacing:.07em">Built-in</p>
          <p style="margin:0 0 6px;font-size:15px;font-weight:800;color:#0f172a"><?php echo esc_html($w['label']); ?></p>
          <p style="margin:0 0 12px;font-size:13px;color:#64748b;line-height:1.5"><?php echo esc_html($w['desc']); ?></p>
          <pre style="margin:0;padding:8px 12px;border-radius:8px;background:#fff;border:1px solid #e2e8f0;font-size:12px;color:#334155;font-family:monospace">[xpressui id="<?php echo esc_attr($w['id']); ?>"]</pre>
        </div>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- Pro path -->
    <section class="subpage-stack" style="margin-top:48px">
      <div style="display:flex;align-items:center;gap:12px;margin-bottom:4px">
        <span style="padding:4px 12px;border-radius:999px;background:#eff6ff;border:1px solid #bfdbfe;font-size:11px;font-weight:800;color:#2563eb;text-transform:uppercase;letter-spacing:.07em">Pro</span>
        <h2 style="margin:0;font-size:20px;font-weight:800;color:#0f172a">Deploy a custom workflow</h2>
      </div>
      <p style="margin:0 0 20px;font-size:14px;color:#64748b;line-height:1.6">
        Build any intake flow in the visual console, export it as a ZIP, and upload it to WordPress. Requires a Pro license key.
      </p>

      <div style="display:grid;gap:16px">
        <?php foreach ($pro_steps as $step): ?>
        <article style="display:grid;grid-template-columns:48px 1fr;gap:20px;padding:28px;border-radius:20px;border:1px solid rgba(18,32,51,.08);background:#fff;box-shadow:0 4px 16px rgba(18,32,51,.05)">
          <div style="width:48px;height:48px;border-radius:14px;background:#eff6ff;border:1px solid #bfdbfe;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:800;color:#2563eb;flex-shrink:0">
            <?php echo esc_html($step['number']); ?>
          </div>
          <div style="display:grid;gap:12px">
            <h3 style="margin:0;font-size:18px;font-weight:800;color:#0f172a;line-height:1.2"><?php echo esc_html($step['title']); ?></h3>
            <p style="margin:0;font-size:14px;line-height:1.7;color:#475569"><?php echo esc_html($step['body']); ?></p>
            <?php if (!empty($step['code'])): ?>
            <pre style="margin:0;padding:12px 16px;border-radius:10px;background:#f8fafc;border:1px solid #e2e8f0;font-size:13px;color:#0f172a;font-family:'Fira Mono','Courier New',monospace;overflow-x:auto"><?php echo esc_html($step['code']); ?></pre>
            <?php endif; ?>
            <?php if (!empty($step['note'])): ?>
            <p style="margin:0;font-size:12px;line-height:1.6;color:#94a3b8;border-left:2px solid #e2e8f0;padding-left:10px"><?php echo esc_html($step['note']); ?></p>
            <?php endif; ?>
            <?php if (!empty($step['cta'])): ?>
            <a href="<?php echo esc_url($step['cta']['href']); ?>"<?php echo !empty($step['cta']['external']) ? ' target="_blank" rel="noreferrer"' : ''; ?> class="btn btn-primary" style="margin-top:4px;width:fit-content;min-height:44px">
              <?php echo esc_html($step['cta']['label']); ?>
            </a>
            <?php endif; ?>
          </div>
        </article>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- Pro CTA -->
    <div style="margin-top:48px;padding:28px 32px;border-radius:24px;background:linear-gradient(135deg,#05422f 0%,#0a7a5a 100%);display:flex;align-items:center;justify-content:space-between;gap:24px;flex-wrap:wrap;box-shadow:0 20px 48px rgba(5,66,47,.25)">
      <div>
        <p style="margin:0 0 4px;font-size:.72rem;font-weight:800;text-transform:uppercase;letter-spacing:.1em;color:rgba(255,255,255,.6)">XPressUI Pro</p>
        <p style="margin:0 0 4px;font-size:1.05rem;font-weight:700;color:#fff">Build your first custom workflow — one purchase, lifetime license.</p>
        <p style="margin:0;font-size:13px;color:rgba(255,255,255,.6)">30-day money-back guarantee.</p>
      </div>
      <a href="<?php echo esc_url( home_url( '/pro/' ) ); ?>" class="btn" style="background:#fff;color:#05422f;font-weight:800;white-space:nowrap;flex-shrink:0">Get Pro — €49 →</a>
    </div>

  </div>
</main>

<?php get_footer('xpressui'); ?>
