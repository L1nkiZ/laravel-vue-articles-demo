const base_url = document.querySelector("#app").dataset.url;

const showSuccessErrors = (message, type = "success") => {
    let string = "<ul>";
    if (Array.isArray(message)) {
        message.forEach(function (item) {
            string += "<li>" + item + "</li>";
        });
    } else {
        string += "<li>" + message + "</li>";
    }
    string += "</ul>";

    return notify({
        group: "success_error",
        title: "Succès",
        type: type,
        duration: 5000,
        text: string,
    });
};

const checkChampsObligatoire = (
    model,
    champs_obligatoires,
    refs,
    rename_errors_columns = false
) => {
    let errors = [];
    // Supprime la class is-invalid
    Object.keys(refs).forEach(function (ref) {
        if (refs[ref] && refs[ref].value && refs[ref].value.classList) {
            refs[ref].value.classList.remove("is-invalid");
        }
    });

    champs_obligatoires.forEach(function (champ) {
        if (model.value[champ] === null || model.value[champ] === "") {
            if (
                refs[champ] &&
                refs[champ].value &&
                refs[champ].value.classList
            ) {
                refs[champ].value.classList.add("is-invalid");
            }

            if (rename_errors_columns && rename_errors_columns[champ]) {
                errors.push(
                    "Le champ " +
                        rename_errors_columns[champ] +
                        " est obligatoire"
                );
            } else {
                errors.push("Le champ " + champ + " est obligatoire");
            }
        }
    });
    return errors;
};

export default function configureHelpers(app) {
    app.config.globalProperties.$base_url = base_url;
    app.provide("base_url", base_url);

    app.config.globalProperties.showSuccessErrors = showSuccessErrors;
    app.provide("showSuccessErrors", showSuccessErrors);

    app.provide("checkChampsObligatoire", checkChampsObligatoire);
}
