import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const router = new VueRouter({
   routes: [
       { path: '/login', component: require('./views/auth/login.vue') },
       { path: '/logout' },
       { path: '/register', component: require('./views/auth/register.vue') }       
   ]
});

export default router