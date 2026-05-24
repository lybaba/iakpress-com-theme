<?php
/**
 * Template for the /pro/ page — XPressUI Pro sales page.
 * WordPress automatically loads this for a page with slug "pro".
 */

$pro_features = [
  ['icon' => '🧩', 'label' => 'Build reusable portals',          'desc' => 'Create structured intakes once, then reuse them across client projects instead of rebuilding each time.'],
  ['icon' => '⚙️', 'label' => 'Customize on the client site',         'desc' => 'Edit labels, choices, validation rules, colors, and messages from the client-site admin without rebuilding the workflow pack.'],
  ['icon' => '🔄', 'label' => 'Sync from the Console',          'desc' => 'Pull workflow packs directly from your XPressUI Console instead of relying on manual ZIP handling for every update.'],
  ['icon' => '📎', 'label' => 'Collect files properly',          'desc' => 'Use uploads, statuses, and structured steps to stop chasing missing documents after kickoff.'],
  ['icon' => '📚', 'label' => 'Connect dynamic catalogs',        'desc' => 'Pair client-site workflows with Cloud catalogs for reusable products, options, slots, dates, and member lists when static choices are not enough.'],
  ['icon' => '🚀', 'label' => 'Use specialized runtime features', 'desc' => 'Unlock richer guided flows and specialized capture only when the workflow actually needs them.'],
  ['icon' => '🔑', 'label' => 'Starter license for 5 sites',     'desc' => 'One purchase covers your own stack or multiple client sites, with updates included.'],
];

$personas = [
  ['icon' => '🧾', 'role' => 'Accounting and document-heavy teams',   'pain' => 'Client files arrive late, incomplete, or scattered across channels during monthly and annual cycles.', 'win' => 'Run one repeatable checklist flow and receive cleaner document sets from day one.'],
  ['icon' => '🏢', 'role' => 'Agency serving accounting clients',    'pain' => 'Your team keeps rebuilding similar intake pages and follow-up flows for each client account.', 'win' => 'Reuse a proven intake structure and deliver a consistent kickoff experience faster.'],
  ['icon' => '🛠️', 'role' => 'Operations team with recurring intake', 'pain' => 'Manual relaunches and missing-file chases slow delivery every cycle.', 'win' => 'Standardize intake once, then run the same process with better completion rates.'],
];

$screenshots = [
  ['src' => xpressui_asset_url('admin-workflows.png'),         'label' => 'Portal builder',     'desc' => 'Design your intake structure, steps, and logic visually.'],
  ['src' => xpressui_asset_url('admin-project-inbox.png'),     'label' => 'Submission inbox',   'desc' => 'See incoming client submissions in one place instead of across email threads.'],
  ['src' => xpressui_asset_url('admin-submission-detail.png'), 'label' => 'Submission detail',  'desc' => 'Open a submission and review answers, files, and progress in one screen.'],
];

$faq_items = [
  ['q' => 'Who should buy Pro?',                    'a' => 'Pro is for accounting firms and agencies that need repeatable document intake with less back-and-forth.'],
  ['q' => 'Can I use it on client sites?',          'a' => 'Yes. The Pro license covers up to 5 client sites, which makes it practical for client delivery as well as internal use.'],
  ['q' => 'Do I need to code the portals?',         'a' => 'No. The builder is visual. If you can install XPressUI and publish an embed, you can use XPressUI Pro.'],
  ['q' => 'What does Pro unlock?',                  'a' => 'Pro adds the full runtime, advanced field types, local workflow customization in the client-site admin, Console Sync, automatic updates, and the commercial license for up to 5 sites.'],
  ['q' => 'Is €129 a subscription?',                'a' => 'No. It is a one-time Starter payment for use on up to 5 client sites, with updates included.'],
  ['q' => 'What if it is not a fit?',               'a' => 'You are covered by a 30-day money-back guarantee. If it does not fit your workflow, email hello@iakpress.com within 30 days.'],
];

$contact_url = home_url('/contact/');
$agency_url  = home_url('/agency-pilot/');

get_header();
?>

