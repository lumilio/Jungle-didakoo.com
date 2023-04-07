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
import {createApp} from 'vue';

Vue.use(VueRouter);



const app = new Vue({
    el: '#app',
    store,
    render: h => h(App),
    router
});

require('./bootstrap');
/* require ('./initial'); */
require('./fakerouting');









