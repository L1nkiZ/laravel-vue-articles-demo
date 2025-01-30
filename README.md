<!-- PROJECT LOGO -->
<style>
h1 {
    font-size: 3em;
    border-bottom: 2px solid #2980b9;
    padding-bottom: 0.3em;
    text-align: center;
}

h2 {
    font-size: 2em;
    border-bottom: 1px solid #2980b9;
    padding-bottom: 0.2em;
    text-align: center;

}

h3 {
    font-size: 1.8em;
}
</style>

<br />
<div align="center">
  <a href="https://github.com/othneildrew/Best-README-Template">
    <img src="https://upload.wikimedia.org/wikipedia/fr/2/2b/RGDS.jpg" alt="Description">
  </a>

  <h3 align="center">Installation et démo pour un projet Laravel et VueJS</h3>

<h4>  
    Ce projet est réalisé dans le cadre d'une veille technologique et de potentiel choix de technologie pour l'entreprise R-GDS, dans le cadre de mon alternance avec l'école Ynov Campus Strasbourg - Janv 2025 
</h4>

Les technologies utilisées sont Laravel 9, Vue.js 3, Bootstrap 5, et FontAwesome.

</div>

## Prérequis

Avoir une version à jour de Node, npm, PHP et Composer. Si ce n'est pas le cas, voici comment les installer :

### Node et npm

1. Téléchargez et installez Node.js depuis [nodejs.org](https://nodejs.org/).
2. Vérifiez l'installation de Node.js :
    ```sh
    node -v
    ```
3. Vérifiez l'installation de npm :
    ```sh
    npm -v
    ```

### PHP

1. Téléchargez et installez PHP depuis [php.net](https://www.php.net/downloads).
2. Vérifiez l'installation de PHP :
    ```sh
    php -v
    ```

### Composer

1. Téléchargez et installez Composer depuis [getcomposer.org](https://getcomposer.org/download/).
2. Vérifiez l'installation de Composer :
    ```sh
    composer -v
    ```

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Installation du projet existant

### Git

Pour récupérer le projet existant sur votre machine en local, il vous suffit de cloner le projet avec git :

```sh
git clone https://github.com/L1nkiZ/laravel-vue-articles-demo.git
```

### Mise en place des dépendances

Pour installer les dépendances frontend (Vue.js), npm va installer les dépendances renseignées dans le fichier `package.json` :

```sh
npm install OU npm update
```

De la même manière, pour les dépendances backend (Laravel), composer va installer les dépendances renseignées dans `composer.json` :

```sh
composer install OU composer update
```

Si vous avez des problèmes lors de l'installation avec composer, il se pourrait que les données en cache en soient responsables. Si c'est le cas, il suffit de faire la commande suivante :

```sh
composer clear-cache
```

### Base de données

Une fois le projet téléchargé, il faut configurer votre fichier `.env` ainsi que votre fichier `database.php`.

-   `.env`

Prenez exemple sur le fichier `.env.example` pour configurer les champs pour votre base de données. L'exemple suivant est avec MySQL. Il faut également renseigner votre `APP_URL`, on en aura besoin plus tard :

```env
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

Les informations du fichier `.env` doivent correspondre au fichier `database.php`, comme les lignes suivantes par exemple :

```php
'default' => env('DB_CONNECTION', 'mysql'),

'mysql' => [
    'driver' => 'mysql',
    'url' => env('DATABASE_URL'),
    'host' => env('DB_HOST', '127.0.0.1'),
    'port' => env('DB_PORT', '3306'),
    'database' => env('DB_DATABASE', 'forge'),
    'username' => env('DB_USERNAME', 'forge'),
    'password' => env('DB_PASSWORD', ''),
    'unix_socket' => env('DB_SOCKET', ''),
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'prefix' => '',
    'prefix_indexes' => true,
    'strict' => true,
    'engine' => null,
    'options' => extension_loaded('pdo_mysql') ? array_filter([
        PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
    ]) : [],
],
```

Maintenant que la base de données est configurée, vous pouvez lancer la commande pour effectuer les migrations dans la base de données :

```sh
php artisan migrate
```

Si vous avez des problèmes pendant les migrations, le problème vient peut-être de votre fichier php.ini. Vérifiez que vos extensions de base de données sont bien activées en retirant le caractère `;` devant, par exemple pour MySQL :

```ini
extension=pdo_mysql
extension=mysqli
```

Une fois toutes ces étapes effectuées, il suffit dans une invite de commande de lancer la commande à la racine du projet :

```sh
npm run dev
```

Si vous n'avez pas de logiciel comme WampServer qui permette de démarrer le serveur PHP, utilisez la commande suivante :

```sh
php artisan serve
```

## Creation du projet

### Laravel

-   Installation du projet Laravel

    ```sh
    composer create-project laravel/laravel NomDuProjet
    ```

-   Pour pouvoir démarrer le serveur PHP si vous n'utilisez pas d'autre outil comme WampServer

    ```sh
    php artisan serve
    ```

### VueJs

-   Installation du projet Vue.js

    ```sh
    npm install vue @vitejs/plugin-vue
    ```

### Configurer Vite pour utiliser Vue.js

Ouvrez le document vite.config.js pour configurer le plugin de Vue

```js
import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
        vue(),
    ],
    resolve: {
        alias: {
            vue: "vue/dist/vue.esm-bundler.js",
        },
    },
});
```

### Configurer Vue.js

Si ce n'est pas le cas crée un dossier `ressource/js`
Crée ou modifier le fichier `app.js` et ajouter le contenu suivant

```js
import { createApp } from "vue";
import App from "./App.vue";

createApp(App).mount("#app");
```

Pour pouvoir afficher les pages de Vue.js à la place de celles de Blade pour Laravel, il faut indiquer dans un fichier Blade une `div` avec un `id="app"` comme par exemple dans le fichier `welcome.blade.php`, ainsi que l'URL de l'application :

```php
<div id="app" data-url="{{ config('app.url') }}"></div>
```

<!-- CTRL + SHIFT + V FOR TESTING -->
