<?php
/**
 * Template for the /pricing/ page — pricing, comparison table, FAQ, CTA.
 * WordPress automatically loads this for a page with slug "pricing".
 */

$download_url = 'https://github.com/lybaba/xpressui-packages/releases/latest';
$agency_pilot_url = home_url('/agency-pilot/');

$rows = [
  ['group' => 'Start with XPressUI Free', 'label' => 'Ready-to-use Document Intake portal', 'free' => true, 'pro' => true, 'cloud' => true],
  ['group' => '', 'label' => 'Client-site submission inbox', 'free' => true, 'pro' => true, 'cloud' => false],
  ['group' => '', 'label' => 'Console submission inbox', 'free' => false, 'pro' => false, 'cloud' => true],
  ['group' => '', 'label' => 'File uploads and status tracking', 'free' => true, 'pro' => true, 'cloud' => true],
  ['group' => '', 'label' => 'Email notifications and redirect flow', 'free' => true, 'pro' => true, 'cloud' => 'Hosted'],

  ['group' => 'Build custom portals', 'label' => 'Export workflow packs from the Console (.zip)', 'free' => true, 'pro' => true, 'cloud' => 'N/A'],
  ['group' => '', 'label' => 'Install custom workflow packs on the client site', 'free' => true, 'pro' => true, 'cloud' => false],
  ['group' => '', 'label' => 'Console Sync / hosted publish path', 'free' => false, 'pro' => true, 'cloud' => true],
  ['group' => '', 'label' => 'Custom workflows', 'free' => true, 'pro' => true, 'cloud' => '3 hosted'],

  ['group' => 'Workflow data', 'label' => 'Core fields (text, email, file, select...)', 'free' => true, 'pro' => true, 'cloud' => true],
  ['group' => '', 'label' => 'Dynamic product, service, date, and member catalogs', 'free' => false, 'pro' => 'Cloud embed', 'cloud' => true],
  ['group' => '', 'label' => 'CSV import and catalog-backed checkout/review', 'free' => false, 'pro' => 'Cloud embed', 'cloud' => true],
  ['group' => '', 'label' => 'Specialized capture fields when needed', 'free' => false, 'pro' => true, 'cloud' => true],

  ['group' => 'Client delivery', 'label' => 'Customize labels, help text, and choice labels', 'free' => false, 'pro' => true, 'cloud' => true],
  ['group' => '', 'label' => 'Customize validation rules and upload limits', 'free' => false, 'pro' => true, 'cloud' => true],
  ['group' => '', 'label' => 'Design tokens — colors, fonts, border radius', 'free' => false, 'pro' => true, 'cloud' => true],
  ['group' => '', 'label' => 'Hosted workflow links', 'free' => false, 'pro' => false, 'cloud' => true],
  ['group' => '', 'label' => 'Workspace storage, quotas, and audit trail', 'free' => false, 'pro' => false, 'cloud' => true],

  ['group' => 'Support and license', 'label' => 'Price', 'free' => '€0', 'pro' => '€129 once', 'cloud' => '€19/mo'],
  ['group' => '', 'label' => 'Done For You setup', 'free' => false, 'pro' => 'from €790', 'cloud' => 'from €299'],
  ['group' => '', 'label' => 'Community support via GitHub Issues', 'free' => true, 'pro' => true, 'cloud' => false],
  ['group' => '', 'label' => 'Automatic plugin updates', 'free' => false, 'pro' => true, 'cloud' => false],
  ['group' => '', 'label' => 'License valid on up to 5 client sites', 'free' => false, 'pro' => true, 'cloud' => false],
  ['group' => '', 'label' => 'Cloud Solo limits', 'free' => false, 'pro' => false, 'cloud' => '1 workspace'],
  ['group' => '', 'label' => 'Submission allowance', 'free' => false, 'pro' => false, 'cloud' => '500/mo'],
  ['group' => '', 'label' => 'Priority email support (1-2 business days)', 'free' => false, 'pro' => true, 'cloud' => true],
];

