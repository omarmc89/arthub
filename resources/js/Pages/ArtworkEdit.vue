<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import EditPhotoForm from './Artworks/EditPhotoForm.vue';
import EditPaintingForm from './Artworks/EditPaintingForm.vue';
import { ref } from 'vue';

defineProps({
  artwork: Object,
})

const hover = ref(false);

</script>

<template>
  <AppLayout title="Edit Artwork">
    <section class="main-content" v-if="artwork.photo">
      <article class="form-container">
        <EditPhotoForm
        :initialValues="{title: artwork.title, description: artwork.description, image_url: artwork.image_url, style: artwork.photo.style}"
        :submitUrl = "`/photos/${artwork.photo.id}`"/>
      </article>
      <img class="image" :src="artwork.image_url" :alt="artwork.title" @mouseover="hover= true" @mouseleave="hover=false"/>
    </section>
    <section class="main-content" v-if="artwork.painting">
      <article class="form-container" :class="{ active: hover}">
        <EditPaintingForm
        :initialValues="{title: artwork.title, description: artwork.description, image_url: artwork.image_url, style: artwork.painting.style,
        width: artwork.painting.width, height: artwork.painting.height}"
        :submitUrl="`/paintings/${artwork.painting.id}`"
        />
      </article>
      <img class="image" :src="artwork.image_url" :alt="artwork.title" @mouseover="hover= true" @mouseleave="hover=false" />
    </section>
  </AppLayout>
</template>

<style>

  .active {
    filter: blur(3px);
    transition: filter 0.3s ease-in-out;
  }

  .main-content{
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    justify-content: space-around;
    align-items: center;
    gap:20px;
    padding: 0 30px;
    height: 80vh;
    width: 100%;
    background-image: url('../../../public/dot.svg');
    background-size: 1.5%;
    background-position: top;
    background-repeat: repeat;

    img{
      width: 30%;
      height: auto;
      object-fit: fill;
      object-position: center;
      border-radius: 10px;
      box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
      transition: all 0.5s ease-in-out;
    }

    img:hover {
      transform: scale(1.8) translateX(-50%);
      box-shadow: 5px 5px 15px 0 rgba(0,0,0,0.4);
    }
  }

  .form-container{
    width: 50%;
  }
</style>