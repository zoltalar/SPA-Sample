export default {
    state: {
       user: null,
       isLoggedIn: false
    },
    mutations: {
        setUser(state, user) {
            state.user = user
        },
        login(state, data) {
            state.isLoggedIn = true
            
            let storage = window.localStorage
            
            storage.setItem('accessToken', data.access_token)
            storage.setItem('userId', data.user.id)
            
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + data.access_token
        },
        logout(state) {
            state.user = null
            state.isLoggedIn = false
            
            let storage = window.localStorage
            
            storage.removeItem('accessToken')
            storage.removeItem('userId')
            
            delete axios.defaults.headers.common['Authorization']
        }
    },
    actions: {        
        login ({ commit, dispatch }, data) {
            commit('login', data)
            commit('setUser', data.user)
        }
    }
}