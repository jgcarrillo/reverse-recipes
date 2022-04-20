<template>
    <div class="font-monse text-indigo-300">
        <div class="mb-4">
            <Link class="group flex items-center py-3 hover:text-white" :class="isDashboard" :href="route('dashboard')">
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                </svg>
                Dashboard
            </Link>
        </div>
        <div class="mb-4">
            <Link class="group flex items-center py-3 hover:text-white" :href="route('recipes')" :class="isRecipes">
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                </svg>
                Recipes
            </Link>
        </div>
        <div class="mb-4">
            <Link class="group flex items-center py-3 hover:text-white" :href="route('favorites')" :class="isFavorite">
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                </svg>
                Favorites
            </Link>
        </div>
        <div class="mb-4">
            <Link class="group flex items-center py-3 hover:text-white" :href="route('profile.show')" :class="isProfile">
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                My profile
            </Link>
        </div>
        <div class="mb-4">
            <Link class="group flex items-center py-3 hover:text-white" :href="route('users')" :class="isUsers">
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                Users
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
        isProfile(){
            return { 'text-white': this.$page.url === '/user/profile' }
        },
        isUsers(){
            return { 'text-white': this.$page.url === '/dashboard/admin/users' }
        },
    }
}
</script>
