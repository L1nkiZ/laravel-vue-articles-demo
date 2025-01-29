<template>
    <loader_card_overlay :loading="loading">
        <LivreFormulaire
            v-if="!first_loading"
            :livre="livre"
            :auteurs="auteurs"
            :loading="loading"
            v-on:updateOrCreate="create"
        >
        </LivreFormulaire>
    </loader_card_overlay>
</template>

<script setup>
import LivreFormulaire from "@/pages/livres/LivreFormulaire.vue";
import { ref, inject, onMounted } from "vue";
import { useRouter } from "vue-router";

/*
 * Props & Emits & Variable
 */
const base_url = inject("base_url");
const showSuccessErrors = inject("showSuccessErrors");
const parseErrorMessage = inject("parseErrorMessage");

const router = useRouter();

const loading = ref(false);
const first_loading = ref(true);

const auteurs = ref([]);
const livre = ref({
    titre: null,
    contenu: null,
    auteur_id: null,
    image: null,
});

/*
 * Fonctions
 */
const getData = () => {
    loading.value = true;

    axios
        .get(base_url + "api/livres/create")
        .then((response) => response.data)
        .then((data) => {
            auteurs.value = data.auteurs;
        })
        .catch((error) => {
            console.log(error);
        })
        .finally(() => {
            loading.value = false;
            first_loading.value = false;
        });
};

const create = (livreData) => {
    loading.value = true;

    axios
        .post(base_url + "api/livres", livreData)
        .then((response) => response.data)
        .then((data) => {
            if (data.error == true) {
                showSuccessErrors(parseErrorMessage(data.message), "error");
            } else {
                showSuccessErrors(data.message);
                return router.push({ name: "livres.index" });
            }
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
