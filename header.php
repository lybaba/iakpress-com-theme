<?php
/**
 * The template for displaying the header.
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class( 'antialiased text-gray-900 bg-white flex flex-col min-h-screen' ); ?>>
<?php wp_body_open(); ?>

<!-- Navigation Bar -->
<header class="iak-site-header bg-white border-b border-gray-100 sticky top-0 z-50">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-16">
      
      <!-- Brand -->
      <div class="flex-shrink-0 flex items-center">
        <a href="/" class="flex items-center gap-3" aria-label="XPressUI home">
          <span class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-gray-900 text-white text-sm font-extrabold tracking-tight shadow-sm">
            XP
          </span>
          <span class="hidden sm:inline-flex text-lg font-extrabold tracking-tight text-gray-900">
            XPress<span class="text-blue-600">UI</span>
          </span>
        </a>
      </div>
      
      <!-- Desktop Menu -->
      <?php
      $nav_base   = 'px-3 py-2 text-sm font-medium transition rounded-md';
      $nav_active = $nav_base . ' text-blue-600 bg-blue-50';
      $nav_idle   = $nav_base . ' text-gray-600 hover:text-gray-900 hover:bg-gray-50';
      ?>
      <nav class="hidden md:flex space-x-1">
        <a href="/" class="<?php echo is_front_page() ? $nav_active : $nav_idle; ?>">Home</a>
        <a href="/xpressui/" class="<?php echo is_page('xpressui') ? $nav_active : $nav_idle; ?>">XPressUI Pro</a>
        <a href="/agency-pilot/" class="<?php echo is_page('agency-pilot') ? $nav_active : $nav_idle; ?>">Agency Pilot</a>
        <a href="/xpressui-cloud/" class="<?php echo is_page('xpressui-cloud') ? $nav_active : $nav_idle; ?>">XPressUI Cloud</a>
        <a href="/pricing/" class="<?php echo is_page('pricing') ? $nav_active : $nav_idle; ?>">Pricing</a>
        <a href="/install/" class="<?php echo is_page('install') ? $nav_active : $nav_idle; ?>">Install</a>
        <a href="/blog/" class="<?php echo ( is_home() && ! is_front_page() ) || is_singular('post') || is_category() || is_tag() ? $nav_active : $nav_idle; ?>">Blog</a>
      </nav>

      <!-- Call to Action & Mobile -->
      <div class="flex items-center space-x-4">
        <a href="https://xpressui.iakpress.com/" target="_blank" rel="noreferrer" class="hidden md:inline-flex items-center text-sm font-medium text-gray-600 hover:text-gray-900 transition">
          Open Console
          <svg class="ml-1 h-3.5 w-3.5 opacity-60" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
        </a>
        <a href="/agency-pilot/" class="hidden md:inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-bold rounded-lg text-white bg-blue-600 hover:bg-blue-700 shadow-sm transition">
          Launch a workflow
        </a>
        <!-- Mobile Menu (simplified) -->
        <div class="md:hidden flex items-center">
          <a href="/agency-pilot/" class="text-blue-600 font-bold text-sm mr-4">Pilot</a>
          <a href="/xpressui/" class="text-gray-900 font-medium text-sm">XPressUI</a>
        </div>
      </div>

    </div>
  </div>
</header>
