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

function iakpress_enqueue_layout_fixes(): void {
    wp_enqueue_style(
        'iakpress-layout-fixes',
        get_stylesheet_directory_uri() . '/assets/layout-fixes.css',
        [],
        filemtime( get_stylesheet_directory() . '/assets/layout-fixes.css' )
    );
}
add_action( 'wp_enqueue_scripts', 'iakpress_enqueue_layout_fixes', 30 );

function iakpress_current_path(): string {
    return trim( (string) parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
}

function iakpress_is_french_request(): bool {
    $path = iakpress_current_path();
    return $path === 'fr' || strpos( $path, 'fr/' ) === 0;
}

function iakpress_french_language_attributes( string $output ): string {
    if ( ! iakpress_is_french_request() ) {
        return $output;
    }

    return 'lang="fr-FR"';
}
add_filter( 'language_attributes', 'iakpress_french_language_attributes', 20 );

function iakpress_enqueue_xpressui_embed_script(): void {
    $path = iakpress_current_path();
    if ( ! is_page( 'contact' ) && $path !== 'fr/contact' ) {
        return;
    }

    $path = get_stylesheet_directory() . '/assets/xpressui/embed.js';
    wp_enqueue_script(
        'xpressui-hosted-embed',
        get_stylesheet_directory_uri() . '/assets/xpressui/embed.js',
        [],
        file_exists( $path ) ? filemtime( $path ) : null,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'iakpress_enqueue_xpressui_embed_script', 40 );

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

function iakpress_render_french_routes(): void {
    $path = iakpress_current_path();

    if ( $path === 'fr' ) {
        global $wp_query;
        if ( $wp_query ) {
            $wp_query->is_404 = false;
        }
        status_header( 200 );
        include get_stylesheet_directory() . '/page-fr.php';
        exit;
    }

    if ( $path !== 'fr/contact' ) {
        return;
    }

    global $wp_query;
    if ( $wp_query ) {
        $wp_query->is_404 = false;
    }
    status_header( 200 );
    include get_stylesheet_directory() . '/page-contact.php';
    exit;
}
add_action( 'template_redirect', 'iakpress_render_french_routes', 0 );
