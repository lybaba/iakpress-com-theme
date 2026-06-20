#!/bin/sh
# seed-blog-posts.sh — Seed the bilingual (FR + EN) IAKPress.com blog posts.
#
# Single source of truth for blog-post seeding. Used both by the local Docker
# entrypoint (scripts/docker-setup.sh) and by an admin on the real server.
#
# Idempotent: skips posts that already exist (by slug) and backfills the
# iak_article_key / iak_lang translation meta on pre-existing posts, so it is
# safe to re-run.
#
# Configuration (all optional, via env vars):
#   WP_PATH        Explicit WordPress root. When unset, wp-cli auto-detects
#                  (run the script from the WP root in that case).
#   WP_ALLOW_ROOT  Set to 1 to pass --allow-root to wp (needed when running as
#                  root, e.g. inside Docker). Off by default — most prod admins
#                  do NOT run as root.
#
# Content/images are read relative to this script's own location, so it works
# regardless of the current directory.
#
# Prod: cd /path/to/wordpress && WP_ALLOW_ROOT=1 bash wp-content/themes/iakpress-com-theme/scripts/seed-blog-posts.sh
#   (drop WP_ALLOW_ROOT=1 if you are not running wp-cli as root)

# ── Resolve this script's directory (POSIX, no readlink -f dependency) ───────
SCRIPT_DIR=$(CDPATH= cd -- "$(dirname -- "$0")" && pwd)
THEME_DIR=$(CDPATH= cd -- "$SCRIPT_DIR/.." && pwd)
BLOG_DIR="$THEME_DIR/content/blog"
PROMO_DIR="$THEME_DIR/assets/img/promo"

# ── Require wp-cli ───────────────────────────────────────────────────────────
if ! command -v wp >/dev/null 2>&1; then
  echo "ERROR: 'wp' (WP-CLI) not found on PATH. Install WP-CLI and re-run." >&2
  exit 1
fi

# ── Build the common wp args (path + allow-root) ─────────────────────────────
# WP_ARGS is intentionally word-split below (POSIX has no arrays in /bin/sh).
WP_ARGS=""
if [ -n "$WP_PATH" ]; then
  WP_ARGS="--path=$WP_PATH"
fi
if [ "$WP_ALLOW_ROOT" = "1" ]; then
  WP_ARGS="$WP_ARGS --allow-root"
fi

# Small wrapper so every call carries the path/allow-root flags consistently.
wpx() {
  # shellcheck disable=SC2086
  wp $WP_ARGS "$@"
}

echo "==> Creating blog posts (FR + EN)..."
echo "    theme:  $THEME_DIR"

# Ensure the language categories exist (slugs en / fr).
wpx term create category "English" --slug=en 2>/dev/null || true
wpx term create category "Français" --slug=fr 2>/dev/null || true

# create_post <title> <slug> <content-file> <excerpt> <lang-cat-slug> <topic-cat> <image-file> <article-key>
#
# <article-key> is a shared translation key: the FR post and its EN counterpart
# carry the *same* key in post meta `iak_article_key`, plus `iak_lang` = en|fr.
# This is what lets the language switcher map a post to its translation.
create_post() {
  title="$1"; slug="$2"; content_file="$3"; excerpt="$4"
  lang_cat="$5"; topic_cat="$6"; image_file="$7"; article_key="$8"

  id=$(wpx post list --post_type=post --name="$slug" --field=ID 2>/dev/null | head -1)

  if [ -n "$id" ]; then
    echo "   post '$slug' already exists (ID: $id)"
    # Idempotent backfill: ensure the translation key + lang meta are set even
    # on pre-existing posts (re-running setup must not need a wipe).
    if [ -n "$article_key" ]; then
      wpx post meta update "$id" iak_article_key "$article_key" 2>/dev/null
      wpx post meta update "$id" iak_lang "$lang_cat" 2>/dev/null
      echo "     backfilled iak_article_key='$article_key' iak_lang='$lang_cat'"
    fi
    return
  fi

  if [ ! -f "$content_file" ]; then
    echo "   ERROR: content file not found: $content_file"
    return
  fi

  id=$(wpx post create "$content_file" \
    --post_type=post \
    --post_title="$title" \
    --post_name="$slug" \
    --post_excerpt="$excerpt" \
    --post_status=publish \
    --porcelain 2>/dev/null)

  if [ -z "$id" ]; then
    echo "   ERROR: could not create post '$slug'"
    return
  fi
  echo "   Created post '$slug' (ID: $id)"

  # Assign language category + topical category (creates the topic term if needed).
  wpx post term set "$id" category "$lang_cat" "$topic_cat" 2>/dev/null

  # Translation key + language so the FR/EN pair can be linked by the switcher.
  if [ -n "$article_key" ]; then
    wpx post meta update "$id" iak_article_key "$article_key" 2>/dev/null
    wpx post meta update "$id" iak_lang "$lang_cat" 2>/dev/null
  fi

  # Featured image (idempotent at the post level: only set when missing).
  if [ -n "$image_file" ] && [ -f "$PROMO_DIR/$image_file" ]; then
    att_id=$(wpx media import "$PROMO_DIR/$image_file" \
      --title="$title" --porcelain 2>/dev/null | head -1)
    if [ -n "$att_id" ]; then
      wpx post meta update "$id" _thumbnail_id "$att_id" 2>/dev/null
      echo "     featured image set (attachment ID: $att_id)"
    else
      echo "     WARN: could not import image $image_file"
    fi
  fi
}

