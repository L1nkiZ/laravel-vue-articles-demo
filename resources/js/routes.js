import { createRouter, createWebHistory } from "vue-router";
import HomeComponent from "./components/HomeComponent.vue";

const routes = [
    {
        path: "/",
        name: "home",
        component: HomeComponent,
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
