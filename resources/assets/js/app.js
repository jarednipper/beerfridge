var Vue = require('vue');
Vue.use(require('vue-resource'));

var VueRouter = require('vue-router');
Vue.use(VueRouter);


import BeerRequests from './components/BeerRequests.vue';
import RequestForm from './components/RequestForm.vue';

// new Vue({
//     el: '#app',
//     components: { BeerRequests, RequestForm },
// });

var App = Vue.extend({});

var router = new VueRouter();

router.map({
    '/': {
        component: BeerRequests,
        name: 'index',
    },
    '/request': {
        component: RequestForm,
        name: 'requestForm',
    }
});

router.start(App, '#app');
