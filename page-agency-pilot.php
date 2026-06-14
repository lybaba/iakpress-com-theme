<?php
/**
 * Template for the /agency-pilot/ page.
 */

$is_french_pilot = function_exists('iakpress_is_french_request') && iakpress_is_french_request();

$contact_url  = $is_french_pilot ? home_url('/fr/contact/')  : home_url('/contact/');
$pricing_url  = $is_french_pilot ? home_url('/fr/pricing/')  : home_url('/pricing/');
$xpressui_url = $is_french_pilot ? home_url('/fr/xpressui/') : home_url('/xpressui/');
$booking_url  = $contact_url;

$copy = $is_french_pilot ? [
  'eyebrow'          => 'Pilote agence',
  'h1'               => 'Lancez un premier intake client. Transformez-le en offre d\'agence réutilisable.',
  'intro'            => 'IntakeFlow aide les agences à lancer des portails documentaires, des demandes de service, des commandes catalogue et une revue opérateur sans créer un backend sur mesure pour chaque client.',
  'primary_cta'      => 'Demander un pilote',
  'secondary_cta'    => 'Voir IntakeFlow',
  'qualifiers_eyebrow' => 'Chemin le plus rapide vers les revenus',
  'offers_eyebrow'   => 'Offres',
  'offers_title'     => 'Commencez accompagné, puis décidez ce qui doit devenir réutilisable.',
  'scope_item_cta'   => 'Cadrer cette option',
  'output_eyebrow'   => 'Résultat du pilote',
  'output_title'     => 'Un pilote payant doit vous laisser un actif opérationnel, pas une présentation.',
  'output_body'      => 'Le premier workflow est cadré pour être lancé rapidement, mais structuré pour devenir une offre réutilisable chez le prochain client.',
  'output_cta'       => 'Cadrer le premier workflow',
  'scope_eyebrow'    => 'Meilleur premier message',
  'scope_title'      => 'Envoyez le workflow tel quel, pas une spec peaufinée.',
  'scope_body'       => 'Une courte description avec un parcours existant, une capture, un tableur ou un lien vers un document suffit pour estimer si le premier pilote doit être hébergé ou livré sur site client.',
  'scope_cta'        => 'Envoyer le workflow',
  'steps_eyebrow'    => 'Comment fonctionne le pilote',
  'steps_title'      => 'Quatre étapes, un workflow, sans promesse self-serve trop large.',
  'step_label'       => 'ÉTAPE',
  'final_eyebrow'    => 'Prêt quand le workflow est réel',
  'final_title'      => 'Amenez un workflow douloureux aujourd\'hui. Nous cadrerons le plus petit pilote payant.',
  'final_body'       => 'Le premier échange doit se terminer avec un workflow concret, un mode de livraison et une checklist de mise en ligne.',
  'final_primary'    => 'Demander un pilote',
  'final_secondary'  => 'Voir les tarifs',
] : [
  'eyebrow'          => 'Agency pilot',
  'h1'               => 'Launch one client intake first. Turn it into a repeatable agency offer.',
  'intro'            => 'IntakeFlow helps agencies ship document intake, service requests, reservations, catalog orders, and operator review without rebuilding a custom backend for each client.',
  'primary_cta'      => 'Request a pilot',
  'secondary_cta'    => 'See IntakeFlow',
  'qualifiers_eyebrow' => 'Fastest path to revenue',
  'offers_eyebrow'   => 'Offers',
  'offers_title'     => 'Start assisted, then decide what should become reusable.',
  'scope_item_cta'   => 'Scope this option',
  'output_eyebrow'   => 'Pilot output',
  'output_title'     => 'A paid pilot should leave you with a working asset, not a slide deck.',
  'output_body'      => 'The first workflow is scoped small enough to launch, but structured so it can become a repeatable offer for the next client.',
  'output_cta'       => 'Scope the first workflow',
  'scope_eyebrow'    => 'Best first message',
  'scope_title'      => 'Send the messy workflow, not a polished spec.',
  'scope_body'       => 'A short description plus a form, spreadsheet, screenshot, or document link is enough to estimate whether the first pilot should be hosted or client-site.',
  'scope_cta'        => 'Send the workflow',
  'steps_eyebrow'    => 'How the pilot works',
  'steps_title'      => 'Four steps, one workflow, no broad self-serve promise.',
  'step_label'       => 'STEP',
  'final_eyebrow'    => 'Ready when the workflow is real',
  'final_title'      => 'Bring one workflow that is painful today. We will scope the smallest paid pilot.',
  'final_body'       => 'The first call should end with a concrete workflow, a delivery mode, and a go-live checklist.',
  'final_primary'    => 'Request a pilot',
  'final_secondary'  => 'Compare pricing',
];

