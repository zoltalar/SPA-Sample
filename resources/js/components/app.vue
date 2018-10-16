<template>
    <div id="root">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Twitter</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-primary">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-primary">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <router-link :to="{ name: 'home' }" class="nav-link">Home</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{ name: 'tweet' }" class="nav-link">Tweet</router-link>
                    </li>
                    <li class="nav-item" v-show="loggedIn() === false">
                        <router-link :to="{ name: 'register' }" class="nav-link">Register</router-link>
                    </li>
                    <li class="nav-item" v-show="loggedIn() === false">
                        <router-link :to="{ name: 'login' }" class="nav-link">Login</router-link>
                    </li>
                    <li class="nav-item" v-show="loggedIn() === true">
                        <a href="#" class="nav-link" @click="logout">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="pt-5">
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
    export default {
        methods: {
            logout() {
                this.$store.dispatch('logout')
            },
            loggedIn() {
                return this.$store.getters.loggedIn
            }
        }
    }
</script>