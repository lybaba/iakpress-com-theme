<?php
/**
 * Template for the /pricing/ page — full feature comparison table and FAQ.
 * WordPress automatically loads this for a page with slug "pricing".
 */

$download_url = 'https://github.com/lybaba/xpressui-wordpress-bridge/releases/latest';

$rows = [
  // Bundled workflows
  ['group' => 'Bundled workflows',        'label' => 'Document Intake starter workflow',                          'free' => true,  'pro' => true],
  ['group' => '',                          'label' => 'Validation Playground (QA tool)',                          'free' => false, 'pro' => true],
  // Custom workflows
  ['group' => 'Custom workflows',          'label' => 'Install custom workflow packs from the Console',           'free' => false, 'pro' => true],
  ['group' => '',                          'label' => 'Visual Console builder — design any intake flow',          'free' => false, 'pro' => true],
  ['group' => '',                          'label' => 'One-click export to WordPress (.zip)',                     'free' => false, 'pro' => true],
  ['group' => '',                          'label' => 'Unlimited custom workflows',                               'free' => false, 'pro' => true],
  // Field types
  ['group' => 'Field types',              'label' => 'Core fields (text, email, file, select…)',                 'free' => true,  'pro' => true],
  ['group' => '',                          'label' => 'Advanced fields (QR scan, document scan, quiz, product list…)', 'free' => false, 'pro' => true],
  // WordPress inbox
  ['group' => 'WordPress submission inbox', 'label' => 'Submission inbox per project',                           'free' => true,  'pro' => true],
  ['group' => '',                          'label' => 'Status workflow (New → In review → Done)',                 'free' => true,  'pro' => true],
  ['group' => '',                          'label' => 'Team assignment and My Queue',                             'free' => true,  'pro' => true],
  ['group' => '',                          'label' => 'Email notification per project',                           'free' => true,  'pro' => true],
  ['group' => '',                          'label' => 'File uploads stored as WP media',                         'free' => true,  'pro' => true],
  ['group' => '',                          'label' => 'Post-submit redirect URL',                                 'free' => true,  'pro' => true],
  // Local customization
  ['group' => 'Local customization (wp-admin)', 'label' => 'Customize labels, help text, and choice labels',    'free' => false, 'pro' => true],
  ['group' => '',                          'label' => 'Customize validation rules and upload limits',             'free' => false, 'pro' => true],
  ['group' => '',                          'label' => 'Design tokens — colors, fonts, border radius',            'free' => false, 'pro' => true],
  // Delivery
  ['group' => 'Delivery and support',     'label' => 'Automatic plugin updates',                                 'free' => false, 'pro' => true],
  ['group' => '',                          'label' => 'License valid on up to 5 WordPress sites',                'free' => false, 'pro' => true],
  ['group' => '',                          'label' => 'Community support via GitHub Issues',                     'free' => true,  'pro' => true],
  ['group' => '',                          'label' => 'Priority email support (1–2 business days)',              'free' => false, 'pro' => true],
];

$faq_items = [
  ['q' => 'What does the free plugin actually give me?',       'a' => 'The free plugin ships with the Document Intake workflow ready to use — no Console access needed. You get the full WordPress inbox: submissions, status tracking, team assignment, file uploads, and email notifications.'],
  ['q' => 'Why do I need Pro to install custom workflow packs?', 'a' => 'Custom packs are designed in the XPressUI Console and exported as .zip files. The Pro extension handles installation, the full runtime, and advanced field types. The free plugin only supports the bundled starter.'],
  ['q' => 'Can I try it before buying?',                       'a' => 'Yes. Download the free plugin from GitHub, install the document-intake shortcode on any page, and see the full client and admin experience before purchasing anything.'],
  ['q' => 'Is the €49 a subscription?',                        'a' => 'No — it\'s a one-time payment. You get lifetime access and all future updates for up to 5 WordPress sites. No annual renewal.'],
  ['q' => 'What is the refund policy?',                        'a' => '30-day money-back guarantee, no questions asked. Email hello@iakpress.com within 30 days of purchase.'],
];

get_header();
?>

