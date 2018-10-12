import router from '../../router'

export default {
    state: {
       isLoggedIn: false
    },
    mutations: {        
        login(state) {
            state.isLoggedIn = true
        },
        logout(state) {
            state.isLoggedIn = false
        }
    },
    getters: {
        isLoggedIn: state => state.isLoggedIn
    },
    actions: {
        login({ commit }, data) {
            commit('login')           
            window.localStorage.setItem('accessToken', data.access_token)     
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + data.access_token
            
            router.push({ name: 'home' })
        },
        
        logout({ commit }) {
            commit('logout')
            window.localStorage.removeItem('accessToken')
            delete axios.defaults.headers.common['Authorization']
            
            router.push({ name: 'home' })
        }
    }
}