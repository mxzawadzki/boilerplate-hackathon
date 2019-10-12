<template>
  <div class="about">
    <AppTutorial @closeTutorial="closeTutorial" v-if="tutorial" />
  </div>
</template>

<script>
import AppTutorial from '@/components/AppTutorial.vue'
export default {
  name: 'home',
  components: {
    AppTutorial
  },
  data() {
    return {
      tutorial: true
    }
  },
  methods: {
    closeTutorial() {
      this.tutorial = false;
    }
  }
}
</script>

<style>

</style>