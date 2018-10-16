import Vue from 'vue'
import App from './components/App'
import router from './router'
import store from './store'
import Echo from 'laravel-echo'

window.axios = require('axios')
window.Pusher = require('pusher-js')

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '8da364a9b6da90013c97'
});

const app = new Vue({
    el: '#root',
    router,
    store,
    template: '<app></app>',
    components: { App }
})