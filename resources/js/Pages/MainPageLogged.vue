<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import ArtworkCard from '@/Pages/ArtworkCard.vue';

defineProps({
    artworks: Object,
});

</script>

<template>

<AppLayout title="Main Page">
<section class="artworks">

  <ArtworkCard :artworks="artworks" />

</section>

</AppLayout>

</template>

<style>

.artworks {
  display: flex;
  justify-content: center;
  align-items: center;
}

</style>