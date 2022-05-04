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

    <base-three-grid color="bg-gray-900">
        <base-recipe-card v-for="recipe in recipes">
            <template #type>{{ recipe.type }} • {{ recipe.difficulty }}</template>
            <template #recipe>{{ recipe.name }}</template>
            <template #time>{{ recipe.time }} {{ recipe.time == 1 ? 'minute' : 'minutes' }}</template>

            <template #ing>{{ recipe.ingredient_id }}</template>
            <template #people>{{ recipe.persons }}</template>

            <template #user>{{ user.name }} {{ user.last_name }}</template>
        </base-recipe-card>
    </base-three-grid>

    <h1 v-if="recipes.length === 0">No hay recetas</h1>

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
