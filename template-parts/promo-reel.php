<?php
/**
 * Shared, data-driven IntakeFlow promo reel (7 scenes, looping ~21s).
 *
 * Renders entirely from a $reel data array so the EN and FR variants share ONE
 * copy of the markup + inline CSS — design/animation tweaks happen here once.
 * The per-language copy is provided by the page template (page-tour.php) and
 * passed in via:
 *
 *   set_query_var( 'iaktour_reel', $reel );
 *   get_template_part( 'template-parts/promo-reel' );
 *
 * $reel shape:
 *   [
 *     'brand_tag' => string,   // small uppercase tag next to the brand mark
 *     'scenes'    => [
 *        // intro / CTA (centered):
 *        [ 'type' => 'center', 'logo' => ?string, 'h1' => html, 'sub' => ?text, 'cta' => ?text ],
 *        // image scenes:
 *        [ 'type' => 'image', 'chip' => text, 'h2' => html, 'caption' => text,
 *          'url' => text, 'img' => 'file.png', 'bgpos' => '50% 30%', 'bgsize' => '150%' ],
 *     ],
 *   ]
 *
 * Notes kept from the original page-tour.php (do not regress):
 * - assets resolve via get_stylesheet_directory_uri() (this is a GeneratePress
 *   CHILD theme — the promo images live in THIS theme, not the parent).
 * - per-scene delays use :nth-of-type (NOT :nth-child, NOT animation-delay:inherit).
 * - the progress bar sweeps once per loop using var(--T).
 * - responsive frame + prefers-reduced-motion fallback.
 */

$reel = get_query_var( 'iaktour_reel' );
if ( ! is_array( $reel ) || empty( $reel['scenes'] ) ) {
    return;
}

// IAKPress.com is a GeneratePress CHILD theme — use the stylesheet (child) dir.
$promo_base = esc_url( get_stylesheet_directory_uri() ) . '/assets/img/promo';
$brand_tag  = isset( $reel['brand_tag'] ) ? $reel['brand_tag'] : '';

/*
 * Embed mode: when the reel is shown inline inside another page (e.g. the
 * homepage "workflow intro" card) instead of full-page at /tour/. Set via:
 *
 *   set_query_var( 'iaktour_embed', array( 'href' => '/tour/', 'label' => '…' ) );
 *
 * In embed mode the reel:
 *   - does NOT take the viewport (no min-height / dark page padding);
 *   - fills the host card's width (the square stage is letterboxed inside it);
 *   - keeps the looping animation, all prior fixes, and reduced-motion fallback;
 *   - is wrapped in an <a> so the whole preview opens the full tour, with a
 *     subtle play/expand affordance. The inner reel is decorative (pointer-events
 *     off) so the link captures every click.
 */
$embed     = get_query_var( 'iaktour_embed' );
$is_embed  = is_array( $embed ) && ! empty( $embed['href'] );
$embed_href  = $is_embed ? $embed['href'] : '';
$embed_label = $is_embed && ! empty( $embed['label'] ) ? $embed['label'] : 'Watch the tour';

$wrap_class = 'iaktour-page' . ( $is_embed ? ' iaktour-page--embed' : '' );
?>

