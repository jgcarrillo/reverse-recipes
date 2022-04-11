<template>
    <Head title="Reverse recipes" />

    <Navbar />
    <Jumbo />
    <Services />
    <Contact />
    <Footer />

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
import Footer from '@/Pages/Footer';

export default defineComponent({
    components: {
        Head,
        Link,
        Navbar,
        Jumbo,
        Services,
        Contact,
        Footer
    },
})
</script>
