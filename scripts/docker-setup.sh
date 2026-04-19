#!/bin/sh
# Runs inside the wordpress:cli container at each `docker-compose up`.
# Idempotent — safe to re-run.

WP=/var/www/html
URL=http://localhost:8080

# ── 1. Wait for WordPress core files ────────────────────────────────────────
echo "==> Waiting for WordPress core files..."
until [ -f "$WP/wp-settings.php" ]; do sleep 2; done

# ── 2. Wait for database ─────────────────────────────────────────────────────
echo "==> Waiting for database..."
until wp --allow-root db check --path="$WP" 2>/dev/null; do sleep 2; done

# ── 3. Install WordPress ─────────────────────────────────────────────────────
echo "==> Installing WordPress..."
wp --allow-root core install \
  --path="$WP" \
  --url="$URL" \
  --title="Document Intake — Local" \
  --admin_user=admin \
  --admin_password=admin \
  --admin_email=admin@local.test \
  --skip-email 2>/dev/null \
  && echo "   Installed." \
  || echo "   Already installed, skipping."

# ── 4. Create minimal GeneratePress stub (no network dependency) ─────────────
echo "==> Ensuring GeneratePress parent theme stub..."
GP_DIR="$WP/wp-content/themes/generatepress"
if [ ! -f "$GP_DIR/style.css" ]; then
  mkdir -p "$GP_DIR"
  cat > "$GP_DIR/style.css" <<'CSS'
/*
Theme Name: GeneratePress
Version: 3.4.0
Description: GeneratePress stub for local development.
*/
CSS
  printf '<?php\n// GeneratePress stub — local dev only\n' > "$GP_DIR/index.php"
  echo "   Stub created."
else
  echo "   Stub already present."
fi

# ── 5. Activate the child theme ──────────────────────────────────────────────
echo "==> Activating iakpress-com-theme..."
wp --allow-root theme activate iakpress-com-theme --path="$WP" \
  && echo "   Activated." \
  || echo "   ERROR: could not activate theme."

# ── 6. Create pages with templates ───────────────────────────────────────────
echo "==> Creating pages..."

create_page() {
  local title="$1" slug="$2" template="$3"

  local id
  id=$(wp --allow-root post list --path="$WP" \
    --post_type=page --post_name="$slug" --field=ID 2>/dev/null | head -1)

  if [ -z "$id" ]; then
    id=$(wp --allow-root post create \
      --path="$WP" \
      --post_type=page \
      --post_title="$title" \
      --post_name="$slug" \
      --post_status=publish \
      --porcelain 2>/dev/null)
    echo "   Created '$slug' (ID: $id)"
  else
    echo "   '$slug' already exists (ID: $id)"
  fi

  wp --allow-root post meta update --path="$WP" "$id" _wp_page_template "$template" 2>/dev/null
}

create_page "Document Intake"     "xpressui"           "template-xpressui-overview.php"
create_page "Pro"                 "pro"                "page-pro.php"
create_page "Pricing"             "pricing"            "page-pricing.php"
create_page "Install"             "install"            "page-install.php"
create_page "Contact"             "contact"            "page-contact.php"
create_page "Purchase Confirmed"  "purchase-confirmed" "page-purchase-confirmed.php"

# ── 7. Set overview as static front page ─────────────────────────────────────
echo "==> Setting overview as static front page..."
FRONT_ID=$(wp --allow-root post list --path="$WP" \
  --post_type=page --post_name=xpressui --field=ID 2>/dev/null | head -1)
if [ -n "$FRONT_ID" ]; then
  wp --allow-root rewrite structure '/%postname%/' --hard --path="$WP" 2>/dev/null || true
  cat > "$WP/.htaccess" <<'HTACCESS'
# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
</IfModule>
# END WordPress
HTACCESS
  wp --allow-root option update --path="$WP" show_on_front page
  wp --allow-root option update --path="$WP" page_on_front "$FRONT_ID"
fi

echo ""
echo "================================================"
echo "  Setup complete!"
echo "  Site:     $URL"
echo "  wp-admin: $URL/wp-admin"
echo "  Login:    admin / admin"
echo "================================================"
