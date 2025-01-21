### Cours d'initiation à Vue.js

Vue.js est un framework JavaScript progressif utilisé pour construire des interfaces utilisateur et des applications web à page unique (SPA). C’est un outil puissant mais simple à prendre en main. Ce cours va vous aider à apprendre Vue.js de manière pratique avec des exemples et des exercices.

---

### **Introduction à Vue.js**

Vue.js est basé sur une approche réactive et déclarative. Cela signifie que la vue (interface utilisateur) se met à jour automatiquement lorsque les données changent.

#### **Installation**

Avant de commencer, il faut installer Vue.js. Vous pouvez soit l'intégrer via un CDN dans un fichier HTML, soit utiliser une configuration avec Vue CLI pour des projets plus complexes.

##### Avec Vue CLI

1. Avec Node.js et NPM
2. Ouvrez le terminal et tapez:

```bash
npm install -g @vue/cli
vue create mon-projet
```

#### **Liaisons de données**

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

### **Directives de Vue.js**

Vue utilise des directives pour manipuler les éléments HTML. Voici quelques-unes des directives les plus courantes :

- **v-bind** : Lier un attribut HTML à une donnée.
- **v-model** : Liaison bidirectionnelle.
- **v-if** : Rendre un élément conditionnellement.
- **v-for** : Boucler sur un tableau ou un objet.

#### **Exemple 1: v-bind**

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
  <p v-if="isVisible">Ce texte est visible seulement si isVisible est vrai.</p>
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

### **Méthodes et Événements**

Vue.js permet de définir des méthodes pour manipuler les données ou gérer les événements utilisateurs.

#### **Exemple 1: Méthode simple**

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

#### **Exemple 2: Evénements**

- **v-on:click** : Associe un événement au clic.
- **v-on:mouseover** : Associe un événement au survol.

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

### **Composants Vue.js**

Vue permet de diviser l'interface en composants réutilisables.

#### **Exemple de Composant**

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

#### **Exercice**: Créez un composant `counter` qui affiche un bouton, et qui, lorsqu'on clique dessus, incrémente un compteur.

---

### **Vue Router et Vuex**

Dans des applications plus complexes, vous pouvez utiliser **Vue Router** pour gérer la navigation entre différentes pages, et **Vuex** pour gérer l'état global de l'application.

- **Vue Router** permet de configurer les routes dans une application.
- **Vuex** est un gestionnaire d'état global pour partager les données entre les composants.

Exemple pour Vue Router :

```javascript
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
