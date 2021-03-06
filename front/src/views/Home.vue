<template>
  <div id="home">
    <AppMap @onUserPosition="onUserPosition" :center.sync="mapCenter" />
    <!-- go to my location button -->
    <v-btn
      color="primary"
      @click="goToUserPosition"
      class="position-button over-map"
      :class="{ 'logged-in': user }"
      medium
      fab
    >
      <v-icon>mdi-crosshairs</v-icon>
    </v-btn>
    <!-- go to my location button -->

    <!-- got points feedback -->
    <v-row>
      <v-dialog v-model="pointsModal" class="over-map" max-width="320">
        <v-card class="over-map">
          <v-list-item two-line>
            <v-list-item-content>
              <div class="overline mb-4 text-left">Dodano</div>
              <v-list-item-title class="display-2 mb-1 text-center">
                {{ lastScore }} pkt.
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-card>
      </v-dialog>
    </v-row>
    <!-- got points feedback -->

    <!-- logged in user -->
    <template v-if="user">
      <v-row justify="center">
        <v-dialog v-model="scannerModal" class="over-map" max-width="640">
          <template v-slot:activator="{ on }">
            <v-btn
              color="primary"
              v-on="on"
              class="scanner-button over-map"
              medium
              fab
            >
              <v-icon>mdi-qrcode</v-icon>
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
                >Zamknij</v-btn
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
      <AppTutorial @closeTutorial="closeTutorial" v-if="tutorial" />
      <div class="login-wrapper over-map">
        <v-row justify="center">
          <v-dialog v-model="loginModal" class="over-map" max-width="640">
            <template v-slot:activator="{ on }">
              <div class="login-wrapper over-map">
                <v-btn color="primary" v-on="on" dark :loading="loading">
                  Zaloguj
                </v-btn>
                <v-btn
                  class="mx-2"
                  color="primary"
                  @click="toggleTutorial"
                  dark
                >
                  Pomoc
                </v-btn>
              </div>
            </template>
            <v-card>
              <Login
                :loginData.sync="loginData"
                :loading="loading"
                @login="login"
              />
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
      mapCenter: [52.2297, 21.0122],
      loading: false,
      scannerModal: false,
      loginModal: false,
      pointsModal: false,
      user: null,
      tutorial: true,
      lastScore: 0,
      userPosition: null,
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
    toggleTutorial() {
      this.tutorial = !this.tutorial;
    },
    addPoints(points) {
      this.user = {
        ...this.user,
        score: this.user.score + points
      };
      this.lastScore = points;
      this.pointsModal = true;
    },
    onUserPosition(coords) {
      this.saveUserPosition(coords);
      this.goToUserPosition();
    },
    saveUserPosition(coords) {
      this.userPosition = coords;
    },
    goToUserPosition() {
      this.mapCenter = [...this.userPosition];
    },
    async login() {
      this.loading = true;
      const { email, password } = this.loginData;
      try {
        await login({ email, password });
        const userData = await getUser();
        this.user = {
          name: userData.name,
          email: userData.email,
          score: userData.score
        };
        this.loginModal = false;
      } catch (error) {
        console.error(error);
      } finally {
        this.loading = false;
      }
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
  position: fixed !important;
  top: 10px;
  right: 10px;
}
.position-button {
  position: fixed !important;
  top: 60px;
  right: 10px;
}

.position-button.logged-in {
  top: 10px;
  right: 80px;
}

.profile-wrapper {
  position: fixed;
  bottom: 0;
  left: 0;
  right: 0;
}
.login-wrapper {
  position: fixed;
  top: 10px;
  right: 10px;
}
</style>
