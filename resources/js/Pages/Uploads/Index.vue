<script setup>
import { useForm } from '@inertiajs/vue3'
import {ref} from "vue";

const preview = ref('');

defineProps({
    flash: Object
})
const load = (event) => {
    form.avatar = event.target.files[0];
    preview.value = URL.createObjectURL(form.avatar);
}

const form = useForm({
    avatar: null
})

function submit() {
    form.post('/upload', {
        onFinish: () => {
            setTimeout(function () {
                form.clearErrors();
            }, 3000)
        },
        onSuccess: () => {
            form.reset();
        }
    });
}
</script>

<template>

    <h1 class="h2 my-4">Upload</h1>

    <p class="text-danger" v-if="form.errors.avatar"> {{ form.errors.avatar }}</p>
    <p class="text-success" v-if="flash.success"> {{ flash.success }}</p>

    <template v-if="preview">
        <img :src="preview" alt="preview" class="w-25 img-thumbnail mb-3">
    </template>

    <form @submit.prevent="submit">
        <div>
            <input type="file" @input="load" />
            <button class="btn btn-info" type="submit">Submit</button>
        </div>
        <progress v-if="form.progress" :value="form.progress.percentage" max="100">
            {{ form.progress.percentage }}%
        </progress>
    </form>
</template>

<style scoped>

</style>
