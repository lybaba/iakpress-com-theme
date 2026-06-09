<?php
/**
 * The template for displaying the header.
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>
    (function() {
      var path = window.location.pathname;
      if (path.indexOf('/fr/') === 0 || path === '/fr') {
        return;
      }
      var cookies = document.cookie.split(';');
      var langPref = null;
      for (var i = 0; i < cookies.length; i++) {
        var c = cookies[i].trim();
        if (c.indexOf('lang_pref=') === 0) {
          langPref = c.substring('lang_pref='.length);
          break;
        }
      }
      if (langPref) {
        return;
      }
      var browserLang = navigator.language || navigator.userLanguage || '';
      if (browserLang.toLowerCase().indexOf('fr') === 0) {
        var cleanPath = path.replace(/^\/+/, '');
        var newPath = '/fr/' + cleanPath;
        window.location.href = window.location.origin + newPath + window.location.search + window.location.hash;
      }
    })();
  </script>
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
        <a href="/" class="flex items-center gap-3" aria-label="IntakeFlow home">
          <span class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-gray-900 text-white text-sm font-extrabold tracking-tight shadow-sm">
            IF
          </span>
          <span class="hidden sm:inline-flex text-lg font-extrabold tracking-tight text-gray-900">
            Intake<span class="text-blue-600">Flow</span>
          </span>
        </a>
      </div>
      
      <!-- Desktop Menu -->
      <?php
      $nav_base   = 'px-3 py-2 text-sm font-medium transition rounded-md';
      $nav_active = $nav_base . ' text-blue-600 bg-blue-50';
      $nav_idle   = $nav_base . ' text-gray-600 hover:text-gray-900 hover:bg-gray-50';
      $is_french_request = function_exists('iakpress_is_french_request') && iakpress_is_french_request();
      $current_english_path = function_exists('iakpress_english_path_from_current') ? iakpress_english_path_from_current() : trim( (string) parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
      $contact_href = $is_french_request ? '/fr/contact/' : '/contact/';
      $product_href = $is_french_request ? '/fr/xpressui/' : '/xpressui/';
      $cloud_href = $is_french_request ? '/fr/xpressui-cloud/' : '/xpressui-cloud/';
      $pricing_href = $is_french_request ? '/fr/pricing/' : '/pricing/';
      $install_href = $is_french_request ? '/fr/install/' : '/install/';
      $product_label = $is_french_request ? 'Produit' : 'Product';
      $pricing_label = $is_french_request ? 'Tarifs' : 'Pricing';
      $install_label = $is_french_request ? 'Installation' : 'Install';
      $contact_cta_label = $is_french_request ? "Tester l'intake" : 'Try live intake';
      $mobile_contact_cta_label = $is_french_request ? 'Tester' : 'Try intake';
      $english_language_url = function_exists('iakpress_language_switch_url') ? iakpress_language_switch_url('en') : home_url('/');
      $french_language_url = function_exists('iakpress_language_switch_url') ? iakpress_language_switch_url('fr') : home_url('/fr/');
      $language_base = 'inline-flex h-8 w-8 items-center justify-center rounded-full border text-sm transition';
      $language_active = $language_base . ' border-blue-600 bg-blue-50 text-blue-700';
      $language_idle = $language_base . ' border-gray-200 bg-white text-gray-600 hover:border-gray-300 hover:text-gray-900';
      ?>
      <nav class="hidden md:flex space-x-1">
        <a href="<?php echo esc_url($product_href); ?>" class="<?php echo $current_english_path === 'xpressui' || is_front_page() ? $nav_active : $nav_idle; ?>"><?php echo esc_html($product_label); ?></a>
        <a href="<?php echo esc_url($cloud_href); ?>" class="<?php echo $current_english_path === 'xpressui-cloud' ? $nav_active : $nav_idle; ?>">Cloud</a>
        <a href="<?php echo esc_url($pricing_href); ?>" class="<?php echo $current_english_path === 'pricing' ? $nav_active : $nav_idle; ?>"><?php echo esc_html($pricing_label); ?></a>
        <a href="<?php echo esc_url($install_href); ?>" class="<?php echo $current_english_path === 'install' ? $nav_active : $nav_idle; ?>"><?php echo esc_html($install_label); ?></a>
        <a href="/blog/" class="<?php echo ( is_home() && ! is_front_page() ) || is_singular('post') || is_category() || is_tag() ? $nav_active : $nav_idle; ?>">Blog</a>
      </nav>

      <!-- Call to Action & Mobile -->
      <div class="flex items-center space-x-4">
        <a href="https://app.intakeflow.dev/" target="_blank" rel="noreferrer" class="hidden md:inline-flex items-center text-sm font-medium text-gray-600 hover:text-gray-900 transition">
          Open Console
          <svg class="ml-1 h-3.5 w-3.5 opacity-60" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
        </a>
        <a href="<?php echo esc_url($contact_href); ?>" class="hidden md:inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-bold rounded-lg text-white bg-blue-600 hover:bg-blue-700 shadow-sm transition">
          <?php echo esc_html($contact_cta_label); ?>
        </a>
        <div class="flex items-center gap-1" aria-label="Language switcher">
          <a href="<?php echo esc_url($english_language_url); ?>" onclick="document.cookie = 'lang_pref=en; path=/; max-age=31536000';" class="<?php echo $is_french_request ? $language_idle : $language_active; ?>" aria-label="Switch to English" title="English">🇬🇧</a>
          <a href="<?php echo esc_url($french_language_url); ?>" onclick="document.cookie = 'lang_pref=fr; path=/; max-age=31536000';" class="<?php echo $is_french_request ? $language_active : $language_idle; ?>" aria-label="Passer en français" title="Français">🇫🇷</a>
        </div>
        <!-- Mobile Menu (simplified) -->
        <div class="md:hidden flex items-center">
          <a href="<?php echo esc_url($contact_href); ?>" class="text-blue-600 font-bold text-sm mr-4"><?php echo esc_html($mobile_contact_cta_label); ?></a>
          <a href="<?php echo esc_url($product_href); ?>" class="text-gray-900 font-medium text-sm">IntakeFlow</a>
        </div>
      </div>

    </div>
  </div>
</header>
