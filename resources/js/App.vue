<script setup>
import layout from "@/components/layout.vue";
</script>

<template>
    <div>
        <layout />
        <notifications
            group="success_error"
            position="bottom left"
            width="500"
        />
        <notifications
            group="notifications"
            position="bottom right"
            width="500"
        />
    </div>
</template>
