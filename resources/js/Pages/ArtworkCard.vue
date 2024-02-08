<script setup>


defineProps({
    artworks: Object,
});
</script>

<template>

<section class="container">
  <div v-for="artwork in artworks" :key="artwork.id" class="card">
    <img class="rounded-t-lg" :src="artwork.image_url" :alt="artwork.title" />
  </div>
      <!-- <div class="p-5">
          <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{artwork.title}}</h5>
          <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ artwork.description }}</p>
      </div>
    </div> -->
  </section>
</template>

<style>

.container {
  columns: 2;
  padding: 16px 32px;
  column-gap: 32px;
}

.container .card{
  width: 100%;
  height: auto;
  margin-bottom: 32px;
}


</style>