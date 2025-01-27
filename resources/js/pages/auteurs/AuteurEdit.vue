<template>
    <loader_card_overlay :loading="loading">
        <AuteurFormulaire
            v-if="!first_loading"
            :auteur="auteur"
            :loading="loading"
            v-on:updateOrCreate="update"
        >
        </AuteurFormulaire>
    </loader_card_overlay>
</template>

<script setup>
import { ref, inject, onMounted } from "vue";
import { useRoute, useRouter } from "vue-router";
import AuteurFormulaire from "@/pages/auteurs/auteurFormulaire.vue";

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

const auteur = ref({
    nom: null,
    nom_interne: null,
    image: null,
});

/*
 * Fonctions
 */
const getData = () => {
    // récupération des données auteurs avant la modification
    axios
        .get(base_url + "api/auteurs/" + route.params.id + "/edit")
        .then((response) => response.data)
        .then((data) => {
            auteur.value = data.auteur;
        })
        .catch((error) => {
            console.log(error);
        })
        .finally(() => {
            loading.value = false;
            first_loading.value = false;
        });
};

const update = (auteurData) => {
    loading.value = true;

    // Mise à jour de l'auteur
    axios
        .put(base_url + "api/auteurs/" + auteurData.id, auteurData)
        .then((response) => response.data)
        .then((data) => {
            if (data.error == true) {
                showSuccessErrors(parseErrorMessage(data.message), "error");
            } else {
                showSuccessErrors(data.message);
                return router.push({ name: "auteurs.index" });
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
