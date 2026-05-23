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

get_header();
?>

<div class="font-sans text-gray-900 antialiased">
  <section class="bg-white py-20 px-4 sm:px-6 lg:px-8 border-b border-gray-100">
    <div class="max-w-5xl mx-auto text-center">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-4">XPressUI Cloud Starter · €19/month</p>
      <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight text-gray-900 mb-6 leading-tight">
        Host the workflow link, catalogs, inbox, files, and review operations with XPressUI.
      </h1>
      <p class="text-lg md:text-xl text-gray-500 leading-relaxed max-w-3xl mx-auto mb-10">
        XPressUI Cloud is for teams that want structured intake, reusable catalogs, and operator review without running the operations layer on client sites.
        XPressUI hosts the public link and centralizes submissions, products, services, dates, files, quotas, and review in Console.
      </p>
      <div class="mb-10 bg-blue-50 border border-blue-100 rounded-3xl p-6 max-w-2xl mx-auto">
        <div class="flex items-baseline justify-center gap-2 mb-3">
          <span class="text-5xl font-extrabold text-gray-900">€19</span>
          <span class="text-gray-500 font-semibold">/month</span>
        </div>
        <p class="text-sm text-gray-600">Starter launch price: 1 workspace, 3 hosted workflows, 500 submissions/month, dynamic catalogs, hosted files, Console inbox, and operator review.</p>
      </div>
      <div class="flex flex-col sm:flex-row justify-center gap-4">
        <a href="<?php echo esc_url($contact_url); ?>" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition shadow-lg shadow-blue-500/30">
          Request Cloud Starter
        </a>
        <a href="<?php echo esc_url($pricing_url); ?>" class="bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-bold py-4 px-8 rounded-lg transition">
          Compare with XPressUI Pro
        </a>
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
      <p class="text-sm font-bold tracking-widest text-blue-400 uppercase mb-3">Starter launch price · €19/month</p>
      <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">Use XPressUI Cloud when the workflow needs shared operations, not another site admin.</h2>
      <p class="text-gray-400 mb-8">We are opening Cloud Starter case by case for teams with active intake workflows, file-heavy submissions, or multi-operator review needs.</p>
      <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition shadow-lg shadow-blue-500/30">
        Request Cloud Starter
      </a>
    </div>
  </section>
</div>

<?php get_footer(); ?>
