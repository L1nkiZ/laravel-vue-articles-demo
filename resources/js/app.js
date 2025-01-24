import "./bootstrap";
import { createApp } from "vue";
import App from "./App.vue";
import router from "./routes.js";

import configureHelpers from "./helpers.js";
import LoaderCardOverlay from "@/components/loaderCardOverlay.vue";
import SubmitFormButton from "@/components/button/SubmitFormButton.vue";

const app = createApp(App);
app.use(router)
    .component("loader_card_overlay", LoaderCardOverlay)
    .component("submit-form-button", SubmitFormButton)
    .mount("#app");

configureHelpers(app);
