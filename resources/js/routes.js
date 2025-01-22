import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        name: "home",
        component: () => import("@/components/HomeComponent.vue"),
    },
    {
        path: "/auteurs",
        name: "auteurs.index",
        component: () => import("@/pages/auteurs/AuteursIndex.vue"),
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
