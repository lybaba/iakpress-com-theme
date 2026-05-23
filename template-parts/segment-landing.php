<?php
/**
 * Shared segment landing page template.
 *
 * Expected variables:
 * $segment_eyebrow, $segment_title, $segment_intro, $segment_primary_cta,
 * $segment_secondary_cta, $segment_pains, $segment_workflow, $segment_proofs,
 * $segment_offer, $segment_outbound, $segment_use_cases.
 */

$contact_url = home_url('/contact/');
$pricing_url = home_url('/pricing/');
$cloud_url   = home_url('/xpressui-cloud/');

get_header();
?>

<div class="font-sans text-gray-900 antialiased bg-white">
  <section class="bg-white py-20 px-4 sm:px-6 lg:px-8 border-b border-gray-100">
    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
      <div class="lg:col-span-7">
        <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-4"><?php echo esc_html($segment_eyebrow); ?></p>
        <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight text-gray-900 leading-tight mb-6">
          <?php echo esc_html($segment_title); ?>
        </h1>
        <p class="text-lg md:text-xl text-gray-500 leading-relaxed mb-8">
          <?php echo esc_html($segment_intro); ?>
        </p>
        <div class="flex flex-col sm:flex-row gap-4">
          <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex justify-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition shadow-lg shadow-blue-500/30">
            <?php echo esc_html($segment_primary_cta); ?>
          </a>
          <a href="<?php echo esc_url($pricing_url); ?>" class="inline-flex justify-center bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-bold py-4 px-8 rounded-lg transition">
            <?php echo esc_html($segment_secondary_cta); ?>
          </a>
        </div>
      </div>
      <div class="lg:col-span-5">
        <div class="bg-gray-900 rounded-3xl p-8 shadow-2xl text-white">
          <p class="text-sm font-bold tracking-widest text-blue-300 uppercase mb-4">Pain to remove</p>
          <ul class="space-y-4">
            <?php foreach ($segment_pains as $pain): ?>
            <li class="flex gap-3">
              <span class="mt-1 h-2 w-2 rounded-full bg-blue-400 flex-shrink-0"></span>
              <span class="text-sm leading-relaxed"><?php echo esc_html($pain); ?></span>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-gray-50 py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3 text-center">Workflow package</p>
      <h2 class="text-3xl font-bold text-gray-900 text-center mb-10"><?php echo esc_html($segment_workflow['title']); ?></h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <?php foreach ($segment_workflow['steps'] as $index => $step): ?>
        <article class="bg-white rounded-2xl border border-gray-100 p-7 shadow-sm">
          <p class="text-xs font-bold text-blue-600 mb-3">STEP <?php echo esc_html((string) ($index + 1)); ?></p>
          <h3 class="text-xl font-bold text-gray-900 mb-3"><?php echo esc_html($step['title']); ?></h3>
          <p class="text-gray-600 leading-relaxed"><?php echo esc_html($step['body']); ?></p>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="bg-white py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
      <div class="lg:col-span-7 bg-white rounded-3xl border border-gray-100 p-8 shadow-sm">
        <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3">Proofs to collect</p>
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Turn scattered files into one reviewable submission.</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <?php foreach ($segment_proofs as $proof): ?>
          <div class="rounded-2xl border border-gray-100 bg-gray-50 p-5">
            <p class="font-bold text-gray-900 mb-1"><?php echo esc_html($proof['title']); ?></p>
            <p class="text-sm text-gray-600 leading-relaxed"><?php echo esc_html($proof['body']); ?></p>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <aside class="lg:col-span-5 bg-blue-50 rounded-3xl border border-blue-100 p-8">
        <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3">Offer to sell</p>
        <h2 class="text-2xl font-bold text-gray-900 mb-4"><?php echo esc_html($segment_offer['title']); ?></h2>
        <p class="text-gray-600 leading-relaxed mb-6"><?php echo esc_html($segment_offer['body']); ?></p>
        <ul class="space-y-3 mb-8">
          <?php foreach ($segment_offer['items'] as $item): ?>
          <li class="flex items-start gap-3 text-sm text-gray-700">
            <svg class="h-5 w-5 text-blue-600 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            <?php echo esc_html($item); ?>
          </li>
          <?php endforeach; ?>
        </ul>
        <a href="<?php echo esc_url($cloud_url); ?>" class="inline-flex justify-center w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition">
          See Cloud plans
        </a>
      </aside>
    </div>
  </section>

  <section class="bg-gray-50 py-16 px-4 sm:px-6 lg:px-8 border-y border-gray-100">
    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8">
      <div class="lg:col-span-5">
        <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3">Outbound angle</p>
        <h2 class="text-3xl font-bold text-gray-900 mb-4">Message to test on LinkedIn.</h2>
        <p class="text-gray-600 leading-relaxed">Use this as the starting point for comments, DMs, and follow-up emails. Keep it specific to the segment.</p>
      </div>
      <div class="lg:col-span-7 bg-white rounded-3xl border border-gray-100 p-8 shadow-sm">
        <p class="text-gray-800 leading-relaxed whitespace-pre-line"><?php echo esc_html($segment_outbound); ?></p>
      </div>
    </div>
  </section>

  <section class="bg-white py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3 text-center">Use cases</p>
      <h2 class="text-3xl font-bold text-gray-900 text-center mb-10">Start with one workflow, then reuse the pattern.</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <?php foreach ($segment_use_cases as $use_case): ?>
        <article class="rounded-2xl border border-gray-100 p-6 bg-white shadow-sm">
          <h3 class="text-lg font-bold text-gray-900 mb-2"><?php echo esc_html($use_case['title']); ?></h3>
          <p class="text-sm text-gray-600 leading-relaxed"><?php echo esc_html($use_case['body']); ?></p>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="bg-gray-900 py-16 px-4 sm:px-6 lg:px-8 text-center">
    <div class="max-w-3xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-300 uppercase mb-3">Small paid pilot</p>
      <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-5">Bring one workflow. We will scope the smallest launchable version.</h2>
      <p class="text-gray-400 mb-8">The goal is not a giant transformation. It is one working workflow that reduces manual follow-up fast.</p>
      <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex justify-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition shadow-lg shadow-blue-500/30">
        Scope a pilot
      </a>
    </div>
  </section>
</div>

<?php get_footer(); ?>
