import Vue from 'vue'
import { Icon } from 'leaflet'
import App from './App.vue'
import store from './store'
import router from './router'
// import 'leaflet/dist/leaflet.css'

import vuetify from './plugins/vuetify'

delete Icon.Default.prototype._getIconUrl

Icon.Default.mergeOptions({
    iconRetinaUrl: require('@/assets/leaflet/marker-icon-2x.png'),
    iconUrl: require('@/assets/leaflet/marker-icon.png'),
    shadowUrl: require('@/assets/leaflet/marker-shadow.png')
})

new Vue({
    store,
    router,
    vuetify,
    render: h => h(App)
}).$mount('#app')
