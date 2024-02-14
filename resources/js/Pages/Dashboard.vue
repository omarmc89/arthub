<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import PaintingForm from '@/Pages/Artworks/PaintingForm.vue'
import PhotoForm from '@/Pages/Artworks/PhotoForm.vue'


</script>

<template>
    <AppLayout class="main" title="Dashboard">
      <section class="forms-container">
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
      </section>
    </AppLayout>
</template>


<style>

.forms-container{
  padding-bottom:30px;
  box-shadow: 0 0 10px 0 rgba(162, 161, 161, 0.2);
  background-image: url('../../../public/dot.svg');
  background-size: 1.5%;
  background-position: start;
  background-repeat: repeat;
  box-shadow: 0 0 10px 0 rgba(162, 161, 161, 0.2);
}
</style>