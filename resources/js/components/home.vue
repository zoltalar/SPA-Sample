<template>
    <div class="row">
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
            }
        },
        created() {
            this.load()
        }
    }
</script>