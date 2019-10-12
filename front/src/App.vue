<template>
  <v-app id="app">
    <v-content>
      <router-view />
      <div class="g-signin2" data-onsuccess="onSignIn"></div>
    </v-content>
  </v-app>
</template>

<script>




export default {
  data() {
    return {};
  },
  methods: {

  },
  mounted() {
    let api = gapi.auth2.init()
    // console.log()
    //  var auth2 = gapi.signIn.go();
     console.log(auth2);
     function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
}
  }
};
</script>


<style>
body {
  margin: 0;
  padding: 0;
}

#app {
  font-family: "Lato", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
</style>
