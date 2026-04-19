<?php
/**
 * Template for the /contact/ page.
 */

$xpressui_active_route = 'contact';
$contact_form_url      = xpressui_asset_url( 'contact-form.html' );

get_header( 'xpressui' );
?>

<main class="subpage-shell">
  <div class="container">
    <section class="subpage-hero">
      <p class="section-kicker">Contact</p>
      <h1>Need help deciding, installing, or tailoring the workflow?</h1>
      <p>
        Fill in the form and we'll get back to you within 1-2 business days.
        For installation questions, include your WordPress version and active theme.
      </p>
    </section>

    <section style="max-width:600px">
      <iframe
        src="<?php echo esc_url( $contact_form_url ); ?>"
        title="Contact form"
        style="display:block;width:100%;height:520px;border:none;overflow:hidden"
        loading="lazy"
      ></iframe>
      <p style="margin-top:16px;font-size:13px;color:#94a3b8">
        Prefer email?
        <a href="mailto:hello@iakpress.com?subject=XPressUI%20Contact" style="color:#059669;font-weight:700;text-decoration:none">hello@iakpress.com</a>
      </p>
    </section>
  </div>
</main>

<?php get_footer( 'xpressui' ); ?>
