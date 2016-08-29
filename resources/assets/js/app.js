var Vue = require('vue');
Vue.use(require('vue-resource'));
Vue.http.headers.common['Authorization'] = 'Bearer 268a3ef2-6c97-11e6-a18e-08002746f3a1';

import BeerRequests from './components/BeerRequests.vue';

new Vue({
    el: '#app',
    components: { BeerRequests },
});