<template>
  <div class="home">
    <UserBar />
    <AppMap />
    <v-row justify="center">
      <v-dialog v-model="scannerModal" class="over-map" max-width="640">
        <template v-slot:activator="{ on }">
          <v-btn
            color="primary"
            v-on="on"
            class="floating-button over-map"
            dark
          >
            Open Code Scanner
          </v-btn>
        </template>
        <v-card>
          <Scanner @closeScannerModal="scannerModal = false" />
          <v-card-actions>
            <div class="flex-grow-1"></div>
            <v-btn color="green darken-1" text @click="scannerModal = false"
              >Close</v-btn
            >
          </v-card-actions>
        </v-card>
      </v-dialog>
    </v-row>
  </div>
</template>

<script>
// @ is an alias to /src
import AppMap from "@/components/AppMap.vue";
import UserBar from "@/components/UserBar.vue";
import Scanner from "@/components/Scanner.vue";

export default {
  name: "home",
  components: {
    AppMap,
    UserBar,
    Scanner
  },
  data() {
    return {
      scannerModal: false,
      user: {
        username: "Example",
        email: "example@example.com",
        score: 1536
      }
    };
  }
};
</script>

<style>
.over-map {
  z-index: 1000;
}
.floating-button {
  position: absolute;
  bottom: 40px;
  /* right: 40px; */
}
</style>
