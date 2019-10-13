<template>
  <v-card class="Profile">
    <v-list-item three-line>
      <v-list-item-content>
        <v-list-item-title class="headline">{{ user.name }}</v-list-item-title>
        <v-list-item-subtitle>Lvl. {{ currentLevel }}</v-list-item-subtitle>
        <v-list-item-subtitle>{{ user.email }}</v-list-item-subtitle>
      </v-list-item-content>
    </v-list-item>
    <v-card-text>
      <v-progress-linear
        striped
        :value="scorePercent"
        height="40"
      ></v-progress-linear>
      <v-row>
        <v-col class="text-left">{{ user.score }}</v-col>
        <v-col class="text-right">{{ neededForNextLevel }}</v-col>
      </v-row>
    </v-card-text>
    <v-card-actions>
      <div class="flex-grow-1"></div>
      <v-btn color="blue darken-1" text @click="$emit('logout')">
        Logout
      </v-btn>
    </v-card-actions>
  </v-card>
</template>

<script>
export default {
  name: "profile",
  props: ["user"],
  data() {
    return {
      levelTreshholds: [1000, 2000, 5000, 10000, 20000, 30000, 50000, 100000]
    };
  },
  computed: {
    scorePercent() {
      return (this.user.score / this.neededForNextLevel) * 100;
    },
    neededForNextLevel() {
      for (let i = 0; i < this.levelTreshholds.length; i++) {
        if (this.user.score < this.levelTreshholds[i]) {
          return this.levelTreshholds[i];
        }
      }
      return this.levelTreshholds.slice().pop();
    },
    currentLevel() {
      return this.levelTreshholds.indexOf(this.neededForNextLevel);
    }
  }
};
</script>

<style>
.Profile {
}
</style>
