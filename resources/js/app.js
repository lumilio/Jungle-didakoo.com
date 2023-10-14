/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from "vue";
import VueRouter from "vue-router";
import store from "./store";
import router from "./router";
import App from "./App.vue"
import Echo from 'laravel-echo';
import VueEcho from 'vue-echo';
import VueSocketio from 'vue-socket.io';
window.io = require('socket.io-client');
// const EchoInstance = new Echo({
//     broadcaster: 'socket.io',
//     host: window.location.hostname + ':6001'
// });
// Vue.use(VueEcho, EchoInstance);
Vue.use(VueRouter);

const app = new Vue({
    el: '#app',
    store,
    render: h => h(App),
    router
});

require('./bootstrap');
/* require ('./initial'); */









