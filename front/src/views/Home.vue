<template>
  <div class="home">
    <AppTutorial @closeTutorial="closeTutorial" v-if="tutorial" />
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
    <div class="profile-wrapper over-map">
      <Profile :user="user" />
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import AppMap from "@/components/AppMap.vue";
import AppTutorial from "@/components/AppTutorial.vue";
import UserBar from "@/components/UserBar.vue";
import Scanner from "@/components/Scanner.vue";
import Profile from "@/components/Profile.vue";

export default {
  name: "home",
  components: {
    AppMap,
    AppTutorial,
    UserBar,
    Scanner,
    Profile
  },
  data() {
    return {
      scannerModal: false,
      user: {
        name: "Example",
        email: "example@example.com",
        score: 15036
      },
      tutorial: true
    };
  },
  methods: {
    closeTutorial() {
      this.tutorial = false;
    },
    showTutorial() {
      this.tutorial = true;
    }
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
.profile-wrapper {
  position: absolute;
  top: 10px;
  right: 10px;
  background-color: red;
}
</style>
