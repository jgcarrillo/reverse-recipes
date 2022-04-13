<template>
    <Head title="About" />

    <the-navbar></the-navbar>

    <div class="text-center text-gray-800 p-5 md:pt-14">
        <h1 class="font-lora text-7xl font-bold mt-0 mb-6">About</h1>
        <h3 class="font-lora text-4xl font-bold mb-8">Know more about the project</h3>
    </div>

    <the-footer></the-footer>
</template>

<script>
import { defineComponent } from 'vue'
import { Head, Link } from '@inertiajs/inertia-vue3';
import TheNavbar from "./TheNavbar";
import TheFooter from "./TheFooter";

export default defineComponent({
    components: {
        Head,
        Link,
        TheNavbar,
        TheFooter
    }
});
</script>

<style></style>
