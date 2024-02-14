<script setup>
import Header from '@/Components/Header.vue';
import Footer from '@/Components/Footer.vue';
import { Head } from '@inertiajs/vue3';

function goBack() {
    window.history.back();
}

</script>
<template>
  <Head title="403 Forbbiden"/>
  <Header />
  <section class="main-content" >
      <article class="error-title">        
        <h1>403</h1>
        <p>Forbidden</p>
      </article>
      <article class="button-content">
        <p>Sorry, you are not allowed to access this page.</p>
        <button @click="goBack">Go Back</button>
      </article>
    </section>   
      <Footer />

</template>


<style>

.main-content{
  height: 80vh;
  width: 100%;  
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  background-image: url('../../../../public/dot.svg');
  background-size: 1.5%;
  background-position: top;
  background-repeat: repeat;
  
}
 
.error-title{
  display:flex; 
  align-items: center;
  justify-content: center;
  gap: 50px;

  h1{
    font-size: 100px;
    margin: 0;
  }

  p{
    font-size: 30px;
    margin: 0;
  }
}

.button-content {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 20px;

  button{
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    background-color: #aeaaaa;
    color: white;
    font-size: 20px;
    cursor: pointer;
  }

  button:hover{
    background-color: #7a7a7a;
  }
}


</style>