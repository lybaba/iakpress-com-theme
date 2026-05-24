<?php
/**
 * French landing page served at /fr/.
 */

$client_portal = xpressui_asset_url('front-step-2.png');
$upload_flow   = xpressui_asset_url('front-step-3.png');
$operator_inbox = xpressui_asset_url('admin-project-inbox.png');
$review_screen = xpressui_asset_url('admin-submission-detail.png');

get_header(); ?>

<div class="font-sans text-gray-900 antialiased bg-white">

  <section class="bg-white py-16 md:py-20 px-4 sm:px-6 lg:px-8 overflow-hidden">
    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
      <div class="lg:col-span-5 text-center lg:text-left">
        <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-4">Portails d'intake client pour WordPress et workflows hébergés</p>
        <h1 class="text-5xl md:text-6xl font-extrabold tracking-tight text-gray-900 mb-6 leading-tight">
          Collectez les documents client dans un portail guidé.
        </h1>
        <p class="text-xl text-gray-500 mb-10 leading-relaxed">
          XPressUI remplace les allers-retours par email par un lien privé, des uploads guidés, des étapes obligatoires et une inbox opérateur. Le portail peut vivre sur un site WordPress client ou être hébergé par XPressUI Cloud.
        </p>
        <div class="flex flex-col sm:flex-row justify-center lg:justify-start gap-4">
          <a href="<?php echo esc_url(home_url('/contact/')); ?>"
             class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition duration-200 shadow-lg shadow-blue-500/30">
            Tester l'intake en direct
          </a>
          <a href="<?php echo esc_url(home_url('/pricing/')); ?>" class="bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-bold py-4 px-8 rounded-lg transition duration-200">
            Voir les tarifs
          </a>
        </div>
      </div>

      <div class="lg:col-span-7">
        <div class="relative rounded-[2rem] bg-gray-950 p-4 md:p-6 shadow-2xl shadow-blue-900/20 ring-1 ring-gray-900/10">
          <div class="overflow-hidden rounded-2xl bg-white shadow-2xl ring-1 ring-white/10">
            <img src="<?php echo esc_url($upload_flow); ?>" alt="Workflow guidé de collecte de documents dans XPressUI" class="h-auto w-full object-cover object-top">
          </div>
          <div class="absolute -left-6 top-10 hidden md:block rounded-2xl bg-white p-3 shadow-xl ring-1 ring-gray-200">
            <p class="mb-2 text-xs font-extrabold uppercase tracking-widest text-blue-600">Portail client</p>
            <img src="<?php echo esc_url($client_portal); ?>" alt="Portail client XPressUI" class="h-40 w-56 rounded-xl object-cover object-top">
          </div>
          <div class="absolute -right-4 -bottom-8 hidden md:block w-72 overflow-hidden rounded-2xl bg-white p-3 shadow-2xl ring-1 ring-gray-200">
            <p class="mb-2 text-xs font-extrabold uppercase tracking-widest text-blue-600">Inbox opérateur</p>
            <img src="<?php echo esc_url($operator_inbox); ?>" alt="Inbox opérateur XPressUI" class="h-36 w-full rounded-xl object-cover object-top">
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-gray-50 border-y border-gray-100 py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
      <div class="max-w-3xl mx-auto text-center mb-12">
        <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3">Comment ça marche</p>
        <h2 class="text-3xl font-bold text-gray-900 mb-4">Un parcours clair pour le client, une soumission exploitable pour l'équipe.</h2>
        <p class="text-gray-600 leading-relaxed">XPressUI structure la collecte avant le traitement : moins de pièces jointes perdues, moins de relances, plus de contexte dès le départ.</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <?php foreach ([
          ['title' => '1. Créez le portail', 'body' => 'Définissez les étapes, les documents attendus, les champs requis et les consignes.'],
          ['title' => '2. Envoyez un lien privé', 'body' => "Le client complète la demande dans une interface guidée au lieu de répondre à une chaîne d'emails."],
          ['title' => "3. Traitez dans l'inbox", 'body' => 'Votre équipe reçoit les fichiers, réponses et statuts dans un espace prêt pour la revue.'],
        ] as $item): ?>
        <article class="bg-white rounded-2xl border border-gray-100 p-7 shadow-sm">
          <h3 class="text-xl font-bold text-gray-900 mb-3"><?php echo esc_html($item['title']); ?></h3>
          <p class="text-gray-600 leading-relaxed"><?php echo esc_html($item['body']); ?></p>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="bg-white py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
      <div>
        <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3">Pas un simple formulaire</p>
        <h2 class="text-3xl font-bold text-gray-900 mb-4">XPressUI couvre le parcours complet de collecte documentaire.</h2>
        <p class="text-gray-600 leading-relaxed mb-6">L'interface client sert à collecter. Mais la valeur est dans le système complet : lien privé, upload, validation, statut, inbox et revue opérateur.</p>
        <ul class="space-y-3 text-gray-700">
          <?php foreach (['Liens privés pour les demandes sensibles', 'Uploads guidés et champs obligatoires', 'Inbox opérateur pour suivre les soumissions', 'Livraison WordPress ou hébergement XPressUI Cloud'] as $point): ?>
          <li class="flex items-start gap-3">
            <span class="mt-1 inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-blue-100 text-xs font-bold text-blue-700">✓</span>
            <span><?php echo esc_html($point); ?></span>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="overflow-hidden rounded-3xl border border-gray-100 bg-gray-50 shadow-xl">
        <img src="<?php echo esc_url($review_screen); ?>" alt="Écran de revue opérateur XPressUI" class="w-full object-cover object-top">
      </div>
    </div>
  </section>

  <section class="bg-gray-900 py-20 px-4 sm:px-6 lg:px-8 text-center">
    <div class="max-w-3xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-300 uppercase mb-4">Premiers clients en France</p>
      <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-5">Commencez avec un vrai workflow client, pas une démo abstraite.</h2>
      <p class="text-gray-300 leading-relaxed mb-10">On peut livrer un premier portail hébergé ou l'installer sur un site WordPress client, puis transformer ce premier cas en offre réutilisable.</p>
      <div class="flex flex-col sm:flex-row justify-center gap-4">
        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition shadow-lg shadow-blue-500/30">Tester l'intake</a>
        <a href="<?php echo esc_url(home_url('/agency-pilot/')); ?>" class="bg-white/10 border border-white/20 hover:bg-white/20 text-white font-bold py-4 px-8 rounded-lg transition">Voir l'accompagnement</a>
      </div>
    </div>
  </section>

</div>

<?php get_footer(); ?>
