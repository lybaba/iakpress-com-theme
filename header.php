<?php
/**
 * The template for displaying the header.
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
  // Only output the JS redirect script if the current page has a French version mapped
  $current_eng_path = function_exists('iakpress_english_path_from_current') ? iakpress_english_path_from_current() : '';
  $lang_map = function_exists('iakpress_language_path_map') ? iakpress_language_path_map() : [];
  if ( array_key_exists( $current_eng_path, $lang_map ) ) :
  ?>
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
        if (c.indexOf('iakpress_lang=') === 0) {
          langPref = c.substring('iakpress_lang='.length);
          break;
        }
      }
      if (!langPref) {
        for (var i = 0; i < cookies.length; i++) {
          var c = cookies[i].trim();
          if (c.indexOf('lang_pref=') === 0) {
            langPref = c.substring('lang_pref='.length);
            break;
          }
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
  <?php endif; ?>
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
      $resources_href = $is_french_request ? '/fr/resources/' : '/resources/';
      $dfy_href = $is_french_request ? '/fr/done-for-you/' : '/done-for-you/';
      $dfy_label = $is_french_request ? 'Clé en Main' : 'Done For You';
      $product_label = $is_french_request ? 'Produit' : 'Product';
      $pricing_label = $is_french_request ? 'Tarifs' : 'Pricing';
      $install_label = $is_french_request ? 'Installation' : 'Install';
      $resources_label = $is_french_request ? 'Ressources' : 'Resources';
      $contact_cta_label = $is_french_request ? "Tester l'intake" : 'Try live intake';
      $mobile_contact_cta_label = $is_french_request ? 'Tester' : 'Try intake';
      $english_language_url = function_exists('iakpress_language_switch_url') ? iakpress_language_switch_url('en') : home_url('/');
      $french_language_url = function_exists('iakpress_language_switch_url') ? iakpress_language_switch_url('fr') : home_url('/fr/');
      $language_base = 'inline-flex h-8 w-8 items-center justify-center rounded-full border text-sm transition';
      $language_active = $language_base . ' border-blue-600 bg-blue-50 text-blue-700';
      $language_idle = $language_base . ' border-gray-200 bg-white text-gray-600 hover:border-gray-300 hover:text-gray-900';
      ?>
      <nav class="hidden md:flex space-x-1 items-center">
        <a href="<?php echo esc_url($product_href); ?>" class="<?php echo $current_english_path === 'xpressui' || is_front_page() ? $nav_active : $nav_idle; ?>"><?php echo esc_html($product_label); ?></a>
        <a href="<?php echo esc_url($cloud_href); ?>" class="<?php echo $current_english_path === 'xpressui-cloud' ? $nav_active : $nav_idle; ?>">Cloud</a>
        <a href="<?php echo esc_url($dfy_href); ?>" class="<?php echo $current_english_path === 'done-for-you' ? $nav_active : $nav_idle; ?>"><?php echo esc_html($dfy_label); ?></a>
        <a href="<?php echo esc_url($pricing_href); ?>" class="<?php echo $current_english_path === 'pricing' ? $nav_active : $nav_idle; ?>"><?php echo esc_html($pricing_label); ?></a>
        <a href="<?php echo esc_url($install_href); ?>" class="<?php echo $current_english_path === 'install' ? $nav_active : $nav_idle; ?>"><?php echo esc_html($install_label); ?></a>
        
        <!-- Resources Dropdown -->
        <div class="relative group">
          <button class="<?php echo $current_english_path === 'resources' ? $nav_active : $nav_idle; ?> flex items-center gap-1 py-2">
            <?php echo esc_html($resources_label); ?>
            <svg class="h-3.5 w-3.5 opacity-60 transition-transform group-hover:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
          </button>
          <div class="absolute left-1/2 -translate-x-1/2 mt-2 w-screen max-w-2xl bg-white border border-gray-100 rounded-2xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-left">
              <!-- Column 1: Explore -->
              <div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3"><?php echo $is_french_request ? 'Explorer' : 'Explore'; ?></p>
                <div class="flex flex-col gap-2">
                  <a href="<?php echo esc_url($resources_href); ?>" class="text-sm font-semibold text-gray-700 hover:text-blue-600 transition"><?php echo $is_french_request ? 'Documentation' : 'Documentation'; ?></a>
                  <a href="<?php echo esc_url($install_href); ?>" class="text-sm font-semibold text-gray-700 hover:text-blue-600 transition"><?php echo $is_french_request ? 'Guide d’installation' : 'Installation Guide'; ?></a>
                  <a href="<?php echo esc_url($pricing_href); ?>" class="text-sm font-semibold text-gray-700 hover:text-blue-600 transition"><?php echo $is_french_request ? 'Tarifs & Plans' : 'Pricing & Plans'; ?></a>
                  <a href="<?php echo esc_url($dfy_href); ?>" class="text-sm font-semibold text-gray-700 hover:text-blue-600 transition"><?php echo $is_french_request ? 'Service Clé en Main' : 'Done-For-You Setup'; ?></a>
                  <a href="<?php echo esc_url($contact_href); ?>" class="text-sm font-semibold text-gray-700 hover:text-blue-600 transition"><?php echo $is_french_request ? 'Obtenir de l’aide' : 'Get Help'; ?></a>
                </div>
              </div>
              <!-- Column 2: Learn -->
              <div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3"><?php echo $is_french_request ? 'Apprendre' : 'Learn'; ?></p>
                <div class="flex flex-col gap-2">
                  <a href="<?php echo $is_french_request ? '/fr/blog/' : '/blog/'; ?>" class="text-sm font-semibold text-gray-700 hover:text-blue-600 transition"><?php echo $is_french_request ? 'Actualités' : 'News & updates'; ?></a>
                  <a href="<?php echo esc_url($resources_href); ?>#workflows" class="text-sm font-semibold text-gray-700 hover:text-blue-600 transition"><?php echo $is_french_request ? 'Workflows Inclus' : 'Bundled Workflows'; ?></a>
                  <a href="<?php echo esc_url($resources_href); ?>#developer-api" class="text-sm font-semibold text-gray-700 hover:text-blue-600 transition"><?php echo $is_french_request ? 'Référence API' : 'Developer API'; ?></a>
                  <a href="<?php echo esc_url($contact_href); ?>" class="text-sm font-semibold text-gray-700 hover:text-blue-600 transition"><?php echo $is_french_request ? 'Consultation Setup' : 'Setup Consultation'; ?></a>
                </div>
              </div>
              <!-- Column 3: Featured Guide -->
              <div class="bg-gray-50 -m-6 p-6 rounded-r-2xl border-l border-gray-100 flex flex-col justify-between">
                <div>
                  <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3"><?php echo $is_french_request ? 'Guide Vedette' : 'Featured Guide'; ?></p>
                  <a href="<?php echo esc_url($resources_href); ?>#quickstart" class="block group/item">
                    <h3 class="text-sm font-bold text-gray-900 group-hover/item:text-blue-600 transition"><?php echo $is_french_request ? 'Créer son premier portail d’intake' : 'How to build a client intake portal'; ?></h3>
                    <p class="text-xs text-gray-500 mt-1 leading-normal"><?php echo $is_french_request ? 'Découvrez comment mettre en ligne votre premier workflow en moins de 10 minutes.' : 'Learn how to get your first workflow live on your WordPress site.'; ?></p>
                  </a>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-200/80">
                  <a href="https://app.intakeflow.dev/" target="_blank" rel="noreferrer" class="inline-flex items-center text-xs font-bold text-blue-600 hover:text-blue-700 transition">
                    <?php echo $is_french_request ? 'Ouvrir la Console' : 'Open Console'; ?>
                    <svg class="ml-1 h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <a href="<?php echo $is_french_request ? '/fr/blog/' : '/blog/'; ?>" class="<?php echo ( is_home() && ! is_front_page() ) || is_singular('post') || is_category() || is_tag() || iakpress_current_path() === 'fr/blog' ? $nav_active : $nav_idle; ?>"><?php echo $is_french_request ? 'Blog' : 'Blog'; ?></a>
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
          <a href="<?php echo esc_url($english_language_url); ?>" onclick="document.cookie = 'iakpress_lang=en; path=/; max-age=31536000' + (window.location.protocol === 'https:' ? '; Secure' : ''); document.cookie = 'lang_pref=en; path=/; max-age=31536000' + (window.location.protocol === 'https:' ? '; Secure' : '');" class="<?php echo $is_french_request ? $language_idle : $language_active; ?>" aria-label="Switch to English" title="English">🇬🇧</a>
          <a href="<?php echo esc_url($french_language_url); ?>" onclick="document.cookie = 'iakpress_lang=fr; path=/; max-age=31536000' + (window.location.protocol === 'https:' ? '; Secure' : ''); document.cookie = 'lang_pref=fr; path=/; max-age=31536000' + (window.location.protocol === 'https:' ? '; Secure' : '');" class="<?php echo $is_french_request ? $language_active : $language_idle; ?>" aria-label="Passer en français" title="Français">🇫🇷</a>
        </div>
        <!-- Mobile Menu (simplified) -->
        <div class="md:hidden flex items-center">
          <a href="<?php echo esc_url($contact_href); ?>" class="text-blue-600 font-bold text-sm mr-4"><?php echo esc_html($mobile_contact_cta_label); ?></a>
          <a href="<?php echo esc_url($dfy_href); ?>" class="text-gray-900 font-medium text-sm mr-4"><?php echo esc_html($dfy_label); ?></a>
          <a href="<?php echo esc_url($resources_href); ?>" class="text-gray-900 font-medium text-sm mr-4"><?php echo esc_html($resources_label); ?></a>
          <a href="<?php echo esc_url($product_href); ?>" class="text-gray-900 font-medium text-sm">IntakeFlow</a>
        </div>
      </div>

    </div>
  </div>
</header>
