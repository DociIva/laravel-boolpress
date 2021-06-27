<template>
     <div class="div">
          <Header />

         <main>
             <!-- component matched by the route will render here -->
              <router-view></router-view>
         </main>
     </div>
</template>

<script>
// Cerca nel pacchetto di (nm)
import axios from 'axios';
import Header from "./components/Header.vue";
export default {
  name: 'App',
  components: {
      Header
  },
 
}
</script>

<style lang="scss">
@import '../sass/frontoffice/utilities.scss';
.navigation {
  .active-page {
    background-color: aquamarine;
  }
}
</style>