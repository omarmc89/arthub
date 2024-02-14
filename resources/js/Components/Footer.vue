
<script setup>
</script>

<template>
    <footer class="bg-white shadow">      
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h3>ArtHUB</h3>
            <p>🐘</p>
            <h5>Omar Martin (2024)</h5>
        </div>        
    </footer>
</template>

<style>

  footer {
    position:sticky;
    width: 25%;
    padding: 0;
    bottom: 0;
    right:0; 
    border-radius: 10px;
    animation: fadeIn linear both;
    animation-timeline: scroll(root);

    div {
      display:flex;
      flex-direction: row;
      align-items: center;
      justify-content:center;
      padding: 0 !important;

      h3 {
        text-align: center;
        font-style: bold;
        font-size:25px;
        padding: 0;
      }

      p{
        padding: 0 10px;
      }
  }
}

  @keyframes fadeIn {
    0% {
      opacity: 0.5;
    }
    30% {
      opacity: 0.6;
    }
    85% {
      opacity: 0.8;
    }
  }

</style>