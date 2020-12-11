
require('./bootstrap');

window.Vue = require('vue');

Vue.component('Navigation', require('./components/Navigation.vue').default);

const app = new Vue({
    el: '#orlen',
});
