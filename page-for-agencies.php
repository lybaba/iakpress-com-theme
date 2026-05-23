<?php
/**
 * Template for the /for-agencies/ segment page.
 */

$segment_eyebrow = 'For agencies';
$segment_title = 'Turn messy client intake into a repeatable delivery offer.';
$segment_intro = 'XPressUI helps agencies launch document portals, service request flows, catalog orders, and operator review without building a custom backend for every client project.';
$segment_primary_cta = 'Scope an agency pilot';
$segment_secondary_cta = 'Compare pricing';

$segment_pains = [
  'Clients send briefs, assets, approvals, and files through scattered channels.',
  'Every new project starts with the same manual intake setup.',
  'Agencies lose margin when operational workflows become custom backend work.',
  'Client sites need professional intake without forcing a new SaaS login.',
];

$segment_workflow = [
  'title' => 'A productized workflow offer agencies can resell.',
  'steps' => [
    ['title' => 'Pick one client workflow', 'body' => 'Document intake, reservation request, quote request, catalog order, or approval review.'],
    ['title' => 'Launch branded delivery', 'body' => 'Deploy hosted links or client-site pages with workflow branding and submission routing.'],
    ['title' => 'Package the pattern', 'body' => 'Turn the working flow into a reusable template for similar clients.'],
  ],
];

$segment_proofs = [
  ['title' => 'Project briefs', 'body' => 'Structured discovery answers, goals, constraints, and assets in one submission.'],
  ['title' => 'Client files', 'body' => 'Brand files, documents, references, PDFs, photos, and supporting evidence.'],
  ['title' => 'Catalog inputs', 'body' => 'Products, services, prices, dates, options, and CSV-imported choices.'],
  ['title' => 'Review decisions', 'body' => 'Operator notes, statuses, and follow-up context for each submission.'],
];

$segment_offer = [
  'title' => 'Sell one workflow first, then reuse it.',
  'body' => 'Use the first pilot to validate demand, then add the workflow to your agency delivery menu.',
  'items' => [
    'Hosted workflow setup from 299 EUR',
    'Client-site delivery from 790 EUR',
    'XPressUI Pro for owned-site delivery',
    'Cloud Team or Agency for repeatable operations',
  ],
];

$segment_outbound = "Agencies often rebuild the same client intake and review workflows again and again.\n\nXPressUI lets you launch one branded workflow first, then turn it into a reusable delivery product: document intake, catalog orders, reservations, or operator review.\n\nIf one client workflow is already painful, we can scope a small paid pilot around it.";

$segment_use_cases = [
  ['title' => 'Client onboarding portal', 'body' => 'Collect briefs, files, approvals, and missing information before production starts.'],
  ['title' => 'Catalog order workflow', 'body' => 'Let clients publish products, services, prices, and date-driven requests without custom code.'],
  ['title' => 'Review desk', 'body' => 'Route submissions to an operator inbox with statuses, notes, and exportable evidence.'],
];

require get_stylesheet_directory() . '/template-parts/segment-landing.php';
