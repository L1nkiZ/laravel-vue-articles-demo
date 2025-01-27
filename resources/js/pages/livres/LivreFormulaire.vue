<template>
    <div class="col-12">
        <div class="card-flush h-lg-100">
            <div class="card-header pt-7">
                <div class="card-title">
                    <h2>
                        <i class="fas fa-plus fs-4 align-items-center"></i>
                        Crée un livre
                    </h2>
                </div>
            </div>

            <div class="card-body pt-5">
                <form
                    class="form mb-10"
                    @submit.prevent="updateOrCreate()"
                    v-if="!loading"
                >
                    <div
                        class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2 pb-5"
                    >
                        <div class="col">
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">
                                        Titre de l'oeuvre
                                    </span>
                                </label>

                                <input
                                    type="text"
                                    class="form-control form-control-solid"
                                    :ref="refs['titre']"
                                    v-model="livre.titre"
                                />
                            </div>
                        </div>
                        <div class="col">
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Synopsis</span>
                                </label>

                                <textarea
                                    class="form-control form-control-solid mb-3"
                                    rows="3"
                                    ref="livre.contenu"
                                    placeholder="Saisir le Synopsis"
                                    v-model="livre.contenu"
                                ></textarea>
                            </div>
                        </div>

                        <div class="col">
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Auteur</span>
                                </label>

                                <!-- <Multiselect
                                    v-model="livre.auteur_id"
                                    :options="auteurs"
                                    label="nom"
                                    placeholder="Sélection"
                                    selectLabel=""
                                    :searchable="true"
                                    :allow-empty="true"
                                    :multiple="false"
                                    valueProp="id"
                                    noOptionsText="-- La liste est vide --"
                                    noResultsText="-- Aucun résultat --"
                                /> -->
                            </div>
                        </div>
                    </div>
                    <submit_form_button
                        :url_retour="'/livres'"
                        :submit_form="loading ? 'on' : 'off'"
                    ></submit_form_button>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, inject } from "vue";
// import Multiselect from "@vueform/multiselect";

/*
 * Props & Emit & variables
 */
const props = defineProps(["livre", "auteurs", "loading"]);
const emit = defineEmits(["updateOrCreate"]);

const checkChampsObligatoire = inject("checkChampsObligatoire");
const showSuccessErrors = inject("showSuccessErrors");

const livre = ref(props.livre);
const refs = {
    titre: ref(null),
    contenu: ref(null),
    auteur_id: ref(null),
};

/*
 * Fonctions
 */
const updateOrCreate = () => {
    let champs_obligatoires = ["titre"];
    let rename_errors_columns = {};

    let errors = checkChampsObligatoire(
        livre,
        champs_obligatoires,
        refs,
        rename_errors_columns
    );

    if (errors.length > 0) {
        return showSuccessErrors(errors, "error");
    }
    return emit("updateOrCreate", livre.value);
};
</script>
