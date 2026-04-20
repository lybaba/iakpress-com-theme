<?php
/**
 * Template for the /pro/ page — XPressUI Pro sales page.
 * WordPress automatically loads this for a page with slug "pro".
 */

$pro_features = [
  ['icon' => '🧩', 'label' => 'Build reusable portals',          'desc' => 'Create structured intakes once, then reuse them across client projects instead of rebuilding each time.'],
  ['icon' => '⚙️', 'label' => 'Adapt the flow to the project',   'desc' => 'Add steps, conditions, upload rules, and field variations without hand-coding new forms.'],
  ['icon' => '📎', 'label' => 'Collect files properly',          'desc' => 'Use uploads, statuses, and structured steps to stop chasing missing documents after kickoff.'],
  ['icon' => '🚀', 'label' => 'Deploy in WordPress fast',        'desc' => 'Export your portal, install it, and publish it as a shortcode on the site you already manage.'],
  ['icon' => '📥', 'label' => 'Review submissions in one place', 'desc' => 'Answers, files, and workflow status live in one clean admin view instead of across inboxes.'],
  ['icon' => '🔑', 'label' => 'Lifetime license for 5 sites',    'desc' => 'One purchase covers your own stack or multiple client sites, with updates included.'],
];

$personas = [
  ['icon' => '🧑‍💻', 'role' => 'Freelancer delivering client sites', 'pain' => 'Every new project starts with the same brief, assets, and missing-file chase.', 'win' => 'Package onboarding into one portal and start projects with everything already organized.'],
  ['icon' => '🏢', 'role' => 'Agency standardizing onboarding',     'pain' => 'Your team keeps recreating intake pages, checklists, and upload flows for similar projects.', 'win' => 'Reuse one proven portal structure across projects and deliver a more professional kickoff.'],
  ['icon' => '🛠️', 'role' => 'Service business using WordPress',    'pain' => 'Clients struggle to submit complete documents the first time, which slows the entire workflow.', 'win' => 'Guide clients step by step and get cleaner submissions from day one.'],
];

$screenshots = [
  ['src' => xpressui_asset_url('admin-workflows.png'),         'label' => 'Portal builder',     'desc' => 'Design your intake structure, steps, and logic visually.'],
  ['src' => xpressui_asset_url('admin-project-inbox.png'),     'label' => 'Submission inbox',   'desc' => 'See incoming client submissions in one place instead of across email threads.'],
  ['src' => xpressui_asset_url('admin-submission-detail.png'), 'label' => 'Submission detail',  'desc' => 'Open a submission and review answers, files, and progress in one screen.'],
];

$faq_items = [
  ['q' => 'Who should buy Pro?',                    'a' => 'Pro is for freelancers, agencies, and teams that want to create custom client portals, reuse them across projects, and turn onboarding into a repeatable service.'],
  ['q' => 'Can I use it on client sites?',          'a' => 'Yes. The Pro license covers up to 5 WordPress sites, which makes it practical for client delivery as well as internal use.'],
  ['q' => 'Do I need to code the portals?',         'a' => 'No. The builder is visual. If you can install a WordPress plugin and publish a shortcode, you can use XPressUI Pro.'],
  ['q' => 'What does Pro unlock?',                  'a' => 'Pro unlocks the visual builder, custom workflow pack installation, advanced fields, local customization in wp-admin, automatic updates, and priority support.'],
  ['q' => 'Is €129 a subscription?',                'a' => 'No. It is a one-time payment for lifetime access, future updates, and use on up to 5 WordPress sites.'],
  ['q' => 'What if it is not a fit?',               'a' => 'You are covered by a 30-day money-back guarantee. If it does not fit your workflow, email hello@iakpress.com within 30 days.'],
];

get_header();
?>

