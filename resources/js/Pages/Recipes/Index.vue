<template>
    <Head title="Recipes" />
    <h1 class="mb-8 text-3xl font-bold font-lora">Recipes</h1>

    <!-- If you want to search for recipe name just simple change form.ingredient to form.search -->
    <div class="flex items-center justify-between mb-6">
        <search-filter v-model="form.ingredient" @reset="reset" class="mr-4 w-full max-w-md">
            <label class="block text-gray-700">Type:</label>
            <select v-model="form.type" class="form-select mt-1 w-full">
                <option :value="null" />
                <option v-for="type in types" :key="type.id" :value="type.id">{{ type.type }}</option>
            </select>
            <label class="block text-gray-700">Time:</label>
            <select v-model="form.time" class="form-select mt-1 w-full">
                <option :value="null" />
                <option v-for="time in times" :key="time.id" :value="time.id">{{ time.time }} minutes</option>
            </select>
        </search-filter>
        <Link class="font-lora px-4 py-2 rounded text-black bg-yellow-400 hover:bg-yellow-300 transition duration-500 mt-4 md:mt-0" href="/dashboard/recipes/create">
            <span>Create</span>
            <span class="hidden md:inline">&nbsp;Recipe</span>
        </Link>
    </div>

    <!-- TABLE -->
    <div class="bg-slate-800 rounded-md shadow overflow-x-auto">
        <table class="w-full whitespace-nowrap">
            <tr class="text-left text-xl font-lora">
                <th class="pb-4 pt-6 px-6">Recipe</th>
                <th class="pb-4 pt-6 px-6">Time</th>
                <th class="pb-4 pt-6 px-6">Difficulty</th>
                <th class="pb-4 pt-6 px-6">Persons</th>
                <th class="pb-4 pt-6 px-6" colspan="2">Type</th>
            </tr>
            <tr v-for="recipe in recipes.data" :key="recipe.id" class="hover:bg-slate-600 focus-within:bg-gray-100 font-monse">
                <td class="border-t border-gray-900">
                    <Link class="flex items-center px-6 py-4">
                        <img v-if="recipe.photo" alt="recipe photo" class="block -my-2 mr-2 w-5 h-5 rounded-full" :src="recipe.photo" />
                        {{ recipe.name }}
                    </Link>
                </td>
                <td class="border-t border-gray-900">
                    <Link class="flex items-center px-6 py-4" tabindex="-1">
                        {{ recipe.time }} {{ (recipe.time == 1 ? 'minute' : 'minutes') }}
                    </Link>
                </td>
                <td class="border-t border-gray-900">
                    <Link class="flex items-center px-6 py-4" tabindex="-1">
                        {{ recipe.difficulty }}
                    </Link>
                </td>
                <td class="border-t border-gray-900">
                    <Link class="flex items-center px-6 py-4" tabindex="-1">
                        {{ recipe.persons }} {{ (recipe.persons == 1 ? 'person' : 'persons') }}
                    </Link>
                </td>
                <td class="border-t border-gray-900">
                    <Link class="flex items-center px-6 py-4" :href="`/dashboard/recipes/${recipe.id}/edit`" tabindex="-1">
                        {{ recipe.type }}
                    </Link>
                </td>
                <td class="w-px border-t border-gray-900">
                    <Link class="flex items-center px-4" tabindex="-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </Link>
                </td>
            </tr>
            <tr v-if="recipes.data.length === 0" class="font-monse">
                <td class="px-6 py-4 border-t" colspan="5">No recipes found.</td>
            </tr>
        </table>
    </div>

    <pagination class="mt-6" :links="recipes.links"></pagination>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import AppLayout from '@/Shared/AppLayout';
import SearchBar from '@/Shared/SearchBar';
import SearchFilter from '@/Shared/SearchFilter';
import mapValues from 'lodash/mapValues';
import BaseThreeGrid from "@/Shared/BaseThreeGrid";
import BaseRecipeCard from "@/Shared/BaseRecipeCard";
import throttle from 'lodash/throttle';
import pickBy from 'lodash/pickBy';
import Pagination from '@/Shared/Pagination';

export default {
    components: {
        Head,
        Link,
        SearchBar,
        SearchFilter,
        BaseThreeGrid,
        BaseRecipeCard,
        Pagination
    },
    props: {
        filters: Object,
        recipes: Object,
        types: Object,
        times: Object,
    },
    data() {
        return {
            form: {
                search: this.filters.search,
                type: this.filters.type,
                time: '',
                ingredient: this.filters.ingredient
            },
        }
    },
    methods: {
        reset() {
            this.form = mapValues(this.form, () => null)
        },
    },
    watch: {
        form: {
            deep: true,
            handler: throttle(function () {
                this.$inertia.get('/dashboard/recipes', pickBy(this.form), { preserveState: true })
            }, 150),
        },
    },
    layout: AppLayout,
}
</script>

<style>

</style>
