<?php
/**
 * Template for the /for-accountants/ segment page.
 */

$is_fr = function_exists('iakpress_is_french_request') && iakpress_is_french_request();

$segment_eyebrow       = $is_fr ? 'Sas de pré-collecte comptable'    : 'Accounting Pre-collection';
$segment_primary_cta   = $is_fr ? 'Créer mon portail cabinet'        : 'Create Cabinet Portal';
$segment_secondary_cta = $is_fr ? 'Voir les tarifs'                 : 'Compare pricing';

$segment_title = $is_fr
  ? "Vos clients ouvrent un lien. C'est tout."
  : "Your clients open a link. That’s it.";

$segment_intro = $is_fr
  ? "IntakeFlow est un sas de pré-collecte intelligente. Un lien de dépôt sécurisé sans mot de passe pour vos clients, un tableau de bord collaboratif pour vos collaborateurs. Gagnez jusqu'à 4 heures de traitement par dossier de clôture ou de TVA."
  : "IntakeFlow is a smart pre-collection gateway. A secure deposit link with no passwords for your clients, a collaborative dashboard for your staff. Save up to 4 hours of processing per closing or VAT file.";

$segment_pains = $is_fr ? [
  "L'enfer des relances par e-mail & SMS : vos collaborateurs passent 20 % de leur temps à chasser des pièces d'exceptions ou des justificatifs d'identité.",
  "Les fichiers corrompus et inexploitables : les clients envoient des photos WhatsApp floues ou des formats incompatibles (HEIC) qui font planter vos outils d'OCR.",
  "L'éparpillement des documents : des pièces perdues dans des boîtes mails individuelles, des dossiers Drive partagés en désordre et aucun moyen de savoir quel dossier est complet.",
] : [
  'The email & SMS chasing loop: your team spends 20% of their time chasing exception documents, statement files, or shareholder IDs.',
  'Corrupt and unreadable files: clients send blurry WhatsApp photos or incompatible formats (HEIC) that crash your OCR tools.',
  'Scattered document chaos: files lost in individual inboxes, disorganized shared drives, and no clear way to know which file is complete.',
];

$segment_workflow = $is_fr ? [
  'title' => "Un sas de pré-collecte intelligent et répétable pour vos dossiers.",
  'steps' => [
    ['title' => '1. Le Lien Privé (Sans Login)',   'body' => "Votre client reçoit son lien unique de dépôt. Pas d'application à installer, aucun compte ni mot de passe à retenir. L'adoption est immédiate."],
    ['title' => '2. Le Sas de Validation',         'body' => "IntakeFlow vérifie instantanément la conformité du document (format lisible, taille, complétude). Le client est invité à corriger avant soumission."],
    ['title' => '3. L\'Inbox Collaborative',       'body' => "Toutes les pièces arrivent propres et structurées dans votre tableau de bord. Assignez les dossiers aux collaborateurs et gérez les statuts."],
  ],
] : [
  'title' => 'A repeatable, smart pre-collection gateway for your files.',
  'steps' => [
    ['title' => '1. The Private Link (No Login)', 'body' => 'Your client receives a unique deposit link. No apps to install, no passwords to remember. Immediate adoption.'],
    ['title' => '2. The Validation Gate',         'body' => 'IntakeFlow instantly verifies document compliance (valid format, size, completeness). Clients correct before submitting.'],
    ['title' => '3. The Collaborative Inbox',     'body' => 'All documents arrive clean and structured. Assign files to specific team members and manage workflow statuses.'],
  ],
];

$segment_proofs = $is_fr ? [
  ['title' => 'Justificatifs d\'exceptions',   'body' => "Justificatifs d'achats étrangers (hors UE), notes de frais, reçus de repas et factures d'exception."],
  ['title' => 'Clôtures de TVA',               'body' => "Justificatifs de ventes, relevés spécifiques et justificatifs de virement bancaire."],
  ['title' => 'Onboarding nouveau client',     'body' => "Kbis, statuts juridiques, pièces d'identité des associés, RIBs et mandats signés."],
  ['title' => 'Clôture annuelle & Bilan',      'body' => "Documents justificatifs de fin d'année, contrats de prêts, états des stocks et commentaires de revue."],
] : [
  ['title' => 'Exception justification',       'body' => 'Foreign purchase documents (non-EU), expense reports, meal receipts, and exception invoices.'],
  ['title' => 'VAT returns',                   'body' => 'Sales receipts, specific statements, and bank transfer documents.'],
  ['title' => 'New client onboarding',         'body' => 'Kbis, corporate statutes, shareholder IDs, bank details, and signed mandates.'],
  ['title' => 'Annual returns & audits',       'body' => 'Year-end supporting documents, loan agreements, inventory status, and review comments.'],
];

$segment_offer = $is_fr ? [
  'title' => 'Un package adapté aux besoins de votre cabinet.',
  'body'  => "IntakeFlow propose des abonnements fixes sans facturation agressive au contact ou à la réponse.",
  'items' => [
    'Plan Cabinet Starter à 49 €/mois (5 collaborateurs inclus, logo personnalisé)',
    'Plan Cabinet Pro à 99 €/mois (15 collaborateurs, whitelabel complet)',
    'Sas de validation dynamique de conformité des fichiers à la source',
    'Option 100% Autonome (Self-Hosted) pour héberger vos données clients sur votre site',
  ],
] : [
  'title' => "A package tailored to your firm's needs.",
  'body'  => 'IntakeFlow offers fixed pricing with no aggressive contact-based or response-based billing.',
  'items' => [
    'Cabinet Starter Plan at €49/month (5 users included, custom logo)',
    'Cabinet Pro Plan at €99/month (15 users, complete white-labeling)',
    'Dynamic file compliance validation at the source',
    '100% Self-Hosted option to store client documents on your own site',
  ],
];

$segment_outbound = $is_fr
  ? "Bonjour [Prénom],\n\nLa facture électronique va automatiser les flux standards, mais elle va laisser de côté toutes les pièces d'exceptions qui surchargent vos boîtes mails (notes de frais, reçus, imports étrangers).\n\nIntakeFlow résout ce problème avec un portail de dépôt sans mot de passe pour vos clients et une inbox collaborative d'équipe pour vos collaborateurs.\n\nSeriez-vous ouvert à une démonstration de 10 minutes cette semaine pour voir comment gagner jusqu'à 4 heures par dossier ?"
  : "Hi [Name],\n\nE-invoicing will automate standard flows, but it will leave out all exception documents that overload your inbox (expense reports, receipts, foreign imports).\n\nIntakeFlow solves this with a passwordless client portal and a collaborative team inbox for your staff.\n\nWould you be open to a 10-minute demo this week to see how to save up to 4 hours per file?";

$segment_use_cases = $is_fr ? [
  ['title' => 'Intake documentaire mensuel',       'body' => "Collectez factures, reçus, relevés et notes pour la période active."],
  ['title' => 'Préparation de la déclaration TVA', 'body' => "Rassemblez les justificatifs requis et signalez les preuves manquantes ou invalides avant la revue."],
  ['title' => 'Onboarding nouveau client',         'body' => "Standardisez les coordonnées client, les documents KYC, les mandats et le contexte initial."],
] : [
  ['title' => 'Monthly document intake',           'body' => 'Collect invoices, receipts, statements, and notes for the active period.'],
  ['title' => 'VAT return preparation',            'body' => 'Gather required supporting evidence and flag missing or invalid proofs before review.'],
  ['title' => 'New client onboarding',             'body' => 'Standardize client details, KYC-style documents, mandates, and initial context.'],
];

require get_stylesheet_directory() . '/template-parts/segment-landing.php';
