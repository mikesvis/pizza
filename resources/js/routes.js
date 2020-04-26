import Home from './components/Home';
import Order from './components/Order';
import Contact from './components/Contact';
import NotFound from './components/NotFound';


export default {
    mode: 'history',
    linkActiveClass: 'navigation__link--active',

    routes: [
        {
            path: '*',
            component: NotFound,
            name: 'not-found',
        },
        {
            path: '/',
            component: Home,
            name: 'home',
        },
        {
            path: '/contact',
            component: Contact,
            name: 'contact',
        },
        {
            path: '/order/:orderUuid',
            component: Order,
            name: 'order',
            props: true,
        },
    ]
};
