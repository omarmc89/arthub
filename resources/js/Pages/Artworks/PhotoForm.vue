<script setup>
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';


const photoForm = useForm({
  title:'',
  description:'',
  image_url:'',
  style:''
})

const submit = () => {
  photoForm.post('/photos', {
    preserveScroll: true,
    onSuccess: () => photoForm.reset()
  })
}
</script>

<!-- FORMULARIO PARA ARTISTS-->
<template>
      <h1 class="text-2xl text-center font-semibold text-gray-900 dark:text-white">Create a new photo</h1>
        <form @submit.prevent="submit">
          <div>
            <InputLabel for="title" value="Title" />
            <TextInput
                id="title"
                v-model="photoForm.title"
                type="text"
                class="mt-1 block w-full"
                required
                autofocus
                autocomplete="title"
            />
            <InputError class="mt-2" :message="photoForm.errors.title" />
          </div>

          <div class="mt-4">
            <InputLabel for="description" value="Description" />
            <TextInput
                id="description"
                v-model="photoForm.description"
                type="text"
                class="mt-1 block w-full"
                required
                autofocus
                autocomplete="description"
            />
            <InputError class="mt-2" :message="photoForm.errors.description" />
          </div>

          <div class="mt-4">
            <InputLabel for="image_url" value="Url image" />
            <TextInput
                id="image_url"
                v-model="photoForm.image_url"
                type="text"
                class="mt-1 block w-full"
                required
                autocomplete="username"
            />
            <InputError class="mt-2" :message="photoForm.errors.image_url" />
          </div>

          <div class="mt-4">
            <InputLabel for="style" value="Style" />
            <TextInput
                id="style"
                v-model="photoForm.style"
                type="text"
                class="mt-1 block w-full"
                required
                autocomplete="new-style"
            />
            <InputError class="mt-2" :message="photoForm.errors.style" />
          </div>
          <div class="flex items-center justify-end mt-4">
            <PrimaryButton v-if="photoForm.processing" :class="{ 'opacity-25': photoForm.processing }" :disabled="photoForm.processing">
                Uploading...
            </PrimaryButton>
            <PrimaryButton v-else>
                Create Photo
            </PrimaryButton>
          </div>
        </form>
</template>