<script setup>
import testComponent from "@/components/testComponent.vue";
import { ref, inject } from "vue";
const base_url = inject("base_url");
</script>

<template>
    <div>
        <testComponent />
    </div>
</template>

<style></style>
