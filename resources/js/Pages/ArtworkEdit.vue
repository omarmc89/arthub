<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import EditPhotoForm from './Artworks/EditPhotoForm.vue';
import EditPaintingForm from './Artworks/EditPaintingForm.vue';

defineProps({
  artwork: Object,
})

</script>

<template>
  <AppLayout title="Edit Artwork">
    <section v-if="artwork.photo">
      <EditPhotoForm 
      :initialValues="{title: artwork.title, description: artwork.description, image_url: artwork.image_url, style: artwork.photo.style}"
      :submitUrl = "`/photos/${artwork.photo.id}`"/>
    </section>
    <section v-if="artwork.painting">
      <EditPaintingForm :initialValues="{title: artwork.title, description: artwork.description, image_url: artwork.image_url, style: artwork.painting.style,
      width: artwork.painting.width, height: artwork.painting.height}"
      :submitUrl="`/paintings/${artwork.painting.id}`"
      />
    </section>
  </AppLayout>
</template>