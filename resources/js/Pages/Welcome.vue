<script setup>
import { Head, Link } from '@inertiajs/vue3';
import ArtworkCard from '@/Pages/ArtworkCard.vue'
import ApplicationLogo from '@/Components/ApplicationLogo.vue'

defineProps({
    artworks: Object, 
    user:Object,
    canLogin: Boolean,
    canRegister: Boolean,
});

</script>

<template>
    <Head title="ArtHUB" />

    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 selection:bg-red-500 selection:text-white">
        <div v-if="canLogin" class="user sm:fixed sm:top-1 sm:end-0 p-2 text-end z-10">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{ $page.props.auth.user.name}}'s dashboard</Link>

            <template v-else>
                <Link :href="route('login')" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</Link>

                <Link v-if="canRegister" :href="route('register')" class="ms-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</Link>
            </template>
        </div>

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center">
                <ApplicationLogo width="200"/>
            </div>

            <div class="mt-16 flex items-center mx-auto">
            <ArtworkCard :artworks="artworks" />
            </div>

            <div class="flex justify-center mt-16 px-6 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 sm:text-start">
                    <div class="flex items-center gap-4">
                        <a href="https://github.com/omarmc89/arthub" class="group inline-flex items-center hover:text-gray-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            <img class="github" src="../../../public/github-mark.svg">
                            Omar Martin - 2024
                        </a>
                    </div>
                </div>

                <div class="ms-4 text-center text-sm text-gray-500 sm:text-end sm:ms-0">
                    Showing {{ artworks.length }} artworks from the database
                </div>
            </div>
        </div>
    </div>
</template>

<style>

.user {
  background-color: rgba(255, 255, 255, 0.5) !important;
  border-radius: 10px;
  backdrop-filter: blur(5px);
}

.github {
    width: 30px;
    height: 30px;
    padding: 5px;
}
</style>