<div class="font-sans text-gray-900 antialiased">

  <!-- Hero -->
  <section class="bg-white py-24 px-4 sm:px-6 lg:px-8 text-center border-b border-gray-100">
    <div class="max-w-4xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-4">XPressUI Pro</p>
      <h1 class="text-5xl md:text-6xl font-extrabold tracking-tight text-gray-900 mb-6 leading-tight">
        Run repeatable document intake workflows you can ship with confidence.
      </h1>
      <p class="text-xl text-gray-500 mb-10 max-w-3xl mx-auto leading-relaxed">
        XPressUI Pro is for teams that need structured outcomes, not ad hoc attachments and manual follow-up. Add local workflow customization, Console Sync, reusable workflow delivery, and optional Cloud catalogs when client projects need dynamic products, dates, slots, or member lists.
      </p>
      <div class="flex flex-col sm:flex-row justify-center gap-4">
        <a href="<?php echo esc_url($contact_url); ?>" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition shadow-lg shadow-blue-500/30">
          Discuss Cloud plan
        </a>
        <a href="<?php echo esc_url(home_url('/pricing/')); ?>"
           class="bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-bold py-4 px-8 rounded-lg transition">
          Compare plans
        </a>
      </div>
      <p class="mt-4 text-sm text-gray-400">Starter offer: one-time payment · up to 5 sites · 30-day money-back guarantee</p>
    </div>
  </section>

  <section class="bg-blue-50/60 border-b border-blue-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto rounded-3xl border border-blue-100 bg-white p-8 shadow-sm">
      <div class="grid grid-cols-1 lg:grid-cols-[1.2fr_0.8fr] gap-8 items-center">
        <div>
          <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3">Need delivery, not just a license?</p>
          <h2 class="text-2xl md:text-3xl font-extrabold tracking-tight text-gray-900 mb-3">Prepare the Pro runtime path. Start a pilot when you want the first workflow delivered with you.</h2>
          <p class="text-gray-600 leading-relaxed">
            The assisted path turns one real intake, reservation, catalog order, or payment-proof workflow into a working delivery before you standardize it for more clients.
          </p>
        </div>
        <div class="rounded-2xl border border-blue-100 bg-blue-50 p-5">
          <p class="text-xs font-bold tracking-widest text-blue-600 uppercase mb-3">Fast commercial route</p>
          <ul class="space-y-3 text-sm text-gray-700 mb-5">
            <li><strong class="text-gray-900">€129:</strong> Pro license for self-managed delivery.</li>
            <li><strong class="text-gray-900">From €299:</strong> hosted workflow setup.</li>
            <li><strong class="text-gray-900">From €790:</strong> client-site delivery and validation.</li>
          </ul>
          <div class="flex flex-col sm:flex-row gap-3">
            <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex justify-center rounded-xl bg-blue-600 px-5 py-3 text-sm font-bold text-white hover:bg-blue-700 transition">
              Scope my workflow
            </a>
            <a href="<?php echo esc_url($agency_url); ?>" class="inline-flex justify-center rounded-xl bg-white px-5 py-3 text-sm font-bold text-gray-900 border border-blue-100 hover:border-blue-200 transition">
              See pilot
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Outcome strip -->
  <section class="bg-gray-50 border-b border-gray-100 py-10 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-4 text-left">
      <?php foreach ([
        ['title' => 'Ship faster', 'body' => 'Turn the same intake pattern into a reusable workflow instead of rebuilding every cycle.'],
        ['title' => 'Reduce follow-ups', 'body' => 'Give clients one checklist flow and reduce back-and-forth for missing documents.'],
        ['title' => 'Reuse data', 'body' => 'Connect products, dates, service slots, and members through Cloud catalogs when the workflow needs live business data.'],
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
      <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">Built for teams that run recurring document intake.</h2>
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
          <p class="text-gray-500 leading-relaxed mb-6">One Starter purchase unlocks the full runtime, local workflow customization, Console Sync, updates for your commercial add-on, and a clean upgrade path to Cloud catalogs.</p>
          <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex justify-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition">
            Discuss Cloud plan
          </a>
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
          <span class="inline-block px-3 py-1 rounded-full bg-blue-600 text-xs font-bold text-white uppercase tracking-wider mb-4">Pro · Starter</span>
          <h3 class="text-2xl font-bold text-gray-900 mb-2">Custom portals for real client work</h3>
          <p class="text-gray-500 mb-6 text-sm">Pay once for Starter. Build and reuse workflows now, with Scale options planned for larger multi-site teams.</p>
          <ul class="space-y-3 mb-6">
            <?php foreach (['Full runtime + specialized workflow features', 'Customize Workflow in the client-site admin', 'Console Sync + Pro license', 'Use on up to 5 sites', 'Updates included'] as $t): ?>
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
          <a href="<?php echo esc_url($contact_url); ?>" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded-lg transition shadow-lg shadow-blue-600/30">
            Discuss Cloud plan
          </a>
          <p class="mt-3 text-xs text-gray-400">Direct Pro sales are paused while XPressUI Free is being validated by WordPress.org.</p>
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
      <p class="text-gray-500 mb-8 leading-relaxed">Use it to standardize client intake, collect files properly, and deliver a more professional workflow experience from the start.</p>
      <div class="flex flex-col sm:flex-row justify-center gap-4">
        <a href="<?php echo esc_url($contact_url); ?>" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition shadow-lg shadow-blue-500/30">
          Discuss Cloud plan
        </a>
        <a href="<?php echo esc_url(home_url('/document-intake/')); ?>"
           class="bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-bold py-4 px-8 rounded-lg transition">
          Try the live demo
        </a>
      </div>
    </div>
  </section>

</div>

<?php get_footer(); ?>
