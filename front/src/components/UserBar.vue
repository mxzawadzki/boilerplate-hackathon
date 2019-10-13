<template>
  <div class="userbar">
    <v-btn class="userbar__button" color="primary">Menu</v-btn>
    <v-btn class="mx-2 userbar__button--icon" fab dark small color="primary" @click="showTutorial">
      <v-icon dark>mdi-help</v-icon>
    </v-btn>
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

<style lang="scss">
.userbar {
  display: flex;
  position: fixed;
  top: 50px;
  right: 50px;
  z-index: 1000;

  &__button {
    margin: 0 .5rem;

    &--icon {
      height: 36px !important;
      width: 36px !important;
    }
  }
}
<style>

</style>
