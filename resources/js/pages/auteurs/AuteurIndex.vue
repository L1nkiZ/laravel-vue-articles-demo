<template>
    <loader_card_overlay :loading="loading">
        <div class="mb-5 mb-xl-8">
            <div
                class="card-header border-0 pt-5 d-flex justify-content-between align-items-center"
            >
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">Auteurs</span>
                </h3>
                <div class="d-flex align-items-center">
                    <router-link
                        to="/auteurs/create"
                        class="btn btn-sm btn-dark"
                        title="Ajouter un auteur"
                    >
                        <i class="fa-solid fa-plus"></i>
                        Ajouter un auteur
                    </router-link>
                </div>
            </div>

            <div class="card-body py-3">
                <div class="table-responsive">
                    <table
                        class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
                        :display="!loading"
                    >
                        <thead>
                            <tr class="fw-bold text-muted">
                                <th class="min-w-50px">Nom</th>
                                <th class="min-w-100px text-end">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <template v-if="auteurs.length > 0">
                                <tr v-for="auteur in auteurs">
                                    <td>
                                        {{ auteur.nom }}
                                        <!-- <router-link
                                        :to="
                                            '/categories_competences/edit/' +
                                            auteur.id
                                        "
                                        class="text-dark fw-bold text-hover-primary d-block fs-6"
                                        >{{
                                            categorie_competence.nom
                                        }}</router-link
                                    > -->
                                    </td>
                                    <!-- <td>
                                    <div
                                        class="d-flex justify-content-end flex-shrink-0"
                                    >
                                        <router-link
                                            :to="
                                                '/categories_competences/edit/' +
                                                categorie_competence.id
                                            "
                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
                                        >
                                            <span class="svg-icon svg-icon-3">
                                                <i
                                                    class="fa-solid fa-pencil"
                                                ></i>
                                            </span>
                                        </router-link>
                                        <delete-parametre-data
                                            :id="categorie_competence.id"
                                            :url="'categories_competences'"
                                            :confirmTextHeader="'Supprimer une catégorie de compétence'"
                                            :confirmTextBody="'Voulez-vous vraiment supprimer cette catégorie ?'"
                                            v-on:deleteData="filter"
                                        >
                                        </delete-parametre-data>
                                    </div>
                                </td> -->
                                </tr>
                            </template>
                            <template v-else>
                                <tr>
                                    <td colspan="2" class="text-center">
                                        Aucun auteur trouvé
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </loader_card_overlay>
</template>

<script setup>
import { onMounted, ref, inject } from "vue";

/*
 * Variables
 */
const base_url = inject("base_url");

let loading = ref(true);
const auteurs = ref([]);

/*
 * Fonctions
 */
const filter = () => {
    loading.value = true;

    axios
        .get("api/auteurs")
        .then((response) => response.data)
        .then((data) => {
            auteurs.value = data.auteurs;
        })
        .catch((error) => {
            console.log(error);
        })
        .finally(() => {
            loading.value = false;
        });
};

/*
 * Mounted
 */
onMounted(() => {
    filter();
});
</script>
