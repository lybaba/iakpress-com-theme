<?php
/**
 * Template Name: Article - 30% du temps perdu en relances
 * Template for displaying the '30pourcent-temps-relance' article page.
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
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-4">Productivité Cabinet</p>
      <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-gray-900 mb-6 leading-tight">
        Vos collaborateurs passent jusqu'à 30 % de leur temps à courir après des pièces
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

        <img src="<?php echo esc_url( xpressui_asset_url( '02-formulaire-multi-etapes.png' ) ); ?>" alt="Un seul lien à envoyer au client — un parcours guidé multi-étapes, sans création de compte." class="rounded-2xl shadow-lg border border-gray-100 my-8 w-full h-auto">

        <p>Faites le calcul une fois, honnêtement.</p>
        <p>Combien d'heures, par semaine, vos collaborateurs passent-ils non pas à <em>produire de la compta</em>, mais à <strong>relancer des clients pour des pièces manquantes</strong> ?</p>
        <p>Selon les retours du secteur, cette chasse documentaire peut absorber jusqu'à 30 % du temps d'un collaborateur. Du temps facturé à zéro valeur ajoutée.</p>

        <h2>Le problème n'est pas vos clients. C'est le canal.</h2>
        <p>La relance par email, WhatsApp et SMS est un système qui <em>garantit</em> le désordre :</p>
        <ul>
          <li>La pièce arrive dans <strong>trois canaux différents</strong>, jamais au même endroit.</li>
          <li>Le fichier est mal nommé, mal cadré, dans un format que votre outil refuse.</li>
          <li>Personne ne sait, à un instant T, <strong>quel dossier est vraiment complet</strong> et lequel attend encore quelque chose.</li>
          <li>Et quand un collaborateur est absent, l'historique des échanges part avec lui, enfoui dans sa boîte mail personnelle.</li>
        </ul>
        <p>Vous ne courez pas après les clients. Vous courez après l'information, parce qu'elle est éparpillée par construction.</p>

        <h2>Le correctif : un lien, une validation, une inbox</h2>
        <p>Le schéma qui casse ce cercle tient en trois éléments indissociables.</p>

        <p><strong>1. Un seul lien sécurisé, sans login.</strong><br>
        Vous envoyez au client un lien privé. Pas d'application à installer, pas de compte ni de mot de passe à retenir. C'est ce qui lève l'essentiel des freins à l'usage — y compris chez les clients les plus réfractaires à la technologie.</p>

        <p><strong>2. Une validation automatique à la source.</strong><br>
        Au moment où le client dépose une pièce, le système vérifie le format de fichier, la taille, et la présence des pièces obligatoires. Si quelque chose manque, il le voit <em>avant</em> d'envoyer — pas après votre énième relance.</p>

        <p><strong>3. Une inbox opérateur, pas une boîte mail.</strong><br>
        Et c'est là que tout change pour le collaborateur. Chaque dossier reçu arrive dans un tableau de bord centralisé, avec :</p>
        <ul>
          <li>des <strong>statuts clairs</strong> : nouveau, en cours de revue, en attente d'information, en attente de paiement, traité, rejeté, archivé ;</li>
          <li>l'<strong>assignation à un collaborateur précis</strong>, pour que chacun sache ce qui lui revient ;</li>
          <li>des <strong>notes internes confidentielles</strong> sur la soumission, pour s'échanger un point de revue sans polluer le dossier client ;</li>
          <li>des <strong>filtres, tags et priorités</strong>, plus des actions groupées pour traiter en lot.</li>
        </ul>
        <p>L'objectif n'est pas « un outil de plus ». C'est de remplacer la boîte mail comme lieu de travail.</p>

        <h2>Ce que ça change, très concrètement</h2>
        <p>Au lieu d'ouvrir Outlook le matin et de reconstituer mentalement l'état de dix dossiers, votre collaborateur ouvre une inbox où chaque dossier porte un statut.</p>
        <p>Il voit en un coup d'œil les <strong>nouveaux</strong> dépôts, ceux <strong>en attente d'information</strong>, ceux <strong>prêts à traiter</strong>. Il assigne, il annote, il valide, il exporte vers votre outil de production. Sans rouvrir un seul email.</p>
        <p>Et le client ? Il reçoit une confirmation immédiate après son dépôt. Pas de zone de flou du type « est-ce qu'ils ont bien reçu ? ».</p>

        <h2>Un mot d'honnêteté sur les relances</h2>
        <p>Soyons précis, car la nuance compte : aujourd'hui l'outil envoie une <strong>confirmation automatique</strong> au dépôt et permet à l'opérateur de <strong>renvoyer une notification</strong> au client depuis l'inbox. Les <strong>relances programmées entièrement automatiques</strong> (« relance J+3 si pièce manquante ») sont sur la feuille de route, pas encore livrées.</p>
        <p>Mais le gros du gain n'est pas là. Il est dans le fait que la pièce arrive <strong>complète et validée du premier coup</strong>, dans <strong>un seul endroit</strong> — ce qui supprime la majorité des relances avant même qu'elles n'existent.</p>

        <hr class="my-10 border-gray-200">

        <p>La bonne question pour un cabinet n'est pas « comment relancer plus vite ». C'est : <strong>comment ne plus avoir à relancer.</strong></p>
        <p>Si vous voulez voir l'inbox opérateur en action, c'est ici : <a href="<?php echo esc_url( home_url( '/' ) ); ?>">intakeflow.dev</a></p>

      </div>
    </div>
  </section>

  <!-- CTA Banner -->
  <section class="bg-blue-50 border-y border-blue-100 py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto text-center">
      <h2 class="text-3xl font-extrabold text-gray-900 mb-3">Libérez du temps pour vos collaborateurs</h2>
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
