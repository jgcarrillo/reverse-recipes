<template>
    <Head title="Recipes" />
    <h1 class="mb-8 text-3xl font-bold font-lora">Recipes</h1>

    <search-bar></search-bar>

</template>

<script>
import { Head } from '@inertiajs/inertia-vue3';
import AppLayout from '@/Shared/AppLayout';
import SearchBar from '../../Shared/SearchBar';

export default {
    components: {
        Head,
        SearchBar
    },
    layout: AppLayout,
}
</script>

<style>

</style>
