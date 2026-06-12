<?php
/**
 * Header template for Document Intake promo pages.
 * Loaded via get_header('xpressui') — replaces the GeneratePress header entirely.
 *
 * @var string $xpressui_active_route  Optional: current page slug for active nav state.
 */
$active = $xpressui_active_route ?? '';
$console_url = 'https://app.intakeflow.dev';
$is_pro = ($active === 'pro');
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<nav class="top-nav"<?php if ($is_pro): ?> style="background:rgba(6,13,24,0.82);border-bottom-color:rgba(255,255,255,0.07)"<?php endif; ?>>
  <div class="container nav-inner">
    <a href="<?php echo esc_url( home_url( '/xpressui/' ) ); ?>" class="brand-mark-word"<?php if ($is_pro): ?> style="color:#e8f0f8"<?php endif; ?>>
      <span class="brand-icon">DI</span>
      <span>IntakeFlow Starter</span>
    </a>
    <div class="nav-links">
      <?php
      $nav = [
        ['href' => home_url( '/xpressui/' ),            'slug' => '',        'label' => 'IntakeFlow Starter'],
        ['href' => home_url( '/xpressui-cloud/' ),         'slug' => 'xpressui-cloud', 'label' => 'IntakeFlow Cloud'],
        ['href' => home_url( '/pricing/' ),             'slug' => 'pricing', 'label' => 'Pricing'],
        ['href' => home_url( '/install/' ),             'slug' => 'install', 'label' => 'Install'],
        ['href' => $console_url,                        'slug' => '',        'label' => 'Open Console', 'external' => true],
        ['href' => home_url( '/contact/' ),             'slug' => 'contact', 'label' => 'Contact'],
      ];
      $dim = $is_pro ? ' style="color:rgba(180,205,230,0.6)"' : '';
      foreach ($nav as $item):
        $is_active = ($active !== '' && $item['slug'] === $active);
        $class = $is_active ? ' class="is-active"' : '';
        $external = !empty($item['external']) ? ' target="_blank" rel="noreferrer"' : '';
      ?>
      <a href="<?php echo esc_url($item['href']); ?>"<?php echo $class . $external . $dim; ?>><?php echo esc_html($item['label']); ?></a>
      <?php endforeach; ?>
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="nav-cta<?php echo ($active === 'contact') ? ' is-active' : ''; ?>">Discuss Cloud plan <?php echo xpressui_arrow_svg(); ?></a>
    </div>
  </div>
</nav>
