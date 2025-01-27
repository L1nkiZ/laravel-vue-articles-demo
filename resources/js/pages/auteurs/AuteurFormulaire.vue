<template>
    <div class="col-12">
        <div class="card-flush h-lg-100">
            <div class="card-header pt-7">
                <div class="card-title">
                    <h2>
                        <i class="fas fa-plus fs-4 align-items-center"></i>
                        {{ $route.meta.title }}
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
                                    <span class="required"
                                        >Nom de l'auteur
                                    </span>
                                </label>

                                <input
                                    type="text"
                                    class="form-control form-control-solid"
                                    :ref="refs['nom']"
                                    v-model="auteur.nom"
                                />
                            </div>
                        </div>
                        <div class="col">
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">
                                        Image de l'auteur(lien image google)
                                    </span>
                                </label>

                                <input
                                    type="text"
                                    class="form-control form-control-solid"
                                    :ref="refs['nom']"
                                    v-model="auteur.image"
                                />
                            </div>
                        </div>
                    </div>
                    <submit-form-button
                        :url_retour="'/auteurs'"
                        :submit_form="loading ? 'on' : 'off'"
                    ></submit-form-button>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, inject } from "vue";

/*
 * Props & Emit & variables
 */
const props = defineProps(["auteur", "loading"]);
const emit = defineEmits(["updateOrCreate"]);

const checkChampsObligatoire = inject("checkChampsObligatoire");
const showSuccessErrors = inject("showSuccessErrors");

const auteur = ref(props.auteur);
const refs = {
    nom: ref(null),
};

/*
 * Fonctions
 */
const updateOrCreate = () => {
    let champs_obligatoires = ["nom"];
    let rename_errors_columns = {};

    let errors = checkChampsObligatoire(
        auteur,
        champs_obligatoires,
        refs,
        rename_errors_columns
    );

    if (errors.length > 0) {
        return showSuccessErrors(errors, "error");
    }
    return emit("updateOrCreate", auteur.value);
};
</script>
