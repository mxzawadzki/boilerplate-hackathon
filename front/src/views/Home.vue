<template>
  <div id="home">
    <AppTutorial @closeTutorial="closeTutorial" v-if="tutorial" />
    <AppMap />

    <!-- logged in user -->
    <template v-if="user">
      <v-row justify="center">
        <v-dialog v-model="scannerModal" class="over-map" max-width="640">
          <template v-slot:activator="{ on }">
            <v-btn
              color="primary"
              v-on="on"
              class="scanner-button over-map"
              dark
            >
              Open Code Scanner
            </v-btn>
          </template>
          <v-card>
            <Scanner
              @closeScannerModal="scannerModal = false"
              @addPoints="addPoints"
            />
            <v-card-actions>
              <div class="flex-grow-1"></div>
              <v-btn color="blue darken-1" text @click="scannerModal = false"
                >Close</v-btn
              >
            </v-card-actions>
          </v-card>
        </v-dialog>
      </v-row>
      <div class="profile-wrapper over-map">
        <Profile :user="user" />
      </div>
    </template>
    <!-- logged in user -->

    <!-- anonymous user -->
    <template v-else>
      <div class="login-wrapper over-map">
        <v-row justify="center">
          <v-dialog v-model="loginModal" class="over-map" max-width="640">
            <template v-slot:activator="{ on }">
              <div class="login-wrapper over-map">
                <v-btn color="primary" v-on="on" dark>
                  Login
                </v-btn>
              </div>
            </template>
            <v-card>
              <Login :loginData.sync="loginData" />
              <v-card-actions>
                <div class="flex-grow-1"></div>
                <v-btn color="blue darken-1" text @click="login">Login</v-btn>
                <v-btn color="blue darken-1" text @click="loginModal = false"
                  >Close</v-btn
                >
              </v-card-actions>
            </v-card>
          </v-dialog>
        </v-row>
      </div>
    </template>
    <!-- anonymous user -->
  </div>
</template>

<script>
// @ is an alias to /src
import AppMap from "@/components/AppMap.vue";
import AppTutorial from "@/components/AppTutorial.vue";
import UserBar from "@/components/UserBar.vue";
import Scanner from "@/components/Scanner.vue";
import Profile from "@/components/Profile.vue";
import Login from "@/components/Login.vue";

import { getUser, isLoggedIn, login } from "@/utils/api.js";

export default {
  name: "home",
  components: {
    AppMap,
    AppTutorial,
    Login,
    Scanner,
    Profile
  },
  data() {
    return {
      scannerModal: false,
      loginModal: false,
      user: null,
      tutorial: true,
      loginData: {
        email: "",
        password: ""
      }
    };
  },
  mounted() {
    // check token
    if (isLoggedIn()) {
      // getUser
    }
  },
  methods: {
    closeTutorial() {
      this.tutorial = false;
    },
    showTutorial() {
      this.tutorial = true;
    },
    addPoints(points) {
      this.user = {
        ...this.user,
        score: this.user.score + points
      };
    },
    async login() {
      const { email, password } = this.loginData;
      await login({ email, password });
      const userData = await getUser();
      debugger
    }
  }
};
</script>

<style>
.over-map {
  z-index: 1000;
}
.scanner-button {
  position: absolute;
  bottom: 40px;
  /* right: 40px; */
}
.profile-wrapper,
.login-wrapper {
  position: fixed;
  top: 10px;
  right: 10px;
}
</style>
