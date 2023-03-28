# ECF 2023 - Quai Antique

Je suis Berenger FERGUENIS, actuellement en formation chez STUDI depuis septembre 2022 en tant que Développeur Web et Web mobile Fullstack.
Dans ce readme, je vous propose toutes les démarches à suivre pour l'exécution en local du projet Quai Antique.

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

## Installation du projet avec la version LTS 5.4

[long-term support version](https://symfony.com/releases/5.4)
```bash
symfony new quai_antique --version="5.4.*"--webapp
```
## Mise en place de Webpack Encore + Bootstrap v5

[documentation Webpack Encore](https://symfony.com/doc/5.4/setup.html).
[documentation CSS/SASS](https://symfony.com/doc/5.4/frontend/encore/css-preprocessors.html).
[documentation PostCSS/autoprefixer](https://symfony.com/doc/5.4/frontend/encore/postcss.html).
[documentation référencer des images](https://symfony.com/doc/5.4/frontend/encore/copy-files.html).
[documentation bootstrap ](https://symfony.com/doc/5.4/frontend/encore/bootstrap.html) + (https://getbootstrap.com/)

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
## Serveur local

[documentation local server](https://symfony.com/doc/5.4/setup/symfony_server.html)
```bash
symfony server:start
```
ou
```bash
symfony serve -d
```
Ne pas oublier de démarrer Apache et MySQL via [XAMPP](https://www.apachefriends.org/fr/index.html), [WAMP](https://www.wampserver.com/) ou [MAMP](https://www.mamp.info/en/downloads/)

Pour l'arrêt du serveur local 
```bash
symfony serve:stop
```

## Partie admin
Email : admin@mail.fr
Mot de passe : password

Vous aurez ensuite un accès à la partie administration depuis la barre de navigation à côté du bouton se déconnecter.

## Le site
Vous pouvez vous rendre sur le site ici [Quai Antique](https://quai-antique-chambery.herokuapp.com/)