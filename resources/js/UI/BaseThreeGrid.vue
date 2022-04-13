<template>
    <div class="bg-gray-100 pb-8">
        <section class="md:h-full flex items-center text-gray-800">
            <div class="container mx-auto px-5 py-25 text-gray-800">
                <div class="text-center mb-12">
                    <h1 class="font-lora text-4xl md:text-5xl text-gray-800 font-bold pt-8">
                        <slot name="header"></slot>
                    </h1>
                </div>
                <div class="flex flex-wrap -m-4">
                    <slot name="default"></slot>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import { defineComponent } from 'vue';

export default defineComponent({

});
</script>

<style></style>
