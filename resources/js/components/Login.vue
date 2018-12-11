<template>
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="card card-shadowed p-50 w-400 mb-0" style="max-width: 100%">

                <h5 class="text-uppercase text-center">Sign into your account</h5>

                <form>

                    <ul class="list-group alert alert-danger" v-if="errors.length > 0">
                       <li class="list-group-item" v-for="error in errors"> {{ error }} </li>
                    </ul>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Email" v-model="email">
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password"
                               v-model="password">
                    </div>

                    <div class="form-group flexbox py-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" checked="" v-model="remember">
                            <label class="custom-control-label">Remember me</label>
                        </div>

                        <a class="text-muted small-2" href="">Forgot password?</a>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-block btn-primary" @click="attemptLogin()" :disabled="!isValidLoginForm"
                                type="button">Login
                        </button>
                    </div>

                    <p class="text-center text-muted small-2">Don't have an account? <a href="">Register here</a>
                    </p>
                </form>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                email: '',
                password: '',
                remember: true,
                loading: false,
                errors: []
            }
        },
        mounted() {
            console.log('Component mounted.')
        },

        methods: {
            attemptLogin() {
                this.errors = [];
                this.loading = true;
                axios.post('/login', {
                    email: this.email,
                    password: this.password,
                    remember: this.remember,
                })
                    .then(response => {
                        console.log(response);
                        location.reload();
                    })
                    .catch(error => {
                        this.loading = false;
                        console.log(error);
                        if (error.response.status === 422) {
                            this.errors.push("We couldn't verify your account details.")
                        }
                        else {
                            this.errors.push("Something went wrong please refresh , and try again.")
                        }
                    })
            },

            emailIsValid()
            {
                if (/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(this.email)) {
                    return true;
                }
                else {
                    return false;
                }
            }
        },

        computed: {
            isValidLoginForm() {
                return this.emailIsValid() && this.password && !this.loading;
            }
        }
    }
</script>
