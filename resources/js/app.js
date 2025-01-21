import "./bootstrap";
import { createApp } from "vue";
import testComponent from "./components/testComponent.vue";

import "./helpers.js";

const app = createApp();
app.component("test-component", testComponent);
app.mount("#app");
