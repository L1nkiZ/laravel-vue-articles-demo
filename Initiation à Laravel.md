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

# Initiation à Laravel

**Objectif** : Ce mini-cours vous guidera dans les étapes essentielles pour commencer à utiliser Laravel, un framework PHP populaire pour le développement web. Vous apprendrez à installer Laravel, à créer des routes, des contrôleurs, des vues et à utiliser le système d'authentification intégré

## **Présentation de Laravel**

Laravel est un framework PHP open-source conçu pour faciliter le développement d'applications web robustes, évolutives et sécurisées. Il suit l'architecture MVC (Modèle-Vue-Contrôleur).

Laravel est utilisé pour développer des applications web, des API RESTful, des plateformes e-commerce, des CRM, et des systèmes de gestion complexes.

## 1. **Introduction à Laravel**

Laravel est un framework PHP basé sur le modèle MVC (Modèle-Vue-Contrôleur).

### **Composants principaux de Laravel** :

-   **Routing** (Gestion des routes)
-   **Middleware** (Filtrage des requêtes, permissions)
-   **Controllers** (Contrôleurs)
-   **Views** (Vues)
-   **Eloquent ORM** (Gestion de la base de données)
-   **Blade Templating** (Système de templating)
-   **Artisan CLI** (Interface en ligne de commande)
-   **Authentification** (Gestion des utilisateurs)

---

### **Installation de Laravel**

### **Pré-requis** :

-   PHP (>= 8.3)
-   Composer (gestionnaire de dépendances PHP)

Vérifiez votre version de PHP et de Composer avec les commandes suivantes :

```sh
php -v
composer -v
```

Si vous n'avez pas les versions requises, vous pouvez les télécharger sur les sites suivants :

-   [PHP Downloads](https://www.php.net/downloads)
-   [Composer Downloads](https://getcomposer.org/download/)

### **Étapes d'installation** :

1. Ouvrez un terminal et naviguez jusqu'au répertoire où vous souhaitez installer Laravel.
2. Exécutez la commande suivante pour installer Laravel via Composer :

    ```bash
    composer create-project --prefer-dist laravel/laravel nom-du-projet
    ```

3. Entrez dans le répertoire de votre projet :

    ```bash
    cd nom-du-projet
    ```

4. Lancez le serveur de développement intégré de Laravel, si vous n'utilisez pas de logiciel comme Wamp :

```bash
php artisan serve
```

Cela démarrera un serveur local sur `http://127.0.0.1:8000`.

---

## **Création de Routes et Contrôleurs**

### **Leçon 1 : Définir une route simple**

Laravel utilise un fichier `routes/web.php` pour définir les routes web. Chaque route fait le lien entre une URL et une fonction de contrôleur.

1. Ouvrez le fichier `routes/web.php`.
2. Ajoutez une route de base :

    ```php
    Route::get('/', function () {
        return 'Bienvenue sur mon site Laravel !';
    });
    ```

    Cette route répondra à la requête GET sur la page d'accueil avec un message simple.

### **Mini-exercice** :

Créez une route qui affiche "Bonjour, Laravel!" lorsque l'utilisateur accède à `/bonjour`.

### **Leçon 2 : Création d'un contrôleur**

Pour organiser votre logique métier, vous allez utiliser des contrôleurs. Voici comment créer un contrôleur.

1. Créez un contrôleur avec Artisan :

    ```bash
    php artisan make:controller ExempleController

    php artisan make:controller ExempleControllerRessource --ressource
    ```

2. Ouvrez le contrôleur dans `app/Http/Controllers/ExempleController.php` et ajoutez une méthode :

    ```php
    public function accueil() {
        return 'Page d\'accueil';
    }
    ```

3. Modifiez la route pour utiliser ce contrôleur :

    ```php
    Route::get('/', [ExempleController::class, 'accueil']);
    ```

## 4. **Gestion des Vues avec Blade**

Laravel utilise un moteur de template appelé **Blade** pour générer des vues dynamiques. Les fichiers Blade ont l'extension `.blade.php`.

### **Leçon 3 : Créer une vue avec Blade**

1. Créez une vue dans `resources/views`. Par exemple, créez un fichier `accueil.blade.php` avec le contenu suivant :

    ```blade
    <!DOCTYPE html>
    <html>
    <head>
        <title>Accueil</title>
    </head>
    <body>
        <h1>Bienvenue sur la page d'accueil</h1>
    </body>
    </html>
    ```

2. Dans votre contrôleur, renvoyez cette vue :

    ```php
    public function accueil() {
        return view('accueil');
    }
    ```

## 5. **Utilisation de l'Eloquent ORM pour Interagir avec la Base de Données**

Laravel facilite l'interaction avec la base de données grâce à **Eloquent ORM**.

### **Leçon 4 : Créer une table dans la base de données**

1. Créez une migration pour une table `articles` :

    ```bash
    php artisan make:migration create_articles_table --create=articles
    ```

2. Modifiez la migration dans `database/migrations` pour ajouter des colonnes :

    ```php
    public function up() {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('contenu');
            $table->timestamps();
        });
    }
    ```

3. Appliquez la migration :

    ```bash
    php artisan migrate
    ```

4. Créez un modèle `Article` :

    ```bash
    php artisan make:model Article
    ```

5. Utilisez Eloquent pour insérer un article dans la base de données :

    ```php
    use App\Models\Article;

    $article = new Article;
    $article->titre = 'Mon premier article';
    $article->contenu = 'Contenu de l\'article';
    $article->save();
    ```

## 6. **Authentification Utilisateur**

Laravel fournit un système d'authentification prêt à l'emploi.

### **Leçon 5 : Activer l'authentification**

1. Installez les packages d'authentification :

    ```bash
    composer require laravel/ui
    php artisan ui vue --auth
    npm install
    npm run dev
    ```

2. Lancez les migrations pour créer les tables nécessaires (utilisateurs, mots de passe, etc.) :

    ```bash
    php artisan migrate
    ```

Cela va générer les vues et contrôleurs nécessaires pour gérer l'authentification (connexion, inscription, etc.).
