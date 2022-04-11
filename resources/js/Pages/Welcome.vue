<template>
    <Head title="Welcome" />

    <Navbar />
    <Jumbo />
    <Services />
    <Contact />

</template>

<style>
</style>

<script>
import { defineComponent } from 'vue'
import { Head, Link } from '@inertiajs/inertia-vue3';
import Navbar from '@/Pages/Navbar';
import Jumbo from '@/Pages/Jumbo';
import Services from '@/Pages/Services';
import Contact from '@/Pages/Contact';

export default defineComponent({
    components: {
        Head,
        Link,
        Navbar,
        Jumbo,
        Services,
        Contact
    },
})
</script>
