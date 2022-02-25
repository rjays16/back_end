require('./bootstrap');
import Vue from 'vue';
window.Vue = require('vue');

Vue.component('HelloWorld', require('../../../frontend/src/components/HelloWorld.vue').default);

const app = new Vue({
    el: '#app',
});
