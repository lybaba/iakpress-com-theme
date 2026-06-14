<?php
/**
 * Template Name: Done-For-You Service Page
 * Template for displaying the Done-For-You (DFY) service offering.
 */

$is_fr = function_exists('iakpress_is_french_request') && iakpress_is_french_request();
$pricing_url = $is_fr ? home_url('/fr/pricing/') : home_url('/pricing/');
$contact_url = $is_fr ? home_url('/fr/contact/') : home_url('/contact/');
// CTA opens the same per-language hosted link as the contact page's "Démarrer le
// brief" button; falls back to the contact page when no hosted link is configured.
$booking_url = function_exists('iakpress_contact_hosted_launch_url')
  ? iakpress_contact_hosted_launch_url($is_fr)
  : '';
if ($booking_url === '') {
  $booking_url = $contact_url;
}

get_header(); ?>

<div class="font-sans text-gray-900 antialiased bg-gray-50 min-h-screen pb-20">

  <!-- Hero -->
  <section class="relative bg-gradient-to-br from-slate-900 via-blue-950 to-indigo-950 text-white py-24 px-4 sm:px-6 lg:px-8 text-center overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
    <div class="max-w-4xl mx-auto relative z-10">
      <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-blue-500/10 text-blue-300 border border-blue-500/20 mb-6 uppercase tracking-widest">
        <?php echo $is_fr ? 'Service Clé en Main' : 'Done-For-You Setup'; ?>
      </span>
      <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight mb-6 leading-tight">
        <?php echo $is_fr 
          ? 'Votre portail client configuré et intégré sous 7 jours' 
          : 'Your custom client portal set up & live in 7 days'; ?>
      </h1>
      <p class="text-xl text-slate-300 max-w-3xl mx-auto leading-relaxed mb-10">
        <?php echo $is_fr 
          ? 'Pas le temps de configurer vos portails de collecte ? Nous gérons l’intégralité de la configuration, du design, de l’intégration WordPress et des automatisations.' 
          : 'No time to configure your portals? We handle the entire configuration, custom styling, WordPress embedding, and automations setup.'; ?>
      </p>
      <div class="flex flex-col sm:flex-row justify-center gap-4">
        <a href="<?php echo esc_url($booking_url); ?>" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition shadow-lg shadow-blue-500/30">
          <?php echo $is_fr ? 'Discuter de votre projet' : 'Get started'; ?>
        </a>
        <a href="<?php echo esc_url($pricing_url); ?>" class="bg-white/10 hover:bg-white/20 border border-white/20 text-white font-bold py-4 px-8 rounded-lg transition">
          <?php echo $is_fr ? 'Voir les tarifs' : 'Compare plans'; ?>
        </a>
      </div>
    </div>
  </section>

  <!-- Key Benefits -->
  <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 relative z-20">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <?php
      $benefits = $is_fr ? [
        ['title' => 'Gain de Temps Total', 'desc' => 'Envoyez-nous votre checklist ou modèle brut, nous nous chargeons de concevoir le parcours idéal.'],
        ['title' => 'Design & Marque Alignés', 'desc' => 'Intégration fluide à votre charte graphique et sur votre site WordPress existant (sans iframe).'],
        ['title' => 'Automatisations Opérationnelles', 'desc' => 'Connexion directe à vos outils métiers (Zapier, Notion, Webhooks) et configuration des relances automatiques.']
      ] : [
        ['title' => 'Save Precious Time', 'desc' => 'Send us your checklist or raw requirements, we take care of structuring the perfect client experience.'],
        ['title' => 'Branded & Embedded', 'desc' => 'Seamless styling to match your colors and fonts, directly embedded on WordPress (no iframe).'],
        ['title' => 'Ready to Automate', 'desc' => 'Direct connection to your business tools (Zapier, Notion, Webhooks) and emails follow-up configuration.']
      ];
      foreach ($benefits as $idx => $item):
      ?>
      <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm">
        <div class="h-10 w-10 rounded-xl bg-blue-50 text-blue-600 font-bold flex items-center justify-center mb-4">
          <?php echo $idx + 1; ?>
        </div>
        <h3 class="text-lg font-bold text-gray-900 mb-2"><?php echo esc_html($item['title']); ?></h3>
        <p class="text-sm text-gray-500 leading-relaxed"><?php echo esc_html($item['desc']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- Package Details -->
  <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pt-20">
    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-8 md:p-12 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
      <div class="lg:col-span-7">
        <span class="text-xs font-bold tracking-widest text-blue-600 uppercase mb-2 block">
          <?php echo $is_fr ? 'Détails du package' : 'Package details'; ?>
        </span>
        <h2 class="text-3xl font-extrabold text-gray-900 mb-6">
          <?php echo $is_fr ? 'Tout ce qui est inclus dans le service clé en main' : 'Everything included in the turnkey setup'; ?>
        </h2>
        <p class="text-gray-500 leading-relaxed mb-8">
          <?php echo $is_fr
            ? 'Nous ne nous contentons pas de créer un simple portail de saisie. Nous mettons sur pied un canal de collecte opérationnel qui protège le temps de votre équipe.'
            : 'We do not just build a simple questionnaire. We set up an operational collection channel that saves your team time.'; ?>
        </p>

        <ul class="space-y-4">
          <?php
          $inclusions = $is_fr ? [
            '<strong>Modélisation de vos parcours</strong> : Conception et mise en page de vos portails par étapes.',
            '<strong>Personnalisation graphique</strong> : Intégration de votre logo, de vos couleurs et polices.',
            '<strong>Intégration WordPress</strong> : Intégration sur votre site WordPress avec le plugin IntakeFlow.',
            '<strong>Mise en place des e-mails</strong> : Configuration du résumé de soumission et des relances de pièces manquantes.',
            '<strong>Automatisations & Connecteurs</strong> : Liaison à vos outils de stockage et traitement (Zapier, Notion, email opérateur).',
            '<strong>1 an de licence Starter incluse</strong> (valeur : 252 €) pour bénéficier des mises à jour automatiques.',
            '<strong>Support prioritaire (12 mois)</strong> : Assistance par e-mail en 24-48h.'
          ] : [
            '<strong>Portal configuration</strong>: Multi-step layout design of your custom client questions.',
            '<strong>Branding & CSS styling</strong>: Implementation of your logo, custom colors, and typography.',
            '<strong>WordPress embedding</strong>: Seamless output on your site pages using shortcodes.',
            '<strong>Email notifications</strong>: Scoped template layout with operator summaries and 1-click reminders.',
            '<strong>Integrations & Connectors</strong>: Linking fields to Zapier, Google Drive, Notion, or Webhooks.',
            '<strong>1-year Starter license included</strong> (worth €252) for automated updates and sync.',
            '<strong>Priority email support</strong>: Direct support and assistance for 12 months.'
          ];
          foreach ($inclusions as $inc):
          ?>
          <li class="flex items-start gap-3 text-sm text-gray-600">
            <svg class="h-5 w-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            <span><?php echo $inc; ?></span>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="lg:col-span-5 bg-slate-900 rounded-3xl p-8 text-white relative overflow-hidden shadow-xl">
        <div class="absolute inset-0 opacity-5 bg-[radial-gradient(#ffffff_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="relative z-10">
          <p class="text-xs font-bold text-blue-400 uppercase tracking-widest mb-2">
            <?php echo $is_fr ? 'Tarif unique de lancement' : 'Flat launch pricing'; ?>
          </p>
          <h3 class="text-2xl font-bold mb-4"><?php echo $is_fr ? 'Service Clé en Main' : 'Done-For-You Portal'; ?></h3>
          <div class="flex items-baseline gap-2 mb-6">
            <span class="text-5xl font-extrabold">499 €</span>
            <span class="text-slate-400 text-sm"><?php echo $is_fr ? 'paiement unique' : 'one-time payment'; ?></span>
          </div>

          <p class="text-sm text-slate-300 leading-relaxed mb-6">
            <?php echo $is_fr
              ? 'Idéal pour les cabinets comptables, avocats, et agences qui souhaitent un flux opérationnel impeccable sans y passer des heures.'
              : 'Best for accounting firms, law firms, and agencies wanting a smooth operations flow without investing development hours.'; ?>
          </p>

          <a href="<?php echo esc_url($booking_url); ?>" class="block text-center w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded-lg transition shadow-lg shadow-blue-500/20 whitespace-nowrap mb-4">
            <?php echo $is_fr ? 'Commander le setup' : 'Book configuration'; ?>
          </a>
          <p class="text-[11px] text-center text-slate-400">
            <?php echo $is_fr
              ? 'Comprend 1 an de licence Starter d’une valeur de 252 €.'
              : 'Includes 1 year of Starter license worth €252.'; ?>
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Target Audiences -->
  <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pt-20">
    <div class="max-w-3xl mb-12">
      <span class="text-xs font-bold tracking-widest text-blue-600 uppercase mb-2 block">
        <?php echo $is_fr ? 'Pour qui ?' : 'Who is this for?'; ?>
      </span>
      <h2 class="text-3xl font-extrabold text-gray-900 mb-4">
        <?php echo $is_fr ? 'Conçu pour les secteurs d’activité exigeants en pièces jointes' : 'Built for file-heavy operational sectors'; ?>
      </h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
      <?php
      $audiences = $is_fr ? [
        ['title' => 'Experts-Comptables', 'desc' => 'Collecte mensuelle structurée de pièces comptables (TVA, notes de frais, statuts) avec relances automatiques.'],
        ['title' => 'Avocats & Juristes', 'desc' => 'Réception de justificatifs d’identité, mandats signés et pièces justificatives de dossiers confidentiels.'],
        ['title' => 'RH & Recrutement', 'desc' => 'Dépôt des dossiers de candidature complets (CV, diplômes, contrats) dans un espace structuré sécurisé.'],
        ['title' => 'Agences & Freelances', 'desc' => 'Centralisation des briefs créatifs, logos, accès serveurs et contenus clients avant démarrage de projet.']
      ] : [
        ['title' => 'Accounting Firms', 'desc' => 'Structured monthly tax and bookkeeping receipts collection with automatic client-email followups.'],
        ['title' => 'Lawyers & Attorneys', 'desc' => 'Confidential collection of signed mandates, identity verification proofs, and case supporting files.'],
        ['title' => 'HR & Recruiting', 'desc' => 'Direct portals for candidate profile completion, ID collection, contract signing, and credentials upload.'],
        ['title' => 'Agencies & Creators', 'desc' => 'Centralized onboarding briefs, server credentials, branding assets, and copy before project kick-off.']
      ];
      foreach ($audiences as $item):
      ?>
      <article class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm">
        <h3 class="text-lg font-bold text-gray-900 mb-2"><?php echo esc_html($item['title']); ?></h3>
        <p class="text-xs text-gray-500 leading-relaxed"><?php echo esc_html($item['desc']); ?></p>
      </article>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- Process Steps -->
  <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 pt-20">
    <div class="bg-slate-100 rounded-3xl p-8 md:p-12">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3 text-center">
        <?php echo $is_fr ? 'Notre méthodologie' : 'How it works'; ?>
      </p>
      <h2 class="text-3xl font-bold text-gray-900 text-center mb-10">
        <?php echo $is_fr ? 'Votre portail en ligne en 4 étapes simples' : 'Four steps to get your portal live'; ?>
      </h2>

      <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <?php
        $steps = $is_fr ? [
          ['title' => '1. Envoi du Modèle', 'desc' => 'Vous nous partagez vos checklists de collecte actuelles (PDF, tableur Excel, email type).'],
          ['title' => '2. Maquettage', 'desc' => 'Notre équipe configure et stylise vos parcours par étapes aux couleurs de votre marque.'],
          ['title' => '3. Intégration', 'desc' => 'Nous intégrons le shortcode sur votre site WordPress et paramétrons les emails et Webhooks.'],
          ['title' => '4. Livraison', 'desc' => 'Nous effectuons un test complet en direct et vous remettons le projet avec un tutoriel rapide.']
        ] : [
          ['title' => '1. Send Your Draft', 'desc' => 'Send us your current sheets, checklists, PDF list of questions, or email templates.'],
          ['title' => '2. Portal Design', 'desc' => 'Our team builds the step-by-step UI and styles it with your fonts and brand colors.'],
          ['title' => '3. Embed & Link', 'desc' => 'We deploy the shortcode on your WordPress site and set up Zapier or Notion hooks.'],
          ['title' => '4. Live Handoff', 'desc' => 'We test the submission experience live with you and hand off with a 10-minute guide.']
        ];
        foreach ($steps as $step):
        ?>
        <div class="text-left">
          <h3 class="text-base font-bold text-gray-900 mb-2"><?php echo esc_html($step['title']); ?></h3>
          <p class="text-xs text-gray-500 leading-relaxed"><?php echo esc_html($step['desc']); ?></p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pt-20">
    <h2 class="text-3xl font-bold text-gray-900 text-center mb-10">
      <?php echo $is_fr ? 'Questions fréquentes' : 'Frequently asked questions'; ?>
    </h2>

    <div class="space-y-6">
      <?php
      $faqs = $is_fr ? [
        ['q' => 'Que se passe-t-il après la première année ?', 'a' => 'Le service inclut 1 an de licence Starter d’une valeur de 252 €. Après 12 mois, vous pouvez soit renouveler la licence à 21 €/mois pour continuer à recevoir les mises à jour et la synchronisation Cloud, soit repasser à la version gratuite (IntakeFlow Free) tout en conservant vos portails existants sur votre site.'],
        ['q' => 'Pourrai-je modifier mes portails plus tard de manière autonome ?', 'a' => 'Absolument. Vos parcours sont créés sur votre interface. Vous pouvez ajouter, modifier ou supprimer des étapes et des questions à tout moment via le Visual Builder par glisser-déposer sans aucune connaissance technique.'],
        ['q' => 'Quels outils métiers puis-je connecter ?', 'a' => 'Nous pouvons connecter votre portail à plus de 5 000 outils tiers via Zapier ou Webhook standard (ex. Google Drive, Notion, HubSpot, Slack, Trello ou votre boîte mail de traitement).' ]
      ] : [
        ['q' => 'What happens after the first year?', 'a' => 'The package includes a 1-year Starter license (worth €252). After 12 months, you can choose to renew the Starter license at €21/month to continue receiving updates and Cloud synchronization, or downgrade to the free version while keeping your existing embedded portals.'],
        ['q' => 'Can I modify the portals myself later?', 'a' => 'Yes. You retain complete ownership. You can add, modify, or delete steps and fields at any time using the visual drag-and-drop builder directly inside your WordPress dashboard.'],
        ['q' => 'Which business tools can you connect to?', 'a' => 'We can connect your submissions to Google Drive, Notion, Slack, HubSpot, Trello, or standard operational emails, either natively or using Zapier integrations.' ]
      ];
      foreach ($faqs as $faq):
      ?>
      <article class="bg-white rounded-2xl border border-gray-100 p-6">
        <h3 class="font-bold text-gray-900 mb-2 text-base"><?php echo esc_html($faq['q']); ?></h3>
        <p class="text-sm text-gray-500 leading-relaxed"><?php echo esc_html($faq['a']); ?></p>
      </article>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- Final CTA -->
  <section class="bg-gray-900 py-20 px-4 sm:px-6 lg:px-8 text-center mt-20">
    <div class="max-w-3xl mx-auto">
      <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">
        <?php echo $is_fr ? 'Prêt à confier la création de votre portail ?' : 'Ready to outsource your portal configuration?'; ?>
      </h2>
      <p class="text-gray-400 mb-8 max-w-2xl mx-auto">
        <?php echo $is_fr 
          ? 'Contactez notre équipe aujourd’hui. Discutons de vos flux de collecte actuels pour cadrer votre installation sous 7 jours.' 
          : 'Get in touch with our team today. Let us review your current collection flow and start building your custom portal.'; ?>
      </p>
      <div class="flex flex-col sm:flex-row gap-3 justify-center">
        <a href="<?php echo esc_url($booking_url); ?>" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition text-center whitespace-nowrap">
          <?php echo $is_fr ? 'Planifier un appel de cadrage' : 'Schedule scoping call'; ?>
        </a>
        <a href="<?php echo esc_url($pricing_url); ?>" class="bg-white/10 border border-white/20 hover:bg-white/20 text-white font-bold py-3 px-6 rounded-lg transition text-center whitespace-nowrap">
          <?php echo $is_fr ? 'Voir les plans de licence' : 'Compare licenses'; ?>
        </a>
      </div>
    </div>
  </section>

</div>

<?php get_footer(); ?>
