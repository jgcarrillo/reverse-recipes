<template>
    <Head title="Recipes" />
    <h1 class="mb-8 text-3xl font-bold font-lora">Recipes</h1>

    <div class="flex items-center justify-between mb-6">
        <search-filter class="mr-4 w-full max-w-md" v-model="form.search" @reset="reset"></search-filter>
        <Link class="font-lora px-4 py-2 rounded text-black bg-yellow-400 hover:bg-yellow-300 transition duration-500 mt-4 md:mt-0" href="/dashboard/recipes/create">
            <span>Create</span>
            <span class="hidden md:inline">&nbsp;Recipe</span>
        </Link>
    </div>

    <h1 class="my-8 text-3xl text-center font-bold font-lora">There are no recipes at the moment</h1>

</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import AppLayout from '@/Shared/AppLayout';
import SearchBar from '@/Shared/SearchBar';
import SearchFilter from '@/Shared/SearchFilter';
import mapValues from 'lodash/mapValues';
import BaseThreeGrid from "@/Shared/BaseThreeGrid";
import BaseRecipeCard from "@/Shared/BaseRecipeCard";

export default {
    components: {
        Head,
        Link,
        SearchBar,
        SearchFilter,
        BaseThreeGrid,
        BaseRecipeCard
    },
    props: {
        users: Object,
        filters: Object,
        recipes: Object,
        user: Object
    },
    data() {
        return {
            form: {
                search: '',
            },
        }
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
