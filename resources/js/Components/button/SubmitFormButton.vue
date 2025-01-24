<template>
    <div class="d-flex justify-content-end">
        <router-link :to="url_retour" class="btn btn-light me-3"
            >Retour</router-link
        >

        <button
            type="submit"
            class="btn btn-primary"
            :data-kt-indicator="submit_form"
        >
            <span class="indicator-label">Enregistrer</span>
            <span class="indicator-progress"
                >Merci de patienter
                <span
                    class="spinner-border spinner-border-sm align-middle ms-2"
                ></span
            ></span>
        </button>
        <!--end::Button-->
    </div>
</template>

<script>
export default {
    props: ["url_retour", "submit_form"],
};
</script>
