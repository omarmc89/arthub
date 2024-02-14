<script setup>

defineProps({
    artwork: Object,
});

</script>

<template>
  <section class="artwork-card" :artwork="artwork">
    <div class="artwork-card-title">
        <h3 class="title"><span>{{ artwork.artist.nickname }}</span> - {{ artwork.title }}</h3>
    </div>
    <div class="artwork-card-image-container">
      <img :src="artwork.image_url" :alt="artwork.title" />
    </div>
    <div class="artwork-card-description">
        <p class="font-normal text-gray-700">"{{ artwork.description }}"</p>
    </div>
  </section>

</template>

<style>

.artwork-card {
  position: relative; /* Para posicionar el pseudoelemento */
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: auto;
  margin: 50px 0;
  padding: 20px 0;
  background-image: url('../../../../public/dot.svg');
  background-size: 1.4%;
  background-position: start;
  background-repeat: repeat;
  box-shadow: 0 0 10px 0 rgba(162, 161, 161, 0.2);
}

.artwork-card-image-container {
  width: 70%;
  height: auto;
  margin: 20px 0;
}

.artwork-card-image-container img {
  width: 100%;
  height: auto;
  border-radius: 20px;
  object-fit: cover;
  object-position: center;
  box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.2);
}

.artwork-card-title {
  display:flex;
  justify-content: center;
  align-items: center;
  text-align: center;
  font-size: 20px;
    span{
      font-size: 30px;
      font-weight: bold;
      text-transform: uppercase;
    }
}

.artwork-card-description {
  width: 70%;
  padding: 10px;
  text-align: center;
  font-style: italic;
}

</style>