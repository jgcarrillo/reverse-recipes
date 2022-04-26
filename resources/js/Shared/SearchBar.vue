<template>
    <div class="flex text-sm md:text-base mx-10 md:mx-36 mt-5 mb-9 font-monse">
        <div class="relative bg-slate-800 p-2 rounded-full w-full">
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
                class="ml-8 placeholder-text-white font-bold bg-transparent w-full focus:outline-none"
                type="text"
                placeholder="Food, drinks, recipes, etc."
            />
            <button class="absolute right-0 top-2 mr-4 text-white focus:outline-none" @click="clear">Clear</button>
        </div>
    </div>
</template>

<script>
import { defineComponent } from 'vue';

export default defineComponent({
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

<style>

</style>
