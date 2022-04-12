<template>
    <Head title="Reverse recipes" />

    <the-navbar></the-navbar>
    <the-jumbo></the-jumbo>
    <the-services></the-services>
    <the-contact></the-contact>
    <the-footer></the-footer>
</template>

<style>
</style>

<script>
import { defineComponent } from 'vue'
import { Head, Link } from '@inertiajs/inertia-vue3';
import TheNavbar from '@/Pages/TheNavbar';
import TheJumbo from '@/Pages/TheJumbo';
import TheServices from '@/Pages/TheServices';
import TheContact from '@/Pages/TheContact';
import TheFooter from '@/Pages/TheFooter';

export default defineComponent({
    components: {
        Head,
        Link,
        TheNavbar,
        TheJumbo,
        TheServices,
        TheContact,
        TheFooter
    },
})
</script>
