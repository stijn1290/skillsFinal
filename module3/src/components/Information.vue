<script setup>
const weekDays = ["Maandag", "Dinsdag", "Woensdag", "Donderdag", "Vrijdag", "Zaterdag", "Zondag"];
const maanden = ["Januari", "Februari", "Maart", "April", "Mei", "Juni", "Juli", "Augustus", "September",
  "Oktober", "November", "December"]
const dateObj = new Date();
const dayI = dateObj.getDay()
const day = weekDays[dayI - 1];
const maandI = dateObj.getMonth();
const maand = maanden[maandI];
const props = defineProps({
  screenColor: String,
})
</script>

<template>
  <div class="information" :style="{backgroundColor: props.screenColor}">
    <h2>{{ day }}</h2>
    <div>
      <h2>{{ dateObj.getDate() }}</h2>
      <h2>{{ maand }}</h2>
    </div>
    <div>
      <h2>{{ dateObj.getHours() }}:</h2>
      <h2>{{ dateObj.getMinutes() }}</h2>
    </div>
  </div>
</template>

<style scoped>

</style>