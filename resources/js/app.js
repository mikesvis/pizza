import Vue from 'vue';
import VueRouter from 'vue-router';
import Navigation from './components/Navigation';
import Burger from './components/Burger';
import routes from './routes'

Vue.use(VueRouter);

let app = new Vue({
    el: '#app',
    components: {Navigation, Burger},
    router: new VueRouter(routes),
    data: {
        menuOpened: false
    },
    watch: {
        '$route' () {
            this.menuOpened = false
        }
    }
});
