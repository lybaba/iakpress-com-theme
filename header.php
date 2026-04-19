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
<header class="bg-white border-b border-gray-100 sticky top-0 z-50">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-16">
      
      <!-- Logo -->
      <div class="flex-shrink-0 flex items-center">
        <a href="/" class="text-2xl font-extrabold tracking-tighter text-gray-900">
          IAKPress<span class="text-blue-600">.</span>
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
        <a href="/xpressui/" class="<?php echo is_page('xpressui') ? $nav_active : $nav_idle; ?>">XpressUI</a>
        <a href="/pricing/" class="<?php echo is_page('pricing') ? $nav_active : $nav_idle; ?>">Pricing</a>
        <a href="/install/" class="<?php echo is_page('install') ? $nav_active : $nav_idle; ?>">Install</a>
        <a href="/services/" class="<?php echo is_page('services') ? $nav_active : $nav_idle; ?>">Services</a>
        <a href="/contact/" class="<?php echo is_page('contact') ? $nav_active : $nav_idle; ?>">Contact</a>
        <a href="/blog/" class="<?php echo ( is_home() && ! is_front_page() ) || is_singular('post') || is_category() || is_tag() ? $nav_active : $nav_idle; ?>">Blog</a>
      </nav>

      <!-- Call to Action & Mobile -->
      <div class="flex items-center space-x-4">
        <a href="/pro/" class="hidden md:inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-bold rounded-lg text-white bg-blue-600 hover:bg-blue-700 shadow-sm transition">
          Get Pro
        </a>
        <!-- Mobile Menu (simplified) -->
        <div class="md:hidden flex items-center">
          <a href="/pricing/" class="text-blue-600 font-bold text-sm mr-4">Pricing</a>
          <a href="/pro/" class="text-gray-900 font-medium text-sm">Get Pro</a>
        </div>
      </div>

    </div>
  </div>
</header>
