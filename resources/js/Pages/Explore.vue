<template>
    <Head title="Explore" />

    <the-navbar></the-navbar>

    <div class="text-center text-gray-800 p-5 md:pt-14">
        <h1 class="font-lora text-7xl font-bold mt-0 mb-6">Explore</h1>
        <h3 class="font-lora text-4xl font-bold mb-8">Type something and press <span class="italic">Enter</span></h3>
    </div>

    <!-- Search -->
    <div class="flex text-sm md:text-base mx-10 md:mx-36 mt-5 mb-9 font-monse">
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

    <base-three-grid>
        <template #header>
            Look at these examples
        </template>
        <template #default>
            <base-recipe-card></base-recipe-card>

            <base-recipe-card>
                <template #image>
                    <img
                        class="lg:h-72 md:h-48 w-full object-cover object-center"
                        src="https://picsum.photos/id/425/959/635"
                        alt="blog"
                    />
                </template>
                <template #type>Drinks • Easy</template>
                <template #recipe>Creative Coffee</template>
                <template #time>10 minutes</template>

                <template #ing>1</template>
                <template #people>1</template>

                <template #user-img>
                    <div class="bg-cover bg-center w-10 h-10 rounded-full mr-3" style="background-image: url(https://picsum.photos/id/433/4752/3168)"></div>
                </template>
                <template #user>Fernando Domingo</template>
            </base-recipe-card>

            <base-recipe-card>
                <template #image>
                    <img
                        class="lg:h-72 md:h-48 w-full object-cover object-center"
                        src="https://picsum.photos/id/488/1772/1181"
                        alt="blog"
                    />
                </template>
                <template #type>Fast Food • Medium</template>
                <template #recipe>Vegetarian Bowl</template>
                <template #time>15 minutes</template>

                <template #ing>5</template>
                <template #people>2</template>

                <template #user-img>
                    <div class="bg-cover bg-center w-10 h-10 rounded-full mr-3" style="background-image: url(https://picsum.photos/id/447/1280/853)"></div>
                </template>
                <template #user>Carlos Fuentes</template>
            </base-recipe-card>
        </template>
    </base-three-grid>

    <the-footer></the-footer>
</template>

<script>
import { defineComponent } from 'vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import TheNavbar from "../Shared/TheNavbar";
import TheFooter from "../Shared/TheFooter";
import BaseThreeGrid from "../Shared/BaseThreeGrid";
import BaseRecipeCard from "../Shared/BaseRecipeCard";

export default defineComponent({
    components: {
        Head,
        Link,
        BaseThreeGrid,
        BaseRecipeCard,
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
