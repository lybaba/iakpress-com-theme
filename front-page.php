<?php
/**
 * The front page template file for IAKPress.com
 */

// Set to false once we have real customer feedback and revert to normal flow.
$prelaunch_mode = defined('XPRESSUI_PRELAUNCH_MODE') ? XPRESSUI_PRELAUNCH_MODE : true;
$console_url    = 'https://xpressui.iakpress.com/console/';

get_header(); ?>

<div class="font-sans text-gray-900 antialiased selection:bg-blue-200">
  
  <!-- SECTION 1 : HERO -->
  <section class="bg-white py-24 px-4 sm:px-6 lg:px-8 text-center">
    <div class="max-w-4xl mx-auto">
      <p class="text-sm font-bold tracking-widest text-blue-600 uppercase mb-4">Built for WordPress Agencies & B2B Freelancers</p>
      <h1 class="text-5xl md:text-6xl font-extrabold tracking-tight text-gray-900 mb-6 leading-tight">
        Stop fighting your theme's CSS <br class="hidden md:block"/>on complex forms.
      </h1>
      <p class="text-xl text-gray-500 mb-10 max-w-2xl mx-auto leading-relaxed">
      XPressUI is a decoupled Document Intake portal for WordPress. 100% theme-proof. Zero CSS conflicts. Installed in 2 minutes.
      </p>
      <div class="flex flex-col sm:flex-row justify-center gap-4">
        <a href="<?php echo $prelaunch_mode ? esc_url($console_url) : '#pricing'; ?>"
           <?php if ($prelaunch_mode) echo 'target="_blank" rel="noreferrer"'; ?>
           class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition duration-200 shadow-lg shadow-blue-500/30">
          Get XPressUI Pro
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
      <h2 class="text-3xl font-bold text-center mb-16 text-gray-900">Building client onboarding portals on WordPress is a nightmare.</h2>
      
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
          <div class="text-4xl mb-4">🎨</div>
          <h3 class="text-xl font-bold mb-3 text-gray-900">Themes break everything.</h3>
          <p class="text-gray-600 leading-relaxed">Complex multi-step forms inherit messy theme styles. You waste hours writing custom CSS just to make inputs look normal.</p>
        </div>
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
          <div class="text-4xl mb-4">📎</div>
          <h3 class="text-xl font-bold mb-3 text-gray-900">File uploads fail.</h3>
          <p class="text-gray-600 leading-relaxed">Handling multiple large attachments (PDFs, images) is slow, unstable, and often crashes with traditional form plugins.</p>
        </div>
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
          <div class="text-4xl mb-4">🗄️</div>
          <h3 class="text-xl font-bold mb-3 text-gray-900">Database pollution.</h3>
          <p class="text-gray-600 leading-relaxed">Client data ends up dumped into <code>wp_options</code> or unreadable post-metas, making it a nightmare to export for your end-clients.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- SECTION 3 : LA SOLUTION -->
  <section class="bg-white py-24 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto text-center">
      <h2 class="text-3xl md:text-4xl font-bold mb-6 text-gray-900">The XPressUI approach: "Theme-Proof" by design.</h2>
      <p class="text-lg text-gray-600 mb-12 max-w-3xl mx-auto">We took the complexity out of WordPress. Your portal is built on our SaaS console, packaged as a <code>.zip</code>, and rendered natively on your client's site with strictly scoped CSS.</p>
      
      <div class="text-left space-y-8 bg-blue-50/50 border border-blue-100 p-8 md:p-12 rounded-3xl">
        <div class="flex items-start">
          <div class="flex-shrink-0 h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center mr-4 mt-1">
            <svg class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
          </div>
          <div>
            <h4 class="text-xl font-bold text-gray-900 mb-1">Total Isolation</h4>
            <p class="text-gray-600 leading-relaxed">Your theme's CSS (even the messiest ones) cannot alter XPressUI's design. It looks perfect out of the box.</p>
          </div>
        </div>
        <div class="flex items-start">
          <div class="flex-shrink-0 h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center mr-4 mt-1">
            <svg class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
          </div>
          <div>
            <h4 class="text-xl font-bold text-gray-900 mb-1">Clean File Storage</h4>
            <p class="text-gray-600 leading-relaxed">Uploaded documents go straight into the native WordPress Media Library, neatly attached to the submission.</p>
          </div>
        </div>
        <div class="flex items-start">
          <div class="flex-shrink-0 h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center mr-4 mt-1">
            <svg class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
          </div>
          <div>
            <h4 class="text-xl font-bold text-gray-900 mb-1">Crisp Operator Inbox</h4>
            <p class="text-gray-600 leading-relaxed">Your clients (lawyers, accountants) manage dossiers from a beautifully clean Inbox directly inside their wp-admin.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SECTION 4 : PRIX -->
  <section id="pricing" class="bg-gray-900 py-24 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-extrabold text-white sm:text-4xl">Simple pricing, built for Agencies.</h2>
        <p class="mt-4 text-xl text-gray-400">Pays for itself in the first hour of CSS you don't have to write.</p>
      </div>

      <div class="bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col md:flex-row">
        <div class="p-8 md:p-10 md:w-2/3">
          <h3 class="text-2xl font-bold text-gray-900 mb-2">Agency Lifetime License</h3>
          <p class="text-gray-500 mb-8">The complete Document Intake pack to equip your clients (lawyers, accountants, HR).</p>
          <ul class="space-y-4">
            <li class="flex items-center"><svg class="h-6 w-6 text-green-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="text-gray-700">Valid for up to <strong>5 production sites</strong></span></li>
            <li class="flex items-center"><svg class="h-6 w-6 text-green-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="text-gray-700">Automatic updates via the <em>wp-admin</em></span></li>
            <li class="flex items-center"><svg class="h-6 w-6 text-green-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="text-gray-700">Pro components included (Multi-upload, Scanner)</span></li>
            <li class="flex items-center"><svg class="h-6 w-6 text-green-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="text-gray-700">No subscriptions (One-time payment)</span></li>
          </ul>
        </div>
        <div class="bg-gray-50 p-8 md:p-10 md:w-1/3 flex flex-col justify-center items-center text-center border-l border-gray-100">
          <p class="text-gray-500 text-sm font-bold uppercase tracking-widest mb-2">One-time payment</p>
          <div class="flex items-baseline justify-center text-6xl font-extrabold text-gray-900"><span>€49</span></div>
          <p class="mt-2 text-gray-500 text-sm">excl. VAT, no hidden fees.</p>
          <?php if ($prelaunch_mode): ?>
          <a href="<?php echo esc_url($console_url); ?>" target="_blank" rel="noreferrer"
             class="mt-8 w-full block bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded-lg transition duration-200 shadow-lg shadow-blue-600/30 text-center">
            Try it free in the console →
          </a>
          <p class="mt-4 text-xs text-gray-400 font-medium">Free license during early access</p>
          <?php else: ?>
          <button id="buy-pro-btn" class="mt-8 w-full block bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded-lg transition duration-200 shadow-lg shadow-blue-600/30 disabled:opacity-50 disabled:cursor-not-allowed">Get Instant Access</button>
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
                this.innerText = 'Get Instant Access';
              }
            });
          </script>
          <p class="mt-4 text-xs text-gray-400 font-medium">Instant license delivery via email</p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

</div>

<?php get_footer(); ?>
