<template>
    <button
        class="btn-danger btn btn-icon btn-bg-light btn-active-color-white btn-sm me-1"
        @click="deleteElement(id)"
    >
        <i class="fas fa-trash-alt"></i>
    </button>
</template>

<script setup>
import { inject } from "vue";

const props = defineProps(["id", "url"]);
const emit = defineEmits(["deleteData"]);

const base_url = inject("base_url");
const showSuccessErrors = inject("showSuccessErrors");
const parseErrorMessage = inject("parseErrorMessage");

const deleteElement = (data_id) => {
    if (confirm("Vous êtes sûr de vouloir supprimer cet élément ?")) {
        axios
            .delete(base_url + props.url + "/" + data_id)
            .then((response) => response.data)
            .then((data) => {
                if (data.error == true) {
                    showSuccessErrors(parseErrorMessage(data.message), "error");
                } else {
                    showSuccessErrors(data.message);
                    emit("deleteData");
                }
            })
            .catch((error) => {
                console.log(error);
            });
    }
};
</script>
