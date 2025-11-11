<script setup>
const colors = ["orange", "blue", "yellow", "purple", "red"]
import Information from "./Information.vue";
import WeerInformatie from "./WeerInformatie.vue";
import LaatsteNieuws from "./LaatsteNieuws.vue";
import {ref} from "vue";
const screenColor = ref(colors[0]);
</script>

<template>
  <header>
    <div class="column">
      <img src="../assets/mkb-logo.png" alt="logo mkb">
      <div class="row">
        <button v-for="color in colors" @click="screenColor = color" :style="{backgroundColor:  screenColor}" >{{ color }}</button>
      </div>
    </div>
    <Information :screenColor="screenColor"/>
  </header>
  <main>
    <WeerInformatie :screenColor="screenColor"/>
    <LaatsteNieuws :screenColor="screenColor"/>
  </main>
  <footer :style="{backgroundColor:  screenColor}">
    <h2>Uw informatie hier? Raadpleeg onze contactformulier om de mogelijkheden te bekijken!!</h2>
  </footer>
</template>

<style scoped>

</style>