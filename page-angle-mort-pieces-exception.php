<?php
/**
 * Template Name: Article - L'angle mort de votre cabinet
 * Template for displaying the 'angle-mort-pieces-exception' article page.
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
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-4">Stratégie Cabinet</p>
      <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-gray-900 mb-6 leading-tight">
        L'angle mort de votre cabinet : les documents que Dext et Pennylane ne géreront jamais
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

        <img src="<?php echo esc_url( xpressui_asset_url( '01-collecte-pieces.png' ) ); ?>" alt="Collecte multi-étapes : chaque pièce demandée avec ses instructions et sa validation." class="rounded-2xl shadow-lg border border-gray-100 my-8 w-full h-auto">

        <p>Vos outils d'OCR lisent parfaitement une facture EDF.</p>
        <p>Mais que se passe-t-il quand un client vous envoie, en photo WhatsApp floue, un reçu d'achat libellé en mandarin, sans justificatif de paiement associé ?</p>
        <p>Là, l'OCR s'arrête. Et le travail manuel commence.</p>

        <h2>L'OCR a résolu le standard. Pas l'exception.</h2>
        <p>Dext, Receipt Bank, Pennylane : ce sont d'excellentes machines à lire des factures classiques et standardisées. La facture électronique va d'ailleurs automatiser encore plus ce flux dans les mois qui viennent.</p>
        <p>Mais ces outils n'ont jamais été conçus pour une chose : <strong>aller chercher la pièce qui manque, dans le bon ordre, auprès du bon client.</strong></p>

        <p>Or c'est précisément là que vos collaborateurs perdent leurs heures :</p>
        <ul>
          <li>Le <strong>Kbis</strong>, les <strong>statuts</strong> et le <strong>RIB</strong> réclamés à l'ouverture d'un dossier.</li>
          <li>Les <strong>pièces d'identité des associés</strong> à la création d'une société.</li>
          <li>Les <strong>justificatifs d'exception</strong> : reçus d'achats étrangers (Asie, USA), indemnités kilométriques, virements bancaires non identifiés.</li>
          <li>Les <strong>demandes groupées de clôture ou d'audit</strong> : contrats de prêt, états des stocks au 31/12, attestations diverses.</li>
        </ul>

        <p>Aucun de ces documents n'arrive « tout seul, bien rangé ». Chacun demande une relance, une explication, un contrôle de complétude. Et aucun OCR ne fait ça.</p>

        <h2>La différence : lecture de pièce vs collecte guidée</h2>
        <p>C'est une distinction simple mais structurante.</p>
        <p><strong>Un outil d'OCR</strong> part d'un document déjà reçu et en extrait des données.</p>
        <p><strong>Un workflow de collecte guidée</strong> part d'un <em>besoin</em> — « j'ai besoin du Kbis, des statuts et de deux RIB pour ce dossier » — et accompagne le client jusqu'à ce que le dossier soit complet et conforme.</p>
        <p>Ce sont deux étapes opposées de la chaîne. L'une nettoie la sortie. L'autre sécurise l'entrée.</p>
        <p>Tant que l'entrée reste un email avec « pouvez-vous me renvoyer ça ? », le meilleur OCR du monde travaillera toujours sur des dossiers troués.</p>

        <h2>À quoi ressemble une collecte guidée</h2>
        <p>C'est exactement le rôle d'un sas de pré-collecte, en amont de votre outil de production (Cegid, ACD, Ibiza, Pennylane). Il ne le remplace pas — il le nourrit propre.</p>
        <p>Concrètement, avec un outil comme <strong>IntakeFlow</strong> :</p>
        <ol>
          <li>Vous construisez un parcours par type de besoin (onboarding, clôture, justificatif d'exception), avec <strong>plusieurs étapes</strong> et une instruction claire par pièce demandée.</li>
          <li>Le client reçoit <strong>un simple lien</strong> — sans compte à créer, sans mot de passe.</li>
          <li>Chaque dépôt est <strong>validé à la source</strong> : présence des pièces obligatoires, format de fichier accepté, taille du fichier. Un fichier illisible ou manquant est signalé avant l'envoi, pas trois relances plus tard.</li>
          <li>Le dossier complet arrive structuré dans une <strong>inbox opérateur</strong> où votre collaborateur le traite, l'assigne, l'annote, puis l'exporte vers votre GED.</li>
        </ol>
        <p>Ce n'est pas un concurrent de votre OCR. C'est ce qui devrait se trouver <em>avant</em> lui.</p>

        <h2>Le vrai enjeu : ce que la réglementation ne couvre pas</h2>
        <p>La facture électronique va industrialiser le flux standard. Tant mieux : ça vous libère du temps sur la saisie répétitive.</p>
        <p>Mais elle ne touche pas à l'onboarding client, aux pièces d'exception, ni aux justificatifs de clôture. Ce résidu hors-flux — celui qui résiste depuis toujours à l'automatisation — va devenir, mécaniquement, <strong>la part la plus chronophage de la production de votre cabinet.</strong></p>
        <p>Le cabinet qui aura industrialisé <em>cette</em> collecte-là prendra une longueur d'avance sur la marge par dossier.</p>

        <hr class="my-10 border-gray-200">

        <p>La question n'est donc pas « quel OCR choisir ». C'est : <strong>qui s'occupe de tout ce que l'OCR ne verra jamais ?</strong></p>
        <p>Si vous voulez voir à quoi ressemble un sas de pré-collecte conçu pour les pièces d'exception et l'onboarding, c'est par ici : <a href="<?php echo esc_url( home_url( '/' ) ); ?>">intakeflow.dev</a></p>

      </div>
    </div>
  </section>

  <!-- CTA Banner -->
  <section class="bg-blue-50 border-y border-blue-100 py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto text-center">
      <h2 class="text-3xl font-extrabold text-gray-900 mb-3">Prêt à en finir avec les pièces manquantes ?</h2>
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
