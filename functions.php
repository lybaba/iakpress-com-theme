<?php
/**
 * IAKPress.com Theme - Functions and definitions
 *
 * Note : GeneratePress se charge automatiquement de charger (enqueue)
 * le fichier `style.css` de ce thème enfant généré par Tailwind.
 */

// Ajoutez vos fonctions WordPress personnalisées (shortcodes, filtres, etc.) ci-dessous :

function xpressui_asset_url( string $path ): string {
    return get_stylesheet_directory_uri() . '/assets/xpressui/' . ltrim( $path, '/' );
}

/**
 * IntakeFlow Console app entry point.
 */
function xpressui_app_url( string $path = '' ): string {
    $base = defined( 'XPRESSUI_APP_URL' ) ? rtrim( XPRESSUI_APP_URL, '/' ) . '/' : 'https://app.intakeflow.dev/';
    return $base . ltrim( $path, '/' );
}

/**
 * Starter (self-hosted) "buy now" link. Defaults to the in-app plan/checkout
 * page (which starts a Stripe Checkout session via lookup key). Override with a
 * Stripe Payment Link via the XPRESSUI_STARTER_BUY_URL constant in wp-config.php
 * or the `xpressui_starter_buy_url` filter.
 */
function xpressui_starter_buy_url(): string {
    $url = defined( 'XPRESSUI_STARTER_BUY_URL' ) ? XPRESSUI_STARTER_BUY_URL : xpressui_app_url( 'profile?tab=plan&checkout_plan=starter' );
    return (string) apply_filters( 'xpressui_starter_buy_url', $url );
}

// The theme is fully built with Tailwind CSS — GeneratePress parent styles are not needed
// and conflict with Tailwind's reset/base layer.
function iakpress_dequeue_generatepress_styles(): void {
    wp_dequeue_style( 'generate-style' );
}
add_action( 'wp_enqueue_scripts', 'iakpress_dequeue_generatepress_styles', 20 );

function iakpress_enqueue_theme_styles(): void {
    wp_enqueue_style(
        'iakpress-com-style',
        get_stylesheet_uri(),
        [],
        filemtime( get_stylesheet_directory() . '/style.css' )
    );
    wp_enqueue_style(
        'iakpress-layout-fixes',
        get_stylesheet_directory_uri() . '/assets/layout-fixes.css',
        [],
        filemtime( get_stylesheet_directory() . '/assets/layout-fixes.css' )
    );
}
add_action( 'wp_enqueue_scripts', 'iakpress_enqueue_theme_styles', 30 );

