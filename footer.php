<?php
/**
 * The template for displaying the footer.
 */
?>

<footer class="bg-gray-900 py-12 border-t border-gray-800 mt-auto">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center flex flex-col items-center gap-4">
    <a href="/" class="text-xl font-extrabold tracking-tighter text-white opacity-70 hover:opacity-100 transition">
      XPress<span class="text-blue-500">UI</span>
    </a>
    <nav class="flex flex-wrap justify-center gap-x-6 gap-y-2">
      <a href="/pricing/" class="text-sm text-gray-500 hover:text-gray-300 transition">Pricing</a>
      <a href="/install/" class="text-sm text-gray-500 hover:text-gray-300 transition">Install</a>
      <a href="/blog/" class="text-sm text-gray-500 hover:text-gray-300 transition">Blog</a>
      <a href="/contact/" class="text-sm text-gray-500 hover:text-gray-300 transition">Contact</a>
      <a href="https://xpressui.iakpress.com/" target="_blank" rel="noreferrer" class="text-sm text-blue-400 hover:text-blue-300 transition inline-flex items-center gap-1">
        Console Builder
        <svg class="h-3 w-3 opacity-70" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
      </a>
    </nav>
    <p class="text-gray-500 text-sm">
      &copy; <?php echo date('Y'); ?> XPressUI by IAKPress. All rights reserved.
    </p>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
