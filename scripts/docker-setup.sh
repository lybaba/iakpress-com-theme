# Disable SSL verification for MariaDB client (avoid self-signed cert issue with local mysql 8)
mkdir -p /home/www-data
cat > /home/www-data/.my.cnf <<'EOF'
[client]
ssl=0
EOF
chown -R www-data:www-data /home/www-data/.my.cnf 2>/dev/null || true

mkdir -p /root
cat > /root/.my.cnf <<'EOF'
[client]
ssl=0
EOF

WP=/var/www/html
URL=http://localhost:8080

# ── 1. Wait for WordPress core files ────────────────────────────────────────
echo "==> Waiting for WordPress core files..."
until [ -f "$WP/wp-settings.php" ]; do sleep 2; done

# ── 2. Wait for database ─────────────────────────────────────────────────────
echo "==> Waiting for database..."
until wp --allow-root db check --ssl=0 --path="$WP" 2>/dev/null; do sleep 2; done

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

  id=$(wp --allow-root post list --path="$WP" \
    --post_type=page --name="$slug" --field=ID 2>/dev/null | head -1)

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

create_page "Home"                "home"               "default"
create_page "Document Intake"     "xpressui"           "page-xpressui.php"
create_page "Pro"                 "pro"                "page-pro.php"
create_page "Pricing"             "pricing"            "page-pricing.php"
create_page "XPressUI Cloud"      "xpressui-cloud"     "page-xpressui-cloud.php"
create_page "Agency Pilot"        "agency-pilot"       "page-agency-pilot.php"
create_page "For Accountants"     "for-accountants"    "page-for-accountants.php"
create_page "For Agencies"        "for-agencies"       "page-for-agencies.php"
create_page "For Operations"      "for-operations"     "page-for-operations.php"
create_page "Install"             "install"            "page-install.php"
create_page "Contact"             "contact"            "page-contact.php"
create_page "Blog"                "blog"               "default"
create_page "Purchase Confirmed"  "purchase-confirmed" "page-purchase-confirmed.php"

if [ -n "$XPRESSUI_CONTACT_HOSTED_LINK_URL" ]; then
  CONTACT_ID=$(wp --allow-root post list --path="$WP" \
    --post_type=page --name=contact --field=ID 2>/dev/null | head -1)
  if [ -n "$CONTACT_ID" ]; then
    wp --allow-root post meta update --path="$WP" "$CONTACT_ID" xpressui_contact_hosted_link_url "$XPRESSUI_CONTACT_HOSTED_LINK_URL" 2>/dev/null
    echo "   Contact hosted link URL configured from XPRESSUI_CONTACT_HOSTED_LINK_URL."
  fi
fi

# ── 7. Set home as static front page ─────────────────────────────────────────
echo "==> Setting home as static front page..."
FRONT_ID=$(wp --allow-root post list --path="$WP" \
  --post_type=page --name=home --field=ID 2>/dev/null | head -1)
if [ -n "$FRONT_ID" ]; then
  BLOG_ID=$(wp --allow-root post list --path="$WP" \
    --post_type=page --name=blog --field=ID 2>/dev/null | head -1)
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
  if [ -n "$BLOG_ID" ]; then
    wp --allow-root option update --path="$WP" page_for_posts "$BLOG_ID"
  fi
fi

# Ensure the Apache container (www-data, UID 33) owns the generated files
chown -R 33:33 "$WP/wp-content/themes/generatepress" "$WP/.htaccess" 2>/dev/null || true

echo ""
echo "================================================"
echo "  Setup complete!"
echo "  Site:     $URL"
echo "  wp-admin: $URL/wp-admin"
echo "  Login:    admin / admin"
echo "================================================"
