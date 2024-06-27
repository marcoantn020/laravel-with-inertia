<script setup>
import {Link} from "@inertiajs/vue3";

defineProps({
    data: {
        required: true,
        type: Object
    }
})
</script>

<template>
    <ul class="pagination">
        <li class="page-item"
            v-for="link in data.links"
            :key="link.page"
        >
            <template v-if="link.url !== null">
                <Link
                    :href="link.url"
                    v-html="link.label"
                    class="page-link"
                    :class="{'active': link.active}"
                    preserve-scroll
                />
            </template>
        </li>
    </ul>
</template>

<style scoped>

</style>
