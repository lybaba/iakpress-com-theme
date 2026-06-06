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

    $cookie_path = defined( 'COOKIEPATH' ) && COOKIEPATH ? COOKIEPATH : '/';
    $cookie_domain = defined( 'COOKIE_DOMAIN' ) && COOKIE_DOMAIN ? COOKIE_DOMAIN : '';
    setcookie( 'iakpress_lang', $requested_language, time() + YEAR_IN_SECONDS, $cookie_path, $cookie_domain, is_ssl(), true );
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
        'Download latest release on GitHub' => 'Télécharger la dernière version sur GitHub',
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
        'Cloud starts at €19/month' => 'Cloud commence à 19€ /mois',
        'Use IntakeFlow Cloud when the workflow needs shared operations, not another site admin.' => 'Utilisez IntakeFlow Cloud quand le workflow a besoin d’opérations partagées, pas d’un autre admin de site.',

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
        'IntakeFlow Free · IntakeFlow Starter per site · IntakeFlow Cloud from €39/month' => 'IntakeFlow Free · IntakeFlow Starter par site · IntakeFlow Cloud à partir de 39 €/mois',
        'Done For You setup' => 'Configuration effectuée pour vous',
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
        'If the buyer is still comparing paths, scope one real workflow first. Hosted pilots start from €299 setup; client-site delivery starts from €790 setup.' => 'Si l’acheteur compare encore les chemins possibles, cadrez d’abord un vrai workflow. Les pilotes hébergés commencent à 299 € de configuration ; la livraison sur site client commence à 790 € de configuration.',
        'Positioning strip' => 'Positionnement',
        'Validate the portal on a client site' => 'Valider le portail sur un site client',
        'Ship production workflows on client sites' => 'Livrer des workflows de production sur sites clients',
        'Start one workflow' => 'Démarrer un workflow',
        'Most useful after first signal' => 'Le plus utile après les premiers signaux',
        'For repeatable client delivery' => 'Pour une livraison client répétable',

        'Get one branded hosted intake live from €299 setup, including operator email and a generated document summary.' => 'Mettez en ligne un intake hébergé et personnalisé à partir de 299€, avec email opérateur et résumé de document généré.',
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
        'GitHub download' => 'Téléchargement GitHub',
        'IntakeFlow client-site plugin' => 'Plugin IntakeFlow côté site client',
        'Bundled document intake workflow' => 'Workflow d’intake documentaire inclus',
        'Custom workflow ZIP installation' => 'Installation de workflows personnalisés en ZIP',
        'Submission inbox and file uploads on the client site' => 'Inbox de soumissions et uploads de fichiers sur le site client',
        'Best value' => 'Meilleure valeur',
        'Best for agencies and teams that need custom, repeatable document portals on client sites.' => 'Idéal pour les agences et équipes qui ont besoin de portails documentaires personnalisés et répétables sur des sites clients.',
        'one-time' => 'paiement unique',
        'Starter plan · per site · updates included' => 'Plan Starter · par site · mises à jour incluses',
        'Everything in IntakeFlow Free' => 'Tout ce qui est dans IntakeFlow Free',
        'Customize Workflow — labels, choices, colors, and messages per workflow from the client-site admin' => 'Customize Workflow : libellés, choix, couleurs et messages par workflow depuis l’admin du site client',
        'Console Sync for direct workflow pull' => 'Console Sync pour récupérer directement les workflows',
        'Advanced fields including QR and document scan' => 'Champs avancés incluant QR et scan de document',
        'Priority email support and automatic updates' => 'Support email prioritaire et mises à jour automatiques',
        'Let IntakeFlow run hosted operations' => 'Laisser IntakeFlow gérer les opérations hébergées',
        'Best when the client does not want client-site operations, or when your team needs shared review, quotas, audit, and file handling in Console.' => 'Idéal quand le client ne veut pas d’opérations sur son site, ou quand votre équipe a besoin de revue partagée, quotas, audit et gestion des fichiers dans la Console.',
        '/month' => '/mois',
        'Cloud PRO at €39/month · Cloud ENTERPRISE available' => 'Cloud PRO à 39 €/mois · Cloud ENTERPRISE disponible',
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
        'IntakeFlow Starter is for running repeatable intake outcomes, not just publishing one form.' => 'IntakeFlow Starter sert à produire des résultats d’intake répétables, pas seulement à publier un formulaire.',
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
        '€99/year' => '99 €/an',
        '€39/mo' => '39 €/mois',
        'from €790' => 'à partir de 790 €',
        'from €299' => 'à partir de 299 €',
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
        'IntakeFlow Starter adds Customize Workflow (edit labels, choice labels, colors, messages, and validation rules per workflow directly from the client-site admin), Console Sync, specialized runtime features, automatic updates, and the license per site.' => 'IntakeFlow Starter ajoute Customize Workflow (édition des libellés, choix, couleurs, messages et règles de validation par workflow directement depuis l’admin du site client), Console Sync, des fonctions runtime spécialisées, les mises à jour automatiques et la licence par site.',
        'Where do dynamic catalogs fit?' => 'À quoi servent les catalogues dynamiques ?',
        'Catalogs are the strongest Cloud feature: products, prices, service slots, dates, and member lists can be reused across workflows instead of being hardcoded into static request pages. IntakeFlow Starter can integrate Cloud catalogs when needed, but product catalogs are not exported as portable PHP.' => 'Les catalogues sont l’un des points forts de Cloud : produits, prix, créneaux, dates et listes de membres peuvent être réutilisés entre workflows au lieu d’être codés en dur dans des pages de demande statiques. IntakeFlow Starter peut intégrer les catalogues Cloud si nécessaire, mais les catalogues produit ne sont pas exportés en PHP portable.',
        'Where does IntakeFlow Cloud fit?' => 'Où se place IntakeFlow Cloud ?',
        'IntakeFlow Cloud is for teams that want IntakeFlow to host the public workflow link, submission inbox, files, quotas, catalogs, and operator review instead of running the operations layer on client sites. Cloud PRO starts at €39/month, and Cloud ENTERPRISE is €149/month.' => 'IntakeFlow Cloud s’adresse aux équipes qui veulent que IntakeFlow héberge le lien public du workflow, l’inbox, les fichiers, quotas, catalogues et revue opérateur au lieu d’exécuter la couche opérationnelle sur les sites clients. Cloud PRO commence à 39 €/mois, et Cloud ENTERPRISE est à 149 €/mois.',
        'Can you set up the first workflow for us?' => 'Pouvez-vous configurer le premier workflow pour nous ?',
        'Yes. Done For You setup starts at €299 for a hosted workflow and from €790 for client-site delivery. It is the fastest way to get the first workflow live and reusable.' => 'Oui. La Configuration effectuée pour vous démarre à 299 € pour un workflow hébergé et à partir de 790 € pour une livraison sur site client. C’est le chemin le plus rapide pour obtenir un premier workflow en ligne et réutilisable.',
        'Is €99/year a subscription?' => 'Les 99 €/an sont-ils un abonnement ?',
        'Yes. It is a yearly subscription per site, which includes all updates, Visual Builder access, and client-site runtime features.' => 'Oui. Il s’agit d’un abonnement annuel par site, qui comprend toutes les mises à jour, l’accès au Visual Builder et les fonctionnalités du runtime côté client.',
        'Who is IntakeFlow Starter for?' => 'À qui s’adresse IntakeFlow Starter ?',
        'IntakeFlow Starter is built for accounting firms and agencies that need repeatable client document intake with less back-and-forth.' => 'IntakeFlow Starter est conçu pour les cabinets comptables et agences qui ont besoin d’un intake documentaire client répétable avec moins d’allers-retours.',
        'Do you offer a larger agency plan?' => 'Proposez-vous un plan agence plus large ?',
        'Yes. Larger teams can move toward IntakeFlow Cloud, higher quotas, team workspace access, and managed rollout. The current Starter plan is the fastest client-site path today.' => 'Oui. Les équipes plus larges peuvent évoluer vers IntakeFlow Cloud, des quotas plus élevés, l’accès workspace en équipe et un déploiement managé. L’offre Starter actuelle reste le chemin site client le plus rapide aujourd’hui.',
        'Can I use it on client sites?' => 'Puis-je l’utiliser sur des sites clients ?',
        'Yes. The Starter license covers one production client site per subscription, which makes it practical for client delivery and internal use.' => 'Oui. La licence Starter couvre un site client de production par abonnement, ce qui la rend adaptée à la livraison client et à l’usage interne.',
        'What if it is not a fit?' => 'Et si ce n’est pas adapté ?',
        'You are covered by a 30-day money-back guarantee. If it does not fit your workflow, email hello@iakpress.com within 30 days.' => 'Vous êtes couvert par une garantie satisfait ou remboursé de 30 jours. Si cela ne convient pas à votre workflow, envoyez un email à hello@iakpress.com sous 30 jours.',
        'Ready to build?' => 'Prêt à construire ?',
        'Use IntakeFlow Free today. Upgrade when your team needs repeatable intake at speed.' => 'Utilisez IntakeFlow Free aujourd’hui. Passez à la suite quand votre équipe a besoin d’un intake répétable et rapide.',
        'If you just want to test the experience, start free. If you want to build custom client portals you can reuse and sell, Pro is the right move.' => 'Si vous voulez simplement tester l’expérience, commencez gratuitement. Si vous voulez créer des portails clients personnalisés que vous pouvez réutiliser et vendre, Pro is the right move.',
        'Direct Pro sales are temporarily paused while IntakeFlow Free is being validated by WordPress.org.' => 'Les ventes directes Pro sont temporairement en pause pendant la validation de IntakeFlow Free par WordPress.org.',

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
        'from €299 for one workflow.' => 'à partir de 299 € pour un workflow.',
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
        'IntakeFlow is easiest to sell when the buyer already feels the pain: missing files, outdated lists, unclear requests, or schedule changes.' => 'IntakeFlow se vend plus facilement quand l’acheteur ressent déjà la douleur : fichiers manquants, listes obsolètes, demandes floues ou changements de planning.',
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
        'Done For You' => 'Done For You',
        'Want the first workflow live quickly?' => 'Vous voulez mettre le premier workflow en ligne rapidement ?',
        'We can configure the first workflow with you, test it, and leave you with a reusable pattern for the next client or service.' => 'Nous pouvons configurer le premier workflow avec vous, le tester, et vous laisser un modèle réutilisable pour le prochain client ou service.',
        'Hosted workflow setup' => 'Configuration workflow hébergé',
        'from €299 setup' => 'à partir de 299 € de configuration',
        'We configure one branded hosted workflow with operator email and a generated document summary.' => 'Nous configurons un workflow hébergé brandé avec email opérateur et résumé de document généré.',
        'Client-site delivery' => 'Livraison sur site client',
        'from €790 setup' => 'à partir de 790 € de configuration',
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
        'Discuss Cloud plan →' => 'Discuter du plan Cloud →',
        'Questions people ask before trying it.' => 'Questions fréquentes avant d’essayer.',
        'What is IntakeFlow?' => 'Qu’est-ce que IntakeFlow ?',
        'IntakeFlow is a client intake portal system: private links, guided document upload, dynamic choices, and operator review in one delivery path.' => 'IntakeFlow est un système de portail d’intake client : liens privés, upload documentaire guidé, choix dynamiques et revue opérateur dans un même chemin de livraison.',
        'Can I start for free?' => 'Puis-je commencer gratuitement ?',
        'Yes. IntakeFlow Free includes the client-site runtime, a bundled document intake workflow, and custom workflow ZIP installation so you can test the setup on a real site.' => 'Oui. IntakeFlow Free inclut le runtime côté site client, un workflow d’intake documentaire inclus et l’installation de workflows ZIP personnalisés pour tester sur un vrai site.',
        'What is IntakeFlow Starter?' => 'Qu’est-ce que IntakeFlow Starter ?',
        'IntakeFlow Starter is the fastest path to production today: plugin install, workflow setup, and submission review directly in the client-site admin.' => 'IntakeFlow Starter est aujourd’hui le chemin le plus rapide vers la production : installation du plugin, configuration du workflow et revue des soumissions directement dans l’admin du site client.',
        'What is IntakeFlow Cloud?' => 'Qu’est-ce que IntakeFlow Cloud ?',
        'IntakeFlow Cloud is the next delivery path for teams that want IntakeFlow to host the public workflow link, submissions inbox, files, catalogs, and operator review outside a client site. Cloud PRO starts at €39/month, and Cloud ENTERPRISE is €149/month.' => 'IntakeFlow Cloud est le chemin suivant pour les équipes qui veulent que IntakeFlow héberge le lien public du workflow, l’inbox de soumissions, les fichiers, catalogues et revue opérateur hors du site client. Cloud PRO commence à 39 €/mois, et Cloud ENTERPRISE est à 149 €/mois.',
        'When should I get Starter?' => 'Quand passer à Starter ?',
        'Upgrade when you want advanced field types, Customize Workflow in the client-site admin, direct Console Sync, commercial updates, and the full Starter runtime.' => 'Passez à Starter quand vous voulez les champs avancés, Customize Workflow dans l’admin du site client, Console Sync direct, les mises à jour commerciales et le runtime Starter complet.',
        'Who is it for?' => 'À qui s’adresse IntakeFlow ?',
        'It fits agencies, operators, and service teams that repeatedly collect client files, briefs, and onboarding information.' => 'C’est adapté aux agences, opérateurs et équipes de service qui collectent régulièrement fichiers client, briefs et informations d’onboarding.',
        'Ready to launch your first intake portal?' => 'Prêt à lancer votre premier portail d’intake ?',
        'Ready to clean up onboarding?' => 'Prêt à clarifier l’onboarding ?',
        'Give your next client project a better start.' => 'Donnez un meilleur départ à votre prochain projet client.',
        'Start with IntakeFlow Free, then discuss the hosted or client-site path once the first workflow is clear.' => 'Commencez avec IntakeFlow Free, puis discutez du chemin hébergé ou site client une fois le premier workflow clarifié.',
        'Close' => 'Fermer',
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
