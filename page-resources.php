<?php
/**
 * Template Name: Resources Page
 * Template for displaying the documentation and resources page.
 */

$is_fr = function_exists('iakpress_is_french_request') && iakpress_is_french_request();
$pricing_url = $is_fr ? home_url('/fr/pricing/') : home_url('/pricing/');
$contact_url = $is_fr ? home_url('/fr/contact/') : home_url('/contact/');
$install_url = $is_fr ? home_url('/fr/install/') : home_url('/install/');
$console_url = 'https://app.intakeflow.dev';

get_header(); ?>

<div class="font-sans text-gray-900 antialiased bg-gray-50 min-h-screen pb-20">

  <!-- Hero -->
  <section class="relative bg-gradient-to-br from-gray-900 via-slate-900 to-blue-950 text-white py-20 px-4 sm:px-6 lg:px-8 text-center overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
    <div class="max-w-4xl mx-auto relative z-10">
      <p class="text-sm font-bold tracking-widest text-blue-400 uppercase mb-4">
        <?php echo $is_fr ? 'Centre d’aide & Documentation' : 'Help Center & Documentation'; ?>
      </p>
      <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight mb-6 leading-tight">
        <?php echo $is_fr ? 'Ressources et Guides d’Intégration' : 'Resources & Integration Guides'; ?>
      </h1>
      <p class="text-xl text-slate-300 max-w-3xl mx-auto leading-relaxed">
        <?php echo $is_fr 
          ? 'Tout ce dont vous avez besoin pour configurer, intégrer et exploiter vos portails d’intake documentaire client.' 
          : 'Everything you need to configure, embed, and run your client document intake portals.'; ?>
      </p>
    </div>
  </section>

  <!-- Quick Navigation Hub -->
  <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 relative z-20">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
      <?php
      $hubs = $is_fr ? [
        ['title' => 'Démarrage Rapide', 'desc' => 'Mettre en ligne votre premier portail en 3 étapes.', 'link' => '#quickstart', 'color' => 'blue'],
        ['title' => 'Workflows Inclus', 'desc' => 'Explorer les 3 portails de collecte embarqués.', 'link' => '#workflows', 'color' => 'indigo'],
        ['title' => 'Référence API & REST', 'desc' => 'Endpoints de soumission et sécurité.', 'link' => '#developer-api', 'color' => 'slate'],
        ['title' => 'Périmètre du Support', 'desc' => 'Découvrir nos garanties et assistance.', 'link' => '#support', 'color' => 'teal']
      ] : [
        ['title' => 'Quick Start', 'desc' => 'Get your first portal live in 3 simple steps.', 'link' => '#quickstart', 'color' => 'blue'],
        ['title' => 'Bundled Workflows', 'desc' => 'Explore the 3 embedded forms.', 'link' => '#workflows', 'color' => 'indigo'],
        ['title' => 'API & REST Reference', 'desc' => 'Submission endpoints and security.', 'link' => '#developer-api', 'color' => 'slate'],
        ['title' => 'Support Boundary', 'desc' => 'Understand our guarantee & boundaries.', 'link' => '#support', 'color' => 'teal']
      ];
      foreach ($hubs as $item):
      ?>
      <a href="<?php echo esc_url($item['link']); ?>" class="bg-white hover:bg-slate-50 border border-gray-100 hover:border-gray-200 rounded-2xl p-6 shadow-sm hover:shadow transition flex flex-col justify-between">
        <div>
          <span class="inline-flex h-2 w-8 rounded bg-<?php echo $item['color']; ?>-500 mb-4"></span>
          <h3 class="text-base font-bold text-gray-900 mb-1"><?php echo esc_html($item['title']); ?></h3>
          <p class="text-xs text-gray-500 leading-relaxed"><?php echo esc_html($item['desc']); ?></p>
        </div>
        <span class="text-xs font-bold text-<?php echo $item['color']; ?>-600 hover:text-<?php echo $item['color']; ?>-700 mt-4 flex items-center gap-1">
          <?php echo $is_fr ? 'Voir la section' : 'Go to section'; ?> <?php echo xpressui_arrow_svg('w-3 h-3'); ?>
        </span>
      </a>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- 1. Quick Start -->
  <section id="quickstart" class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pt-20">
    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-8 md:p-12">
      <div class="max-w-3xl">
        <span class="text-xs font-bold tracking-widest text-blue-600 uppercase mb-2 block">01 / <?php echo $is_fr ? 'Démarrage' : 'Setup'; ?></span>
        <h2 class="text-3xl font-extrabold text-gray-900 mb-4"><?php echo $is_fr ? 'Déployer IntakeFlow en 3 étapes' : 'Deploy IntakeFlow in 3 Steps'; ?></h2>
        <p class="text-gray-500 mb-8 leading-relaxed">
          <?php echo $is_fr 
            ? 'Vous n’avez pas besoin d’une infrastructure complexe pour démarrer. Suivez ce guide pour intégrer le portail sur votre site.'
            : 'You don\'t need a complex infrastructure to get started. Follow this quick guide to embed the portal on your site.'; ?>
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 pt-4 border-t border-gray-100">
        <!-- Step 1 -->
        <div>
          <h3 class="text-lg font-bold text-gray-900 mb-2">1. <?php echo $is_fr ? 'Installer le plugin' : 'Install the Plugin'; ?></h3>
          <p class="text-sm text-gray-600 leading-relaxed mb-4">
            <?php echo $is_fr
              ? 'Téléchargez et activez le plugin gratuit <strong>IntakeFlow Bridge</strong> depuis l’administration WordPress ou WordPress.org.'
              : 'Download and activate the free <strong>IntakeFlow Bridge</strong> plugin directly from your WordPress admin or WordPress.org.'; ?>
          </p>
          <a href="https://wordpress.org/plugins/xpressui-bridge/" target="_blank" rel="noreferrer" class="text-sm font-bold text-blue-600 hover:text-blue-700 flex items-center gap-1">
            <?php echo $is_fr ? 'Télécharger sur WordPress.org' : 'Download on WordPress.org'; ?> <?php echo xpressui_arrow_svg('w-3.5 h-3.5'); ?>
          </a>
        </div>

        <!-- Step 2 -->
        <div>
          <h3 class="text-lg font-bold text-gray-900 mb-2">2. <?php echo $is_fr ? 'Générer un Jeton API' : 'Generate an API Token'; ?></h3>
          <p class="text-sm text-gray-600 leading-relaxed mb-4">
            <?php echo $is_fr
              ? 'Connectez-vous à la Console visuelle, allez dans <strong>Profil & Settings › API Tokens</strong> et créez une nouvelle clé pour votre site.'
              : 'Log in to the visual Console, go to <strong>Profile & Settings › API Tokens</strong> and generate a new access token for your site.'; ?>
          </p>
          <a href="<?php echo esc_url($console_url); ?>" target="_blank" rel="noreferrer" class="text-sm font-bold text-blue-600 hover:text-blue-700 flex items-center gap-1">
            <?php echo $is_fr ? 'Ouvrir la Console' : 'Open Console'; ?> <?php echo xpressui_arrow_svg('w-3.5 h-3.5'); ?>
          </a>
        </div>

        <!-- Step 3 -->
        <div>
          <h3 class="text-lg font-bold text-gray-900 mb-2">3. <?php echo $is_fr ? 'Activer et Intégrer' : 'Activate & Embed'; ?></h3>
          <p class="text-sm text-gray-600 leading-relaxed">
            <?php echo $is_fr
              ? 'Collez le jeton dans les réglages du plugin dans votre admin WordPress. Synchronisez vos portails en un clic et intégrez le shortcode.'
              : 'Paste the token in the plugin settings in WordPress. Synchronize your workflows in one click and paste the shortcode into any page.'; ?>
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- 2. Bundled Workflows -->
  <section id="workflows" class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pt-20">
    <div class="max-w-3xl mb-10">
      <span class="text-xs font-bold tracking-widest text-indigo-600 uppercase mb-2 block">02 / Workflows</span>
      <h2 class="text-3xl font-extrabold text-gray-900 mb-4">
        <?php echo $is_fr ? 'Les 3 Workflows Gratuits Inclus' : 'The 3 Free Bundled Workflows'; ?>
      </h2>
      <p class="text-gray-500 leading-relaxed">
        <?php echo $is_fr
          ? 'Le plugin IntakeFlow est livré par défaut avec 3 modèles de portails intégrés et utilisables immédiatement sans compte SaaS.'
          : 'The IntakeFlow plugin ships by default with 3 built-in workflow templates, fully operational with no SaaS account required.'; ?>
      </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
      <?php
      $wfs = $is_fr ? [
        [
          'title' => 'File Request',
          'slug' => 'file-request',
          'badge' => 'Starter par défaut',
          'desc' => 'Parcours d’intake documentaire classique en 4 étapes : collectez l’identité, les informations de dossier et des pièces jointes claires.',
          'steps' => ['Contact', 'Détails du dossier', 'Téléchargement de fichiers', 'Récapitulatif'],
          'fields' => 'Firstname, Lastname, Email, Phone, RequestType, CaseSummary, Budget, PrimaryDocument, SupportingFile, Notes'
        ],
        [
          'title' => 'Fabrication Carte Grise',
          'slug' => 'demande-carte-grise',
          'badge' => 'Onboarding Automobile',
          'desc' => 'Workflow guidé pour les démarches d’immatriculation de véhicules et la collecte sécurisée de justificatifs administratifs réglementaires.',
          'steps' => ['Contact', 'Détails véhicule', 'Justificatifs obligatoires', 'Signature & Validation'],
          'fields' => 'Nom, Email, Téléphone, Adresse, TypeDémarche, Immatriculation, Marque, Mandat, Pièce d’identité, Signature'
        ],
        [
          'title' => 'Association Registration',
          'slug' => 'association-registration',
          'badge' => 'Enregistrement & Statuts',
          'desc' => 'Dossier d’inscription et d’approbation pour les organismes à but non lucratif et les associations étudiantes.',
          'steps' => ['Contact', 'Structure & Objet', 'Documents d’enregistrement', 'Soumission'],
          'fields' => 'Firstname, Lastname, Email, OrganizationName, PurposeText, Category, RegistrationFile, BylawsFile, Signature'
        ]
      ] : [
        [
          'title' => 'File Request',
          'slug' => 'file-request',
          'badge' => 'Default Starter',
          'desc' => 'Classic 4-step document intake workflow: collect contact info, folder/brief request details, and structured attachments.',
          'steps' => ['Contact Info', 'Request Details', 'File Uploads', 'Review & Submit'],
          'fields' => 'Firstname, Lastname, Email, Phone, RequestType, CaseSummary, Budget, PrimaryDocument, SupportingFile, Notes'
        ],
        [
          'title' => 'Fabrication Carte Grise',
          'slug' => 'demande-carte-grise',
          'badge' => 'Automotive Onboarding',
          'desc' => 'Guided flow for vehicle registration processes and secure collection of mandatory regulatory supporting documents.',
          'steps' => ['Contact', 'Vehicle details', 'Mandatory documents', 'Signature & Submission'],
          'fields' => 'Nom, Email, Phone, Address, ProcedureType, PlateNumber, Brand, Mandate, IdentityDoc, Signature'
        ],
        [
          'title' => 'Association Registration',
          'slug' => 'association-registration',
          'badge' => 'Enrollment & Bylaws',
          'desc' => 'Enrollment, statuts, and membership approval dossier for non-profit organizations and student associations.',
          'steps' => ['Contact', 'Organization object', 'Registration documents', 'Review'],
          'fields' => 'Firstname, Lastname, Email, OrganizationName, PurposeText, Category, RegistrationFile, BylawsFile, Signature'
        ]
      ];

      foreach ($wfs as $wf):
      ?>
      <div class="bg-white border border-gray-100 rounded-3xl p-6 shadow-sm hover:shadow-md transition flex flex-col justify-between">
        <div>
          <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-50 text-blue-800 mb-4">
            <?php echo esc_html($wf['badge']); ?>
          </span>
          <h3 class="text-xl font-bold text-gray-900 mb-2"><?php echo esc_html($wf['title']); ?></h3>
          <p class="text-sm text-gray-500 leading-relaxed mb-6"><?php echo esc_html($wf['desc']); ?></p>

          <div class="mb-6">
            <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2"><?php echo $is_fr ? 'Étapes du parcours' : 'Workflow Steps'; ?></h4>
            <ol class="space-y-1.5">
              <?php foreach ($wf['steps'] as $idx => $step): ?>
                <li class="text-xs text-gray-700 flex items-center gap-2">
                  <span class="inline-flex h-4 w-4 items-center justify-center rounded-full bg-slate-100 text-[10px] font-bold text-slate-500"><?php echo $idx+1; ?></span>
                  <?php echo esc_html($step); ?>
                </li>
              <?php endforeach; ?>
            </ol>
          </div>

          <div class="mb-6">
            <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2"><?php echo $is_fr ? 'Champs capturés' : 'Captured Fields'; ?></h4>
            <p class="text-xs text-gray-600 bg-slate-50 rounded-lg p-2 leading-normal border border-slate-100">
              <?php echo esc_html($wf['fields']); ?>
            </p>
          </div>
        </div>

        <div>
          <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2"><?php echo $is_fr ? 'Shortcode à insérer' : 'Shortcode to paste'; ?></h4>
          <div class="flex items-center justify-between gap-2 bg-slate-900 text-slate-100 font-mono text-xs p-3 rounded-xl">
            <code>[xpressui id="<?php echo esc_attr($wf['slug']); ?>"]</code>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- 3. Developer API & REST -->
  <section id="developer-api" class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pt-20">
    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
      <div class="grid grid-cols-1 lg:grid-cols-12">
        <div class="p-8 md:p-12 lg:col-span-7">
          <span class="text-xs font-bold tracking-widest text-slate-500 uppercase mb-2 block">03 / <?php echo $is_fr ? 'Technique & API' : 'Tech & API'; ?></span>
          <h2 class="text-3xl font-extrabold text-gray-900 mb-6"><?php echo $is_fr ? 'Référence Développeur & REST API' : 'Developer & REST API Reference'; ?></h2>

          <div class="space-y-6">
            <div>
              <h3 class="text-base font-bold text-gray-900 mb-1.5"><?php echo $is_fr ? 'Fonctionnement de la soumission' : 'How submission works'; ?></h3>
              <p class="text-sm text-gray-600 leading-relaxed">
                <?php echo $is_fr 
                  ? 'Le runtime frontend XPressUI envoie les données de collecte directement à l’endpoint REST interne de votre site WordPress.' 
                  : 'The XPressUI frontend runtime submits intake payloads directly to your WordPress site\'s internal REST endpoint.'; ?>
              </p>
            </div>

            <div>
              <h3 class="text-base font-bold text-gray-900 mb-1.5"><?php echo $is_fr ? 'Endpoint REST de destination' : 'Target REST Endpoint'; ?></h3>
              <div class="bg-slate-50 border border-slate-100 rounded-lg p-3 font-mono text-xs text-slate-700">
                POST /wp-json/xpressui/v1/submit
              </div>
            </div>

            <div>
              <h3 class="text-base font-bold text-gray-900 mb-1.5"><?php echo $is_fr ? 'Stockage des fichiers' : 'File Storage Strategy'; ?></h3>
              <p class="text-sm text-gray-600 leading-relaxed">
                <?php echo $is_fr 
                  ? 'Tous les fichiers envoyés par l’utilisateur final sont automatiquement téléversés dans le répertoire des médias de WordPress (wp-content/uploads/xpressui/) et sécurisés.' 
                  : 'All files submitted by the end-user are automatically uploaded to your WordPress Media Library directory (wp-content/uploads/xpressui/) and secured.'; ?>
              </p>
            </div>
          </div>
        </div>

        <!-- Code sample sidebar -->
        <div class="bg-slate-900 text-slate-300 p-8 md:p-12 lg:col-span-5 flex flex-col justify-between font-mono text-xs border-l border-slate-800">
          <div>
            <p class="text-xs font-bold text-slate-500 uppercase mb-4 tracking-wider">// <?php echo $is_fr ? 'Exemple de réponse attendue' : 'Expected API Response'; ?></p>
            <pre class="overflow-x-auto text-slate-200">
{
  "success": true,
  "message": "Submission received",
  "entryId": 123,
  "submissionId": "01JNY0F0P6T7Q3F2...",
  "files": [
    {
      "field": "primaryDocument",
      "attachmentId": 456,
      "url": ".../uploads/identity-document.pdf"
    }
  ]
}</pre>
          </div>

          <div class="mt-8 pt-6 border-t border-slate-800 text-[11px] text-slate-400">
            <p><?php echo $is_fr ? 'Le plugin free filtre et nettoie les requêtes avant de stocker les soumissions sous le type de contenu personnalisé "xpressui_submission".' : 'The free plugin sanitizes requests before storing submissions under the custom post type "xpressui_submission".'; ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 4. Support & Scope -->
  <section id="support" class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pt-20">
    <div class="bg-teal-950 text-white rounded-3xl p-8 md:p-12 relative overflow-hidden">
      <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#ffffff_1px,transparent_1px)] [background-size:24px_24px]"></div>
      <div class="max-w-3xl relative z-10">
        <span class="text-xs font-bold tracking-widest text-teal-300 uppercase mb-2 block">04 / Support</span>
        <h2 class="text-3xl font-extrabold mb-4"><?php echo $is_fr ? 'Périmètre d’Assistance et Garantie' : 'Support Boundary & Assurances'; ?></h2>
        <p class="text-slate-300 mb-8 leading-relaxed">
          <?php echo $is_fr
            ? 'Nous accompagnons les professionnels pour que l’intégration de leurs flux documentaires soit un succès opérationnel durable.'
            : 'We accompany professionals to ensure the integration of their document flows is a long-term operational success.'; ?>
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
          <div>
            <h3 class="text-base font-bold text-teal-300 mb-2">✅ <?php echo $is_fr ? 'Ce qui est inclus' : 'What is included'; ?></h3>
            <ul class="space-y-2 text-sm text-slate-200">
              <li>• <?php echo $is_fr ? 'Aide à l’installation du plugin WP Bridge' : 'WP Bridge plugin installation guidance'; ?></li>
              <li>• <?php echo $is_fr ? 'Validation du comportement de l’admin WP' : 'Validation of WordPress admin features'; ?></li>
              <li>• <?php echo $is_fr ? 'Support sur les erreurs de soumission d’API' : 'Debugging API submission errors'; ?></li>
              <li>• <?php echo $is_fr ? 'Mises à jour automatiques de sécurité' : 'Automatic security updates'; ?></li>
            </ul>
          </div>
          <div>
            <h3 class="text-base font-bold text-slate-300 mb-2">❌ <?php echo $is_fr ? 'Hors périmètre' : 'Outside scope'; ?></h3>
            <ul class="space-y-2 text-sm text-slate-300">
              <li>• <?php echo $is_fr ? 'Développement ou personnalisation de thème tiers' : 'Custom third-party theme development'; ?></li>
              <li>• <?php echo $is_fr ? 'Résolution de conflits avec d’autres plugins' : 'Resolving conflicts with custom plugins'; ?></li>
              <li>• <?php echo $is_fr ? 'Configuration de serveurs ou d’hébergement client' : 'Custom host or server administration'; ?></li>
            </ul>
          </div>
        </div>

        <div class="pt-6 border-t border-teal-900/60 flex flex-col sm:flex-row items-center justify-between gap-4">
          <span class="text-sm text-slate-300">
            <?php echo $is_fr ? 'Besoin d’aide pour démarrer un pilote ?' : 'Need help getting a pilot project live?'; ?>
          </span>
          <a href="<?php echo esc_url($contact_url); ?>" class="bg-white hover:bg-slate-100 text-slate-900 font-bold px-6 py-3 rounded-lg transition text-sm whitespace-nowrap">
            <?php echo $is_fr ? 'Discuter avec l’équipe' : 'Discuss with our team'; ?>
          </a>
        </div>
      </div>
    </div>
  </section>

</div>

<?php get_footer(); ?>
