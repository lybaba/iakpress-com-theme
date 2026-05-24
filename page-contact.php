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

if (!function_exists('iakpress_contact_hosted_link_embed_url')) {
  function iakpress_contact_hosted_link_embed_url($url) {
    $normalized_url = iakpress_normalize_contact_hosted_link_url($url);
    if ($normalized_url === '') {
      return '';
    }

    if (function_exists('add_query_arg')) {
      return esc_url_raw(add_query_arg('embed', '1', $normalized_url));
    }

    $separator = strpos($normalized_url, '?') === false ? '?' : '&';
    return esc_url_raw($normalized_url . $separator . 'embed=1');
  }
}

if (!function_exists('iakpress_extract_contact_hosted_link_url_from_content')) {
  function iakpress_extract_contact_hosted_link_url_from_content($content) {
    if (!is_string($content) || trim($content) === '') {
      return '';
    }

    if (!preg_match_all('/\[xpressui\b([^\]]*)\]/i', $content, $matches)) {
      return '';
    }

    foreach ($matches[1] as $attribute_text) {
      $candidate = '';
      if (function_exists('shortcode_parse_atts')) {
        $attributes = shortcode_parse_atts($attribute_text);
        if (is_array($attributes)) {
          if (isset($attributes['xpressui_contact_hosted_link_url'])) {
            $candidate = (string) $attributes['xpressui_contact_hosted_link_url'];
          } elseif (isset($attributes['hosted_link_url'])) {
            $candidate = (string) $attributes['hosted_link_url'];
          }
        }
      }

      if ($candidate === '') {
        $attribute_names = array('xpressui_contact_hosted_link_url', 'hosted_link_url');
        foreach ($attribute_names as $attribute_name) {
          $pattern = '/(?:^|\s)' . preg_quote($attribute_name, '/') . '\s*=\s*(?:"([^"]*)"|\'([^\']*)\'|([^\s\]]+))/i';
          if (preg_match($pattern, $attribute_text, $attribute_match)) {
            if (isset($attribute_match[1]) && $attribute_match[1] !== '') {
              $candidate = (string) $attribute_match[1];
            } elseif (isset($attribute_match[2]) && $attribute_match[2] !== '') {
              $candidate = (string) $attribute_match[2];
            } elseif (isset($attribute_match[3])) {
              $candidate = (string) $attribute_match[3];
            }
            break;
          }
        }
      }

      if ($candidate === '' && preg_match('/https?:\/\/[^\s\'"\]]+\/api\/v1\/hosted-links\/[A-Za-z0-9_\-]+(?:[^\s\'"\]]*)?/i', $attribute_text, $url_match)) {
        $candidate = (string) $url_match[0];
      }

      $candidate = iakpress_normalize_contact_hosted_link_url($candidate);
      if ($candidate !== '') {
        return $candidate;
      }
    }

    return '';
  }
}

