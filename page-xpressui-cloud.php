<?php
/**
 * Template for the /xpressui-cloud/ page.
 * WordPress automatically loads this for a page with slug "xpressui-cloud".
 */

$contact_url = home_url('/contact/');
$pricing_url = home_url('/pricing/');

$features = [
  ['title' => 'Hosted workflow links', 'body' => 'Publish a public workflow URL without asking the client to install or maintain client-site infrastructure.'],
  ['title' => 'Dynamic catalogs', 'body' => 'Manage products, services, dates, options, or member lists once and reuse them across hosted workflows.'],
  ['title' => 'Console review inbox', 'body' => 'Operators review submissions, statuses, files, and internal notes from the same workspace.'],
  ['title' => 'Storage and quotas', 'body' => 'Files stay behind the hosted operations layer with workspace limits, download controls, and audit trail.'],
  ['title' => 'Team-ready path', 'body' => 'Add admins and operators to the workspace without sharing a client-site account.'],
];

$comparison = [
  ['label' => 'Best fit', 'wordpress' => 'Existing client site, client-owned delivery', 'hosted' => 'No client-site dependency, XPressUI-managed operations'],
  ['label' => 'Public entry', 'wordpress' => 'Embedded on a client-site page', 'hosted' => 'Hosted workflow URL'],
  ['label' => 'Dynamic catalogs', 'wordpress' => 'Cloud-backed catalogs can be integrated case by case', 'hosted' => 'Products, services, dates, options, and members managed in Console'],
  ['label' => 'Operations inbox', 'wordpress' => 'Client-site submission screens', 'hosted' => 'Console inbox and workspace review'],
  ['label' => 'Files and quotas', 'wordpress' => 'Client-site storage and plugin policy', 'hosted' => 'Workspace storage, quotas, retention, audit'],
];

$plans = [
  [
    'name' => 'Solo',
    'price' => '€19',
    'period' => '/month',
    'summary' => 'Validate one hosted workflow with real users.',
    'items' => ['1 workspace', '100 submissions/month', 'Hosted workflow links', 'Dynamic catalogs', 'Console inbox and files'],
  ],
  [
    'name' => 'Team',
    'price' => '€49',
    'period' => '/month',
    'summary' => 'Run shared operations with several workflows and operators.',
    'items' => ['5 workspaces', '500 submissions/month', 'Team operators/admins', 'Reusable catalogs', 'Basic AI extraction/validation path'],
    'featured' => true,
  ],
  [
    'name' => 'Agency',
    'price' => '€129',
    'period' => '/month',
    'summary' => 'Turn workflows into a repeatable client delivery offer.',
    'items' => ['Higher limits', 'White-label rollout path', 'Advanced AI extraction/digest path', 'Template reuse', 'Assisted onboarding option'],
  ],
];

get_header();
?>

