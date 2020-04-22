import Vue from 'vue'
import Vuex from 'vuex'
import pizza from './modules/pizza'
import modalProduct from './modules/modal-product'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        pizza,
        modalProduct,
    }
})