$faq_items = [
  ['q' => 'Can I start with XPressUI Free first?', 'a' => 'Yes. XPressUI Free is the easiest way to try the document portal experience on your own client site. You can install the bundled starter, upload custom workflow ZIPs, test the intake flow, and only upgrade when you need advanced fields, Console Sync, or workflow customization.'],
  ['q' => 'What does XPressUI Pro unlock exactly?', 'a' => 'XPressUI Pro adds Customize Workflow (edit labels, choice labels, colors, messages, and validation rules per workflow directly from the client-site admin), Console Sync, specialized runtime features, automatic updates, and the license for up to 5 client sites.'],
  ['q' => 'Where do dynamic catalogs fit?', 'a' => 'Catalogs are the strongest Cloud feature: products, prices, service slots, dates, and member lists can be reused across workflows instead of being hardcoded into static forms. XPressUI Pro can integrate Cloud catalogs when needed, but product catalogs are not exported as portable PHP.'],
  ['q' => 'Where does XPressUI Cloud fit?', 'a' => 'XPressUI Cloud is for teams that want XPressUI to host the public workflow link, submission inbox, files, quotas, catalogs, and operator review instead of running the operations layer on client sites. Cloud starts with Solo at €19/month, then Team and Agency for larger rollout.'],
  ['q' => 'Can you set up the first workflow for us?', 'a' => 'Yes. Done For You setup starts at €299 for a hosted workflow and from €790 for client-site delivery. It is the fastest way to get the first workflow live and reusable.'],
  ['q' => 'Is €129 a subscription?', 'a' => 'No. It is a one-time Starter payment for use on up to 5 client sites, with updates included.'],
  ['q' => 'Who is XPressUI Pro for?', 'a' => 'XPressUI Pro is built for accounting firms and agencies that need repeatable client document intake with less back-and-forth.'],
  ['q' => 'Do you offer a larger agency plan?', 'a' => 'Yes. Larger teams can move toward XPressUI Cloud, higher quotas, team workspace access, and managed rollout. The current Starter offer is the fastest client-site path today.'],
  ['q' => 'Can I use it on client sites?', 'a' => 'Yes. The Pro license covers up to 5 client sites, which makes it practical for client delivery and internal use.'],
  ['q' => 'What if it is not a fit?', 'a' => 'You are covered by a 30-day money-back guarantee. If it does not fit your workflow, email hello@iakpress.com within 30 days.'],
];

$cloud_tiers = [
  [
    'name' => 'Solo',
    'price' => '€19',
    'period' => '/month',
    'tag' => 'Start one workflow',
    'body' => 'Best for a single team validating hosted intake, catalogs, files, and review before scaling.',
    'items' => [
      '1 workspace',
      '100 submissions/month',
      'Hosted workflow links',
      'Dynamic catalogs',
      'Console inbox and file review',
    ],
  ],
  [
    'name' => 'Team',
    'price' => '€49',
    'period' => '/month',
    'tag' => 'Most useful after first signal',
    'body' => 'Best when several workflows or operators need shared review, reusable catalogs, and basic AI assistance.',
    'items' => [
      '5 workspaces',
      '500 submissions/month',
      'Team operators and admins',
      'Basic AI extraction/validation path',
      'Priority email support',
    ],
    'featured' => true,
  ],
  [
    'name' => 'Agency',
    'price' => '€129',
    'period' => '/month',
    'tag' => 'For repeatable client delivery',
    'body' => 'Best for agencies turning workflows into a reusable delivery offer across clients and verticals.',
    'items' => [
      'Higher workspace and submission limits',
      'White-label rollout path',
      'Advanced AI extraction/digest path',
      'Template and catalog reuse',
      'Assisted onboarding option',
    ],
  ],
];

get_header();

function xpressui_pricing_cell($value, $color = 'blue') {
  if ($value === true) {
    $class = $color === 'green' ? 'text-green-500' : 'text-blue-600';
    echo '<span class="' . esc_attr($class) . ' font-bold">✓</span>';
    return;
  }
  if ($value === false) {
    echo '<span class="text-gray-300">—</span>';
    return;
  }
  echo '<span class="text-xs text-gray-500 font-semibold">' . esc_html($value) . '</span>';
}
?>

