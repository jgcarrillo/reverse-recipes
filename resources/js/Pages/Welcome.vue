<template>
    <Head title="Welcome" />

    <Navbar />

</template>

<style>
</style>

<script>
import { defineComponent } from 'vue'
import { Head, Link } from '@inertiajs/inertia-vue3';
import Navbar from "@/Pages/Navbar";

export default defineComponent({
    components: {
        Head,
        Link,
        Navbar,
    },
})
</script>
