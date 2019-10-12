<template>
  <div id="app">
    <div id="nav">
      <router-link to="/">Home</router-link>|
      <router-link to="/about">About</router-link>|
      <router-link to="/scanner">Scanner</router-link>
    </div>

    <button @click="AuthProvider('google')">Login GOOGLE</button>
    <router-view />
  </div>
</template>

<script>
export default {
  data() {
    return {};
  },
  methods: {
    AuthProvider(provider) {
      console.log('dupa');

    console.log(this.$auth);
      this.$auth
        .authenticate(provider)
        .then(response => {
          this.SocialLogin(provider, response);
        })
        .catch(err => {
          console.log({ err: err });
        });
    },

    SocialLogin(provider, response) {
      console.log('siema');
      this.$http
        .post("/sociallogin/" + provider, response)
        .then(response => {
          console.log(response.data);
        })
        .catch(err => {
          console.log({ err: err });
        });
    }
  }
};
</script>


<style>
#app {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
