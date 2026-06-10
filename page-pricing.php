<?php
/**
 * Template for the /pricing/ page — pricing, comparison table, FAQ, CTA.
 * WordPress automatically loads this for a page with slug "pricing".
 */

$download_url = 'https://wordpress.org/plugins/xpressui-bridge/';
$is_fr            = function_exists('iakpress_is_french_request') && iakpress_is_french_request();
$agency_pilot_url = $is_fr ? home_url('/fr/agency-pilot/') : home_url('/agency-pilot/');
$contact_url      = $is_fr ? home_url('/fr/contact/') : home_url('/contact/');

$app_url = xpressui_app_url();
$starter_buy_url = xpressui_starter_buy_url();

$rows = [
  ['group' => 'Start with IntakeFlow Free', 'label' => 'Ready-to-use Document Intake portal', 'free' => true, 'pro' => true, 'cloud' => true],
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

  ['group' => 'Support and license', 'label' => 'Price', 'free' => '€0', 'pro' => '€99/year', 'cloud' => '€39/mo'],
  ['group' => '', 'label' => 'Done For You setup', 'free' => false, 'pro' => 'from €790', 'cloud' => 'from €299'],
  ['group' => '', 'label' => 'Community support via GitHub Issues', 'free' => true, 'pro' => true, 'cloud' => false],
  ['group' => '', 'label' => 'Automatic plugin updates', 'free' => false, 'pro' => true, 'cloud' => false],
  ['group' => '', 'label' => 'License valid per site', 'free' => false, 'pro' => true, 'cloud' => false],
  ['group' => '', 'label' => 'Cloud PRO limits', 'free' => false, 'pro' => false, 'cloud' => 'Unlimited projects'],
  ['group' => '', 'label' => 'Submission allowance', 'free' => false, 'pro' => false, 'cloud' => '1,000/mo'],
  ['group' => '', 'label' => 'Priority email support (1-2 business days)', 'free' => false, 'pro' => true, 'cloud' => true],
];

$faq_items = [
  ['q' => 'Can I start with IntakeFlow Free first?', 'a' => 'Yes. IntakeFlow Free is the easiest way to try the document portal experience on your own client site. You can install the bundled starter, upload custom workflow ZIPs, test the intake flow, and only upgrade when you need advanced fields, Console Sync, or workflow customization.'],
  ['q' => 'What does IntakeFlow Starter unlock exactly?', 'a' => 'IntakeFlow Starter adds Customize Workflow (edit labels, choice labels, colors, messages, and validation rules per workflow directly from the client-site admin), Console Sync, specialized runtime features, automatic updates, and the license per site.'],
  ['q' => 'Where do dynamic catalogs fit?', 'a' => 'Catalogs are the strongest Cloud feature: products, prices, service slots, dates, and member lists can be reused across workflows instead of being hardcoded into static request pages. IntakeFlow Starter can integrate Cloud catalogs when needed, but product catalogs are not exported as portable PHP.'],
  ['q' => 'Where does IntakeFlow Cloud fit?', 'a' => 'IntakeFlow Cloud is for teams that want IntakeFlow to host the public workflow link, submission inbox, files, quotas, catalogs, and operator review instead of running the operations layer on client sites. Cloud PRO starts at €39/month, and Cloud ENTERPRISE is €149/month.'],
  ['q' => 'Can you set up the first workflow for us?', 'a' => 'Yes. Done For You setup starts at €299 for a hosted workflow and from €790 for client-site delivery. It is the fastest way to get the first workflow live and reusable.'],
  ['q' => 'Is €99/year a subscription?', 'a' => 'Yes. It is a yearly subscription per site, which includes all updates, Visual Builder access, and client-site runtime features.'],
  ['q' => 'Is there a free trial?', 'a' => 'Yes — both plans have a 15-day free trial, no card required. Start the Starter trial to test the self-hosted plugin on one site (the 15-day clock starts at first activation), or start the Cloud trial for hosted links and the submission inbox. Media Library and catalogs unlock on a paid Cloud plan.'],
  ['q' => 'Who is IntakeFlow Starter for?', 'a' => 'IntakeFlow Starter is built for accounting firms and agencies that need repeatable client document intake with less back-and-forth.'],
  ['q' => 'Do you offer a larger agency plan?', 'a' => 'Yes. Larger teams can move toward IntakeFlow Cloud, higher quotas, team workspace access, and managed rollout. The current Starter plan is the fastest client-site path today.'],
  ['q' => 'Can I use it on client sites?', 'a' => 'Yes. The Starter license covers one production client site per subscription, which makes it practical for client delivery and internal use.'],
  ['q' => 'What if it is not a fit?', 'a' => 'You are covered by a 30-day money-back guarantee. If it does not fit your workflow, email hello@iakpress.com within 30 days.'],
];

