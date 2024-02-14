<script setup>
import { defineProps } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import ModalComponent from '@/Components/DialogModal.vue';
import { ref, onMounted } from 'vue';
import { usePage } from '@inertiajs/vue3'


defineProps({
    userArtworks: Object,
});

function handleClick() {
  const div = document.querySelector('.alert');
  div.style.display = 'none';
}

</script>

<template>
  <AppLayout title="User Artworks Deck">
    <div v-if="$page.props.flash.success" class="alert">
    <h3>{{ $page.props.flash.success }}</h3>
    <button @click="handleClick">X</button>
    </div>
    <section class="artworks-deck" :userArtworks="userArtworks">
      <article v-for="userArtwork in userArtworks" :key="userArtwork.id" class="user-artwork-card" >
        <div class="user-artwork-card-title">
          <h5>{{ userArtwork.title }}</h5>
        </div>
        <div class="user-artwork-card-image-container">
          <img :src="userArtwork.image_url" :alt="userArtwork.title" />
        </div>
        <div class="user-artwork-card-buttons">
          <Link :href="'artworks/' + userArtwork.id + '/edit' " class="button" as="button">✏️</Link>
          <Link :href="'/artworks/' + userArtwork.id" method="DELETE" as="button" class="button">❌</Link>
        </div>
      </article>
    </section>
  </AppLayout>
</template>

<style>

.artworks-deck {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  grid-auto-rows: 350px;
  align-items: center;
  place-content: center;
  gap: 10px;
  padding: 20px;
  box-shadow: 0 0 10px 0 rgba(162, 161, 161, 0.2);
  background-image: url('../../../public/dot.svg');
  background-size: 1.5%;
  background-position: top;
  background-repeat: repeat;
  box-shadow: 0 0 10px 0 rgba(162, 161, 161, 0.2);
}

.alert {
  width:100%;
  background-color: rgba(249, 95, 95, 0.621);
  font-size: 15px;
  font-weight: bold;
  display:flex;
  justify-content: space-between;
  padding: 5px 15px;
  color: #151515af;
}

.user-artwork-card {
  height: 100%;
  border-bottom: 1px solid #b9bbbe;
  padding: 10px;
  

  .user-artwork-card-title {
    width: 100%;
    text-align: center;
    height: 10%;
    display:flex;
    align-items: center;
    justify-content:center;
    font-weight: bold;
    letter-spacing: 2px;
    color: #151515af
  }

  .user-artwork-card-image-container {
    width: 100%;
    height: 75%;
    img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: center;
      border-radius: 10px;
      box-shadow: 0 0 10px 0 rgb(93, 93, 93);
      border: 1px solid #5556589d;
    }
  }

  .user-artwork-card-buttons {
    width: 100%;
    height: 15%;
    display: flex;
    justify-content: space-around;
    align-items: center;

    .button {
      text-align: center;
      width: 20%;
      border: 2px solid  #b9bbbe;
      background-color: #dfe1e5;
      border-radius:10px;
      font-size: 20px;
      cursor: pointer;
      box-shadow: 2px 2px 10px 0 #15151533;
    }

    button:hover {
      background-color: #b9bbbe;
      color: white;
      box-shadow:none;
    }
  }

}

</style>