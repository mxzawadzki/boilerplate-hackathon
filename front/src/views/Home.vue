<template>
  <div class="home">
    <img alt="Vue logo" src="../assets/logo.png">
    <HelloWorld msg="Welcome to Your hackathon App"/>
    <AppMap />
  </div>
</template>

<script>
// @ is an alias to /src
import HelloWorld from '@/components/HelloWorld.vue'
import AppMap from '@/components/AppMap.vue'

export default {
  name: 'home',
  components: {
    HelloWorld,
    AppMap
  }
}
</script>
