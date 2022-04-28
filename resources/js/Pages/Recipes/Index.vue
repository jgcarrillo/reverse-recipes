<template>
    <Head title="Recipes" />
    <h1 class="mb-8 text-3xl font-bold font-lora">Recipes</h1>

    <div class="flex items-center justify-between mb-6">
        <search-filter class="mr-4 w-full max-w-md"></search-filter>
        <Link class="font-lora px-4 py-2 rounded text-black bg-yellow-400 hover:bg-yellow-300 transition duration-500 mt-4 md:mt-0" href="">
            <span>Create</span>
            <span class="hidden md:inline">&nbsp;Recipe</span>
        </Link>
    </div>

</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import AppLayout from '@/Shared/AppLayout';
import SearchBar from '@/Shared/SearchBar';
import SearchFilter from '../../Shared/SearchFilter';
import mapValues from 'lodash/mapValues';

export default {
    components: {
        Head,
        Link,
        SearchBar,
        SearchFilter
    },
    props: {
        users: Object,
        filters: Object,
    },
    methods: {
        reset() {
            this.form = mapValues(this.form, () => null)
        },
    },
    layout: AppLayout,
}
</script>

<style>

</style>
