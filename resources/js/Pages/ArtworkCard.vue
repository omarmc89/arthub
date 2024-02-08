<script setup>

defineProps({
    artworks: Object,
    user: Object,
});

</script>

<template>

  <section class="container">
    <article v-for="artwork in artworks" :key="artwork.id" class="card">
      <div class="image-container">
        <img :src="artwork.image_url" :alt="artwork.title" />
      </div>
      <div class="p-5 text-center">
          <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{ artwork.title }}</h5>
          <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ artwork.description }}</p>
      </div>
    </article>
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
  border-radius: 10px;
}

.image-container img {
  width: 100%;
  height: auto;
  object-fit: fill;
  object-position: center;
  border-radius: 10px;
}
</style>