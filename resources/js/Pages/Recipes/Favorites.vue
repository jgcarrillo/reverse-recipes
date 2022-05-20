<template>
    <Head title="Favorites" />
    <h1 class="mb-8 text-3xl font-bold font-lora">Favorites</h1>

    <base-three-grid color="bg-gray-900">
        <base-recipe-card v-for="recipe in data" :key="recipe.id" :recipeId="recipe.id">
            <template #image>
                <img
                    class="lg:h-72 md:h-48 w-full object-cover object-center"
                    :src="recipe.recipe_photo_path"
                    :alt="recipe.name"
                />
            </template>
            <template #type>{{ recipe.type }} • {{ recipe.difficulty }}</template>
            <template #recipe>{{ recipe.name }}</template>
            <template #time>{{ recipe.time }} {{ recipe.time == 1 ? 'minute' : 'minutes' }}</template>

            <template #ing>{{ recipe.ingredient }}</template>
            <template #people>{{ recipe.persons }}</template>

            <template #user-img>
                <div class="bg-cover bg-center w-10 h-10 rounded-full mr-3" :style="{ backgroundImage: 'url(' + user.profile_photo_url + ')' }"></div>
            </template>
            <template #user>{{ user.name }} {{ user.last_name }}</template>
        </base-recipe-card>
    </base-three-grid>

    <h1 class="mb-8 text-3xl text-center font-bold font-lora" v-if="data.length === 0">There are no recipes at the moment</h1>
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
        user: Object,
        data: Object,
    },
    layout: AppLayout,
}
</script>

<style>

</style>
