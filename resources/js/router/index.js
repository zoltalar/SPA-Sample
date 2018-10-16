import Vue from 'vue'
import VueRouter from 'vue-router'
import store from '../store'

Vue.use(VueRouter)

// Router
let router = new VueRouter({
    routes: [
        {
            path: '/home',
            name: 'home',
            component: require('../components/home'),
            meta: { auth: false }
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
        },
        {
            path: '/tweet',
            name: 'tweet',
            component: require('../components/tweet'),
            meta: { auth: true }
        }
    ]
})

router.beforeEach((to, from, next) => {
    if (store.getters.loggedIn === false && to.meta.auth) {
        return next('/login')
    }
    
    next()
})

export default router