<div class="font-sans text-gray-900 antialiased">

  <!-- Hero -->
  <section class="bg-white py-24 px-4 sm:px-6 lg:px-8 text-center border-b border-gray-100">
    <div class="max-w-4xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-4">XPressUI Pro</p>
      <h1 class="text-5xl md:text-6xl font-extrabold tracking-tight text-gray-900 mb-6 leading-tight">
        Build client document portals you can reuse, brand, and sell.
      </h1>
      <p class="text-xl text-gray-500 mb-10 max-w-3xl mx-auto leading-relaxed">
        Pro is for teams that need more than a single bundled demo portal. Build custom intake flows, reuse them across projects, and turn chaotic onboarding into a repeatable WordPress service.
      </p>
      <div class="flex flex-col sm:flex-row justify-center gap-4">
        <button class="xpressui-checkout-btn bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition shadow-lg shadow-blue-500/30 disabled:opacity-50 disabled:cursor-not-allowed">
          Buy Pro — €129 lifetime
        </button>
        <a href="<?php echo esc_url(home_url('/pricing/')); ?>"
           class="bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-bold py-4 px-8 rounded-lg transition">
          Compare plans
        </a>
      </div>
      <p class="mt-4 text-sm text-gray-400">One-time payment · lifetime access · up to 5 sites · 30-day money-back guarantee</p>
    </div>
  </section>

  <!-- Outcome strip -->
  <section class="bg-gray-50 border-b border-gray-100 py-10 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-4 text-left">
      <?php foreach ([
        ['title' => 'Ship faster', 'body' => 'Turn the same onboarding pattern into a reusable portal instead of rebuilding every time.'],
        ['title' => 'Charge more', 'body' => 'Package client portals as a premium WordPress service with a clearer business story.'],
        ['title' => 'Start cleaner', 'body' => 'Get files, answers, and missing documents structured before the project begins.'],
      ] as $item): ?>
      <div class="bg-white rounded-2xl border border-gray-100 p-6 shadow-sm">
        <h2 class="text-lg font-bold text-gray-900 mb-2"><?php echo esc_html($item['title']); ?></h2>
        <p class="text-sm text-gray-500 leading-relaxed"><?php echo esc_html($item['body']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- Who is this for -->
  <section class="bg-white py-20 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3 text-center">Who buys Pro</p>
      <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">Built for teams that onboard clients repeatedly.</h2>
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
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3 text-center">What Pro gives you</p>
      <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">The important screens are already there.</h2>
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
          <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3">What is included</p>
          <h2 class="text-3xl font-bold text-gray-900 mb-4">Everything you need to deliver portals faster.</h2>
          <p class="text-gray-500 leading-relaxed mb-6">One purchase unlocks the full builder, unlimited workflows, and lifetime updates.</p>
          <button class="xpressui-checkout-btn bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition disabled:opacity-50 disabled:cursor-not-allowed">
            Buy Pro
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
          <h3 class="text-2xl font-bold text-gray-900 mb-2">Custom portals for real client work</h3>
          <p class="text-gray-500 mb-6 text-sm">Pay once. Build and reuse as many workflows as you want. Use Pro on up to 5 WordPress sites with all future updates included.</p>
          <ul class="space-y-3 mb-6">
            <?php foreach (['Visual builder access', 'Unlimited custom workflows', 'Use on up to 5 sites', 'Lifetime updates included'] as $t): ?>
            <li class="flex items-center gap-3 text-sm text-gray-700">
              <svg class="h-5 w-5 text-green-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
              <?php echo esc_html($t); ?>
            </li>
            <?php endforeach; ?>
          </ul>
          <p class="text-xs text-gray-400">30-day money-back guarantee. Questions? <a href="mailto:hello@iakpress.com" class="text-blue-600 hover:underline">hello@iakpress.com</a></p>
        </div>
        <div class="bg-gray-50 p-8 md:p-10 md:w-1/3 flex flex-col justify-center items-center text-center border-l border-gray-100">
          <p class="text-gray-500 text-sm font-bold uppercase tracking-widest mb-2">One-time</p>
          <div class="text-6xl font-extrabold text-gray-900 mb-1">€129</div>
          <p class="text-gray-400 text-xs mb-6">No subscription. No renewal.</p>
          <button class="xpressui-checkout-btn w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded-lg transition shadow-lg shadow-blue-600/30 disabled:opacity-50 disabled:cursor-not-allowed">
            Get your license
          </button>
          <p class="mt-3 text-xs text-gray-400">Instant delivery via email</p>
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
      <h2 class="text-3xl font-bold text-gray-900 mb-4">If you want cleaner onboarding, Pro is the fastest path.</h2>
      <p class="text-gray-500 mb-8 leading-relaxed">Use it to standardize client intake, collect files properly, and deliver a more professional WordPress experience from the start.</p>
      <div class="flex flex-col sm:flex-row justify-center gap-4">
        <button class="xpressui-checkout-btn bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition shadow-lg shadow-blue-500/30 disabled:opacity-50 disabled:cursor-not-allowed">
          Buy Pro — €129
        </button>
        <a href="<?php echo esc_url(home_url('/document-intake/')); ?>"
           class="bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-bold py-4 px-8 rounded-lg transition">
          Try the live demo
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
