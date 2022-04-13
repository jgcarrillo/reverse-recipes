<template>
    <Head title="Explore" />

    <the-navbar></the-navbar>

    <div class="text-center text-gray-800 p-5 md:pt-14">
        <h1 class="font-lora text-7xl font-bold mt-0 mb-6">Explore</h1>
        <h3 class="font-lora text-4xl font-bold mb-8">Type something and press <span class="italic">Enter</span></h3>
    </div>

    <!-- Search -->
    <div class="flex text-sm md:text-base mx-10 md:mx-36 my-5 font-monse">
        <div class="relative bg-gray-300 p-2 rounded-full border w-full">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 absolute left-0 ml-2"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
            >
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            <input
                v-model="text"
                class="ml-8 placeholder-gray-500 font-bold bg-transparent w-full focus:outline-none"
                type="text"
                placeholder="Food, drinks, recipes, etc."
            />
            <button class="absolute right-0 top-2 mr-4 text-gray-500 focus:outline-none" @click="clear">Clear</button>
        </div>
    </div>
    <!-- Search -->

    <the-footer></the-footer>
</template>

<script>
import { defineComponent } from 'vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import TheNavbar from "./TheNavbar";
import TheFooter from "./TheFooter";

export default defineComponent({
    components: {
        Head,
        Link,
        TheNavbar,
        TheFooter
    },
    data() {
        return {
            text: null,
        };
    },
    methods: {
        clear() {
            this.text = '';
        },
    },
});
</script>

<style></style>
