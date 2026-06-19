<?php
/**
 * Template Name: Article - Positionnement de fondateur
 * Template for displaying the 'founder-positionnement' article page.
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
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-4">Founder Journey</p>
      <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-gray-900 mb-6 leading-tight">
        « Encore un form builder ? » — la phrase qui a failli tuer mon produit
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

        <img src="<?php echo esc_url( xpressui_asset_url( '02-formulaire-multi-etapes.png' ) ); ?>" alt="IntakeFlow : un sas de pré-collecte multi-étapes pour cabinets comptables." class="rounded-2xl shadow-lg border border-gray-100 my-8 w-full h-auto">

        <p>J'ai passé des mois à construire un produit que je trouvais solide.</p>
        <p>Puis je l'ai montré à quelqu'un. Il a hoché la tête poliment et a dit : <em>« Ah, c'est un constructeur de formulaires, en gros ? »</em></p>
        <p>Et j'ai compris que mon vrai problème n'était pas technique.</p>

        <h2>Le code était la partie facile</h2>
        <p>Ça va surprendre, mais c'est vrai : construire le moteur a été la partie la plus simple.</p>
        <p>Un parcours multi-étapes, des uploads de fichiers validés (format, taille, présence des pièces obligatoires), une inbox opérateur avec statuts, assignations, notes internes, preuves de paiement, export structuré, et même un rendu côté serveur pour l'intégrer sur WordPress sans casser le thème.</p>
        <p>Tout ça, c'est de l'ingénierie. C'est difficile, mais c'est <em>bornable</em>. On sait quand c'est fait.</p>
        <p>Le vrai mur est venu après : <strong>dire clairement ce que c'est.</strong></p>

        <h2>« Form builder » : l'aimant à mauvais prospects</h2>
        <p>À chaque fois que je décrivais le produit comme un outil pour créer des formulaires, deux choses se produisaient.</p>
        <p>D'abord, je me retrouvais mentalement comparé à Typeform, Google Forms, Gravity Forms — des catégories saturées où la bataille du prix est perdue d'avance face à un outil gratuit.</p>
        <p>Ensuite — et c'était pire — j'attirais les <strong>mauvaises personnes</strong>. Des gens qui voulaient un formulaire de contact rapide, qui testaient cinq minutes et repartaient. Pas des opérateurs qui <em>traitent des dossiers à répétition</em> et pour qui le back-office vaut de l'or.</p>
        <p>Le mot « formulaire » décrivait l'interface visible. Il cachait complètement la valeur réelle : <strong>le lien privé, le portail guidé, et l'inbox de traitement.</strong> C'est ce triptyque le produit. Le formulaire n'en est que la surface.</p>
        <p>J'ai mis bien trop longtemps à l'admettre, parce que « form builder », c'était facile à dire. La clarté, elle, demande de renoncer à la facilité.</p>

        <h2>La leçon : un produit horizontal ne se vend à personne</h2>
        <p>J'avais construit quelque chose d'horizontal — clubs, associations, collectivités, agences, professions réglementées. Tout le monde pouvait l'utiliser.</p>
        <p>Ce qui veut dire, en pratique : <strong>personne ne se reconnaissait dedans.</strong> Quand vous parlez à tout le monde, chaque interlocuteur entend « pas vraiment pour moi ».</p>
        <p>La décision la plus difficile n'a donc pas été d'ajouter une fonctionnalité. Ça a été d'en <strong>retirer du message</strong> : choisir une niche, et accepter de ne pas parler aux autres pour parler à une cible de façon ciblée.</p>

        <h2>Pourquoi les cabinets d'expertise comptable</h2>
        <p>J'ai cherché le segment où la douleur du « hors-flux » est la plus aiguë, la plus chiffrable, et la moins bien servie.</p>
        <p>Les cabinets comptables cochaient tout :</p>
        <ul>
          <li>La facture électronique automatise leur flux standard, mais <strong>laisse intacts</strong> l'onboarding (Kbis, statuts, RIB), les pièces d'exception (reçus étrangers, indemnités kilométriques) et les clôtures.</li>
          <li>Leurs collaborateurs peuvent passer <strong>jusqu'à 30 % de leur temps</strong> à relancer des clients pour des pièces — du temps facturé à zéro valeur.</li>
          <li>Les outils d'OCR comme Dext ou Pennylane ne font pas ça. Et personne ne se place clairement <em>en amont</em>, comme un sas de pré-collecte.</li>
        </ul>
        <p>Tout ce que j'avais construit — le lien sans login, la validation à la source, l'inbox avec assignation et notes internes — trouvait soudain une phrase simple : <strong>IntakeFlow est le sas de pré-collecte des pièces que vos outils comptables ne savent pas aller chercher.</strong></p>

        <h2>Ce que je retiens</h2>
        <p>Construire, c'est de l'effort converti en fonctionnalités. C'est fatigant mais linéaire.</p>
        <p>Positionner, c'est convertir un produit en <em>une phrase qu'un client se répète à lui-même</em>. Et ça, ça ne se fait pas en codant. Ça se fait en renonçant — à une catégorie facile, à un public trop large, à l'envie de plaire à tout le monde.</p>
        <p>Si je devais résumer la leçon en une ligne : <strong>votre produit n'existe pas tant que vous ne pouvez pas dire, sans hésiter, à qui il s'adresse et ce qu'il remplace.</strong></p>

        <hr class="my-10 border-gray-200">

        <p>Si vous dirigez un cabinet et que cette histoire de « hors-flux » vous parle, on construit IntakeFlow exactement pour ça : <a href="<?php echo esc_url( home_url( '/' ) ); ?>">intakeflow.dev</a></p>
        <p><em>(Et si vous êtes founder en train de vous battre avec votre propre positionnement — venez en discuter en commentaire. C'est un combat plus solitaire qu'on ne le dit.)</em></p>

      </div>
    </div>
  </section>

  <!-- CTA Banner -->
  <section class="bg-blue-50 border-y border-blue-100 py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto text-center">
      <h2 class="text-3xl font-extrabold text-gray-900 mb-3">Donnez à votre cabinet une longueur d'avance</h2>
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
