<template>
    <Head title="About" />

    <layout>
        <template #default>
            <div class="text-center text-gray-800 p-5 md:pt-14">
                <h1 class="font-lora text-7xl font-bold mt-0 mb-6">About</h1>
                <h3 class="font-lora text-4xl font-bold mb-8">Know more about the project</h3>
            </div>

            <div class="text-center text-gray-800 bg-gray-50 p-10 md:py-14">
                <p class="text-sm font-lora md:text-3xl md:px-24">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A sequi suscipit vel! Beatae consequuntur delectus dolore dolorem error, et expedita itaque minima nostrum officia quibusdam quis, reiciendis sapiente similique temporibus?</p>
            </div>

            <the-pricing></the-pricing>
        </template>
    </layout>
</template>

<script>
import { defineComponent } from 'vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import ThePricing from "../Shared/ThePricing";
import Layout from "../Shared/Layout";

export default defineComponent({
    components: {
        Head,
        Link,
        ThePricing,
        Layout
    }
});
</script>

<style></style>
