<?php
/**
 * Footer template for Document Intake promo pages.
 * Loaded via get_footer('xpressui').
 */
$is_pro = isset($xpressui_active_route) && $xpressui_active_route === 'pro';
?>
<footer class="site-footer"<?php if ($is_pro): ?> style="border-top:1px solid rgba(255,255,255,0.06);color:rgba(140,175,210,0.5)"<?php endif; ?>>
  <div class="container footer-inner">
    <p>© <?php echo date('Y'); ?> XPressUI</p>
    <p>Document Intake workflow for WordPress.</p>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
