<template>
    <div class="p-4 sm:w-1/2 lg:w-1/3">
        <div class="h-full border border-gray-200 rounded-lg overflow-hidden shadow-md">
            <slot name="image">
                <img
                    class="lg:h-72 md:h-48 w-full object-cover object-center"
                    src="https://picsum.photos/id/1080/6858/4574"
                    alt="blog"
                    @load="onLoaded"
                    v-show="loaded"
                />
                <div class="lg:h-72 md:h-48 w-full bg-gray-200 w-full animate-pulse"
                     v-show="loaded === false">
                </div>
            </slot>

            <div class="p-6">
                <h1 class="font-lora text-2xl font-semibold mb-3">
                    <slot name="title">Fresh recipes</slot>
                </h1>

                <p class="font-monse leading-relaxed mb-3">
                    <slot name="content">
                        Reverse Recipe's largest selection of recipes & drink ideas featuring over
                        <code class="bg-yellow-400 px-1 py-0.5 rounded text-yellow-700 font-mono italic">1000</code> instructional recipes. Here you will find fresh family recipes everyone will enjoy. We’ve pulled together some recipes that make it easy to enjoy new takes on breakfast, family dinners and more.
                    </slot>
                </p>
            </div>
        </div>
    </div>
</template>

<script>
import { defineComponent } from 'vue';

export default defineComponent({
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
