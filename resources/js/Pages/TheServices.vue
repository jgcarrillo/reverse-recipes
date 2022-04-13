<template>
    <div class="bg-gray-100 pb-8">
        <section class="md:h-full flex items-center text-gray-800">
            <div class="container mx-auto px-5 py-25 text-gray-800">
                <div class="text-center mb-12">
                    <h1 class="font-lora text-4xl md:text-5xl text-gray-800 font-bold pt-8">What we offer</h1>
                </div>
                <div class="flex flex-wrap -m-4">
                    <base-card></base-card>

                    <base-card>
                        <template #image>
                            <img
                                class="lg:h-72 md:h-48 w-full object-cover object-center"
                                src="https://picsum.photos/id/292/3852/2556"
                                alt="blog"
                            />
                        </template>
                        <template #title>
                            <h1>Easy DIY</h1>
                        </template>
                        <template #content>
                            <p>
                                Lorem ipsum dolor sit amet consectetur
                                <code class="bg-yellow-400 px-1 py-0.5 rounded text-yellow-700 font-mono italic">adipisicing</code> elit.
                                Aperiam modi, expedita quos doloremque autem ipsum itaque incidunt ipsam reprehenderit fuga! Dolores quisquam
                                eius cum accusamus?
                            </p>
                        </template>
                    </base-card>

                    <base-card>
                        <template #image>
                            <img
                                class="lg:h-72 md:h-48 w-full object-cover object-center"
                                src="https://picsum.photos/id/312/3888/2592"
                                alt="blog"
                            />
                        </template>
                        <template #title>
                            <h1>24/7 Recipes</h1>
                        </template>
                        <template #content>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam modi, expedita quos doloremque
                                <code class="bg-yellow-400 px-1 py-0.5 rounded text-yellow-700 font-mono italic">autem</code> ipsum itaque
                                incidunt ipsam reprehenderit fuga! Dolores quisquam eius cum accusamus?
                            </p>
                        </template>
                    </base-card>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import { defineComponent } from 'vue';
import BaseCard from "../UI/BaseCard";

export default defineComponent({
    components: { BaseCard }
});
</script>

<style></style>
