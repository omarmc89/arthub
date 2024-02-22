<script setup>

import { defineProps } from 'vue';
import UserCard from '@/Pages/Users/UserCard.vue';
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({
    users: Object,
});

</script>

<template>
  <AppLayout title="Admin Users">
    <div>
        <h1>Admin Users View</h1>
    </div>
    <section class="main-artists" :users="users">
      <div  v-for="user in users" :key="user.id">
        <UserCard :user="{
          avatar: user.avatar,
          name: user.name,
          nickname: user.artist ? user.artist.nickname : 'No nickname',
          email: user.email
        }"/>
      </div>
    </section>
  </AppLayout>

</template>

<style>
  .main-artists{
    min-height: 80vh;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    place-content: center;
    column-gap: 90px;
    row-gap: 50px;
    margin-top: 50px;
    padding: 20px;
    background-image: url('./dot.svg');
    background-size: 1.5%;
    background-position: top;
    background-repeat: repeat;
    box-shadow: 0 0 10px 0 rgba(162, 161, 161, 0.2);
  }
</style>