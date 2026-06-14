<?php
/**
 * The template for displaying the /contact/ page.
 */

if (!function_exists('iakpress_normalize_contact_hosted_link_url')) {
  function iakpress_normalize_contact_hosted_link_url($url) {
    if (!is_string($url)) {
      return '';
    }

    $normalized_url = trim(html_entity_decode($url, ENT_QUOTES, 'UTF-8'));
    if ($normalized_url === '') {
      return '';
    }

    return esc_url_raw($normalized_url);
  }
}

if (!function_exists('iakpress_contact_hosted_link_start_url')) {
  function iakpress_contact_hosted_link_start_url($url) {
    $normalized_url = iakpress_normalize_contact_hosted_link_url($url);
    if ($normalized_url === '') {
      return '';
    }

    if (function_exists('add_query_arg')) {
      return esc_url_raw(add_query_arg('start', '1', $normalized_url));
    }

    $separator = strpos($normalized_url, '?') === false ? '?' : '&';
    return esc_url_raw($normalized_url . $separator . 'start=1');
  }
}

if (!function_exists('iakpress_clean_contact_card_text')) {
  function iakpress_clean_contact_card_text($value, $fallback, $max_length = 120) {
    if (!is_string($value)) {
      return $fallback;
    }

    $cleaned = trim(html_entity_decode($value, ENT_QUOTES, 'UTF-8'));
    $cleaned = function_exists('wp_strip_all_tags') ? wp_strip_all_tags($cleaned) : strip_tags($cleaned);
    $cleaned = trim($cleaned);
    if ($cleaned === '') {
      return $fallback;
    }

    if (function_exists('mb_substr')) {
      return mb_substr($cleaned, 0, $max_length);
    }

    return substr($cleaned, 0, $max_length);
  }
}

if (!function_exists('iakpress_find_contact_shortcode_attribute')) {
  function iakpress_find_contact_shortcode_attribute($attributes, $attribute_text, $attribute_names) {
    if (is_array($attributes)) {
      $normalized_attributes = array();
      foreach ($attributes as $key => $value) {
        $normalized_attributes[strtolower((string) $key)] = $value;
      }

      foreach ($attribute_names as $attribute_name) {
        $normalized_name = strtolower((string) $attribute_name);
        if (isset($normalized_attributes[$normalized_name])) {
          return (string) $normalized_attributes[$normalized_name];
        }
      }
    }

    foreach ($attribute_names as $attribute_name) {
      $pattern = '/(?:^|\s)' . preg_quote((string) $attribute_name, '/') . '\s*=\s*(?:"([^"]*)"|\'([^\']*)\'|([^\s\]]+))/i';
      if (preg_match($pattern, $attribute_text, $attribute_match)) {
        if (isset($attribute_match[1]) && $attribute_match[1] !== '') {
          return (string) $attribute_match[1];
        }
        if (isset($attribute_match[2]) && $attribute_match[2] !== '') {
          return (string) $attribute_match[2];
        }
        if (isset($attribute_match[3])) {
          return (string) $attribute_match[3];
        }
      }
    }

    return '';
  }
}

if (!function_exists('iakpress_extract_contact_hosted_link_config_from_content')) {
  function iakpress_extract_contact_hosted_link_config_from_content($content) {
    $empty_config = array(
      'url' => '',
      'intro_title' => '',
      'cta_label' => '',
    );

    if (!is_string($content) || trim($content) === '') {
      return $empty_config;
    }

    if (!preg_match_all('/\[xpressui\b([^\]]*)\]/i', $content, $matches)) {
      return $empty_config;
    }

    foreach ($matches[1] as $attribute_text) {
      $attributes = array();
      if (function_exists('shortcode_parse_atts')) {
        $parsed_attributes = shortcode_parse_atts($attribute_text);
        if (is_array($parsed_attributes)) {
          $attributes = $parsed_attributes;
        }
      }

      $candidate = iakpress_find_contact_shortcode_attribute(
        $attributes,
        $attribute_text,
        array('xpressui_contact_hosted_link_url', 'hosted_link_url', 'url', 'href')
      );

      if ($candidate === '') {
        if (preg_match('/https?:\/\/[^\s\'"\]]+\/api\/v1\/hosted-links\/[A-Za-z0-9_\-]+(?:[^\s\'"\]]*)?/i', $attribute_text, $url_match)) {
          $candidate = (string) $url_match[0];
        }
      }

      $candidate = iakpress_normalize_contact_hosted_link_url($candidate);
      if ($candidate !== '') {
        return array(
          'url' => $candidate,
          'intro_title' => iakpress_find_contact_shortcode_attribute(
            $attributes,
            $attribute_text,
            array('intro_title', 'introTitle', 'title', 'xpressui_intro_title', 'contact_intro_title')
          ),
          'cta_label' => iakpress_find_contact_shortcode_attribute(
            $attributes,
            $attribute_text,
            array('cta_label', 'ctaLabel', 'button_label', 'intro_button_label', 'introButtonLabel', 'xpressui_cta_label')
          ),
        );
      }
    }

    return $empty_config;
  }
}

