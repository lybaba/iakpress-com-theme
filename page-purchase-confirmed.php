<?php
/**
 * Template for the /purchase-confirmed/ page — post-purchase onboarding steps.
 * WordPress automatically loads this for a page with slug "purchase-confirmed".
 */

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
    'cta'  => ['label' => 'Download XPressUI Bridge on GitHub', 'href' => 'https://github.com/lybaba/xpressui-packages/releases/latest'],
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

get_header();
?>

<div class="font-sans text-gray-900 antialiased">

  <!-- Hero -->
  <section class="bg-white py-16 px-4 sm:px-6 lg:px-8 border-b border-gray-100">
    <div class="max-w-3xl mx-auto">
      <span class="inline-flex items-center gap-2 bg-green-50 border border-green-200 text-green-700 text-xs font-bold px-4 py-1.5 rounded-full mb-6">
        ✓ Payment confirmed
      </span>
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3">You're in</p>
      <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 mb-4">Welcome to XPressUI Pro.</h1>
      <p class="text-gray-500 leading-relaxed">Your license key and download link are on their way to your inbox. Follow the steps below to go from ZIP file to live intake page.</p>
    </div>
  </section>

  <!-- Steps -->
  <section class="bg-gray-50 py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto space-y-4">

      <!-- Email notice -->
      <div class="flex items-start gap-4 p-5 rounded-2xl bg-blue-50 border border-blue-100">
        <span class="text-2xl flex-shrink-0">📬</span>
        <div>
          <strong class="block text-gray-900 mb-1">Check your email</strong>
          <p class="text-sm text-gray-500 leading-relaxed">
            We've sent your <strong class="text-gray-700">license key</strong> and a protected <strong class="text-gray-700">download link</strong> to your inbox.
            If it doesn't arrive within a couple of minutes, check your spam folder or
            <a href="mailto:hello@iakpress.com?subject=XPressUI%20Pro%20%E2%80%94%20missing%20license%20email" class="text-blue-600 font-semibold hover:underline">contact support</a>.
          </p>
        </div>
      </div>

      <!-- Steps -->
      <?php foreach ($steps as $step): ?>
      <article class="flex gap-6 p-7 rounded-2xl border border-gray-100 bg-white shadow-sm">
        <div class="w-12 h-12 flex-shrink-0 rounded-xl bg-gray-100 flex items-center justify-center text-xs font-bold text-gray-500">
          <?php echo esc_html($step['n']); ?>
        </div>
        <div class="space-y-3 min-w-0">
          <h2 class="text-base font-bold text-gray-900"><?php echo esc_html($step['title']); ?></h2>
          <p class="text-sm text-gray-600 leading-relaxed"><?php echo esc_html($step['body']); ?></p>
          <?php if (!empty($step['cta'])): ?>
          <a href="<?php echo esc_url($step['cta']['href']); ?>" target="_blank" rel="noreferrer"
             class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold py-2.5 px-5 rounded-lg transition">
            <?php echo esc_html($step['cta']['label']); ?>
          </a>
          <?php endif; ?>
          <?php if (!empty($step['code'])): ?>
          <pre class="p-3 rounded-lg bg-gray-50 border border-gray-200 text-sm font-mono text-gray-800 overflow-x-auto"><?php echo esc_html($step['code']); ?></pre>
          <?php endif; ?>
        </div>
      </article>
      <?php endforeach; ?>

      <!-- Need help -->
      <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 p-6 rounded-2xl border border-gray-100 bg-white shadow-sm">
        <div>
          <strong class="block text-gray-900 mb-1">Need help with the setup?</strong>
          <p class="text-sm text-gray-500 leading-relaxed">We can walk you through installation or help tailor the workflow to your site.</p>
        </div>
        <a href="<?php echo esc_url(home_url('/contact/')); ?>"
           class="flex-shrink-0 inline-flex items-center bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-700 text-sm font-bold py-2.5 px-5 rounded-lg transition whitespace-nowrap">
          Email support
        </a>
      </div>

      <a href="<?php echo esc_url(home_url('/install/')); ?>" class="inline-block text-sm text-gray-400 hover:text-gray-600 transition">
        ← Full install guide
      </a>

    </div>
  </section>

</div>

<?php get_footer(); ?>
