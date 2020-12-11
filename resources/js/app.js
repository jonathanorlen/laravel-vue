import Axios from 'axios';
import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './router'

try {
     window.Popper = require('popper.js').default;
     window.$ = window.jQuery = require('jquery');
 
     require('bootstrap');
 } catch (e) {}

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

Vue.use(VueRouter);
Vue.component('Navigation', require('./components/Navigation.vue').default);

const app = new Vue({
    el: '#orlen',
    router: new VueRouter(routes)
});
