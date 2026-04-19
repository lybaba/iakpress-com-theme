<?php
/**
 * Template for the /pro/ page — XPressUI Pro dark-theme sales page.
 * WordPress automatically loads this for a page with slug "pro".
 */

$xpressui_active_route = 'pro';

$pro_features = [
  ['icon' => '⚡', 'label' => 'Design any intake in minutes',         'desc' => 'Drag fields, set steps, add conditional logic — no code, no PHP. Export to WordPress when you\'re done.'],
  ['icon' => '🔀', 'label' => 'Skip irrelevant questions automatically', 'desc' => 'Conditional steps adapt to each client\'s answers. Clients only see what\'s relevant to them.'],
  ['icon' => '📎', 'label' => 'Collect files without a plugin stack',  'desc' => 'Upload fields, approval flows, and document collection built in. No add-ons needed.'],
  ['icon' => '📤', 'label' => 'One click to deploy on WordPress',      'desc' => 'Export as a ZIP, upload in wp-admin. The workflow is live as a shortcode immediately.'],
  ['icon' => '📥', 'label' => 'Review everything in one screen',       'desc' => 'Submissions, files, and status — New / In Review / Done — all inside wp-admin.'],
  ['icon' => '🔑', 'label' => 'Lifetime license · 5 sites',           'desc' => 'Pay once, use it on up to 5 WordPress sites. Updates included, no subscription.'],
];

$personas = [
  ['icon' => '🧑‍💻', 'role' => 'Freelancer building 3–5 sites a year',     'pain' => 'You spend hours chasing briefs and missing files before every project starts.',           'win' => 'One intake page collects everything before kickoff — no more back-and-forth.'],
  ['icon' => '🏢',   'role' => 'Small agency with recurring onboarding',    'pain' => 'Every client onboarding is a variation of the same scattered email thread.',             'win' => 'Standardize the intake once, deploy on every client site in minutes.'],
  ['icon' => '🛠️',  'role' => 'Developer who builds for clients',          'pain' => 'Clients ask for custom intake forms that take days to build from scratch.',              'win' => 'Deliver polished intake flows faster — without hand-coding HTML forms each time.'],
];

$screenshots = [
  ['src' => xpressui_asset_url( 'admin-workflows.png' ),         'label' => 'Workflow builder',    'desc' => 'Design steps, fields, and conditional logic — then export. No code.'],
  ['src' => xpressui_asset_url( 'admin-project-inbox.png' ),     'label' => 'Submissions inbox',   'desc' => 'Every new submission lands here. No more scattered emails.'],
  ['src' => xpressui_asset_url( 'admin-submission-detail.png' ), 'label' => 'Submission detail',   'desc' => 'Answers, files, and notes in one structured screen.'],
];

$faq_items = [
  ['q' => 'Do I need to know PHP or JavaScript?',           'a' => 'No. The builder is fully visual. Activating the plugin in wp-admin is the only technical step. If you can install a WordPress plugin, you can use XPressUI Pro.'],
  ['q' => 'What if it conflicts with my WordPress theme?',  'a' => 'XPressUI uses strictly scoped CSS. The intake form is isolated from your theme — it won\'t inherit or override your theme\'s styles. It works with Divi, Elementor, Astra, and any other theme.'],
  ['q' => 'What is the refund policy?',                     'a' => '30-day money-back guarantee. If it doesn\'t work for your WordPress setup within 30 days, email us at hello@iakpress.com and we\'ll refund you in full — no questions asked.'],
  ['q' => 'What is included in the Pro license?',           'a' => 'Full access to the XPressUI Console builder. Design any workflow, export it to WordPress with one click, and manage all submissions in one place. Lifetime updates included.'],
  ['q' => 'How many sites does the license cover?',         'a' => 'Up to 5 sites. One purchase, five activations — no extra cost per site.'],
  ['q' => 'Is it really a lifetime license?',               'a' => 'Yes. Pay once, use it forever. No subscription, no annual renewal. All future updates are included.'],
  ['q' => 'Can I try it before buying?',                    'a' => 'Yes. The free plugin ships with two built-in workflows. Install it, embed the shortcode, and see how the intake experience works before purchasing Pro.'],
  ['q' => 'What happens after I purchase?',                 'a' => 'You receive a license key by email immediately after checkout. Activate the Pro plugin on your WordPress site and start building custom workflows right away.'],
];

