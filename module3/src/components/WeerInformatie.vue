<script setup>
import {onMounted, ref} from "vue";
import axios from 'axios';
const weerObj = ref([]);
onMounted(async () => {
  try {
    const response = await axios.get("https://weerlive.nl/api/weerlive_api_v2.php?key=demo&locatie=Amsterdam");
    weerObj.value = response.data;
  } catch (error) {
    console.error(error);
  }
});
console.log(weerObj);
</script>

<template>
  <div v-for="waarde in weerObj.liveweer" class="weer-sectie">
    <div class="row">
      <h2>Huidig weer</h2>
      <h2>🌤️ {{ waarde.plaats }}</h2>
    </div>
    <p>Temperatuur: {{ waarde.temp }}°C</p>
    <p>Weer: {{ waarde.samenv }}</p>
    <p>Wind: {{ waarde.windr }} {{ waarde.winds }} km/u</p>
  </div>
</template>

<style scoped>

</style>