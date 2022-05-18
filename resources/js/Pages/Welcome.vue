<template>
    <Head title="Home" />

    <layout>
        <template #default>
            <the-jumbo></the-jumbo>
            <the-services></the-services>
            <div class="bg-white">
                <the-contact></the-contact>
            </div>
        </template>
    </layout>
</template>

<style>
</style>

<script>
import { defineComponent } from 'vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import TheServices from '@/Shared/TheServices';
import TheContact from '@/Shared/TheContact';
import TheJumbo from "@/Shared/TheJumbo";
import Layout from "@/Shared/Layout";

export default defineComponent({
    components: {
        Head,
        Link,
        TheJumbo,
        TheServices,
        TheContact,
        Layout
    },
})
</script>
