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

Vue.use(VueRouter);

Pusher.logToConsole = true;
var pusher = new Pusher('d2d5db7fd21bb0f8fd65', {
    cluster: 'mt1'
});
var channel = pusher.subscribe('my-channel');
channel.bind('my-event', function(data) {
    console.log(data,'---------------')
});

const app = new Vue({
    el: '#app',
    store,
    render: h => h(App),
    router
});

require('./bootstrap');
/* require ('./initial'); */









