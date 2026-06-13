<?php
/**
 * Template for the /for-accountants/ segment page.
 */

$is_fr = function_exists('iakpress_is_french_request') && iakpress_is_french_request();

$segment_eyebrow       = $is_fr ? 'Pour les comptables'        : 'For accountants';
$segment_primary_cta   = $is_fr ? 'Cadrer un intake comptable'  : 'Scope an accounting intake';
$segment_secondary_cta = $is_fr ? 'Voir les tarifs'             : 'Compare pricing';

$segment_title = $is_fr
  ? "Collectez les documents clients sans courir après chaque pièce manquante."
  : 'Collect client documents without chasing every missing file.';

$segment_intro = $is_fr
  ? "XPressUI aide les équipes comptables à lancer un workflow structuré d'intake documentaire pour la comptabilité mensuelle, la TVA, les bilans annuels, l'onboarding et les justificatifs."
  : 'XPressUI helps accounting teams launch a structured document intake workflow for monthly bookkeeping, VAT, annual returns, onboarding, and supporting evidence.';

$segment_pains = $is_fr ? [
  "Les documents clients arrivent par email, drives partagés, messages et pièces jointes tardives.",
  "Les équipes perdent du temps à demander les factures, justificatifs d'identité, preuves de paiement ou relevés manquants.",
  "Chaque période commence avec la même checklist et les mêmes relances manuelles.",
  "Les responsables ont besoin d'une vue claire de ce qui est reçu, bloqué, revu et terminé.",
] : [
  'Client documents arrive across email, shared drives, messages, and late attachments.',
  'Teams lose time asking for missing invoices, IDs, payment proofs, or statements.',
  'Every period starts with the same checklist and the same manual reminders.',
  'Managers need a cleaner view of what is received, blocked, reviewed, and done.',
];

$segment_workflow = $is_fr ? [
  'title' => "Un bureau d'intake répétable pour chaque cycle comptable.",
  'steps' => [
    ['title' => 'Publier un lien client',          'body' => "Donnez à chaque client un workflow d'intake brandé pour la période récurrente."],
    ['title' => 'Collecter fichiers et réponses',   'body' => "Recevez factures, relevés bancaires, justificatifs d'identité, données de paie, preuves de paiement et notes dans une seule soumission."],
    ['title' => 'Revoir avec statut',               'body' => "Les opérateurs voient les dossiers nouveaux, bloqués, en revue et complétés sans fouiller dans les boîtes mail."],
  ],
] : [
  'title' => 'One repeatable intake desk for each accounting cycle.',
  'steps' => [
    ['title' => 'Publish one client link',   'body' => 'Give each client a branded intake workflow for the recurring period.'],
    ['title' => 'Collect files and answers', 'body' => 'Receive invoices, bank statements, IDs, payroll inputs, payment proofs, and notes in one submission.'],
    ['title' => 'Review with status',        'body' => 'Operators see new, blocked, reviewed, and completed submissions without digging through inboxes.'],
  ],
];

$segment_proofs = $is_fr ? [
  ['title' => 'Comptabilité mensuelle',     'body' => "Factures, relevés bancaires, reçus, notes sur les pièces manquantes et confirmation de période."],
  ['title' => 'Préparation TVA',            'body' => "Justificatifs de vente, fichiers d'achat, preuve de paiement et notes d'exception."],
  ['title' => 'Onboarding client',          'body' => "Coordonnées de l'entreprise, justificatifs, mandats, données bancaires et documents signés."],
  ['title' => 'Collecte du dossier annuel', 'body' => "Documents justificatifs de fin d'année, confirmations, exports et commentaires de revue."],
] : [
  ['title' => 'Monthly bookkeeping',    'body' => 'Invoices, bank statements, receipts, missing-file notes, and period confirmation.'],
  ['title' => 'VAT preparation',        'body' => 'Sales evidence, purchase files, proof of payment, and exception notes.'],
  ['title' => 'Client onboarding',      'body' => 'Company details, IDs, mandates, bank info, and signed documents.'],
  ['title' => 'Annual file collection', 'body' => 'Year-end supporting documents, confirmations, exports, and review comments.'],
];

$segment_offer = $is_fr ? [
  'title' => 'Commencez par un workflow client.',
  'body'  => "Lancez d'abord un processus lourd en documents, puis décidez s'il doit devenir le schéma d'intake standard pour d'autres clients.",
  'items' => [
    'Configuration workflow hébergé à partir de €299',
    'Livraison sur site client à partir de €790',
    'Cloud Team pour la revue opérateur partagée',
    'Templates de workflow réutilisables pour les périodes récurrentes',
  ],
] : [
  'title' => 'Start with one client workflow.',
  'body'  => 'Launch one document-heavy process first, then decide whether it should become the standard intake pattern for more clients.',
  'items' => [
    'Hosted workflow setup from €299',
    'Client-site delivery from €790',
    'Cloud Team for shared operator review',
    'Reusable workflow templates for recurring periods',
  ],
];

$segment_outbound = $is_fr
  ? "Les équipes comptables perdent souvent des heures à collecter les mêmes documents clients manquants chaque mois.\n\nXPressUI transforme une checklist récurrente en workflow d'intake brandé avec fichiers, statuts et revue opérateur.\n\nSi un workflow mensuel ou TVA est déjà douloureux, nous pouvons cadrer un petit pilote payant autour de lui."
  : "Accounting teams often lose hours collecting the same missing client documents every month.\n\nXPressUI turns one recurring checklist into a branded intake workflow with files, statuses, and operator review.\n\nIf one monthly or VAT workflow is already painful, we can scope a small paid pilot around it.";

$segment_use_cases = $is_fr ? [
  ['title' => 'Intake documentaire mensuel',       'body' => "Collectez factures, reçus, relevés et notes pour la période active."],
  ['title' => 'Préparation de la déclaration TVA', 'body' => "Rassemblez les justificatifs requis et signalez les preuves manquantes ou invalides avant la revue."],
  ['title' => 'Onboarding nouveau client',         'body' => "Standardisez les coordonnées client, les documents KYC, les mandats et le contexte initial."],
] : [
  ['title' => 'Monthly document intake', 'body' => 'Collect invoices, receipts, statements, and notes for the active period.'],
  ['title' => 'VAT return preparation',  'body' => 'Gather required supporting evidence and flag missing or invalid proofs before review.'],
  ['title' => 'New client onboarding',   'body' => 'Standardize client details, KYC-style documents, mandates, and initial context.'],
];

require get_stylesheet_directory() . '/template-parts/segment-landing.php';