$offers = $is_french_pilot ? [
  [
    'title' => 'Configuration workflow hébergé',
    'price' => 'à partir de €299 de configuration',
    'body'  => 'Un workflow hébergé avec marque, email opérateur, checklist de revue et résumé généré.',
    'fit'   => 'Idéal quand le client a besoin d\'un lien public rapidement.',
  ],
  [
    'title' => 'Livraison sur site client',
    'price' => 'à partir de €790 de configuration',
    'body'  => 'Livraison IntakeFlow Starter, intégration page, test de soumission et validation inbox admin.',
    'fit'   => 'Idéal pour les agences qui livrent sur des sites appartenant au client.',
  ],
  [
    'title' => 'Pilote agence',
    'price' => 'Pilote accompagné 3 mois',
    'body'  => 'Lancer le premier workflow, préparer des templates réutilisables et valider si IntakeFlow appartient à votre stack de livraison.',
    'fit'   => 'Idéal pour les agences avec plusieurs projets clients lourds en workflows.',
  ],
] : [
  [
    'title' => 'Hosted workflow setup',
    'price' => 'from €299 setup',
    'body'  => 'One branded hosted workflow with operator email, review checklist, and generated summary.',
    'fit'   => 'Best when the client needs a public link quickly.',
  ],
  [
    'title' => 'Client-site delivery',
    'price' => 'from €790 setup',
    'body'  => 'IntakeFlow Starter delivery, page embed guidance, test submission, and admin inbox validation.',
    'fit'   => 'Best for agencies shipping on client-owned sites.',
  ],
  [
    'title' => 'Agency pilot',
    'price' => '3-month assisted pilot',
    'body'  => 'Launch the first workflow, prepare reusable templates, and validate whether IntakeFlow belongs in your delivery stack.',
    'fit'   => 'Best for agencies with several workflow-heavy client projects.',
  ],
];

$steps = $is_french_pilot ? [
  ['title' => 'Choisir un vrai workflow', 'body' => 'Intake documentaire, demande de service, réservation, commande catalogue ou revue de preuve de paiement.'],
  ['title' => 'Lancer la première version', 'body' => 'Nous configurons le flux avec marque, email opérateur, résumé et parcours de revue.'],
  ['title' => 'Tester avec de vrais opérateurs', 'body' => 'Votre équipe effectue un test en direct et signale les formulations, champs manquants ou problèmes de statut.'],
  ['title' => 'En faire un pack réutilisable', 'body' => 'Le flux opérationnel devient un modèle de livraison réutilisable pour les prochains clients.'],
] : [
  ['title' => 'Pick one real workflow', 'body' => 'Document intake, service request, reservation, catalog order, or payment proof review.'],
  ['title' => 'Launch the first version', 'body' => 'We configure the branded flow, operator email, summary, and review path.'],
  ['title' => 'Test with real operators', 'body' => 'Your team runs a live test and flags wording, missing fields, or status issues.'],
  ['title' => 'Turn it into a repeatable pack', 'body' => 'The working flow becomes a reusable delivery pattern for future clients.'],
];

$deliverables = $is_french_pilot ? [
  ['title' => 'Lien workflow hébergé', 'body' => 'Un lien privé envoyable à un client ou intégrable sur la page commerciale pendant la validation du processus.'],
  ['title' => 'Parcours inbox opérateur', 'body' => 'Les soumissions arrivent avec suffisamment de contexte pour la revue, le suivi, la preuve de paiement ou la complétion.'],
  ['title' => 'Surface catalogue réutilisable', 'body' => 'Produits, services, dates, membres ou options sont séparés du portail pour que le workflow puisse passer à l\'échelle.'],
  ['title' => 'Option livraison sur site client', 'body' => 'Si le workflow doit vivre sur un site client, le pilote définit le chemin de livraison IntakeFlow Starter et la passation.'],
] : [
  ['title' => 'Hosted workflow link', 'body' => 'A private link you can send to one client or embed on the commercial page while the process is validated.'],
  ['title' => 'Operator inbox path', 'body' => 'Submissions arrive with enough context for review, follow-up, payment proof, or completion.'],
  ['title' => 'Reusable catalog surface', 'body' => 'Products, services, dates, members, or options are separated from the form so the workflow can scale.'],
  ['title' => 'Client-site delivery option', 'body' => 'If the workflow belongs on a client site, the pilot defines the IntakeFlow Starter delivery path and handoff.'],
];

