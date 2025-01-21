<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://github.com/othneildrew/Best-README-Template">
    <img src="https://upload.wikimedia.org/wikipedia/fr/2/2b/RGDS.jpg" alt="Description">
  </a>

  <h3 align="center">Installation et démo pour un projet Laravel et VueJS</h3>

  <p align="center">
    &middot;
    <a href="https://github.com/othneildrew/Best-README-Template">View Demo</a>
    &middot;
  </p>
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

<!-- CTRL + SHIFT + V FOR TESTING -->

### Built With

This section should list any major frameworks/libraries used to bootstrap your project. Leave any add-ons/plugins for the acknowledgements section. Here are a few examples.

-   [![Next][Next.js]][Next-url]
-   [![React][React.js]][React-url]
-   [![Vue][Vue.js]][Vue-url]
-   [![Angular][Angular.io]][Angular-url]
-   [![Svelte][Svelte.dev]][Svelte-url]
-   [![Laravel][Laravel.com]][Laravel-url]
-   [![Bootstrap][Bootstrap.com]][Bootstrap-url]
-   [![JQuery][JQuery.com]][JQuery-url]

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- GETTING STARTED -->

## Getting Started

This is an example of how you may give instructions on setting up your project locally.
To get a local copy up and running follow these simple example steps.

### Prerequisites

This is an example of how to list things you need to use the software and how to install them.

-   npm
    ```sh
    npm install npm@latest -g
    ```

### Installation

_Below is an example of how you can instruct your audience on installing and setting up your app. This template doesn't rely on any external dependencies or services._

1. Get a free API Key at [https://example.com](https://example.com)
2. Clone the repo
    ```sh
    git clone https://github.com/github_username/repo_name.git
    ```
3. Install NPM packages
    ```sh
    npm install
    ```
4. Enter your API in `config.js`
    ```js
    const API_KEY = "ENTER YOUR API";
    ```
5. Change git remote url to avoid accidental pushes to base project
    ```sh
    git remote set-url origin github_username/repo_name
    git remote -v # confirm the changes
    ```

<p align="right">(<a href="#readme-top">back to top</a>)</p>
