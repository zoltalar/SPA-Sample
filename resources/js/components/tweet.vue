<template>
    <div class="row">
        <div class="col-sm-4 offset-4">
            <form>
                <div class="form-group">
                    <textarea class="form-control" rows="4" v-model="content" @keyup="countdown" placeholder="Post a tweet..."></textarea>
                    <div class="invalid-feedback" v-show="errors.content !== ''" :class="{ 'd-block': errors.content !== '' }">
                        {{ errors.content }}
                    </div>
                    <small class="form-text text-muted">{{ remainingCount }}</small>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-primary btn-block" @click="tweet()" :disabled="!validated()">Tweet</button>
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
                errors: {
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
            tweet() {
                axios
                    .post('/api/tweets/store', {
                        content: this.content
                    })
                    .then(response => {
                        this.clearErrors()
                        this.setErrors(response)

                        if (response.data.data.id) {
                            router.push({ name: 'home' })
                        }
                    })
                    .catch(error => {
                        this.clearErrors()
                        this.setErrors(error.response)
                    })
            },
            clearErrors() {
                this.errors = {
                    content: ''
                }
            },
            setErrors(response) {
                if (response.data.errors) {
                    for (let property in response.data.errors) {
                        if (response.data.errors[property][0]) {
                            this.errors[property] = response.data.errors[property][0]
                        }
                    }
                }
            }
        }
    }
</script>