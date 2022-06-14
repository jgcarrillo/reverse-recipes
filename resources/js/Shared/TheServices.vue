<template>
    <base-three-grid>
        <template #header>
            What we offer
        </template>
        <template #default>
            <base-card></base-card>

            <base-card>
                <template #image>
                    <img
                        class="lg:h-72 md:h-48 w-full object-cover object-center"
                        src="https://picsum.photos/id/292/3852/2556"
                        alt="blog"
                        @load="onLoaded"
                        v-show="loaded"
                    />
                    <div class="lg:h-72 md:h-48 w-full bg-gray-200 w-full animate-pulse"
                         v-show="loaded === false">
                    </div>
                </template>
                <template #title>
                    <h1>Easy DIY</h1>
                </template>
                <template #content>
                    <p>
                        Looking for recipes for DIY foods? Reverse recipes has more than 1000 recipes
                        <code class="bg-yellow-400 px-1 py-0.5 rounded text-yellow-700 font-mono italic">for dishes</code> like homemade pasta and sausages, ingredients like self-rising flour and spice blends, and jams and jellies, cheeses--even ketchup and mustard.
                    </p>
                </template>
            </base-card>

            <base-card>
                <template #image>
                    <img
                        class="lg:h-72 md:h-48 w-full object-cover object-center"
                        src="https://picsum.photos/id/312/3888/2592"
                        alt="blog"
                        @load="onLoaded"
                        v-show="loaded"
                    />
                    <div class="lg:h-72 md:h-48 w-full bg-gray-200 w-full animate-pulse"
                         v-show="loaded === false">
                    </div>
                </template>
                <template #title>
                    <h1>24/7 Recipes</h1>
                </template>
                <template #content>
                    <p>
                        They say abs are made in the kitchen, and so is healthy, delicious and nourishing food. Have fun creating superfood smoothies,
                        <code class="bg-yellow-400 px-1 py-0.5 rounded text-yellow-700 font-mono italic">seasonal dishes</code> and more tasty recipes from this collection. Whatever you decide to whip up, we hope these recipes make cooking at home more inspiring, enjoyable and, of course, delicious!
                    </p>
                </template>
            </base-card>
        </template>
    </base-three-grid>
</template>

<script>
import { defineComponent } from 'vue';
import BaseCard from "@/Shared/BaseCard";
import BaseThreeGrid from "@/Shared/BaseThreeGrid";

export default defineComponent({
    components: { BaseCard, BaseThreeGrid },
    data() {
        return {
            loaded: false,
        }
    },
    methods: {
        onLoaded() {
            this.loaded = true;
        },
    }
});
</script>

<style></style>
