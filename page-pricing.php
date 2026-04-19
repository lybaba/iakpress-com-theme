<?php
/**
 * Template for the /pricing/ page — full feature comparison table and FAQ.
 * WordPress automatically loads this for a page with slug "pricing".
 */

$xpressui_active_route = 'pricing';
$download_url = 'https://github.com/lybaba/xpressui-wordpress-bridge/releases/latest';

$rows = [
  // Bundled workflows
  ['group' => 'Bundled workflows',        'label' => 'Document Intake starter workflow',                          'free' => true,  'pro' => true],
  ['group' => '',                          'label' => 'Validation Playground (QA tool)',                          'free' => false, 'pro' => true],
  // Custom workflows
  ['group' => 'Custom workflows',          'label' => 'Install custom workflow packs from the Console',           'free' => false, 'pro' => true],
  ['group' => '',                          'label' => 'Visual Console builder — design any intake flow',          'free' => false, 'pro' => true],
  ['group' => '',                          'label' => 'One-click export to WordPress (.zip)',                     'free' => false, 'pro' => true],
  ['group' => '',                          'label' => 'Unlimited custom workflows',                               'free' => false, 'pro' => true],
  // Field types
  ['group' => 'Field types',              'label' => 'Core fields (text, email, file, select…)',                 'free' => true,  'pro' => true],
  ['group' => '',                          'label' => 'Advanced fields (QR scan, document scan, quiz, product list…)', 'free' => false, 'pro' => true],
  // WordPress inbox
  ['group' => 'WordPress submission inbox', 'label' => 'Submission inbox per project',                           'free' => true,  'pro' => true],
  ['group' => '',                          'label' => 'Status workflow (New → In review → Done)',                 'free' => true,  'pro' => true],
  ['group' => '',                          'label' => 'Team assignment and My Queue',                             'free' => true,  'pro' => true],
  ['group' => '',                          'label' => 'Email notification per project',                           'free' => true,  'pro' => true],
  ['group' => '',                          'label' => 'File uploads stored as WP media',                         'free' => true,  'pro' => true],
  ['group' => '',                          'label' => 'Post-submit redirect URL',                                 'free' => true,  'pro' => true],
  // Local customization
  ['group' => 'Local customization (wp-admin)', 'label' => 'Customize labels, help text, and choice labels',    'free' => false, 'pro' => true],
  ['group' => '',                          'label' => 'Customize validation rules and upload limits',             'free' => false, 'pro' => true],
  ['group' => '',                          'label' => 'Design tokens — colors, fonts, border radius',            'free' => false, 'pro' => true],
  // Delivery
  ['group' => 'Delivery and support',     'label' => 'Automatic plugin updates',                                 'free' => false, 'pro' => true],
  ['group' => '',                          'label' => 'License valid on up to 5 WordPress sites',                'free' => false, 'pro' => true],
  ['group' => '',                          'label' => 'Community support via GitHub Issues',                     'free' => true,  'pro' => true],
  ['group' => '',                          'label' => 'Priority email support (1–2 business days)',              'free' => false, 'pro' => true],
];

$faq_items = [
  ['q' => 'What does the free plugin actually give me?',       'a' => 'The free plugin ships with the Document Intake workflow ready to use — no Console access needed. You get the full WordPress inbox: submissions, status tracking, team assignment, file uploads, and email notifications.'],
  ['q' => 'Why do I need Pro to install custom workflow packs?', 'a' => 'Custom packs are designed in the XPressUI Console and exported as .zip files. The Pro extension handles installation, the full runtime, and advanced field types. The free plugin only supports the bundled starter.'],
  ['q' => 'Can I try it before buying?',                       'a' => 'Yes. Download the free plugin from GitHub, install the document-intake shortcode on any page, and see the full client and admin experience before purchasing anything.'],
  ['q' => 'Is the €49 a subscription?',                        'a' => 'No — it\'s a one-time payment. You get lifetime access and all future updates for up to 5 WordPress sites. No annual renewal.'],
  ['q' => 'What is the refund policy?',                        'a' => '30-day money-back guarantee, no questions asked. Email hello@iakpress.com within 30 days of purchase.'],
];

