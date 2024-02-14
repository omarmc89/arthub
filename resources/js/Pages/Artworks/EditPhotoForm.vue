<script setup>
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { ref } from 'vue';
import ModalComponent from '@/Components/DialogModal.vue';

const props = defineProps({
  initialValues: {
    type: Object,
    default: null
  },
  submitUrl: {
    type: String,
    default: '/photos'
  }
})


const editPhotoForm = useForm({
  title: props.initialValues && props.initialValues.title ? props.initialValues.title : '',
  description: props.initialValues && props.initialValues.description ? props.initialValues.description : '',
  image_url: props.initialValues && props.initialValues.image_url ? props.initialValues.image_url : '',
  style: props.initialValues && props.initialValues.style ? props.initialValues.style :''
});

const showModal = ref(false);

const submit = () => {
  editPhotoForm.put(props.submitUrl, {
    preserveScroll: true,
    onSuccess: () => {
      showModal.value = true;
      photoForm.reset();
    }
  })
}

const handleModalClose = () => {
  showModal.value = false;
};
</script>

<!-- FORMULARIO PARA ARTISTS-->
<template>
<h1 class="text-2xl text-center font-semibold text-gray-900">Update photo</h1>
  <form @submit.prevent="submit">
    <div>
      <InputLabel for="title" value="Title" />
      <TextInput
          id="title"
          v-model="editPhotoForm.title"
          type="text"
          class="mt-1 block w-full"
          required
          autofocus
          autocomplete="title"
      />
      <InputError class="mt-2" :message="editPhotoForm.errors.title" />
    </div>

    <div class="mt-4">
      <InputLabel for="description" value="Description" />
      <TextInput
          id="description"
          v-model="editPhotoForm.description"
          type="text"
          class="mt-1 block w-full"
          required
          autofocus
          autocomplete="description"
      />
      <InputError class="mt-2" :message="editPhotoForm.errors.description" />
    </div>

    <div class="mt-4">
      <InputLabel for="image_url" value="Url image" />
      <TextInput
          id="image_url"
          v-model="editPhotoForm.image_url"
          type="text"
          class="mt-1 block w-full"
          required
          autocomplete="username"
      />
      <InputError class="mt-2" :message="editPhotoForm.errors.image_url" />
    </div>

    <div class="mt-4">
      <InputLabel for="style" value="Style" />
      <TextInput
          id="style"
          v-model="editPhotoForm.style"
          type="text"
          class="mt-1 block w-full"
          required
          autocomplete="new-style"
      />
      <InputError class="mt-2" :message="editPhotoForm.errors.style" />
    </div>
    <div class="flex items-center justify-end mt-4">
      <PrimaryButton v-if="editPhotoForm.processing" :class="{ 'opacity-25': editPhotoForm.processing }" :disabled="editPhotoForm.processing">
          Uploading...
      </PrimaryButton>
      <PrimaryButton v-else>
          Update Photo
      </PrimaryButton>
    </div>
  </form>

  <ModalComponent :show="showModal" @close="handleModalClose">
    <template #title>
      Success 👍
    </template>
    <template #content>
      Your photo has been updated successfully!
    </template>
    <template #footer>
      <PrimaryButton @click="handleModalClose">Close</PrimaryButton>
    </template>
  </ModalComponent>
  
</template>