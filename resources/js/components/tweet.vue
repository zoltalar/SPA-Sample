<template>
    <div class="row">
        <div class="col-sm-4 offset-4">
            <form>
                <div class="form-group">
                    <textarea class="form-control" rows="4" v-model="content" @keyup="countdown" placeholder="Post a tweet..."></textarea>
                    <div class="invalid-feedback" v-show="error.content !== ''" :class="{ 'd-block': error.content !== '' }">
                        {{ error.content }}
                    </div>
                    <small class="form-text text-muted">{{ remainingCount }}</small>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" @click="tweet()" :disabled="!validated()">Tweet</button>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
    import router from '../router'
    
    export default {
        data() {
            return {
                error: {
                    content: ''
                },
                content: '',
                maxCount: 140,
                remainingCount: 140
            }
        },
        methods: {
            validated() {
                return this.content !== ''
            },
            countdown() {
                let count = this.maxCount - this.content.length
                
                if (count <= 0) {
                    count = 0
                    this.content = this.content.substr(0, this.maxCount)
                }
                
                this.remainingCount = count
            },
            reset() {
                this.error = {
                    content: ''
                }
            },
            tweet() {
                axios
                    .post('/api/tweets/store', {
                        content: this.content
                    })
                    .then(response => {
                        this.reset();

                        if (response.data.error) {
                            for (let property in response.data.error) {
                                if (response.data.error[property][0]) {
                                    this.error[property] = response.data.error[property][0];
                                }
                            }
                        } else {
                            router.push({ name: 'home' })
                        }
                    })
            }
        }
    }
</script>