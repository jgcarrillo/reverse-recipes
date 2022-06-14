<template>
    <Head title="My Favorites" />
    <h1 class="mb-8 text-3xl font-bold font-lora">My Favorites</h1>

    <base-three-grid color="bg-gray-900">
        <base-recipe-card-favorites v-for="recipe in data" :key="recipe.id" :recipeId="recipe.id">
            <template #image>
                <img
                    class="lg:h-72 md:h-48 w-full object-cover object-center"
                    :src="recipe.recipe_photo_path"
                    :alt="recipe.name"
                    @load="onLoaded"
                    v-show="loaded"
                />
                <div class="lg:h-72 md:h-48 w-full bg-gray-200 w-full animate-pulse"
                     v-show="loaded === false">
                </div>
            </template>
            <template #type>{{ recipe.type }} • {{ recipe.difficulty }}</template>
            <template #recipe>{{ recipe.name }}</template>
            <template #time>{{ recipe.time }} {{ recipe.time == 1 ? 'minute' : 'minutes' }}</template>

            <template #ing>{{ convertToArray(recipe.ingredients) }} {{ (convertToArray(recipe.ingredients)) == 1 ? 'Ingredient' : 'Ingredients' }}</template>
            <template #people>{{ (recipe.persons) }} {{ (recipe.persons) == 1 ? 'Person' : 'Persons' }}</template>

            <template #user-img>
                <div class="bg-cover bg-center w-10 h-10 rounded-full mr-3" :style="{ backgroundImage: 'url(' + user.profile_photo_url + ')' }"></div>
            </template>
            <template #user>{{ user.name }} {{ user.last_name }}</template>
        </base-recipe-card-favorites>
    </base-three-grid>

    <h1 class="mb-8 text-3xl text-center font-bold font-lora" v-if="data.length === 0">There are no recipes at the moment</h1>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import AppLayout from '@/Shared/AppLayout';
import BaseThreeGrid from "@/Shared/BaseThreeGrid";
import BaseRecipeCardFavorites from "@/Shared/BaseRecipeCardFavorites";

export default {
    components: {
        Head,
        Link,
        BaseThreeGrid,
        BaseRecipeCardFavorites
    },
    props: {
        users: Object,
        filters: Object,
        user: Object,
        data: Object,
    },
    data() {
        return {
            loaded: false,
        }
    },
    methods: {
        convertToArray(ingredients) {
            return ingredients.split(", ").length;
        },
        onLoaded() {
            this.loaded = true;
        },
    },
    layout: AppLayout,
}
</script>

<style>

</style>
