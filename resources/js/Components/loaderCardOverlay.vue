<template>
    <div
        :class="
            props.loading
                ? 'card overlay overlay-block mt-4'
                : 'card ' + custom_class + ' mt-4'
        "
        :style="props.without_min_height != true ? 'min-height: 40vh;' : ''"
    >
        <slot></slot>

        <div
            class="overlay-layer card-rounded bg-opacity-5 d-flex justify-content-center align-items-center"
            v-if="loading"
            style="
                z-index: 999;
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: white; /* Ajout du fond blanc */
            "
        >
            <div class="spinner-border text-success" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
</template>

<script setup>
const props = defineProps(["loading", "without_min_height", "custom_class"]);
const custom_class = props.custom_class ? props.custom_class : "";
</script>
