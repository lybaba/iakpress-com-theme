<?php
/**
 * The template for displaying the footer.
 */
?>

<?php
$is_french_footer = function_exists('iakpress_is_french_request') && iakpress_is_french_request();
$footer_contact_href = $is_french_footer ? '/fr/contact/' : '/contact/';
$footer_copy = $is_french_footer ? array(
  'eyebrow' => 'Premier portail d\'intake',
  'title' => 'Vous voulez mettre en ligne un premier intake client avant de choisir le chemin complet ?',
  'body' => 'Commencez par un petit pilote payant : lien privé, upload guidé, inbox opérateur, surface catalogue réutilisable ou livraison sur site client.',
  'cta' => 'Tester l\'intake',
  'pricing' => 'Tarifs',
  'install' => 'Installation',
) : array(
  'eyebrow' => 'First intake portal',
  'title' => 'Want one client intake live before choosing the full path?',
  'body' => 'Start with a small paid pilot: private link, guided upload, operator inbox, reusable catalog surface, or client-site delivery.',
  'cta' => 'Try live intake',
  'pricing' => 'Pricing',
  'install' => 'Install',
);
?>

<footer class="bg-gray-900 py-12 border-t border-gray-800 mt-auto">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center flex flex-col items-center gap-6">
    <div class="w-full rounded-3xl border border-gray-800 bg-gray-950/60 p-6 md:p-8 grid grid-cols-1 md:grid-cols-[1fr_auto] gap-5 items-center text-left">
      <div>
        <p class="text-xs font-bold tracking-widest text-blue-300 uppercase mb-2"><?php echo esc_html($footer_copy['eyebrow']); ?></p>
        <h2 class="text-2xl font-extrabold text-white mb-2"><?php echo esc_html($footer_copy['title']); ?></h2>
        <p class="text-sm text-gray-400 leading-relaxed"><?php echo esc_html($footer_copy['body']); ?></p>
      </div>
      <a href="<?php echo esc_url($footer_contact_href); ?>" class="inline-flex justify-center rounded-lg bg-blue-600 px-6 py-3 text-sm font-bold text-white shadow-lg shadow-blue-500/20 transition hover:bg-blue-700">
        <?php echo esc_html($footer_copy['cta']); ?>
      </a>
    </div>
    <a href="/" class="text-xl font-extrabold tracking-tighter text-white opacity-70 hover:opacity-100 transition">
      Intake<span class="text-blue-500">Flow</span>
    </a>
    <nav class="flex flex-wrap justify-center gap-x-6 gap-y-2">
      <?php
      $footer_product_href = $is_french_footer ? '/fr/xpressui/' : '/xpressui/';
      $footer_pricing_href = $is_french_footer ? '/fr/pricing/'   : '/pricing/';
      $footer_install_href = $is_french_footer ? '/fr/install/'   : '/install/';
      $footer_cloud_href   = $is_french_footer ? '/fr/xpressui-cloud/' : '/xpressui-cloud/';
      $footer_lang_href    = $is_french_footer ? '/'              : '/fr/';
      $footer_lang_label   = $is_french_footer ? 'English'        : 'Français';
      ?>
      <a href="<?php echo esc_url($footer_product_href); ?>" class="text-sm text-gray-500 hover:text-gray-300 transition">IntakeFlow</a>
      <a href="<?php echo esc_url($footer_cloud_href); ?>" class="text-sm text-gray-500 hover:text-gray-300 transition">Cloud</a>
      <a href="<?php echo esc_url($footer_pricing_href); ?>" class="text-sm text-gray-500 hover:text-gray-300 transition"><?php echo esc_html($footer_copy['pricing']); ?></a>
      <a href="<?php echo esc_url($footer_install_href); ?>" class="text-sm text-gray-500 hover:text-gray-300 transition"><?php echo esc_html($footer_copy['install']); ?></a>
      <a href="/blog/" class="text-sm text-gray-500 hover:text-gray-300 transition">Blog</a>
      <a href="<?php echo esc_url($footer_lang_href); ?>" class="text-sm text-gray-500 hover:text-gray-300 transition"><?php echo esc_html($footer_lang_label); ?></a>
      <a href="<?php echo esc_url($footer_contact_href); ?>" class="text-sm text-gray-500 hover:text-gray-300 transition">Contact</a>
    </nav>
    <p class="text-gray-500 text-sm">
      &copy; <?php echo date('Y'); ?> IntakeFlow by IAKPress. All rights reserved.
    </p>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