$cloud_tiers = [
  [
    'name' => 'Starter (Self-Hosted)',
    'price' => '€99',
    'period' => '/year',
    'tag' => 'WordPress delivery',
    'body' => 'Best for creators who want to host intake workflows on their own WordPress servers.',
    'items' => [
      'Visual Builder (3 projects)',
      'WordPress ZIP export',
      'Client-site runtime',
      'Local inbox and storage',
      'No Cloud dependency',
    ],
  ],
  [
    'name' => 'Cloud PRO',
    'price' => '€39',
    'period' => '/month',
    'tag' => 'Most popular',
    'body' => 'Best for professionals, freelancers, and agencies with regular client document collection needs.',
    'items' => [
      'Unlimited projects',
      '1,000 submissions/month',
      '10 GB Cloud storage',
      'Stripe payment integration',
      'Webhooks with HMAC signatures',
      'White-label widget',
    ],
    'featured' => true,
  ],
  [
    'name' => 'Cloud ENTERPRISE',
    'price' => '€149',
    'period' => '/month',
    'tag' => 'For organizations',
    'body' => 'For organizations managing large volumes of client files and requiring team management.',
    'items' => [
      '10,000 submissions/month',
      '100 GB Cloud storage',
      '5 operators included',
      'Automatic assignees',
      'GDPR retention rules',
      'Priority support & SLA',
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
      <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-gray-900 mb-5">Choose where your client intake portal should live.</h1>
      <p class="text-lg text-gray-500 leading-relaxed max-w-2xl mx-auto">Start on a client WordPress site, move to IntakeFlow Cloud when you want hosted links, files, catalogs, quotas, and team review, or ask us to ship the first workflow with you.</p>
      <div class="mt-8 flex flex-col sm:flex-row gap-3 justify-center">
        <a href="<?php echo esc_url($contact_url); ?>" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition text-center">Discuss Cloud plan</a>
        <a href="<?php echo esc_url($download_url); ?>" target="_blank" rel="noreferrer" class="bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-bold py-3 px-6 rounded-lg transition text-center">Download IntakeFlow Free</a>
      </div>
      <div class="mt-4">
        <a href="<?php echo esc_url($agency_pilot_url); ?>" class="inline-flex justify-center bg-white border border-blue-100 hover:border-blue-200 text-blue-700 font-bold py-3 px-5 rounded-lg transition text-sm">
          Need the first workflow live? See Agency Pilot
        </a>
      </div>
      <p class="mt-4 text-sm font-semibold text-emerald-600">Start free — 15-day trial on Starter or Cloud, no card required.</p>
      <p class="mt-1 text-sm text-gray-500">IntakeFlow Free · IntakeFlow Starter per site · IntakeFlow Cloud from €39/month</p>
    </div>
  </section>

  <section class="bg-blue-50/60 py-10 px-4 sm:px-6 lg:px-8 border-b border-blue-100">
    <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-4">
      <?php foreach ([
        ['title' => 'Done For You setup', 'body' => 'Get one branded hosted intake live from €299 setup, including operator email and a generated document summary.'],
        ['title' => 'Dynamic catalogs', 'body' => 'Products, prices, service slots, options, and members become reusable data instead of static choices.'],
        ['title' => 'Agency pilot', 'body' => 'Agencies can validate IntakeFlow on 1 to 3 client workflows before committing to a larger plan.'],
      ] as $item): ?>
      <article class="bg-white rounded-2xl border border-blue-100 p-5 shadow-sm">
        <p class="text-sm font-bold text-gray-900 mb-2"><?php echo esc_html($item['title']); ?></p>
        <p class="text-sm text-gray-600 leading-relaxed"><?php echo esc_html($item['body']); ?></p>
      </article>
      <?php endforeach; ?>
    </div>
  </section>

  <section class="bg-white py-10 px-4 sm:px-6 lg:px-8 border-b border-gray-100">
    <div class="max-w-5xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3 text-center">Fast decision</p>
      <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900 mb-6 text-center">Choose by the first workflow you need to ship.</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <article class="rounded-2xl border border-gray-100 bg-gray-50 p-5">
          <p class="text-xs font-bold tracking-widest text-gray-500 uppercase mb-2">Install today</p>
          <h3 class="text-lg font-extrabold text-gray-900 mb-2">Use IntakeFlow Free</h3>
          <p class="text-sm text-gray-600 leading-relaxed">You want to validate one client-site workflow with the bundled starter before buying anything.</p>
        </article>
        <article class="rounded-2xl border border-gray-900 bg-gray-900 p-5 text-white shadow-sm">
          <p class="text-xs font-bold tracking-widest text-blue-300 uppercase mb-2">Sell client-site delivery</p>
          <h3 class="text-lg font-extrabold mb-2">Discuss IntakeFlow delivery</h3>
          <p class="text-sm text-gray-300 leading-relaxed">You need to package workflows for client-owned sites and keep the operations inside the delivered site.</p>
        </article>
        <article class="rounded-2xl border border-blue-100 bg-blue-50 p-5">
          <p class="text-xs font-bold tracking-widest text-blue-600 uppercase mb-2">Avoid client-site ops</p>
          <h3 class="text-lg font-extrabold text-gray-900 mb-2">Start IntakeFlow Cloud</h3>
          <p class="text-sm text-gray-600 leading-relaxed">You want IntakeFlow to host the public link, submissions, files, catalogs, quotas, and operator review.</p>
        </article>
      </div>
    </div>
  </section>

  <section class="bg-white py-10 px-4 sm:px-6 lg:px-8 border-b border-gray-100">
    <div class="max-w-5xl mx-auto rounded-3xl border border-blue-100 bg-blue-50 p-6 md:p-8 grid grid-cols-1 lg:grid-cols-[1fr_auto] gap-6 items-center">
      <div>
        <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-2">Not ready to choose a plan?</p>
        <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900 mb-3">Start with one paid workflow pilot.</h2>
        <p class="text-gray-600 leading-relaxed">
          If the buyer is still comparing paths, scope one real workflow first. Hosted pilots start from €299 setup; client-site delivery starts from €790 setup.
        </p>
      </div>
      <div class="flex flex-col sm:flex-row lg:flex-col gap-3">
        <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex justify-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition shadow-lg shadow-blue-500/20">
          Scope a pilot
        </a>
        <a href="<?php echo esc_url($agency_pilot_url); ?>" class="inline-flex justify-center bg-white border border-blue-100 hover:border-blue-200 text-blue-700 font-bold py-3 px-6 rounded-lg transition">
          See pilot details
        </a>
      </div>
    </div>
  </section>

  <!-- Positioning strip -->
  <section class="bg-gray-50 py-8 px-4 sm:px-6 lg:px-8 border-b border-gray-100">
    <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-4 text-center">
      <div class="bg-white rounded-2xl border border-gray-100 p-5">
        <p class="text-sm font-semibold text-gray-900 mb-1">IntakeFlow Free</p>
        <p class="text-sm text-gray-500">Validate the portal experience on a real client site.</p>
      </div>
      <div class="bg-white rounded-2xl border border-gray-100 p-5">
        <p class="text-sm font-semibold text-gray-900 mb-1">IntakeFlow Starter</p>
        <p class="text-sm text-gray-500">Ship production workflow packs inside client sites.</p>
      </div>
      <div class="bg-white rounded-2xl border border-gray-100 p-5">
        <p class="text-sm font-semibold text-gray-900 mb-1">IntakeFlow Cloud</p>
        <p class="text-sm text-gray-500">Ask IntakeFlow to host links, catalogs, files, inbox, quotas, and review.</p>
      </div>
    </div>
  </section>

  <!-- Offer cards -->
  <section class="bg-white py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 items-stretch">
      <article class="bg-gray-50 rounded-3xl border border-gray-100 p-8 flex flex-col">
        <span class="inline-block px-3 py-1 rounded-full bg-white border border-gray-200 text-xs font-bold text-gray-600 uppercase tracking-wider mb-4 w-fit">IntakeFlow Free</span>
        <h2 class="text-2xl font-bold text-gray-900 mb-2">Validate the portal on a client site</h2>
        <p class="text-gray-500 mb-6">Best when you want to test the intake experience before buying or rolling out a hosted workflow.</p>
        <div class="flex items-baseline gap-2 mb-6">
          <span class="text-5xl font-extrabold text-gray-900">€0</span>
          <span class="text-gray-500 text-sm">WordPress.org download</span>
        </div>
        <ul class="space-y-3 mb-8 flex-1">
          <?php foreach ([
            'IntakeFlow client-site plugin',
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
        <a href="<?php echo esc_url($download_url); ?>" target="_blank" rel="noreferrer" class="mt-auto block text-center bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-bold py-3 px-6 rounded-lg transition">Download IntakeFlow Free</a>
      </article>

      <article class="bg-gray-900 rounded-3xl border border-gray-800 p-8 flex flex-col relative overflow-hidden">
        <div class="absolute top-0 right-0 bg-blue-600 text-white text-xs font-bold uppercase tracking-wider px-4 py-2 rounded-bl-2xl">Best value</div>
        <span class="inline-block px-3 py-1 rounded-full bg-blue-600 text-xs font-bold text-white uppercase tracking-wider mb-4 w-fit">IntakeFlow Starter</span>
        <h2 class="text-2xl font-bold text-white mb-2">Ship production workflows on client sites</h2>
        <p class="text-gray-300 mb-6">Best for agencies and teams that need custom, repeatable document portals on client sites.</p>
        <div class="flex items-baseline gap-2 mb-2">
          <span class="text-5xl font-extrabold text-white">€99</span>
          <span class="text-gray-400 text-sm">/year</span>
        </div>
        <p class="text-sm text-blue-200 mb-2">Starter plan · per site · updates included</p>
        <p class="text-sm font-semibold text-emerald-300 mb-6">15-day free trial · no card required</p>
        <ul class="space-y-3 mb-8 flex-1">
          <?php foreach ([
            'Everything in IntakeFlow Free',
            'Customize Workflow — labels, choices, colors, and messages per workflow from the client-site admin',
            'Console Sync for direct workflow pull',
            'Advanced fields (camera capture, signature, e-payment proof, date & month ranges)',
            'Priority email support and automatic updates'
          ] as $item): ?>
          <li class="flex items-start gap-3 text-sm text-gray-200">
            <svg class="h-5 w-5 text-blue-400 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            <?php echo esc_html($item); ?>
          </li>
          <?php endforeach; ?>
        </ul>
        <div class="mt-auto">
          <a href="<?php echo esc_url($app_url); ?>" class="block text-center w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition">Start 15-day free trial</a>
          <a href="<?php echo esc_url($starter_buy_url); ?>" class="block text-center w-full text-blue-200 hover:text-white text-sm font-semibold mt-3 underline">or buy now — €99/year</a>
        </div>
      </article>

      <article class="bg-blue-50 rounded-3xl border border-blue-100 p-8 flex flex-col">
        <span class="inline-block px-3 py-1 rounded-full bg-white border border-blue-100 text-xs font-bold text-blue-700 uppercase tracking-wider mb-4 w-fit">Cloud PRO</span>
        <h2 class="text-2xl font-bold text-gray-900 mb-2">Let IntakeFlow run hosted operations</h2>
        <p class="text-gray-600 mb-6">Best when the client does not want client-site operations, or when your team needs shared review, quotas, audit, and file handling in Console.</p>
        <div class="flex items-baseline gap-2 mb-2">
          <span class="text-5xl font-extrabold text-gray-900">€39</span>
          <span class="text-gray-500 text-sm">/month</span>
        </div>
        <p class="text-sm text-blue-700 mb-2">Cloud PRO at €39/month · Cloud ENTERPRISE available</p>
        <p class="text-sm font-semibold text-emerald-600 mb-6">15-day free Cloud trial · hosted links + inbox · no card</p>
        <ul class="space-y-3 mb-8 flex-1">
          <?php foreach ([
            'Unlimited projects & workflows',
            'Up to 1,000 submissions/month',
            '10 GB secure Cloud storage (S3) for attachments',
            'Stripe payment integration & tracking',
            'Webhooks with HMAC signatures (Zapier, Make, Notion)',
            'White-label widget (IntakeFlow branding removed)'
          ] as $item): ?>
          <li class="flex items-start gap-3 text-sm text-gray-600">
            <svg class="h-5 w-5 text-blue-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            <?php echo esc_html($item); ?>
          </li>
          <?php endforeach; ?>
        </ul>
        <div class="mt-auto">
          <a href="<?php echo esc_url($app_url); ?>" class="block text-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition">Start free Cloud trial</a>
          <a href="<?php echo esc_url(home_url('/xpressui-cloud/')); ?>" class="block text-center text-blue-700 hover:text-blue-900 text-sm font-semibold mt-3 underline">or discuss Cloud plan</a>
        </div>
      </article>

    </div>
  </section>

  <!-- Cloud pricing -->
  <section class="bg-blue-50/60 py-20 px-4 sm:px-6 lg:px-8 border-y border-blue-100">
    <div class="max-w-6xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3 text-center">Cloud pricing</p>
      <h2 class="text-3xl font-bold text-gray-900 mb-4 text-center">Choose the Cloud tier by workflow volume, not by guesswork.</h2>
      <p class="text-center text-gray-600 max-w-3xl mx-auto mb-12">Starter is enough to validate one site-hosted workflow. Cloud PRO adds hosted operations, payments, and webhooks. Enterprise is the path for organizations requiring team management.</p>
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
      <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">IntakeFlow Starter is for running repeatable intake outcomes, not just publishing one form.</h2>
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
      <p class="text-center text-gray-500 max-w-2xl mx-auto mb-10">Start with IntakeFlow Free if you only need the bundled portal. Upgrade to IntakeFlow Starter for client-site delivery, or choose IntakeFlow Cloud when the hosted operations layer should live in Console.</p>

      <div class="rounded-2xl border border-gray-100 overflow-x-auto bg-white shadow-sm">
        <div style="min-width:620px">
        <div class="grid bg-gray-50 border-b border-gray-100" style="grid-template-columns:minmax(260px,1fr) 96px 96px 112px">
          <div class="py-3 px-5 text-xs font-bold text-gray-500 uppercase tracking-wider">Feature</div>
          <div class="py-3 px-4 text-xs font-bold text-gray-500 border-l border-gray-100 text-center uppercase tracking-wider">IntakeFlow Free</div>
          <div class="py-3 px-4 text-xs font-bold text-gray-900 border-l border-gray-100 text-center uppercase tracking-wider">IntakeFlow Starter</div>
          <div class="py-3 px-4 text-xs font-bold text-blue-600 border-l border-gray-100 text-center uppercase tracking-wider">Cloud PRO</div>
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
      <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">Use IntakeFlow Free today. Upgrade when your team needs repeatable intake at speed.</h2>
      <p class="text-gray-400 max-w-2xl mx-auto mb-8">If you just want to test the experience, start free. If you want to build custom client portals you can reuse and sell, Pro is the right move.</p>
      <div class="flex flex-col sm:flex-row gap-3 justify-center">
        <a href="<?php echo esc_url($contact_url); ?>" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition text-center">Discuss Cloud plan</a>
        <a href="<?php echo esc_url($download_url); ?>" target="_blank" rel="noreferrer" class="bg-white/10 border border-white/20 hover:bg-white/20 text-white font-bold py-3 px-6 rounded-lg transition text-center">Download IntakeFlow Free</a>
      </div>
    </div>
  </section>

</div>

<?php get_footer(); ?>