if (!function_exists('iakpress_extract_contact_hosted_link_url_from_content')) {
  function iakpress_extract_contact_hosted_link_url_from_content($content) {
    $config = iakpress_extract_contact_hosted_link_config_from_content($content);
    return $config['url'];
  }
}

$is_french_contact = function_exists('iakpress_is_french_request') && iakpress_is_french_request();
$contact_page_id = function_exists('get_the_ID') ? (int) get_the_ID() : 0;
$contact_content = function_exists('get_the_content') ? (string) get_the_content() : '';
if ($is_french_contact && function_exists('get_page_by_path')) {
  $source_contact_page = get_page_by_path('contact');
  if ($source_contact_page instanceof WP_Post) {
    $contact_page_id = (int) $source_contact_page->ID;
    $contact_content = (string) $source_contact_page->post_content;
  }
}

$contact_copy = $is_french_contact ? array(
  'default_intro_title' => 'Décrivez votre premier intake client',
  'default_cta_label' => 'Démarrer le brief',
  'hero_eyebrow' => 'Contact',
  'hero_title_line_1' => 'Lancez un premier intake client.',
  'hero_title_line_2' => 'Puis décidez ce qui doit être répété.',
  'hero_body' => 'Dites-nous ce qui arrive aujourd\'hui, qui le traite, et où le résultat doit être livré. Nous répondons sous 1 à 2 jours ouvrés avec un premier chemin concret.',
  'next_eyebrow' => 'Et ensuite ?',
  'next_title' => 'Un petit pilote concret, pas un appel de découverte vague.',
  'bullet_1_title' => 'Vous décrivez un workflow.',
  'bullet_1_body' => 'Documents, réservations, demandes de service, commandes catalogue, preuves de paiement ou autre intake récurrent.',
  'bullet_2_title' => 'Vous partagez le contexte.',
  'bullet_2_body' => 'Ajoutez un portail existant, une capture, un tableur ou un lien de process utile.',
  'bullet_3_title' => 'Vous recevez une prochaine étape cadrée.',
  'bullet_3_body' => 'Nous recommandons un mode de livraison et chiffrons clairement le premier pas.',
  'missing_eyebrow' => 'Lien hébergé manquant',
  'missing_title' => 'Créez le lien hébergé XPressUI, puis intégrez-le ici.',
  'missing_body_before' => 'Ajoutez l\'URL du workflow hébergé dans le champ personnalisé de la page',
  'missing_body_after' => 'La page contact remplacera cette carte de configuration par le lien XPressUI actif.',
  'fallback_summary' => 'Afficher le canal de contact de secours',
  'promo_eyebrow' => 'Construit avec XPressUI',
  'promo_title' => 'Ce parcours fonctionne avec XPressUI.',
  'promo_body' => 'Pas de code, pas de conflit CSS. Conçu dans la console visuelle, déployé sur un site client ou en lien hébergé.',
  'promo_cta' => 'Voir comment ça marche',
) : array(
  'default_intro_title' => 'Describe your first workflow',
  'default_cta_label' => 'Start the brief',
  'hero_eyebrow' => 'Contact',
  'hero_title_line_1' => 'Launch one workflow first.',
  'hero_title_line_2' => 'Then decide what should scale.',
  'hero_body' => 'Tell us what arrives today, who reviews it, and where the result should be delivered. We\'ll reply within 1-2 business days with a concrete first-workflow path.',
  'next_eyebrow' => 'What happens next',
  'next_title' => 'A small pilot, not a vague discovery call.',
  'bullet_1_title' => 'You describe one workflow.',
  'bullet_1_body' => 'Documents, reservations, catalog orders, payment proofs, or another recurring intake.',
  'bullet_2_title' => 'You can share context.',
  'bullet_2_body' => 'Add a form, screenshot, spreadsheet, or process link if it helps.',
  'bullet_3_title' => 'You get a scoped next step.',
  'bullet_3_body' => 'We recommend a delivery path and price the first step clearly.',
  'missing_eyebrow' => 'Hosted link missing',
  'missing_title' => 'Create the XPressUI hosted link, then embed it here.',
  'missing_body_before' => 'Add the hosted workflow URL as the page custom field',
  'missing_body_after' => 'The contact page will switch from this setup card to the live XPressUI embed.',
  'fallback_summary' => 'Show legacy contact form fallback',
  'promo_eyebrow' => 'Built with XPressUI',
  'promo_title' => 'This intake runs on XPressUI.',
  'promo_body' => 'No code, no CSS conflicts. Designed in the visual console, deployed on a client site in under 30 minutes.',
  'promo_cta' => 'See how it works',
);

