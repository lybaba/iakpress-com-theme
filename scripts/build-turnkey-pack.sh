#!/bin/bash

# Se placer à la racine du thème
cd "$(dirname "$0")/.."

PACK_NAME="turnkey-setup.zip"
echo "📦 Création du pack XPressUI : $PACK_NAME..."

# Créer un dossier temporaire propre
mkdir -p dist/turnkey-setup

# Copier les fichiers du workflow
cp src/manifest.json src/form.config.json src/template.context.json dist/turnkey-setup/

# Créer l'archive zip
cd dist
zip -r "../$PACK_NAME" turnkey-setup/
cd ..

# Nettoyer
rm -rf dist/turnkey-setup

echo "✅ Pack généré avec succès : libs/iakpress-com-theme/$PACK_NAME"