<?php
/**
 * Single source of truth for the IntakeFlow promo-reel copy (EN + FR).
 *
 * Both the full-page tour (page-tour.php) and the homepage embedded preview
 * (front-page.php / page-fr.php SECTION 1C) include this file so the approved
 * 7-scene copy lives in exactly ONE place:
 *
 *   $reel_copy = include locate_template( 'template-parts/promo-reel-copy.php' );
 *   $reel      = $is_fr ? $reel_copy['fr'] : $reel_copy['en'];
 *
 * Keep the strings verbatim — these are the already-approved reel scenes.
 */

return array(

    // ---- French copy (already-approved reel — keep verbatim) ----
    'fr' => array(
        'brand_tag' => 'pré-collecte',
        'scenes'    => array(
            array(
                'type' => 'center',
                'logo' => 'IntakeFlow',
                'h1'   => 'Le <b>sas de pré-collecte</b> client',
                'sub'  => 'Collectez. Vérifiez. Traitez — sans le chaos.',
            ),
            array(
                'type'    => 'image',
                'chip'    => 'Sans login',
                'h2'      => 'Un lien.<br><b>Le client dépose.</b>',
                'caption' => 'Pièces demandées une à une, guidées étape par étape.',
                'url'     => 'demo.iakpress.com/fabrication-carte-grise',
                'img'     => '01-collecte-pieces.png',
                'bgpos'   => '50% 30%',
                'bgsize'  => '150%',
            ),
            array(
                'type'    => 'image',
                'chip'    => 'Validé à la source',
                'h2'      => 'Structuré<br><b>à la source.</b>',
                'caption' => "SIRET, dirigeant, justificatifs — propres avant d'arriver chez vous.",
                'url'     => 'demo.iakpress.com/collecte-fiscale-tva',
                'img'     => '04-collecte-fiscale-tva.png',
                'bgpos'   => '50% 30%',
                'bgsize'  => '150%',
            ),
            array(
                'type'    => 'image',
                'chip'    => 'RGPD-propre',
                'h2'      => 'À votre<br><b>marque.</b>',
                'caption' => 'Un portail premium, sans compte. La bonne première impression.',
                'url'     => 'demo.iakpress.com/client-onboarding-process',
                'img'     => '03-onboarding-client.png',
                'bgpos'   => '50% 30%',
                'bgsize'  => '150%',
            ),
            array(
                'type'    => 'image',
                'chip'    => '+ E-commerce',
                'h2'      => 'Pas que<br><b>collecter.</b>',
                'caption' => 'Vendez vos prestations — panier &amp; paiement intégrés.',
                'url'     => 'demo.iakpress.com/checkout',
                'img'     => '05-catalogue-produits.png',
                'bgpos'   => '50% 20%',
                'bgsize'  => '135%',
            ),
            array(
                'type'    => 'image',
                'chip'    => '+ Réservation',
                'h2'      => '…et<br><b>réservez.</b>',
                'caption' => 'Créneaux, ressources, acompte — en un seul lien.',
                'url'     => 'demo.iakpress.com/association',
                'img'     => '06-reservation-terrain.png',
                'bgpos'   => '50% 28%',
                'bgsize'  => '150%',
            ),
            array(
                'type' => 'center',
                'h1'   => 'Arrêtez de courir<br>après les <b>pièces.</b>',
                'sub'  => 'Un lien. Une inbox. Zéro relance perdue.',
                'cta'  => 'intakeflow.dev',
            ),
        ),
    ),

    // ---- English copy (canonical / default language) ----
    'en' => array(
        'brand_tag' => 'pre-intake',
        'scenes'    => array(
            array(
                'type' => 'center',
                'logo' => 'IntakeFlow',
                'h1'   => 'The <b>client intake gateway</b>',
                'sub'  => 'Collect. Verify. Process — without the chaos.',
            ),
            array(
                'type'    => 'image',
                'chip'    => 'No login',
                'h2'      => 'One link.<br><b>Clients submit.</b>',
                'caption' => 'Every document requested, one at a time, guided step by step.',
                'url'     => 'demo.iakpress.com/fabrication-carte-grise',
                'img'     => '01-collecte-pieces.png',
                'bgpos'   => '50% 30%',
                'bgsize'  => '150%',
            ),
            array(
                'type'    => 'image',
                'chip'    => 'Validated at source',
                'h2'      => 'Structured<br><b>at the source.</b>',
                'caption' => 'Company details, director, supporting docs — clean before they reach you.',
                'url'     => 'demo.iakpress.com/collecte-fiscale-tva',
                'img'     => '04-collecte-fiscale-tva.png',
                'bgpos'   => '50% 30%',
                'bgsize'  => '150%',
            ),
            array(
                'type'    => 'image',
                'chip'    => 'GDPR-clean',
                'h2'      => 'Your<br><b>brand.</b>',
                'caption' => 'A premium portal, no account needed. The right first impression.',
                'url'     => 'demo.iakpress.com/client-onboarding-process',
                'img'     => '03-onboarding-client.png',
                'bgpos'   => '50% 30%',
                'bgsize'  => '150%',
            ),
            array(
                'type'    => 'image',
                'chip'    => '+ E-commerce',
                'h2'      => 'Not just<br><b>collecting.</b>',
                'caption' => 'Sell your services — cart &amp; payment built in.',
                'url'     => 'demo.iakpress.com/checkout',
                'img'     => '05-catalogue-produits.png',
                'bgpos'   => '50% 20%',
                'bgsize'  => '135%',
            ),
            array(
                'type'    => 'image',
                'chip'    => '+ Booking',
                'h2'      => '…and<br><b>book.</b>',
                'caption' => 'Slots, resources, deposit — in a single link.',
                'url'     => 'demo.iakpress.com/association',
                'img'     => '06-reservation-terrain.png',
                'bgpos'   => '50% 28%',
                'bgsize'  => '150%',
            ),
            array(
                'type' => 'center',
                'h1'   => 'Stop chasing<br><b>documents.</b>',
                'sub'  => 'One link. One inbox. No lost follow-ups.',
                'cta'  => 'intakeflow.dev',
            ),
        ),
    ),
);
