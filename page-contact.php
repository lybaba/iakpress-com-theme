<?php
/**
 * The template for displaying the /contact/ page.
 */

$contact_embed_url = '';
if (function_exists('get_the_ID')) {
  $contact_embed_url = trim((string) get_post_meta(get_the_ID(), 'xpressui_contact_hosted_link_url', true));
}
if ($contact_embed_url === '') {
  $contact_embed_url = trim((string) get_theme_mod('xpressui_contact_hosted_link_url', ''));
}
if ($contact_embed_url === '' && defined('XPRESSUI_CONTACT_HOSTED_LINK_URL')) {
  $contact_embed_url = trim((string) XPRESSUI_CONTACT_HOSTED_LINK_URL);
}
$contact_embed_url = apply_filters('xpressui_contact_hosted_link_url', $contact_embed_url);
$has_contact_embed = is_string($contact_embed_url) && trim($contact_embed_url) !== '';

get_header(); ?>

<div class="font-sans text-gray-900 antialiased">

  <!-- Hero -->
  <section class="bg-white py-16 px-4 sm:px-6 lg:px-8 border-b border-gray-100">
    <div class="max-w-3xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3">Contact</p>
      <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 mb-4">
        Launch one workflow first.<br class="hidden md:block"/> Then decide what should scale.
      </h1>
      <p class="text-gray-500 leading-relaxed">
        Tell us what arrives today, who reviews it, and where the result should be delivered. We'll reply within 1-2 business days with a concrete first-workflow path.
      </p>
    </div>
  </section>

  <!-- Form -->
  <section class="bg-gray-50 py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto grid gap-8 lg:grid-cols-[0.85fr_1.15fr] items-start">
      <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
        <p class="text-xs font-bold tracking-widest text-blue-600 uppercase mb-3">What happens next</p>
        <h2 class="text-2xl font-extrabold tracking-tight text-gray-900 mb-4">A small pilot, not a vague discovery call.</h2>
        <div class="space-y-4 text-sm text-gray-600 leading-relaxed">
          <div class="flex gap-3">
            <span class="mt-1 h-2 w-2 rounded-full bg-blue-600 flex-shrink-0"></span>
            <p><strong class="text-gray-900">You describe one workflow.</strong> Documents, reservations, catalog orders, payment proofs, or another recurring intake.</p>
          </div>
          <div class="flex gap-3">
            <span class="mt-1 h-2 w-2 rounded-full bg-blue-600 flex-shrink-0"></span>
            <p><strong class="text-gray-900">You can share context.</strong> Add a form, spreadsheet, screenshot, or process document link if it helps explain the workflow.</p>
          </div>
          <div class="flex gap-3">
            <span class="mt-1 h-2 w-2 rounded-full bg-blue-600 flex-shrink-0"></span>
            <p><strong class="text-gray-900">We suggest the delivery path.</strong> Hosted link first, or client-site delivery when the workflow must live on an existing site.</p>
          </div>
          <div class="flex gap-3">
            <span class="mt-1 h-2 w-2 rounded-full bg-blue-600 flex-shrink-0"></span>
            <p><strong class="text-gray-900">You get a scoped next step.</strong> Paid assisted pilots start from 299 EUR. Client-site delivery starts from 790 EUR.</p>
          </div>
        </div>
      </div>
      <div class="min-w-0">
        <?php if ($has_contact_embed): ?>
          <div class="overflow-hidden rounded-3xl border border-gray-200 bg-white shadow-2xl shadow-blue-900/10">
            <div class="flex flex-col gap-3 border-b border-gray-100 bg-white p-4 sm:flex-row sm:items-center sm:justify-between">
              <div>
                <p class="text-xs font-bold tracking-widest text-blue-600 uppercase">XPressUI hosted workflow</p>
                <p class="text-sm text-gray-500">Embedded like Calendly. Submissions land in the XPressUI inbox.</p>
              </div>
              <a href="<?php echo esc_url($contact_embed_url); ?>" target="_blank" rel="noreferrer" class="inline-flex justify-center rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm font-bold text-gray-800 hover:border-gray-300 transition">
                Open in new tab →
              </a>
            </div>
            <div
              data-xpressui-embed-url="<?php echo esc_url($contact_embed_url); ?>"
              data-xpressui-embed-title="XPressUI workflow request"
              data-xpressui-embed-min-height="860"
              data-xpressui-embed-loading="eager"
            ></div>
            <noscript>
              <div class="p-4 text-sm text-gray-600">
                JavaScript is required to show the embedded workflow.
                <a href="<?php echo esc_url($contact_embed_url); ?>" class="font-bold text-blue-600">Open the workflow in a new tab</a>.
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
            <?php if (trim((string) get_the_content()) !== ''): ?>
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
