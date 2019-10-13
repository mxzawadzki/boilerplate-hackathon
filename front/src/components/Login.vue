<template>
  <div>
    <!-- <v-toolbar color="primary" dark flat>
      <v-toolbar-title>Login form</v-toolbar-title>
      <div class="flex-grow-1"></div>
    </v-toolbar> -->
    <v-card-text>
      <v-form @submit="login">
        <v-text-field
          @keydown.enter="login"
          label="Email"
          name="email"
          v-model="computedLoginData.email"
          prepend-icon="mdi-account"
          type="text"
        ></v-text-field>

        <v-text-field
          @keydown.enter="login"
          id="password"
          label="Hasło"
          name="password"
          v-model="computedLoginData.password"
          prepend-icon="mdi-lock"
          type="password"
        ></v-text-field>
      </v-form>
    </v-card-text>
    <v-card-actions>
      <div class="flex-grow-1"></div>
      <v-btn color="blue darken-1" text @click="login" :loading="loading"
        >Zaloguj</v-btn
      >
    </v-card-actions>
  </div>
</template>

<script>
export default {
  props: ["loginData", "loading"],
  computed: {
    computedLoginData: {
      get() {
        return this.loginData;
      },
      set(v) {
        this.$emit("update:loginData", v);
      }
    }
  },
  methods: {
    submit() {
      this.$emit("login");
    },
    login() {
      this.$emit("login");
    }
  }
};
</script>

<style></style>
