/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from "vue";
import VueRouter from "vue-router";
import store from "./store";
import router from "./router";
import App from "./App.vue";
import Echo from "laravel-echo";
Vue.use(VueRouter);

window.Pusher = require('pusher-js');
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '88dfab940f882d473671',
    cluster: 'mt1',
    encrypted: true,
});
// Echo.channel('my-channel').listen('my-event', e => {
//     console.log(e)
// })
const app = new Vue({
    el: '#app',
    store,
    render: h => h(App),
    router
});

require('./bootstrap');
/* require ('./initial'); */









