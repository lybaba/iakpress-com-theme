<?php
/**
 * Template for the /install/ page — step-by-step install guide.
 * WordPress automatically loads this for a page with slug "install".
 */

$github_release = 'https://github.com/lybaba/xpressui-packages/releases/latest';
$console_url    = 'https://xpressui.iakpress.com/console/';
$contact_url    = home_url('/contact/');
$agency_url     = home_url('/agency-pilot/');
$is_french_install = function_exists('iakpress_is_french_request') && iakpress_is_french_request();
$install_copy = $is_french_install ? [
  'eyebrow' => 'Guide d’installation',
  'title' => 'Une page d’intake XPressUI en ligne en moins de 10 minutes.',
  'body' => 'Deux chemins : tester les workflows intégrés sans compte, ou créer un parcours personnalisé dans la console visuelle et le déployer par upload ZIP.',
  'free_badge' => 'Free',
  'free_title' => 'Tester les workflows intégrés',
  'pro_badge' => 'Pro',
  'pro_title' => 'Déployer un workflow personnalisé',
  'assisted_eyebrow' => 'Lancement accompagné',
  'assisted_title' => 'Vous voulez un workflow en ligne avant d’apprendre toutes les étapes d’installation ?',
  'assisted_body' => 'Envoyez le workflow, les fichiers ou le formulaire actuel, et l’endroit où le résultat doit être livré. Nous cadrons le chemin le plus rapide : lien hébergé d’abord, ou livraison sur site client quand le workflow doit vivre sur un site existant.',
  'assisted_primary' => 'Cadrer le premier workflow',
  'assisted_secondary' => 'Voir le pilote accompagné',
  'message_eyebrow' => 'Meilleur premier message',
  'message_1' => '<strong class="text-gray-900">1 workflow :</strong> ce qui arrive aujourd’hui et qui le traite.',
  'message_2' => '<strong class="text-gray-900">1 destination :</strong> lien hébergé ou page sur site client.',
  'message_3' => '<strong class="text-gray-900">1 exemple :</strong> formulaire, tableur, capture ou document.',
  'custom_title' => 'Prêt à créer un workflow personnalisé ?',
  'custom_body' => 'Les ventes directes Pro sont en pause pendant la validation de XPressUI Free par WordPress.org.',
  'custom_cta' => 'Discuter du plan Cloud',
  'pilot_title' => 'Besoin de mettre le premier workflow en ligne avec nous ?',
  'pilot_body' => 'Utilisez Agency Pilot quand la priorité est un workflow client opérationnel, pas l’apprentissage complet de l’outil.',
  'pilot_cta' => 'Voir Agency Pilot',
] : [
  'eyebrow' => 'Install guide',
  'title' => 'Live intake page with XPressUI in under 10 minutes.',
  'body' => 'Two paths: test the built-in workflows immediately with no account, or build a custom flow in the visual console and deploy it via ZIP upload.',
  'free_badge' => 'Free',
  'free_title' => 'Test the built-in workflows',
  'pro_badge' => 'Pro',
  'pro_title' => 'Deploy a custom workflow',
  'assisted_eyebrow' => 'Assisted launch',
  'assisted_title' => 'Want one workflow live before learning every install step?',
  'assisted_body' => 'Send the workflow, the current files or form, and where the result should be delivered. We scope the fastest path: hosted link first, or client-site delivery when the workflow must live on an existing site.',
  'assisted_primary' => 'Scope the first workflow',
  'assisted_secondary' => 'See assisted pilot',
  'message_eyebrow' => 'Best first message',
  'message_1' => '<strong class="text-gray-900">1 workflow:</strong> what arrives today and who reviews it.',
  'message_2' => '<strong class="text-gray-900">1 destination:</strong> hosted link or client-site page.',
  'message_3' => '<strong class="text-gray-900">1 sample:</strong> form, spreadsheet, screenshot, or document.',
  'custom_title' => 'Ready to build a custom workflow?',
  'custom_body' => 'Direct Pro sales are paused while XPressUI Free is being validated by WordPress.org.',
  'custom_cta' => 'Discuss Cloud plan',
  'pilot_title' => 'Need the first workflow live with you?',
  'pilot_body' => 'Use Agency Pilot when the priority is a working client workflow, not learning the whole tool first.',
  'pilot_cta' => 'See Agency Pilot',
];

