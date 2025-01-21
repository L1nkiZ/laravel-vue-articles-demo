import "./bootstrap";
import { createApp } from "vue";
import HomeComponent from "@/components/HomeComponent.vue";

import "./helpers.js";

const app = createApp();
app.component("home-component", HomeComponent);
app.mount("#app");
