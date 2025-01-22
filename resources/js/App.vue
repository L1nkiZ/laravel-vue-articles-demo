<script setup>
import { ref, inject } from "vue";

const base_url = inject("base_url");

import layout from "@/components/layout.vue";
</script>

<template>
    <div id="app">
        <layout />
    </div>
</template>
