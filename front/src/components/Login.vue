<template>
  <div>
    <v-toolbar color="primary" dark flat>
      <v-toolbar-title>Login form</v-toolbar-title>
      <div class="flex-grow-1"></div>
    </v-toolbar>
    <v-card-text>
      <v-form>
        <v-text-field
          label="Login"
          name="login"
          prepend-icon="mdi-account"
          type="text"
        ></v-text-field>

        <v-text-field
          id="password"
          label="Password"
          name="password"
          prepend-icon="mdi-lock"
          type="password"
        ></v-text-field>
      </v-form>
    </v-card-text>
  </div>
</template>

<script>
export default {};
</script>

<style></style>
