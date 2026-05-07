#!/usr/bin/env bash
set -euo pipefail

# 1. On s'assure d'être dans le dossier du thème
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
cd "$SCRIPT_DIR/.."

# 2. On installe les dépendances si nécessaire et on compile le CSS final
npm install --prefer-offline
npm run build

# 3. On crée un dossier temporaire propre et on y copie les bons fichiers
mkdir -p dist/iakpress-com-theme
rsync -a --exclude='node_modules' \
         --exclude='src' \
         --exclude='.git' \
         --exclude='.github' \
         --exclude='package*.json' \
         --exclude='tailwind.config.js' \
         --exclude='postcss.config.js' \
         --exclude='release.yml' \
         --exclude='dist' \
         --exclude='scripts' \
         --exclude='*.zip' \
         --exclude='.gitignore' \
         --exclude='docker-compose.yml' \
         --exclude='iakpress-com-theme' \
         ./ dist/iakpress-com-theme/

# 4. On crée le fichier ZIP
cd dist
if command -v zip &>/dev/null; then
  zip -r ../iakpress-com-theme.zip iakpress-com-theme/
else
  tar -czf ../iakpress-com-theme.tar.gz iakpress-com-theme/
  echo "Note: zip not available, created iakpress-com-theme.tar.gz instead"
fi
cd ..

# 5. On nettoie le dossier temporaire
rm -rf dist/
