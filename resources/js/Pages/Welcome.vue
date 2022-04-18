<template>
    <Head title="Home" />

    <the-navbar></the-navbar>
    <the-jumbo></the-jumbo>
    <the-services></the-services>
    <the-contact></the-contact>
    <the-footer></the-footer>
</template>

<style>
</style>

<script>
import { defineComponent } from 'vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import TheServices from '../Shared/TheServices';
import TheContact from '../Shared/TheContact';
import TheNavbar from "../Shared/TheNavbar"
import TheFooter from "../Shared/TheFooter";
import TheJumbo from "../Shared/TheJumbo";

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
