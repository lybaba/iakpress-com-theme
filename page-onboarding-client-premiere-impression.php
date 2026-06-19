<?php
/**
 * Template Name: Article - L'onboarding client & première impression
 * Template for displaying the 'onboarding-client-premiere-impression' article page.
 */

get_header(); ?>

<div class="font-sans text-gray-900 antialiased bg-gray-50 pb-20">

  <!-- Header -->
  <section class="bg-white py-16 px-4 sm:px-6 lg:px-8 border-b border-gray-100">
    <div class="max-w-3xl mx-auto">
      <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-800 mb-8 transition">
        <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Tous les articles
      </a>
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-4">Expérience Client</p>
      <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-gray-900 mb-6 leading-tight">
        Le premier email d'onboarding qui fait fuir vos nouveaux clients
      </h1>
      <div class="flex items-center space-x-4 text-sm text-gray-400">
        <time datetime="2026-06-20">20 Juin 2026</time>
        <span>•</span>
        <span>4 min de lecture</span>
      </div>
    </div>
  </section>

  <!-- Body -->
  <section class="bg-white py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
      <div class="prose prose-lg prose-blue max-w-none
                  prose-headings:font-extrabold prose-headings:tracking-tight prose-headings:text-gray-900
                  prose-h2:text-3xl prose-h2:mt-10 prose-h2:mb-4
                  prose-p:text-gray-600 prose-p:leading-relaxed
                  prose-a:text-blue-600 prose-a:no-underline hover:prose-a:underline
                  prose-strong:text-gray-900
                  prose-li:text-gray-600">

        <img src="<?php echo esc_url( xpressui_asset_url( '03-onboarding-client.png' ) ); ?>" alt="Le portail d onboarding client, sans login, à la marque du cabinet." class="rounded-2xl shadow-lg border border-gray-100 my-8 w-full h-auto">

        <p>Un client vient de signer avec votre cabinet. Il est enthousiaste, rassuré, prêt à vous confier ses comptes.</p>
        <p>Puis il reçoit votre premier email d'onboarding :</p>
        <blockquote>
          « Bonjour, merci de nous transmettre votre Kbis, vos statuts à jour, un RIB, les pièces d'identité des associés, le dernier bilan… Vous pouvez tout envoyer en réponse à ce mail. »
        </blockquote>
        <p>Et là, sa belle première impression se fissure. Vous venez de transformer un moment de confiance en corvée administrative.</p>

        <h2>La première impression d'un cabinet ne se joue pas au RDV de signature</h2>
        <p>Elle se joue à ce moment précis : <strong>la première fois que le client doit <em>faire</em> quelque chose pour vous.</strong></p>
        <p>S'il doit chercher dans ses dossiers, scanner à la va-vite, deviner quel format vous voulez et empiler dix pièces jointes dans un email, vous lui envoyez un signal involontaire : <em>« travailler avec nous, ce sera de l'administratif. »</em></p>
        <p>Un cabinet moderne ne peut plus se le permettre. Le marché est tendu, les clients comparent, et l'expérience d'onboarding est l'un des rares endroits où vous pouvez vous différencier <em>avant même</em> d'avoir produit le moindre bilan.</p>

        <h2>Un portail à votre marque, ouvert en un clic</h2>
        <p>Imaginez l'autre version.</p>
        <p>Le client reçoit <strong>un lien unique</strong>. Il l'ouvre — sur son mobile, dans le métro, sans rien installer, sans créer de compte. Il tombe sur un portail propre, <strong>à l'image de votre cabinet</strong> (votre logo, vos couleurs, votre message d'accueil).</p>
        <p>Le portail lui dit, étape par étape, <strong>exactement quelles pièces déposer</strong> :</p>
        <ul>
          <li>Kbis</li>
          <li>Statuts</li>
          <li>RIB</li>
          <li>Pièces d'identité des associés</li>
        </ul>
        <p>À chaque dépôt, le système vérifie en silence que le <strong>format est bon</strong> et que la <strong>pièce attendue est bien là</strong>. Le client n'a aucune décision à prendre, aucune question à se poser. Il dépose, il valide, c'est fini.</p>
        <p>De votre côté, le dossier arrive complet et structuré dans votre <strong>inbox opérateur</strong>, prêt à être assigné au collaborateur référent et exporté vers votre outil de production.</p>
        <p>Voilà la première impression que vous voulez laisser : <em>« avec ce cabinet, même l'administratif est simple. »</em></p>
        <p>C'est précisément ce que permet un outil comme <strong>IntakeFlow</strong> : un lien privé sans login, un portail guidé à votre marque, et une inbox pour traiter.</p>

        <h2>Et ce portail vous garde « RGPD-propre »</h2>
        <p>Ce n'est pas qu'un sujet d'image. C'est aussi un sujet de conformité — un point sensible pour un associé responsable du dossier.</p>
        <p>Collecter des pièces d'identité et des données financières par email, c'est :</p>
        <ul>
          <li>des données personnelles dispersées dans des boîtes mail individuelles,</li>
          <li>aucune traçabilité de qui a accédé à quoi,</li>
          <li>aucun moyen propre de purger les pièces quand le dossier est clos.</li>
        </ul>
        <p>Un portail de collecte structuré change la donne. Les pièces sont <strong>centralisées</strong> au lieu d'être éparpillées, <strong>téléchargeables et purgeables</strong> depuis la console (purge RGPD des pièces jointes), et l'historique de traitement est tracé.</p>
        <p>Et pour les cabinets qui veulent la souveraineté maximale, l'<strong>export WordPress avec rendu côté serveur</strong> permet d'héberger le portail directement sur le site du cabinet — un argument que ni Content Snare ni JotForm ne proposent aussi simplement.</p>

        <h2>L'onboarding n'est pas une formalité. C'est un produit.</h2>
        <p>Le cabinet qui traite son onboarding comme une expérience — fluide, à sa marque, conforme — ne se contente pas de gagner du temps. Il <strong>fidélise dès le premier contact</strong> et <strong>rassure sur sa rigueur</strong>.</p>
        <p>Vos concurrents envoient encore des emails avec une liste de pièces. C'est votre opportunité.</p>

        <hr class="my-10 border-gray-200">

        <p>Envie de voir à quoi ressemble un portail d'onboarding à la marque de votre cabinet ? Jetez un œil : <a href="<?php echo esc_url( home_url( '/' ) ); ?>">intakeflow.dev</a></p>

      </div>
    </div>
  </section>

  <!-- CTA Banner -->
  <section class="bg-blue-50 border-y border-blue-100 py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto text-center">
      <h2 class="text-3xl font-extrabold text-gray-900 mb-3">Soignez votre première impression client</h2>
      <p class="text-gray-600 mb-8">Découvrez notre sas de pré-collecte de documents en action.</p>
      <div class="flex flex-col sm:flex-row justify-center gap-4">
        <a href="<?php echo esc_url( home_url( '/for-accountants/' ) ); ?>"
           class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg transition duration-200 shadow-lg shadow-blue-500/30">
          Créer notre portail cabinet
        </a>
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"
           class="bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-bold py-3 px-8 rounded-lg transition duration-200">
          Contacter notre équipe
        </a>
      </div>
    </div>
  </section>

</div>

<?php get_footer(); ?>