$contact_shortcode_config = iakpress_extract_contact_hosted_link_config_from_content($contact_content);
$contact_public_url = $contact_shortcode_config['url'];
if ($contact_page_id > 0) {
  if ($contact_public_url === '') {
    $contact_public_url = trim((string) get_post_meta($contact_page_id, 'xpressui_contact_hosted_link_url', true));
  }
}
if ($contact_public_url === '') {
  $contact_public_url = trim((string) get_theme_mod('xpressui_contact_hosted_link_url', ''));
}
if ($contact_public_url === '' && defined('XPRESSUI_CONTACT_HOSTED_LINK_URL')) {
  $contact_public_url = trim((string) XPRESSUI_CONTACT_HOSTED_LINK_URL);
}
$contact_public_url = apply_filters('xpressui_contact_hosted_link_url', $contact_public_url);
$contact_public_url = iakpress_normalize_contact_hosted_link_url($contact_public_url);
$contact_launch_url = iakpress_contact_hosted_link_start_url($contact_public_url);
$has_contact_embed = $contact_launch_url !== '';
$contact_intro_title = iakpress_clean_contact_card_text(
  $contact_shortcode_config['intro_title'],
  $contact_copy['default_intro_title'],
  140
);
$contact_cta_label = iakpress_clean_contact_card_text(
  $contact_shortcode_config['cta_label'],
  $contact_copy['default_cta_label'],
  80
);
$contact_intro_title = apply_filters('xpressui_contact_card_intro_title', $contact_intro_title);
$contact_cta_label = apply_filters('xpressui_contact_card_cta_label', $contact_cta_label);

get_header(); ?>

