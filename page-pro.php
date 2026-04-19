<?php
/**
 * Template for the /pro/ page — XPressUI Pro sales page.
 * WordPress automatically loads this for a page with slug "pro".
 */

$pro_features = [
  ['icon' => '⚡', 'label' => 'Design any intake in minutes',          'desc' => 'Drag fields, set steps, add conditional logic — no code, no PHP. Export to WordPress when you\'re done.'],
  ['icon' => '🔀', 'label' => 'Skip irrelevant questions automatically', 'desc' => 'Conditional steps adapt to each client\'s answers. Clients only see what\'s relevant to them.'],
  ['icon' => '📎', 'label' => 'Collect files without a plugin stack',   'desc' => 'Upload fields, approval flows, and document collection built in. No add-ons needed.'],
  ['icon' => '📤', 'label' => 'One click to deploy on WordPress',       'desc' => 'Export as a ZIP, upload in wp-admin. The workflow is live as a shortcode immediately.'],
  ['icon' => '📥', 'label' => 'Review everything in one screen',        'desc' => 'Submissions, files, and status — New / In Review / Done — all inside wp-admin.'],
  ['icon' => '🔑', 'label' => 'Lifetime license · 5 sites',            'desc' => 'Pay once, use it on up to 5 WordPress sites. Updates included, no subscription.'],
];

$personas = [
  ['icon' => '🧑‍💻', 'role' => 'Freelancer building 3–5 sites a year',   'pain' => 'You spend hours chasing briefs and missing files before every project starts.',         'win' => 'One intake page collects everything before kickoff — no more back-and-forth.'],
  ['icon' => '🏢',   'role' => 'Small agency with recurring onboarding',  'pain' => 'Every client onboarding is a variation of the same scattered email thread.',           'win' => 'Standardize the intake once, deploy on every client site in minutes.'],
  ['icon' => '🛠️',  'role' => 'Developer who builds for clients',        'pain' => 'Clients ask for custom intake forms that take days to build from scratch.',            'win' => 'Deliver polished intake flows faster — without hand-coding HTML forms each time.'],
];

$screenshots = [
  ['src' => xpressui_asset_url('admin-workflows.png'),         'label' => 'Workflow builder',  'desc' => 'Design steps, fields, and conditional logic — then export. No code.'],
  ['src' => xpressui_asset_url('admin-project-inbox.png'),     'label' => 'Submissions inbox', 'desc' => 'Every new submission lands here. No more scattered emails.'],
  ['src' => xpressui_asset_url('admin-submission-detail.png'), 'label' => 'Submission detail', 'desc' => 'Answers, files, and notes in one structured screen.'],
];

$faq_items = [
  ['q' => 'Do I need to know PHP or JavaScript?',           'a' => 'No. The builder is fully visual. Activating the plugin in wp-admin is the only technical step. If you can install a WordPress plugin, you can use XPressUI Pro.'],
  ['q' => 'What if it conflicts with my WordPress theme?',  'a' => 'XPressUI uses strictly scoped CSS. The intake form is isolated from your theme — it won\'t inherit or override your theme\'s styles. It works with Divi, Elementor, Astra, and any other theme.'],
  ['q' => 'What is the refund policy?',                     'a' => '30-day money-back guarantee. If it doesn\'t work for your WordPress setup within 30 days, email us at hello@iakpress.com and we\'ll refund you in full — no questions asked.'],
  ['q' => 'What is included in the Pro license?',           'a' => 'Full access to the XPressUI Console builder. Design any workflow, export it to WordPress with one click, and manage all submissions in one place. Lifetime updates included.'],
  ['q' => 'How many sites does the license cover?',         'a' => 'Up to 5 sites. One purchase, five activations — no extra cost per site.'],
  ['q' => 'Is it really a lifetime license?',               'a' => 'Yes. Pay once, use it forever. No subscription, no annual renewal. All future updates are included.'],
  ['q' => 'Can I try it before buying?',                    'a' => 'Yes. The free plugin ships with two built-in workflows. Install it, embed the shortcode, and see how the intake experience works before purchasing Pro.'],
  ['q' => 'What happens after I purchase?',                 'a' => 'You receive a license key by email immediately after checkout. Activate the Pro plugin on your WordPress site and start building custom workflows right away.'],
];

