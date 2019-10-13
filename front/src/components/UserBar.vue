<template>
  <div class="userbar">
    <v-btn color="primary" @click.stop="dialog = true">Login</v-btn>
    <v-dialog v-model="dialog">
      <Login />
    </v-dialog>
  </div>
</template>

<script>
import Login from "@/components/Login.vue";
export default {
  components: {
    Login
  },
  data() {
    return {
      dialog: false
    };
  },
  methods: {
    showTutorial() {
      this.$emit('showTutorial')
    }
  }
};
</script>

<style>

</style>
