<?php
/**
 * Template for the /install/ page — step-by-step install guide.
 * WordPress automatically loads this for a page with slug "install".
 */

$github_release = 'https://github.com/lybaba/xpressui-packages/releases/latest';
$console_url    = 'https://xpressui.iakpress.com/console/';

$free_steps = [
  [
    'number' => '01',
    'title'  => 'Download and install the plugin',
    'body'   => 'Download the latest release from GitHub. Install and activate through wp-admin → Plugins → Add New → Upload Plugin.',
    'cta'    => ['label' => 'Download latest release on GitHub', 'href' => $github_release, 'external' => true],
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
    'cta'    => ['label' => 'Open the console', 'href' => $console_url, 'external' => true],
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

get_header();
?>

<div class="font-sans text-gray-900 antialiased">

  <!-- Hero -->
  <section class="bg-white py-16 px-4 sm:px-6 lg:px-8 border-b border-gray-100">
    <div class="max-w-3xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3">Install guide</p>
      <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 mb-4">Live intake page on WordPress in under 30 minutes.</h1>
      <p class="text-gray-500 leading-relaxed">Two paths: test the built-in workflows immediately with no account, or build a custom flow in the visual console and deploy it via ZIP upload.</p>
    </div>
  </section>

  <!-- Steps -->
  <section class="bg-gray-50 py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto space-y-10">

      <!-- Free path -->
      <div>
        <div class="flex items-center gap-3 mb-6">
          <span class="px-3 py-1 rounded-full bg-green-50 border border-green-200 text-xs font-bold text-green-700 uppercase tracking-wider">Free</span>
          <h2 class="text-lg font-bold text-gray-900">Test the built-in workflows</h2>
        </div>

        <div class="space-y-4">
          <?php foreach ($free_steps as $step): ?>
          <article class="flex gap-6 p-7 rounded-2xl border border-gray-100 bg-white shadow-sm">
            <div class="w-12 h-12 flex-shrink-0 rounded-xl bg-green-50 border border-green-200 flex items-center justify-center text-xs font-bold text-green-700">
              <?php echo esc_html($step['number']); ?>
            </div>
            <div class="space-y-3 min-w-0">
              <h3 class="text-base font-bold text-gray-900"><?php echo esc_html($step['title']); ?></h3>
              <p class="text-sm text-gray-600 leading-relaxed"><?php echo esc_html($step['body']); ?></p>
              <?php if (!empty($step['code'])): ?>
              <pre class="p-3 rounded-lg bg-gray-50 border border-gray-200 text-sm font-mono text-gray-800 overflow-x-auto"><?php echo esc_html($step['code']); ?></pre>
              <?php endif; ?>
              <?php if (!empty($step['note'])): ?>
              <p class="text-xs text-gray-400 border-l-2 border-gray-200 pl-3 leading-relaxed"><?php echo esc_html($step['note']); ?></p>
              <?php endif; ?>
              <?php if (!empty($step['cta'])): ?>
              <a href="<?php echo esc_url($step['cta']['href']); ?>"<?php echo !empty($step['cta']['external']) ? ' target="_blank" rel="noreferrer"' : ''; ?>
                 class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold py-2.5 px-5 rounded-lg transition">
                <?php echo esc_html($step['cta']['label']); ?>
              </a>
              <?php endif; ?>
            </div>
          </article>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Pro path -->
      <div>
        <div class="flex items-center gap-3 mb-6">
          <span class="px-3 py-1 rounded-full bg-blue-50 border border-blue-200 text-xs font-bold text-blue-600 uppercase tracking-wider">Pro</span>
          <h2 class="text-lg font-bold text-gray-900">Deploy a custom workflow</h2>
        </div>

        <div class="space-y-4">
          <?php foreach ($pro_steps as $step): ?>
          <article class="flex gap-6 p-7 rounded-2xl border border-gray-100 bg-white shadow-sm">
            <div class="w-12 h-12 flex-shrink-0 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center text-xs font-bold text-blue-600">
              <?php echo esc_html($step['number']); ?>
            </div>
            <div class="space-y-3 min-w-0">
              <h3 class="text-base font-bold text-gray-900"><?php echo esc_html($step['title']); ?></h3>
              <p class="text-sm text-gray-600 leading-relaxed"><?php echo esc_html($step['body']); ?></p>
              <?php if (!empty($step['code'])): ?>
              <pre class="p-3 rounded-lg bg-gray-50 border border-gray-200 text-sm font-mono text-gray-800 overflow-x-auto"><?php echo esc_html($step['code']); ?></pre>
              <?php endif; ?>
              <?php if (!empty($step['note'])): ?>
              <p class="text-xs text-gray-400 border-l-2 border-gray-200 pl-3 leading-relaxed"><?php echo esc_html($step['note']); ?></p>
              <?php endif; ?>
              <?php if (!empty($step['cta'])): ?>
              <a href="<?php echo esc_url($step['cta']['href']); ?>"<?php echo !empty($step['cta']['external']) ? ' target="_blank" rel="noreferrer"' : ''; ?>
                 class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold py-2.5 px-5 rounded-lg transition">
                <?php echo esc_html($step['cta']['label']); ?>
              </a>
              <?php endif; ?>
            </div>
          </article>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Get Pro CTA -->
      <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 p-6 rounded-2xl border border-gray-100 bg-white shadow-sm">
        <div>
          <strong class="block text-gray-900 mb-1">Ready to build a custom workflow?</strong>
          <p class="text-sm text-gray-500 leading-relaxed">One purchase, lifetime license. 30-day money-back guarantee.</p>
        </div>
        <a href="<?php echo esc_url(home_url('/pro/')); ?>"
           class="flex-shrink-0 inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold py-2.5 px-5 rounded-lg transition whitespace-nowrap">
          Get Pro — €129
        </a>
      </div>

    </div>
  </section>

</div>

<?php get_footer(); ?>
