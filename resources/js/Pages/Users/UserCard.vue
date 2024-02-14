<script setup>

  defineProps({
    user: Object
  });

</script>

<template>
  <section class="artist-card">
    <img :src="user.avatar" :alt="user.name" />
    <div>
      <h3>{{ user.name }}<span> "{{ user.nickname }}"</span></h3>
      <p>{{ user.email }}</p>
    </div>
  </section>
</template>

<style>
  .artist-card {
    display: flex;
    flex-direction:column;
    align-items: center;

    img {
      border-radius: 50%;
    }
    
    div{
      display: flex;
      flex-direction: column;
      align-items: center;

      h3 {
        margin: 10px 0;

        span {
          color: #666;
          text-transform: uppercase;
        }
      }
    }
  }
</style>