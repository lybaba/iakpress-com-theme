<?php
/**
 * The template for displaying the footer.
 */
?>

<footer class="bg-gray-900 py-12 border-t border-gray-800 mt-auto">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center flex flex-col items-center gap-6">
    <div class="w-full rounded-3xl border border-gray-800 bg-gray-950/60 p-6 md:p-8 grid grid-cols-1 md:grid-cols-[1fr_auto] gap-5 items-center text-left">
      <div>
        <p class="text-xs font-bold tracking-widest text-blue-300 uppercase mb-2">First workflow</p>
        <h2 class="text-2xl font-extrabold text-white mb-2">Want one workflow live before choosing the full path?</h2>
        <p class="text-sm text-gray-400 leading-relaxed">Start with a small paid pilot: hosted link, operator inbox, reusable catalog surface, or client-site delivery.</p>
      </div>
      <a href="/contact/" class="inline-flex justify-center rounded-lg bg-blue-600 px-6 py-3 text-sm font-bold text-white shadow-lg shadow-blue-500/20 transition hover:bg-blue-700">
        Scope a pilot
      </a>
    </div>
    <a href="/" class="text-xl font-extrabold tracking-tighter text-white opacity-70 hover:opacity-100 transition">
      XPress<span class="text-blue-500">UI</span>
    </a>
    <nav class="flex flex-wrap justify-center gap-x-6 gap-y-2">
      <a href="/xpressui/" class="text-sm text-gray-500 hover:text-gray-300 transition">XPressUI</a>
      <a href="/agency-pilot/" class="text-sm text-gray-500 hover:text-gray-300 transition">Agency Pilot</a>
      <a href="/pricing/" class="text-sm text-gray-500 hover:text-gray-300 transition">Pricing</a>
      <a href="/install/" class="text-sm text-gray-500 hover:text-gray-300 transition">Install</a>
      <a href="/blog/" class="text-sm text-gray-500 hover:text-gray-300 transition">Blog</a>
      <a href="/contact/" class="text-sm text-gray-500 hover:text-gray-300 transition">Contact</a>
    </nav>
    <p class="text-gray-500 text-sm">
      &copy; <?php echo date('Y'); ?> XPressUI by IAKPress. All rights reserved.
    </p>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
