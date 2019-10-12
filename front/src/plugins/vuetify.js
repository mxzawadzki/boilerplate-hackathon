import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'

Vue.use(Vuetify)

export default new Vuetify({
    icons: {
        iconfont: 'fa'
    },
    options: {
        rowsPerPageAll: [5, 10, 15, 25, 100]
    }
})
