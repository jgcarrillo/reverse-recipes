<template>
    <div class="text-center text-gray-800 bg-gray-50 p-10 md:py-14">
        <h1 class="font-lora text-7xl font-bold mt-0 mb-6">Recipes</h1>
        <h3 class="font-lora text-4xl font-bold mb-8">Explore among more than a thousand recipes and get the one you want</h3>
        <Link
            :href="route('explore')"
            class="inline-block px-6 py-2.5 bg-yellow-400 hover:bg-yellow-300 font-bold uppercase rounded shadow-md hover:shadow-lg active:shadow-lg transition duration-500"
        >Explore</Link
        >
    </div>
</template>

<script>
import { defineComponent } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

export default defineComponent({
    components: { Link }
});
</script>

<style></style>

