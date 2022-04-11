<template>
    <Head title="Welcome" />

    <Navbar />
    <Jumbo />

</template>

<style>
</style>

<script>
import { defineComponent } from 'vue'
import { Head, Link } from '@inertiajs/inertia-vue3';
import Navbar from "@/Pages/Navbar";
import Jumbo from '@/Pages/Jumbo';

export default defineComponent({
    components: {
        Head,
        Link,
        Navbar,
        Jumbo
    },
})
</script>
