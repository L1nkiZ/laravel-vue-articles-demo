<script setup>
import { ref, inject } from "vue";

const base_url = inject("base_url");

import testComponent from "@/components/testComponent.vue";
import layout from "@/components/layout.vue";

const name = "App";
</script>

<template>
    <div id="app">
        <router-view> </router-view>
        <layout />
        <testComponent />
    </div>
</template>
