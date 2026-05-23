<?php
/**
 * Template for the /for-accountants/ segment page.
 */

$segment_eyebrow = 'For accounting teams';
$segment_title = 'Stop chasing client documents across email threads.';
$segment_intro = 'XPressUI helps accounting firms collect tax files, onboarding forms, attestations, payment proofs, and missing documents through one guided workflow instead of scattered messages.';
$segment_primary_cta = 'Scope an accounting workflow';
$segment_secondary_cta = 'Compare pricing';

$segment_pains = [
  'Clients send files across email, WhatsApp, shared drives, and late follow-ups.',
  'Your team cannot see what is complete, missing, or waiting for review.',
  'Each client onboarding checklist is rebuilt manually instead of reused.',
  'Sensitive documents arrive without a clean review trail.',
];

$segment_workflow = [
  'title' => 'A repeatable intake portal for client documents.',
  'steps' => [
    ['title' => 'Collect client identity', 'body' => 'Guide the client through company, contact, fiscal year, and engagement details.'],
    ['title' => 'Request the right files', 'body' => 'Ask for tax forms, invoices, bank documents, attestations, and missing proof in one flow.'],
    ['title' => 'Review and follow up', 'body' => 'Use statuses, notes, and summaries to know what is complete before work starts.'],
  ],
];

$segment_proofs = [
  ['title' => 'Tax and accounting files', 'body' => 'Invoices, statements, VAT exports, payroll documents, and annual close material.'],
  ['title' => 'Client onboarding data', 'body' => 'Company details, contacts, fiscal preferences, and authorization answers.'],
  ['title' => 'Attestations and IDs', 'body' => 'KYC-style files, mandates, certificates, and signed documents.'],
  ['title' => 'Payment proofs', 'body' => 'Receipts, transfer confirmations, and supporting evidence for manual review.'],
];

$segment_offer = [
  'title' => 'Sell it as client intake cleanup.',
  'body' => 'Start with one recurring process, then convert it into a reusable onboarding product for the firm.',
  'items' => [
    'Hosted setup from 299 EUR',
    'Client-site delivery from 790 EUR',
    'Reusable checklists and document categories',
    'Cloud catalogs for recurring document lists',
  ],
];

$segment_outbound = "Many accounting teams still collect client documents through email and spreadsheets.\n\nXPressUI turns that into one guided intake workflow: files, answers, missing items, and review status in one place.\n\nIf one recurring client process still creates manual follow-up, we can launch a small pilot around that workflow first.";

$segment_use_cases = [
  ['title' => 'New client onboarding', 'body' => 'Collect identity details, mandates, accounting preferences, and first document bundle.'],
  ['title' => 'Annual document request', 'body' => 'Send one link for the yearly checklist and track what is still missing.'],
  ['title' => 'Payment proof review', 'body' => 'Centralize receipts and transfer proofs before reconciliation or follow-up.'],
];

require get_stylesheet_directory() . '/template-parts/segment-landing.php';
