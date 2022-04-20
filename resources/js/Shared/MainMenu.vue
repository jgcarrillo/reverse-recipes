<template>
    <div class="font-monse">
        <div class="mb-4">
            <Link class="group flex items-center py-3" :href="route('dashboard')">
                <div :class="isUrl('') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Dashboard</div>
            </Link>
        </div>
        <div class="mb-4">
            <Link class="group flex items-center py-3" href="">
                <div :class="isUrl('organizations') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Recipes</div>
            </Link>
        </div>
        <div class="mb-4">
            <Link class="group flex items-center py-3" href="">
                <div :class="isUrl('contacts') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Favorites</div>
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
}
</script>
