<?php
/**
 * Shared segment landing page template.
 *
 * Expected variables:
 * $segment_eyebrow, $segment_title, $segment_intro, $segment_primary_cta,
 * $segment_secondary_cta, $segment_pains, $segment_workflow, $segment_proofs,
 * $segment_offer, $segment_outbound, $segment_use_cases.
 */

$is_french = function_exists('iakpress_is_french_request') && iakpress_is_french_request();

$contact_url      = $is_french ? home_url('/fr/contact/')      : home_url('/contact/');
$pricing_url      = $is_french ? home_url('/fr/pricing/')      : home_url('/pricing/');
$cloud_url        = $is_french ? home_url('/fr/xpressui-cloud/')  : home_url('/xpressui-cloud/');
$agency_pilot_url = $is_french ? home_url('/fr/agency-pilot/') : home_url('/agency-pilot/');

$seg_ui = $is_french ? [
  'pain_eyebrow'      => 'Points douloureux',
  'workflow_eyebrow'  => 'Package workflow',
  'step_label'        => 'ÉTAPE',
  'proofs_eyebrow'    => 'Pièces à collecter',
  'proofs_title'      => 'Transformez les fichiers épars en une soumission consultable.',
  'offer_eyebrow'     => 'Offre à vendre',
  'see_cloud'         => 'Voir les plans Cloud',
  'outbound_eyebrow'  => 'Angle de prospection',
  'outbound_title'    => 'Message à tester sur LinkedIn.',
  'outbound_body'     => 'Utilisez ceci comme point de départ pour commentaires, DMs et emails de suivi. Restez spécifique au segment.',
  'next_eyebrow'      => 'Prochaine étape rapide',
  'next_title'        => 'Cadrez un workflow avant d\u{2019}acheter une plateforme complète.',
  'next_body'         => 'Le premier pilote payant transforme un intake, catalogue, réservation ou processus de revue douloureux en workflow IntakeFlow opérationnel. S\u{2019}il fonctionne, le même schéma devient réutilisable.',
  'scope_cta'         => 'Cadrer un pilote',
  'agency_pilot_cta'  => 'Voir le pilote agence',
  'use_cases_eyebrow' => 'Cas d\u{2019}usage',
  'use_cases_title'   => 'Commencez par un workflow, puis réutilisez le schéma.',
  'final_eyebrow'     => 'Petit pilote payant',
  'final_title'       => 'Amenez un workflow. Nous cadrerons la plus petite version lançable.',
  'final_body'        => 'L\u{2019}objectif n\u{2019}est pas une grande transformation. C\u{2019}est un workflow opérationnel qui réduit les relances manuelles rapidement.',
  'final_cta'         => 'Cadrer un pilote',
] : [
  'pain_eyebrow'      => 'Pain to remove',
  'workflow_eyebrow'  => 'Workflow package',
  'step_label'        => 'STEP',
  'proofs_eyebrow'    => 'Proofs to collect',
  'proofs_title'      => 'Turn scattered files into one reviewable submission.',
  'offer_eyebrow'     => 'Offer to sell',
  'see_cloud'         => 'See Cloud plans',
  'outbound_eyebrow'  => 'Outbound angle',
  'outbound_title'    => 'Message to test on LinkedIn.',
  'outbound_body'     => 'Use this as the starting point for comments, DMs, and follow-up emails. Keep it specific to the segment.',
  'next_eyebrow'      => 'Fastest next step',
  'next_title'        => 'Scope one workflow before buying a full platform.',
  'next_body'         => 'The first paid pilot turns one painful intake, catalog, reservation, or review process into a working IntakeFlow workflow. If it works, the same pattern becomes reusable.',
  'scope_cta'         => 'Scope a pilot',
  'agency_pilot_cta'  => 'See agency pilot',
  'use_cases_eyebrow' => 'Use cases',
  'use_cases_title'   => 'Start with one workflow, then reuse the pattern.',
  'final_eyebrow'     => 'Small paid pilot',
  'final_title'       => 'Bring one workflow. We will scope the smallest launchable version.',
  'final_body'        => 'The goal is not a giant transformation. It is one working workflow that reduces manual follow-up fast.',
  'final_cta'         => 'Scope a pilot',
];

