<script setup>
import NavBar from "@/Pages/components/NavBar.vue";

</script>

<template>
    <main>
        <header>
            <NavBar />
        </header>
        <article>
            <div class="container">
                <slot />
            </div>
        </article>
    </main>
</template>

<style scoped>

</style>
