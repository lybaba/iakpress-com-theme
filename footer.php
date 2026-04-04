<?php
/**
 * The template for displaying the footer.
 */
?>

<footer class="bg-gray-900 py-12 border-t border-gray-800 mt-auto">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center flex flex-col items-center">
    <a href="/" class="text-xl font-extrabold tracking-tighter text-white opacity-50 hover:opacity-100 transition mb-4">
      IAKPress<span class="text-blue-500">.</span>
    </a>
    <p class="text-gray-500 text-sm">
      &copy; <?php echo date('Y'); ?> IAKPress. All rights reserved.
    </p>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>