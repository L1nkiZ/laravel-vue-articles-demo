<template>
    <loader_card_overlay :loading="loading">
        <LivreFormulaire
            v-if="!first_loading"
            :livre="livre"
            :auteurs="auteurs"
            :loading="loading"
            v-on:updateOrCreate="update"
        >
        </LivreFormulaire>
    </loader_card_overlay>
</template>

<script setup>
import { ref, inject, onMounted } from "vue";
import { useRoute, useRouter } from "vue-router";
import LivreFormulaire from "@/pages/livres/LivreFormulaire.vue";

/*
 * Props & Emits & Variable
 */
const base_url = inject("base_url");
const showSuccessErrors = inject("showSuccessErrors");
const parseErrorMessage = inject("parseErrorMessage");

const router = useRouter();
const route = useRoute();

const loading = ref(false);
const first_loading = ref(true);

const livre = ref({
    titre: null,
    contenu: null,
    auteur_id: null,
    image: null,
});
const auteurs = ref([]);

/*
 * Fonctions
 */
const getData = () => {
    // récupération des données livres avant la modification
    axios
        .get(base_url + "api/livres/" + route.params.id + "/edit")
        .then((response) => response.data)
        .then((data) => {
            livre.value = data.livre;
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

const update = (livreData) => {
    loading.value = true;

    // Mise à jour du livre
    axios
        .put(base_url + "api/livres/" + livreData.id, livreData)
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
