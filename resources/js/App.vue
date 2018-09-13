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
                        <a href="#" class="nav-link">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <router-link to="/login" class="nav-link">Login</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/register" class="nav-link">Register</router-link>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Tweet</a>
                    </li>
                    <li class="nav-item" v-show="userName() != null">
                        <router-link to="/logout" class="nav-link">Logout</router-link>
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
            userName() {
                return this.storageItem('userName');
            },
            email() {
                return this.storageItem('email');
            },
            storageItem(item) {
                if (window.localStorage) {
                    let storage = window.localStorage;
                    return storage.getItem(item);
                }
                return null;
            }
        }
    }
</script>