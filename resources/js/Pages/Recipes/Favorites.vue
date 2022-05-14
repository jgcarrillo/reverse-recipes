<template>
    <Head title="Favorites" />
    <h1 class="mb-8 text-3xl font-bold font-lora">Favorites</h1>

    <base-three-grid color="bg-gray-900">
        <base-recipe-card v-for="recipe in recipes">
            <template #type>{{ recipe.type_id }} • {{ recipe.difficulty_id}}</template>
            <template #recipe>{{ recipe.name }}</template>
            <template #time>{{ recipe.time }} {{ recipe.time == 1 ? 'minute' : 'minutes' }}</template>

            <template #ing>{{ recipe.ingredient_id }}</template>
            <template #people>{{ recipe.persons_id }}</template>

            <template #user>{{ user.name }} {{ user.last_name }}</template>
        </base-recipe-card>
    </base-three-grid>

    <h1 class="mb-8 text-3xl text-center font-bold font-lora" v-if="recipes.length === 0">There are no recipes at the moment</h1>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import AppLayout from '@/Shared/AppLayout';
import SearchBar from '@/Shared/SearchBar';
import SearchFilter from '@/Shared/SearchFilter';
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
        user: Object,
        difficulty: Object,
        type: Object,
        persons: Object,
    },
    layout: AppLayout,
}
</script>

<style>

</style>
