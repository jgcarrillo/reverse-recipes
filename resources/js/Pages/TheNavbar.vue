<template>
    <!-- sticky top-0 for stick the navbar in the below div -->

    <!--
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <Link v-if="$page.props.user" :href="route('dashboard')" class="text-sm text-gray-700 underline">
                Dashboard
            </Link>

            <template v-else>
                <Link :href="route('login')" class="text-sm text-gray-700 underline">
                    Log in
                </Link>

                <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 underline">
                    Register
                </Link>
            </template>
        </div>
    </div>
    -->

    <div>
        <nav class="flex items-center justify-between flex-wrap font-lora bg-black p-6">
            <!-- LOGO -->
            <Link :href="route('home')">
                <div class="flex items-center flex-no-shrink text-white mr-6">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 mr-1 text-yellow-400 rotate-12"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"
                        />
                    </svg>
                    <span class="text-xl font-bold text-white hover:text-gray-300 duration-300">Recipes</span>
                </div>
            </Link>
            <!-- BUTTON -->
            <div class="block md:hidden">
                <button @click="toggle" class="flex items-center px-3 py-2 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 20 20" fill="white">
                        <path
                            fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </button>
            </div>
            <!-- NAV -->
            <div  :class="open ? 'block' : 'hidden'" class="w-full text-xl flex-grow md:flex md:items-center md:w-auto">
                <div class="md:flex-grow md:text-center md:space-x-3">
                    <Link href="" class="text-white block mt-4 md:inline-block md:mt-0 hover:text-gray-300 duration-300">Explore </Link>
                    <Link :href="route('about')" class="text-white block mt-4 md:inline-block md:mt-0 hover:text-gray-300 duration-300"> About </Link>
                    <Link v-if="$page.props.user" :href="route('dashboard')" class="text-sm text-gray-700 underline">
                        Dashboard
                    </Link>
                </div>
                <div class="flex">
                    <Link
                        :href="route('login')"
                        class="w-full text-center inline-block px-4 py-2 border rounded text-white border-white hover:bg-white hover:text-black duration-500 mt-4 md:mt-0 md:mr-2"
                    >Login</Link
                    >
                </div>
                <div class="flex">
                    <Link
                        :href="route('register')"
                        class="w-full text-center inline-block px-4 py-2 rounded text-black bg-yellow-400 hover:bg-yellow-300 transition duration-500 mt-4 md:mt-0"
                    >Singup</Link
                    >
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
import { defineComponent } from 'vue'
import { Head, Link } from '@inertiajs/inertia-vue3';

export default defineComponent(
    {
        components: {
            Link
        },
        props: {
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
        },
        data() {
            return {
                open: false,
            };
        },
        methods: {
            toggle() {
                this.open = !this.open;
            },
        },
    }
)
</script>

<style></style>
