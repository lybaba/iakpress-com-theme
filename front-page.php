<?php
/**
 * The front page template file for IAKPress.com
 */

$console_url = 'https://xpressui.iakpress.com/console/';

get_header(); ?>

<div class="iak-home-landing font-sans text-gray-900 antialiased selection:bg-blue-200">
  
  <!-- SECTION 1 : HERO -->
  <section class="bg-white py-24 px-4 sm:px-6 lg:px-8 text-center">
    <div class="max-w-4xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-4">Built for WordPress Agencies & Freelancers</p>
      <h1 class="text-5xl md:text-6xl font-extrabold tracking-tight text-gray-900 mb-6 leading-tight">
        Create a client document portal in WordPress <br class="hidden md:block"/>in 10 minutes
      </h1>
      <p class="text-xl text-gray-500 mb-10 max-w-2xl mx-auto leading-relaxed">
      Stop chasing files over email. Let your clients upload, track and manage documents in one clean, structured portal — directly inside WordPress.
      </p>
      <div class="flex flex-col sm:flex-row justify-center gap-4">
        <a href="#pricing"
           class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition duration-200 shadow-lg shadow-blue-500/30">
          Start building your first portal
        </a>
        <a href="/document-intake/" class="bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-bold py-4 px-8 rounded-lg transition duration-200">
          Try the Live Demo
        </a>
      </div>
    </div>
  </section>

  <!-- SECTION 2 : LE PROBLÈME -->
  <section class="bg-gray-50 py-20 px-4 sm:px-6 lg:px-8 border-y border-gray-100">
    <div class="max-w-6xl mx-auto">
      <h2 class="text-3xl font-bold text-center mb-16 text-gray-900">Collecting client documents shouldn't be this painful</h2>
      
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="landing-problem-card bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
          <div class="text-4xl mb-4">📧</div>
          <h3 class="text-xl font-bold mb-3 text-gray-900">Endless email threads</h3>
          <p class="text-gray-600 leading-relaxed">Clients send files everywhere. Nothing is centralized.</p>
        </div>
        <div class="landing-problem-card bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
          <div class="text-4xl mb-4">📎</div>
          <h3 class="text-xl font-bold mb-3 text-gray-900">Missing or wrong files</h3>
          <p class="text-gray-600 leading-relaxed">You constantly chase clients for the right documents.</p>
        </div>
        <div class="landing-problem-card bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
          <div class="text-4xl mb-4">📋</div>
          <h3 class="text-xl font-bold mb-3 text-gray-900">No visibility</h3>
          <p class="text-gray-600 leading-relaxed">You never know what's complete and what's missing.</p>
        </div>
      </div>

      <p class="text-center text-lg font-semibold mt-10 text-gray-900">You don’t need another form. You need a system.</p>
    </div>
  </section>

  <!-- SECTION 3 : LA SOLUTION -->
  <section class="bg-white py-24 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto text-center">
      <h2 class="text-3xl md:text-4xl font-bold mb-6 text-gray-900">A simple workflow your clients actually follow</h2>
      <p class="text-lg text-gray-600 mb-12 max-w-3xl mx-auto">Build a structured document intake in minutes, send a private link, and receive everything in one clean workflow.</p>
      
      <div class="text-left space-y-8 bg-blue-50/50 border border-blue-100 p-8 md:p-12 rounded-3xl">
        <div class="flex items-start">
          <div class="flex-shrink-0 h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center mr-4 mt-1">
            <svg class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
          </div>
          <div>
            <h4 class="text-xl font-bold text-gray-900 mb-1">1. Create a portal</h4>
            <p class="text-gray-600 leading-relaxed">Build a structured document intake in minutes.</p>
          </div>
        </div>
        <div class="flex items-start">
          <div class="flex-shrink-0 h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center mr-4 mt-1">
            <svg class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
          </div>
          <div>
            <h4 class="text-xl font-bold text-gray-900 mb-1">2. Send a private link</h4>
            <p class="text-gray-600 leading-relaxed">Your client accesses their dedicated portal and knows exactly what to submit.</p>
          </div>
        </div>
        <div class="flex items-start">
          <div class="flex-shrink-0 h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center mr-4 mt-1">
            <svg class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
          </div>
          <div>
            <h4 class="text-xl font-bold text-gray-900 mb-1">3. Receive everything cleanly</h4>
            <p class="text-gray-600 leading-relaxed">No chaos, no back-and-forth, and a much more professional client experience.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SECTION 3B : DIFFERENTIATION -->
  <section class="bg-gray-50 py-20 px-4 sm:px-6 lg:px-8 border-y border-gray-100">
    <div class="max-w-5xl mx-auto text-center">
      <h2 class="text-3xl font-bold mb-12 text-gray-900">Not just another WordPress form plugin</h2>
      <div class="grid md:grid-cols-2 gap-10 text-left">
        <div class="landing-compare-card bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
          <h3 class="font-bold text-lg mb-4 text-gray-900">Typical form plugins</h3>
          <ul class="text-gray-600 space-y-2">
            <li>• One form = one interaction</li>
            <li>• No document tracking</li>
            <li>• Break with themes</li>
            <li>• Manual follow-ups</li>
          </ul>
        </div>
        <div class="landing-compare-card bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
          <h3 class="font-bold text-lg mb-4 text-gray-900">XPressUI</h3>
          <ul class="text-gray-600 space-y-2">
            <li>• Full client portal</li>
            <li>• Structured document intake</li>
            <li>• Consistent UI</li>
            <li>• Clear workflow for clients</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- SECTION 3C : BUSINESS VALUE -->
  <section class="bg-white py-20 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto text-center">
      <h2 class="text-3xl font-bold mb-12 text-gray-900">Save hours. Or sell it as a premium service.</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="landing-value-card bg-gray-50 p-8 rounded-2xl border border-gray-100">
          <h3 class="text-xl font-bold mb-3 text-gray-900">Save time</h3>
          <p class="text-gray-600">Reduce client back-and-forth and stop chasing missing files.</p>
        </div>
        <div class="landing-value-card bg-gray-50 p-8 rounded-2xl border border-gray-100">
          <h3 class="text-xl font-bold mb-3 text-gray-900">Charge more</h3>
          <p class="text-gray-600">Package document portals as a premium WordPress service.</p>
        </div>
        <div class="landing-value-card bg-gray-50 p-8 rounded-2xl border border-gray-100">
          <h3 class="text-xl font-bold mb-3 text-gray-900">Look professional</h3>
          <p class="text-gray-600">Give clients a cleaner, more structured onboarding experience.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- SECTION : LATEST ARTICLE -->
  <?php
  $latest_post = get_posts( [ 'numberposts' => 1, 'post_status' => 'publish' ] );
  if ( ! empty( $latest_post ) ) :
    $post = $latest_post[0];
    setup_postdata( $post );
  ?>
  <section class="bg-white py-20 px-4 sm:px-6 lg:px-8 border-t border-gray-100">
    <div class="max-w-4xl mx-auto">
      <div class="flex items-center justify-between mb-10">
        <h2 class="text-2xl font-bold text-gray-900">From the Blog</h2>
        <a href="/blog/" class="text-sm font-bold text-blue-600 hover:text-blue-800 transition">All articles &rarr;</a>
      </div>

      <a href="<?php echo get_permalink( $post->ID ); ?>"
         class="group block bg-gray-50 hover:bg-blue-50 border border-gray-100 hover:border-blue-200 rounded-2xl p-8 md:p-10 transition-all duration-200">
        <?php
        $cats = get_the_category( $post->ID );
        if ( ! empty( $cats ) ) : ?>
          <p class="text-xs font-bold tracking-widest text-blue-600 uppercase mb-3">
            <?php echo esc_html( $cats[0]->name ); ?>
          </p>
        <?php endif; ?>

        <h3 class="text-2xl font-extrabold text-gray-900 group-hover:text-blue-700 mb-3 transition-colors leading-snug">
          <?php echo esc_html( get_the_title( $post->ID ) ); ?>
        </h3>
        <p class="text-gray-500 leading-relaxed mb-6">
          <?php echo esc_html( wp_trim_words( get_the_excerpt( $post->ID ), 28, '…' ) ); ?>
        </p>
        <span class="inline-flex items-center text-sm font-bold text-blue-600 group-hover:underline">
          Read the article
          <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
          </svg>
        </span>
      </a>
    </div>
  </section>
  <?php wp_reset_postdata(); endif; ?>

  <!-- SECTION 4 : PRIX -->
  <section id="pricing" class="bg-gray-900 py-24 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-extrabold text-white sm:text-4xl">Simple pricing for agencies and freelancers</h2>
        <p class="mt-4 text-xl text-gray-400">One client project can pay for it.</p>
      </div>

      <div class="bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col md:flex-row">
        <div class="p-8 md:p-10 md:w-2/3">
          <h3 class="text-2xl font-bold text-gray-900 mb-2">Lifetime License</h3>
          <p class="text-gray-500 mb-8">Build client document portals in WordPress without the usual back-and-forth.</p>
          <ul class="space-y-4">
            <li class="flex items-center"><svg class="h-6 w-6 text-green-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="text-gray-700">Use it on up to <strong>5 production sites</strong></span></li>
            <li class="flex items-center"><svg class="h-6 w-6 text-green-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="text-gray-700">Automatic updates via <em>wp-admin</em></span></li>
            <li class="flex items-center"><svg class="h-6 w-6 text-green-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="text-gray-700">Pro components included for document collection</span></li>
            <li class="flex items-center"><svg class="h-6 w-6 text-green-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="text-gray-700">No subscription, one-time payment</span></li>
          </ul>
        </div>
        <div class="bg-gray-50 p-8 md:p-10 md:w-1/3 flex flex-col justify-center items-center text-center border-l border-gray-100">
          <p class="text-gray-500 text-sm font-bold uppercase tracking-widest mb-2">One-time payment</p>
          <div class="flex items-baseline justify-center text-6xl font-extrabold text-gray-900"><span>€129</span></div>
          <p class="mt-2 text-gray-500 text-sm">excl. VAT, no hidden fees.</p>
          <button id="buy-pro-btn" class="mt-8 w-full block bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded-lg transition duration-200 shadow-lg shadow-blue-600/30 disabled:opacity-50 disabled:cursor-not-allowed">Start building your first portal</button>
          <script>
            document.getElementById('buy-pro-btn').addEventListener('click', async function() {
              try {
                this.disabled = true;
                this.innerText = 'Redirecting to secure checkout...';

                const response = await fetch('https://xpressui.iakpress.com/api/v1/billing/create-public-checkout-session', {
                  method: 'POST',
                  headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                  },
                  body: JSON.stringify({})
                });

                if (!response.ok) {
                    const errorText = await response.text();
                    throw new Error(`HTTP ${response.status} - ${errorText}`);
                }

                const data = await response.json();
                if (data.checkoutUrl) window.location.href = data.checkoutUrl;
                else throw new Error('No checkoutUrl returned from API');
              } catch (error) {
                console.error('Checkout failed:', error);
                alert(`Erreur de paiement : ${error.message}\n\n(Si "Failed to fetch", ouvrez la console F12, c'est une erreur CORS)`);
                this.disabled = false;
                this.innerText = 'Start building your first portal';
              }
            });
          </script>
          <p class="mt-4 text-xs text-gray-400 font-medium">Instant license delivery via email</p>
        </div>
      </div>
    </div>
  </section>

</div>

<?php get_footer(); ?>
