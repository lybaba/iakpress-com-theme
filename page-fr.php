<?php
/**
 * French landing page served at /fr/.
 */

$client_portal = xpressui_asset_url('front-step-2.png');
$upload_flow   = xpressui_asset_url('front-step-3.png');
$operator_inbox = xpressui_asset_url('admin-project-inbox.png');
$review_screen = xpressui_asset_url('admin-submission-detail.png');
$intro_video_url = 'https://www.youtube.com/watch?v=G8dXHAbIgac';
$intro_video_embed_url = 'https://www.youtube.com/embed/G8dXHAbIgac';

get_header(); ?>

<div class="font-sans text-gray-900 antialiased bg-white">

  <!-- SECTION 1 : HERO -->
  <section class="relative bg-white py-16 md:py-24 px-4 sm:px-6 lg:px-8 overflow-hidden">
    <!-- Premium background glow blobs -->
    <div class="absolute inset-0 -z-10 overflow-hidden pointer-events-none" aria-hidden="true">
      <div class="absolute top-0 left-1/4 w-[500px] h-[500px] bg-gradient-to-tr from-blue-400/10 to-indigo-400/5 rounded-full filter blur-[80px]"></div>
      <div class="absolute bottom-10 right-1/4 w-[400px] h-[400px] bg-gradient-to-br from-indigo-400/10 to-blue-400/5 rounded-full filter blur-[80px]"></div>
    </div>

    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
      <div class="lg:col-span-5 text-center lg:text-left">
        <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-4">Workflows de suivi client pour agences et équipes de service</p>
        <h1 class="text-5xl md:text-6xl font-extrabold tracking-tight text-gray-900 mb-6 leading-tight">
          Arrêtez de relancer vos clients pour les <span class="bg-gradient-to-r from-blue-600 via-indigo-600 to-blue-800 bg-clip-text text-transparent">pièces manquantes.</span>
        </h1>
        <p class="text-xl text-gray-500 mb-10 leading-relaxed">
          Envoyez un lien privé, collectez fichiers et réponses dans une checklist guidée, et voyez tout de suite ce qui manque avant la revue par votre équipe.
        </p>
        <div class="flex flex-col sm:flex-row justify-center lg:justify-start gap-4">
          <a href="<?php echo esc_url(home_url('/fr/contact/')); ?>"
             class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold py-4 px-8 rounded-xl transition-all duration-300 shadow-lg shadow-blue-500/25 hover:shadow-indigo-500/35 hover:-translate-y-0.5 transform whitespace-nowrap">
            Tester le parcours client
          </a>
          <a href="<?php echo esc_url(home_url('/fr/pricing/')); ?>" class="bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-bold py-4 px-8 rounded-xl transition-all duration-300 hover:-translate-y-0.5 shadow-sm hover:shadow whitespace-nowrap">
            Voir le fonctionnement
          </a>
        </div>
      </div>

      <div class="lg:col-span-7">
        <div class="relative rounded-[2rem] bg-gray-950 p-4 md:p-6 shadow-2xl shadow-blue-900/20 ring-1 ring-gray-900/10 hover:-translate-y-0.5 transition-all duration-500">
          <div class="overflow-hidden rounded-2xl bg-white shadow-2xl ring-1 ring-white/10">
            <img src="<?php echo esc_url($upload_flow); ?>" alt="Workflow guidé de collecte de documents dans IntakeFlow" class="h-auto w-full object-cover object-top">
          </div>
          <div class="absolute -left-6 top-10 hidden md:block rounded-2xl bg-white p-3 shadow-xl ring-1 ring-gray-200 hover:-translate-y-1 hover:-translate-x-1 transition-all duration-300 hover:shadow-2xl">
            <p class="mb-2 text-xs font-extrabold uppercase tracking-widest text-blue-600">Portail client</p>
            <img src="<?php echo esc_url($client_portal); ?>" alt="Portail client IntakeFlow" class="h-40 w-56 rounded-xl object-cover object-top">
          </div>
          <div class="absolute -right-4 -bottom-8 hidden md:block w-72 overflow-hidden rounded-2xl bg-white p-3 shadow-2xl ring-1 ring-gray-200 hover:translate-y-1 hover:translate-x-1 transition-all duration-300 hover:shadow-2xl">
            <p class="mb-2 text-xs font-extrabold uppercase tracking-widest text-blue-600">Inbox opérateur</p>
            <img src="<?php echo esc_url($operator_inbox); ?>" alt="Inbox opérateur IntakeFlow" class="h-36 w-full rounded-xl object-cover object-top">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SECTION 1B : BEFORE / AFTER -->
  <section class="bg-gradient-to-b from-blue-50/20 via-white to-blue-50/20 border-y border-blue-100/50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
      <p class="mb-6 text-center text-sm font-bold uppercase tracking-widest text-blue-600">Des demandes dispersées à une soumission prête à traiter</p>
      <div class="grid grid-cols-1 gap-5 md:grid-cols-[1fr_auto_1fr] md:items-center">
        <div class="rounded-2xl border border-red-100/60 bg-white p-6 shadow-sm hover:shadow-red-500/5 hover:border-red-200 transition-all duration-300">
          <p class="mb-4 text-sm font-extrabold uppercase tracking-widest text-red-500">Avant IntakeFlow</p>
          <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
            <?php foreach (['Pièce jointe email', 'Lien Drive', 'Message WhatsApp', 'Pièce manquante', 'Réponse incomplète', 'Aucun statut clair'] as $item): ?>
            <span class="rounded-xl border border-gray-100 bg-gray-50/50 px-4 py-3 text-sm font-semibold text-gray-700"><?php echo esc_html($item); ?></span>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="hidden h-12 w-12 items-center justify-center rounded-full bg-blue-600 text-lg font-black text-white shadow-lg shadow-blue-500/20 md:flex hover:scale-110 transition-transform duration-300">→</div>
        <div class="rounded-2xl border border-blue-200 bg-white p-6 shadow-md shadow-blue-500/5 hover:shadow-blue-500/10 hover:border-blue-300 transition-all duration-300">
          <p class="mb-4 text-sm font-extrabold uppercase tracking-widest text-blue-600">Avec IntakeFlow</p>
          <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
            <?php foreach (['Un lien privé', 'Checklist obligatoire', 'Upload guidé', 'Statut des pièces', 'Inbox opérateur', 'Prêt pour revue'] as $item): ?>
            <span class="rounded-xl border border-blue-100 bg-blue-50/50 px-4 py-3 text-sm font-semibold text-blue-950"><?php echo esc_html($item); ?></span>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SECTION 1C : VIDEO -->
  <section class="bg-white py-16 px-4 sm:px-6 lg:px-8 border-b border-gray-100">
    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
      <div class="lg:col-span-4 text-center lg:text-left">
        <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3">Intro workflow</p>
        <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight text-gray-900 mb-4">Voyez comment une demande client dispersée devient une soumission prête à traiter.</h2>
        <p class="text-gray-600 leading-relaxed mb-6">
          Un tour rapide du lien client, de la soumission guidée, de la notification email et de la revue opérateur.
        </p>
        <a href="<?php echo esc_url($intro_video_url); ?>" target="_blank" rel="noreferrer" class="inline-flex justify-center rounded-lg border border-blue-100 bg-blue-50 px-5 py-3 text-sm font-bold text-blue-700 transition hover:bg-blue-100 whitespace-nowrap">
          Ouvrir sur YouTube
        </a>
      </div>
      <div class="lg:col-span-8">
        <div class="overflow-hidden rounded-3xl border border-gray-200 bg-gray-950 shadow-2xl shadow-blue-900/10">
          <div class="aspect-video">
            <iframe
              src="<?php echo esc_url($intro_video_embed_url); ?>"
              title="Introduction produit IntakeFlow"
              loading="lazy"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              allowfullscreen
              referrerpolicy="strict-origin-when-cross-origin"
              style="width: 100%; height: 100%; border: 0;"
            ></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SECTION 2 : HOW IT WORKS -->
  <section class="bg-gray-50 border-y border-gray-100 py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
      <div class="max-w-3xl mx-auto text-center mb-12">
        <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3">Comment ça marche</p>
        <h2 class="text-3xl font-bold text-gray-900 mb-4">Un parcours clair pour le client, une soumission exploitable pour l'équipe.</h2>
        <p class="text-gray-600 leading-relaxed">IntakeFlow structure la collecte avant le traitement : moins de pièces jointes perdues, moins de relances, plus de contexte dès le départ.</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <?php foreach ([
          ['number' => '1', 'title' => 'Créez le portail', 'body' => 'Définissez les étapes, les documents attendus, les champs requis et les consignes.'],
          ['number' => '2', 'title' => 'Envoyez un lien privé', 'body' => "Le client complète la demande dans une interface guidée au lieu de répondre à une chaîne d'emails."],
          ['number' => '3', 'title' => "Traitez dans l'inbox", 'body' => 'Votre équipe reçoit les fichiers, réponses et statuts dans un espace prêt pour la revue.'],
        ] as $item): ?>
        <article class="bg-white rounded-2xl border border-gray-100 p-8 shadow-sm hover:shadow-xl hover:border-blue-500/15 hover:-translate-y-1.5 transition-all duration-300 flex flex-col items-start">
          <div class="h-8 w-8 rounded-full bg-gradient-to-br from-blue-600 to-indigo-600 text-white font-extrabold flex items-center justify-center mb-5 shadow-sm shadow-blue-500/20"><?php echo esc_html($item['number']); ?></div>
          <h3 class="text-xl font-bold text-gray-900 mb-3"><?php echo esc_html($item['title']); ?></h3>
          <p class="text-gray-600 leading-relaxed"><?php echo esc_html($item['body']); ?></p>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- SECTION 3 : FEATURES -->
  <section class="bg-white py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
      <div>
        <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3">Pas un form builder</p>
        <h2 class="text-3xl font-bold text-gray-900 mb-4">IntakeFlow couvre le suivi complet des pièces manquantes.</h2>
        <p class="text-gray-600 leading-relaxed mb-6">Le formulaire est seulement la porte d'entrée. La valeur est dans le système complet : un lien pour le client, une inbox pour l'équipe et un statut pour chaque pièce manquante.</p>
        <ul class="space-y-3 text-gray-700">
          <?php foreach (['Liens privés pour les demandes sensibles', 'Uploads guidés et champs obligatoires', 'Inbox opérateur pour suivre les soumissions', 'Livraison WordPress ou hébergement IntakeFlow Cloud'] as $point): ?>
          <li class="flex items-start gap-3">
            <span class="mt-1 inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-blue-100 text-xs font-bold text-blue-700">✓</span>
            <span><?php echo esc_html($point); ?></span>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="overflow-hidden rounded-3xl border border-gray-100 bg-gray-50 shadow-xl">
        <img src="<?php echo esc_url($review_screen); ?>" alt="Écran de revue opérateur IntakeFlow" class="w-full object-cover object-top">
      </div>
    </div>
  </section>

  <!-- SECTION 4 : CTA BOTTOM -->
  <section class="bg-gradient-to-b from-gray-900 to-gray-950 py-20 px-4 sm:px-6 lg:px-8 text-center">
    <div class="max-w-3xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-300 uppercase mb-4">Premiers clients en France</p>
      <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-5">Commencez avec un vrai workflow client, pas une démo abstraite.</h2>
      <p class="text-gray-300 leading-relaxed mb-10">On peut livrer un premier portail hébergé ou l'installer sur un site WordPress client, puis transformer ce premier cas en offre réutilisable.</p>
      <div class="flex flex-col sm:flex-row justify-center gap-4">
        <a href="<?php echo esc_url(home_url('/fr/contact/')); ?>" class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold py-4 px-8 rounded-xl transition-all duration-300 shadow-lg shadow-blue-500/25 hover:shadow-indigo-500/35 hover:-translate-y-0.5 transform whitespace-nowrap">Tester l'intake</a>
        <a href="<?php echo esc_url(home_url('/fr/agency-pilot/')); ?>" class="bg-white/10 border border-white/20 hover:bg-white/20 text-white font-bold py-4 px-8 rounded-xl transition whitespace-nowrap">Voir l'accompagnement</a>
      </div>
    </div>
  </section>

</div>

<?php get_footer(); ?>
