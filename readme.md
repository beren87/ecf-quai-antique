# ECF 2023 - Quai Antique

Dans ce readme, je vous propose toutes les démarches à suivre pour l'exécution en local de ce projet.

## Installation

Ici la [documentation Symfony](https://symfony.com/doc/current/setup.html) pour démarrer le projet.

## Prérequis pour le projet avec Symfony

```bash
php -v
composer -v
node -v
npm -v
symfony check:requirements
```
--> Création du projet Symfony - Quai Antique

```bash
symfony new quai_antique --version="5.4.*"--webapp
```
## Branche feat/template
Mise en place de Webpack Encore + Bootstrap v5
 
[documentation Webpack Encore](https://symfony.com/doc/current/setup.html).
[documentation CSS/SASS](https://symfony.com/doc/current/frontend/encore/css-preprocessors.html).
[documentation PostCSS/autoprefixer](https://symfony.com/doc/current/frontend/encore/postcss.html).
[documentation référencer des images](https://symfony.com/doc/current/frontend/encore/copy-files.html).
[documentation bootstrap ](https://symfony.com/doc/current/frontend/encore/bootstrap.html) + (https://getbootstrap.com/)

```bash
composer require symfony/webpack-encore-bundle
npm install
npm install sass-loader@^13.0.0 sass --save-dev
npm install postcss-loader@^7.0.0 --save-dev
npm install autoprefixer --save-dev
npm install file-loader@^6.0.0 --save-dev
npm i bootstrap@5.3.0-alpha1
npm i --save bootstrap @popperjs/core
npm run build  
```

