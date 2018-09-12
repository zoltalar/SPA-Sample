<template>
    <div class="row">
        <div class="col-sm-4 offset-sm-4">
            <form>
                <h3 class="mb-3">Login</h3>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="E-mail Address" maxlength="191" v-model="email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" maxlength="40" v-model="password">
                </div>
                <div>
                    <button type="submit" class="btn btn-lg btn-primary btn-block" @click="login()" :disabled="!enabled()">Login</button>
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
                email: '',
                password: ''
            }
        },
        methods: {
            login() {
                axios
                    .post('/api/auth/login', {
                        email: this.email,
                        password: this.password
                    })
                    .then(response => {
                        console.log(response.data);
                        alert('test');
                    })
            },
            enabled() {
                return this.email !== '' && this.password !== '';
            }
        }
    }
</script>