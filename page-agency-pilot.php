<?php
/**
 * Template for the /agency-pilot/ page.
 */

$contact_url = home_url('/contact/');
$pricing_url = home_url('/pricing/');
$xpressui_url = home_url('/xpressui/');

$offers = [
  [
    'title' => 'Hosted workflow setup',
    'price' => 'from €299 setup',
    'body' => 'One branded hosted workflow with operator email, review checklist, and generated summary.',
    'fit' => 'Best when the client needs a public link quickly.',
  ],
  [
    'title' => 'Client-site delivery',
    'price' => 'from €790 setup',
    'body' => 'XPressUI Pro delivery, page embed guidance, test submission, and admin inbox validation.',
    'fit' => 'Best for agencies shipping on client-owned sites.',
  ],
  [
    'title' => 'Agency pilot',
    'price' => '3-month assisted pilot',
    'body' => 'Launch the first workflow, prepare reusable templates, and validate whether XPressUI belongs in your delivery stack.',
    'fit' => 'Best for agencies with several workflow-heavy client projects.',
  ],
];

$steps = [
  ['title' => 'Pick one real workflow', 'body' => 'Document intake, service request, reservation, catalog order, or payment proof review.'],
  ['title' => 'Launch the first version', 'body' => 'We configure the branded flow, operator email, summary, and review path.'],
  ['title' => 'Test with real operators', 'body' => 'Your team runs a live test and flags wording, missing fields, or status issues.'],
  ['title' => 'Turn it into a repeatable pack', 'body' => 'The working flow becomes a reusable delivery pattern for future clients.'],
];

$qualifiers = [
  'You already build or maintain client sites or workflow-heavy service pages.',
  'A client workflow currently runs through email, spreadsheets, or static forms.',
  'Files, prices, dates, services, or payment proofs create manual follow-up.',
  'You can test one workflow with a real operator within 7 days.',
];

get_header();
?>

<div class="font-sans text-gray-900 antialiased bg-white">
  <section class="bg-white py-20 px-4 sm:px-6 lg:px-8 border-b border-gray-100">
    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
      <div class="lg:col-span-7">
        <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-4">Agency pilot</p>
        <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight text-gray-900 leading-tight mb-6">
          Launch one client workflow first. Turn it into a repeatable agency offer.
        </h1>
        <p class="text-lg md:text-xl text-gray-500 leading-relaxed mb-8">
          XPressUI helps agencies ship document intake, service requests, reservations, catalog orders, and operator review without rebuilding a custom backend for each client.
        </p>
        <div class="flex flex-col sm:flex-row gap-4">
          <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex justify-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition shadow-lg shadow-blue-500/30">
            Request a pilot
          </a>
          <a href="<?php echo esc_url($xpressui_url); ?>" class="inline-flex justify-center bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-bold py-4 px-8 rounded-lg transition">
            See XPressUI
          </a>
        </div>
      </div>
      <div class="lg:col-span-5">
        <div class="bg-gray-900 rounded-3xl p-8 shadow-2xl">
          <p class="text-sm font-bold tracking-widest text-blue-300 uppercase mb-4">Fastest path to revenue</p>
          <ul class="space-y-4">
            <?php foreach ($qualifiers as $qualifier): ?>
            <li class="flex gap-3 text-white">
              <span class="mt-1 h-2 w-2 rounded-full bg-blue-400 flex-shrink-0"></span>
              <span class="text-sm leading-relaxed"><?php echo esc_html($qualifier); ?></span>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-gray-50 py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3 text-center">Offers</p>
      <h2 class="text-3xl font-bold text-gray-900 text-center mb-10">Start assisted, then decide what should become reusable.</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <?php foreach ($offers as $offer): ?>
        <article class="bg-white rounded-2xl border border-gray-100 p-7 shadow-sm">
          <p class="text-sm font-bold text-blue-600 mb-2"><?php echo esc_html($offer['price']); ?></p>
          <h3 class="text-xl font-bold text-gray-900 mb-3"><?php echo esc_html($offer['title']); ?></h3>
          <p class="text-gray-600 leading-relaxed mb-5"><?php echo esc_html($offer['body']); ?></p>
          <p class="text-sm text-gray-500 leading-relaxed"><?php echo esc_html($offer['fit']); ?></p>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="bg-white py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-3 text-center">How the pilot works</p>
      <h2 class="text-3xl font-bold text-gray-900 text-center mb-10">Four steps, one workflow, no broad self-serve promise.</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <?php foreach ($steps as $index => $step): ?>
        <article class="rounded-2xl border border-gray-100 p-6 bg-white shadow-sm">
          <p class="text-xs font-bold text-blue-600 mb-2">STEP <?php echo esc_html((string) ($index + 1)); ?></p>
          <h3 class="text-lg font-bold text-gray-900 mb-2"><?php echo esc_html($step['title']); ?></h3>
          <p class="text-sm text-gray-600 leading-relaxed"><?php echo esc_html($step['body']); ?></p>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="bg-gray-900 py-16 px-4 sm:px-6 lg:px-8 text-center">
    <div class="max-w-3xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-300 uppercase mb-3">Ready when the workflow is real</p>
      <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-5">Bring one workflow that is painful today. We will scope the smallest paid pilot.</h2>
      <p class="text-gray-400 mb-8">The first call should end with a concrete workflow, a delivery mode, and a go-live checklist.</p>
      <div class="flex flex-col sm:flex-row justify-center gap-4">
        <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex justify-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition shadow-lg shadow-blue-500/30">
          Request a pilot
        </a>
        <a href="<?php echo esc_url($pricing_url); ?>" class="inline-flex justify-center bg-gray-800 border border-gray-700 hover:border-gray-600 text-white font-bold py-4 px-8 rounded-lg transition">
          Compare pricing
        </a>
      </div>
    </div>
  </section>
</div>

<?php get_footer(); ?>
