import "./bootstrap";
import { createApp } from "vue";
import App from "./App.vue";
import router from "./routes.js";
import configureHelpers from "./helpers.js";

const app = createApp(App);

configureHelpers(app);

app.use(router);
app.mount("#app");
