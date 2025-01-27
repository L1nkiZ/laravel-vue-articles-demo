<template>
    <loader_card_overlay :loading="loading">
        <div class="mb-5 mb-xl-8">
            <div
                class="card-header border-0 pt-5 d-flex justify-content-between align-items-center"
            >
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">Livres</span>
                </h3>
                <div class="d-flex align-items-center">
                    <!-- <router-link
                        to="/livres/create"
                        class="btn btn-sm btn-dark"
                        title="Ajouter un livre"
                    >
                        <i class="fa-solid fa-plus"></i>
                        Ajouter un livre
                    </router-link> -->
                </div>
            </div>

            <div class="card-body py-3">
                <div class="table-responsive"></div>
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
const livres = ref([]);

/*
 * Fonctions
 */
const getData = () => {
    loading.value = true;
    console.log(base_url + "api/livres");

    axios
        .get(base_url + "api/livres")
        .then((response) => response.data)
        .then((data) => {
            livres.value = data.livres;
            console.log(data);
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
    getData();
});
</script>