get_header();
?>

<div class="font-sans text-gray-900 antialiased bg-white">
  <section class="bg-white py-20 px-4 sm:px-6 lg:px-8 border-b border-gray-100">
    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
      <div class="lg:col-span-7">
        <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-4"><?php echo esc_html($segment_eyebrow); ?></p>
        <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight text-gray-900 leading-tight mb-6">
          <?php echo esc_html($segment_title); ?>
        </h1>
        <p class="text-lg md:text-xl text-gray-500 leading-relaxed mb-8">
          <?php echo esc_html($segment_intro); ?>
        </p>
        <div class="flex flex-col sm:flex-row gap-4">
          <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex justify-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition shadow-lg shadow-blue-500/30">
            <?php echo esc_html($segment_primary_cta); ?>
          </a>
          <a href="<?php echo esc_url($pricing_url); ?>" class="inline-flex justify-center bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-bold py-4 px-8 rounded-lg transition">
            <?php echo esc_html($segment_secondary_cta); ?>
          </a>
        </div>
      </div>
      <div class="lg:col-span-5">
        <div class="bg-gray-900 rounded-3xl p-8 shadow-2xl text-white">
          <p class="text-sm font-bold tracking-widest text-blue-300 uppercase mb-4"><?php echo esc_html($seg_ui['pain_eyebrow']); ?></p>
          <ul class="space-y-4">
            <?php foreach ($segment_pains as $pain): ?>
            <li class="flex gap-3">
              <span class="mt-1 h-2 w-2 rounded-full bg-blue-400 flex-shrink-0"></span>
              <span class="text-sm leading-relaxed"><?php echo esc_html($pain); ?></span>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-gray-50 py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3 text-center"><?php echo esc_html($seg_ui['workflow_eyebrow']); ?></p>
      <h2 class="text-3xl font-bold text-gray-900 text-center mb-10"><?php echo esc_html($segment_workflow['title']); ?></h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <?php foreach ($segment_workflow['steps'] as $index => $step): ?>
        <article class="bg-white rounded-2xl border border-gray-100 p-7 shadow-sm">
          <p class="text-xs font-bold text-blue-600 mb-3"><?php echo esc_html($seg_ui['step_label'] . ' ' . ($index + 1)); ?></p>
          <h3 class="text-xl font-bold text-gray-900 mb-3"><?php echo esc_html($step['title']); ?></h3>
          <p class="text-gray-600 leading-relaxed"><?php echo esc_html($step['body']); ?></p>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="bg-white py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
      <div class="lg:col-span-7 bg-white rounded-3xl border border-gray-100 p-8 shadow-sm">
        <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3"><?php echo esc_html($seg_ui['proofs_eyebrow']); ?></p>
        <h2 class="text-3xl font-bold text-gray-900 mb-6"><?php echo esc_html($seg_ui['proofs_title']); ?></h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <?php foreach ($segment_proofs as $proof): ?>
          <div class="rounded-2xl border border-gray-100 bg-gray-50 p-5">
            <p class="font-bold text-gray-900 mb-1"><?php echo esc_html($proof['title']); ?></p>
            <p class="text-sm text-gray-600 leading-relaxed"><?php echo esc_html($proof['body']); ?></p>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <aside class="lg:col-span-5 bg-blue-50 rounded-3xl border border-blue-100 p-8">
        <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3"><?php echo esc_html($seg_ui['offer_eyebrow']); ?></p>
        <h2 class="text-2xl font-bold text-gray-900 mb-4"><?php echo esc_html($segment_offer['title']); ?></h2>
        <p class="text-gray-600 leading-relaxed mb-6"><?php echo esc_html($segment_offer['body']); ?></p>
        <ul class="space-y-3 mb-8">
          <?php foreach ($segment_offer['items'] as $item): ?>
          <li class="flex items-start gap-3 text-sm text-gray-700">
            <svg class="h-5 w-5 text-blue-600 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            <?php echo esc_html($item); ?>
          </li>
          <?php endforeach; ?>
        </ul>
        <a href="<?php echo esc_url($cloud_url); ?>" class="inline-flex justify-center w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition">
          <?php echo esc_html($seg_ui['see_cloud']); ?>
        </a>
      </aside>
    </div>
  </section>

  <section class="bg-gray-50 py-16 px-4 sm:px-6 lg:px-8 border-y border-gray-100">
    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8">
      <div class="lg:col-span-5">
        <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3"><?php echo esc_html($seg_ui['outbound_eyebrow']); ?></p>
        <h2 class="text-3xl font-bold text-gray-900 mb-4"><?php echo esc_html($seg_ui['outbound_title']); ?></h2>
        <p class="text-gray-600 leading-relaxed"><?php echo esc_html($seg_ui['outbound_body']); ?></p>
      </div>
      <div class="lg:col-span-7 bg-white rounded-3xl border border-gray-100 p-8 shadow-sm">
        <p class="text-gray-800 leading-relaxed whitespace-pre-line"><?php echo esc_html($segment_outbound); ?></p>
      </div>
    </div>
  </section>

  <section class="bg-blue-50/60 py-12 px-4 sm:px-6 lg:px-8 border-b border-blue-100">
    <div class="max-w-6xl mx-auto rounded-3xl border border-blue-100 bg-white p-6 md:p-8 grid grid-cols-1 lg:grid-cols-[1fr_auto] gap-6 items-center shadow-sm">
      <div>
        <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-2"><?php echo esc_html($seg_ui['next_eyebrow']); ?></p>
        <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900 mb-3"><?php echo esc_html($seg_ui['next_title']); ?></h2>
        <p class="text-gray-600 leading-relaxed">
          <?php echo esc_html($seg_ui['next_body']); ?>
        </p>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-3 min-w-[220px]">
        <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex justify-center rounded-lg bg-blue-600 px-6 py-3 text-sm font-bold text-white shadow-lg shadow-blue-500/20 transition hover:bg-blue-700">
          <?php echo esc_html($seg_ui['scope_cta']); ?>
        </a>
        <a href="<?php echo esc_url($agency_pilot_url); ?>" class="inline-flex justify-center rounded-lg border border-blue-100 bg-blue-50 px-6 py-3 text-sm font-bold text-blue-700 transition hover:border-blue-200 hover:bg-blue-100">
          <?php echo esc_html($seg_ui['agency_pilot_cta']); ?>
        </a>
      </div>
    </div>
  </section>

  <section class="bg-white py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3 text-center"><?php echo esc_html($seg_ui['use_cases_eyebrow']); ?></p>
      <h2 class="text-3xl font-bold text-gray-900 text-center mb-10"><?php echo esc_html($seg_ui['use_cases_title']); ?></h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <?php foreach ($segment_use_cases as $use_case): ?>
        <article class="rounded-2xl border border-gray-100 p-6 bg-white shadow-sm">
          <h3 class="text-lg font-bold text-gray-900 mb-2"><?php echo esc_html($use_case['title']); ?></h3>
          <p class="text-sm text-gray-600 leading-relaxed"><?php echo esc_html($use_case['body']); ?></p>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="bg-gray-900 py-16 px-4 sm:px-6 lg:px-8 text-center">
    <div class="max-w-3xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-300 uppercase mb-3"><?php echo esc_html($seg_ui['final_eyebrow']); ?></p>
      <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-5"><?php echo esc_html($seg_ui['final_title']); ?></h2>
      <p class="text-gray-400 mb-8"><?php echo esc_html($seg_ui['final_body']); ?></p>
      <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex justify-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition shadow-lg shadow-blue-500/30">
        <?php echo esc_html($seg_ui['final_cta']); ?>
      </a>
    </div>
  </section>
</div>

<?php get_footer(); ?>
