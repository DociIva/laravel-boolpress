/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

/**
 * FORNT OFFICE
 */

window.Vue = require('vue');
//registra xios come parte prototipata di wi
window.axios = require('axios');

// Instanziare Vue.js

//Init Vue main instance
import App from './App.vue';

const root = new Vue({
    el:'#root',
    render: h => h(App)
});