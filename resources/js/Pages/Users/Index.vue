<script setup>
import {Link, router} from "@inertiajs/vue3";
import {usePage} from "@inertiajs/vue3";
import {computed, ref, watch} from "vue";
import Paginator from "@/Pages/components/Paginator.vue";
import debounce from 'lodash/debounce'

let page = usePage();

const props = defineProps({
    users: Object,
    searched: String
})

const message = computed(() => page.props.flash.success)
const nameUser = computed(() => page.props.auth?.user.name)

const search = ref(props.searched)

watch(search, debounce((value) => {
    router.get('/users', { search: value}, {
        preserveState: true,
        replace: true,
        only: ['users']
    })
}, 500));

</script>

<template>
    <AppHead title="Usuarios" />
    <h2>Usuarios - {{ nameUser ?? 'Convidado'}}</h2>
    <div v-if="message" class="alert alert-success">
        {{ message }}
    </div>

    <div class="row mb-3">
        <div class="col">
            <Link href="/users/create" class="btn btn-sm btn-primary">Novo</Link>
        </div>
        <div class="col">
            <input v-model="search" type="text" class="col-12" placeholder="Pesquisar...">
        </div>
    </div>
    <ul class="list-group">
        <li v-for="user in users.data" :key="user.id" class="d-flex justify-content-between list-group-item">
            <span>{{ user.name}} </span>
                <Link
                    class="btn btn-sm btn-danger"
                    href="/users/delete"
                    method="delete"
                    as="button"
                    :data="{id: user.id}"
                >Deletar</Link>
        </li>
    </ul>
    <hr>
    <Paginator :data="users" />
</template>

<style scoped>

</style>
