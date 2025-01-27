import { createRouter, createWebHistory } from "vue-router";

const router = createRouter({
    history: createWebHistory("/laravel-vue-articles-demo/public/"),
    routes: [
        {
            path: "/",
            name: "home",
            component: () => import("@/pages/accueil/Accueil.vue"),
        },
        {
            path: "/auteurs",
            name: "auteurs.index",
            component: () => import("@/pages/auteurs/AuteurIndex.vue"),
        },
        {
            path: "/auteurs/create",
            name: "auteurs.create",
            component: () => import("@/pages/auteurs/AuteurCreate.vue"),
        },
        {
            path: "/auteurs/edit/:id",
            name: "auteurs.edit",
            component: () => import("@/pages/auteurs/AuteurEdit.vue"),
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
