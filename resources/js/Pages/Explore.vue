<template>
    <Head title="Explore" />

    <the-navbar></the-navbar>
    <h1>Example</h1>

    <the-footer></the-footer>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import TheNavbar from "./TheNavbar";
import TheFooter from "./TheFooter";

export default {
    components: {
        Head,
        Link,
        TheNavbar,
        TheFooter
    }
}
</script>

<style></style>