# Article 1 — blind spot / angle mort
create_post "Vos collaborateurs passent jusqu'à 30 % de leur temps à courir après des pièces" \
  "30-pourcent-temps-relance" "$BLOG_DIR/02-30-pourcent.fr.html" \
  "La relance par email, WhatsApp et SMS peut absorber jusqu'à 30 % du temps d'un collaborateur. Le correctif : un lien sans login, une validation à la source, une inbox opérateur." \
  "fr" "Cabinets comptables" "02-formulaire-multi-etapes.png" "chasing-documents"

create_post "Your team spends up to 30% of its time chasing missing documents" \
  "30-percent-time-chasing-documents" "$BLOG_DIR/02-30-percent.en.html" \
  "Chasing documents by email, WhatsApp and text can swallow up to 30% of a staffer's time. The fix: a no-login link, validation at the source, and an operator inbox." \
  "en" "Accounting firms" "02-formulaire-multi-etapes.png" "chasing-documents"

create_post "L'angle mort de votre cabinet : les documents que Dext et Pennylane ne géreront jamais" \
  "angle-mort-pieces-exception" "$BLOG_DIR/01-angle-mort.fr.html" \
  "L'OCR lit le standard ; il ne va jamais chercher la pièce d'exception, l'onboarding ni les clôtures. Lecture de pièce vs collecte guidée." \
  "fr" "Cabinets comptables" "01-collecte-pieces.png" "blind-spot"

create_post "Your firm's blind spot: the documents Dext and Pennylane will never handle" \
  "blind-spot-documents-ocr-never-handles" "$BLOG_DIR/01-blind-spot.en.html" \
  "OCR reads the standard; it never chases the exception item, the onboarding, or the year-end close. Reading a document vs. guided collection." \
  "en" "Accounting firms" "01-collecte-pieces.png" "blind-spot"

create_post "Le premier email d'onboarding qui fait fuir vos nouveaux clients" \
  "onboarding-premiere-impression" "$BLOG_DIR/03-onboarding.fr.html" \
  "Le premier email d'onboarding (Kbis, statuts, RIB, pièces d'identité) abîme la première impression. Un portail à la marque, sans login, fait premium et RGPD-propre." \
  "fr" "Cabinets comptables" "03-onboarding-client.png" "onboarding"

create_post "The first onboarding email that scares your new clients away" \
  "onboarding-first-impression" "$BLOG_DIR/03-onboarding.en.html" \
  "The first onboarding email (registration certificate, articles, bank details, IDs) damages the first impression. A branded, no-login portal feels premium and stays GDPR-clean." \
  "en" "Accounting firms" "03-onboarding-client.png" "onboarding"

create_post "Facture électronique 2026 : ce que la réforme ne résout PAS" \
  "facture-electronique-ce-qui-reste" "$BLOG_DIR/04-facture-electronique.fr.html" \
  "La facture électronique automatise le standard mais laisse intacts onboarding, exceptions et clôtures. Le hors-flux devient le premier poste de temps." \
  "fr" "Cabinets comptables" "04-collecte-fiscale-tva.png" "e-invoicing"

create_post "E-invoicing 2026: what the reform does NOT solve" \
  "e-invoicing-what-the-reform-leaves" "$BLOG_DIR/04-e-invoicing.en.html" \
  "E-invoicing automates the standard but leaves onboarding, exceptions and year-end closes untouched. The off-flow becomes your biggest time sink." \
  "en" "Accounting firms" "04-collecte-fiscale-tva.png" "e-invoicing"

create_post "« Encore un form builder ? » — la phrase qui a failli tuer mon produit" \
  "encore-un-form-builder-positionnement" "$BLOG_DIR/05-positionnement.fr.html" \
  "Construire était facile ; dire clairement ce que c'est — sans tomber dans « encore un form builder » — fut le vrai combat. La décision de niche." \
  "fr" "Coulisses" "02-formulaire-multi-etapes.png" "positioning"

create_post "\"Just another form builder?\" — the sentence that nearly killed my product" \
  "just-another-form-builder-positioning" "$BLOG_DIR/05-positioning.en.html" \
  "Building was easy; saying clearly what it is — without sounding like \"just another form builder\" — was the real fight. The decision to pick a niche." \
  "en" "Behind the scenes" "02-formulaire-multi-etapes.png" "positioning"

echo "==> Blog post seeding complete."