<div class="<?php echo esc_attr( $wrap_class ); ?>">
  <style>
    /* ===== IntakeFlow Product Tour reel (scoped under .iaktour-page) ===== */
    .iaktour-page{
      --violet:#7c5cff; --violet2:#3f6bff; --ink:#0a0720;
      --pageW:1080px;
      --T:21s; /* total loop = 7 scenes x 3s */
      background:#05030f;
      display:flex; align-items:center; justify-content:center;
      padding:32px 16px;
      min-height:70vh;
      font-family:"Segoe UI",system-ui,-apple-system,Roboto,Arial,sans-serif;
      -webkit-font-smoothing:antialiased;
    }
    .iaktour-page *{box-sizing:border-box;margin:0;padding:0}

    /* Responsive wrapper: the stage is a fixed 1080x1080 square that scales down
       to fit the viewport width while preserving its aspect ratio. */
    .iaktour-frame{
      position:relative;
      width:min(var(--pageW), 100%);
      aspect-ratio:1 / 1;
      overflow:hidden;
      border-radius:18px;
      box-shadow:0 40px 120px -40px rgba(124,92,255,.5);
    }
    .iaktour-frame .stage{
      position:absolute; top:0; left:0;
      width:var(--pageW); height:var(--pageW);
      transform-origin:top left;
      /* scale the 1080px stage down to the frame width */
      transform:scale(calc(min(var(--pageW), 100vw - 32px) / var(--pageW)));
    }
    /* Cap the down-scale so the stage never grows past 1080 on huge screens */
    @media (min-width:1112px){
      .iaktour-frame .stage{ transform:none; }
      .iaktour-frame{ width:var(--pageW); }
    }

    .iaktour-page .stage{
      overflow:hidden; color:#fff;
      background:radial-gradient(125% 120% at 72% 8%,#2a1a72 0%,#150c3a 52%,#0a0722 100%);
    }
    .iaktour-page .stage::before{
      content:""; position:absolute; inset:0;
      background:radial-gradient(40% 35% at 18% 88%,rgba(124,92,255,.30),transparent 70%);
      pointer-events:none;
    }

    /* brand + progress (persistent) */
    .iaktour-page .brand{
      position:absolute; top:46px; left:54px; z-index:9;
      display:flex; align-items:center; gap:14px;
      font-weight:800; font-size:30px; letter-spacing:.2px;
    }
    .iaktour-page .brand .dot{
      width:18px; height:18px; border-radius:6px;
      background:linear-gradient(135deg,var(--violet),var(--violet2));
      box-shadow:0 0 22px rgba(124,92,255,.8);
    }
    .iaktour-page .brand small{
      font-weight:600; font-size:15px; opacity:.62; letter-spacing:2px; text-transform:uppercase;
    }
    .iaktour-page .progress{
      position:absolute; left:54px; right:54px; bottom:42px; height:5px; border-radius:5px;
      background:rgba(255,255,255,.12); overflow:hidden; z-index:9;
    }
    .iaktour-page .progress::after{
      content:""; position:absolute; inset:0; width:100%; transform-origin:left;
      background:linear-gradient(90deg,var(--violet),var(--violet2));
      animation:iaktour-bar var(--T) infinite linear; /* one calm sweep per loop (global progress, not nervous) */
    }
    @keyframes iaktour-bar{0%{transform:scaleX(0)}100%{transform:scaleX(1)}}

    /* ===== scenes ===== */
    .iaktour-page .scene{
      position:absolute; inset:0; display:flex; align-items:center; gap:48px;
      padding:96px 72px 110px; opacity:0;
      animation:iaktour-scene var(--T) infinite both;
    }
    /* The delay must sit on the scene AND its animated text descendants — using
       animation-delay:inherit breaks because .copy/.center sit in between.
       Use :nth-of-type (the scenes are the only <section> children): :nth-child
       would be off by the .brand/.progress divs that precede them in .stage. */
    .iaktour-page .scene:nth-of-type(1),.iaktour-page .scene:nth-of-type(1) :is(.chip,h1,h2,p,.cta){animation-delay:0s}
    .iaktour-page .scene:nth-of-type(2),.iaktour-page .scene:nth-of-type(2) :is(.chip,h1,h2,p,.cta){animation-delay:3s}
    .iaktour-page .scene:nth-of-type(3),.iaktour-page .scene:nth-of-type(3) :is(.chip,h1,h2,p,.cta){animation-delay:6s}
    .iaktour-page .scene:nth-of-type(4),.iaktour-page .scene:nth-of-type(4) :is(.chip,h1,h2,p,.cta){animation-delay:9s}
    .iaktour-page .scene:nth-of-type(5),.iaktour-page .scene:nth-of-type(5) :is(.chip,h1,h2,p,.cta){animation-delay:12s}
    .iaktour-page .scene:nth-of-type(6),.iaktour-page .scene:nth-of-type(6) :is(.chip,h1,h2,p,.cta){animation-delay:15s}
    .iaktour-page .scene:nth-of-type(7),.iaktour-page .scene:nth-of-type(7) :is(.chip,h1,h2,p,.cta){animation-delay:18s}
    @keyframes iaktour-scene{
      0%{opacity:0;transform:translateY(14px) scale(.99)}
      2.4%{opacity:1;transform:translateY(0) scale(1)}
      14.3%{opacity:1;transform:scale(1.014)}
      16.7%{opacity:0;transform:translateY(-10px) scale(1.02)}
      100%{opacity:0}
    }

    /* text column */
    .iaktour-page .copy{flex:0 0 41%;display:flex;flex-direction:column;justify-content:center;gap:22px}
    .iaktour-page .chip{
      align-self:flex-start;font-size:17px;font-weight:700;letter-spacing:.3px;color:#d9ccff;
      padding:9px 16px;border:1px solid rgba(124,92,255,.5);border-radius:999px;background:rgba(124,92,255,.12);
      animation:iaktour-rise var(--T) infinite both;
    }
    .iaktour-page .copy h2{
      font-size:62px;line-height:1.04;font-weight:800;letter-spacing:-1px;
      animation:iaktour-rise var(--T) infinite both;
    }
    .iaktour-page .copy h2 b{background:linear-gradient(120deg,#b9a6ff,#6d8bff);-webkit-background-clip:text;background-clip:text;color:transparent}
    .iaktour-page .copy p{
      font-size:25px;line-height:1.42;color:#c8c2e8;max-width:24ch;
      animation:iaktour-rise2 var(--T) infinite both;
    }
    @keyframes iaktour-rise{0%,2.4%{opacity:0;transform:translateY(26px)}6%{opacity:1;transform:translateY(0)}14.3%{opacity:1}16.7%{opacity:0}100%{opacity:0}}
    @keyframes iaktour-rise2{0%,4%{opacity:0;transform:translateY(22px)}8%{opacity:1;transform:translateY(0)}14.3%{opacity:1}16.7%{opacity:0}100%{opacity:0}}

    /* browser card + screenshot */
    .iaktour-page .device{
      flex:1;align-self:center;max-width:560px;border-radius:20px;overflow:hidden;
      background:#fff;box-shadow:0 40px 90px -30px rgba(0,0,0,.7),0 0 0 1px rgba(255,255,255,.06);
    }
    .iaktour-page .device .bar{height:42px;display:flex;align-items:center;gap:8px;padding:0 16px;background:#f3f1fb;border-bottom:1px solid #eee}
    .iaktour-page .device .bar i{width:11px;height:11px;border-radius:50%;background:#d9d6e6;display:inline-block}
    .iaktour-page .device .bar .url{
      margin-left:12px;font-size:13px;color:#8b86a3;background:#fff;border:1px solid #ececf4;
      border-radius:7px;padding:5px 12px;flex:1;font-family:inherit;
      white-space:nowrap;overflow:hidden;text-overflow:ellipsis;
    }
    .iaktour-page .shot{
      height:560px;background-repeat:no-repeat;background-color:#fff;
      background-size:var(--bgsize,140%);background-position:var(--bgpos,50% 26%);
    }

    /* centred scenes (intro / CTA) */
    .iaktour-page .center{justify-content:center;text-align:center;flex-direction:column;gap:26px}
    .iaktour-page .center .lock{display:flex;align-items:center;gap:18px}
    .iaktour-page .center .lock .dot{
      width:40px;height:40px;border-radius:13px;background:linear-gradient(135deg,var(--violet),var(--violet2));
      box-shadow:0 0 40px rgba(124,92,255,.8);
    }
    .iaktour-page .center .lock span{font-size:64px;font-weight:800;letter-spacing:-.5px}
    .iaktour-page .center h1{
      font-size:58px;font-weight:800;line-height:1.06;letter-spacing:-1px;max-width:18ch;
      animation:iaktour-rise var(--T) infinite both;
    }
    .iaktour-page .center h1 b{background:linear-gradient(120deg,#b9a6ff,#6d8bff);-webkit-background-clip:text;background-clip:text;color:transparent}
    .iaktour-page .center p{font-size:27px;color:#c8c2e8;animation:iaktour-rise2 var(--T) infinite both}
    .iaktour-page .cta{
      align-self:center;margin-top:10px;font-size:26px;font-weight:800;color:#fff;
      padding:18px 40px;border-radius:14px;background:linear-gradient(120deg,var(--violet),var(--violet2));
      box-shadow:0 18px 50px -14px rgba(124,92,255,.85);animation:iaktour-rise2 var(--T) infinite both;
    }

    @media (prefers-reduced-motion:reduce){
      .iaktour-page .scene{animation:none;opacity:1}
      .iaktour-page .scene:not(:nth-of-type(1)){display:none}
      .iaktour-page .chip,.iaktour-page .copy h2,.iaktour-page .copy p,
      .iaktour-page .center h1,.iaktour-page .center p,.iaktour-page .cta,
      .iaktour-page .progress::after{animation:none}
    }

    /* ===== Embed mode (inline preview inside another card) ===== */
    /* Not full-viewport: shrink-wrap to the host card, fill its width.
       The 1080px square stage already scales to the frame width via the
       responsive rule above; here we just let the frame be 100% of the card. */
    .iaktour-page--embed{
      display:block; padding:0; min-height:0; background:transparent;
    }
    .iaktour-page--embed .iaktour-link{
      display:block; position:relative; text-decoration:none; color:inherit;
      border-radius:18px; overflow:hidden; cursor:pointer;
      box-shadow:0 30px 90px -40px rgba(124,92,255,.55);
    }
    /* Square frame fills the card width; the 1080px stage is sized via container
       query so the absolutely-positioned scenes (and their px fonts/paddings)
       scale down proportionally and FILL the frame edge-to-edge — no white gap. */
    .iaktour-page--embed .iaktour-frame{
      width:100%; box-shadow:none; border-radius:18px;
      container-type:inline-size;
      pointer-events:none; /* the link captures the clicks */
    }
    /* Pin the stage to the frame and scale the 1080px design to the frame width.
       cqw = 1% of the frame's inline size, so 1080px == 100cqw. We position it at
       top-left, give it the design size, then scale by (frame width / 1080px). */
    .iaktour-page--embed .iaktour-frame .stage{
      top:0; left:0; right:auto; bottom:auto;
      width:var(--pageW); height:var(--pageW);
      transform-origin:top left;
      transform:scale(calc(100cqw / var(--pageW)));
    }
    /* Override the full-page >=1112 cap that pins the stage to 1080 and the frame
       to a fixed width — in embed mode the frame is always 100% of the card. */
    @media (min-width:1112px){
      .iaktour-page--embed .iaktour-frame{ width:100%; }
      .iaktour-page--embed .iaktour-frame .stage{
        transform:scale(calc(100cqw / var(--pageW)));
      }
    }
    /* Container queries unsupported: fall back to a CSS-var driven scale that at
       least keeps the stage filling the frame width (no white gap), even if the
       per-card precision is lost. */
    @supports not (width: 1cqw){
      .iaktour-page--embed .iaktour-frame .stage{
        width:100%; height:100%; transform:none;
      }
    }

    /* Subtle "click to expand" affordance + caption. */
    .iaktour-page--embed .iaktour-cta-overlay{
      position:absolute; inset:0; z-index:10; pointer-events:none;
      display:flex; align-items:flex-end; justify-content:space-between; gap:12px;
      padding:18px 20px;
      background:linear-gradient(to top,rgba(5,3,15,.55) 0%,rgba(5,3,15,0) 38%);
    }
    .iaktour-page--embed .iaktour-watch{
      display:inline-flex; align-items:center; gap:9px;
      font-family:"Segoe UI",system-ui,-apple-system,Roboto,Arial,sans-serif;
      font-size:14px; font-weight:800; letter-spacing:.2px; color:#fff;
      padding:9px 16px; border-radius:999px;
      background:rgba(124,92,255,.92);
      box-shadow:0 10px 30px -8px rgba(124,92,255,.9);
      transition:transform .2s ease, background .2s ease;
    }
    .iaktour-page--embed .iaktour-watch svg{width:14px;height:14px;display:block;fill:#fff}
    .iaktour-page--embed .iaktour-expand{
      display:inline-flex; align-items:center; justify-content:center;
      width:38px; height:38px; border-radius:50%;
      background:rgba(255,255,255,.16); backdrop-filter:blur(4px);
      box-shadow:0 6px 18px -6px rgba(0,0,0,.6);
      transition:transform .2s ease, background .2s ease;
    }
    .iaktour-page--embed .iaktour-expand svg{width:16px;height:16px;display:block;fill:#fff}
    .iaktour-page--embed .iaktour-link:hover .iaktour-watch{
      transform:translateY(-2px); background:rgba(124,92,255,1);
    }
    .iaktour-page--embed .iaktour-link:hover .iaktour-expand{
      transform:scale(1.08); background:rgba(255,255,255,.26);
    }
    .iaktour-page--embed .iaktour-link:focus-visible{
      outline:3px solid #7c5cff; outline-offset:3px;
    }
  </style>

  <?php if ( $is_embed ) : ?>
  <a class="iaktour-link" href="<?php echo esc_url( $embed_href ); ?>" aria-label="<?php echo esc_attr( $embed_label ); ?>">
  <?php endif; ?>

  <div class="iaktour-frame">
    <div class="stage">
      <div class="brand"><span class="dot"></span>IntakeFlow <small><?php echo esc_html( $brand_tag ); ?></small></div>
      <div class="progress"></div>

      <?php foreach ( $reel['scenes'] as $scene ) :
        $type = isset( $scene['type'] ) ? $scene['type'] : 'image';
        if ( $type === 'center' ) : ?>
      <section class="scene center">
        <?php if ( ! empty( $scene['logo'] ) ) : ?>
        <div class="lock"><span class="dot"></span><span><?php echo esc_html( $scene['logo'] ); ?></span></div>
        <?php endif; ?>
        <h1><?php echo wp_kses_post( $scene['h1'] ); ?></h1>
        <?php if ( ! empty( $scene['sub'] ) ) : ?>
        <p><?php echo esc_html( $scene['sub'] ); ?></p>
        <?php endif; ?>
        <?php if ( ! empty( $scene['cta'] ) ) : ?>
        <div class="cta"><?php echo esc_html( $scene['cta'] ); ?></div>
        <?php endif; ?>
      </section>
        <?php else :
          $bgpos  = isset( $scene['bgpos'] ) ? $scene['bgpos'] : '50% 30%';
          $bgsize = isset( $scene['bgsize'] ) ? $scene['bgsize'] : '150%';
          $shot_style = sprintf(
            "background-image:url('%s/%s');--bgpos:%s;--bgsize:%s",
            $promo_base,
            rawurlencode( $scene['img'] ),
            $bgpos,
            $bgsize
          );
        ?>
      <section class="scene">
        <div class="copy">
          <span class="chip"><?php echo esc_html( $scene['chip'] ); ?></span>
          <h2><?php echo wp_kses_post( $scene['h2'] ); ?></h2>
          <p><?php echo wp_kses_post( $scene['caption'] ); ?></p>
        </div>
        <div class="device">
          <div class="bar"><i></i><i></i><i></i><span class="url"><?php echo esc_html( $scene['url'] ); ?></span></div>
          <div class="shot" style="<?php echo esc_attr( $shot_style ); ?>"></div>
        </div>
      </section>
        <?php endif; endforeach; ?>
    </div>
  </div>

  <?php if ( $is_embed ) : ?>
    <div class="iaktour-cta-overlay" aria-hidden="true">
      <span class="iaktour-watch">
        <svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
        <?php echo esc_html( $embed_label ); ?>
      </span>
      <span class="iaktour-expand">
        <svg viewBox="0 0 24 24"><path d="M4 4h6v2H6v4H4V4zm10 0h6v6h-2V6h-4V4zM4 14h2v4h4v2H4v-6zm14 0h2v6h-6v-2h4v-4z"/></svg>
      </span>
    </div>
  </a>
  <?php endif; ?>
</div>
