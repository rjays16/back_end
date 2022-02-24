require('./bootstrap');

window.Vue = require('vue');

Vue.component('HelloWorld', require('../../../frontend/src/components/HelloWorld.vue').default);
