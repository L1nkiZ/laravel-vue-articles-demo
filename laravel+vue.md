### 1. Prérequis

Avant de commencer, assurez-vous d’avoir installé Laravel, Vue.js, Axios et PostgreSQL sur votre machine. Vous pouvez installer Laravel via Composer et Vue.js via NPM.

**Installation de Laravel :**

```bash
composer create-project --prefer-dist laravel/laravel laravel-vue
cd laravel-vue
```

**Installer Vue.js et Axios :**

```bash
npm install vue@next vue-loader@next
npm install axios
```

Assurez-vous également que PostgreSQL est installé et configuré sur votre machine. Vous devrez créer une base de données pour cet exemple.

### 2. Configuration de la base de données PostgreSQL

Dans le fichier `.env`, configurez la connexion à la base de données PostgreSQL.

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 3. Création des Modèles et des Migrations

Nous allons créer deux modèles pour cet exemple : `Post` et `Category`. Un `Post` peut appartenir à une `Category`.

**Création des migrations et des modèles :**

```bash
php artisan make:model Post -m
php artisan make:model Category -m
```

**Migration des catégories (categories table) :**

Dans `database/migrations/xxxx_xx_xx_create_categories_table.php` :

```php
public function up()
{
    Schema::create('categories', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->timestamps();
    });
}
```

**Migration des posts (posts table) :**

Dans `database/migrations/xxxx_xx_xx_create_posts_table.php` :

```php
public function up()
{
    Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('content');
        $table->unsignedBigInteger('category_id');
        $table->timestamps();

        $table->foreign('category_id')->references('id')->on('categories');
    });
}
```

Ensuite, effectuez la migration pour créer les tables dans la base de données PostgreSQL.

```bash
php artisan migrate
```

### 4. Création du Contrôleur

Ensuite, créons un contrôleur `PostController` pour gérer les actions CRUD.

**Générer le contrôleur :**

```bash
php artisan make:controller PostController
```

Dans `app/Http/Controllers/PostController.php` :

```php
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Afficher la liste des posts
    public function index()
    {
        $posts = Post::with('category')->get(); // Join pour récupérer les catégories
        return response()->json($posts);
    }

    // Créer un nouveau post
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $post = Post::create($request->all());
        return response()->json($post);
    }

    // Modifier un post existant
    public function edit($id, Request $request)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return response()->json($post);
    }

    // Supprimer un post
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return response()->json(['message' => 'Post deleted successfully']);
    }
}
```

### 5. Définir les Routes API

Ouvrez `routes/api.php` pour ajouter les routes nécessaires.

```php
use App\Http\Controllers\PostController;

Route::get('posts', [PostController::class, 'index']);
Route::post('posts', [PostController::class, 'create']);
Route::put('posts/{id}', [PostController::class, 'edit']);
Route::delete('posts/{id}', [PostController::class, 'destroy']);
```

### 6. Création de la Vue Vue.js avec Vue 3

Nous allons maintenant créer une vue avec Vue.js pour interagir avec notre API.

**Dans `resources/js` :**

-   **Créez un fichier `PostComponent.vue`** :

```vue
<template>
    <div>
        <h1>Posts</h1>

        <!-- Liste des posts -->
        <div v-for="post in posts" :key="post.id">
            <p>{{ post.title }} - {{ post.category.name }}</p>
            <button @click="editPost(post.id)">Edit</button>
            <button @click="deletePost(post.id)">Delete</button>
        </div>

        <!-- Formulaire pour ajouter un post -->
        <h2>Add New Post</h2>
        <form @submit.prevent="createPost">
            <input v-model="newPost.title" placeholder="Title" required />
            <textarea
                v-model="newPost.content"
                placeholder="Content"
                required
            ></textarea>
            <select v-model="newPost.category_id" required>
                <option
                    v-for="category in categories"
                    :key="category.id"
                    :value="category.id"
                >
                    {{ category.name }}
                </option>
            </select>
            <button type="submit">Add Post</button>
        </form>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

const posts = ref([]);
const categories = ref([]);
const newPost = ref({
    title: "",
    content: "",
    category_id: "",
});

onMounted(async () => {
    await fetchPosts();
    await fetchCategories();
});

const fetchPosts = async () => {
    try {
        const response = await axios.get("http://localhost/api/posts");
        posts.value = response.data;
    } catch (error) {
        console.error("Error fetching posts:", error);
    }
};

const fetchCategories = async () => {
    try {
        const response = await axios.get("http://localhost/api/categories");
        categories.value = response.data;
    } catch (error) {
        console.error("Error fetching categories:", error);
    }
};

const createPost = async () => {
    try {
        const response = await axios.post(
            "http://localhost/api/posts",
            newPost.value
        );
        posts.value.push(response.data);
        newPost.value = { title: "", content: "", category_id: "" }; // Reset form
    } catch (error) {
        console.error("Error creating post:", error);
    }
};

const editPost = async (id) => {
    const updatedContent = prompt("Enter new content");
    try {
        const response = await axios.put(`http://localhost/api/posts/${id}`, {
            content: updatedContent,
        });
        const index = posts.value.findIndex((post) => post.id === id);
        posts.value[index] = response.data;
    } catch (error) {
        console.error("Error editing post:", error);
    }
};

const deletePost = async (id) => {
    try {
        await axios.delete(`http://localhost/api/posts/${id}`);
        posts.value = posts.value.filter((post) => post.id !== id);
    } catch (error) {
        console.error("Error deleting post:", error);
    }
};
</script>
```

### 7. Affichage des Données

Maintenant, assurez-vous d’inclure le composant Vue.js dans votre fichier principal `resources/js/app.js`.

```javascript
import { createApp } from "vue";
import PostComponent from "./components/PostComponent.vue";

createApp(PostComponent).mount("#app");
```

### 8. Compilation des Assets

Compilez les fichiers JavaScript avec :

```bash
npm run dev
```

### 9. Affichage dans la Vue Blade

Dans votre fichier Blade `resources/views/welcome.blade.php` :

```html
<div id="app"></div>

<script src="{{ mix('js/app.js') }}"></script>
```

### Conclusion

Avec ce guide, vous avez créé une application Laravel avec Vue.js qui interagit en temps réel avec la base de données PostgreSQL. Vous avez ajouté la gestion des posts et des catégories avec des opérations CRUD utilisant un contrôleur, et vous avez utilisé Axios pour effectuer des requêtes API dans Vue.js avec la syntaxe `script setup`.
