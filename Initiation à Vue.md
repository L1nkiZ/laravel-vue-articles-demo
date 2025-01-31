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

# **Initiation à Vue.js**

## **Présentation de Vue.js**

Vue.js est un framework JavaScript progressif utilisé pour construire des interfaces utilisateur dynamiques et réactives. Il est léger, flexible et facile à apprendre, tout en offrant de puissantes fonctionnalités pour développer des applications web modernes.

Contrairement à des frameworks monolithiques\* comme Angular, Vue.js peut être utilisé de manière progressive, que ce soit pour ajouter de l’interactivité à une page ou pour développer une application complète en Single Page Application (SPA).

\*Un framework monolithique est un framework qui offre une solution complète et intégrée pour le développement d’une application, en englobant toutes les fonctionnalités nécessaires dans un seul environnement. Il est conçu pour gérer à la fois le front-end, le back-end, la base de données, la gestion des sessions, l’authentification, etc.

### **Exemples de frameworks monolithiques :**

Terme important **ORM** : Un ORM (Object-Relational Mapping) est un outil qui permet d’interagir avec une base de données en utilisant un langage orienté objet, plutôt qu’en écrivant directement des requêtes SQL.

-   Laravel (PHP) – Gère le routing, l’ORM (Object-Relational Mapping), l’authentification, la gestion des requêtes, etc.
-   Django (Python) – Inclut une structure complète avec ORM, serveur intégré, sécurité avancée.
-   Ruby on Rails (Ruby) – Offre une approche tout-en-un pour le développement web.
-   Angular (JavaScript) – Un framework front-end monolithique, le data-binding, le routing et la gestion d’état.
-   .NET (C#) – Un framework complet pour le développement d’applications web, desktop et cloud, incluant ASP.NET pour le web, un ORM (Entity Framework), un système d’authentification intégré et une compatibilité multi-plateforme avec .NET Core.

### **Pré-requis** :

-   Node.js (>= 14.x)
-   npm (gestionnaire de dépendances Node.js)

Vérifiez votre version de Node.js et de npm avec les commandes suivantes :

```sh
node -v
npm -v
```

Si vous n'avez pas les versions requises, vous pouvez les télécharger sur les sites suivants :

-   [Node.js Downloads](https://nodejs.org/en/download/)
-   [npm Downloads](https://www.npmjs.com/get-npm)

Vue.js est un framework JavaScript progressif utilisé pour construire des interfaces utilisateur et des applications web à page unique (SPA). C’est un outil puissant mais simple à prendre en main.

---

## **Introduction à Vue.js**

Vue.js est basé sur une approche réactive et déclarative. Cela signifie que la vue (interface utilisateur) se met à jour automatiquement lorsque les données changent.

### **Installation**

Avant de commencer, il faut installer Vue.js. Vous pouvez soit l'intégrer via un CDN dans un fichier HTML, soit utiliser une configuration avec Vue CLI pour des projets plus complexes.

Ouvrez le terminal et tapez:

```bash
npm install -g @vue/cli
vue create mon-projet
```

### **Liaisons de données**

Vue.js permet de lier les données JavaScript à l’interface HTML de manière réactive. Voici un exemple simple :

```html
<div id="app">
    <h1>{{ message }}</h1>
    <!-- Lier une donnée à la vue -->
    <input v-model="message" />
    <!-- Liaison bidirectionnelle -->
</div>

<script>
    new Vue({
        el: "#app",
        data: {
            message: "Salut tout le monde!",
        },
    });
</script>

<script setup>
    import { ref } from "vue";

    const message = ref("Salut tout le monde!");
</script>
```

## **Directives de Vue.js**

Vue utilise des directives pour manipuler les éléments HTML. Voici quelques-unes des directives les plus courantes :

-   **v-bind** : Lier un attribut HTML à une donnée.
-   **v-model** : Liaison bidirectionnelle.
-   **v-if** : Rendre un élément conditionnellement.
-   **v-for** : Boucler sur un tableau ou un objet.

### **Exemple 1: v-bind**

```js
<div id="app">
  <img v-bind:src="imageSrc" alt="Vue logo" />
</div>

<script setup>
  import { ref } from "vue";

  const imageSrc = ref("https://vuejs.org/images/logo.png");
</script>

<script>
  new Vue({
    el: "#app",
    data: {
      imageSrc: "https://vuejs.org/images/logo.png",
    },
  });
</script>
```

#### **Exemple 2: v-if / v-for**

```html
<div id="app">
    <p v-if="isVisible">
        Ce texte est visible seulement si isVisible est vrai.
    </p>
    <ul>
        <li v-for="item in items">{{ item }}</li>
    </ul>
</div>

<script setup>
    import { ref } from "vue";

    const isVisible = ref(true);
    const items = ref(["Pomme", "Banane", "Cerise"]);
</script>
```

## **Méthodes et Événements**

Vue.js permet de définir des méthodes pour manipuler les données ou gérer les événements utilisateurs.

### **Exemple 1: Méthode simple**

```html
<div id="app">
    <button v-on:click="changeMessage">Cliquez-moi</button>
    <p>{{ message }}</p>
</div>

<script setup>
    import { ref } from "vue";

    const message = ref("Bonjour");

    function changeMessage() {
        message.value = "Message changé !";
    }
</script>
```

### **Exemple 2: Evénements**

-   **v-on:click** : Associe un événement au clic.
-   **v-on:mouseover** : Associe un événement au survol.

```html
<div id="app">
    <button v-on:mouseover="handleHover">Survolez-moi</button>
</div>

<script setup>
    function handleHover() {
        alert("Vous avez survolé le bouton!");
    }
</script>
```

---

## **Composants Vue.js**

Vue permet de diviser l'interface en composants réutilisables.

### **Exemple de Composant**

```html
<div id="app">
    <MyComponent />
</div>

<script setup>
    import { defineComponent } from "vue";

    const MyComponent = defineComponent({
        template: "<p>Je suis un composant Vue.js !</p>",
    });
</script>
```

Les composants peuvent également accepter des **props** pour recevoir des données externes.

### **Exercice**: Créez un composant `counter` qui affiche un bouton, et qui, lorsqu'on clique dessus, incrémente un compteur.

---

## **Vue Router**

Dans des applications plus complexes, vous pouvez utiliser **Vue Router** pour gérer la navigation entre différentes pages, et **Vuex** pour gérer l'état global de l'application.

-   **Vue Router** permet de configurer les routes dans une application.
-   **Vuex** est un gestionnaire d'état global pour partager les données entre les composants.

Exemple pour Vue Router :

```js
import Vue from "vue";
import Router from "vue-router";
import Home from "./components/Home.vue";
import About from "./components/About.vue";

Vue.use(Router);

export default new Router({
    routes: [
        { path: "/", component: Home },
        { path: "/about", component: About },
    ],
});
```

## **Création de Composants Parent et Enfant dans Vue.js**

Voici comment vous pouvez créer des composants parent et enfant dans Vue.js pour transmettre des données du parent à l'enfant :

### **Composant Enfant**

Ce composant recevra des données du composant parent via des props.

```html
<template>
    <div>
        <p>{{ message }}</p>
    </div>
</template>

<script setup>
    import { defineProps } from "vue";

    const props = defineProps({
        message: {
            type: String,
            required: true,
        },
    });
</script>
```

### **Composant Parent**

Ce composant enverra des données au composant enfant.

```html
<template>
    <div>
        <h1>Composant Parent</h1>
        <ChildComponent :message="parentMessage" />
    </div>
</template>

<script setup>
    import ChildComponent from "./ChildComponent.vue";
    import { ref } from "vue";

    const parentMessage = ref("Bonjour de Parent");
</script>
```

### **Explication**

-   **Composant Enfant (ChildComponent.vue)** :

    -   Utilise une prop nommée `message` pour recevoir des données du composant parent.
    -   La prop `message` est de type `String` et est requise.

-   **Composant Parent (ParentComponent.vue)** :
    -   Importe et utilise le composant enfant.
    -   Définit une donnée `parentMessage` dans son `data`.
    -   Passe la donnée `parentMessage` au composant enfant via la prop `message`.

### **Inclusion de Composants Globalement**

Pour inclure des composants globalement, vous pouvez les enregistrer dans votre fichier principal `main.js` ou `main.ts`.

#### **Exemple: Enregistrement Global d'un Bouton**

```js
import Vue from "vue";
import App from "./App.vue";
import MyButton from "./components/MyButton.vue";

Vue.component("MyButton", MyButton);

new Vue({
    render: (h) => h(App),
}).$mount("#app");
```

#### **Exemple: Utilisation de Routes**

Pour configurer les routes dans votre application, vous pouvez utiliser Vue Router. Voici comment inclure des routes globalement :

```js
import Vue from "vue";
import Router from "vue-router";
import Home from "./components/Home.vue";
import About from "./components/About.vue";

Vue.use(Router);

const router = new Router({
    routes: [
        { path: "/", component: Home },
        { path: "/about", component: About },
    ],
});

new Vue({
    router,
    render: (h) => h(App),
}).$mount("#app");
```
