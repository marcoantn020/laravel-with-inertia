<script setup>
import {Link, usePage} from '@inertiajs/vue3'
import {computed} from "vue";

let page = usePage();
let auth = computed(() => page.props.auth);

</script>

<template>
    <nav class="navbar navbar-expand-lg bg-body-secondary bg-dark">
        <div class="container-fluid">
            <Link class="navbar-brand" href="/">Navbar</Link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <Link class="nav-link active" aria-current="page" href="/">Home</Link>
                    </li>
                    <li class="nav-item">
                        <Link class="nav-link" href="/users">Usuarios</Link>
                    </li>

                    <li class="nav-item">
                        <Link class="nav-link" href="/upload">Upload</Link>
                    </li>
                </ul>
                <div>
                    <span class="mx-3" v-if="auth">
                        Bem vindo, {{ auth.user.name }}
                    </span>
                    <Link href="/logout" v-if="auth" method="post" as="button"> Logout </Link>
                    <Link href="/login" v-else as="button"> Login </Link>
                </div>
            </div>
        </div>
    </nav>
</template>

<style scoped>

</style>