$contact_content = function_exists('get_the_content') ? (string) get_the_content() : '';
$contact_public_url = iakpress_extract_contact_hosted_link_url_from_content($contact_content);
if (function_exists('get_the_ID')) {
  if ($contact_public_url === '') {
    $contact_public_url = trim((string) get_post_meta(get_the_ID(), 'xpressui_contact_hosted_link_url', true));
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
$contact_embed_url = iakpress_contact_hosted_link_embed_url($contact_public_url);
$has_contact_embed = $contact_embed_url !== '';

get_header(); ?>

<div class="font-sans text-gray-900 antialiased">

  <!-- Hero -->
  <section class="bg-white py-4 px-4 sm:px-6 lg:px-8 sm:py-5 lg:py-6 border-b border-gray-100">
    <div class="max-w-4xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-2">Contact</p>
      <h1 class="text-3xl font-extrabold tracking-tight text-gray-900 mb-3 sm:text-4xl">
        Launch one workflow first.<br class="hidden md:block"/> Then decide what should scale.
      </h1>
      <p class="text-base text-gray-500 leading-relaxed">
        Tell us what arrives today, who reviews it, and where the result should be delivered. We'll reply within 1-2 business days with a concrete first-workflow path.
      </p>
    </div>
  </section>

  <!-- Form -->
  <section class="bg-gray-50 px-4 pb-8 pt-6 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto grid gap-6 lg:grid-cols-[0.9fr_1.1fr] items-start">
      <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm lg:sticky lg:top-20">
        <p class="text-xs font-bold tracking-widest text-blue-600 uppercase mb-3">What happens next</p>
        <h2 class="text-xl font-extrabold tracking-tight text-gray-900 mb-4">A small pilot, not a vague discovery call.</h2>
        <div class="space-y-4 text-sm text-gray-600 leading-relaxed">
          <div class="flex gap-3">
            <span class="mt-1 h-2 w-2 rounded-full bg-blue-600 flex-shrink-0"></span>
            <p><strong class="text-gray-900">You describe one workflow.</strong> Documents, reservations, catalog orders, payment proofs, or another recurring intake.</p>
          </div>
          <div class="flex gap-3">
            <span class="mt-1 h-2 w-2 rounded-full bg-blue-600 flex-shrink-0"></span>
            <p><strong class="text-gray-900">You can share context.</strong> Add a form, screenshot, spreadsheet, or process link if it helps.</p>
          </div>
          <div class="flex gap-3">
            <span class="mt-1 h-2 w-2 rounded-full bg-blue-600 flex-shrink-0"></span>
            <p><strong class="text-gray-900">You get a scoped next step.</strong> We recommend a delivery path and price the first step clearly.</p>
          </div>
        </div>
      </div>
      <div class="min-w-0">
        <?php if ($has_contact_embed): ?>
          <div class="max-w-3xl mx-auto overflow-hidden rounded-3xl border border-gray-200 bg-white shadow-2xl shadow-blue-900/10">
            <div
              data-xpressui-embed-url="<?php echo esc_url($contact_embed_url); ?>"
              data-xpressui-embed-title="XPressUI workflow request"
              data-xpressui-embed-min-height="420"
              data-xpressui-embed-resize-floor="260"
              data-xpressui-embed-resize-buffer="8"
              data-xpressui-embed-launch-height="340"
              data-xpressui-embed-loading="eager"
            ></div>
            <noscript>
              <div class="p-4 text-sm text-gray-600">
                JavaScript is required to show the embedded workflow.
                <a href="<?php echo esc_url($contact_public_url); ?>" class="font-bold text-blue-600">Open the workflow in a new tab</a>.
              </div>
            </noscript>
          </div>
        <?php else: ?>
          <div class="rounded-3xl border border-blue-100 bg-white p-6 shadow-2xl shadow-blue-900/10">
            <p class="text-xs font-bold tracking-widest text-blue-600 uppercase mb-3">Hosted link missing</p>
            <h2 class="text-2xl font-extrabold tracking-tight text-gray-900 mb-3">Create the XPressUI hosted link, then embed it here.</h2>
            <p class="text-gray-600 leading-relaxed mb-5">
              Add the hosted workflow URL as the page custom field
              <code class="rounded bg-blue-50 px-1 text-blue-700">xpressui_contact_hosted_link_url</code>.
              The contact page will switch from this setup card to the live XPressUI embed.
            </p>
            <?php if (trim($contact_content) !== ''): ?>
              <details class="rounded-2xl border border-gray-100 bg-gray-50 p-4">
                <summary class="cursor-pointer text-sm font-bold text-gray-900">Show legacy contact form fallback</summary>
                <div class="mt-4">
                  <?php the_content(); ?>
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
          <p class="text-xs font-bold tracking-widest text-blue-600 uppercase mb-1">Built with XPressUI</p>
          <p class="text-gray-900 font-bold mb-1">This form runs on XPressUI.</p>
          <p class="text-sm text-gray-500 leading-relaxed">No code, no CSS conflicts. Designed in the visual console, deployed on a client site in under 30 minutes.</p>
        </div>
        <a href="/xpressui/" class="flex-shrink-0 inline-flex items-center bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-bold py-3 px-6 rounded-lg transition text-sm whitespace-nowrap">
          See how it works →
        </a>
      </div>
    </div>
  </section>

</div>

<?php get_footer(); ?>
