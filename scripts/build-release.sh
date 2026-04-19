# 1. On s'assure d'être dans le dossier du thème
cd /home/lyb/projects/iakpress-console/libs/iakpress-com-theme

# 2. On compile le CSS final
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
zip -r ../iakpress-com-theme.zip iakpress-com-theme/
cd ..

# 5. On nettoie le dossier temporaire
rm -rf dist/
