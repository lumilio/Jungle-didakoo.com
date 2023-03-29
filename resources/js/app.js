/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from "vue";
import VueRouter from "vue-router";
import store from "./store";
import router from "./router";
import {createApp} from 'vue';

Vue.use(VueRouter);

// window.Vue = require('vue');

Vue.component('board-game', require('./components/BoardGame.vue').default);
Vue.component('menu-page', require('./components/MenuPage.vue').default);
Vue.component('rank-page', require('./components/RankPage.vue').default);
Vue.component('avatar-page', require('./components/AvatarPage.vue').default);
Vue.component('info-page', require('./components/InfoPage.vue').default);

const app = new Vue({
    el: '#app',
    store,
    router  
});

require('./bootstrap');
/* require ('./initial'); */
require('./fakerouting');









