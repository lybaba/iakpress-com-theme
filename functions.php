<?php
/**
 * IAKPress.com Theme - Functions and definitions
 *
 * Note : GeneratePress se charge automatiquement de charger (enqueue)
 * le fichier `style.css` de ce thème enfant généré par Tailwind.
 */

// Ajoutez vos fonctions WordPress personnalisées (shortcodes, filtres, etc.) ci-dessous :

function xpressui_is_promo_page(): bool {
    return false;
}

function xpressui_asset_url( string $path ): string {
    return get_stylesheet_directory_uri() . '/assets/xpressui/' . ltrim( $path, '/' );
}

function xpressui_enqueue_promo_assets(): void {
    if ( ! xpressui_is_promo_page() ) {
        return;
    }

    wp_enqueue_style(
        'xpressui-promo',
        get_stylesheet_directory_uri() . '/assets/xpressui-promo.css',
        [],
        file_exists( get_stylesheet_directory() . '/assets/xpressui-promo.css' )
            ? (string) filemtime( get_stylesheet_directory() . '/assets/xpressui-promo.css' )
            : '1.0.0'
    );

    // Prevent GeneratePress from restyling the promo landing pages.
    wp_dequeue_style( 'generate-style' );
    wp_dequeue_style( 'generate-child-style' );
}
add_action( 'wp_enqueue_scripts', 'xpressui_enqueue_promo_assets', 20 );

function iakpress_favicon(): void {
    $logo = get_stylesheet_directory_uri() . '/assets/iakpress-logo.svg';
    echo '<link rel="icon" type="image/svg+xml" href="' . esc_url( $logo ) . '">' . "\n";
    echo '<link rel="shortcut icon" href="' . esc_url( $logo ) . '">' . "\n";
}
add_action( 'wp_head', 'iakpress_favicon', 1 );
add_action( 'admin_head', 'iakpress_favicon', 1 );
