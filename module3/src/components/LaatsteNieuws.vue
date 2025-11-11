<script setup>
import {onMounted, ref} from "vue";
const props = defineProps({
  screenColor: String,
})
const artikelen = ref([]);
const maxIndex = ref(1)
onMounted(async () => {
  try {
    const response = await fetch('/nu.xml');
    const text = await response.text()
    const xml = new window.DOMParser().parseFromString(text, 'text/xml')
    const items = xml.querySelectorAll('item')

    artikelen.value = Array.from(items).map(item => ({
      title: item.querySelector('title')?.textContent ?? '',
      link: item.querySelector('link')?.textContent ?? '',
      description: item.querySelector('description')?.textContent ?? '',
      pubDate: item.querySelector('pubDate')?.textContent ?? ''
    }))
  }
  catch (error)
  {
    console.error(error)
  }
})
</script>

<template>
  <div class="news-sectie" :style="{backgroundColor: props.screenColor}">
    <h2>Laatste Nieuws:</h2>
    <article v-for="artikel in artikelen.slice(0 , 5)">
      <a :href="artikel.link"><p>{{ artikel.title }}</p></a>
    </article>
  </div>
</template>

<style scoped>

</style>