<?php
/**
 * Template for the /for-accountants/ segment page.
 */

$segment_eyebrow = 'For accountants';
$segment_title = 'Collect client documents without chasing every missing file.';
$segment_intro = 'XPressUI helps accounting teams launch a structured document intake workflow for monthly bookkeeping, VAT, annual returns, onboarding, and supporting evidence.';
$segment_primary_cta = 'Scope an accounting intake';
$segment_secondary_cta = 'Compare pricing';

$segment_pains = [
  'Client documents arrive across email, shared drives, messages, and late attachments.',
  'Teams lose time asking for missing invoices, IDs, payment proofs, or statements.',
  'Every period starts with the same checklist and the same manual reminders.',
  'Managers need a cleaner view of what is received, blocked, reviewed, and done.',
];

$segment_workflow = [
  'title' => 'One repeatable intake desk for each accounting cycle.',
  'steps' => [
    ['title' => 'Publish one client link', 'body' => 'Give each client a branded intake workflow for the recurring period.'],
    ['title' => 'Collect files and answers', 'body' => 'Receive invoices, bank statements, IDs, payroll inputs, payment proofs, and notes in one submission.'],
    ['title' => 'Review with status', 'body' => 'Operators see new, blocked, reviewed, and completed dossiers without digging through inboxes.'],
  ],
];

$segment_proofs = [
  ['title' => 'Monthly bookkeeping', 'body' => 'Invoices, bank statements, receipts, missing-file notes, and period confirmation.'],
  ['title' => 'VAT preparation', 'body' => 'Sales evidence, purchase files, proof of payment, and exception notes.'],
  ['title' => 'Client onboarding', 'body' => 'Company details, IDs, mandates, bank info, and signed documents.'],
  ['title' => 'Annual file collection', 'body' => 'Year-end supporting documents, confirmations, exports, and review comments.'],
];

$segment_offer = [
  'title' => 'Start with one client workflow.',
  'body' => 'Launch one document-heavy process first, then decide whether it should become the standard intake pattern for more clients.',
  'items' => [
    'Hosted workflow setup from 299 EUR',
    'Client-site delivery from 790 EUR',
    'Cloud Team for shared operator review',
    'Reusable workflow templates for recurring periods',
  ],
];

$segment_outbound = "Accounting teams often lose hours collecting the same missing client documents every month.\n\nXPressUI turns one recurring checklist into a branded intake workflow with files, statuses, and operator review.\n\nIf one monthly or VAT workflow is already painful, we can scope a small paid pilot around it.";

$segment_use_cases = [
  ['title' => 'Monthly document intake', 'body' => 'Collect invoices, receipts, statements, and notes for the active period.'],
  ['title' => 'VAT return preparation', 'body' => 'Gather required supporting evidence and flag missing or invalid proofs before review.'],
  ['title' => 'New client onboarding', 'body' => 'Standardize client details, KYC-style documents, mandates, and initial context.'],
];

require get_stylesheet_directory() . '/template-parts/segment-landing.php';
