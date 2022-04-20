<template>
    <div class="font-monse text-indigo-300">
        <div class="mb-4">
            <Link class="group flex items-center py-3 hover:text-white" :class="isDashboard" :href="route('dashboard')">
                Dashboard
            </Link>
        </div>
        <div class="mb-4">
            <Link class="group flex items-center py-3 hover:text-white" :href="route('recipes')" :class="isRecipes">
                Recipes
            </Link>
        </div>
        <div class="mb-4">
            <Link class="group flex items-center py-3 hover:text-white" :href="route('favorites')" :class="isFavorite">
                Favorites
            </Link>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Link,
    },
    methods: {
        isUrl(...urls) {
            let currentUrl = this.$page.url.substr(1)
            if (urls[0] === '') {
                return currentUrl === ''
            }
            return urls.filter((url) => currentUrl.startsWith(url)).length
        },
    },
    computed: {
        isDashboard() {
            return { 'text-white': this.$page.url === '/dashboard' }
        },
        isRecipes(){
            return { 'text-white': this.$page.url === '/dashboard/recipes' }
        },
        isFavorite(){
            return { 'text-white': this.$page.url === '/dashboard/favorites' }
        },
    }
}
</script>
