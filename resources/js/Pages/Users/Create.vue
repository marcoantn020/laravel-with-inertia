<script setup>
import {useForm} from "@inertiajs/vue3";

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: ''
});


const onsubmit = () => {
    form.post('/users', {
        onFinish: () => {
            setTimeout(() => {
                form.clearErrors();
            }, 3000)
        },
        preserveScroll: true
    });
}
</script>

<template>
    <AppHead title="Criar Usuario"/>


    <div class="card p-4">
        <div class="card-title">
            Criar novo usuario
        </div>
        <div class="card-body">
            <form @submit.prevent="onsubmit">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nome </label>
                    <input v-model="form.name" type="text" class="form-control" id="exampleFormControlInput1"
                           placeholder="Marco">
                    <div v-if="form.errors.name" class="text-danger"> {{ form.errors.name }}</div>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email </label>
                    <input v-model="form.email" type="email" class="form-control" id="exampleFormControlInput1"
                           placeholder="name@example.com">
                    <div v-if="form.errors.email" class="text-danger"> {{ form.errors.email }}</div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Senha </label>
                            <input v-model="form.password" type="text" class="form-control"
                                   id="exampleFormControlInput1" placeholder="******">
                            <div v-if="form.errors.password" class="text-danger"> {{ form.errors.password }}</div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Confirmar Senha </label>
                            <input v-model="form.password_confirmation" type="text" class="form-control"
                                   id="exampleFormControlInput1" placeholder="******">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <button :disabled="form.processing" class="btn btn-success" type="submit">Enviar</button>
                </div>
            </form>
        </div>
    </div>

</template>

<style scoped>

</style>