$qualifiers = $is_french_pilot ? [
  'Vous construisez ou maintenez déjà des sites clients ou des pages de services lourdes en workflows.',
  'Un workflow client tourne actuellement par email, tableurs ou pages de demande statiques.',
  'Des fichiers, prix, dates, services ou preuves de paiement créent des relances manuelles.',
  'Vous pouvez tester un workflow avec un vrai opérateur en 7 jours.',
] : [
  'You already build or maintain client sites or workflow-heavy service pages.',
  'A client workflow currently runs through email, spreadsheets, or static request pages.',
  'Files, prices, dates, services, or payment proofs create manual follow-up.',
  'You can test one workflow with a real operator within 7 days.',
];

get_header();
?>

<div class="font-sans text-gray-900 antialiased bg-white">
  <section class="bg-white py-20 px-4 sm:px-6 lg:px-8 border-b border-gray-100">
    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
      <div class="lg:col-span-7">
        <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-4"><?php echo esc_html($copy['eyebrow']); ?></p>
        <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight text-gray-900 leading-tight mb-6">
          <?php echo esc_html($copy['h1']); ?>
        </h1>
        <p class="text-lg md:text-xl text-gray-500 leading-relaxed mb-8">
          <?php echo esc_html($copy['intro']); ?>
        </p>
        <div class="flex flex-col sm:flex-row gap-4">
          <a href="<?php echo esc_url($booking_url); ?>" class="inline-flex justify-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition shadow-lg shadow-blue-500/30">
            <?php echo esc_html($copy['primary_cta']); ?>
          </a>
          <a href="<?php echo esc_url($xpressui_url); ?>" class="inline-flex justify-center bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-bold py-4 px-8 rounded-lg transition">
            <?php echo esc_html($copy['secondary_cta']); ?>
          </a>
        </div>
      </div>
      <div class="lg:col-span-5">
        <div class="bg-gray-900 rounded-3xl p-8 shadow-2xl">
          <p class="text-sm font-bold tracking-widest text-blue-300 uppercase mb-4"><?php echo esc_html($copy['qualifiers_eyebrow']); ?></p>
          <ul class="space-y-4">
            <?php foreach ($qualifiers as $qualifier): ?>
            <li class="flex gap-3 text-white">
              <span class="mt-1 h-2 w-2 rounded-full bg-blue-400 flex-shrink-0"></span>
              <span class="text-sm leading-relaxed"><?php echo esc_html($qualifier); ?></span>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-gray-50 py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3 text-center"><?php echo esc_html($copy['offers_eyebrow']); ?></p>
      <h2 class="text-3xl font-bold text-gray-900 text-center mb-10"><?php echo esc_html($copy['offers_title']); ?></h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <?php foreach ($offers as $offer): ?>
        <article class="flex h-full flex-col bg-white rounded-2xl border border-gray-100 p-7 shadow-sm">
          <div>
            <p class="text-sm font-bold text-blue-600 mb-2"><?php echo esc_html($offer['price']); ?></p>
            <h3 class="text-xl font-bold text-gray-900 mb-3"><?php echo esc_html($offer['title']); ?></h3>
            <p class="text-gray-600 leading-relaxed mb-5"><?php echo esc_html($offer['body']); ?></p>
            <p class="text-sm text-gray-500 leading-relaxed"><?php echo esc_html($offer['fit']); ?></p>
          </div>
          <div class="mt-auto pt-6">
            <a href="<?php echo esc_url($booking_url); ?>" class="inline-flex justify-center rounded-lg border border-blue-100 bg-blue-50 px-4 py-3 text-sm font-bold text-blue-700 hover:border-blue-200 hover:bg-blue-100 transition whitespace-nowrap">
              <?php echo esc_html($copy['scope_item_cta']); ?>
            </a>
          </div>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="bg-white py-16 px-4 sm:px-6 lg:px-8 border-y border-gray-100">
    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-[0.9fr_1.1fr] gap-10 items-start">
      <div>
        <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3"><?php echo esc_html($copy['output_eyebrow']); ?></p>
        <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 mb-4"><?php echo esc_html($copy['output_title']); ?></h2>
        <p class="text-gray-600 leading-relaxed mb-6">
          <?php echo esc_html($copy['output_body']); ?>
        </p>
        <a href="<?php echo esc_url($booking_url); ?>" class="inline-flex justify-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded-lg transition shadow-lg shadow-blue-500/20 whitespace-nowrap">
          <?php echo esc_html($copy['output_cta']); ?>
        </a>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <?php foreach ($deliverables as $deliverable): ?>
        <article class="rounded-2xl border border-gray-100 bg-gray-50 p-5">
          <h3 class="text-lg font-bold text-gray-900 mb-2"><?php echo esc_html($deliverable['title']); ?></h3>
          <p class="text-sm text-gray-600 leading-relaxed"><?php echo esc_html($deliverable['body']); ?></p>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="bg-white py-12 px-4 sm:px-6 lg:px-8 border-y border-gray-100">
    <div class="max-w-5xl mx-auto rounded-3xl bg-blue-50 border border-blue-100 p-6 md:p-8 grid grid-cols-1 md:grid-cols-[1fr_auto] gap-6 items-center">
      <div>
        <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-2"><?php echo esc_html($copy['scope_eyebrow']); ?></p>
        <h2 class="text-2xl font-extrabold text-gray-900 mb-2"><?php echo esc_html($copy['scope_title']); ?></h2>
        <p class="text-gray-600 leading-relaxed">
          <?php echo esc_html($copy['scope_body']); ?>
        </p>
      </div>
      <a href="<?php echo esc_url($booking_url); ?>" class="inline-flex justify-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded-lg transition shadow-lg shadow-blue-500/20 whitespace-nowrap">
        <?php echo esc_html($copy['scope_cta']); ?>
      </a>
    </div>
  </section>

  <section class="bg-white py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto">
      <p class="text-sm font-bold tracking-widests text-blue-600 uppercase mb-3 text-center"><?php echo esc_html($copy['steps_eyebrow']); ?></p>
      <h2 class="text-3xl font-bold text-gray-900 text-center mb-10"><?php echo esc_html($copy['steps_title']); ?></h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <?php foreach ($steps as $index => $step): ?>
        <article class="rounded-2xl border border-gray-100 p-6 bg-white shadow-sm">
          <p class="text-xs font-bold text-blue-600 mb-2"><?php echo esc_html($copy['step_label'] . ' ' . ($index + 1)); ?></p>
          <h3 class="text-lg font-bold text-gray-900 mb-2"><?php echo esc_html($step['title']); ?></h3>
          <p class="text-sm text-gray-600 leading-relaxed"><?php echo esc_html($step['body']); ?></p>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="bg-gray-900 py-16 px-4 sm:px-6 lg:px-8 text-center">
    <div class="max-w-3xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-300 uppercase mb-3"><?php echo esc_html($copy['final_eyebrow']); ?></p>
      <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-5"><?php echo esc_html($copy['final_title']); ?></h2>
      <p class="text-gray-400 mb-8"><?php echo esc_html($copy['final_body']); ?></p>
      <div class="flex flex-col sm:flex-row justify-center gap-4">
        <a href="<?php echo esc_url($booking_url); ?>" class="inline-flex justify-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition shadow-lg shadow-blue-500/30 whitespace-nowrap">
          <?php echo esc_html($copy['final_primary']); ?>
        </a>
        <a href="<?php echo esc_url($pricing_url); ?>" class="inline-flex justify-center bg-gray-800 border border-gray-700 hover:border-gray-600 text-white font-bold py-4 px-8 rounded-lg transition whitespace-nowrap">
          <?php echo esc_html($copy['final_secondary']); ?>
        </a>
      </div>
    </div>
  </section>
  <!-- Cal.com integration disabled -->

</div>

<?php get_footer(); ?>
