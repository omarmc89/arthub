<script setup>

import { defineProps } from 'vue';

defineProps({
    users: Object,
});

</script>

<template>
    <div>
        <h1>Admin Users View</h1>
    </div>
    <section :users="users">

        <div v-for="user in users" :key="user.id">
            <p>{{ user.name }}</p>
        </div>

    </section>

</template>