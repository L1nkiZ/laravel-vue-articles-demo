import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        name: "home",
        component: () => import("@/pages/accueil/Accueil.vue"),
    },
    {
        path: "/auteurs",
        name: "auteurs.index",
        component: () => import("@/pages/auteurs/AuteursIndex.vue"),
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
