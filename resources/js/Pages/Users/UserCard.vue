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
      box-shadow: 5px 5px 15px 0 rgba(0,0,0,0.2);
      border: 3px solid #e9c7c7c7;
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

      p {
        background-color: #7c7878c9;
        padding: 5px 10px;
        border-radius: 20px;
        color: rgb(247, 207, 207);
      }
    }
  }
</style>