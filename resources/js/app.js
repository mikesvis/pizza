import Vue from 'vue'
import store from './store'
import routes from './routes'
import VueRouter from 'vue-router'
import Burger from './components/Burger'
import { BootstrapVue } from 'bootstrap-vue'
import Navigation from './components/Navigation'
import BasketModal from './components/BasketModal'
import BasketButton from './components/BasketButton'
import CheckoutModal from './components/CheckoutModal'
import CurrencyToggler from './components/CurrencyToggler'

Vue.use(VueRouter);
Vue.use(BootstrapVue);

let app = new Vue({
    el: '#app',
    components: {Navigation, Burger, CurrencyToggler, BasketButton, BasketModal, CheckoutModal},
    router: new VueRouter(routes),
    data: {
        menuOpened: false,
    },
    watch: {
        '$route' () {
            this.menuOpened = false
        }
    },
    store,
    beforeCreate() {
        this.$store.dispatch('fetchCurrencies');
        this.$store.dispatch('fetchBasketProducts');
	}
});
