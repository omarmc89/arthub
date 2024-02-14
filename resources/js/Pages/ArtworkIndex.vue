<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import ArtworkShow from '@/Pages/Artworks/ArtworkShow.vue';
import { defineProps, ref } from 'vue';

defineProps({
  artwork: Object,
});

</script>

<template>
  <AppLayout title="Artwork">
    <ArtworkShow :artwork="artwork" />
  </AppLayout>
</template>