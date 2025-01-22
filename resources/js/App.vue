<template>
    <div id="app">
        <router-view> </router-view>
        <HomeComponent />
    </div>
</template>

<script setup>
import HomeComponent from "@/components/HomeComponent.vue";
import { inject } from "vue";
const name = "App";
</script>
