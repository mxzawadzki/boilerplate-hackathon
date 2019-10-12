<template>
  <div class="home">
    <UserBar />
    <AppMap />
  </div>
</template>

<script>
// @ is an alias to /src
import AppMap from '@/components/AppMap.vue'
import UserBar from '@/components/UserBar.vue'

export default {
  name: 'home',
  components: {
    AppMap,
    UserBar
  }
}
</script>
