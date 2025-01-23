<template>
    <div class="text-center pt-5">
        <h1>Bienvenue sur votre test Vue.js😎👍</h1>
        <h1>{{ count }}</h1>
        <button type="button" class="btn btn-success" @click="increment">
            Incrémentation de 1
        </button>
    </div>
</template>

<script setup>
import { ref } from "vue";

const count = ref(0);

function increment() {
    count.value += 1;
}
</script>
