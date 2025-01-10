<template>
    <div id="app">
        <h1>Bienvenue sur votre test Vue.js😎👍</h1>
        <h1>{{ count }}</h1>
        <button @click="increment">Incrémentation de 1</button>
    </div>
</template>

<script setup>
import { ref } from "vue";

const count = ref(0);

function increment() {
    count.value += 1;
}
</script>

<style>
#app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    text-align: center;
    margin-top: 60px;
}
button {
    background-color: #42b983;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
}
button:hover {
    background-color: #369a7d;
}
</style>
