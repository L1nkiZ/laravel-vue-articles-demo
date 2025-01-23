<script setup>
import { ref, inject } from "vue";

const base_url = inject("base_url");
console.log(base_url);

import layout from "@/components/layout.vue";
</script>

<template>
    <div>
        <layout />
    </div>
</template>
