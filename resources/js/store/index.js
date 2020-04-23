import Vue from 'vue'
import Vuex from 'vuex'
import pizza from './modules/pizza'
import slide from './modules/slide'
import basket from './modules/basket'
import option from './modules/option'
import currency from './modules/currency'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        pizza,
        option,
        currency,
        slide,
        basket
    }
})
