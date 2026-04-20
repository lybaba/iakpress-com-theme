<?php
/**
 * IAKPress.com Theme - Functions and definitions
 *
 * Note : GeneratePress se charge automatiquement de charger (enqueue)
 * le fichier `style.css` de ce thème enfant généré par Tailwind.
 */

// Ajoutez vos fonctions WordPress personnalisées (shortcodes, filtres, etc.) ci-dessous :

function xpressui_asset_url( string $path ): string {
    return get_stylesheet_directory_uri() . '/assets/xpressui/' . ltrim( $path, '/' );
}

// The theme is fully built with Tailwind CSS — GeneratePress parent styles are not needed
// and conflict with Tailwind's reset/base layer.
function iakpress_dequeue_generatepress_styles(): void {
    wp_dequeue_style( 'generate-style' );
}
add_action( 'wp_enqueue_scripts', 'iakpress_dequeue_generatepress_styles', 20 );

function iakpress_favicon(): void {
    $base = get_stylesheet_directory_uri() . '/assets/favicon';
    echo '<link rel="icon" type="image/x-icon" href="' . esc_url( $base . '/favicon.ico' ) . '">' . "\n";
    echo '<link rel="icon" type="image/png" sizes="16x16" href="' . esc_url( $base . '/favicon-16x16.png' ) . '">' . "\n";
    echo '<link rel="icon" type="image/png" sizes="32x32" href="' . esc_url( $base . '/favicon-32x32.png' ) . '">' . "\n";
    echo '<link rel="icon" type="image/png" sizes="96x96" href="' . esc_url( $base . '/favicon-96x96.png' ) . '">' . "\n";
    echo '<link rel="apple-touch-icon" sizes="180x180" href="' . esc_url( $base . '/apple-icon-180x180.png' ) . '">' . "\n";
}
add_action( 'wp_head', 'iakpress_favicon', 1 );
add_action( 'admin_head', 'iakpress_favicon', 1 );
