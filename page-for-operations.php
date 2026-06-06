<?php
/**
 * Template for the /for-operations/ segment page.
 */

$is_fr = function_exists('iakpress_is_french_request') && iakpress_is_french_request();

$segment_eyebrow       = $is_fr ? 'Pour les opérations'          : 'For operations';
$segment_primary_cta   = $is_fr ? 'Cadrer un pilote opérations'   : 'Scope an operations pilot';
$segment_secondary_cta = $is_fr ? 'Voir les tarifs'               : 'Compare pricing';

$segment_title = $is_fr
  ? "Remplacez les relances manuelles par un workflow structuré de collecte et de revue."
  : 'Replace manual follow-up with a structured collection and review workflow.';

$segment_intro = $is_fr
  ? "IntakeFlow aide les équipes opérations à lancer des workflows d'intake structurés pour les demandes internes, les approbations, les collectes de preuves et la coordination entre services."
  : 'IntakeFlow helps operations teams launch structured intake workflows for internal requests, approvals, evidence collection, and cross-team coordination.';

$segment_pains = $is_fr ? [
  "Les demandes internes arrivent par email, messages, formulaires ad hoc et fichiers partagés.",
  "Les approbations et validations se perdent dans les fils de discussion sans statut clair.",
  "Chaque processus récurrent recommence avec le même setup manuel et les mêmes relances.",
  "Les responsables n'ont pas de vue consolidée sur ce qui est en attente, bloqué ou terminé.",
] : [
  'Internal requests arrive through email, messages, ad hoc forms, and shared files.',
  'Approvals and sign-offs get lost in threads with no clear status.',
  'Every recurring process restarts with the same manual setup and the same follow-up.',
  'Managers have no consolidated view of what is pending, blocked, or done.',
];

$segment_workflow = $is_fr ? [
  'title' => "Un guichet d'intake répétable pour chaque processus opérationnel.",
  'steps' => [
    ['title' => 'Définir le workflow',     'body' => "Choisissez le type de demande : intake documentaire, approbation, signalement, commande interne ou collecte de preuves."],
    ['title' => 'Collecter et structurer', 'body' => "Recevez fichiers, réponses, justificatifs et métadonnées dans une soumission consultable par les opérateurs."],
    ['title' => 'Traiter avec statut',     'body' => "Suivez chaque dossier de la réception à la clôture avec des statuts clairs et des notes d'opérateur."],
  ],
] : [
  'title' => 'One repeatable intake desk for each operational process.',
  'steps' => [
    ['title' => 'Define the workflow',   'body' => 'Pick the request type: document intake, approval, report, internal order, or evidence collection.'],
    ['title' => 'Collect and structure', 'body' => 'Receive files, answers, supporting proofs, and metadata in one reviewable submission.'],
    ['title' => 'Process with status',   'body' => 'Track each dossier from receipt to closure with clear statuses and operator notes.'],
  ],
];

$segment_proofs = $is_fr ? [
  ['title' => 'Demandes internes',          'body' => "Formulaires de demande structurés avec pièces jointes, justificatifs et contexte pour les équipes concernées."],
  ['title' => "Flux d'approbation",         'body' => "Soumissions à valider avec preuves, notes de décision et traçabilité des statuts."],
  ['title' => 'Collecte de preuves',        'body' => "Photos, PDFs, captures, relevés et documents de conformité rassemblés en une seule soumission."],
  ['title' => 'Coordination inter-équipes', 'body' => "Handoffs structurés entre équipes avec contexte, fichiers et statut de progression visibles."],
] : [
  ['title' => 'Internal requests',       'body' => 'Structured request forms with attachments, supporting evidence, and context for relevant teams.'],
  ['title' => 'Approval flows',          'body' => 'Submissions to sign off on, with proofs, decision notes, and status traceability.'],
  ['title' => 'Evidence collection',     'body' => 'Photos, PDFs, screenshots, statements, and compliance documents gathered in one submission.'],
  ['title' => 'Cross-team coordination', 'body' => 'Structured handoffs between teams with context, files, and visible progress status.'],
];

$segment_offer = $is_fr ? [
  'title' => "Commencez par le processus le plus douloureux.",
  'body'  => "Lancez d'abord le workflow le plus répétitif ou le plus manuel, puis décidez s'il doit devenir le schéma standard pour d'autres processus.",
  'items' => [
    "Configuration workflow hébergé à partir de 299 €",
    "Livraison sur site interne à partir de 790 €",
    "Cloud Team pour la revue opérateur partagée",
    "Templates de workflow réutilisables pour les processus récurrents",
  ],
] : [
  'title' => 'Start with the most painful process.',
  'body'  => 'Launch the most repetitive or manual workflow first, then decide whether it should become the standard pattern for more processes.',
  'items' => [
    'Hosted workflow setup from 299 EUR',
    'Internal-site delivery from 790 EUR',
    'Cloud Team for shared operator review',
    'Reusable workflow templates for recurring processes',
  ],
];

$segment_outbound = $is_fr
  ? "Les équipes opérations passent souvent des heures à relancer les mêmes demandes internes chaque semaine.\n\nIntakeFlow transforme un processus récurrent en workflow structuré avec fichiers, statuts et revue opérateur.\n\nSi une demande interne ou un flux d'approbation est déjà douloureux, nous pouvons cadrer un petit pilote payant autour de lui."
  : "Operations teams often spend hours chasing the same internal requests every week.\n\nIntakeFlow turns one recurring process into a structured workflow with files, statuses, and operator review.\n\nIf one internal request or approval flow is already painful, we can scope a small paid pilot around it.";

$segment_use_cases = $is_fr ? [
  ['title' => "Intake de demandes internes",       'body' => "Collectez et traitez les demandes répétitives avec fichiers, contexte et statut de progression."],
  ['title' => "Workflow d'approbation",            'body' => "Structurez les validations avec preuves, notes de décision et traçabilité pour audit."],
  ['title' => "Collecte de preuves de conformité", 'body' => "Rassemblez documents, photos et justificatifs requis dans des soumissions consultables par les responsables."],
] : [
  ['title' => 'Internal request intake',        'body' => 'Collect and process repetitive requests with files, context, and progress status.'],
  ['title' => 'Approval workflow',              'body' => 'Structure sign-offs with proofs, decision notes, and traceability for audit.'],
  ['title' => 'Compliance evidence collection', 'body' => 'Gather required documents, photos, and proofs in submissions reviewable by managers.'],
];

require get_stylesheet_directory() . '/template-parts/segment-landing.php';
