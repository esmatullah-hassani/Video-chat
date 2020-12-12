<template>
  <div class="container">
    <hero-menu/>
    <div class="flex flex-col md:flex-row mt-14">
      <hero-sidebar/>
      <router-view />
    </div>
  </div>
</template>

<script>
import HeroMenu from './hero-section/HeroMenu.vue'
import HeroSidebar from './hero-section/HeroSidebar.vue'
import HerroFooter from './hero-section/HerroFooter.vue'
export default {
  components: { HeroSidebar, HerroFooter, HeroMenu },
    name:'App',
  }
</script>

<style>

</style>