<div class="font-sans text-gray-900 antialiased">
  <section class="bg-white py-20 px-4 sm:px-6 lg:px-8 border-b border-gray-100">
    <div class="max-w-5xl mx-auto text-center">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-4">XPressUI Cloud · Solo, Team, Agency</p>
      <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight text-gray-900 mb-6 leading-tight">
        Host the workflow link, catalogs, inbox, files, and review operations with XPressUI.
      </h1>
      <p class="text-lg md:text-xl text-gray-500 leading-relaxed max-w-3xl mx-auto mb-10">
        XPressUI Cloud is for teams that want structured intake, reusable catalogs, and operator review without running the operations layer on client sites.
        XPressUI hosts the public link and centralizes submissions, products, services, dates, files, quotas, and review in Console.
      </p>
      <div class="mb-10 max-w-3xl mx-auto rounded-3xl border border-blue-100 bg-gradient-to-br from-blue-50 via-white to-slate-50 p-4 sm:p-5 shadow-sm">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-left">
          <div class="rounded-2xl bg-white border border-blue-100 p-4">
            <p class="text-xs font-bold tracking-widest text-blue-600 uppercase mb-1">Solo</p>
            <p class="text-2xl font-extrabold text-gray-900">€19<span class="text-sm font-semibold text-gray-500">/mo</span></p>
            <p class="text-xs text-gray-500 mt-1">Prove one hosted workflow.</p>
          </div>
          <div class="rounded-2xl bg-gray-900 border border-gray-800 p-4 text-white shadow-md shadow-blue-900/10">
            <p class="text-xs font-bold tracking-widest text-blue-300 uppercase mb-1">Team</p>
            <p class="text-2xl font-extrabold">€49<span class="text-sm font-semibold text-gray-300">/mo</span></p>
            <p class="text-xs text-gray-300 mt-1">Run shared operations.</p>
          </div>
          <div class="rounded-2xl bg-white border border-blue-100 p-4">
            <p class="text-xs font-bold tracking-widest text-blue-600 uppercase mb-1">Agency</p>
            <p class="text-2xl font-extrabold text-gray-900">€129<span class="text-sm font-semibold text-gray-500">/mo</span></p>
            <p class="text-xs text-gray-500 mt-1">Repeat delivery for clients.</p>
          </div>
        </div>
        <p class="mt-4 text-sm text-gray-600">
          Start with the smallest plan that proves the workflow, then upgrade when catalogs, inbox review, and operators become part of the daily process.
        </p>
      </div>
      <div class="flex flex-col sm:flex-row justify-center gap-4">
        <a href="<?php echo esc_url($contact_url); ?>" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition shadow-lg shadow-blue-500/30">
          Discuss Cloud plan
        </a>
        <a href="<?php echo esc_url($pricing_url); ?>" class="bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-bold py-4 px-8 rounded-lg transition">
          Compare with XPressUI Pro
        </a>
      </div>
    </div>
  </section>

  <section class="bg-white py-20 px-4 sm:px-6 lg:px-8 border-b border-gray-100">
    <div class="max-w-6xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3 text-center">Plans</p>
      <h2 class="text-3xl font-bold text-gray-900 mb-4 text-center">Start with the smallest plan that proves the workflow.</h2>
      <p class="text-center text-gray-600 max-w-3xl mx-auto mb-12">The Cloud path is intentionally simple: Solo for one workflow, Team for shared operations, Agency for repeatable client delivery.</p>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-stretch">
        <?php foreach ($plans as $plan): $featured = !empty($plan['featured']); ?>
        <article class="<?php echo $featured ? 'bg-gray-900 border-gray-800 text-white' : 'bg-white border-gray-100 text-gray-900'; ?> rounded-3xl border p-8 shadow-sm flex flex-col relative overflow-hidden">
          <?php if ($featured): ?>
          <div class="absolute top-0 right-0 bg-blue-600 text-white text-xs font-bold uppercase tracking-wider px-4 py-2 rounded-bl-2xl">Recommended</div>
          <?php endif; ?>
          <h3 class="text-2xl font-bold mb-3"><?php echo esc_html($plan['name']); ?></h3>
          <div class="flex items-baseline gap-2 mb-4">
            <span class="text-5xl font-extrabold"><?php echo esc_html($plan['price']); ?></span>
            <span class="<?php echo $featured ? 'text-gray-400' : 'text-gray-500'; ?> text-sm"><?php echo esc_html($plan['period']); ?></span>
          </div>
          <p class="<?php echo $featured ? 'text-gray-300' : 'text-gray-600'; ?> text-sm leading-relaxed mb-6"><?php echo esc_html($plan['summary']); ?></p>
          <ul class="space-y-3 flex-1">
            <?php foreach ($plan['items'] as $item): ?>
            <li class="<?php echo $featured ? 'text-gray-200' : 'text-gray-600'; ?> flex items-start gap-3 text-sm">
              <svg class="h-5 w-5 <?php echo $featured ? 'text-blue-400' : 'text-blue-500'; ?> flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
              <?php echo esc_html($item); ?>
            </li>
            <?php endforeach; ?>
          </ul>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="bg-gray-50 py-20 px-4 sm:px-6 lg:px-8 border-b border-gray-100">
    <div class="max-w-6xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3 text-center">What XPressUI Cloud includes</p>
      <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">A managed operations layer for client workflows.</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <?php foreach ($features as $feature): ?>
        <article class="bg-white rounded-2xl border border-gray-100 p-8 shadow-sm">
          <h3 class="text-xl font-bold text-gray-900 mb-3"><?php echo esc_html($feature['title']); ?></h3>
          <p class="text-gray-600 leading-relaxed"><?php echo esc_html($feature['body']); ?></p>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="bg-white py-20 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3 text-center">Choosing the right pack</p>
      <h2 class="text-3xl font-bold text-gray-900 mb-10 text-center">XPressUI Pro remains the fast path. XPressUI Cloud is the managed path.</h2>
      <div class="rounded-2xl border border-gray-100 overflow-hidden bg-white shadow-sm">
        <div class="grid bg-gray-50 border-b border-gray-100" style="grid-template-columns:160px 1fr 1fr">
          <div class="py-3 px-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Decision</div>
          <div class="py-3 px-4 text-xs font-bold text-gray-500 border-l border-gray-100 uppercase tracking-wider">XPressUI Pro</div>
          <div class="py-3 px-4 text-xs font-bold text-blue-600 border-l border-gray-100 uppercase tracking-wider">XPressUI Cloud</div>
        </div>
        <?php foreach ($comparison as $row): ?>
        <div class="grid border-b border-gray-50 last:border-b-0" style="grid-template-columns:160px 1fr 1fr">
          <div class="py-4 px-4 text-sm font-bold text-gray-900"><?php echo esc_html($row['label']); ?></div>
          <div class="py-4 px-4 text-sm text-gray-600 border-l border-gray-100"><?php echo esc_html($row['wordpress']); ?></div>
          <div class="py-4 px-4 text-sm text-gray-600 border-l border-gray-100 bg-blue-50/40"><?php echo esc_html($row['hosted']); ?></div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="bg-gray-900 py-20 px-4 sm:px-6 lg:px-8 text-center">
    <div class="max-w-3xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-400 uppercase mb-3">Cloud starts at €19/month</p>
      <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">Use XPressUI Cloud when the workflow needs shared operations, not another site admin.</h2>
      <p class="text-gray-400 mb-8">We are opening Solo, Team, and Agency plans case by case for teams with active intake workflows, file-heavy submissions, reusable catalogs, or multi-operator review needs.</p>
      <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition shadow-lg shadow-blue-500/30">
        Discuss Cloud plan
      </a>
    </div>
  </section>
</div>

<?php get_footer(); ?>
