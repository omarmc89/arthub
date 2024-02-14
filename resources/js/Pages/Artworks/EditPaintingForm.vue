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

const editPaintingForm = useForm({
  title:props.initialValues && props.initialValues.title ? props.initialValues.title : '',
  description:props.initialValues && props.initialValues.description ? props.initialValues.description : '',
  image_url:props.initialValues && props.initialValues.image_url ? props.initialValues.image_url : '',
  style:props.initialValues && props.initialValues.style ? props.initialValues.style :'',
  width:props.initialValues && props.initialValues.width ? props.initialValues.width :'',
  height:props.initialValues && props.initialValues.height ? props.initialValues.height :''
})

const showModal = ref(false);

const submit = () => {
  editPaintingForm.put(props.submitUrl, {
    preserveScroll: true,
    onSuccess: () => {
      showModal.value = true;
      editPaintingForm.reset();
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
      <InputLabel for="title" value="Title" />
      <TextInput
          id="title"
          v-model="editPaintingForm.title"
          type="text"
          class="mt-1 block w-full"
          required
          autofocus
          autocomplete="title"
      />
      <InputError class="mt-2" :message="editPaintingForm.errors.title" />
    </div>

    <div class="mt-4">
      <InputLabel for="description" value="Description" />
      <TextInput
          id="description"
          v-model="editPaintingForm.description"
          type="text"
          class="mt-1 block w-full"
          required
          autofocus
          autocomplete="description"
      />
      <InputError class="mt-2" :message="editPaintingForm.errors.description" />
    </div>

    <div class="mt-4">
      <InputLabel for="image_url" value="Url Image" />
      <TextInput
          id="image_url"
          v-model="editPaintingForm.image_url"
          type="text"
          class="mt-1 block w-full"
          required
          autocomplete="username"
      />
      <InputError class="mt-2" :message="editPaintingForm.errors.image_url" />
    </div>

    <div class="mt-4">
      <InputLabel for="style" value="Style" />
      <TextInput
          id="style"
          v-model="editPaintingForm.style"
          type="text"
          class="mt-1 block w-full"
          required
          autocomplete="new-style"
      />
      <InputError class="mt-2" :message="editPaintingForm.errors.style" />
    </div>
    <div class="mt-4">
      <InputLabel for="width" value="Width" />
      <TextInput
          id="width"
          v-model="editPaintingForm.width"
          type="number"
          class="mt-1 block w-full"
          required
          autofocus
          autocomplete="width"
      />
      <InputError class="mt-2" :message="editPaintingForm.errors.width" />
    </div>
    <div class="mt-4">
      <InputLabel for="height" value="Height" />
      <TextInput
          id="height"
          v-model="editPaintingForm.height"
          type="number"
          class="mt-1 block w-full"
          required
          autofocus
          autocomplete="height"
      />
      <InputError class="mt-2" :message="editPaintingForm.errors.height" />
    </div>

    <div class="flex items-center justify-end mt-4">
      <PrimaryButton v-if="editPaintingForm.processing" :class="{ 'opacity-25': editPaintingForm.processing }" :disabled="editPaintingForm.processing">
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