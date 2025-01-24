import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        name: "home",
        component: () => import("@/pages/accueil/Accueil.vue"),
        meta: { title: "Accueil" },
    },
    {
        path: "/auteurs",
        name: "auteurs.index",
        component: () => import("@/pages/auteurs/AuteurIndex.vue"),
        meta: { title: "Auteur" },
    },
    {
        path: "/auteurs/create",
        name: "auteurs.create",
        component: () => import("@/pages/auteurs/AuteurCreate.vue"),
        meta: {
            title: "Crée un auteur",
        },
    },

    // {
    //     path: "/:catchAll(.*)",
    //     name: "404",
    //     component: () => import("@/pages/errors/error404Component.vue"),
    // },
];

const router = createRouter({
    history: createWebHistory(window.location.pathname),
    routes,
});

export default router;
