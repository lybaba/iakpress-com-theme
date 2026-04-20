<?php
/**
 * Template for the /pricing/ page — pricing, comparison table, FAQ, CTA.
 * WordPress automatically loads this for a page with slug "pricing".
 */

$download_url = 'https://github.com/lybaba/xpressui-packages/releases/latest';

$rows = [
  ['group' => 'Start free', 'label' => 'Ready-to-use Document Intake portal', 'free' => true, 'pro' => true],
  ['group' => '', 'label' => 'WordPress submission inbox', 'free' => true, 'pro' => true],
  ['group' => '', 'label' => 'File uploads, status tracking, team assignment', 'free' => true, 'pro' => true],
  ['group' => '', 'label' => 'Email notifications and redirect flow', 'free' => true, 'pro' => true],

  ['group' => 'Build custom portals', 'label' => 'Visual Console builder', 'free' => false, 'pro' => true],
  ['group' => '', 'label' => 'Install custom workflow packs from the Console', 'free' => false, 'pro' => true],
  ['group' => '', 'label' => 'One-click export to WordPress (.zip)', 'free' => false, 'pro' => true],
  ['group' => '', 'label' => 'Unlimited custom workflows', 'free' => false, 'pro' => true],

  ['group' => 'Advanced capture', 'label' => 'Core fields (text, email, file, select...)', 'free' => true, 'pro' => true],
  ['group' => '', 'label' => 'Advanced fields (QR scan, document scan, quiz, product list...)', 'free' => false, 'pro' => true],

  ['group' => 'Client delivery', 'label' => 'Customize labels, help text, and choice labels', 'free' => false, 'pro' => true],
  ['group' => '', 'label' => 'Customize validation rules and upload limits', 'free' => false, 'pro' => true],
  ['group' => '', 'label' => 'Design tokens — colors, fonts, border radius', 'free' => false, 'pro' => true],

  ['group' => 'Support and license', 'label' => 'Community support via GitHub Issues', 'free' => true, 'pro' => true],
  ['group' => '', 'label' => 'Automatic plugin updates', 'free' => false, 'pro' => true],
  ['group' => '', 'label' => 'License valid on up to 5 WordPress sites', 'free' => false, 'pro' => true],
  ['group' => '', 'label' => 'Priority email support (1–2 business days)', 'free' => false, 'pro' => true],
];

$faq_items = [
  ['q' => 'Can I start with the free plugin first?', 'a' => 'Yes. The free plugin is the easiest way to try the document portal experience on your own WordPress site. You can install it, test the intake flow, and only upgrade when you need custom portals.'],
  ['q' => 'What does Pro unlock exactly?', 'a' => 'Pro unlocks the visual Console builder, custom workflow pack installation, advanced field types, local customization in wp-admin, automatic updates, and the license for up to 5 WordPress sites.'],
  ['q' => 'Is €129 a subscription?', 'a' => 'No. It is a one-time payment for lifetime access, future updates, and use on up to 5 WordPress sites.'],
  ['q' => 'Who is Pro for?', 'a' => 'Pro is built for WordPress freelancers, agencies, and service businesses that want to create their own branded intake portals, reuse them across projects, and charge clients for that delivery.'],
  ['q' => 'Can I use it on client sites?', 'a' => 'Yes. The Pro license covers up to 5 WordPress sites, which makes it practical for client delivery and internal use.'],
  ['q' => 'What if it is not a fit?', 'a' => 'You are covered by a 30-day money-back guarantee. If it does not fit your workflow, email hello@iakpress.com within 30 days.'],
];

get_header();
?>

