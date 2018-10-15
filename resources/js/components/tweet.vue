<template>
    <div class="row">
        <div class="col-sm-4 offset-4">
            <form>
                <div class="form-group">
                    <textarea class="form-control" rows="4" v-model="tweet" @keyup="countdown"></textarea>
                    <small class="form-text text-muted">{{ remainingCount }}</small>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" :disabled="!validated()">Tweet</button>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                error: false,
                tweet: '',
                maxCount: 140,
                remainingCount: 140
            }
        },
        methods: {
            validated() {
                return this.tweet !== ''
            },
            countdown() {
                let count = this.maxCount - this.tweet.length
                
                if (count <= 0) {
                    count = 0
                    this.tweet = this.tweet.substr(0, this.maxCount)
                }
                
                this.remainingCount = count
            }
        }
    }
</script>