<template>
  <div class="home">
    <AppMap />
  </div>
</template>

<script>
// @ is an alias to /src
import AppMap from '@/components/AppMap.vue'

export default {
  name: 'home',
  components: {
    AppMap
  }
}
</script>
