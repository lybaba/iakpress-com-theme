<?php
/**
 * Template Name: Product Tour
 * Renders the animated IntakeFlow promo reel (7 scenes, looping ~21s).
 *
 * English-first (site default), with a French variant — matching the theme's
 * bilingual convention (cf. page-pricing.php using iakpress_is_french_request()).
 * Serves BOTH /tour/ (EN) and /fr/tour/ (FR) from this one template; the markup
 * + CSS live once in template-parts/promo-reel.php and render from the copy array
 * selected below.
 *
 * Adapted from docs/content/linkedin/promo-reel.html — the bespoke @keyframes
 * stay inline in the shared part (the theme is Tailwind, but these custom
 * animations are page-local).
 */

get_header();

$is_fr = function_exists( 'iakpress_is_french_request' ) && iakpress_is_french_request();

// Per-language copy lives in ONE place, shared with the homepage preview.
$reel_copy = include locate_template( 'template-parts/promo-reel-copy.php' );

set_query_var( 'iaktour_reel', $is_fr ? $reel_copy['fr'] : $reel_copy['en'] );
get_template_part( 'template-parts/promo-reel' );

get_footer();