<div class="font-sans text-gray-900 antialiased">

  <!-- Hero -->
  <section class="bg-white py-16 px-4 sm:px-6 lg:px-8 border-b border-gray-100 text-center">
    <div class="max-w-3xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3">Pricing</p>
      <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-gray-900 mb-5">Start free. Upgrade when you are ready to build and sell custom client portals.</h1>
      <p class="text-lg text-gray-500 leading-relaxed max-w-2xl mx-auto">The free plugin gives you a ready-to-use document intake portal inside WordPress. Pro gives you the builder, custom packs, advanced fields, and the license you need to turn portals into a repeatable service.</p>
      <div class="mt-8 flex flex-col sm:flex-row gap-3 justify-center">
        <button class="xpressui-checkout-btn bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition disabled:opacity-50 disabled:cursor-not-allowed">Get Pro lifetime — €129</button>
        <a href="<?php echo esc_url($download_url); ?>" target="_blank" rel="noreferrer" class="bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-bold py-3 px-6 rounded-lg transition text-center">Download free plugin</a>
      </div>
      <p class="mt-4 text-sm text-gray-500">One-time payment · lifetime access · up to 5 sites · 30-day money-back guarantee</p>
    </div>
  </section>

  <!-- Positioning strip -->
  <section class="bg-gray-50 py-8 px-4 sm:px-6 lg:px-8 border-b border-gray-100">
    <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-4 text-center">
      <div class="bg-white rounded-2xl border border-gray-100 p-5">
        <p class="text-sm font-semibold text-gray-900 mb-1">Try before you buy</p>
        <p class="text-sm text-gray-500">Use the free portal on a real WordPress site first.</p>
      </div>
      <div class="bg-white rounded-2xl border border-gray-100 p-5">
        <p class="text-sm font-semibold text-gray-900 mb-1">Built for delivery</p>
        <p class="text-sm text-gray-500">Create reusable client portals instead of one-off forms.</p>
      </div>
      <div class="bg-white rounded-2xl border border-gray-100 p-5">
        <p class="text-sm font-semibold text-gray-900 mb-1">Pays for itself fast</p>
        <p class="text-sm text-gray-500">A single client setup can cover the full Pro price.</p>
      </div>
    </div>
  </section>

  <!-- Pricing cards -->
  <section class="bg-white py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-6 items-stretch">

      <article class="bg-gray-50 rounded-3xl border border-gray-100 p-8 flex flex-col">
        <span class="inline-block px-3 py-1 rounded-full bg-white border border-gray-200 text-xs font-bold text-gray-600 uppercase tracking-wider mb-4 w-fit">Free</span>
        <h2 class="text-2xl font-bold text-gray-900 mb-2">Start with the ready-to-use portal</h2>
        <p class="text-gray-500 mb-6">Best if you want to test the experience on your own site before committing.</p>
        <div class="flex items-baseline gap-2 mb-6">
          <span class="text-5xl font-extrabold text-gray-900">€0</span>
          <span class="text-gray-500 text-sm">GitHub download</span>
        </div>
        <ul class="space-y-3 mb-8 flex-1">
          <?php foreach ([
            '1 bundled Document Intake portal',
            'WordPress inbox for submissions',
            'File uploads, statuses, and team assignment',
            'Great for validating the client experience',
            'Community support via GitHub'
          ] as $item): ?>
          <li class="flex items-start gap-3 text-sm text-gray-600">
            <svg class="h-5 w-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            <?php echo esc_html($item); ?>
          </li>
          <?php endforeach; ?>
        </ul>
        <a href="<?php echo esc_url($download_url); ?>" target="_blank" rel="noreferrer" class="block text-center bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-bold py-3 px-6 rounded-lg transition">Download the free plugin</a>
      </article>

      <article class="bg-gray-900 rounded-3xl border border-gray-800 p-8 flex flex-col relative overflow-hidden">
        <div class="absolute top-0 right-0 bg-blue-600 text-white text-xs font-bold uppercase tracking-wider px-4 py-2 rounded-bl-2xl">Best value</div>
        <span class="inline-block px-3 py-1 rounded-full bg-blue-600 text-xs font-bold text-white uppercase tracking-wider mb-4 w-fit">Pro</span>
        <h2 class="text-2xl font-bold text-white mb-2">Build custom portals and use them on client projects</h2>
        <p class="text-gray-300 mb-6">Best for freelancers, agencies, and teams that want a repeatable service they can ship fast.</p>
        <div class="flex items-baseline gap-2 mb-2">
          <span class="text-5xl font-extrabold text-white">€129</span>
          <span class="text-gray-400 text-sm">one-time</span>
        </div>
        <p class="text-sm text-blue-200 mb-6">Lifetime access · up to 5 WordPress sites · all future updates</p>
        <ul class="space-y-3 mb-8 flex-1">
          <?php foreach ([
            'Everything in Free',
            'Visual Console builder for custom portals',
            'Install and ship your own workflow packs',
            'Advanced fields including QR and document scan',
            'Customize labels, rules, and design tokens',
            'Priority email support and automatic updates'
          ] as $item): ?>
          <li class="flex items-start gap-3 text-sm text-gray-200">
            <svg class="h-5 w-5 text-blue-400 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            <?php echo esc_html($item); ?>
          </li>
          <?php endforeach; ?>
        </ul>
        <button class="xpressui-checkout-btn w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition disabled:opacity-50 disabled:cursor-not-allowed">Get Pro lifetime — €129</button>
        <p class="text-center text-xs text-gray-400 mt-3">Use it yourself or deliver it on up to 5 sites.</p>
      </article>

    </div>
  </section>

  <!-- Why Pro -->
  <section class="bg-gray-50 py-20 px-4 sm:px-6 lg:px-8 border-t border-gray-100 border-b border-gray-100">
    <div class="max-w-5xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3 text-center">Why teams upgrade</p>
      <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">Pro is for selling and reusing portals — not just testing one.</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <article class="bg-white rounded-2xl border border-gray-100 p-6 text-center">
          <h3 class="text-xl font-bold text-gray-900 mb-3">Save time</h3>
          <p class="text-gray-500 text-sm leading-relaxed">Reuse proven intake flows instead of rebuilding each project from scratch.</p>
        </article>
        <article class="bg-white rounded-2xl border border-gray-100 p-6 text-center">
          <h3 class="text-xl font-bold text-gray-900 mb-3">Charge more</h3>
          <p class="text-gray-500 text-sm leading-relaxed">Package document portals as a premium WordPress service for client onboarding.</p>
        </article>
        <article class="bg-white rounded-2xl border border-gray-100 p-6 text-center">
          <h3 class="text-xl font-bold text-gray-900 mb-3">Look professional</h3>
          <p class="text-gray-500 text-sm leading-relaxed">Give clients a cleaner, more structured way to send documents and complete intake.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- Comparison table -->
  <section class="bg-white py-20 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3 text-center">Compare plans</p>
      <h2 class="text-3xl font-bold text-gray-900 mb-4 text-center">See exactly what changes when you go Pro.</h2>
      <p class="text-center text-gray-500 max-w-2xl mx-auto mb-10">Start free if you only need the bundled portal. Go Pro when you want to design your own client intake systems and ship them repeatedly.</p>

      <div class="rounded-2xl border border-gray-100 overflow-hidden bg-white shadow-sm">
        <div class="grid bg-gray-50 border-b border-gray-100" style="grid-template-columns:minmax(0,1fr) 100px 100px">
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
          <div class="grid bg-gray-50 <?php echo $i > 0 ? 'border-t border-gray-100' : ''; ?> border-b border-gray-100" style="grid-template-columns:minmax(0,1fr) 100px 100px">
            <div class="py-2 px-5 text-xs font-bold text-gray-400 uppercase tracking-wider"><?php echo esc_html($row['group']); ?></div>
            <div class="border-l border-gray-100"></div>
            <div class="border-l border-gray-100"></div>
          </div>
          <?php endif; ?>
          <div class="grid items-center <?php echo $is_last ? '' : 'border-b border-gray-50'; ?>" style="grid-template-columns:minmax(0,1fr) 100px 100px">
            <div class="py-3 px-5 text-sm text-gray-600"><?php echo esc_html($row['label']); ?></div>
            <div class="py-3 px-4 text-center border-l border-gray-50 text-base">
              <?php if ($row['free'] === true): ?><span class="text-green-500 font-bold">✓</span>
              <?php elseif ($row['free'] === false): ?><span class="text-gray-300">—</span>
              <?php else: ?><span class="text-xs text-gray-400"><?php echo esc_html($row['free']); ?></span><?php endif; ?>
            </div>
            <div class="py-3 px-4 text-center border-l border-gray-50 text-base<?php echo $row['pro'] === true ? ' bg-blue-50/40' : ''; ?>">
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
  <section class="bg-gray-50 py-20 px-4 sm:px-6 lg:px-8 border-t border-gray-100">
    <div class="max-w-5xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3 text-center">FAQ</p>
      <h2 class="text-3xl font-bold text-gray-900 mb-10 text-center">Questions before you buy.</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <?php foreach ($faq_items as $item): ?>
        <article class="bg-white rounded-2xl border border-gray-100 p-6">
          <h3 class="font-bold text-gray-900 mb-3 text-base leading-snug"><?php echo esc_html($item['q']); ?></h3>
          <p class="text-sm text-gray-500 leading-relaxed"><?php echo esc_html($item['a']); ?></p>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Final CTA -->
  <section class="bg-gray-900 py-20 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto text-center">
      <p class="text-sm font-bold tracking-widest text-blue-400 uppercase mb-2">Ready to build?</p>
      <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">Use the free portal today. Upgrade when you want your own repeatable system.</h2>
      <p class="text-gray-400 max-w-2xl mx-auto mb-8">If you just want to test the experience, start free. If you want to build custom client portals you can reuse and sell, Pro is the right move.</p>
      <div class="flex flex-col sm:flex-row gap-3 justify-center">
        <button class="xpressui-checkout-btn bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition disabled:opacity-50 disabled:cursor-not-allowed">Get Pro lifetime — €129</button>
        <a href="<?php echo esc_url($download_url); ?>" target="_blank" rel="noreferrer" class="bg-white/10 border border-white/20 hover:bg-white/20 text-white font-bold py-3 px-6 rounded-lg transition text-center">Download free plugin</a>
      </div>
      <p class="text-xs text-gray-500 mt-4">30-day money-back guarantee · Secure checkout</p>
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
