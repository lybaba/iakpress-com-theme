<?php
/**
 * Template for the /for-agencies/ segment page.
 */

$is_fr = function_exists('iakpress_is_french_request') && iakpress_is_french_request();

$segment_eyebrow       = $is_fr ? 'Pour les agences'        : 'For agencies';
$segment_primary_cta   = $is_fr ? 'Cadrer un pilote agence'  : 'Scope an agency pilot';
$segment_secondary_cta = $is_fr ? 'Voir les tarifs'          : 'Compare pricing';

$segment_title = $is_fr
  ? "Transformez un intake client désorganisé en offre de livraison répétable."
  : 'Turn messy client intake into a repeatable delivery offer.';

$segment_intro = $is_fr
  ? "XPressUI aide les agences à lancer des portails documentaires, des demandes de service, des commandes catalogue et une revue opérateur sans créer un backend sur mesure pour chaque projet client."
  : 'XPressUI helps agencies launch document portals, service request flows, catalog orders, and operator review without building a custom backend for every client project.';

$segment_pains = $is_fr ? [
  "Les clients envoient briefs, assets, validations et fichiers par des canaux dispersés.",
  "Chaque nouveau projet commence par le même setup d'intake manuel.",
  "Les agences perdent leur marge quand les workflows opérationnels deviennent du travail backend sur mesure.",
  "Les sites clients ont besoin d'un intake professionnel sans imposer un nouveau login SaaS.",
] : [
  'Clients send briefs, assets, approvals, and files through scattered channels.',
  'Every new project starts with the same manual intake setup.',
  'Agencies lose margin when operational workflows become custom backend work.',
  'Client sites need professional intake without forcing a new SaaS login.',
];

$segment_workflow = $is_fr ? [
  'title' => "Une offre de workflow productisée que les agences peuvent revendre.",
  'steps' => [
    ['title' => 'Choisir un workflow client',    'body' => "Intake documentaire, demande de réservation, devis, commande catalogue ou revue de validation."],
    ['title' => 'Lancer une livraison brandée',  'body' => "Déployez des liens hébergés ou des pages sur site client avec branding workflow et routage des soumissions."],
    ['title' => 'Packager le modèle',            'body' => "Transformez le flux opérationnel en template réutilisable pour des clients similaires."],
  ],
] : [
  'title' => 'A productized workflow offer agencies can resell.',
  'steps' => [
    ['title' => 'Pick one client workflow',   'body' => 'Document intake, reservation request, quote request, catalog order, or approval review.'],
    ['title' => 'Launch branded delivery',    'body' => 'Deploy hosted links or client-site pages with workflow branding and submission routing.'],
    ['title' => 'Package the pattern',        'body' => 'Turn the working flow into a reusable template for similar clients.'],
  ],
];

$segment_proofs = $is_fr ? [
  ['title' => 'Briefs projet',      'body' => "Réponses de découverte structurées, objectifs, contraintes et assets dans une soumission."],
  ['title' => 'Fichiers clients',   'body' => "Fichiers de marque, documents, références, PDFs, photos et justificatifs."],
  ['title' => 'Données catalogue',  'body' => "Produits, services, prix, dates, options et choix importés en CSV."],
  ['title' => 'Décisions de revue', 'body' => "Notes opérateur, statuts et contexte de suivi pour chaque soumission."],
] : [
  ['title' => 'Project briefs',    'body' => 'Structured discovery answers, goals, constraints, and assets in one submission.'],
  ['title' => 'Client files',      'body' => 'Brand files, documents, references, PDFs, photos, and supporting evidence.'],
  ['title' => 'Catalog inputs',    'body' => 'Products, services, prices, dates, options, and CSV-imported choices.'],
  ['title' => 'Review decisions',  'body' => 'Operator notes, statuses, and follow-up context for each submission.'],
];

$segment_offer = $is_fr ? [
  'title' => "Vendez un workflow en premier, puis réutilisez-le.",
  'body'  => "Utilisez le premier pilote pour valider la demande, puis ajoutez le workflow à votre menu de livraison agence.",
  'items' => [
    "Configuration workflow hébergé à partir de €299",
    "Livraison sur site client à partir de €790",
    "XPressUI Pro pour la livraison sur site possédé",
    "Cloud Team ou Agency pour les opérations répétables",
  ],
] : [
  'title' => 'Sell one workflow first, then reuse it.',
  'body'  => 'Use the first pilot to validate demand, then add the workflow to your agency delivery menu.',
  'items' => [
    'Hosted workflow setup from €299',
    'Client-site delivery from €790',
    'XPressUI Pro for owned-site delivery',
    'Cloud Team or Agency for repeatable operations',
  ],
];

$segment_outbound = $is_fr
  ? "Les agences reconstruisent souvent les mêmes workflows d'intake et de revue client encore et encore.\n\nXPressUI vous permet de lancer d'abord un workflow brandé, puis d'en faire un produit de livraison réutilisable : intake documentaire, commandes catalogue, réservations ou revue opérateur.\n\nSi un workflow client est déjà douloureux, nous pouvons cadrer un petit pilote payant autour de lui."
  : "Agencies often rebuild the same client intake and review workflows again and again.\n\nXPressUI lets you launch one branded workflow first, then turn it into a reusable delivery product: document intake, catalog orders, reservations, or operator review.\n\nIf one client workflow is already painful, we can scope a small paid pilot around it.";

$segment_use_cases = $is_fr ? [
  ['title' => "Portail d'onboarding client",    'body' => "Collectez briefs, fichiers, validations et informations manquantes avant le démarrage de la production."],
  ['title' => 'Workflow de commande catalogue', 'body' => "Permettez aux clients de publier produits, services, prix et demandes basées sur des dates sans code sur mesure."],
  ['title' => 'Bureau de revue',                'body' => "Routez les soumissions vers une inbox opérateur avec statuts, notes et justificatifs exportables."],
] : [
  ['title' => 'Client onboarding portal', 'body' => 'Collect briefs, files, approvals, and missing information before production starts.'],
  ['title' => 'Catalog order workflow',   'body' => 'Let clients publish products, services, prices, and date-driven requests without custom code.'],
  ['title' => 'Review desk',              'body' => 'Route submissions to an operator inbox with statuses, notes, and exportable evidence.'],
];

require get_stylesheet_directory() . '/template-parts/segment-landing.php';
