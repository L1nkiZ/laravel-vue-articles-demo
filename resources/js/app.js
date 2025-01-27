import "./bootstrap";
import { createApp } from "vue";
import App from "./App.vue";
import router from "./routes.js";

import configureHelpers from "./helpers.js";
import LoaderCardOverlay from "@/components/loaderCardOverlay.vue";
import SubmitFormButton from "@/components/button/btnSubmitForm.vue";
import DeleteDataButton from "@/components/button/btnDeleteData.vue";
import Notifications from "@kyvg/vue3-notification";

const app = createApp(App);
app.use(router)
    .use(Notifications)
    .component("loader_card_overlay", LoaderCardOverlay)
    .component("submit_form_button", SubmitFormButton)
    .component("delete_data_button", DeleteDataButton)
    .mount("#app");

configureHelpers(app);