<div class="font-sans text-gray-900 antialiased">

  <!-- Hero -->
  <section class="bg-white py-16 px-4 sm:px-6 lg:px-8 border-b border-gray-100 text-center">
    <div class="max-w-2xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3">Pricing</p>
      <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 mb-4">Free to start.<br>Pro when you need more.</h1>
      <p class="text-gray-500 leading-relaxed">The free plugin ships with a ready-to-use document intake workflow. Pro unlocks the Console builder, custom pack install, and advanced field types.</p>
    </div>
  </section>

  <!-- Pricing cards -->
  <section class="bg-white py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6">

      <!-- Free -->
      <article class="bg-gray-50 rounded-2xl border border-gray-100 p-8 flex flex-col">
        <span class="inline-block px-3 py-1 rounded-full bg-white border border-gray-200 text-xs font-bold text-gray-600 uppercase tracking-wider mb-4 w-fit">Free</span>
        <h3 class="text-xl font-bold text-gray-900 mb-2">Open source plugin</h3>
        <div class="flex items-baseline gap-2 mb-6">
          <span class="text-4xl font-extrabold text-gray-900">€0</span>
          <span class="text-gray-500 text-sm">available on GitHub</span>
        </div>
        <ul class="space-y-3 mb-8 flex-1">
          <?php foreach (['1 bundled Document Intake workflow', 'WordPress submission inbox', 'File uploads, status tracking, team assignment', 'Data stays in your WordPress DB', 'Community support via GitHub'] as $item): ?>
          <li class="flex items-start gap-3 text-sm text-gray-600">
            <svg class="h-5 w-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            <?php echo esc_html($item); ?>
          </li>
          <?php endforeach; ?>
        </ul>
        <a href="<?php echo esc_url($download_url); ?>" target="_blank" rel="noreferrer"
           class="block text-center bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-bold py-3 px-6 rounded-lg transition">
          Download the plugin
        </a>
      </article>

      <!-- Pro -->
      <article class="bg-gray-900 rounded-2xl border border-gray-800 p-8 flex flex-col">
        <span class="inline-block px-3 py-1 rounded-full bg-blue-600 text-xs font-bold text-white uppercase tracking-wider mb-4 w-fit">Pro</span>
        <h3 class="text-xl font-bold text-white mb-2">Visual workflow builder</h3>
        <div class="flex items-baseline gap-2 mb-6">
          <span class="text-4xl font-extrabold text-white">€49</span>
          <span class="text-gray-400 text-sm">one-time · lifetime · 5 sites</span>
        </div>
        <ul class="space-y-3 mb-8 flex-1">
          <?php foreach (['Everything in Free', 'Console builder — design any intake flow', 'Custom workflow pack install', 'Advanced field types (QR scan, doc scan, quiz…)', 'Customize labels, validation, design tokens in wp-admin', 'Automatic plugin updates', 'Priority email support (1–2 business days)'] as $item): ?>
          <li class="flex items-start gap-3 text-sm text-gray-300">
            <svg class="h-5 w-5 text-blue-400 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            <?php echo esc_html($item); ?>
          </li>
          <?php endforeach; ?>
        </ul>
        <button class="xpressui-checkout-btn w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition disabled:opacity-50 disabled:cursor-not-allowed">
          Get Pro — €49 →
        </button>
        <p class="text-center text-xs text-gray-500 mt-3">30-day money-back guarantee · Stripe secure checkout</p>
      </article>

    </div>
  </section>

  <!-- Comparison table -->
  <section class="bg-gray-50 border-t border-gray-100 py-20 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3 text-center">Compare plans</p>
      <h2 class="text-3xl font-bold text-gray-900 mb-10 text-center">Full feature breakdown.</h2>

      <div class="rounded-2xl border border-gray-100 overflow-hidden bg-white shadow-sm">
        <div class="grid bg-gray-50 border-b border-gray-100" style="grid-template-columns:1fr 100px 100px">
          <div class="py-3 px-5 text-xs font-bold text-gray-500 uppercase tracking-wider">Feature</div>
          <div class="py-3 px-4 text-xs font-bold text-gray-500 border-l border-gray-100 text-center uppercase tracking-wider">Free</div>
          <div class="py-3 px-4 text-xs font-bold text-gray-900 border-l border-gray-100 text-center uppercase tracking-wider">Pro</div>
        </div>

        <?php
        $current_group = '';
        $total = count($rows);
        foreach ($rows as $i => $row):
          $is_last = ($i === $total - 1);
          $is_new_group = ($row['group'] !== '' && $row['group'] !== $current_group);
          if ($row['group'] !== '') $current_group = $row['group'];
        ?>
          <?php if ($is_new_group): ?>
          <div class="grid bg-gray-50 <?php echo $i > 0 ? 'border-t border-gray-100' : ''; ?> border-b border-gray-100" style="grid-template-columns:1fr 100px 100px">
            <div class="py-2 px-5 text-xs font-bold text-gray-400 uppercase tracking-wider"><?php echo esc_html($row['group']); ?></div>
            <div class="border-l border-gray-100"></div>
            <div class="border-l border-gray-100"></div>
          </div>
          <?php endif; ?>
          <div class="grid items-center <?php echo $is_last ? '' : 'border-b border-gray-50'; ?>" style="grid-template-columns:1fr 100px 100px">
            <div class="py-3 px-5 text-sm text-gray-600"><?php echo esc_html($row['label']); ?></div>
            <div class="py-3 px-4 text-center border-l border-gray-50 text-base">
              <?php if ($row['free'] === true): ?><span class="text-green-500 font-bold">✓</span>
              <?php elseif ($row['free'] === false): ?><span class="text-gray-300">—</span>
              <?php else: ?><span class="text-xs text-gray-400"><?php echo esc_html($row['free']); ?></span><?php endif; ?>
            </div>
            <div class="py-3 px-4 text-center border-l border-gray-50 text-base<?php echo $row['pro'] === true ? ' bg-blue-50/30' : ''; ?>">
              <?php if ($row['pro'] === true): ?><span class="text-blue-600 font-bold">✓</span>
              <?php elseif ($row['pro'] === false): ?><span class="text-gray-300">—</span>
              <?php else: ?><span class="text-xs text-gray-400"><?php echo esc_html($row['pro']); ?></span><?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section class="bg-white py-20 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3 text-center">FAQ</p>
      <h2 class="text-3xl font-bold text-gray-900 mb-10 text-center">Common questions.</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <?php foreach ($faq_items as $item): ?>
        <article class="bg-gray-50 rounded-2xl border border-gray-100 p-6">
          <h3 class="font-bold text-gray-900 mb-3 text-base leading-snug"><?php echo esc_html($item['q']); ?></h3>
          <p class="text-sm text-gray-500 leading-relaxed"><?php echo esc_html($item['a']); ?></p>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Final CTA -->
  <section class="bg-gray-900 py-20 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto flex flex-col md:flex-row items-center justify-between gap-8">
      <div>
        <p class="text-sm font-bold tracking-widest text-blue-400 uppercase mb-2">Ready to start?</p>
        <h2 class="text-3xl font-extrabold text-white mb-3">Free plugin or Pro — both ship today.</h2>
        <p class="text-gray-400">Download the free plugin and try the intake experience. Upgrade to Pro when you need custom workflows.</p>
      </div>
      <div class="flex flex-col sm:flex-row gap-3 flex-shrink-0">
        <button class="xpressui-checkout-btn bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition disabled:opacity-50 disabled:cursor-not-allowed">Get Pro — €49 →</button>
        <a href="<?php echo esc_url($download_url); ?>" target="_blank" rel="noreferrer"
           class="bg-white/10 border border-white/20 hover:bg-white/20 text-white font-bold py-3 px-6 rounded-lg transition text-center">
          Download free plugin
        </a>
      </div>
    </div>
  </section>

</div>

<script>
(function () {
  var API = 'https://xpressui.iakpress.com';
  document.querySelectorAll('.xpressui-checkout-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
      if (btn.disabled) return;
      var original = btn.textContent;
      btn.disabled = true;
      btn.textContent = 'Redirecting\u2026';
      fetch(API + '/api/v1/billing/create-public-checkout-session', { method: 'POST' })
        .then(function (r) { return r.ok ? r.json() : Promise.reject(); })
        .then(function (data) { window.location.href = data.checkoutUrl; })
        .catch(function () {
          btn.disabled = false;
          btn.textContent = original;
          alert('Unable to start checkout. Please try again or contact us at hello@iakpress.com.');
        });
    });
  });
})();
</script>

<?php get_footer(); ?>