$free_steps = $is_french_install ? [
  [
    'number' => '01',
    'title'  => 'Télécharger et installer le plugin',
    'body'   => 'Téléchargez la dernière version depuis GitHub. Installez et activez le plugin depuis l’administration du site.',
    'cta'    => ['label' => 'Télécharger la dernière version sur GitHub', 'href' => $github_release, 'external' => true],
    'note'   => 'Nécessite un runtime compatible côté site client avec PHP 7.4+.',
  ],
  [
    'number' => '02',
    'title'  => 'Créer une page et coller l’embed',
    'body'   => 'Créez une nouvelle page côté site client, puis collez l’un des deux embeds intégrés ci-dessous. Aucun compte ni clé de licence nécessaire : ces workflows sont inclus dans le plugin.',
    'code'   => '[xpressui id="document-intake"]',
    'note'   => 'Ou utilisez [xpressui id="validation-playground"] pour explorer toute la bibliothèque de types de champs.',
  ],
  [
    'number' => '03',
    'title'  => 'Publier la page : c’est en ligne',
    'body'   => 'Le parcours s’affiche directement dans votre page, isolé du thème. Les soumissions arrivent dans XPressUI → Submissions avec suivi de statut (New / In Review / Done).',
  ],
] : [
  [
    'number' => '01',
    'title'  => 'Download and install the plugin',
    'body'   => 'Download the latest release from GitHub. Install and activate it from your site admin.',
    'cta'    => ['label' => 'Download latest release on GitHub', 'href' => $github_release, 'external' => true],
    'note'   => 'Requires a compatible client-site runtime with PHP 7.4+.',
  ],
  [
    'number' => '02',
    'title'  => 'Create a page and paste the embed',
    'body'   => 'Create a new client-site page, then paste one of the two built-in embeds below. No account or license key needed — these workflows are embedded in the plugin.',
    'code'   => '[xpressui id="document-intake"]',
    'note'   => 'Or use [xpressui id="validation-playground"] to explore the full field type library.',
  ],
  [
    'number' => '03',
    'title'  => 'Publish the page — you\'re live',
    'body'   => 'The form renders inline on your page, isolated from your theme. Submissions land in XPressUI → Submissions with status tracking (New / In Review / Done).',
  ],
];

$pro_steps = $is_french_install ? [
  [
    'number' => '01',
    'title'  => 'Créer le workflow dans la console visuelle',
    'body'   => 'Ouvrez la console, créez un projet, puis concevez votre parcours d’intake : étapes, champs, uploads de fichiers et logique conditionnelle. Une fois terminé, exportez-le en ZIP.',
    'cta'    => ['label' => 'Ouvrir la console', 'href' => $console_url, 'external' => true],
  ],
  [
    'number' => '02',
    'title'  => 'Uploader le ZIP du workflow',
    'body'   => 'Dans l’administration du site client, allez dans XPressUI → Workflows puis uploadez le ZIP exporté. Le plugin extrait la configuration du parcours et enregistre automatiquement le slug du workflow.',
    'note'   => 'Une clé de licence Pro est nécessaire pour uploader des workflows personnalisés.',
  ],
  [
    'number' => '03',
    'title'  => 'Intégrer le workflow',
    'body'   => 'Collez l’embed sur n’importe quelle page du site client en utilisant le slug du workflow.',
    'code'   => '[xpressui id="votre-slug-workflow"]',
    'note'   => 'Optionnel : ajoutez redirect="https://votresite.com/merci/" pour envoyer les utilisateurs vers une page de succès personnalisée après soumission.',
  ],
] : [
  [
    'number' => '01',
    'title'  => 'Build your workflow in the visual console',
    'body'   => 'Open the console, create a project, and design your intake flow — steps, fields, file uploads, conditional logic. When you\'re done, export it as a ZIP.',
    'cta'    => ['label' => 'Open the console', 'href' => $console_url, 'external' => true],
  ],
  [
    'number' => '02',
    'title'  => 'Upload the workflow ZIP',
    'body'   => 'In the client-site admin, go to XPressUI → Workflows and upload the ZIP you exported. The plugin extracts the form config and registers the workflow slug automatically.',
    'note'   => 'A Pro license key is required to upload custom workflows.',
  ],
  [
    'number' => '03',
    'title'  => 'Embed the workflow',
    'body'   => 'Paste the embed on any client-site page using the slug from your workflow.',
    'code'   => '[xpressui id="your-workflow-slug"]',
    'note'   => 'Optional: add redirect="https://yoursite.com/thank-you/" to send users to a custom success page after submission.',
  ],
];

