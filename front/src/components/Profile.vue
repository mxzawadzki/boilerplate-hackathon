<template>

  <v-card class="Profile">
    <v-btn
      color="blue darken-1"
      text
      @click="$emit('logout')"
    >
     <v-icon>mdi-logout</v-icon>
    </v-btn>
    <h2 class="headline">
      {{ user.name }}
      <small>
        {{ user.email }}
      </small>
    </h2>

    <v-card-text class="mobile-in-row">
        <v-progress-circular class="hide-desktop" :value="scorePercent"></v-progress-circular>
      <v-progress-linear class="show-desktop"
        striped
        :value="scorePercent"
        height="10"
      ></v-progress-linear>
      <v-row class="mobile-column">
        <v-col class="no-padding-bottom no-padding-mobile text-left">{{ user.score }}</v-col>
        <v-col class="no-padding-bottom no-padding-mobile text-center"> Poziom {{ currentLevel }}</v-col>
        <v-col class="no-padding-bottom no-padding-mobile text-right">{{ neededForNextLevel }}</v-col>
      </v-row>
    </v-card-text>
    <!-- <v-card-actions>
        <div class="flex-grow-1"></div>

      </v-card-actions> -->
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
      return this.levelTreshholds.indexOf(this.neededForNextLevel) + 1;
    }
  }
};
</script>

<style lang="scss">
.Profile {
  display: flex !important;
  align-items: center;
}

.headline small {
  display: block;

  font-size: 12px;
}

.headline {
  display: flex;
  flex-direction: column;
  justify-content: center;
  line-height: 1.2 !important;
  padding: 5px;
  text-align: left;
  vertical-align: middle;
  min-width: 200px;
  font-size: 15px !important;
}

.no-padding-bottom {
  padding-bottom: 0 !important;
}

.hide-desktop {
  display: block !important;
  @media (min-width: 560px) {
    display: none !important;
  }
 
}

.no-padding-mobile {
  @media (max-width: 559px) {
  padding: 0 0 0 0 !important;
  }
}






.Profile .mobile-column {
  @media (max-width: 559px) {
    flex-direction: column;
    padding: 0 0 0 0 !important;
     .text-left, .text-center, .text-right {

    text-align: right !important;
    padding: 0 5px !important;
    }
  }
}

.Profile .mobile-in-row {
  @media (max-width: 559px) {
    flex-direction: row;
    align-items: center;
    display: flex;
  }
}

.show-desktop {
  display: none !important;
  @media (min-width: 560px) {
    display: block !important;
  }
}
</style>
