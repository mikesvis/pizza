import Vue from 'vue'
import VueRouter from 'vue-router'
import { BootstrapVue } from 'bootstrap-vue'
import Navigation from './components/Navigation'
import Burger from './components/Burger'
import routes from './routes'
import store from './store'

Vue.use(VueRouter);
Vue.use(BootstrapVue);

let app = new Vue({
    el: '#app',
    store,
    components: {Navigation, Burger},
    router: new VueRouter(routes),
    data: {
        menuOpened: false,
    },
    watch: {
        '$route' () {
            this.menuOpened = false
        }
    }
});
