<script setup>
import testComponent from "@/components/testComponent.vue";
import { ref } from "vue";
const test = ref("@/components/testComponent.vue");
</script>

<template>
    <div>
        Salut
        {{ test }}
        <testComponent />
    </div>
</template>

<style></style>
