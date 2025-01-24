import "./bootstrap";
import { createApp } from "vue";
import App from "./App.vue";
import router from "./routes.js";

import configureHelpers from "./helpers.js";
import Loader from "@/components/loader.vue";
import SubmitFormButton from "@/components/button/SubmitFormButton.vue";

const app = createApp(App);
app.use(router);
component("loader", Loader)
    .component("submit-form-button", SubmitFormButton)
    .mount("#app");

configureHelpers(app);
