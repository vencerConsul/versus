require('./bootstrap');

window.Vue = require('vue');
import Router from "./routes.js";

Vue.component('timeline-view', require('./components/Timeline.vue').default);

const app = new Vue({
    el: "#app",
    router: Router
});
