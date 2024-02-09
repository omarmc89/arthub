<script setup>
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import ModalComponent from '@/Components/DialogModal.vue';

const paintingForm = useForm({
  title:'',
  description:'',
  image_url:'',
  style:'',
  width:'',
  height:'',
})

const showModal = ref(false);

const submit = () => {
  paintingForm.post('/paintings', {
    preserveScroll: true,
    onSuccess: () => {
      showModal.value = true;
      paintingForm.reset();
    }
  })
}

const handleModalClose = () => {
  showModal.value = false;
};

console.log(showModal.value)

</script>

<!-- FORMULARIO PARA PAINTINGS-->
<template>
  <h1 class="text-2xl text-center font-semibold text-gray-900">Create a new painting</h1>
  <form @submit.prevent="submit">
    <div>
      <InputLabel for="title" value="Title" />
      <TextInput
          id="title"
          v-model="paintingForm.title"
          type="text"
          class="mt-1 block w-full"
          required
          autofocus
          autocomplete="title"
      />
      <InputError class="mt-2" :message="paintingForm.errors.title" />
    </div>

    <div class="mt-4">
      <InputLabel for="description" value="Description" />
      <TextInput
          id="description"
          v-model="paintingForm.description"
          type="text"
          class="mt-1 block w-full"
          required
          autofocus
          autocomplete="description"
      />
      <InputError class="mt-2" :message="paintingForm.errors.description" />
    </div>

    <div class="mt-4">
      <InputLabel for="image_url" value="Url Image" />
      <TextInput
          id="image_url"
          v-model="paintingForm.image_url"
          type="text"
          class="mt-1 block w-full"
          required
          autocomplete="username"
      />
      <InputError class="mt-2" :message="paintingForm.errors.image_url" />
    </div>

    <div class="mt-4">
      <InputLabel for="style" value="Style" />
      <TextInput
          id="style"
          v-model="paintingForm.style"
          type="text"
          class="mt-1 block w-full"
          required
          autocomplete="new-style"
      />
      <InputError class="mt-2" :message="paintingForm.errors.style" />
    </div>
    <div class="mt-4">
      <InputLabel for="width" value="Width" />
      <TextInput
          id="width"
          v-model="paintingForm.width"
          type="number"
          class="mt-1 block w-full"
          required
          autofocus
          autocomplete="width"
      />
      <InputError class="mt-2" :message="paintingForm.errors.width" />
    </div>
    <div class="mt-4">
      <InputLabel for="height" value="Height" />
      <TextInput
          id="height"
          v-model="paintingForm.height"
          type="number"
          class="mt-1 block w-full"
          required
          autofocus
          autocomplete="height"
      />
      <InputError class="mt-2" :message="paintingForm.errors.height" />
    </div>

    <div class="flex items-center justify-end mt-4">
      <PrimaryButton v-if="paintingForm.processing" :class="{ 'opacity-25': paintingForm.processing }" :disabled="paintingForm.processing">
          Uploading...
      </PrimaryButton>
      <PrimaryButton v-else>
          Create Painting
      </PrimaryButton>
    </div>
  </form>

  <ModalComponent :show="showModal" @close="handleModalClose">
    <template #title>
      Success 👍
    </template>
    <template #content>
      Your painting has been uploaded successfully!
    </template>
    <template #footer>
      <PrimaryButton @click="handleModalClose">Close</PrimaryButton>
    </template>
  </ModalComponent>

</template>