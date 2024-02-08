<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import PaintingForm from '@/Pages/Artworks/PaintingForm.vue'
import PhotoForm from '@/Pages/Artworks/PhotoForm.vue'


</script>

<template>
    <AppLayout title="Dashboard">
      <h1 class="text-4xl font-bold text-center p-8">Upload your artworks!</h1>
        <div class="py4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg grid grid-cols-2">
                    <div class="max-w-xl py-5 px-5 m-auto w-full mt-10">
                        <PaintingForm />
                    </div>
                    <div class="max-w-xl py-5 px-5 m-auto w-full mt-10">
                        <PhotoForm class="" />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
