<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import UserCard from '@/Pages/Users/UserCard.vue';

defineProps({
  artists: Object
})

</script>

<template>
  <AppLayout title="Artists">
    <section class="main-artists" :artists="artists">
      <article  v-for="artist in artists" class="artists-deck" :key="artist.id">
        <UserCard :user="{
          avatar: artist.user.avatar,
          name: artist.user.name,
          nickname: artist.nickname,
          email: artist.user.email
        }"/>
      </article>     
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
    background-image: url('../../../public/dot.svg');
    background-size: 1.5%;
    background-position: top;
    background-repeat: repeat;
    box-shadow: 0 0 10px 0 rgba(162, 161, 161, 0.2);
  }
</style>