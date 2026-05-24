<?php
/**
 * Template for the /for-operations/ segment page.
 */

$segment_eyebrow = 'For operations teams';
$segment_title = 'Replace manual follow-up with one operational workflow.';
$segment_intro = 'XPressUI helps small operations teams collect requests, reservations, catalog orders, supporting documents, and payment proofs through structured workflows instead of email chaos.';
$segment_primary_cta = 'Scope an operations workflow';
$segment_secondary_cta = 'Compare pricing';

$segment_pains = [
  'Requests arrive through inboxes, messages, spreadsheets, and static request pages.',
  'Operators cannot quickly see what is new, waiting, approved, or blocked.',
  'Prices, dates, services, and availability lists change faster than forms do.',
  'Managers need a cleaner audit trail before approving or delivering work.',
];

$segment_workflow = [
  'title' => 'A hosted operations desk for recurring requests.',
  'steps' => [
    ['title' => 'Publish one request link', 'body' => 'Give customers or internal teams a branded workflow for the recurring process.'],
    ['title' => 'Use catalogs and choices', 'body' => 'Centralize services, dates, products, prices, and options that change over time.'],
    ['title' => 'Review before delivery', 'body' => 'Operators receive structured submissions with files, statuses, and follow-up notes.'],
  ],
];

$segment_proofs = [
  ['title' => 'Service requests', 'body' => 'Customer details, desired services, dates, location, constraints, and notes.'],
  ['title' => 'Catalog orders', 'body' => 'Selected products, quantities, prices, service slots, and supporting details.'],
  ['title' => 'Payment proofs', 'body' => 'Receipts, bank transfer evidence, mobile money proofs, and manual validation notes.'],
  ['title' => 'Operational files', 'body' => 'Photos, PDFs, forms, IDs, and documents required before delivery.'],
];

$segment_offer = [
  'title' => 'Launch the first desk quickly.',
  'body' => 'Start with one process that currently creates manual follow-up, then scale to Team or Agency when volume grows.',
  'items' => [
    'Cloud Solo from 19 EUR/month',
    'Team plan for shared operations',
    'Agency plan for multi-client or white-label rollout',
    'Done For You workflow setup from 299 EUR',
  ],
];

$segment_outbound = "If your operations team still manages recurring requests through email, WhatsApp, spreadsheets, or static request pages, the follow-up cost adds up quickly.\n\nXPressUI turns one recurring process into a structured workflow with files, catalogs, statuses, and operator review.\n\nWe can start with one workflow and decide whether it deserves to become reusable.";

$segment_use_cases = [
  ['title' => 'Reservation requests', 'body' => 'Collect date preferences, participants, service options, and required documents.'],
  ['title' => 'Custom order intake', 'body' => 'Use catalogs for products, services, quantities, prices, and proof collection.'],
  ['title' => 'Internal approvals', 'body' => 'Move requests from message threads into a reviewable operator queue.'],
];

require get_stylesheet_directory() . '/template-parts/segment-landing.php';
