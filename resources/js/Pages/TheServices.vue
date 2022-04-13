<template>
    <base-three-grid>
        <template #default>
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
        </template>
    </base-three-grid>
</template>

<script>
import { defineComponent } from 'vue';
import BaseCard from "../UI/BaseCard";
import BaseThreeGrid from "../UI/BaseThreeGrid";

export default defineComponent({
    components: { BaseCard, BaseThreeGrid }
});
</script>

<style></style>
