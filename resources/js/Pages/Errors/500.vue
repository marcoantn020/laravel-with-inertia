<script setup>
import {Link} from "@inertiajs/vue3";

</script>

<template>
    <AppHead title="Page not Found" />
    <div class="page-wrap d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <span class="display-1 d-block">500</span>
                    <div class="mb-4 lead">Erro no servidor.</div>
                    <Link href="/" class="btn btn-link">Voltar para Home</Link>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
