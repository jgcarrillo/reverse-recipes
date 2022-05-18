<template>
    <div class="max-w-3xl mx-auto py-10 bg-white">
        <div class="flex flex-col md:flex-row px-2 md:px-0">
            <div
                class="w-full md:w-1/3 bg-white rounded-lg shadow hover:shadow-xl transition duration-500 ease-in-out p-6 md:mr-4 mb-10 md:mb-0"
            >
                <h3 class="text-gray-800 text-lg font-monse">Base</h3>
                <p class="text-gray-800 mt-1 font-lora"><span class="font-bold text-black text-4xl">$5</span> /Month</p>
                <p class="text-sm text-gray-800 mt-2 font-monse">For food enthusiasts who want to start cooking and enjoy the food.</p>
                <div class="text-sm text-gray-800 mt-4 font-monse">
                    <p class="my-2"><span class="fa fa-check-circle mr-2 ml-1"></span> All RR's catalog</p>
                    <p class="my-2"><span class="fa fa-check-circle mr-2 ml-1"></span> Up to 10 favorite recipes</p>
                    <p class="my-2"><span class="fa fa-check-circle mr-2 ml-1"></span> Private hashtags</p>
                    <p class="my-2"><span class="fa fa-check-circle mr-2 ml-1"></span> 10 queries per month</p>
                </div>
                <button
                    class="w-full font-monse border border-yellow-300 rounded hover:bg-yellow-300 hover:shadow-xl transition duration-500 ease-in-out py-4 mt-4"
                >
                    Choose Plan
                </button>
            </div>
            <div
                class="w-full md:w-1/3 bg-yellow-400 rounded-lg shadow hover:shadow-xl transition duration-500 ease-in-out p-6 md:mr-4 mb-10 md:mb-0"
            >
                <h3 class="text-lg font-monse">Popular</h3>
                <p class="mt-1"><span class="font-bold text-4xl font-lora">$59</span> /Month</p>
                <p class="text-sm opacity-75 mt-2 font-monse">For people who cook often and want to improve theri skills.</p>
                <div class="text-sm mt-4 font-monse">
                    <p class="my-2"><span class="fa fa-check-circle mr-2 ml-1"></span> Make friends</p>
                    <p class="my-2"><span class="fa fa-check-circle mr-2 ml-1"></span> Up to 20 favorite recipes</p>
                    <p class="my-2"><span class="fa fa-check-circle mr-2 ml-1"></span> Advanced filter search</p>
                    <p class="my-2"><span class="fa fa-check-circle mr-2 ml-1"></span> 20 queries per month</p>
                </div>
                <button
                    class="w-full font-monse bg-white rounded opacity-75 hover:opacity-100 hover:shadow-xl hover:bg-white transition duration-500 ease-in-out py-4 mt-4"
                >
                    Choose Plan
                </button>
            </div>
            <div
                class="w-full md:w-1/3 bg-white rounded-lg shadow hover:shadow-xl transition duration-500 ease-in-out p-6 mb-10 md:mb-0"
            >
                <h3 class="text-gray-800 text-lg font-monse">Enterprise</h3>
                <p class="text-gray-800 mt-1"><span class="font-bold text-black text-4xl font-lora">$99</span> /Month</p>
                <p class="text-sm text-gray-800 mt-2 font-monse">For groups of people who want to gather together and make big things.</p>
                <div class="text-sm text-gray-800 mt-4 font-monse">
                    <p class="my-2"><span class="fa fa-check-circle mr-2 ml-1"></span> Make Teams</p>
                    <p class="my-2"><span class="fa fa-check-circle mr-2 ml-1"></span> Unlimited favorites</p>
                    <p class="my-2"><span class="fa fa-check-circle mr-2 ml-1"></span> Unlimited team members</p>
                    <p class="my-2"><span class="fa fa-check-circle mr-2 ml-1"></span> Unlimited queries</p>
                </div>
                <button
                    class="w-full font-monse border border-yellow-300 rounded hover:bg-yellow-300 hover:shadow-xl transition duration-500 ease-in-out py-4 mt-4"
                >
                    Choose Plan
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import { defineComponent } from 'vue';

export default defineComponent({
});
</script>

<style></style>
