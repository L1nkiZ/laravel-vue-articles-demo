<template>
    <ModalGeneralComponent :title="' '" :closeModal="close_modal">
        <div class="flex-sm-nowrap" v-if="!loading">
            <div class="d-lg-flex justify-content-between">
                <div class="d-flex flex-column col-12 col-lg-6 m-2">
                    <img
                        class="img-contain h-75 rounded"
                        style="object-fit: contain"
                        alt="Image"
                        :src="
                            livre.image
                                ? livre.image
                                : base_url + 'assets/img/default_author.jpg'
                        "
                    />
                </div>
                <div class="col-12 col-lg-6 ms-6 mt-5 mt-lg-0">
                    <h1 class="text-gray-900 text-hover-primary fs-1 fw-bold">
                        {{ livre.titre }}
                    </h1>

                    <div class="d-flex flex-wrap col-8">
                        <small class="text-gray-400 mb-2 col-12 fs-6 align">
                            <i class="fas fa-book me-1 text-dark fs-5"></i>
                            Type de roman
                        </small>
                    </div>

                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-wrap col-8">
                            <div
                                class="border border-gray-300 border-dashed rounded min-w-125px py-4 px-4 mb-3"
                            >
                                <div class="fs-5 fw-bold">
                                    {{ convertDate(livre.created_at) }}
                                </div>
                                <div class="fw-semibold fs-6 text-gray-400">
                                    Livre crée
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr />

            <div class="card-body">
                <div class="col-12 pb-6">
                    <h1 class="fw-bold fs-2 text-gray-600 mb-7 text-center">
                        Synopsis
                    </h1>
                    <div
                        class="text-gray-700 fs-5 fw-semibold bg-light p-3 rounded"
                    >
                        {{
                            objectSize(livre.contenu) > 0
                                ? livre.contenu
                                : "Aucun synopsis renseigné"
                        }}
                    </div>
                </div>
            </div>
        </div>
    </ModalGeneralComponent>
</template>

<script setup>
import { ref, inject, onMounted } from "vue";
import ModalGeneralComponent from "@/Components/ModalGeneralComponent.vue";

/*
 * Variables, Props & Emits
 */
const props = defineProps(["livre_id"]);
const emit = defineEmits(["closeModal"]);

const base_url = inject("base_url");
const convertDate = inject("convertDate");
const objectSize = inject("objectSize");

const close_modal = ref(false);
const loading = ref(true);

const livre = ref({});

/*
 * Fonctions
 */
const closeModal = () => {
    close_modal.value = true;
};

const getData = () => {
    axios
        .get(base_url + "api/livres/" + props.livre_id)
        .then((response) => response.data)
        .then((data) => {
            livre.value = data.livre;
        })
        .catch((error) => {
            console.log(error);
        })
        .finally(() => {
            loading.value = false;
        });
};

onMounted(() => {
    getData();
});
</script>
