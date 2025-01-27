<template>
    <div class="d-flex justify-content-end">
        <router-link :to="url_retour" class="btn btn-outline-dark me-3"
            >Retour</router-link
        >

        <button
            type="submit"
            class="btn btn-dark"
            :data-kt-indicator="submit_form"
        >
            <span class="indicator-label">Enregistrer</span>
        </button>
        <!--end::Button-->
    </div>
</template>

<script>
export default {
    props: ["url_retour", "submit_form"],
};
</script>