function iakpress_current_path(): string {
    return trim( (string) parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
}

function iakpress_is_french_request(): bool {
    $path = iakpress_current_path();
    if ( $path === 'fr' || strpos( $path, 'fr/' ) === 0 ) {
        return true;
    }

    return ( $_COOKIE['iakpress_lang'] ?? '' ) === 'fr';
}

function iakpress_language_path_map(): array {
    return array(
        '' => 'fr',
        'xpressui' => 'fr/xpressui',
        'xpressui-cloud' => 'fr/xpressui-cloud',
        'pricing' => 'fr/pricing',
        'install' => 'fr/install',
        'contact' => 'fr/contact',
        'agency-pilot'    => 'fr/agency-pilot',
        'for-accountants' => 'fr/for-accountants',
        'for-agencies'    => 'fr/for-agencies',
        'for-operations'  => 'fr/for-operations',
        'document-intake' => 'fr/document-intake',
        'pro'             => 'fr/pro',
        'purchase-confirmed' => 'fr/purchase-confirmed',
        'resources'          => 'fr/resources',
        'done-for-you'       => 'fr/done-for-you',
    );
}

function iakpress_english_path_from_current( ?string $path = null ): string {
    $path = $path === null ? iakpress_current_path() : trim( $path, '/' );
    if ( $path === 'fr' ) {
        return '';
    }
    if ( strpos( $path, 'fr/' ) === 0 ) {
        return substr( $path, 3 );
    }

    return $path;
}

function iakpress_localized_path( string $language, ?string $path = null ): string {
    $english_path = iakpress_english_path_from_current( $path );
    $map = iakpress_language_path_map();

    if ( $language === 'fr' ) {
        return '/' . ( $map[$english_path] ?? 'fr/' . $english_path ) . '/';
    }

    return $english_path === '' ? '/' : '/' . $english_path . '/';
}

function iakpress_language_switch_url( string $language ): string {
    $path = iakpress_localized_path( $language );
    return add_query_arg( 'iakpress_lang', $language, home_url( $path ) );
}

function iakpress_handle_language_preference(): void {
    $requested_language = isset( $_GET['iakpress_lang'] ) ? strtolower( (string) $_GET['iakpress_lang'] ) : '';
    if ( ! in_array( $requested_language, array( 'en', 'fr' ), true ) ) {
        return;
    }

    $cookie_path = '/';
    $cookie_domain = defined( 'COOKIE_DOMAIN' ) && COOKIE_DOMAIN ? COOKIE_DOMAIN : '';
    $secure = is_ssl() || ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' );
    setcookie( 'iakpress_lang', $requested_language, time() + YEAR_IN_SECONDS, $cookie_path, $cookie_domain, $secure, false );
    setcookie( 'lang_pref', $requested_language, time() + YEAR_IN_SECONDS, $cookie_path, $cookie_domain, $secure, false );
    $_COOKIE['iakpress_lang'] = $requested_language;

    $redirect_url = remove_query_arg( 'iakpress_lang' );
    wp_safe_redirect( $redirect_url );
    exit;
}
add_action( 'template_redirect', 'iakpress_handle_language_preference', -20 );

function iakpress_redirect_to_persistent_language(): void {
    if ( is_admin() || wp_doing_ajax() ) {
        return;
    }

    $language = $_COOKIE['iakpress_lang'] ?? '';
    if ( ! in_array( $language, array( 'en', 'fr' ), true ) ) {
        return;
    }

    $path = iakpress_current_path();
    $english_path = iakpress_english_path_from_current( $path );
    $map = iakpress_language_path_map();
    if ( ! array_key_exists( $english_path, $map ) ) {
        return;
    }

    $target_path = iakpress_localized_path( $language, $path );
    $current_path = '/' . trim( $path, '/' ) . '/';
    if ( $path === '' ) {
        $current_path = '/';
    }

    if ( $target_path !== $current_path ) {
        $cookie_path = '/';
        $cookie_domain = defined( 'COOKIE_DOMAIN' ) && COOKIE_DOMAIN ? COOKIE_DOMAIN : '';
        $secure = is_ssl() || ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' );
        setcookie( 'iakpress_lang', $language, time() + YEAR_IN_SECONDS, $cookie_path, $cookie_domain, $secure, false );
        setcookie( 'lang_pref', $language, time() + YEAR_IN_SECONDS, $cookie_path, $cookie_domain, $secure, false );

        wp_safe_redirect( home_url( $target_path ) );
        exit;
    }
}
add_action( 'template_redirect', 'iakpress_redirect_to_persistent_language', -10 );

function iakpress_translate_french_output( string $html ): string {
    $translations = array(
        'Open Console' => 'Ouvrir la console',
        'Switch to English' => 'Passer en anglais',
        'Try live intake' => "Tester l'intake",
        'Try intake' => 'Tester',
        'Pricing' => 'Tarifs',
        'Product' => 'Produit',
        'Discuss Cloud plan' => 'Discuter du plan Cloud',
        'Compare with IntakeFlow Starter' => 'Comparer avec IntakeFlow Starter',
        'Need the first workflow live? See Agency Pilot' => 'Besoin de mettre le premier workflow en ligne ? Voir Agency Pilot',
        'Download IntakeFlow Free' => 'Télécharger IntakeFlow Free',
        'Download latest release on WordPress.org' => 'Télécharger la dernière version sur WordPress.org',
        'See Agency Pilot' => 'Voir Agency Pilot',
        'See assisted pilot' => 'Voir le pilote accompagné',
        'Scope my first workflow' => 'Cadrer mon premier workflow',
        'Scope hosted pilot' => 'Cadrer un pilote hébergé',
        'Scope the first workflow' => 'Cadrer le premier workflow',
        'Scope a pilot' => 'Cadrer un pilote',

        'IntakeFlow Cloud · PRO & ENTERPRISE' => 'IntakeFlow Cloud · PRO & ENTERPRISE',
        'Host the workflow link, catalogs, inbox, files, and review operations with IntakeFlow.' => 'Hébergez le lien du workflow, les catalogues, l’inbox, les fichiers et la revue avec IntakeFlow.',
        'IntakeFlow Cloud is for teams that want structured intake, reusable catalogs, and operator review without running the operations layer on client sites.' => 'IntakeFlow Cloud s’adresse aux équipes qui veulent un intake structuré, des catalogues réutilisables et une revue opérateur sans gérer la couche opérationnelle sur les sites clients.',
        'IntakeFlow hosts the public link and centralizes submissions, products, services, dates, files, quotas, and review in Console.' => 'IntakeFlow héberge le lien public et centralise les soumissions, produits, services, dates, fichiers, quotas et revues dans la Console.',
        'Pick the smallest live test' => 'Choisir le plus petit test réel',
        'Start with one hosted workflow, then upgrade only when usage proves it.' => 'Commencez avec un workflow hébergé, puis passez au niveau supérieur seulement quand l’usage le justifie.',
        'Prove one hosted workflow.' => 'Valider un workflow hébergé.',
        'Most likely next' => 'Étape suivante probable',
        'Run shared operations.' => 'Piloter les opérations en équipe.',
        'Repeat delivery for clients.' => 'Répéter la livraison pour les clients.',
        'one real form, real users, real submissions.' => 'un vrai parcours, de vrais utilisateurs, de vraies soumissions.',
        'shared inbox, operators, files, and reusable catalogs.' => 'inbox partagée, opérateurs, fichiers et catalogues réutilisables.',
        'reusable delivery pattern for multiple client workflows.' => 'modèle de livraison réutilisable pour plusieurs workflows clients.',
        'Plans' => 'Plans',
        'Start with the smallest plan that proves the workflow.' => 'Commencez avec le plus petit plan qui valide le workflow.',
        'The Cloud path is intentionally simple: Solo for one workflow, Team for shared operations, Agency for repeatable client delivery.' => 'Le chemin Cloud reste volontairement simple : Solo pour un workflow, Team pour les opérations partagées, Agency pour une livraison client répétable.',
        'Recommended' => 'Recommandé',
        'Before choosing a plan' => 'Avant de choisir un plan',
        'Start Cloud with one hosted workflow that proves demand.' => 'Commencez Cloud avec un workflow hébergé qui valide la demande.',
        'If the workflow is still messy, do not start by debating limits.' => 'Si le workflow est encore flou, ne commencez pas par débattre des limites.',
        'Start with the smallest live test: one hosted link, one inbox, one reusable catalog or file intake, and one operator review path.' => 'Commencez par le plus petit test réel : un lien hébergé, une inbox, un catalogue ou intake fichier réutilisable, et un chemin de revue opérateur.',
        'Fastest paid path' => 'Chemin payant le plus rapide',
        'Hosted setup:' => 'Configuration hébergée :',
        'Then decide:' => 'Puis décidez :',
        'Good fit:' => 'Bon cas d’usage :',
        'What IntakeFlow Cloud includes' => 'Ce que IntakeFlow Cloud inclut',
        'A managed operations layer for client workflows.' => 'Une couche opérationnelle managée pour les workflows clients.',
        'Hosted workflow links' => 'Liens de workflow hébergés',
        'Dynamic catalogs' => 'Catalogues dynamiques',
        'Console review inbox' => 'Inbox de revue dans la Console',
        'Storage and quotas' => 'Stockage et quotas',
        'Team-ready path' => 'Chemin prêt pour l’équipe',
        'Choosing the right pack' => 'Choisir le bon pack',
        'IntakeFlow Starter remains the fast path. IntakeFlow Cloud is the managed path.' => 'IntakeFlow Starter reste le chemin rapide. IntakeFlow Cloud est le chemin managé.',
        'Decision' => 'Décision',
        'Best fit' => 'Meilleur usage',
        'Public entry' => 'Entrée publique',
        'Operations inbox' => 'Inbox opérationnelle',
        'Files and quotas' => 'Fichiers et quotas',
        'Cloud starts at €39/month' => 'Cloud à partir de €39/mois',
        'Use IntakeFlow Cloud when the workflow needs shared operations, not another site admin.' => 'Utilisez IntakeFlow Cloud quand le workflow a besoin d’opérations partagées, pas d’un autre admin de site.',
        'Starter (Self-Hosted)' => 'Starter (Auto-hébergé)',
        'Starter (Self-Hosted / WP)' => 'Starter (Auto-hébergé / WP)',
        'Choose Starter (Self-Hosted)' => 'Choisir Starter (Auto-hébergé)',
        'Choose Starter (Self-Hosted / WP)' => 'Choisir Starter (Auto-hébergé / WP)',
        'Choose Cloud PRO' => 'Choisir Cloud PRO',
        'Choose Cloud ENTERPRISE' => 'Choisir Cloud ENTERPRISE',
        'or buy now — €39/month' => 'ou acheter maintenant — €39/mois',

        'Install guide' => 'Guide d’installation',
        'Live intake page with IntakeFlow in under 10 minutes.' => 'Une page d’intake IntakeFlow en ligne en moins de 10 minutes.',
        'Two paths: test the built-in workflows immediately with no account, or build a custom flow in the visual console and deploy it via ZIP upload.' => 'Deux chemins : tester les workflows intégrés sans compte, ou créer un parcours personnalisé dans la console visuelle et le déployer par upload ZIP.',
        'Test the built-in workflows' => 'Tester les workflows intégrés',
        'Deploy a custom workflow' => 'Déployer un workflow personnalisé',
        'Download and install the plugin' => 'Télécharger et installer le plugin',
        'Create a page and paste the embed' => 'Créer une page et coller l’embed',
        'Publish the page — you\'re live' => 'Publier la page : c’est en ligne',
        'Build your workflow in the visual console' => 'Créer le workflow dans la console visuelle',
        'Upload the workflow ZIP' => 'Uploader le ZIP du workflow',
        'Embed the workflow' => 'Intégrer le workflow',
        'Assisted launch' => 'Lancement accompagné',
        'Want one workflow live before learning every install step?' => 'Vous voulez un workflow en ligne avant d’apprendre toutes les étapes d’installation ?',
        'Best first message' => 'Meilleur premier message',
        'Ready to build a custom workflow?' => 'Prêt à créer un workflow personnalisé ?',
        'Need the first workflow live with you?' => 'Besoin de mettre le premier workflow en ligne avec vous ?',

        'Choose where your client intake portal should live.' => 'Choisissez où votre portail d’intake client doit vivre.',
        'Start on a client WordPress site, move to IntakeFlow Cloud when you want hosted links, files, catalogs, quotas, and team review, or ask us to ship the first workflow with you.' => 'Commencez sur un site WordPress client, passez à IntakeFlow Cloud quand vous voulez des liens hébergés, fichiers, catalogues, quotas et revue en équipe, ou demandez-nous de livrer le premier workflow avec vous.',
        'IntakeFlow Free · IntakeFlow Starter from €21/month · IntakeFlow Cloud PRO from €39/month' => 'IntakeFlow Free · IntakeFlow Starter à partir de €21/mois · IntakeFlow Cloud PRO à partir de €39/mois',
        'Done For You setup' => 'Configuration effectuée pour vous',
        '€499 (includes 1yr Pro)' => '499 € (inclut 1 an Pro)',
        'Want a custom turnkey portal?' => 'Vous préférez un portail clé en main ?',
        'Get it Done-For-You under 7 days.' => 'Notre équipe s’occupe de tout sous 7 jours.',
        'No time to configure your portal? Our team handles the design, setup, WordPress embedding, and tools integration for a single flat fee of €499 (includes 1 year of Starter license).' => 'Pas le temps de configurer votre portail ? Notre équipe gère le design, la configuration, l’intégration WordPress et la connexion à vos outils pour un tarif unique de 499 € (incluant 1 an de licence Starter).',
        'Done-For-You Setup' => 'Service Clé en Main',
        'Discuss custom pilot' => 'Discuter d’un pilote',
        'Agency pilot' => 'Pilote agence',
        'Fast decision' => 'Décision rapide',
        'Choose by the first workflow you need to ship.' => 'Choisissez selon le premier workflow à livrer.',
        'Install today' => 'Installer aujourd’hui',
        'Use IntakeFlow Free' => 'Utiliser IntakeFlow Free',
        'Sell client-site delivery' => 'Vendre une livraison sur site client',
        'Discuss IntakeFlow delivery' => 'Discuter d’une livraison IntakeFlow',
        'Avoid client-site ops' => 'Éviter les opérations sur site client',
        'Start IntakeFlow Cloud' => 'Démarrer IntakeFlow Cloud',
        'Not ready to choose a plan?' => 'Pas prêt à choisir un plan ?',
        'Start with one paid workflow pilot.' => 'Commencez par un pilote workflow payant.',
        'If the buyer is still comparing paths, scope one real workflow first. Hosted pilots start from €299 setup; client-site delivery starts from €790 setup.' => 'Si vous hésitez encore sur la solution à adopter, cadrez d’abord un premier workflow réel. Les pilotes hébergés commencent à €299 de configuration ; la livraison sur site client commence à €790 de configuration.',
        'Positioning strip' => 'Positionnement',
        'Validate the portal on a client site' => 'Valider le portail sur un site client',
        'Ship production workflows on client sites' => 'Livrer des workflows de production sur sites clients',
        'Start one workflow' => 'Démarrer un workflow',
        'Most useful after first signal' => 'Le plus utile après les premiers signaux',
        'For repeatable client delivery' => 'Pour une livraison client répétable',

        'Get one branded hosted intake live from €299 setup, including operator email and a generated document summary.' => 'Mettez en ligne un intake hébergé et personnalisé à partir de €299, avec email opérateur et résumé de document généré.',
        'Products, prices, service slots, options, and members become reusable data instead of static choices.' => 'Produits, prix, créneaux de service, options et membres deviennent des données réutilisables au lieu de choix statiques.',
        'Agencies can validate IntakeFlow on 1 to 3 client workflows before committing to a larger plan.' => 'Les agences peuvent valider IntakeFlow sur 1 à 3 workflows clients avant de s’engager sur un plan plus large.',
        'You want to validate one client-site workflow with the bundled starter before buying anything.' => 'Vous voulez valider un workflow sur site client avec le starter inclus avant d’acheter quoi que ce soit.',
        'You need to package workflows for client-owned sites and keep the operations inside the delivered site.' => 'Vous devez packager des workflows pour des sites appartenant au client et garder les opérations dans le site livré.',
        'You want IntakeFlow to host the public link, submissions, files, catalogs, quotas, and operator review.' => 'Vous voulez que IntakeFlow héberge le lien public, les soumissions, les fichiers, les catalogues, les quotas et la revue opérateur.',
        'See pilot details' => 'Voir les détails du pilote',
        'Validate the portal experience on a real client site.' => 'Valider l’expérience du portail sur un vrai site client.',
        'Ship production workflow packs inside client sites.' => 'Livrer des packs de workflows de production dans les sites clients.',
        'Ask IntakeFlow to host links, catalogs, files, inbox, quotas, and review.' => 'Demander à IntakeFlow d’héberger les liens, catalogues, fichiers, inbox, quotas et revues.',
        'Best when you want to test the intake experience before buying or rolling out a hosted workflow.' => 'Idéal pour tester l’expérience d’intake avant d’acheter ou de déployer un workflow hébergé.',
        'WordPress.org download' => 'Téléchargement WordPress.org',
        'IntakeFlow client-site plugin' => 'Plugin IntakeFlow côté site client',
        'Bundled document intake workflow' => 'Workflow d’intake documentaire inclus',
        'Custom workflow ZIP installation' => 'Installation de workflows personnalisés en ZIP',
        'Submission inbox and file uploads on the client site' => 'Inbox de soumissions et uploads de fichiers sur le site client',
        'Best value' => 'Meilleur rapport qualité-prix',
        'Best for agencies and teams that need custom, repeatable document portals on client sites.' => 'Idéal pour les agences et équipes qui ont besoin de portails documentaires personnalisés et répétables sur des sites clients.',
        'one-time' => 'paiement unique',
        'Starter plan · per site · updates included' => 'Plan Starter · par site · mises à jour incluses',
        'Everything in IntakeFlow Free' => 'Tout ce qui est dans IntakeFlow Free',
        'Customize Workflow — labels, choices, colors, and messages per workflow from the client-site admin' => 'Customize Workflow : libellés, choix, couleurs et messages par workflow depuis l’admin du site client',
        'Console Sync for direct workflow pull' => 'Console Sync pour récupérer directement les workflows',
        'Advanced fields (camera capture, signature, e-payment proof, date & month ranges)' => 'Champs avancés (capture caméra, signature, preuve de paiement, plages de dates et de mois)',
        'Priority email support and automatic updates' => 'Support email prioritaire et mises à jour automatiques',
        '15-day free trial · no card required' => 'Essai gratuit 15 jours · sans carte',
        'Start 15-day free trial' => 'Démarrer l’essai gratuit 15 jours',
        'or buy now — €21/month' => 'ou acheter maintenant — €21/mois',
        '15-day free Cloud trial · hosted links + inbox · no card' => 'Essai Cloud gratuit 15 jours · liens hébergés + inbox · sans carte',
        'Start free Cloud trial' => 'Démarrer l’essai Cloud gratuit',
        'or discuss Cloud plan' => 'ou discuter de l’offre Cloud',
        'Start free — 15-day trial on Starter or Cloud, no card required.' => 'Commencez gratuitement — essai 15 jours sur Starter ou Cloud, sans carte.',
        'Is there a free trial?' => 'Y a-t-il un essai gratuit ?',
        'Yes — plans have a 15-day free trial, no card required. Start the Starter trial to test the plugin and Cloud features (the 15-day clock starts at first activation), or start the Cloud trial for hosted links and the submission inbox.' => 'Oui — les plans disposent d’un essai gratuit de 15 jours, sans carte requise. Démarrez l’essai de Starter pour tester le plugin et les fonctionnalités Cloud (la période de 15 jours commence à la première activation), ou démarrez l’essai Cloud pour les liens hébergés et l’inbox de soumission.',
        'Let IntakeFlow run hosted operations' => 'Laisser IntakeFlow gérer les opérations hébergées',
        'Best when the client does not want client-site operations, or when your team needs shared review, quotas, audit, and file handling in Console.' => 'Idéal quand le client ne veut pas d’opérations sur son site, ou quand votre équipe a besoin de revue partagée, quotas, audit et gestion des fichiers dans la Console.',
        '/month' => '/mois',
        'Cloud PRO at €39/month · Cloud ENTERPRISE available' => 'Cloud PRO à €39/mois · Cloud ENTERPRISE disponible',
        '1 workspace and 3 hosted workflows' => '1 workspace et 3 workflows hébergés',
        '500 submissions/month' => '500 soumissions/mois',
        'Console inbox, statuses, and operator notes' => 'Inbox Console, statuts et notes opérateur',
        'Workspace file storage, quotas, and audit trail' => 'Stockage fichiers workspace, quotas et piste d’audit',
        'Cloud pricing' => 'Tarifs Cloud',
        'Choose the Cloud tier by workflow volume, not by guesswork.' => 'Choisissez le niveau Cloud selon le volume de workflows, pas au hasard.',
        'Starter is enough to validate one site-hosted workflow. Cloud PRO adds hosted operations, payments, and webhooks. Enterprise is the path for organizations requiring team management.' => 'Starter suffit pour valider un workflow auto-hébergé. Cloud PRO ajoute les opérations hébergées, les paiements et les webhooks. Enterprise est destiné aux organisations nécessitant une gestion d’équipe.',
        'Best for a single team validating hosted intake, catalogs, files, and review before scaling.' => 'Idéal pour une équipe qui valide intake hébergé, catalogues, fichiers et revue avant de passer à l’échelle.',
        '1 workspace' => '1 workspace',
        '100 submissions/month' => '100 soumissions/mois',
        'Console inbox and file review' => 'Inbox Console et revue des fichiers',
        'Best when several workflows or operators need shared review, reusable catalogs, and basic AI assistance.' => 'Idéal quand plusieurs workflows ou opérateurs ont besoin de revue partagée, catalogues réutilisables et assistance IA de base.',
        '5 workspaces' => '5 workspaces',
        'Team operators and admins' => 'Opérateurs et admins équipe',
        'Basic AI extraction/validation path' => 'Chemin d’extraction/validation IA de base',
        'Best for agencies turning workflows into a reusable delivery offer across clients and verticals.' => 'Idéal pour les agences qui transforment les workflows en offre de livraison réutilisable entre clients et secteurs.',
        'Higher workspace and submission limits' => 'Limites workspace et soumissions plus élevées',
        'White-label rollout path' => 'Chemin de déploiement white-label',
        'Advanced AI extraction/digest path' => 'Chemin avancé d’extraction/synthèse IA',
        'Template and catalog reuse' => 'Réutilisation de templates et catalogues',
        'Assisted onboarding option' => 'Option d’onboarding accompagné',
        'Discuss Solo' => 'Discuter de Solo',
        'Discuss Team' => 'Discuter de Team',
        'Discuss Agency' => 'Discuter d’Agency',
        'Priority email support' => 'Support email prioritaire',
        '500/mo' => '500/mois',
        'N/A' => 'N/A',
        'Why teams upgrade' => 'Pourquoi les équipes passent à la suite',
        'IntakeFlow Starter is for running repeatable intake outcomes, not just publishing one form.' => 'IntakeFlow Starter sert à produire des résultats d’intake répétables, pas seulement à publier un portail.',
        'Save time' => 'Gagner du temps',
        'Reuse proven intake flows instead of rebuilding each project from scratch.' => 'Réutiliser des parcours d’intake éprouvés au lieu de reconstruire chaque projet à zéro.',
        'Charge more' => 'Vendre plus cher',
        'Package document portals as a premium delivery service for client onboarding.' => 'Packager les portails documentaires comme un service premium pour l’onboarding client.',
        'Look professional' => 'Professionnel',
        'Give clients a cleaner, more structured way to send documents and complete intake.' => 'Donner aux clients une façon plus claire et structurée d’envoyer les documents et compléter l’intake.',
        'Compare plans' => 'Comparer les plans',
        'See exactly what changes when you upgrade.' => 'Voir exactement ce qui change quand vous passez à la suite.',
        'Start with IntakeFlow Free if you only need the bundled portal. Upgrade to IntakeFlow Starter for client-site delivery, or choose IntakeFlow Cloud when the hosted operations layer should live in Console.' => 'Commencez avec IntakeFlow Free si vous avez seulement besoin du portail inclus. Passez à IntakeFlow Starter pour la livraison sur site client, ou choisissez IntakeFlow Cloud quand la couche d’opérations hébergées doit vivre dans la Console.',
        'Feature' => 'Fonctionnalité',
        'Start with IntakeFlow Free' => 'Commencer avec IntakeFlow Free',
        'Ready-to-use Document Intake portal' => 'Portail Document Intake prêt à l’emploi',
        'Client-site submission inbox' => 'Inbox de soumissions côté site client',
        'Console submission inbox' => 'Inbox de soumissions Console',
        'File uploads and status tracking' => 'Uploads fichiers et suivi de statut',
        'Email notifications and redirect flow' => 'Notifications email et flux de redirection',
        'Build custom portals' => 'Créer des portails personnalisés',
        'Export workflow packs from the Console (.zip)' => 'Exporter des packs workflow depuis la Console (.zip)',
        'Install custom workflow packs on the client site' => 'Installer des packs workflow personnalisés sur le site client',
        'Console Sync / hosted publish path' => 'Console Sync / publication hébergée',
        'Custom workflows' => 'Workflows personnalisés',
        'Workflow data' => 'Données workflow',
        'Core fields (text, email, file, select...)' => 'Champs de base (texte, email, fichier, select...)',
        'Dynamic product, service, date, and member catalogs' => 'Catalogues dynamiques produit, service, date et membres',
        'CSV import and catalog-backed checkout/review' => 'Import CSV et checkout/revue basés sur catalogue',
        'Specialized capture fields when needed' => 'Champs de capture spécialisés si nécessaire',
        'Client delivery' => 'Livraison client',
        'Customize labels, help text, and choice labels' => 'Personnaliser libellés, aides et choix',
        'Customize validation rules and upload limits' => 'Personnaliser règles de validation et limites d’upload',
        'Design tokens — colors, fonts, border radius' => 'Design tokens : couleurs, polices, radius',
        'Workspace storage, quotas, and audit trail' => 'Stockage workspace, quotas et piste d’audit',
        'Support and license' => 'Support et licence',
        'Price' => 'Prix',
        '€21/month' => '€21/mois',
        '€39/mo' => '€39/mois',
        'from €790' => 'à partir de €790',
        'from €299' => 'à partir de €299',
        'Community support via GitHub Issues' => 'Support communauté via GitHub Issues',
        'Automatic plugin updates' => 'Mises à jour automatiques du plugin',
        'License valid per site' => 'Licence valide par site',
        'Cloud PRO limits' => 'Limites Cloud PRO',
        'Submission allowance' => 'Quota de soumissions',
        'Priority email support (1-2 business days)' => 'Support email prioritaire (1 à 2 jours ouvrés)',
        'Hosted' => 'Hébergé',
        'Cloud embed' => 'Embed Cloud',
        '3 hosted' => '3 hébergés',
        'Questions before you buy.' => 'Questions avant achat.',
        'Can I start with IntakeFlow Free first?' => 'Puis-je commencer avec IntakeFlow Free ?',
        'Yes. IntakeFlow Free is the easiest way to try the document portal experience on your own client site. You can install the bundled starter, upload custom workflow ZIPs, test the intake flow, and only upgrade when you need advanced fields, Console Sync, or workflow customization.' => 'Oui. IntakeFlow Free est le moyen le plus simple de tester l’expérience du portail documentaire sur votre propre site client. Vous pouvez installer le starter inclus, uploader des ZIP de workflow personnalisés, tester le flux d’intake, puis passer à la suite seulement quand vous avez besoin de champs avancés, Console Sync ou personnalisation de workflow.',
        'What does IntakeFlow Starter unlock exactly?' => 'Qu’est-ce que IntakeFlow Starter débloque exactement ?',
        'IntakeFlow Starter adds Visual Builder online (limit to 3 projects), WordPress export/activation + Cloud access (100 submissions/month, 100 MB secure storage), Customize Workflow directly from the client-site admin, Console Sync, specialized runtime features, and automatic updates.' => 'IntakeFlow Starter ajoute le Visual Builder en ligne (limite à 3 projets), l’export & activation WordPress + l’accès Cloud (100 soumissions/mois, 100 Mo de stockage sécurisé), Customize Workflow directement depuis l’admin du site client, Console Sync, des fonctionnalités de runtime spécialisées et les mises à jour automatiques.',
        'Where do dynamic catalogs fit?' => 'À quoi servent les catalogues dynamiques ?',
        'Catalogs are the strongest Cloud feature: products, prices, service slots, dates, and member lists can be reused across workflows instead of being hardcoded into static request pages. IntakeFlow Starter has full Cloud access to integrate catalogs.' => 'Les catalogues sont l’un des points forts de Cloud : produits, prix, créneaux, dates et listes de membres peuvent être réutilisés entre workflows au lieu d’être codés en dur dans des pages de demande statiques. IntakeFlow Starter dispose d’un accès Cloud complet pour intégrer les catalogues.',
        'Where does IntakeFlow Cloud fit?' => 'Où se place IntakeFlow Cloud ?',
        'IntakeFlow Cloud is for teams that want IntakeFlow to host the public workflow link, submission inbox, files, quotas, catalogs, and operator review. Starter includes 3 projects, 100 submissions/month and 100 MB storage, Cloud PRO starts at €39/month for 1,000 submissions/month and 10 GB storage, and Cloud ENTERPRISE is €149/month.' => 'IntakeFlow Cloud s’adresse aux équipes qui veulent que IntakeFlow héberge le lien public du workflow, l’inbox de soumission, les fichiers, les quotas, les catalogues et la revue opérateur. Starter comprend 3 projets, 100 soumissions/mois et 100 Mo de stockage, Cloud PRO commence à €39/mois pour 1 000 soumissions/mois et 10 Go de stockage, et Cloud ENTERPRISE est à €149/mois.',
        'Can you set up the first workflow for us?' => 'Pouvez-vous configurer le premier workflow pour nous ?',
        'Yes. Done For You setup starts at €299 for a hosted workflow and from €790 for client-site delivery. It is the fastest way to get the first workflow live and reusable.' => 'Oui. La Configuration effectuée pour vous démarre à €299 pour un workflow hébergé et à partir de €790 pour une livraison sur site client. C’est le chemin le plus rapide pour obtenir un premier workflow en ligne et réutilisable.',
        'Is €21/month a subscription?' => 'Les €21/mois sont-ils un abonnement ?',
        'Yes. It is a monthly subscription, which includes all updates, Visual Builder access, client-site runtime features, and Cloud access.' => 'Oui. Il s’agit d’un abonnement mensuel, qui comprend toutes les mises à jour, l’accès au Visual Builder, les fonctionnalités du runtime côté site client et l’accès au Cloud.',
        'Who is IntakeFlow Starter for?' => 'À qui s’adresse IntakeFlow Starter ?',
        'IntakeFlow Starter is built for accounting firms and agencies that need repeatable client document intake and basic Cloud hosting with less back-and-forth.' => 'IntakeFlow Starter est conçu pour les cabinets comptables et agences qui ont besoin d’un intake documentaire client répétable et d’un hébergement Cloud de base avec moins d’allers-retours.',
        'Do you offer a larger agency plan?' => 'Proposez-vous un plan agence plus large ?',
        'Yes. Larger teams can move toward Cloud PRO or ENTERPRISE for higher quotas, team workspace access, and managed rollout.' => 'Oui. Les équipes plus importantes peuvent s’orienter vers Cloud PRO ou ENTERPRISE pour des quotas plus élevés, un accès workspace en équipe et un déploiement managé.',
        'Can I use it on client sites?' => 'Puis-je l’utiliser sur des sites clients ?',
        'Yes. The Starter license covers one production client site per subscription, which makes it practical for client delivery and internal use.' => 'Oui. La licence Starter couvre un site client de production par abonnement, ce qui la rend adaptée à la livraison client et à l’usage interne.',
        'What if it is not a fit?' => 'Et si ce n’est pas adapté ?',
        'You are covered by a 30-day money-back guarantee. If it does not fit your workflow, email hello@intakeflow.dev within 30 days.' => 'Vous êtes couvert par une garantie satisfait ou remboursé de 30 jours. Si cela ne convient pas à votre workflow, envoyez un email à hello@intakeflow.dev sous 30 jours.',
        'Ready to build?' => 'Prêt à construire ?',
        'Use IntakeFlow Free today. Upgrade when your team needs repeatable intake at speed.' => 'Utilisez IntakeFlow Free aujourd’hui. Passez à la suite quand votre équipe a besoin d’un intake répétable et rapide.',
        'If you just want to test the experience, start free. If you want to build custom client portals you can reuse and sell, Pro is the right move.' => 'Si vous voulez simplement tester l’expérience, commencez gratuitement. Si vous voulez créer des portails clients personnalisés que vous pouvez réutiliser et vendre, la version Pro est le choix idéal.',
        'Publish a public workflow URL without asking the client to install or maintain client-site infrastructure.' => 'Publiez une URL de workflow publique sans demander au client d’installer ou maintenir une infrastructure côté site.',
        'Manage products, services, dates, options, or member lists once and reuse them across hosted workflows.' => 'Gérez une fois les produits, services, dates, options ou listes de membres, puis réutilisez-les dans les workflows hébergés.',
        'Operators review submissions, statuses, files, and internal notes from the same workspace.' => 'Les opérateurs relisent les soumissions, statuts, fichiers et notes internes depuis le même workspace.',
        'Files stay behind the hosted operations layer with workspace limits, download controls, and audit trail.' => 'Les fichiers restent derrière la couche d’opérations hébergée, avec limites workspace, contrôles de téléchargement et piste d’audit.',
        'Add admins and operators to the workspace without sharing a client-site account.' => 'Ajoutez des admins et opérateurs au workspace sans partager un compte du site client.',
        'Existing client site, client-owned delivery' => 'Site client existant, livraison possédée par le client',
        'No client-site dependency, IntakeFlow-managed operations' => 'Aucune dépendance au site client, opérations gérées par IntakeFlow',
        'Embedded on a client-site page' => 'Intégré dans une page du site client',
        'Hosted workflow URL' => 'URL de workflow hébergée',
        'Cloud-backed catalogs can be integrated case by case' => 'Les catalogues Cloud peuvent être intégrés au cas par cas',
        'Products, services, dates, options, and members managed in Console' => 'Produits, services, dates, options et membres gérés dans la Console',
        'Client-site submission screens' => 'Écrans de soumissions côté site client',
        'Console inbox and workspace review' => 'Inbox Console et revue workspace',
        'Client-site storage and plugin policy' => 'Stockage côté site client et politique du plugin',
        'Workspace storage, quotas, retention, audit' => 'Stockage workspace, quotas, rétention et audit',
        'Deploy intake workflows on your own WordPress site.' => 'Déployez des workflows d’intake sur votre propre site WordPress.',
        'Designed for professionals and agencies with regular intake needs.' => 'Conçu pour les professionnels et agences ayant des besoins réguliers d’intake.',
        'For organizations managing large volumes of client files.' => 'Pour les organisations gérant de grands volumes de fichiers clients.',
        'Console inbox and files' => 'Inbox Console et fichiers',
        'Team operators/admins' => 'Opérateurs/admins équipe',
        'Reusable catalogs' => 'Catalogues réutilisables',
        'Higher limits' => 'Limites plus élevées',
        'Template reuse' => 'Réutilisation de templates',
        'Self-hosted site delivery.' => 'Livraison sur site auto-hébergé.',
        'Host operations & pay.' => 'Hébergez les opérations et paiements.',
        'from €299 for one workflow.' => 'à partir de €299 pour un workflow.',
        'Starter, Cloud PRO, ENTERPRISE, or client-site delivery.' => 'Starter, Cloud PRO, ENTERPRISE ou livraison sur site client.',
        'files, reservations, catalog orders, payment proofs.' => 'fichiers, réservations, commandes catalogue, preuves de paiement.',
        'See pilot offer' => 'Voir l’offre pilote',
        'We are opening Cloud PRO and ENTERPRISE plans case by case for teams with active intake workflows, file-heavy submissions, reusable catalogs, or multi-operator review needs.' => 'Nous ouvrons les plans Cloud PRO et ENTERPRISE au cas par cas pour les équipes avec des workflows d’intake actifs, des soumissions riches en fichiers, des catalogues réutilisables ou des besoins de revue multi-opérateurs.',

        'Client intake portals for agencies and service teams' => 'Portails d’intake client pour agences et équipes de service',
        'Build client intake portals without stitching together plugins, storage, and review screens.' => 'Créez des portails d’intake client sans assembler plugins, stockage et écrans de revue.',
        'IntakeFlow gives agencies and service teams one delivery system for private intake links, document upload, dynamic choices, and operator review. Use it on client WordPress sites or host the workflow with IntakeFlow Cloud.' => 'IntakeFlow donne aux agences et équipes de service un système de livraison unique pour liens privés d’intake, upload de documents, choix dynamiques et revue opérateur. Utilisez-le sur des sites WordPress clients ou hébergez le workflow avec IntakeFlow Cloud.',
        'Try live demo' => 'Tester la démo',
        'Private intake links' => 'Liens d’intake privés',
        'Guided uploads' => 'Uploads guidés',
        'Operator inbox' => 'Inbox opérateur',
        'WordPress or Cloud' => 'WordPress ou Cloud',
        'Open video' => 'Ouvrir la vidéo',
        'Portal, file collection, and admin review in one flow.' => 'Portail, collecte de fichiers et revue admin dans un même flux.',
        'First workflows to sell' => 'Premiers workflows à vendre',
        'Start with the processes that already create manual follow-up.' => 'Commencez par les processus qui créent déjà des relances manuelles.',
        'IntakeFlow is easiest to sell when the buyer already feels the pain: missing files, outdated lists, unclear requests, or schedule changes.' => 'IntakeFlow se vend plus facilement quand votre client ressent déjà la douleur : fichiers manquants, listes obsolètes, demandes floues ou changements de planning.',
        'Document intake' => 'Intake documentaire',
        'Collect files, missing information, and approvals before an operator starts review.' => 'Collectez fichiers, informations manquantes et validations avant le début de la revue opérateur.',
        'Service requests' => 'Demandes de service',
        'Route one branded request form into a repeatable review path with status and follow-up.' => 'Transformez une demande brandée en chemin de revue répétable avec statut et suivi.',
        'Catalog orders' => 'Commandes catalogue',
        'Let clients choose products, quantities, prices, or options without hardcoding lists in the form.' => 'Laissez les clients choisir produits, quantités, prix ou options sans coder les listes en dur dans le parcours.',
        'Reservations' => 'Réservations',
        'Expose dates, slots, capacities, and exceptions without rebuilding the workflow every month.' => 'Exposez dates, créneaux, capacités et exceptions sans reconstruire le workflow chaque mois.',
        'Pick one pilot workflow' => 'Choisir un workflow pilote',
        'Your workflows should not be full of static lists.' => 'Vos workflows ne devraient pas être remplis de listes statiques.',
        'Products, prices, service slots, dates, options, and members become reusable data your team can maintain once and connect to multiple workflows.' => 'Produits, prix, créneaux de service, dates, options et membres deviennent des données réutilisables que votre équipe maintient une fois et connecte à plusieurs workflows.',
        'Products and options' => 'Produits et options',
        'Keep SKUs, prices, quantities, and selectable options in a reusable catalog instead of copying choices into every workflow.' => 'Gardez SKU, prix, quantités et options sélectionnables dans un catalogue réutilisable au lieu de copier les choix dans chaque workflow.',
        'Services and slots' => 'Services et créneaux',
        'Publish available services, dates, capacities, and booking choices so operators can review requests with context.' => 'Publiez services disponibles, dates, capacités et choix de réservation afin que les opérateurs relisent les demandes avec contexte.',
        'Members and lists' => 'Membres et listes',
        'Reuse member, subscriber, or client lists when a workflow needs verification or a known audience.' => 'Réutilisez listes de membres, abonnés ou clients quand un workflow nécessite une vérification ou une audience connue.',
        'Best for agencies and teams replacing spreadsheets, duplicated choice lists, and manually maintained prices or schedules.' => 'Idéal pour les agences et équipes qui remplacent tableurs, listes de choix dupliquées et prix ou plannings maintenus manuellement.',
        'Done For You' => 'Clé en main',
        'Want the first workflow live quickly?' => 'Vous voulez mettre le premier workflow en ligne rapidement ?',
        'We can configure the first workflow with you, test it, and leave you with a reusable pattern for the next client or service.' => 'Nous pouvons configurer le premier workflow avec vous, le tester, et vous laisser un modèle réutilisable pour le prochain client ou service.',
        'Hosted workflow setup' => 'Configuration workflow hébergé',
        'from €299 setup' => 'à partir de €299 de configuration',
        'We configure one branded hosted workflow with operator email and a generated document summary.' => 'Nous configurons un workflow hébergé brandé avec email opérateur et résumé de document généré.',
        'Client-site delivery' => 'Livraison sur site client',
        'from €790 setup' => 'à partir de €790 de configuration',
        'We install IntakeFlow Starter, configure the workflow, test submissions, and hand it over with a short walkthrough.' => 'Nous installons IntakeFlow Starter, configurons le workflow, testons les soumissions et livrons avec une courte prise en main.',
        '3 months guided' => '3 mois accompagnés',
        'For agencies with complex forms, we help ship the first client workflow and turn the result into a repeatable offer.' => 'Pour les agences avec des parcours complexes, nous aidons à livrer le premier workflow client et à transformer le résultat en offre répétable.',
        'Request a setup call' => 'Demander un appel de cadrage',
        'Why it converts better' => 'Pourquoi ça convertit mieux',
        'You do not need another inbox full of attachments. You need a guided intake system.' => 'Vous n’avez pas besoin d’une autre inbox pleine de pièces jointes. Vous avez besoin d’un système d’intake guidé.',
        'Most onboarding starts badly: missing files, vague briefs, and too many follow-up emails. IntakeFlow replaces that chaos with a clear portal your client can actually complete in one sitting.' => 'La plupart des onboardings commencent mal : fichiers manquants, briefs vagues et trop d’emails de relance. IntakeFlow remplace ce chaos par un portail clair que votre client peut réellement compléter en une fois.',
        'Launch hosted or client-site workflows for real business requests' => 'Lancer des workflows hébergés ou sur site client pour de vraies demandes métier',
        'Collect files, structured answers, products, dates, and service choices in one flow' => 'Collecter fichiers, réponses structurées, produits, dates et choix de service dans un même flux',
        'Review submissions on the client site or Console instead of chasing email threads' => 'Relire les soumissions sur le site client ou dans la Console au lieu de courir après les fils email',
        'Use reusable catalogs so prices, slots, options, and members are not duplicated across workflows' => 'Utiliser des catalogues réutilisables pour éviter de dupliquer prix, créneaux, options et membres entre workflows',
        'How it works' => 'Comment ça marche',
        'A cleaner start for every client project.' => 'Un démarrage plus propre pour chaque projet client.',
        'The key screens are already there, so you can move faster without stitching together a fragile onboarding flow from generic plugins.' => 'Les écrans clés sont déjà là, pour avancer plus vite sans assembler un flux d’onboarding fragile avec des plugins génériques.',
        'Client portal flow' => 'Parcours portail client',
        'Clients move through a clear multi-step portal instead of sending everything across scattered emails.' => 'Les clients avancent dans un portail clair en plusieurs étapes au lieu d’envoyer les éléments dans des emails dispersés.',
        'Document upload' => 'Upload de documents',
        'Collect briefs, assets, and required files in one structured intake flow.' => 'Collectez briefs, assets et fichiers requis dans un flux d’intake structuré.',
        'Submission inbox' => 'Inbox de soumissions',
        'Every submission lands in one operator workspace so nothing gets lost before kickoff.' => 'Chaque soumission arrive dans un workspace opérateur unique, pour ne rien perdre avant le lancement.',
        'Submission review' => 'Revue de soumission',
        'Review answers, downloads, and project context in one screen before work starts.' => 'Relisez réponses, téléchargements et contexte projet dans un seul écran avant le démarrage.',
        'For agencies' => 'Pour les agences',
        'Package it as a premium onboarding feature.' => 'Packager l’intake comme une fonctionnalité premium d’onboarding.',
        'Turn a messy kickoff into a cleaner client experience you can actually sell as part of your client-site delivery.' => 'Transformez un kickoff désordonné en expérience client plus claire que vous pouvez vendre dans votre livraison sur site client.',
        'For freelancers' => 'Pour les freelances',
        'Save hours on follow-ups.' => 'Gagner des heures de relance.',
        'Get the right files, the right answers, and the right context before the build starts instead of chasing details afterward.' => 'Obtenez les bons fichiers, les bonnes réponses et le bon contexte avant le démarrage au lieu de courir après les détails ensuite.',
        'For teams' => 'Pour les équipes',
        'Keep everything on the client site.' => 'Garder tout sur le site client.',
        'Your team reviews submissions, tracks status, and downloads project files without moving between disconnected tools.' => 'Votre équipe relit les soumissions, suit les statuts et télécharge les fichiers projet sans passer entre des outils déconnectés.',
        'Simple rollout' => 'Déploiement simple',
        'Three steps to a live portal.' => 'Trois étapes pour un portail en ligne.',
        'Install IntakeFlow Free' => 'Installer IntakeFlow Free',
        'Download IntakeFlow Free and activate it on your site in a few minutes.' => 'Téléchargez IntakeFlow Free et activez-le sur votre site en quelques minutes.',
        'Install a workflow' => 'Installer un workflow',
        'Use the bundled starter or upload a workflow pack exported from the Console. Upgrade to Pro when you want Console Sync and advanced customization.' => 'Utilisez le starter inclus ou uploadez un pack workflow exporté depuis la Console. Passez à Pro quand vous voulez Console Sync et la personnalisation avancée.',
        'Collect everything cleanly' => 'Collecter proprement',
        'Clients submit files and answers in one place, and your team reviews it on client sites.' => 'Les clients soumettent fichiers et réponses au même endroit, et votre équipe les relit sur les sites clients.',
        'Why it stands out' => 'Pourquoi IntakeFlow se démarque',
        'Built for intake, not scattered follow-up.' => 'Conçu pour l’intake, pas pour des relances dispersées.',
        'IntakeFlow is aimed at the full client intake path: the private link, the guided upload, the submission status, and the operator review screen.' => 'IntakeFlow couvre le chemin complet d’intake client : lien privé, upload guidé, statut de soumission et écran de revue opérateur.',
        'What it is' => 'Ce que c’est',
        '<strong>Client intake delivery.</strong> Built for document intake, registrations, service requests, product choices, and operator review.' => '<strong>Livraison d’intake client.</strong> Conçu pour intake documentaire, inscriptions, demandes de service, choix produits et revue opérateur.',
        '<strong>Single interaction.</strong> Useful for collecting input, but not designed as a full intake or operations flow.' => '<strong>Interaction ponctuelle.</strong> Utile pour collecter une saisie, mais pas conçu comme un flux complet d’intake ou d’opérations.',
        'Dynamic data' => 'Données dynamiques',
        '<strong>Reusable catalogs.</strong> Products, prices, service slots, dates, options, and members can be maintained outside each workflow.' => '<strong>Catalogues réutilisables.</strong> Produits, prix, créneaux, dates, options et membres peuvent être maintenus hors de chaque workflow.',
        '<strong>Static choices.</strong> Lists often live inside each workflow and need manual updates across projects.' => '<strong>Choix statiques.</strong> Les listes vivent souvent dans chaque workflow et exigent des mises à jour manuelles entre projets.',
        'Client-site fit' => 'Adaptation au site client',
        '<strong>Theme-proof by design.</strong> UI stays consistent without fighting theme CSS on every project.' => '<strong>Conçu pour résister aux thèmes.</strong> L’UI reste cohérente sans combattre le CSS du thème à chaque projet.',
        '<strong>Theme-dependent.</strong> Styling often needs extra overrides or custom fixes.' => '<strong>Dépendant du thème.</strong> Le style nécessite souvent des overrides ou corrections spécifiques.',
        'Best use case' => 'Meilleur cas d’usage',
        '<strong>Agencies and service teams.</strong> Best when you repeatedly collect structured requests, documents, bookings, or catalog-driven choices.' => '<strong>Agences et équipes de service.</strong> Idéal quand vous collectez souvent des demandes structurées, documents, réservations ou choix issus d’un catalogue.',
        '<strong>Generic collection.</strong> Best when you only need a simple one-off request.' => '<strong>Collecte générique.</strong> Idéal seulement pour une demande simple et ponctuelle.',
        'Generic collection tools' => 'Outils de collecte génériques',
        'Start with IntakeFlow Starter now. Move to hosted when operations need to scale.' => 'Commencez avec IntakeFlow Starter maintenant. Passez à l’hébergé quand les opérations doivent monter en charge.',
        'Launch quickly with IntakeFlow Free, upgrade to IntakeFlow Starter for production client-site delivery, then add IntakeFlow Cloud PRO when you want IntakeFlow to manage links, inbox, files, quotas, and team review.' => 'Lancez vite avec IntakeFlow Free, passez à IntakeFlow Starter pour la livraison de production sur site client, puis ajoutez IntakeFlow Cloud PRO quand vous voulez que IntakeFlow gère liens, inbox, fichiers, quotas et revue équipe.',
        'Ship the intake workflow on client sites' => 'Livrer le workflow d’intake sur sites clients',
        'free entry path' => 'chemin d’entrée gratuit',
        'File uploads and review screens' => 'Uploads fichiers et écrans de revue',
        'Start with IntakeFlow Free' => 'Commencer avec IntakeFlow Free',
        'Let IntakeFlow host the workflow and operations inbox' => 'Laisser IntakeFlow héberger le workflow et l’inbox opérationnelle',
        'Publish hosted public submission links' => 'Publier des liens publics de soumission hébergés',
        'Operate submissions and files from Console' => 'Gérer soumissions et fichiers depuis la Console',
        'Use workspace quotas and audit trail' => 'Utiliser quotas workspace et piste d’audit',
        'Add team review without sharing client-site access' => 'Ajouter la revue équipe sans partager l’accès au site client',
        'Discuss Cloud plan' => 'Discuter du plan Cloud',
        'Questions people ask before trying it.' => 'Questions fréquentes avant d’essayer.',
        'What is IntakeFlow?' => 'Qu’est-ce que IntakeFlow ?',
        'IntakeFlow is a client intake portal system: private links, guided document upload, dynamic choices, and operator review in one delivery path.' => 'IntakeFlow est un système de portail d’intake client : liens privés, upload documentaire guidé, choix dynamiques et revue opérateur dans un même chemin de livraison.',
        'Can I start for free?' => 'Puis-je commencer gratuitement ?',
        'Yes. IntakeFlow Free includes the client-site runtime, a bundled document intake workflow, and custom workflow ZIP installation so you can test the setup on a real site.' => 'Oui. IntakeFlow Free inclut le runtime côté site client, un workflow d’intake documentaire inclus et l’installation de workflows ZIP personnalisés pour tester sur un vrai site.',
        'What is IntakeFlow Starter?' => 'Qu’est-ce que IntakeFlow Starter ?',
        'IntakeFlow Starter is the fastest path to production today: plugin install, workflow setup, and submission review directly in the client-site admin.' => 'IntakeFlow Starter est aujourd’hui le chemin le plus rapide vers la production : installation du plugin, configuration du workflow et revue des soumissions directement dans l’admin du site client.',
        'What is IntakeFlow Cloud?' => 'Qu’est-ce que IntakeFlow Cloud ?',
        'IntakeFlow Cloud is the next delivery path for teams that want IntakeFlow to host the public workflow link, submissions inbox, files, catalogs, and operator review outside a client site. Cloud PRO starts at €39/month, and Cloud ENTERPRISE is €149/month.' => 'IntakeFlow Cloud est le chemin suivant pour les équipes qui veulent que IntakeFlow héberge le lien public du workflow, l’inbox de soumissions, les fichiers, catalogues et revue opérateur hors du site client. Cloud PRO commence à €39/mois, et Cloud ENTERPRISE est à €149/mois.',
        'When should I get Starter?' => 'Quand passer à Starter ?',
        'Upgrade when you want advanced field types, Customize Workflow in the client-site admin, direct Console Sync, commercial updates, and the full Starter runtime.' => 'Passez à Starter quand vous voulez les champs avancés, Customize Workflow dans l’admin du site client, Console Sync direct, les mises à jour commerciales et le runtime Starter complet.',
        'Who is it for?' => 'À qui s’adresse IntakeFlow ?',
        'It fits agencies, operators, and service teams that repeatedly collect client files, briefs, and onboarding information.' => 'C’est adapté aux agences, opérateurs et équipes de service qui collectent régulièrement fichiers client, briefs et informations d’onboarding.',
        'Ready to launch your first intake portal?' => 'Prêt à lancer votre premier portail d’intake ?',
        'Ready to clean up onboarding?' => 'Prêt à clarifier l’onboarding ?',
        'Give your next client project a better start.' => 'Donnez un meilleur départ à votre prochain projet client.',
        'Start with IntakeFlow Free, then discuss the hosted or client-site path once the first workflow is clear.' => 'Commencez avec IntakeFlow Free, puis discutez du chemin hébergé ou site client une fois le premier workflow clarifié.',
        'Close' => 'Fermer',

        // Missing Pricing and UI translations
        '/year' => '/an',
        '/month' => '/mois',
        'Unlimited projects & workflows' => 'Projets et workflows illimités',
        'Unlimited projects &amp; workflows' => 'Projets et workflows illimités',
        'Up to 1,000 submissions/month' => 'Jusqu’à 1 000 soumissions/mois',
        '1,000 submissions/month' => '1 000 soumissions/mois',
        '10 GB secure Cloud storage (S3) for attachments' => '10 Go de stockage Cloud sécurisé (S3) pour les pièces jointes',
        'Stripe payment integration & tracking' => 'Intégration et suivi des paiements Stripe',
        'Stripe payment integration &amp; tracking' => 'Intégration et suivi des paiements Stripe',
        'Webhooks with HMAC signatures (Zapier, Make, Notion)' => 'Webhooks avec signatures HMAC (Zapier, Make, Notion)',
        'White-label widget (IntakeFlow branding removed)' => 'Widget en marque blanche (sans logo IntakeFlow)',
        'WordPress delivery' => 'Livraison WordPress',
        'Most popular' => 'Le plus populaire',
        'For organizations' => 'Pour les organisations',
        'Best for creators who want to host intake workflows on their own WordPress servers.' => 'Idéal pour les créateurs qui souhaitent héberger les workflows d’intake sur leurs propres serveurs WordPress.',
        'Best for professionals, freelancers, and agencies with regular client document collection needs.' => 'Idéal pour les professionnels, indépendants et agences ayant des besoins réguliers de collecte de documents.',
        'For organizations managing large volumes of client files and requiring team management.' => 'Pour les organisations gérant de grands volumes de fichiers clients et nécessitant une gestion d’équipe.',
        'Visual Builder (3 projects)' => 'Visual Builder (3 projets)',
        'WordPress ZIP export' => 'Export ZIP pour WordPress',
        'Client-site runtime' => 'Runtime sur site client',
        'Local inbox and storage' => 'Inbox et stockage locaux',
        'No Cloud dependency' => 'Aucune dépendance Cloud',
        'Unlimited projects' => 'Projets illimités',
        '10 GB Cloud storage' => '10 Go de stockage Cloud',
        'Stripe payment integration' => 'Intégration de paiement Stripe',
        'Webhooks with HMAC signatures' => 'Webhooks avec signatures HMAC',
        'White-label widget' => 'Widget en marque blanche',
        '100 GB Cloud storage' => '100 Go de stockage Cloud',
        '5 operators included' => '5 opérateurs inclus',
        'Automatic assignees' => 'Assignations automatiques',
        'GDPR retention rules' => 'Règles de rétention RGPD',
        'Priority support & SLA' => 'Support prioritaire & SLA',
        'Priority support &amp; SLA' => 'Support prioritaire et SLA',
        '1,000/mo' => '1 000/mois',
        '/mo</span>' => '/mois</span>',
        'submissions' => 'soumissions',
        'submissions/month' => 'soumissions/mois',
        'Advanced fields (camera capture, signature, e-payment proof, date & month ranges)' => 'Champs avancés (capture caméra, signature, preuve de paiement, plages de dates et de mois)',
        'Advanced fields (camera capture, signature, e-payment proof, date &amp; month ranges)' => 'Champs avancés (capture caméra, signature, preuve de paiement, plages de dates et de mois)',
        'IntakeFlow by IAKPress. All rights reserved.' => 'IntakeFlow par IAKPress. Tous droits réservés.',
        'All rights reserved.' => 'Tous droits réservés.',

        // XPressUI Cloud missing translations
        'IntakeFlow Cloud is for teams that want structured intake, reusable catalogs, and operator review without running the operations layer on client sites. IntakeFlow hosts the public link and centralizes submissions, products, services, dates, files, quotas, and review in Console.' => 'IntakeFlow Cloud s’adresse aux équipes qui veulent un intake structuré, des catalogues réutilisables et une revue opérateur sans gérer la couche opérationnelle sur les sites clients. IntakeFlow héberge le lien public et centralise les soumissions, produits, services, dates, fichiers, quotas et revues dans la Console.',
        'If the workflow is still messy, do not start by debating limits. Start with the smallest live test: one hosted link, one inbox, one reusable catalog or file intake, and one operator review path.' => 'Si le workflow est encore flou, ne commencez pas par débattre des limites. Commencez par le plus petit test réel : un lien hébergé, une inbox, un catalogue ou intake fichier réutilisable, et un chemin de revue opérateur.',
        'Workspaces with 5 operators included' => 'Workspaces avec 5 opérateurs inclus',
        '10,000 submissions/month' => '10 000 soumissions/mois',
        'Enterprise: workspaces, operators, GDPR rules, and SLA.' => 'Enterprise : workspaces, opérateurs, règles RGPD et SLA.',
        'Starter: host intake on your own WordPress site.' => 'Starter : hébergez l’intake sur votre propre site WordPress.',
        'Cloud PRO: hosted links, Stripe payment, and webhooks.' => 'Cloud PRO : liens hébergés, paiement Stripe et webhooks.',
        'The Cloud path is intentionally simple: Starter for self-hosted site delivery, Cloud PRO for hosted operations, and Enterprise for organizations.' => 'Le chemin Cloud reste volontairement simple : Starter pour une livraison sur site auto-hébergé, Cloud PRO pour les opérations hébergées et Enterprise pour les organisations.',
        'Organizations & SLA.' => 'Organisations et SLA.',
        'Solo, Team, Agency, or client-site delivery.' => 'Solo, Team, Agency ou livraison sur site client.',
        'host intake on your own WordPress site.' => 'hébergez l’intake sur votre propre site WordPress.',
        'hosted links, Stripe payment, and webhooks.' => 'liens hébergés, paiement Stripe et webhooks.',
        'workspaces, operators, GDPR rules, and SLA.' => 'workspaces, opérateurs, règles RGPD et SLA.',
        '/yr' => '/an',
        
        // Document Intake page missing translations
        'See the document intake workflow your clients will actually complete.' => 'Découvrez le workflow d’intake documentaire que vos clients vont réellement compléter.',
        'This is not just a form. It is a guided intake flow for collecting files, project details, and missing documents in one clean client-site or hosted experience.' => 'Ce n’est pas un simple portail. C’est un flux d’intake guidé pour collecter les fichiers, les détails du projet et les pièces manquantes dans une expérience propre, hébergée ou sur site client.',
        'Try the portal below' => 'Tester le portail ci-dessous',
        'Clear for clients' => 'Clair pour les clients',
        'A guided flow that tells clients exactly what to upload and what is still missing.' => 'Un flux guidé qui indique aux clients exactement quoi uploader et ce qui est encore manquant.',
        'Cleaner for your team' => 'Plus propre pour votre équipe',
        'Files, answers, and submission status are structured from the start instead of scattered in email.' => 'Fichiers, réponses et statuts sont structurés dès le départ au lieu d’être dispensés par email.',
        'Ready for delivery' => 'Prêt pour la livraison',
        'Use it on client sites or as a hosted workflow when the client needs a faster operational path.' => 'Utilisez-le sur des sites clients ou comme workflow hébergé quand le client a besoin d’un chemin opérationnel plus rapide.',
        'Try the intake flow directly' => 'Tester le flux d’intake directement',

        // Pro page translations
        'Scope my workflow' => 'Cadrer mon workflow',
        'See pilot' => 'Voir le pilote',
        'Ship faster' => 'Livrer plus vite',
        'Reduce follow-ups' => 'Réduire les relances',
        'Reuse data' => 'Réutiliser les données',
        'Turn the same intake pattern into a reusable workflow instead of rebuilding every cycle.' => 'Transformez le même modèle d’intake en un workflow réutilisable au lieu de tout reconstruire à chaque cycle.',
        'Give clients one checklist flow and reduce back-and-forth for missing documents.' => 'Offrez aux clients un flux de checklist unique et réduisez les allers-retours pour les documents manquants.',
        'Connect products, dates, service slots, and members through Cloud catalogs when the workflow needs live business data.' => 'Connectez des produits, des dates, des créneaux de service et des membres via des catalogues Cloud lorsque le workflow nécessite des données métier en direct.',
        'Accounting and document-heavy teams' => 'Équipes comptables et administratives',
        'Client files arrive late, incomplete, or scattered across channels during monthly and annual cycles.' => 'Les fichiers clients arrivent en retard, incomplets ou dispersés sur différents canaux pendant les cycles mensuels et annuels.',
        'Run one repeatable checklist flow and receive cleaner document sets from day one.' => 'Exécutez une liste de contrôle répétable et recevez des ensembles de documents plus propres dès le premier jour.',
        'Agency serving accounting clients' => 'Agences au service de clients comptables',
        'Your team keeps rebuilding similar intake pages and follow-up flows for each client account.' => 'Votre équipe continue de reconstruire des pages d’intake et des flux de relance similaires pour chaque compte client.',
        'Reuse a proven intake structure and deliver a consistent kickoff experience faster.' => 'Réutilisez une structure d’intake éprouvée et offrez plus rapidement une expérience de lancement cohérente.',
        'Operations team with recurring intake' => 'Équipes opérationnelles avec intake récurrent',
        'Manual relaunches and missing-file chases slow delivery every cycle.' => 'Les relances manuelles et la recherche de fichiers manquants ralentissent la livraison à chaque cycle.',
        'Standardize intake once, then run the same process with better completion rates.' => 'Standardisez l’intake une fois, puis exécutez le même processus avec de meilleurs taux de complétion.',
        'Portal builder' => 'Builder de portail',
        'Design your intake structure, steps, and logic visually.' => 'Concevez votre structure d’intake, vos étapes et votre logique de manière visuelle.',
        'See incoming client submissions in one place instead of across email threads.' => 'Visualisez les soumissions des clients en un seul endroit au lieu d’utiliser des fils d’e-mails.',
        'Submission detail' => 'Détail de la soumission',
        'Open a submission and review answers, files, and progress in one screen.' => 'Ouvrez une soumission et examinez les réponses, les fichiers et la progression sur un seul écran.',
        'Build reusable portals' => 'Créer des portails réutilisables',
        'Create structured intakes once, then reuse them across client projects instead of rebuilding each time.' => 'Créez des parcours structurés une fois, puis réutilisez-les sur vos projets clients au lieu de les reconstruire à chaque fois.',
        'Customize on the client site' => 'Personnaliser sur le site client',
        'Edit labels, choices, validation rules, colors, and messages from the client-site admin without rebuilding the workflow pack.' => 'Éditez les libellés, les choix, les règles de validation, les couleurs et les messages depuis l’admin du site client sans reconstruire le pack de workflow.',
        'Sync from the Console' => 'Synchroniser depuis la Console',
        'Pull workflow packs directly from your IntakeFlow Console instead of relying on manual ZIP handling for every update.' => 'Récupérez vos packs de workflows directement depuis votre Console IntakeFlow au lieu de gérer manuellement des fichiers ZIP à chaque mise à jour.',
        'Collect files properly' => 'Collecter proprement les fichiers',
        'Use uploads, statuses, and structured steps to stop chasing missing documents after kickoff.' => 'Utilisez les téléversements, les statuts et des étapes structurées pour ne plus courir après les documents manquants.',
        'Connect dynamic catalogs' => 'Connecter des catalogues dynamiques',
        'Pair client-site workflows with Cloud catalogs for reusable products, options, slots, dates, and member lists when static choices are not enough.' => 'Associez des workflows sur site client avec des catalogues Cloud pour réutiliser des listes de produits, options, créneaux, dates et membres quand des choix statiques ne suffisent plus.',
        'Use specialized runtime features' => 'Utiliser des fonctionnalités de runtime spécialisées',
        'Unlock richer guided flows and specialized capture only when the workflow actually needs them.' => 'Débloquez des parcours guidés plus riches et des captures spécialisées uniquement lorsque le workflow en a réellement besoin.',
        'Starter license per site' => 'Licence Starter par site',
        'One purchase covers one production client site, with updates included.' => 'Un seul achat couvre un site client en production, mises à jour incluses.',
        'Custom portals for real client work' => 'Des portails personnalisés pour de vrais projets clients',
        'Full runtime + specialized workflow features' => 'Runtime complet et fonctionnalités de workflow spécialisées',
        'Use on 1 production site' => 'Utilisation sur 1 site de production',
        'Who should buy Starter?' => 'Qui devrait acheter Starter ?',
        'Do I need to code the portals?' => 'Dois-je coder les portails ?',
        'No. The builder is visual. If you can install IntakeFlow and publish an embed, you can use IntakeFlow Starter.' => 'Non. Le builder est visuel. Si vous pouvez installer IntakeFlow et publier un embed, vous pouvez utiliser IntakeFlow Starter.',
        'What does Starter unlock?' => 'Qu’est-ce que Starter débloque ?',
        'Starter adds the full runtime, advanced field types, local workflow customization in the client-site admin, Console Sync, automatic updates, and the license for one production site.' => 'Starter ajoute le runtime complet, des types de champs avancés, la personnalisation locale du workflow dans l’admin du site client, la Console Sync, les mises à jour automatiques et la licence pour un site de production.',
        'Try the live demo' => 'Tester la démo en direct',
        'Customize Workflow in the client-site admin' => 'Personnalisation du workflow dans l’administration du site client',
        'Console Sync + Starter license' => 'Console Sync et licence Starter',
        'Updates and Visual Builder included' => 'Mises à jour et Visual Builder inclus',
        'Buy IntakeFlow Starter' => 'Acheter IntakeFlow Starter',
        'Starter is for accounting firms and agencies that need repeatable client document intake with less back-and-forth.' => 'Starter est conçu pour les cabinets comptables et agences qui ont besoin d’un intake documentaire client répétable avec moins d’allers-retours.',
        'Yes. The Starter license covers one production client site per subscription.' => 'Oui. La licence Starter couvre un site client de production par abonnement.',

        // XPressUI / page-xpressui.php page translations
        'Submission inbox on the client site' => 'Inbox de soumissions sur le site client',
        'Use the bundled starter or upload a workflow pack exported from the Console. Upgrade to Starter when you want Console Sync and advanced customization.' => 'Utilisez le starter inclus ou uploadez un pack workflow exporté depuis la Console. Passez à Starter quand vous voulez la Console Sync et la personnalisation avancée.',

        'Complete a few steps, upload sample files if you want, and experience the portal as a client would.' => 'Complétez quelques étapes, chargez des fichiers d’exemple si vous voulez, et testez le portail comme un client.',
        'What to notice:' => 'Points clés :',
        'the portal stays focused, structured, and easy to complete — exactly what you want when clients are sending critical documents.' => 'le portail reste ciblé, structuré et facile à remplir — exactement ce qu’il vous faut pour la transmission de documents critiques.',
        'Why this matters' => 'Pourquoi c’est important',
        'It turns file chaos into a repeatable process.' => 'Cela transforme le chaos des fichiers en un processus répétable.',
        'Clients know exactly what to submit and in what order.' => 'Les clients savent exactement quoi soumettre et dans quel ordre.',
        'You stop chasing missing files across long email threads.' => 'Vous arrêtez de courir après les fichiers manquants dans de longs fils d’emails.',
        'Your intake feels more professional from the very first interaction.' => 'Votre intake paraît plus professionnel dès la première interaction.',
        'Built for agencies and service teams with document-heavy workflows.' => 'Conçu pour les agences et les équipes de service avec des workflows riches en documents.',
        '• agencies collecting briefs and assets' => '• agences collectant des briefs et des assets',
        '• freelancers onboarding new clients' => '• freelances accueillant de nouveaux clients',
        '• teams gathering forms and supporting documents' => '• équipes rassemblant des pièces justificatives et dossiers client',
        'If the demo feels right, the next step is simple.' => 'Si la démo vous plaît, l’étape suivante est simple.',
        'Start with IntakeFlow Starter when the workflow belongs on a client site, or use IntakeFlow Cloud when the team needs hosted links, catalogs, files, and operator review.' => 'Commencez avec IntakeFlow Starter si le workflow doit être sur un site client, ou utilisez IntakeFlow Cloud si l’équipe a besoin de liens hébergés, de catalogues, de fichiers et de revue opérateur.',
        'Explore Starter' => 'Découvrir Starter',

        // Pro page missing translations
        'Built for teams that run recurring document intake.' => 'Conçu pour les équipes qui gèrent des collectes récurrentes de documents.',
        'Custom portals for real client work' => 'Portails personnalisés pour des projets clients réels',
        'Deploy intake workflows on your own WordPress site. Standardize and reuse form templates across client accounts.' => 'Déployez des workflows d’intake sur votre propre site WordPress. Standardisez et réutilisez les modèles de parcours entre vos clients.',
        'Direct sales are managed through secure checkout.' => 'Les ventes directes sont gérées via un paiement sécurisé.',
        'Everything you need to deliver portals faster.' => 'Tout ce dont vous avez besoin pour livrer des portails plus rapidement.',
        'Fast commercial route' => 'Voie commerciale rapide',
        'From €299:' => 'À partir de €299 :',
        'From €790:' => 'À partir de €790 :',
        'If you want cleaner onboarding, Starter is the fastest path.' => 'Si vous voulez un onboarding plus propre, Starter est le chemin le plus rapide.',
        'IntakeFlow Starter is for teams that need structured outcomes, not ad hoc attachments and manual follow-up. Add local workflow customization, Console Sync, reusable workflow delivery, and optional Cloud catalogs when client projects need dynamic products, dates, slots, or member lists.' => 'IntakeFlow Starter s’adresse aux équipes qui ont besoin de résultats structurés, pas de pièces jointes volantes ni de relances manuelles. Ajoutez la personnalisation locale, la Console Sync, la livraison de workflows réutilisables et des catalogues Cloud en option pour vos produits, dates, créneaux ou membres.',
        'Need delivery, not just a license?' => 'Besoin de livraison opérationnelle, pas seulement d’une licence ?',
        'One Starter purchase unlocks the full runtime, local workflow customization, Console Sync, updates for your commercial add-on, and a clean upgrade path to Cloud catalogs.' => 'Un achat de Starter débloque le runtime complet, la personnalisation locale des workflows, la Console Sync, les mises à jour et un chemin d’évolution propre vers les catalogues Cloud.',
        'Prepare the Pro runtime path. Start a pilot when you want the first workflow delivered with you.' => 'Préparez le runtime Pro. Démarrez un pilote si vous souhaitez que nous livrions le premier workflow avec vous.',
        'Run repeatable document intake workflows you can ship with confidence.' => 'Exécutez des workflows d’intake documentaire répétables que vous pouvez livrer en toute confiance.',
        'Starter license for self-managed WordPress delivery.' => 'Licence Starter pour une livraison WordPress auto-gérée.',
        'Starter plan: €21/month · 30-day money-back guarantee' => 'Plan Starter : €21/mois · garantie satisfait ou remboursé de 30 jours',
        'The assisted path turns one real intake, reservation, catalog order, or payment-proof workflow into a working delivery before you standardize it for more clients.' => 'Le chemin accompagné transforme un premier workflow réel d’intake, de réservation, de commande ou de preuve de paiement en une solution opérationnelle avant de la standardiser.',
        'The important screens are already there.' => 'Les écrans importants sont déjà là.',
        'Use it to standardize client intake, collect files properly, and deliver a more professional workflow experience from the start.' => 'Utilisez-le pour standardiser l’intake client, collecter les fichiers proprement et offrir une expérience plus professionnelle dès le début.',
        'What Pro gives you' => 'Ce que Pro vous apporte',
        'What is included' => 'Ce qui est inclus',
        'Who buys Pro' => 'Qui achète Pro',
        'Monthly Plan' => 'Plan Mensuel',
        'client-site delivery and validation.' => 'livraison et validation sur site client.',
        'hosted workflow setup.' => 'configuration de workflow hébergé.',
        'per month.' => 'par mois.',
        '€21/month:' => '€21/mois :',
        '30-day money-back guarantee. Questions?' => 'Garantie satisfait ou remboursé de 30 jours. Des questions ?',
        'Starter (WordPress + Cloud)' => 'Starter (WordPress + Cloud)',

        'See pricing' => 'Voir les tarifs',
        'Request a setup call' => 'Demander un appel de cadrage',
        'Pick one pilot workflow' => 'Choisir un workflow pilote',
        'Start with IntakeFlow Free' => 'Commencer avec IntakeFlow Free',
        'Discuss Cloud plan' => 'Discuter du plan Cloud',
        'Try live intake' => 'Tester l’intake',
        'After:' => 'Après :',
        'Before:' => 'Avant :',
        'Common questions.' => 'Questions fréquentes.',

        // Purchase Confirmed page translations
        'Welcome to XPressUI Pro.' => 'Bienvenue sur XPressUI Pro.',
        'Your license key and download link are on their way to your inbox. Follow the steps below to go from ZIP file to live intake page.' => 'Votre clé de licence et votre lien de téléchargement sont en route vers votre boîte de réception. Suivez les étapes ci-dessous pour passer du fichier ZIP à votre page d’intake en ligne.',
        'Check your email' => 'Vérifiez vos e-mails',
        'Your license key and download link have been sent to your inbox. Check your spam folder if it doesn&#039;t show up within a minute.' => 'Votre clé de licence et votre lien de téléchargement ont été envoyés dans votre boîte de réception. Vérifiez votre dossier de spam s’ils n’apparaissent pas d’ici une minute.',
        'Download and install the free plugin' => 'Télécharger et installer le plugin gratuit',
        'Install and activate XPressUI Bridge on your client site first. This is the base runtime the Pro plugin requires.' => 'Installez et activez d’abord XPressUI Bridge sur votre site client. Il s’agit du runtime de base requis par le plugin Pro.',
        'Download XPressUI Bridge on WordPress.org' => 'Télécharger XPressUI Bridge sur WordPress.org',
        'Install XPressUI Pro from your email link' => 'Installer XPressUI Pro depuis le lien reçu par e-mail',
        'Download the XPressUI Pro ZIP from your email, then upload and activate it on the client site › Plugins › Add New › Upload Plugin.' => 'Téléchargez le ZIP d’XPressUI Pro depuis votre e-mail, puis téléversez-le et activez-le sur le site client › Extensions › Ajouter › Téléverser une extension.',
        'Enter your license key' => 'Saisir votre clé de licence',
        'In the client-site admin, go to XPressUI › Settings › License. Paste your license key from the email and click Activate. A green badge confirms it&#039;s active.' => 'Dans l’administration du site client, allez dans XPressUI › Réglages › Licence. Collez votre clé de licence reçue par e-mail et cliquez sur Activer. Un badge vert confirme qu’elle est active.',
        'Upload your workflow pack' => 'Téléverser votre pack de workflow',
        'Go to XPressUI › Workflows › Upload and install your workflow pack ZIP. Create a page embed to go live.' => 'Allez dans XPressUI › Workflows › Téléverser et installez le ZIP de votre pack de workflow. Créez un embed de page pour le mettre en ligne.',
        'workflow slug or client project name' => 'slug du workflow ou nom du projet client',
        'client-site URL and active theme if this is a client-site delivery' => 'URL du site client et thème actif s’il s’agit d’une livraison sur site client',
        'who should receive operator emails' => 'qui doit recevoir les e-mails opérateur',
        'one test submission you expect to see' => 'une soumission de test que vous vous attendez à voir',
        'whether you need a hosted link, client-site page, or both' => 'si vous avez besoin d’un lien hébergé, d’une page sur site client, ou des deux',
        '✓ Payment confirmed' => '✓ Paiement confirmé',
        'You\'re in' => 'Vous y êtes',
        'We\'ve sent your <strong class="text-gray-700">license key</strong> and a protected <strong class="text-gray-700">download link</strong> to your inbox.' => 'Nous avons envoyé votre <strong class="text-gray-700">clé de licence</strong> et un <strong class="text-gray-700">lien de téléchargement</strong> sécurisé dans votre boîte de réception.',
        'If it doesn\'t arrive within a couple of minutes, check your spam folder or' => 'S’il n’arrive pas d’ici quelques minutes, vérifiez votre dossier de spam ou',
        'contact support' => 'contacter le support',
        'Need help with the setup?' => 'Besoin d’aide pour la configuration ?',
        'We can walk you through installation or help tailor the workflow to your site.' => 'Nous pouvons vous guider lors de l’installation ou vous aider à adapter le workflow à votre site.',
        'Email support' => 'Support par e-mail',
        'Want an assisted launch?' => 'Vous souhaitez un lancement accompagné ?',
        'Send the details once, then we can scope the smallest useful setup.' => 'Envoyez-nous les détails une fois, puis nous pouvons cadrer la configuration la plus simple et utile.',
        'See assisted setup options' => 'Voir les options de configuration accompagnée',
        'Full install guide' => 'Guide d’installation complet',
    );

    return strtr( $html, $translations );
}

function iakpress_start_french_output_translation(): void {
    if ( is_admin() || wp_doing_ajax() || ! iakpress_is_french_request() ) {
        return;
    }

    ob_start( 'iakpress_translate_french_output' );
}
add_action( 'template_redirect', 'iakpress_start_french_output_translation', -5 );

function iakpress_french_language_attributes( string $output ): string {
    if ( ! iakpress_is_french_request() ) {
        return $output;
    }

    return 'lang="fr-FR"';
}
add_filter( 'language_attributes', 'iakpress_french_language_attributes', 20 );

function iakpress_enqueue_xpressui_embed_script(): void {
    $path = iakpress_current_path();
    if ( ! is_page( 'contact' ) && $path !== 'fr/contact' ) {
        return;
    }

    $path = get_stylesheet_directory() . '/assets/xpressui/embed.js';
    wp_enqueue_script(
        'xpressui-hosted-embed',
        get_stylesheet_directory_uri() . '/assets/xpressui/embed.js',
        [],
        file_exists( $path ) ? filemtime( $path ) : null,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'iakpress_enqueue_xpressui_embed_script', 40 );

function iakpress_favicon(): void {
    $base = get_stylesheet_directory_uri() . '/assets/favicon';
    echo '<link rel="icon" type="image/x-icon" href="' . esc_url( $base . '/favicon.ico' ) . '">' . "\n";
    echo '<link rel="icon" type="image/png" sizes="16x16" href="' . esc_url( $base . '/favicon-16x16.png' ) . '">' . "\n";
    echo '<link rel="icon" type="image/png" sizes="32x32" href="' . esc_url( $base . '/favicon-32x32.png' ) . '">' . "\n";
    echo '<link rel="icon" type="image/png" sizes="96x96" href="' . esc_url( $base . '/favicon-96x96.png' ) . '">' . "\n";
    echo '<link rel="apple-touch-icon" sizes="180x180" href="' . esc_url( $base . '/apple-icon-180x180.png' ) . '">' . "\n";
}
add_action( 'wp_head', 'iakpress_favicon', 1 );
add_action( 'admin_head', 'iakpress_favicon', 1 );

function iakpress_render_french_routes(): void {
    $path = iakpress_current_path();
    $template_map = array(
        'fr' => 'page-fr.php',
        'fr/xpressui' => 'page-xpressui.php',
        'fr/xpressui-cloud' => 'page-xpressui-cloud.php',
        'fr/pricing' => 'page-pricing.php',
        'fr/install' => 'page-install.php',
        'fr/contact' => 'page-contact.php',
        'fr/agency-pilot'    => 'page-agency-pilot.php',
        'fr/for-accountants' => 'page-for-accountants.php',
        'fr/for-agencies'    => 'page-for-agencies.php',
        'fr/for-operations'  => 'page-for-operations.php',
        'fr/document-intake' => 'page-document-intake.php',
        'fr/pro'             => 'page-pro.php',
        'fr/purchase-confirmed' => 'page-purchase-confirmed.php',
        'fr/resources'          => 'page-resources.php',
        'fr/done-for-you'       => 'page-done-for-you.php',
        'resources'             => 'page-resources.php',
        'done-for-you'          => 'page-done-for-you.php',
    );

    if ( ! isset( $template_map[$path] ) ) {
        return;
    }

    global $wp_query;
    if ( $wp_query ) {
        $wp_query->is_404 = false;
    }
    status_header( 200 );
    include get_stylesheet_directory() . '/' . $template_map[$path];
    exit;
}
add_action( 'template_redirect', 'iakpress_render_french_routes', 0 );

function iakpress_document_title_parts( array $parts ): array {
    $path = iakpress_current_path();
    $title_map = array(
        'fr' => 'Portails d’intake client pour agences et équipes de service',
        'fr/xpressui' => 'Portail d’intake documentaire',
        'fr/xpressui-cloud' => 'IntakeFlow Cloud · PRO & ENTERPRISE',
        'fr/pricing' => 'Tarifs et Plans de souscription',
        'fr/install' => 'Guide d’installation d’IntakeFlow',
        'fr/contact' => 'Contacter IntakeFlow',
        'fr/agency-pilot' => 'Pilote agence et accompagnement',
        'fr/for-accountants' => 'IntakeFlow pour les experts-comptables',
        'fr/for-agencies' => 'IntakeFlow pour les agences',
        'fr/for-operations' => 'IntakeFlow pour les équipes opérationnelles',
        'fr/document-intake' => 'Intake documentaire et suivi de pièces',
        'fr/pro' => 'IntakeFlow Pro',
        'fr/purchase-confirmed' => 'Achat confirmé',
        'resources' => 'Resources and Documentation',
        'fr/resources' => 'Ressources et Documentation',
        'done-for-you' => 'Done-For-You Client Portal Setup',
        'fr/done-for-you' => 'Service Clé en Main - Configuration Portail Client',
    );

    if ( isset( $title_map[$path] ) ) {
        $parts['title'] = $title_map[$path];
        $parts['site'] = 'IntakeFlow';
    }

    return $parts;
}
add_filter( 'document_title_parts', 'iakpress_document_title_parts', 50 );

function iakpress_custom_seo_meta_description(): void {
    $path = iakpress_current_path();
    $desc_map = array(
        'fr' => 'Envoyez un lien privé, collectez fichiers et réponses dans une checklist guidée, et voyez tout de suite ce qui manque avant la revue par votre équipe.',
        'fr/xpressui' => 'Découvrez notre portail d’intake documentaire complet pour collecter et valider les fichiers clients sans relances manuelles.',
        'fr/xpressui-cloud' => 'Hébergez vos liens de workflow, catalogues, inbox, fichiers et revues d’opérations avec IntakeFlow Cloud PRO et ENTERPRISE.',
        'fr/pricing' => 'Découvrez nos tarifs et plans de souscription : IntakeFlow Free, Starter, ou Cloud à partir de €39/mois.',
        'fr/install' => 'Installez le plugin IntakeFlow sur votre site WordPress et mettez en ligne votre portail d’intake en moins de 10 minutes.',
        'fr/contact' => 'Contactez l’équipe d’IntakeFlow pour toute question ou pour configurer votre premier workflow client.',
        'fr/agency-pilot' => 'Bénéficiez de notre accompagnement agence pour cadrer, concevoir et mettre en ligne votre premier workflow client.',
        'fr/for-accountants' => 'Automatisez la collecte de documents comptables auprès de vos clients et réduisez le temps passé en relances.',
        'fr/for-agencies' => 'Intégrez des portails de collecte de documents premium dans vos livraisons de sites clients et simplifiez l’onboarding.',
        'fr/for-operations' => 'Pilotez l’ensemble des demandes clients depuis une inbox centralisée et standardisez vos processus d’onboarding.',
        'fr/document-intake' => 'Simplifiez la collecte de documents administratifs avec une checklist claire et guidée pour vos clients.',
        'fr/pro' => 'Passez à IntakeFlow Pro pour débloquer la personnalisation des workflows et l’accès complet au builder de portails.',
        'fr/purchase-confirmed' => 'Suivez ces étapes simples pour configurer votre licence IntakeFlow Pro et mettre en ligne votre premier portail.',
        'resources' => 'Access tutorials, default workflows, API documentation, and help resources for IntakeFlow.',
        'fr/resources' => 'Accédez aux tutoriels, aux workflows par défaut, à la documentation de l’API et aux ressources d’aide d’IntakeFlow.',
        'done-for-you' => 'Get your custom client portal fully designed, set up, and integrated under 7 days with our Done-For-You service.',
        'fr/done-for-you' => 'Confiez la création et l’intégration de votre portail client à nos experts. Votre système opérationnel clé en main en 7 jours.',
    );

    if ( isset( $desc_map[$path] ) ) {
        echo '<meta name="description" content="' . esc_attr( $desc_map[$path] ) . '">' . "\n";
    }
}
add_action( 'wp_head', 'iakpress_custom_seo_meta_description', 5 );

function iakpress_setup_theme(): void {
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'iakpress_setup_theme' );

function xpressui_arrow_svg( string $class = 'inline-block w-4 h-4 ml-1.5 align-middle stroke-current' ): string {
    return sprintf(
        '<svg class="%s" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" /></svg>',
        esc_attr( $class )
    );
}

function xpressui_arrow_left_svg( string $class = 'inline-block w-4 h-4 mr-1.5 align-middle stroke-current' ): string {
    return sprintf(
        '<svg class="%s" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>',
        esc_attr( $class )
    );
}

/**
 * Raw post content of the current page, read straight from the global $post.
 * More reliable than get_the_content() when called outside the loop (which can
 * return an empty string), and it returns the full body — including any shortcode
 * placed after a <!--more--> marker.
 */
function iakpress_current_page_content(): string {
    if ( isset( $GLOBALS['post'] ) && $GLOBALS['post'] instanceof WP_Post ) {
        return (string) $GLOBALS['post']->post_content;
    }
    return function_exists( 'get_the_content' ) ? (string) get_the_content() : '';
}

/**
 * Pull a hosted-link URL for the current language out of page content that
 * carries a shortcode such as
 *   [xpressui id="done-for-you" xpressui_contact_hosted_link_url_fr="…" xpressui_contact_hosted_link_url_en="…"]
 * Tries the current language first, then the other language, then a generic
 * attribute. Tolerant of spaces (incl. non-breaking) around '=' and of single,
 * double, or unquoted values. Returns '' when no matching attribute is present.
 */
function iakpress_extract_hosted_link_url_from_content( string $content, bool $is_french ): string {
    if ( $content === '' ) {
        return '';
    }
    // WordPress often stores the shortcode with HTML-encoded or "smart"/curly
    // quotes and non-breaking spaces, which would defeat the attribute regex.
    // Decode entities, straighten the quotes, and flatten odd spaces first.
    $normalized = html_entity_decode( $content, ENT_QUOTES, 'UTF-8' );
    $normalized = strtr( $normalized, array(
        "\u{201C}" => '"', "\u{201D}" => '"', "\u{201E}" => '"', "\u{00AB}" => '"', "\u{00BB}" => '"',
        "\u{2018}" => "'", "\u{2019}" => "'", "\u{201A}" => "'",
    ) );
    $normalized = preg_replace( '/[\x{00A0}\x{2007}\x{202F}]/u', ' ', $normalized );
    if ( ! is_string( $normalized ) ) {
        $normalized = $content;
    }
    $keys = $is_french
        ? array( 'xpressui_contact_hosted_link_url_fr', 'xpressui_contact_hosted_link_url_en', 'xpressui_contact_hosted_link_url' )
        : array( 'xpressui_contact_hosted_link_url_en', 'xpressui_contact_hosted_link_url_fr', 'xpressui_contact_hosted_link_url' );
    foreach ( $keys as $key ) {
        $pattern = '/' . preg_quote( $key, '/' ) . '\s*=\s*(?:"([^"]+)"|\'([^\']+)\'|([^\s\]"\']+))/u';
        if ( preg_match( $pattern, $normalized, $m ) ) {
            $value = '';
            foreach ( array( 1, 2, 3 ) as $group ) {
                if ( isset( $m[ $group ] ) && $m[ $group ] !== '' ) {
                    $value = $m[ $group ];
                    break;
                }
            }
            $value = trim( html_entity_decode( $value, ENT_QUOTES, 'UTF-8' ) );
            if ( $value !== '' ) {
                return $value;
            }
        }
    }

    return '';
}

/**
 * Resolve the contact hosted-link URL for the current language, ready to use as
 * a button href. Precedence: a shortcode in the page $content (if provided) wins,
 * then the per-language Customizer URL, then the generic one — and the same
 * `?start=1&lang=…` query args the contact page adds are appended. Returns ''
 * when nothing is configured. Shared by the contact and done-for-you pages so
 * their CTA buttons open the same hosted link.
 */
function iakpress_contact_hosted_launch_url( bool $is_french, string $content = '' ): string {
    $url = iakpress_extract_hosted_link_url_from_content( $content, $is_french );
    // Per-page custom field, mirroring the contact page's options.
    if ( $url === '' && function_exists( 'get_the_ID' ) ) {
        $page_id = (int) get_the_ID();
        if ( $page_id > 0 ) {
            $url = trim( (string) get_post_meta(
                $page_id,
                $is_french ? 'xpressui_contact_hosted_link_url_fr' : 'xpressui_contact_hosted_link_url_en',
                true
            ) );
            if ( $url === '' ) {
                $url = trim( (string) get_post_meta( $page_id, 'xpressui_contact_hosted_link_url', true ) );
            }
        }
    }
    if ( $url === '' ) {
        $url = trim( (string) get_theme_mod(
            $is_french ? 'xpressui_contact_hosted_link_url_fr' : 'xpressui_contact_hosted_link_url_en',
            ''
        ) );
    }
    if ( $url === '' ) {
        $url = trim( (string) get_theme_mod( 'xpressui_contact_hosted_link_url', '' ) );
    }
    $url = esc_url_raw( trim( html_entity_decode( $url, ENT_QUOTES, 'UTF-8' ) ) );
    if ( $url === '' ) {
        return '';
    }

    return esc_url_raw( add_query_arg(
        array( 'start' => '1', 'lang' => $is_french ? 'fr' : 'en' ),
        $url
    ) );
}

/**
 * Customizer: the per-language hosted-link URLs opened by the contact page's
 * "Démarrer le brief" / "Start the brief" button. Set both once here; the FR
 * page (/fr/contact/) uses the French URL and the EN page (/contact/) the
 * English one. These take precedence over any generic field or in-content URL.
 */
function iakpress_register_contact_customizer( WP_Customize_Manager $wp_customize ): void {
    $wp_customize->add_section( 'iakpress_contact', array(
        'title'    => 'IntakeFlow — Contact hosted links',
        'priority' => 160,
    ) );

    $controls = array(
        'xpressui_contact_hosted_link_url_fr' => array(
            'label'       => 'Hosted link URL (French)',
            'description' => 'Opened by the "Démarrer le brief" button on /fr/contact/.',
        ),
        'xpressui_contact_hosted_link_url_en' => array(
            'label'       => 'Hosted link URL (English)',
            'description' => 'Opened by the "Start the brief" button on /contact/.',
        ),
    );

    foreach ( $controls as $setting_id => $meta ) {
        $wp_customize->add_setting( $setting_id, array(
            'default'           => '',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        ) );
        $wp_customize->add_control( $setting_id, array(
            'label'       => $meta['label'],
            'description' => $meta['description'],
            'section'     => 'iakpress_contact',
            'type'        => 'url',
            'input_attrs' => array( 'placeholder' => 'https://app.intakeflow.dev/api/v1/hosted-links/…' ),
        ) );
    }
}
add_action( 'customize_register', 'iakpress_register_contact_customizer' );