<div class="font-sans text-gray-900 antialiased">

  <!-- Hero -->
  <section class="bg-white py-4 px-4 sm:px-6 lg:px-8 sm:py-5 lg:py-6 border-b border-gray-100">
    <div class="max-w-4xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-2"><?php echo esc_html($contact_copy['hero_eyebrow']); ?></p>
      <h1 class="text-3xl font-extrabold tracking-tight text-gray-900 mb-3 sm:text-4xl">
        <?php echo esc_html($contact_copy['hero_title_line_1']); ?><br class="hidden md:block"/> <?php echo esc_html($contact_copy['hero_title_line_2']); ?>
      </h1>
      <p class="text-base text-gray-500 leading-relaxed">
        <?php echo esc_html($contact_copy['hero_body']); ?>
      </p>
    </div>
  </section>

  <!-- Form -->
  <section class="bg-gray-50 px-4 pb-8 pt-6 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto grid gap-6 lg:grid-cols-[0.9fr_1.1fr] items-start">
      <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm lg:sticky lg:top-20">
        <p class="text-xs font-bold tracking-widest text-blue-600 uppercase mb-3"><?php echo esc_html($contact_copy['next_eyebrow']); ?></p>
        <h2 class="text-xl font-extrabold tracking-tight text-gray-900 mb-4"><?php echo esc_html($contact_copy['next_title']); ?></h2>
        <div class="space-y-4 text-sm text-gray-600 leading-relaxed">
          <div class="flex gap-3">
            <span class="mt-1 h-2 w-2 rounded-full bg-blue-600 flex-shrink-0"></span>
            <p><strong class="text-gray-900"><?php echo esc_html($contact_copy['bullet_1_title']); ?></strong> <?php echo esc_html($contact_copy['bullet_1_body']); ?></p>
          </div>
          <div class="flex gap-3">
            <span class="mt-1 h-2 w-2 rounded-full bg-blue-600 flex-shrink-0"></span>
            <p><strong class="text-gray-900"><?php echo esc_html($contact_copy['bullet_2_title']); ?></strong> <?php echo esc_html($contact_copy['bullet_2_body']); ?></p>
          </div>
          <div class="flex gap-3">
            <span class="mt-1 h-2 w-2 rounded-full bg-blue-600 flex-shrink-0"></span>
            <p><strong class="text-gray-900"><?php echo esc_html($contact_copy['bullet_3_title']); ?></strong> <?php echo esc_html($contact_copy['bullet_3_body']); ?></p>
          </div>
        </div>
      </div>
      <div class="min-w-0">
        <?php if ($has_contact_embed): ?>
          <a
            href="<?php echo esc_url($contact_launch_url); ?>"
            target="_blank"
            rel="noopener noreferrer"
            class="mx-auto grid min-h-[220px] max-w-3xl place-items-center rounded-[26px] border border-gray-200 bg-white px-8 py-10 text-center shadow-2xl shadow-slate-900/10 transition duration-150 hover:-translate-y-0.5 hover:shadow-slate-900/15 focus:outline-none focus:ring-4 focus:ring-blue-200"
          >
            <span class="block">
              <span class="block text-[clamp(28px,3.2vw,36px)] font-black leading-tight tracking-tight text-gray-950">
                <?php echo esc_html($contact_intro_title); ?>
              </span>
              <span class="mt-5 inline-flex items-center justify-center rounded-xl bg-gray-950 px-7 py-3 text-sm font-extrabold text-white shadow-xl shadow-slate-900/20">
                <?php echo esc_html($contact_cta_label); ?>
              </span>
            </span>
          </a>
        <?php else: ?>
          <div class="rounded-3xl border border-blue-100 bg-white p-6 shadow-2xl shadow-blue-900/10">
            <p class="text-xs font-bold tracking-widest text-blue-600 uppercase mb-3"><?php echo esc_html($contact_copy['missing_eyebrow']); ?></p>
            <h2 class="text-2xl font-extrabold tracking-tight text-gray-900 mb-3"><?php echo esc_html($contact_copy['missing_title']); ?></h2>
            <p class="text-gray-600 leading-relaxed mb-5">
              <?php echo esc_html($contact_copy['missing_body_before']); ?>
              <code class="rounded bg-blue-50 px-1 text-blue-700">xpressui_contact_hosted_link_url</code>.
              <?php echo esc_html($contact_copy['missing_body_after']); ?>
            </p>
            <?php if (trim($contact_content) !== ''): ?>
              <details class="rounded-2xl border border-gray-100 bg-gray-50 p-4">
                <summary class="cursor-pointer text-sm font-bold text-gray-900"><?php echo esc_html($contact_copy['fallback_summary']); ?></summary>
                <div class="mt-4">
                  <?php echo apply_filters('the_content', $contact_content); ?>
                </div>
              </details>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- XpressUI promo -->
  <section class="bg-gray-50 border-t border-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
      <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 flex flex-col sm:flex-row items-center gap-6">
        <div class="flex-1 min-w-0">
          <p class="text-xs font-bold tracking-widest text-blue-600 uppercase mb-1"><?php echo esc_html($contact_copy['promo_eyebrow']); ?></p>
          <p class="text-gray-900 font-bold mb-1"><?php echo esc_html($contact_copy['promo_title']); ?></p>
          <p class="text-sm text-gray-500 leading-relaxed"><?php echo esc_html($contact_copy['promo_body']); ?></p>
        </div>
        <a href="/xpressui/" class="flex-shrink-0 inline-flex items-center bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-bold py-3 px-6 rounded-lg transition text-sm whitespace-nowrap">
          <?php echo esc_html($contact_copy['promo_cta']); ?> <?php echo xpressui_arrow_svg(); ?>
        </a>
      </div>
    </div>
  </section>

</div>

<?php get_footer(); ?>
