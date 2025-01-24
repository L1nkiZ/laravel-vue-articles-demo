<template>
    <loader_card_overlay :loading="loading">
        <AuteurFormulaire
            :auteur="auteur"
            :loading="loading"
            v-on:updateOrCreate="create"
        >
        </AuteurFormulaire>
    </loader_card_overlay>
</template>

<script setup>
import AuteurFormulaire from "@/pages/auteurs/auteurFormulaire.vue";
import { ref, inject } from "vue";
import { useRouter } from "vue-router";

/*
 * Props & Emits & Variable
 */
const base_url = inject("base_url");
const showSuccessErrors = inject("showSuccessErrors");
const parseErrorMessage = inject("parseErrorMessage");

const router = useRouter();

const loading = ref(false);

const auteur = ref({
    nom: null,
    image: null,
});

/*
 * Fonctions
 */
const create = (auteur) => {
    loading.value = true;
    axios
        .post(base_url + "auteurs", auteur)
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
</script>