get_header('xpressui');
?>

<div class="page-shell">
  <main class="container page-stack" style="padding-top:56px">

    <!-- Hero -->
    <section style="text-align:center;max-width:640px;margin:0 auto 56px">
      <p class="section-kicker">Pricing</p>
      <h1 style="font-family:'Fraunces',Georgia,serif;font-size:clamp(2.2rem,4vw,3.4rem);letter-spacing:-.04em;line-height:1.05;margin:0 0 16px">
        Free to start.<br>Pro when you need more.
      </h1>
      <p style="color:#64748b;line-height:1.65;margin:0">
        The free plugin ships with a ready-to-use document intake workflow.
        Pro unlocks the Console builder, custom pack install, and advanced field types.
      </p>
    </section>

    <!-- Pricing cards -->
    <section class="pricing-grid" style="margin-bottom:64px">
      <article class="pricing-card">
        <span class="pricing-tag">Free</span>
        <h3>Open source plugin</h3>
        <div class="price-row">
          <strong>€0</strong>
          <span>available on GitHub</span>
        </div>
        <ul class="check-list">
          <li><strong>1</strong> bundled Document Intake workflow</li>
          <li>WordPress submission inbox</li>
          <li>File uploads, status tracking, team assignment</li>
          <li>Data stays in your WordPress DB</li>
          <li>Community support via GitHub</li>
        </ul>
        <div class="pricing-card-footer">
          <a href="<?php echo esc_url($download_url); ?>" target="_blank" rel="noreferrer" class="btn btn-primary btn-block">Download the plugin</a>
        </div>
      </article>

      <article class="pricing-card pricing-card-featured">
        <span class="pricing-tag pricing-tag-dark">Pro</span>
        <h3>Visual workflow builder</h3>
        <div class="price-row">
          <strong>€49</strong>
          <span>one-time · lifetime license · 5 sites</span>
        </div>
        <ul class="check-list">
          <li>Everything in Free</li>
          <li>Console builder — design any intake flow</li>
          <li>Custom workflow pack install</li>
          <li>Advanced field types (QR scan, doc scan, quiz…)</li>
          <li>Customize labels, validation, design tokens in wp-admin</li>
          <li>Automatic plugin updates</li>
          <li>Priority email support (1–2 business days)</li>
        </ul>
        <div class="pricing-card-footer">
          <button class="btn btn-dark btn-block xpressui-checkout-btn">Get Pro — €49 →</button>
          <p style="margin:10px 0 0;font-size:.75rem;color:rgba(255,255,255,0.5);text-align:center">30-day money-back guarantee · Stripe secure checkout</p>
        </div>
      </article>
    </section>

    <!-- Comparison table -->
    <section class="section-block">
      <div class="section-heading">
        <p class="section-kicker">Compare plans</p>
        <h2>Full feature breakdown.</h2>
      </div>

      <div style="border:1px solid #e2e8f0;border-radius:18px;overflow:hidden;background:#fff;box-shadow:0 16px 34px rgba(18,32,51,.05)">
        <!-- Header -->
        <div style="display:grid;grid-template-columns:1fr 100px 100px;background:#f8fafc;border-bottom:1px solid #e2e8f0">
          <div style="padding:14px 20px;font-size:.8rem;font-weight:700;color:#475569">Feature</div>
          <div style="padding:14px 16px;font-size:.8rem;font-weight:700;color:#475569;border-left:1px solid #e2e8f0;text-align:center">Free</div>
          <div style="padding:14px 16px;font-size:.8rem;font-weight:700;color:#1e293b;border-left:1px solid #e2e8f0;text-align:center">Pro</div>
        </div>

        <?php
        $current_group = '';
        $total = count($rows);
        foreach ($rows as $i => $row):
          $is_last = ($i === $total - 1);
          $is_new_group = ($row['group'] !== '' && $row['group'] !== $current_group);
          if ($row['group'] !== '') $current_group = $row['group'];
        ?>
          <?php if ($is_new_group): ?>
          <div style="display:grid;grid-template-columns:1fr 100px 100px;background:#f1f5f9;<?php echo $i > 0 ? 'border-top:1px solid #e2e8f0;' : ''; ?>border-bottom:1px solid #e2e8f0">
            <div style="padding:8px 20px;font-size:.72rem;font-weight:800;color:#64748b;letter-spacing:.07em;text-transform:uppercase"><?php echo esc_html($row['group']); ?></div>
            <div style="border-left:1px solid #e2e8f0"></div>
            <div style="border-left:1px solid #e2e8f0"></div>
          </div>
          <?php endif; ?>

          <div style="display:grid;grid-template-columns:1fr 100px 100px;align-items:center;<?php echo $is_last ? '' : 'border-bottom:1px solid #f1f5f9'; ?>">
            <div style="padding:13px 20px;font-size:.9rem;color:#334155"><?php echo esc_html($row['label']); ?></div>
            <div style="padding:13px 16px;text-align:center;border-left:1px solid #f1f5f9;font-size:1rem">
              <?php if ($row['free'] === true): ?>
                <span style="color:#16a34a">✓</span>
              <?php elseif ($row['free'] === false): ?>
                <span style="color:#cbd5e1">—</span>
              <?php else: ?>
                <span style="font-size:.82rem;color:#64748b"><?php echo esc_html($row['free']); ?></span>
              <?php endif; ?>
            </div>
            <div style="padding:13px 16px;text-align:center;border-left:1px solid #f1f5f9;font-size:1rem<?php echo $row['pro'] === true ? ';background:rgba(16,185,129,.04)' : ''; ?>">
              <?php if ($row['pro'] === true): ?>
                <span style="color:#059669;font-weight:700">✓</span>
              <?php elseif ($row['pro'] === false): ?>
                <span style="color:#cbd5e1">—</span>
              <?php else: ?>
                <span style="font-size:.82rem;color:#64748b"><?php echo esc_html($row['pro']); ?></span>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- FAQ -->
    <section class="section-block faq-shell">
      <div class="section-heading">
        <p class="section-kicker">FAQ</p>
        <h2>Common questions.</h2>
      </div>
      <div class="faq-grid">
        <?php foreach ($faq_items as $item): ?>
        <article class="faq-card">
          <h3><?php echo esc_html($item['q']); ?></h3>
          <p><?php echo esc_html($item['a']); ?></p>
        </article>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- CTA -->
    <section class="final-cta-band">
      <div>
        <p class="section-kicker">Ready to start?</p>
        <h2>Free plugin or Pro — both ship today.</h2>
        <p>Download the free plugin and try the intake experience. Upgrade to Pro when you need custom workflows.</p>
      </div>
      <div style="display:flex;gap:1rem;flex-wrap:wrap">
        <button class="btn btn-primary xpressui-checkout-btn">Get Pro — €49 →</button>
        <a href="<?php echo esc_url($download_url); ?>" target="_blank" rel="noreferrer" class="btn btn-outline">Download free plugin</a>
      </div>
    </section>

  </main>
</div>

<script>
(function () {
  var API = 'https://xpressui.iakpress.com';
  document.querySelectorAll('.xpressui-checkout-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
      if (btn.disabled) return;
      var original = btn.textContent;
      btn.disabled = true;
      btn.textContent = 'Redirecting\u2026';
      fetch(API + '/api/v1/billing/create-public-checkout-session', { method: 'POST' })
        .then(function (r) { return r.ok ? r.json() : Promise.reject(); })
        .then(function (data) { window.location.href = data.checkoutUrl; })
        .catch(function () {
          btn.disabled = false;
          btn.textContent = original;
          alert('Unable to start checkout. Please try again or contact us at hello@iakpress.com.');
        });
    });
  });
})();
</script>

<?php get_footer('xpressui'); ?>
