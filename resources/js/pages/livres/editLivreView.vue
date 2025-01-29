<template>
    <div class="card-body py-3">
        <div class="table-responsive">
            <table
                class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
                :display="!loading"
            >
                <thead>
                    <tr class="fw-bold text-muted">
                        <th class="min-w-50px text-start">Titre</th>
                        <th class="min-w-100px text-center">
                            Photo de l'ouvrage
                        </th>
                        <th class="min-w-100px text-center">Auteur</th>
                        <th class="min-w-100px text-end">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <template v-if="objectSize(livres) > 0">
                        <tr v-for="livre in livres">
                            <td class="col-2">
                                <router-link
                                    :to="'livres/edit/' + livre.id"
                                    class="text-dark text-hover-primary text-decoration-none text-uppercase fs-6"
                                    >{{ livre.titre }}
                                </router-link>
                            </td>
                            <td class="col-6 text-center">
                                <img
                                    :src="
                                        livre.image
                                            ? livre.image
                                            : base_url +
                                              'assets/img/default_author.jpg'
                                    "
                                    class="rounded-pill"
                                    style="
                                        width: 100px;
                                        height: 100px;
                                        object-fit: cover;
                                    "
                                    :alt="
                                        livre.image
                                            ? 'image de l\'ouvrage'
                                            : 'image de l\'ouvrage par défaut'
                                    "
                                />
                            </td>
                            <td class="col-2 text-center">
                                {{
                                    objectSize(livre.auteur) > 0
                                        ? livre.auteur.nom
                                        : "Aucun auteur renseigné"
                                }}
                            </td>
                            <td class="col-2">
                                <div
                                    class="d-flex justify-content-end flex-shrink-0"
                                >
                                    <router-link
                                        :to="'/livres/edit/' + livre.id"
                                        class="btn btn-icon btn-primary btn-active-color-info btn-sm me-1"
                                    >
                                        <span class="svg-icon svg-icon-3">
                                            <i class="fa-solid fa-pencil"></i>
                                        </span>
                                    </router-link>
                                    <delete_data_button
                                        :id="livre.id"
                                        :url="'api/livres'"
                                        v-on:deleteData="refreshData(livre.id)"
                                    >
                                    </delete_data_button>
                                </div>
                            </td>
                        </tr>
                    </template>
                    <template v-else>
                        <tr>
                            <td colspan="4" class="text-center">
                                Aucun livre trouvé
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>
import { ref, defineProps, inject } from "vue";
const props = defineProps(["livres", "loading"]);
const base_url = inject("base_url");
const objectSize = inject("objectSize");
const emit = defineEmits(["refreshData"]);

const refreshData = (deletedId) => {
    livres.value = livres.value.filter((livre) => livre.id !== deletedId);
    emit("refreshData");
};

const livres = ref(props.livres);
</script>
