<?php
/**
 * Template Name: Article - Facture électronique et hors-flux
 * Template for displaying the 'facture-electronique-ce-qui-reste' article page.
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
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-4">Réglementation</p>
      <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-gray-900 mb-6 leading-tight">
        Facture électronique 2026 : ce que la réforme ne résout PAS
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

        <img src="<?php echo esc_url( xpressui_asset_url( '04-collecte-fiscale-tva.png' ) ); ?>" alt="Pré-collecte fiscale & TVA : SIRET, raison sociale, dirigeant — structurés avant l outil de production." class="rounded-2xl shadow-lg border border-gray-100 my-8 w-full h-auto">

        <p>Toute la profession parle de ce que la facture électronique va automatiser.</p>
        <p>Presque personne ne parle de ce qu'elle va <strong>laisser intact</strong> — et c'est pourtant là que se jouera la marge des cabinets dans les prochaines années.</p>

        <h2>Ce que la réforme résout (vraiment)</h2>
        <p>Soyons justes : c'est une bonne nouvelle pour les cabinets.</p>
        <p>La généralisation de la facture électronique (Factur-X, plateformes agréées) va structurer et fiabiliser les flux de <strong>factures d'achats et de ventes classiques</strong>. Le format devient normé, la donnée arrive propre, l'OCR et la saisie répétitive se réduisent à peau de chagrin sur ce périmètre.</p>
        <p>Pour la saisie standard, c'est une vraie automatisation. Le temps gagné est réel.</p>

        <h2>Ce que la réforme ne touche pas (du tout)</h2>
        <p>Mais une facture normée ne représente qu'une partie de ce qui entre dans un dossier comptable. Tout le reste — le <strong>hors-flux</strong> — reste exactement aussi manuel qu'avant.</p>
        <p>La réforme ne résout pas :</p>
        <ul>
          <li><strong>L'onboarding client.</strong> Le Kbis, les statuts, le RIB, les pièces d'identité des associés à l'ouverture d'un dossier. Aucune plateforme de facturation ne vous les apporte.</li>
          <li><strong>Les pièces d'exception.</strong> Reçus d'achats étrangers, indemnités kilométriques, justificatifs de virements non identifiés, notes de frais hors normes. Toujours en photo floue, toujours par email.</li>
          <li><strong>Les clôtures et audits.</strong> Les demandes groupées de fin d'exercice : contrats de prêt, états des stocks au 31/12, attestations. La facture électronique n'a rien à voir avec ça.</li>
          <li><strong>Le suivi de complétude.</strong> Savoir, dossier par dossier, ce qui est arrivé et ce qui manque encore.</li>
        </ul>

        <p>Ce résidu n'est pas un détail. C'est précisément la partie qui résistait <em>déjà</em> à l'automatisation. Et à mesure que le standard s'automatise, <strong>le hors-flux devient mécaniquement la part la plus chronophage</strong> de votre production.</p>

        <h2>L'effet de bascule que personne n'anticipe</h2>
        <p>Voici le raisonnement que peu de cabinets font à voix haute.</p>
        <p>Si la réforme retire, disons, la moitié du temps passé sur la saisie standard, elle ne réduit pas votre charge de moitié. Elle <strong>change la composition de votre charge</strong> : la part « pièces complexes, onboarding, clôtures » passe d'un tiers de votre temps à une majorité de votre temps.</p>
        <p>Autrement dit : le goulot d'étranglement de demain, ce n'est pas la facture. C'est tout ce qui l'entoure.</p>
        <p>Le cabinet qui aura industrialisé <em>cette</em> collecte-là — pas avec un OCR de plus, mais avec un <strong>sas de pré-collecte guidé</strong> — prendra une avance de marge difficile à rattraper.</p>

        <h2>Le sas de pré-collecte : la pièce qui manque à votre stack</h2>
        <p>C'est exactement le créneau d'un outil comme <strong>IntakeFlow</strong>. Il ne remplace ni votre outil de production (Cegid, ACD, Ibiza, Pennylane) ni votre plateforme de facturation. Il se place <strong>en amont</strong>, sur tout ce qu'ils ne courent pas :</p>
        <ul>
          <li><strong>un lien privé sans login</strong> que vous envoyez au client pour chaque besoin (onboarding, exception, clôture) ;</li>
          <li>un <strong>parcours guidé multi-étapes</strong> qui demande la bonne pièce, dans le bon ordre, avec validation du format et de la présence à la source ;</li>
          <li>une <strong>inbox opérateur</strong> avec statuts, assignation, notes internes et export structuré vers votre GED.</li>
        </ul>
        <p>La facture électronique nettoie l'entrée standard. Le sas de pré-collecte nettoie tout le reste. Les deux sont complémentaires, pas concurrents.</p>

        <h2>La fenêtre est maintenant</h2>
        <p>Les cabinets qui se contentent d'attendre la réforme géreront le hors-flux comme aujourd'hui : par email, à la main, dans la douleur.</p>
        <p>Ceux qui anticipent installeront leur sas de pré-collecte <em>avant</em> que le hors-flux ne devienne leur premier poste de temps. Le timing n'est pas neutre — c'est l'un des rares moments où repenser sa collecte documentaire est à la fois urgent et stratégique.</p>

        <hr class="my-10 border-gray-200">

        <p>La facture électronique automatise le standard. <strong>Qui automatise le reste dans votre cabinet ?</strong></p>
        <p>Pour voir à quoi ressemble un sas de pré-collecte pensé pour le hors-flux : <a href="<?php echo esc_url( home_url( '/' ) ); ?>">intakeflow.dev</a></p>

      </div>
    </div>
  </section>

  <!-- CTA Banner -->
  <section class="bg-blue-50 border-y border-blue-100 py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto text-center">
      <h2 class="text-3xl font-extrabold text-gray-900 mb-3">Anticipez la transition numérique</h2>
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
