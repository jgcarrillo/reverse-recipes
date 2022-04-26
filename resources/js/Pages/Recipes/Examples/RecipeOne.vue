<template>
    <Head title="Recipe One"/>

    <!-- https://github.com/vcjpierre/vuebnb -->

    <layout>
        <template #default>
            <div class="text-center text-gray-800 p-5 md:pt-14">
                <h1 class="font-lora text-7xl font-bold mt-0 mb-6">Recipe One</h1>
            </div>

            <div class="header">
                <div class="header-img">
                    <div class="listing-save">
                        <button>Save</button>
                    </div>
                    <button class="view-photos">View Photos</button>
                </div>
            </div>

            <div class="max-w-3xl mx-auto mb-2 mt-8">
                <h1 class="text-4xl">Awesome Tea</h1>
                <p>Amazing tea with fantastic flavours</p>

                <div class="border-t my-6"></div>

                <h3 class="text-left">Making of</h3>
                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam architecto assumenda at atque aut consectetur distinctio eligendi inventore iusto, maiores officiis optio praesentium, quia ratione repellendus sapiente tempore totam voluptates! Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam architecto assumenda at atque aut consectetur distinctio eligendi inventore iusto, maiores officiis optio praesentium, quia ratione repellendus sapiente tempore totam voluptates! Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam architecto assumenda at atque aut consectetur distinctio eligendi inventore iusto, maiores officiis optio praesentium, quia ratione repellendus sapiente tempore totam voluptates! Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                <div class="border-t my-6"></div>

                <div class="flex flex-nowrap my-6">
                    <div class="flex-2">
                        <strong>Ingredients</strong>
                    </div>
                    <div class="flex flex-3 flex-wrap">
                        <div class="flex-4"><span>TV</span></div>
                        <div class="flex-4"><span>Cinema</span></div>
                    </div>
                </div>

                <div class="border-t my-6"></div>

                <div class="flex flex-nowrap my-6">
                    <div class="flex-2">
                        <strong>Data</strong>
                    </div>
                    <div class="flex flex-3 flex-wrap">
                        <div class="flex-4"><span>TV</span></div>
                        <div class="flex-4"><span>Cinema</span></div>
                        <div class="flex-4"><span>Cinema</span></div>
                        <div class="flex-4"><span>Cinema</span></div>
                        <div class="flex-4"><span>Cinema</span></div>
                    </div>
                </div>
            </div>
        </template>
    </layout>
</template>

<script>
import { defineComponent } from 'vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Layout from "@/Shared/Layout";

export default defineComponent({
    components: {
        Head,
        Link,
        Layout
    },
})
</script>

<style scoped>
.header {
    height: 320px;
}

.header-img {
    background-image: url("https://morning-falls-91197.herokuapp.com/images/12/Image_1.jpg");
}

.header .header-img {
    background-repeat: no-repeat;
    background-size: cover;
    background-position: 50% 50%;
    background-color: #f5f5f5;
    height: 100%;
    cursor: pointer;
    position: relative;
}

.header .header-img button {
    font-size: 14px;
    padding: 7px 18px;
    color: #484848;
    line-height: 1.43;
    background: #ffffff;
    font-weight: bold;
    border-radius: 4px;
    border: 1px solid #c4c4c4;
}

.header .header-img button.view-photos {
    position: absolute;
    bottom: 20px;
    left: 20px;
}

.listing-save {
    position: absolute;
    top: 20px;
    right: 20px;
    cursor: pointer;
}

.listing-save .fa-heart-o {
    color: #ffffff;
}

.listing-save .fa-heart {
    color: #ff5a5f;
}

.listing-save i {
    padding-right: 4px;
}

.listing-save button .fa-heart-o {
    color: #808080;
}
</style>
