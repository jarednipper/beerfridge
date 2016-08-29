var Vue = require('vue');
Vue.use(require('vue-resource'));

import BeerRequests from './components/BeerRequests.vue';

new Vue({
    el: '#app',
    components: { BeerRequests },
});