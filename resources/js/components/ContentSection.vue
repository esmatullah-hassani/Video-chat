<template>
  <div class="container">
    <hero-menu/>
    <hero-sidebar/>
    <herro-footer/>
  </div>
</template>

<script>
import HeroMenu from './hero-section/HeroMenu.vue'
import HeroSidebar from './hero-section/HeroSidebar.vue'
import HerroFooter from './hero-section/HerroFooter.vue'
export default {
  components: { HeroSidebar, HerroFooter },
    name:'ContentSection',

        HeroMenu}
</script>

<style>

</style>