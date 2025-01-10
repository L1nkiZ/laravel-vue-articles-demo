import "./bootstrap";
import { createApp } from "vue";
import testComponent from "./components/testComponent.vue";

const app = createApp();
app.component("test-component", testComponent);
app.mount("#app");
