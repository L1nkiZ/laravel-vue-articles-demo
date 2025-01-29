import { createRouter, createWebHistory } from "vue-router";

const router = createRouter({
    history: createWebHistory("/laravel-vue-articles-demo/public/"),
    routes: [
        {
            path: "/",
            name: "home",
            component: () => import("@/pages/accueil/Accueil.vue"),
        },

        // Routes pour la consultation, création et modification des auteurs
        {
            path: "/auteurs",
            name: "auteurs.index",
            component: () => import("@/pages/auteurs/AuteurIndex.vue"),
        },
        {
            path: "/auteurs/create",
            name: "auteurs.create",
            component: () => import("@/pages/auteurs/AuteurCreate.vue"),
            meta: { title: "Création d'un auteur" },
        },
        {
            path: "/auteurs/edit/:id",
            name: "auteurs.edit",
            component: () => import("@/pages/auteurs/AuteurEdit.vue"),
            meta: { title: "Modification d'un auteur" },
        },

        // Routes pour la consultation, création et modification des livres
        {
            path: "/livres",
            name: "livres.index",
            component: () => import("@/pages/livres/LivreIndex.vue"),
        },
        {
            path: "/livres/create",
            name: "livres.create",
            component: () => import("@/pages/livres/LivreCreate.vue"),
            meta: { title: "Création d'un livre" },
        },
        {
            path: "/livres/edit/:id",
            name: "livres.edit",
            component: () => import("@/pages/livres/LivreEdit.vue"),
            meta: { title: "Modification d'un livre" },
        },
    ],
});

export default router;

// {
//     path: "/:catchAll(.*)",
//     name: "404",
//     component: () => import("@/pages/errors/error404Component.vue"),
// },

//history: createWebHistory(window.location.pathname),