get_header();
?>

<div class="font-sans text-gray-900 antialiased">

  <!-- Hero -->
  <section class="bg-white py-16 px-4 sm:px-6 lg:px-8 border-b border-gray-100">
    <div class="max-w-3xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3"><?php echo esc_html($install_copy['eyebrow']); ?></p>
      <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 mb-4"><?php echo esc_html($install_copy['title']); ?></h1>
      <p class="text-gray-500 leading-relaxed"><?php echo esc_html($install_copy['body']); ?></p>
    </div>
  </section>

  <!-- Steps -->
  <section class="bg-gray-50 py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto space-y-10">

      <!-- Free path -->
      <div>
        <div class="flex items-center gap-3 mb-6">
          <span class="px-3 py-1 rounded-full bg-green-50 border border-green-200 text-xs font-bold text-green-700 uppercase tracking-wider"><?php echo esc_html($install_copy['free_badge']); ?></span>
          <h2 class="text-lg font-bold text-gray-900"><?php echo esc_html($install_copy['free_title']); ?></h2>
        </div>

        <div class="space-y-4">
          <?php foreach ($free_steps as $step): ?>
          <article class="flex gap-6 p-7 rounded-2xl border border-gray-100 bg-white shadow-sm">
            <div class="w-12 h-12 flex-shrink-0 rounded-xl bg-green-50 border border-green-200 flex items-center justify-center text-xs font-bold text-green-700">
              <?php echo esc_html($step['number']); ?>
            </div>
            <div class="space-y-3 min-w-0">
              <h3 class="text-base font-bold text-gray-900"><?php echo esc_html($step['title']); ?></h3>
              <p class="text-sm text-gray-600 leading-relaxed"><?php echo esc_html($step['body']); ?></p>
              <?php if (!empty($step['code'])): ?>
              <pre class="p-3 rounded-lg bg-gray-50 border border-gray-200 text-sm font-mono text-gray-800 overflow-x-auto"><?php echo esc_html($step['code']); ?></pre>
              <?php endif; ?>
              <?php if (!empty($step['note'])): ?>
              <p class="text-xs text-gray-400 border-l-2 border-gray-200 pl-3 leading-relaxed"><?php echo esc_html($step['note']); ?></p>
              <?php endif; ?>
              <?php if (!empty($step['cta'])): ?>
              <a href="<?php echo esc_url($step['cta']['href']); ?>"<?php echo !empty($step['cta']['external']) ? ' target="_blank" rel="noreferrer"' : ''; ?>
                 class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold py-2.5 px-5 rounded-lg transition">
                <?php echo esc_html($step['cta']['label']); ?>
              </a>
              <?php endif; ?>
            </div>
          </article>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Pro path -->
      <div>
        <div class="flex items-center gap-3 mb-6">
          <span class="px-3 py-1 rounded-full bg-blue-50 border border-blue-200 text-xs font-bold text-blue-600 uppercase tracking-wider"><?php echo esc_html($install_copy['pro_badge']); ?></span>
          <h2 class="text-lg font-bold text-gray-900"><?php echo esc_html($install_copy['pro_title']); ?></h2>
        </div>

        <div class="space-y-4">
          <?php foreach ($pro_steps as $step): ?>
          <article class="flex gap-6 p-7 rounded-2xl border border-gray-100 bg-white shadow-sm">
            <div class="w-12 h-12 flex-shrink-0 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center text-xs font-bold text-blue-600">
              <?php echo esc_html($step['number']); ?>
            </div>
            <div class="space-y-3 min-w-0">
              <h3 class="text-base font-bold text-gray-900"><?php echo esc_html($step['title']); ?></h3>
              <p class="text-sm text-gray-600 leading-relaxed"><?php echo esc_html($step['body']); ?></p>
              <?php if (!empty($step['code'])): ?>
              <pre class="p-3 rounded-lg bg-gray-50 border border-gray-200 text-sm font-mono text-gray-800 overflow-x-auto"><?php echo esc_html($step['code']); ?></pre>
              <?php endif; ?>
              <?php if (!empty($step['note'])): ?>
              <p class="text-xs text-gray-400 border-l-2 border-gray-200 pl-3 leading-relaxed"><?php echo esc_html($step['note']); ?></p>
              <?php endif; ?>
              <?php if (!empty($step['cta'])): ?>
              <a href="<?php echo esc_url($step['cta']['href']); ?>"<?php echo !empty($step['cta']['external']) ? ' target="_blank" rel="noreferrer"' : ''; ?>
                 class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold py-2.5 px-5 rounded-lg transition">
                <?php echo esc_html($step['cta']['label']); ?>
              </a>
              <?php endif; ?>
            </div>
          </article>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="rounded-3xl border border-blue-100 bg-gradient-to-br from-blue-50 via-white to-slate-50 p-8 shadow-sm">
        <div class="grid grid-cols-1 lg:grid-cols-[1.2fr_0.8fr] gap-8 items-center">
          <div>
            <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3"><?php echo esc_html($install_copy['assisted_eyebrow']); ?></p>
            <h2 class="text-2xl font-extrabold tracking-tight text-gray-900 mb-3"><?php echo esc_html($install_copy['assisted_title']); ?></h2>
            <p class="text-gray-600 leading-relaxed mb-5">
              <?php echo esc_html($install_copy['assisted_body']); ?>
            </p>
            <div class="flex flex-col sm:flex-row gap-3">
              <a href="<?php echo esc_url($contact_url); ?>"
                 class="inline-flex justify-center rounded-xl bg-blue-600 px-5 py-3 text-sm font-bold text-white hover:bg-blue-700 transition shadow-lg shadow-blue-500/20">
                <?php echo esc_html($install_copy['assisted_primary']); ?>
              </a>
              <a href="<?php echo esc_url($agency_url); ?>"
                 class="inline-flex justify-center rounded-xl bg-white px-5 py-3 text-sm font-bold text-gray-900 border border-blue-100 hover:border-blue-200 transition">
                <?php echo esc_html($install_copy['assisted_secondary']); ?>
              </a>
            </div>
          </div>
          <div class="rounded-2xl border border-blue-100 bg-white p-5 shadow-sm">
            <p class="text-xs font-bold tracking-widest text-gray-500 uppercase mb-3"><?php echo esc_html($install_copy['message_eyebrow']); ?></p>
            <ul class="space-y-3 text-sm text-gray-600">
              <li><?php echo wp_kses_post($install_copy['message_1']); ?></li>
              <li><?php echo wp_kses_post($install_copy['message_2']); ?></li>
              <li><?php echo wp_kses_post($install_copy['message_3']); ?></li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Delivery discussion CTA -->
      <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 p-6 rounded-2xl border border-gray-100 bg-white shadow-sm">
        <div>
          <strong class="block text-gray-900 mb-1"><?php echo esc_html($install_copy['custom_title']); ?></strong>
          <p class="text-sm text-gray-500 leading-relaxed"><?php echo esc_html($install_copy['custom_body']); ?></p>
        </div>
        <a href="<?php echo esc_url($contact_url); ?>"
           class="flex-shrink-0 inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold py-2.5 px-5 rounded-lg transition whitespace-nowrap">
          <?php echo esc_html($install_copy['custom_cta']); ?>
        </a>
      </div>

      <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 p-6 rounded-2xl border border-blue-100 bg-blue-50">
        <div>
          <strong class="block text-gray-900 mb-1"><?php echo esc_html($install_copy['pilot_title']); ?></strong>
          <p class="text-sm text-gray-600 leading-relaxed"><?php echo esc_html($install_copy['pilot_body']); ?></p>
        </div>
        <a href="<?php echo esc_url(home_url('/agency-pilot/')); ?>"
           class="flex-shrink-0 inline-flex items-center bg-white border border-blue-100 hover:border-blue-200 text-blue-700 text-sm font-bold py-2.5 px-5 rounded-lg transition whitespace-nowrap">
          <?php echo esc_html($install_copy['pilot_cta']); ?>
        </a>
      </div>

    </div>
  </section>

</div>

<?php get_footer(); ?>
