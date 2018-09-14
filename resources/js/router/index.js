import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

// Router
let router = new VueRouter({
    routes: [
        {
            path: '/home',
            name: 'home',
            component: require('../components/home'),
            meta: { auth: true }
        },
        { 
            path: '/login',
            name: 'login',
            component: require('../components/login'),
            meta: { auth: false }
        },
        { 
            path: '/register',
            name: 'register',
            component: require('../components/register'),
            meta: { auth: false }
        }
    ]
})

export default router