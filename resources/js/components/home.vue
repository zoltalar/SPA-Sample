<template>
    <div>
        <div class="text-center" v-if="loggedIn() === false">
            <p>Please <router-link :to="{ name: 'login' }">login</router-link> to view latest tweets.</p>
        </div>    
        <div class="row" v-if="loggedIn() === true">
            <div class="col-4 offset-4">
                <div class="card mb-4" v-for="tweet in tweets">
                    <div class="card-header">
                        {{ tweet.created_at }}
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>{{ tweet.content }}</p>
                            <footer class="blockquote-footer">{{ tweet.user.name }}</footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</template>
<script>
    export default {
        data() {
            return {
                tweets: []
            }
        },
        methods: {
            load() {
                axios
                    .get('/api/tweets/index')
                    .then(response => {
                        this.tweets = response.data.data
                    })
            },
            listen() {
                Echo
                    .channel('tweets')
                    .listen('NewTweet', (e) => {
                        this.tweets.push(e.tweet)
                    })
            },
            loggedIn() {
                return this.$store.getters.loggedIn
            }
        },
        mounted() {
            if (this.loggedIn() === true) {
                this.load()
                this.listen()
            }
        }
    }
</script>