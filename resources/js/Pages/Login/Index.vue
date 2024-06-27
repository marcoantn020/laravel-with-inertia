<script setup>

import { useForm } from '@inertiajs/vue3'

const form = useForm({
    email: 'marco@mail.com',
    password: 'password',
});

const onSubmit = () => {
    form.post('/login', {
        onFinish: () => {
            setTimeout(() => {
                form.clearErrors();
            }, 3000)
        },
        preserveScroll: true
    })
}

</script>

<template>
    <AppHead title="Login" />
    <template v-if="$page.props.auth">
        <div class="alert alert-success mt-3">
            Voce esta ja logado
        </div>
    </template>
    <template v-else>
        <div class="container">
            <div class="row justify-content-center align-items-center my-5">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="h3 text-center">Login</h1>
                        </div>

                        <div class="card-body">

                            <form @submit.prevent="onSubmit" novalidate class="needs-validation">

                                <div class="form-group mb-3">
                                    <label for="email">Email:</label>
                                    <input type="email" v-model="form.email" id="email"
                                           class="form-control"
                                           :class="{'is-invalid': form.errors.email}">
                                    <div class="text-danger" v-if="form.errors.email">{{ form.errors.email}}</div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Senha:</label>
                                    <input type="password" v-model="form.password" id="password"
                                           class="form-control"
                                           :class="{'is-invalid': form.errors.password}">
                                    <div class="text-danger" v-if="form.errors.password">{{ form.errors.password}}</div>
                                </div>

                                <div class="form-group mt-2">
                                    <button :disabled="form.processing" type="submit" class="btn btn-primary col-12">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>
</template>

<style scoped>

</style>
