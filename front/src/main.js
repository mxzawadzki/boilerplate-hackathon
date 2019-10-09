import Vue from 'vue'
import firebase from 'firebase';
import App from './App.vue'
import store from './store'
import router from './router'

Vue.config.productionTip = false

const firebaseConfig = {
  apiKey: "YOUR_API_KEY",
  authDomain: "YOUR_PROJECT_ID.firebaseapp.com",
  databaseURL: "https://YOUR_PROJECT_ID.firebaseio.com",
  projectId: "YOUR_PROJECT_ID",
  storageBucket: "YOUR_PROJECT_ID.appspot.com",
  messagingSenderId: "YOUR_MESSAGING_SEND_ID"
};

firebase.initializeApp(firebaseConfig)

new Vue({
  store,
  router,
  render: h => h(App)
}).$mount('#app')
