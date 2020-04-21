import Home from './components/Home';
import Contact from './components/Contact';
import NotFound from './components/NotFound';


export default {
    mode: 'history',
    linkActiveClass: 'navigation__link--active',

    routes: [
        {
            path: '*',
            component: NotFound,
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
    ]
};
