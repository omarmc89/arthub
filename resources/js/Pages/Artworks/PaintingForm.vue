<script setup>
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import ModalComponent from '@/Components/DialogModal.vue';

const props = defineProps({
  initialValues: {
    type: Object,
    default: null
  },
  submitUrl: {
    type: String,
    default: '/paintings'
  }

})

const paintingForm = useForm({
  title:props.initialValues && props.initialValues.title ? props.initialValues.title : '',
  description:props.initialValues && props.initialValues.description ? props.initialValues.description : '',
  image_url:props.initialValues && props.initialValues.image_url ? props.initialValues.image_url : '',
  style:props.initialValues && props.initialValues.style ? props.initialValues.style :'',
  width:props.initialValues && props.initialValues.width ? props.initialValues.width :'',
  height:props.initialValues && props.initialValues.height ? props.initialValues.height :''
})

const showModal = ref(false);

const submit = () => {
  paintingForm.post(props.submitUrl, {
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

</script>

<!-- FORMULARIO PARA PAINTINGS-->
<template>
  <h1 class="text-2xl text-center font-semibold text-gray-900">Create a new painting</h1>
  <form @submit.prevent="submit">
    <div>
      <InputLabel for="paintingTitle" value="Title" />
      <TextInput
          id="paintingTitle"
          v-model="paintingForm.title"
          type="text"
          class="mt-1 block w-full"
          required
          autofocus
          autocomplete="paintingTitle"
      />
      <InputError class="mt-2" :message="paintingForm.errors.title" />
    </div>

    <div class="mt-4">
      <InputLabel for="paintingDescription" value="Description" />
      <TextInput
          id="paintingDescription"
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
      <InputLabel for="paintingImage_url" value="Url Image" />
      <TextInput
          id="paintingImage_url"
          v-model="paintingForm.image_url"
          type="text"
          class="mt-1 block w-full"
          required
          autocomplete="paintingTitle"
      />
      <InputError class="mt-2" :message="paintingForm.errors.image_url" />
    </div>

    <div class="mt-4">
      <InputLabel for="paintingStyle" value="Style" />
      <TextInput
          id="paintingStyle"
          v-model="paintingForm.style"
          type="text"
          class="mt-1 block w-full"
          required
          autocomplete="paintingtyle"
      />
      <InputError class="mt-2" :message="paintingForm.errors.style" />
    </div>
    <div class="mt-4">
      <InputLabel for="paintingWidth" value="Width" />
      <TextInput
          id="paintingWidth"
          v-model="paintingForm.width"
          type="number"
          class="mt-1 block w-full"
          required
          autofocus
          autocomplete="paintingWidth"
      />
      <InputError class="mt-2" :message="paintingForm.errors.width" />
    </div>
    <div class="mt-4">
      <InputLabel for="paintingHeight" value="Height" />
      <TextInput
          id="paintingHeight"
          v-model="paintingForm.height"
          type="number"
          class="mt-1 block w-full"
          required
          autofocus
          autocomplete="paintingHeight"
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