get_header('xpressui');
?>

<div style="background:linear-gradient(170deg,#060d18 0%,#0b1624 55%,#0d1e30 100%);color:#e8f0f8;min-height:100vh">

  <!-- Hero -->
  <section style="position:relative;overflow:hidden;padding:80px 0 72px">
    <div style="position:absolute;inset:0;background:radial-gradient(ellipse 60% 50% at 70% -10%,rgba(41,102,255,.22),transparent),radial-gradient(ellipse 40% 60% at 0% 80%,rgba(10,122,90,.18),transparent);pointer-events:none"></div>
    <div class="container" style="position:relative">
      <div style="max-width:700px">
        <div style="display:inline-flex;align-items:center;gap:8px;padding:6px 14px;border-radius:999px;background:rgba(41,102,255,.15);border:1px solid rgba(41,102,255,.3);color:#7eb3ff;font-size:.75rem;font-weight:800;letter-spacing:.08em;text-transform:uppercase;margin-bottom:24px">
          <span>★</span><span>XPressUI Pro</span>
        </div>
        <h1 style="margin:0 0 20px;font-family:'Fraunces',Georgia,serif;font-size:clamp(2.6rem,5vw,4.6rem);line-height:1.0;letter-spacing:-.04em;color:#fff">
          Stop building intake flows from scratch.
          <span style="background:linear-gradient(90deg,#4fa8ff,#5de8c0);-webkit-background-clip:text;-webkit-text-fill-color:transparent"> Ship a polished one this afternoon.</span>
        </h1>
        <p style="margin:0 0 32px;font-size:1.12rem;line-height:1.65;color:rgba(200,220,240,.78);max-width:52ch">
          Pro unlocks the visual workflow builder — design any multi-step intake, add conditional logic and file uploads, then deploy it to any WordPress site in one click. No PHP. No rebuilding from scratch each time.
        </p>
        <div style="display:flex;gap:12px;flex-wrap:wrap;align-items:center">
          <button class="xpressui-checkout-btn" style="display:inline-flex;align-items:center;justify-content:center;min-height:56px;padding:0 28px;border-radius:16px;border:none;cursor:pointer;background:linear-gradient(135deg,#1a56db 0%,#0a7a5a 100%);color:#fff;font-weight:800;font-size:1rem;font-family:inherit;box-shadow:0 20px 50px rgba(26,86,219,.4)">
            Buy Pro — €49 lifetime →
          </button>
          <a href="<?php echo esc_url( home_url( '/install/' ) ); ?>" style="display:inline-flex;align-items:center;justify-content:center;min-height:56px;padding:0 24px;border-radius:16px;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.12);color:rgba(220,235,250,.88);font-weight:700;font-size:1rem;font-family:inherit;text-decoration:none">
            See the free starter first
          </a>
        </div>
        <p style="margin-top:16px;font-size:.82rem;color:rgba(160,190,220,.6)">Lifetime license · Up to 5 sites · 30-day money-back guarantee</p>
      </div>
    </div>
  </section>

  <!-- Value math -->
  <section style="padding:0 0 56px">
    <div class="container">
      <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:12px">
        <?php foreach ([
          ['stat' => '2–3 h',    'label' => 'Saved per client onboarding',  'note' => 'No more chasing briefs and missing files by email'],
          ['stat' => '< 30 min', 'label' => 'To go live on WordPress',       'note' => 'Build, export, shortcode — done'],
          ['stat' => '€49',      'label' => 'Paid back in one project',      'note' => 'One saved onboarding covers the full cost'],
        ] as $item): ?>
        <div style="padding:22px 24px;border-radius:20px;background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.07);text-align:center">
          <div style="font-size:2rem;font-weight:800;color:#5de8c0;letter-spacing:-.04em;line-height:1;margin-bottom:8px"><?php echo esc_html($item['stat']); ?></div>
          <div style="font-size:.88rem;font-weight:700;color:rgba(220,235,250,.9);margin-bottom:6px"><?php echo esc_html($item['label']); ?></div>
          <div style="font-size:.78rem;color:rgba(140,175,210,.6);line-height:1.45"><?php echo esc_html($item['note']); ?></div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Who is this for -->
  <section style="padding:56px 0 64px;border-top:1px solid rgba(255,255,255,.05)">
    <div class="container">
      <p style="font-size:.75rem;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:rgba(120,160,200,.6);margin:0 0 12px">Who buys Pro</p>
      <h2 style="margin:0 0 28px;font-family:'Fraunces',Georgia,serif;font-size:clamp(1.9rem,3vw,2.6rem);letter-spacing:-.04em;line-height:1.05;color:#fff">Built for people who onboard clients repeatedly.</h2>
      <div style="display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:14px">
        <?php foreach ($personas as $p): ?>
        <div style="padding:24px;border-radius:20px;background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.07);display:grid;gap:12px;align-content:start">
          <span style="font-size:1.8rem"><?php echo $p['icon']; ?></span>
          <strong style="font-size:.92rem;color:rgba(220,235,250,.9);line-height:1.3"><?php echo esc_html($p['role']); ?></strong>
          <p style="margin:0;font-size:.82rem;color:rgba(140,175,210,.55);line-height:1.55"><span style="color:rgba(255,120,100,.75);font-weight:700">Before: </span><?php echo esc_html($p['pain']); ?></p>
          <p style="margin:0;font-size:.82rem;color:rgba(140,220,170,.7);line-height:1.55"><span style="font-weight:700">After: </span><?php echo esc_html($p['win']); ?></p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Screenshots -->
  <section style="padding:56px 0 64px;border-top:1px solid rgba(255,255,255,.05)">
    <div class="container">
      <p style="font-size:.75rem;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:rgba(120,160,200,.6);margin:0 0 12px">What you get access to</p>
      <h2 style="margin:0 0 28px;font-family:'Fraunces',Georgia,serif;font-size:clamp(1.9rem,3vw,2.6rem);letter-spacing:-.04em;line-height:1.05;color:#fff">The important screens are already built.</h2>
      <div style="display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:14px">
        <?php foreach ($screenshots as $s): ?>
        <div style="border-radius:20px;overflow:hidden;border:1px solid rgba(255,255,255,.07);background:rgba(255,255,255,.03);box-shadow:0 32px 64px rgba(0,0,0,.4)">
          <div style="background:rgba(10,20,36,.8);padding:8px 12px;display:flex;align-items:center;gap:6px;border-bottom:1px solid rgba(255,255,255,.06)">
            <span style="width:9px;height:9px;border-radius:50%;background:rgba(255,80,80,.5);display:block"></span>
            <span style="width:9px;height:9px;border-radius:50%;background:rgba(255,190,50,.5);display:block"></span>
            <span style="width:9px;height:9px;border-radius:50%;background:rgba(50,205,100,.5);display:block"></span>
            <span style="margin-left:6px;font-size:.7rem;color:rgba(160,190,220,.45);font-weight:600"><?php echo esc_html($s['label']); ?></span>
          </div>
          <div style="aspect-ratio:16/10;overflow:hidden;background:#0d1a2a">
            <img src="<?php echo esc_attr($s['src']); ?>" alt="<?php echo esc_attr($s['label']); ?>" style="width:100%;height:100%;object-fit:cover;object-position:top;opacity:.92">
          </div>
          <div style="padding:14px 16px">
            <strong style="display:block;font-size:.9rem;color:rgba(220,235,250,.9);margin-bottom:4px"><?php echo esc_html($s['label']); ?></strong>
            <p style="margin:0;font-size:.82rem;color:rgba(140,175,210,.65);line-height:1.5"><?php echo esc_html($s['desc']); ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Feature grid -->
  <section style="padding:56px 0 64px;border-top:1px solid rgba(255,255,255,.05)">
    <div class="container">
      <div style="display:grid;grid-template-columns:minmax(0,1fr) minmax(0,2fr);gap:48px;align-items:start">
        <div>
          <p style="font-size:.75rem;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:rgba(120,160,200,.6);margin:0 0 12px">What's included</p>
          <h2 style="margin:0 0 16px;font-family:'Fraunces',Georgia,serif;font-size:clamp(1.9rem,3vw,2.6rem);letter-spacing:-.04em;line-height:1.05;color:#fff">Everything to ship faster.</h2>
          <p style="margin:0 0 28px;color:rgba(160,195,230,.7);line-height:1.65">One purchase unlocks the full builder, unlimited workflows, and lifetime updates.</p>
          <button class="xpressui-checkout-btn" style="display:inline-flex;align-items:center;justify-content:center;min-height:56px;padding:0 28px;border-radius:16px;border:none;cursor:pointer;background:linear-gradient(135deg,#1a56db 0%,#0a7a5a 100%);color:#fff;font-weight:800;font-size:1rem;font-family:inherit">
            Buy Pro →
          </button>
        </div>
        <div style="display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:12px">
          <?php foreach ($pro_features as $f): ?>
          <div style="padding:20px;border-radius:18px;background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.07)">
            <span style="font-size:1.4rem;display:block;margin-bottom:10px"><?php echo $f['icon']; ?></span>
            <strong style="display:block;font-size:.9rem;color:rgba(220,235,250,.9);margin-bottom:4px"><?php echo esc_html($f['label']); ?></strong>
            <p style="margin:0;font-size:.82rem;color:rgba(140,175,210,.6);line-height:1.5"><?php echo esc_html($f['desc']); ?></p>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <!-- Pricing -->
  <section style="padding:56px 0 72px;border-top:1px solid rgba(255,255,255,.05)">
    <div class="container" style="max-width:680px">
      <div style="border-radius:28px;padding:40px;background:linear-gradient(145deg,rgba(26,86,219,.14) 0%,rgba(10,122,90,.1) 100%);border:1px solid rgba(80,140,255,.2);box-shadow:0 0 80px rgba(26,86,219,.12),0 40px 80px rgba(0,0,0,.4)">
        <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;margin-bottom:4px">
          <div style="display:inline-flex;align-items:center;gap:8px;padding:6px 14px;border-radius:999px;background:rgba(10,122,90,.2);border:1px solid rgba(10,122,90,.35);color:#5de8c0;font-size:.72rem;font-weight:800;letter-spacing:.1em;text-transform:uppercase">
            <span>●</span><span>Pro · Lifetime</span>
          </div>
          <div style="display:inline-flex;align-items:center;gap:6px;padding:5px 12px;border-radius:999px;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1);font-size:.72rem;font-weight:700;color:rgba(200,225,200,.7)">
            🛡 30-day money-back guarantee
          </div>
        </div>
        <div style="display:flex;align-items:baseline;gap:12px;margin:20px 0 8px">
          <span style="font-size:4.5rem;font-weight:800;letter-spacing:-.05em;color:#fff;line-height:1">€49</span>
          <span style="color:rgba(160,195,230,.6);font-size:.95rem">one-time · lifetime · up to 5 sites</span>
        </div>
        <p style="margin:0 0 8px;color:rgba(160,195,230,.65);line-height:1.6">Pay once. Full builder access forever. No subscription, no renewal.</p>
        <p style="margin:0 0 28px;font-size:.82rem;color:rgba(140,175,210,.5);line-height:1.5">
          Not happy within 30 days? Email <a href="mailto:hello@iakpress.com" style="color:rgba(140,210,175,.7)">hello@iakpress.com</a> for a full refund — no questions asked.
        </p>
        <button class="xpressui-checkout-btn" style="width:100%;display:flex;align-items:center;justify-content:center;min-height:60px;padding:0 28px;border-radius:16px;border:none;cursor:pointer;background:linear-gradient(135deg,#1a56db 0%,#0a7a5a 100%);color:#fff;font-weight:800;font-size:1.05rem;font-family:inherit">
          Buy Pro — get your license key →
        </button>
        <p style="text-align:center;font-size:.82rem;color:rgba(140,175,210,.5);margin-top:14px">License key delivered by email · Stripe secure checkout</p>
        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:10px;margin-top:24px;padding-top:24px;border-top:1px solid rgba(255,255,255,.07)">
          <?php foreach (['Full builder access', 'Up to 5 sites', 'Lifetime updates'] as $t): ?>
          <div style="text-align:center;font-size:.8rem;color:rgba(160,195,230,.55);padding:10px 6px;border-radius:12px;background:rgba(255,255,255,.04)">
            <span style="color:#5de8c0;margin-right:5px">✓</span><?php echo esc_html($t); ?>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section style="padding:0 0 80px;border-top:1px solid rgba(255,255,255,.05)">
    <div class="container" style="max-width:740px;padding-top:56px">
      <p style="font-size:.75rem;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:rgba(120,160,200,.6);margin:0 0 12px">FAQ</p>
      <h2 style="margin:0 0 36px;font-family:'Fraunces',Georgia,serif;font-size:clamp(1.9rem,3vw,2.6rem);letter-spacing:-.04em;line-height:1.05;color:#fff">Common questions.</h2>
      <div style="display:grid;gap:2px">
        <?php foreach ($faq_items as $i => $item):
          $total = count($faq_items);
          $r = $i === 0 ? '18px 18px 4px 4px' : ($i === $total - 1 ? '4px 4px 18px 18px' : '4px');
        ?>
        <div style="padding:20px 22px;border-radius:<?php echo $r; ?>;background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.07)">
          <strong style="display:block;color:rgba(220,235,250,.9);margin-bottom:6px;font-size:.95rem"><?php echo esc_html($item['q']); ?></strong>
          <p style="margin:0;color:rgba(140,175,210,.65);line-height:1.65;font-size:.9rem"><?php echo esc_html($item['a']); ?></p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Final CTA -->
  <section style="padding:60px 0;border-top:1px solid rgba(255,255,255,.05);text-align:center;background:radial-gradient(ellipse 60% 80% at 50% 100%,rgba(26,86,219,.12),transparent)">
    <div class="container" style="max-width:560px">
      <h2 style="margin:0 0 12px;font-family:'Fraunces',Georgia,serif;font-size:clamp(1.9rem,3vw,2.6rem);letter-spacing:-.04em;line-height:1.05;color:#fff">Your next client onboarding starts cleaner.</h2>
      <p style="margin:0 0 6px;color:rgba(160,195,230,.65);line-height:1.65">One purchase. Unlimited workflows. Lifetime license.</p>
      <p style="margin:0 0 28px;font-size:.82rem;color:rgba(120,160,200,.5)">30-day money-back guarantee — risk-free.</p>
      <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap">
        <button class="xpressui-checkout-btn" style="display:inline-flex;align-items:center;justify-content:center;min-height:56px;padding:0 28px;border-radius:16px;border:none;cursor:pointer;background:linear-gradient(135deg,#1a56db 0%,#0a7a5a 100%);color:#fff;font-weight:800;font-size:1rem;font-family:inherit">
          Buy Pro — €49 →
        </button>
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" style="display:inline-flex;align-items:center;justify-content:center;min-height:56px;padding:0 24px;border-radius:16px;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.12);color:rgba(220,235,250,.88);font-weight:700;font-size:1rem;font-family:inherit;text-decoration:none">
          Questions? Contact us
        </a>
      </div>
    </div>
  </section>

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
