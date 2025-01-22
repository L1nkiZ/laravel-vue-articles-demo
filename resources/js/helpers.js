const base_url = document.querySelector("#app").dataset.url;

export default function configureHelpers(app) {
    app.config.globalProperties.$base_url = base_url;
    app.provide("base_url", base_url);
}
