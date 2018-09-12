import Vue from 'vue'
import App from './App.vue'
import router from './router'

window.axios = require('axios')

const app = new Vue({
    el: '#root',
    components: { App },
    template: '<app></app>',
    router
})