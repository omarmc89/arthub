<script setup>
import { router } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue';
import ArtworkCard from '@/Pages/ArtworkCard.vue';
import { ref } from 'vue'; // Importa la función 'ref' de Vue
import debounce from 'lodash.debounce'; // Importa la función 'debounce' de Lodash

  const term = ref(''); // Crea una referencia reactiva para 'term'

  // Define la propiedad 'courses' como una propiedad recibida de la instancia padre
  const props = defineProps({
    artworks: Object
  });

  const search = debounce( () => {
    // Realiza la lógica de búsqueda o lo que necesites hacer aquí
    // Ejemplo: reemplazar la ruta usando Vue Router
    router.get('/mainPage', { term: term.value }, { preserveState: true })
    // Nota: Esto asume que estás usando Vue Router, ajusta según tu configuración
  }, 200);
</script>

<template>

<AppLayout title="Main Page">
  <section class="flex flex-row w-9/12 items-center justify-center pt-5">
    <label for="search">Search</label>
    <input type="text" id="search" v-model="term" @keyup="search" placeholder="Search by ARTIST, TITLE OR DESCRIPTION" class="mr-3 ml-3 w-full rounded-xl" />
  </section>
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