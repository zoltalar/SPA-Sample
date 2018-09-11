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
                </ul>
            </div>
        </nav>
        <router-view></router-view>
    </div>
</template>