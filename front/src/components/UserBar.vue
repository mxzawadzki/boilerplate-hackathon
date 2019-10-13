<template>
  <div class="userbar">
    <v-btn depressed color="primary" @click.stop="dialog = true">Login</v-btn>
    <v-btn depressed color="primary">Menu</v-btn>
    <v-btn class="mx-2" fab dark small color="primary" @click="showTutorial">
      <v-icon dark>mdi-help</v-icon>
    </v-btn>
    <v-dialog
        v-model="dialog"
        max-width="290"
      >
        <v-card>
          <v-card-title class="headline">Login</v-card-title>
  
          <v-card-text>
            Lorem ipsum dolor sit amet.
          </v-card-text>
  
          <v-card-actions>
            <div class="flex-grow-1"></div>
            <v-btn
              color="green darken-1"
              text
              @click="dialog = false"
            >
              Login
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
  </div>
</template>

<script>
export default {
  data() {
    return {
      dialog: false,
    }
  }
}
</script>

<style>
.userbar {
  display: flex;
  position: fixed;
  top: 50px;
  right: 50px;
  z-index: 1000;
}

  h1 {
    color: #fff;
  }
</style>
