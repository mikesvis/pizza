import Vue from 'vue'
import Vuex from 'vuex'
import pizza from './modules/pizza'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        pizza
    }
})
