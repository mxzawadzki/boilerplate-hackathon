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
        <Profile :user="user" @logout="logout" />
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
                <v-btn class="mx-2" color="primary" @click="showTutorial" dark>
                  Help
                </v-btn>
              </div>
            </template>
            <v-card>
              <Login :loginData.sync="loginData" @login="login" />
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

import { getUser, isLoggedIn, login, logout } from "@/utils/api.js";

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
      loading: false,
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
    if (isLoggedIn()) {
      this.loading = true;
      getUser().then(userData => {
        this.user = {
          name: userData.name,
          email: userData.email,
          score: userData.score
        };
        this.loading = false;
      });
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
      this.loading = true;
      const { email, password } = this.loginData;
      await login({ email, password });
      const userData = await getUser();
      this.user = {
        name: userData.name,
        email: userData.email,
        score: userData.score
      };
      this.loading = false;
    },
    logout() {
      this.user = null;
      logout();
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