get_header();
?>

<div class="font-sans text-gray-900 antialiased">

  <!-- Hero -->
  <section class="bg-white py-24 px-4 sm:px-6 lg:px-8 text-center border-b border-gray-100">
    <div class="max-w-4xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-4">XPressUI Pro</p>
      <h1 class="text-5xl md:text-6xl font-extrabold tracking-tight text-gray-900 mb-6 leading-tight">
        Stop building intake flows<br class="hidden md:block"/> from scratch.
      </h1>
      <p class="text-xl text-gray-500 mb-10 max-w-2xl mx-auto leading-relaxed">
        Pro unlocks the visual workflow builder — design any multi-step intake, add conditional logic and file uploads, then deploy it to any WordPress site in one click.
      </p>
      <div class="flex flex-col sm:flex-row justify-center gap-4">
        <button class="xpressui-checkout-btn bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition shadow-lg shadow-blue-500/30 disabled:opacity-50 disabled:cursor-not-allowed">
          Buy Pro — €49 lifetime →
        </button>
        <a href="<?php echo esc_url(home_url('/install/')); ?>"
           class="bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-bold py-4 px-8 rounded-lg transition">
          See the free starter first
        </a>
      </div>
      <p class="mt-4 text-sm text-gray-400">Lifetime license · Up to 5 sites · 30-day money-back guarantee</p>
    </div>
  </section>

  <!-- Value stats -->
  <section class="bg-gray-50 border-b border-gray-100 py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">
      <?php foreach ([
        ['stat' => '2–3 h',    'label' => 'Saved per client onboarding', 'note' => 'No more chasing briefs and missing files by email'],
        ['stat' => '< 30 min', 'label' => 'To go live on WordPress',      'note' => 'Build, export, shortcode — done'],
        ['stat' => '€49',      'label' => 'Paid back in one project',     'note' => 'One saved onboarding covers the full cost'],
      ] as $item): ?>
      <div class="bg-white rounded-2xl border border-gray-100 p-8 text-center shadow-sm">
        <div class="text-4xl font-extrabold text-blue-600 mb-2 tracking-tight"><?php echo esc_html($item['stat']); ?></div>
        <div class="font-bold text-gray-900 mb-1 text-sm"><?php echo esc_html($item['label']); ?></div>
        <div class="text-xs text-gray-400 leading-relaxed"><?php echo esc_html($item['note']); ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- Who is this for -->
  <section class="bg-white py-20 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3 text-center">Who buys Pro</p>
      <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">Built for people who onboard clients repeatedly.</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <?php foreach ($personas as $p): ?>
        <div class="bg-gray-50 rounded-2xl border border-gray-100 p-8">
          <span class="text-3xl block mb-4"><?php echo $p['icon']; ?></span>
          <h3 class="font-bold text-gray-900 mb-4 text-base leading-snug"><?php echo esc_html($p['role']); ?></h3>
          <p class="text-sm text-gray-500 leading-relaxed mb-3"><span class="font-bold text-red-500">Before:</span> <?php echo esc_html($p['pain']); ?></p>
          <p class="text-sm text-gray-600 leading-relaxed"><span class="font-bold text-green-600">After:</span> <?php echo esc_html($p['win']); ?></p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Screenshots -->
  <section class="bg-gray-50 border-t border-gray-100 py-20 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3 text-center">What you get access to</p>
      <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">The important screens are already built.</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <?php foreach ($screenshots as $s): ?>
        <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm">
          <div class="aspect-video overflow-hidden bg-gray-100">
            <img src="<?php echo esc_attr($s['src']); ?>" alt="<?php echo esc_attr($s['label']); ?>" class="w-full h-full object-cover object-top">
          </div>
          <div class="p-5">
            <h3 class="font-bold text-gray-900 mb-1 text-sm"><?php echo esc_html($s['label']); ?></h3>
            <p class="text-xs text-gray-500 leading-relaxed"><?php echo esc_html($s['desc']); ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Feature grid -->
  <section class="bg-white py-20 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="md:col-span-1">
          <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3">What's included</p>
          <h2 class="text-3xl font-bold text-gray-900 mb-4">Everything to ship faster.</h2>
          <p class="text-gray-500 leading-relaxed mb-6">One purchase unlocks the full builder, unlimited workflows, and lifetime updates.</p>
          <button class="xpressui-checkout-btn bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition disabled:opacity-50 disabled:cursor-not-allowed">
            Buy Pro →
          </button>
        </div>
        <div class="md:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-4">
          <?php foreach ($pro_features as $f): ?>
          <div class="bg-gray-50 rounded-2xl border border-gray-100 p-6">
            <span class="text-2xl block mb-3"><?php echo $f['icon']; ?></span>
            <h3 class="font-bold text-gray-900 mb-2 text-sm"><?php echo esc_html($f['label']); ?></h3>
            <p class="text-xs text-gray-500 leading-relaxed"><?php echo esc_html($f['desc']); ?></p>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <!-- Pricing -->
  <section class="bg-gray-900 py-24 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto">
      <div class="bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col md:flex-row">
        <div class="p-8 md:p-10 md:w-2/3">
          <span class="inline-block px-3 py-1 rounded-full bg-blue-600 text-xs font-bold text-white uppercase tracking-wider mb-4">Pro · Lifetime</span>
          <h3 class="text-2xl font-bold text-gray-900 mb-2">Full builder access</h3>
          <p class="text-gray-500 mb-6 text-sm">Pay once. Design unlimited workflows, deploy on up to 5 sites. No subscription, no renewal.</p>
          <ul class="space-y-3 mb-6">
            <?php foreach (['Full builder access', 'Up to 5 WordPress sites', 'Lifetime updates included'] as $t): ?>
            <li class="flex items-center gap-3 text-sm text-gray-700">
              <svg class="h-5 w-5 text-green-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
              <?php echo esc_html($t); ?>
            </li>
            <?php endforeach; ?>
          </ul>
          <p class="text-xs text-gray-400">Not happy within 30 days? <a href="mailto:hello@iakpress.com" class="text-blue-600 hover:underline">hello@iakpress.com</a> — full refund guaranteed.</p>
        </div>
        <div class="bg-gray-50 p-8 md:p-10 md:w-1/3 flex flex-col justify-center items-center text-center border-l border-gray-100">
          <p class="text-gray-500 text-sm font-bold uppercase tracking-widest mb-2">One-time</p>
          <div class="text-6xl font-extrabold text-gray-900 mb-1">€49</div>
          <p class="text-gray-400 text-xs mb-6">excl. VAT, no hidden fees.</p>
          <button class="xpressui-checkout-btn w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded-lg transition shadow-lg shadow-blue-600/30 disabled:opacity-50 disabled:cursor-not-allowed">
            Get your license →
          </button>
          <p class="mt-3 text-xs text-gray-400">Instant delivery via email · Stripe</p>
        </div>
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
  <section class="bg-white py-20 px-4 sm:px-6 lg:px-8 border-t border-gray-100 text-center">
    <div class="max-w-2xl mx-auto">
      <h2 class="text-3xl font-bold text-gray-900 mb-4">Your next client onboarding starts cleaner.</h2>
      <p class="text-gray-500 mb-8 leading-relaxed">One purchase. Unlimited workflows. Lifetime license. 30-day money-back guarantee.</p>
      <div class="flex flex-col sm:flex-row justify-center gap-4">
        <button class="xpressui-checkout-btn bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition shadow-lg shadow-blue-500/30 disabled:opacity-50 disabled:cursor-not-allowed">
          Buy Pro — €49 →
        </button>
        <a href="<?php echo esc_url(home_url('/contact/')); ?>"
           class="bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-bold py-4 px-8 rounded-lg transition">
          Questions? Contact us
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
