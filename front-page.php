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
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-4">Built for accounting firms and the WordPress agencies that support them</p>
      <h1 class="text-5xl md:text-6xl font-extrabold tracking-tight text-gray-900 mb-6 leading-tight">
        Get complete client documents faster. <br class="hidden md:block"/>Without endless follow-ups.
      </h1>
      <p class="text-xl text-gray-500 mb-10 max-w-2xl mx-auto leading-relaxed">
        XpressUI helps teams reduce document follow-ups, get complete client files faster, and run a repeatable intake workflow inside WordPress.
      </p>
      <div class="flex flex-col sm:flex-row justify-center gap-4">
        <a href="#pricing"
           class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition duration-200 shadow-lg shadow-blue-500/30">
          Get Starter
        </a>
        <a href="/document-intake/" class="bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-800 font-bold py-4 px-8 rounded-lg transition duration-200">
          Try the Live Demo
        </a>
      </div>
    </div>
  </section>

  <!-- SECTION 2 : THE PROBLEM -->
  <section class="bg-gray-50 py-20 px-4 sm:px-6 lg:px-8 border-y border-gray-100">
    <div class="max-w-6xl mx-auto">
      <h2 class="text-3xl font-bold text-center mb-16 text-gray-900">Client document collection is still too manual</h2>
      
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="landing-problem-card bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
          <div class="text-4xl mb-4">📧</div>
          <h3 class="text-xl font-bold mb-3 text-gray-900">Files arrive everywhere</h3>
          <p class="text-gray-600 leading-relaxed">Invoices, IDs, statements, and certificates land in email threads, shared drives, WhatsApp messages, and random attachments.</p>
        </div>
        <div class="landing-problem-card bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
          <div class="text-4xl mb-4">📎</div>
          <h3 class="text-xl font-bold mb-3 text-gray-900">Submissions are incomplete</h3>
          <p class="text-gray-600 leading-relaxed">Your team loses time checking what is missing, asking again, and manually rebuilding the client file.</p>
        </div>
        <div class="landing-problem-card bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
          <div class="text-4xl mb-4">📋</div>
          <h3 class="text-xl font-bold mb-3 text-gray-900">No clear status</h3>
          <p class="text-gray-600 leading-relaxed">Clients do not know what is expected, and your team cannot instantly see what is complete, pending, or wrong.</p>
        </div>
      </div>

      <p class="text-center text-lg font-semibold mt-10 text-gray-900">You do not need another form. You need a client workflow system.</p>
    </div>
  </section>

  <!-- SECTION 3 : THE SOLUTION -->
  <section class="bg-white py-24 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto text-center">
      <h2 class="text-3xl md:text-4xl font-bold mb-6 text-gray-900">A structured workflow your clients can actually complete</h2>
      <p class="text-lg text-gray-600 mb-12 max-w-3xl mx-auto">Create a secure document intake, send one private link, and receive a complete, organized file set inside WordPress.</p>
      
      <div class="text-left space-y-8 bg-blue-50/50 border border-blue-100 p-8 md:p-12 rounded-3xl">
        <div class="flex items-start">
          <div class="flex-shrink-0 h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center mr-4 mt-1">
            <svg class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
          </div>
          <div>
            <h4 class="text-xl font-bold text-gray-900 mb-1">1. Build the checklist</h4>
            <p class="text-gray-600 leading-relaxed">Define exactly which documents each client must submit: invoices, bank statements, IDs, contracts, certificates, or custom requirements.</p>
          </div>
        </div>
        <div class="flex items-start">
          <div class="flex-shrink-0 h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center mr-4 mt-1">
            <svg class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
          </div>
          <div>
            <h4 class="text-xl font-bold text-gray-900 mb-1">2. Send one private link</h4>
            <p class="text-gray-600 leading-relaxed">Your client sees a clean portal with clear instructions, expected files, and submission status.</p>
          </div>
        </div>
        <div class="flex items-start">
          <div class="flex-shrink-0 h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center mr-4 mt-1">
            <svg class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
          </div>
          <div>
            <h4 class="text-xl font-bold text-gray-900 mb-1">3. Receive a complete file set</h4>
            <p class="text-gray-600 leading-relaxed">Everything arrives structured, traceable, and ready for review — with less manual follow-up for your team.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SECTION 3B : AI VALUE -->
  <section class="bg-gray-50 py-20 px-4 sm:px-6 lg:px-8 border-y border-gray-100">
    <div class="max-w-5xl mx-auto text-center">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-4">Built for 2026 workflows</p>
      <h2 class="text-3xl font-bold mb-6 text-gray-900">Go beyond file collection when you are ready.</h2>
      <p class="text-lg text-gray-600 mb-12 max-w-3xl mx-auto">Start with a reliable intake workflow now. Then add AI-assisted review layers as your process matures.</p>
      <div class="grid md:grid-cols-4 gap-6 text-left">
        <div class="landing-value-card bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
          <h3 class="font-bold text-lg mb-3 text-gray-900">OCR-ready foundation</h3>
          <p class="text-gray-600">Your document flow is structured so OCR layers can be added without redoing intake.</p>
        </div>
        <div class="landing-value-card bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
          <h3 class="font-bold text-lg mb-3 text-gray-900">Data extraction path</h3>
          <p class="text-gray-600">Prepare for targeted extraction from invoices, certificates, and recurring client documents.</p>
        </div>
        <div class="landing-value-card bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
          <h3 class="font-bold text-lg mb-3 text-gray-900">Missing-file checks</h3>
          <p class="text-gray-600">Track which required documents are submitted, pending, or rejected.</p>
        </div>
        <div class="landing-value-card bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
          <h3 class="font-bold text-lg mb-3 text-gray-900">Review summaries</h3>
          <p class="text-gray-600">Turn uploaded files into clearer review queues for your team.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- SECTION 3C : DIFFERENTIATION -->
  <section class="bg-white py-20 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto text-center">
      <h2 class="text-3xl font-bold mb-12 text-gray-900">Why not email, Drive, or another SaaS?</h2>
      <div class="grid md:grid-cols-2 gap-10 text-left">
        <div class="landing-compare-card bg-gray-50 p-8 rounded-2xl border border-gray-100">
          <h3 class="font-bold text-lg mb-4 text-gray-900">Generic tools</h3>
          <ul class="text-gray-600 space-y-2">
            <li>• Email and Drive create messy, manual follow-up</li>
            <li>• Form plugins collect inputs, not complete client workflows</li>
            <li>• External SaaS adds another login and another client touchpoint</li>
            <li>• DIY AI scripts are hard to trust, support, and standardize</li>
          </ul>
        </div>
        <div class="landing-compare-card bg-gray-50 p-8 rounded-2xl border border-gray-100">
          <h3 class="font-bold text-lg mb-4 text-gray-900">XpressUI</h3>
          <ul class="text-gray-600 space-y-2">
            <li>• A complete client document workflow inside WordPress</li>
            <li>• Clear checklists, private links, and submission status</li>
            <li>• A branded experience your clients already recognize</li>
            <li>• A foundation for AI-assisted review and validation</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- SECTION 3D : BUSINESS VALUE -->
  <section class="bg-gray-50 py-20 px-4 sm:px-6 lg:px-8 border-y border-gray-100">
    <div class="max-w-5xl mx-auto text-center">
      <h2 class="text-3xl font-bold mb-12 text-gray-900">Designed for firms managing recurring client documents</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="landing-value-card bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
          <h3 class="text-xl font-bold mb-3 text-gray-900">Reduce follow-ups</h3>
          <p class="text-gray-600">Give clients a clear checklist and reduce the time spent asking for missing documents.</p>
        </div>
        <div class="landing-value-card bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
          <h3 class="text-xl font-bold mb-3 text-gray-900">Standardize intake</h3>
          <p class="text-gray-600">Use repeatable workflows instead of rebuilding the process for every client or every month.</p>
        </div>
        <div class="landing-value-card bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
          <h3 class="text-xl font-bold mb-3 text-gray-900">Stay in WordPress</h3>
          <p class="text-gray-600">Keep the client experience inside your own branded environment instead of sending users to another SaaS.</p>
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

  <!-- SECTION 4 : PRICING -->
  <section id="pricing" class="bg-gray-900 py-24 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-extrabold text-white sm:text-4xl">Simple pricing to launch your first repeatable intake workflow</h2>
        <p class="mt-4 text-xl text-gray-400">Start with Starter now. Scale options for larger multi-site teams are planned.</p>
      </div>

      <div class="bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col md:flex-row">
        <div class="p-8 md:p-10 md:w-2/3">
          <h3 class="text-2xl font-bold text-gray-900 mb-2">Starter License (Early Access)</h3>
          <p class="text-gray-500 mb-8">Build structured client document portals in WordPress and replace scattered email follow-ups with a clear intake workflow.</p>
          <ul class="space-y-4">
            <li class="flex items-center"><svg class="h-6 w-6 text-green-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="text-gray-700">Use it on up to <strong>5 production sites</strong></span></li>
            <li class="flex items-center"><svg class="h-6 w-6 text-green-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="text-gray-700">Automatic updates via <em>wp-admin</em></span></li>
            <li class="flex items-center"><svg class="h-6 w-6 text-green-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="text-gray-700">Pro components included for document collection</span></li>
            <li class="flex items-center"><svg class="h-6 w-6 text-green-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="text-gray-700">Early-access Starter pricing while Scale plans are being prepared</span></li>
          </ul>
        </div>
        <div class="bg-gray-50 p-8 md:p-10 md:w-1/3 flex flex-col justify-center items-center text-center border-l border-gray-100">
          <p class="text-gray-500 text-sm font-bold uppercase tracking-widest mb-2">One-time payment</p>
          <div class="flex items-baseline justify-center text-6xl font-extrabold text-gray-900"><span>€129</span></div>
          <p class="mt-2 text-gray-500 text-sm">excl. VAT, no hidden fees.</p>
          <button id="buy-pro-btn" class="mt-8 w-full block bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded-lg transition duration-200 shadow-lg shadow-blue-600/30 disabled:opacity-50 disabled:cursor-not-allowed">Get Starter — €129 one-time</button>
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
                alert(`Payment error: ${error.message}\n\n(If you see "Failed to fetch", open the browser console. It is likely a CORS issue.)`);
                this.disabled = false;
                this.innerText = 'Get Starter — €129 one-time';
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