<div class="font-sans text-gray-900 antialiased">

  <!-- Hero -->
  <section class="bg-white py-16 px-4 sm:px-6 lg:px-8 border-b border-gray-100 text-center">
    <div class="max-w-3xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3">Pricing</p>
      <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-gray-900 mb-5">Choose the right path: XPressUI Free, XPressUI Pro, or XPressUI Cloud.</h1>
      <p class="text-lg text-gray-500 leading-relaxed max-w-2xl mx-auto">Start with XPressUI Free on a real client site, use XPressUI Pro for production client-site delivery, or move to XPressUI Cloud when you want hosted links, Console inbox, files, quotas, and team review.</p>
      <div class="mt-8 flex flex-col sm:flex-row gap-3 justify-center">
        <button class="xpressui-checkout-btn bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition disabled:opacity-50 disabled:cursor-not-allowed">Get XPressUI Pro — €129 one-time</button>
        <a href="<?php echo esc_url($download_url); ?>" target="_blank" rel="noreferrer" class="bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-bold py-3 px-6 rounded-lg transition text-center">Download XPressUI Free</a>
      </div>
      <div class="mt-4">
        <a href="<?php echo esc_url($agency_pilot_url); ?>" class="inline-flex justify-center bg-white border border-blue-100 hover:border-blue-200 text-blue-700 font-bold py-3 px-5 rounded-lg transition text-sm">
          Need the first workflow live? See Agency Pilot
        </a>
      </div>
      <p class="mt-4 text-sm text-gray-500">XPressUI Free · XPressUI Pro one-time payment · XPressUI Cloud from €19/month</p>
    </div>
  </section>

  <section class="bg-blue-50/60 py-10 px-4 sm:px-6 lg:px-8 border-b border-blue-100">
    <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-4">
      <?php foreach ([
        ['title' => 'Done For You setup', 'body' => 'Get one branded hosted workflow live from €299 setup, including operator email and a generated document summary.'],
        ['title' => 'Dynamic catalogs', 'body' => 'Products, prices, service slots, options, and members become reusable data instead of static form choices.'],
        ['title' => 'Agency pilot', 'body' => 'agencies can validate XPressUI on 1 to 3 client workflows before committing to a larger plan.'],
      ] as $item): ?>
      <article class="bg-white rounded-2xl border border-blue-100 p-5 shadow-sm">
        <p class="text-sm font-bold text-gray-900 mb-2"><?php echo esc_html($item['title']); ?></p>
        <p class="text-sm text-gray-600 leading-relaxed"><?php echo esc_html($item['body']); ?></p>
      </article>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- Positioning strip -->
  <section class="bg-gray-50 py-8 px-4 sm:px-6 lg:px-8 border-b border-gray-100">
    <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-4 text-center">
      <div class="bg-white rounded-2xl border border-gray-100 p-5">
        <p class="text-sm font-semibold text-gray-900 mb-1">XPressUI Free</p>
        <p class="text-sm text-gray-500">Validate the portal experience on a real client site.</p>
      </div>
      <div class="bg-white rounded-2xl border border-gray-100 p-5">
        <p class="text-sm font-semibold text-gray-900 mb-1">XPressUI Pro</p>
        <p class="text-sm text-gray-500">Ship production workflow packs inside client sites.</p>
      </div>
      <div class="bg-white rounded-2xl border border-gray-100 p-5">
        <p class="text-sm font-semibold text-gray-900 mb-1">XPressUI Cloud</p>
        <p class="text-sm text-gray-500">Ask XPressUI to host links, catalogs, files, inbox, quotas, and review.</p>
      </div>
    </div>
  </section>

  <!-- Offer cards -->
  <section class="bg-white py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 items-stretch">
      <article class="bg-gray-50 rounded-3xl border border-gray-100 p-8 flex flex-col">
        <span class="inline-block px-3 py-1 rounded-full bg-white border border-gray-200 text-xs font-bold text-gray-600 uppercase tracking-wider mb-4 w-fit">XPressUI Free</span>
        <h2 class="text-2xl font-bold text-gray-900 mb-2">Validate the portal on a client site</h2>
        <p class="text-gray-500 mb-6">Best when you want to test the intake experience before buying or rolling out a hosted workflow.</p>
        <div class="flex items-baseline gap-2 mb-6">
          <span class="text-5xl font-extrabold text-gray-900">€0</span>
          <span class="text-gray-500 text-sm">GitHub download</span>
        </div>
        <ul class="space-y-3 mb-8 flex-1">
          <?php foreach ([
            'XPressUI client-site plugin',
            'Bundled document intake workflow',
            'Custom workflow ZIP installation',
            'Submission inbox and file uploads on the client site'
          ] as $item): ?>
          <li class="flex items-start gap-3 text-sm text-gray-600">
            <svg class="h-5 w-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            <?php echo esc_html($item); ?>
          </li>
          <?php endforeach; ?>
        </ul>
        <a href="<?php echo esc_url($download_url); ?>" target="_blank" rel="noreferrer" class="mt-auto block text-center bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-bold py-3 px-6 rounded-lg transition">Download XPressUI Free</a>
      </article>

      <article class="bg-gray-900 rounded-3xl border border-gray-800 p-8 flex flex-col relative overflow-hidden">
        <div class="absolute top-0 right-0 bg-blue-600 text-white text-xs font-bold uppercase tracking-wider px-4 py-2 rounded-bl-2xl">Best value</div>
        <span class="inline-block px-3 py-1 rounded-full bg-blue-600 text-xs font-bold text-white uppercase tracking-wider mb-4 w-fit">XPressUI Pro</span>
        <h2 class="text-2xl font-bold text-white mb-2">Ship production workflows on client sites</h2>
        <p class="text-gray-300 mb-6">Best for agencies and teams that need custom, repeatable document portals on client sites.</p>
        <div class="flex items-baseline gap-2 mb-2">
          <span class="text-5xl font-extrabold text-white">€129</span>
          <span class="text-gray-400 text-sm">one-time</span>
        </div>
        <p class="text-sm text-blue-200 mb-6">Starter offer · up to 5 client sites · updates included</p>
        <ul class="space-y-3 mb-8 flex-1">
          <?php foreach ([
            'Everything in XPressUI Free',
            'Customize Workflow — labels, choices, colors, and messages per workflow from the client-site admin',
            'Console Sync for direct workflow pull',
            'Advanced fields including QR and document scan',
            'Priority email support and automatic updates'
          ] as $item): ?>
          <li class="flex items-start gap-3 text-sm text-gray-200">
            <svg class="h-5 w-5 text-blue-400 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            <?php echo esc_html($item); ?>
          </li>
          <?php endforeach; ?>
        </ul>
        <button class="xpressui-checkout-btn mt-auto w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition disabled:opacity-50 disabled:cursor-not-allowed">Get XPressUI Pro — €129</button>
      </article>

      <article class="bg-blue-50 rounded-3xl border border-blue-100 p-8 flex flex-col">
        <span class="inline-block px-3 py-1 rounded-full bg-white border border-blue-100 text-xs font-bold text-blue-700 uppercase tracking-wider mb-4 w-fit">XPressUI Cloud</span>
        <h2 class="text-2xl font-bold text-gray-900 mb-2">Let XPressUI run hosted operations</h2>
        <p class="text-gray-600 mb-6">Best when the client does not want client-site operations, or when your team needs shared review, quotas, audit, and file handling in Console.</p>
        <div class="flex items-baseline gap-2 mb-2">
          <span class="text-5xl font-extrabold text-gray-900">€19</span>
          <span class="text-gray-500 text-sm">/month</span>
        </div>
        <p class="text-sm text-blue-700 mb-6">Solo from €19/month · Team and Agency available</p>
        <ul class="space-y-3 mb-8 flex-1">
          <?php foreach ([
            '1 workspace and 3 hosted workflows',
            '500 submissions/month',
            'Hosted workflow links',
            'Console inbox, statuses, and operator notes',
            'Workspace file storage, quotas, and audit trail'
          ] as $item): ?>
          <li class="flex items-start gap-3 text-sm text-gray-600">
            <svg class="h-5 w-5 text-blue-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            <?php echo esc_html($item); ?>
          </li>
          <?php endforeach; ?>
        </ul>
        <a href="<?php echo esc_url(home_url('/xpressui-cloud/')); ?>" class="mt-auto block text-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition">Discuss Cloud plan</a>
      </article>

    </div>
  </section>

  <!-- Cloud pricing -->
  <section class="bg-blue-50/60 py-20 px-4 sm:px-6 lg:px-8 border-y border-blue-100">
    <div class="max-w-6xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3 text-center">Cloud pricing</p>
      <h2 class="text-3xl font-bold text-gray-900 mb-4 text-center">Choose the Cloud tier by workflow volume, not by guesswork.</h2>
      <p class="text-center text-gray-600 max-w-3xl mx-auto mb-12">Solo is enough to validate one real workflow. Team adds shared operations and basic AI assistance. Agency is the path for repeatable client delivery, white-label rollout, and higher-volume work.</p>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-stretch">
        <?php foreach ($cloud_tiers as $tier): $featured = !empty($tier['featured']); ?>
        <article class="<?php echo $featured ? 'bg-gray-900 border-gray-800 text-white' : 'bg-white border-blue-100 text-gray-900'; ?> rounded-3xl border p-8 flex flex-col shadow-sm relative overflow-hidden">
          <?php if ($featured): ?>
          <div class="absolute top-0 right-0 bg-blue-600 text-white text-xs font-bold uppercase tracking-wider px-4 py-2 rounded-bl-2xl">Recommended</div>
          <?php endif; ?>
          <p class="<?php echo $featured ? 'text-blue-300' : 'text-blue-600'; ?> text-sm font-bold tracking-widest uppercase mb-3"><?php echo esc_html($tier['tag']); ?></p>
          <h3 class="text-2xl font-bold mb-4"><?php echo esc_html($tier['name']); ?></h3>
          <div class="flex items-baseline gap-2 mb-4">
            <span class="text-5xl font-extrabold"><?php echo esc_html($tier['price']); ?></span>
            <span class="<?php echo $featured ? 'text-gray-400' : 'text-gray-500'; ?> text-sm"><?php echo esc_html($tier['period']); ?></span>
          </div>
          <p class="<?php echo $featured ? 'text-gray-300' : 'text-gray-600'; ?> text-sm leading-relaxed mb-6"><?php echo esc_html($tier['body']); ?></p>
          <ul class="space-y-3 flex-1">
            <?php foreach ($tier['items'] as $item): ?>
            <li class="<?php echo $featured ? 'text-gray-200' : 'text-gray-600'; ?> flex items-start gap-3 text-sm">
              <svg class="h-5 w-5 <?php echo $featured ? 'text-blue-400' : 'text-blue-500'; ?> flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
              <?php echo esc_html($item); ?>
            </li>
            <?php endforeach; ?>
          </ul>
          <a href="<?php echo esc_url(home_url('/xpressui-cloud/')); ?>" class="<?php echo $featured ? 'bg-blue-600 hover:bg-blue-700 text-white' : 'bg-white border-2 border-blue-100 hover:border-blue-200 text-blue-700'; ?> mt-8 block text-center font-bold py-3 px-6 rounded-lg transition">
            Discuss <?php echo esc_html($tier['name']); ?>
          </a>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Why Pro -->
  <section class="bg-gray-50 py-20 px-4 sm:px-6 lg:px-8 border-t border-gray-100 border-b border-gray-100">
    <div class="max-w-5xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3 text-center">Why teams upgrade</p>
      <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">XPressUI Pro is for running repeatable intake outcomes, not just publishing one form.</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <article class="bg-white rounded-2xl border border-gray-100 p-6 text-center">
          <h3 class="text-xl font-bold text-gray-900 mb-3">Save time</h3>
          <p class="text-gray-500 text-sm leading-relaxed">Reuse proven intake flows instead of rebuilding each project from scratch.</p>
        </article>
        <article class="bg-white rounded-2xl border border-gray-100 p-6 text-center">
          <h3 class="text-xl font-bold text-gray-900 mb-3">Charge more</h3>
          <p class="text-gray-500 text-sm leading-relaxed">Package document portals as a premium delivery service for client onboarding.</p>
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
      <h2 class="text-3xl font-bold text-gray-900 mb-4 text-center">See exactly what changes when you upgrade.</h2>
      <p class="text-center text-gray-500 max-w-2xl mx-auto mb-10">Start with XPressUI Free if you only need the bundled portal. Upgrade to XPressUI Pro for client-site delivery, or choose XPressUI Cloud when the hosted operations layer should live in Console.</p>

      <div class="rounded-2xl border border-gray-100 overflow-x-auto bg-white shadow-sm">
        <div style="min-width:620px">
        <div class="grid bg-gray-50 border-b border-gray-100" style="grid-template-columns:minmax(260px,1fr) 96px 96px 112px">
          <div class="py-3 px-5 text-xs font-bold text-gray-500 uppercase tracking-wider">Feature</div>
          <div class="py-3 px-4 text-xs font-bold text-gray-500 border-l border-gray-100 text-center uppercase tracking-wider">XPressUI Free</div>
          <div class="py-3 px-4 text-xs font-bold text-gray-900 border-l border-gray-100 text-center uppercase tracking-wider">XPressUI Pro</div>
          <div class="py-3 px-4 text-xs font-bold text-blue-600 border-l border-gray-100 text-center uppercase tracking-wider">Cloud Solo</div>
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
          <div class="grid bg-gray-50 <?php echo $i > 0 ? 'border-t border-gray-100' : ''; ?> border-b border-gray-100" style="grid-template-columns:minmax(260px,1fr) 96px 96px 112px">
            <div class="py-2 px-5 text-xs font-bold text-gray-400 uppercase tracking-wider"><?php echo esc_html($row['group']); ?></div>
            <div class="border-l border-gray-100"></div>
            <div class="border-l border-gray-100"></div>
            <div class="border-l border-gray-100"></div>
          </div>
          <?php endif; ?>
          <div class="grid items-center <?php echo $is_last ? '' : 'border-b border-gray-50'; ?>" style="grid-template-columns:minmax(260px,1fr) 96px 96px 112px">
            <div class="py-3 px-5 text-sm text-gray-600"><?php echo esc_html($row['label']); ?></div>
            <div class="py-3 px-4 text-center border-l border-gray-50 text-base">
              <?php xpressui_pricing_cell($row['free'], 'green'); ?>
            </div>
            <div class="py-3 px-4 text-center border-l border-gray-50 text-base<?php echo $row['pro'] === true ? ' bg-blue-50/40' : ''; ?>">
              <?php xpressui_pricing_cell($row['pro']); ?>
            </div>
            <div class="py-3 px-4 text-center border-l border-gray-50 text-base<?php echo $row['cloud'] === true ? ' bg-blue-50/50' : ''; ?>">
              <?php xpressui_pricing_cell($row['cloud']); ?>
            </div>
          </div>
        <?php endforeach; ?>
        </div>
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
      <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">Use XPressUI Free today. Upgrade when your team needs repeatable intake at speed.</h2>
      <p class="text-gray-400 max-w-2xl mx-auto mb-8">If you just want to test the experience, start free. If you want to build custom client portals you can reuse and sell, Pro is the right move.</p>
      <div class="flex flex-col sm:flex-row gap-3 justify-center">
        <button class="xpressui-checkout-btn bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition disabled:opacity-50 disabled:cursor-not-allowed">Get XPressUI Pro — €129 one-time</button>
        <a href="<?php echo esc_url($download_url); ?>" target="_blank" rel="noreferrer" class="bg-white/10 border border-white/20 hover:bg-white/20 text-white font-bold py-3 px-6 rounded-lg transition text-center">Download XPressUI Free</a>
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
