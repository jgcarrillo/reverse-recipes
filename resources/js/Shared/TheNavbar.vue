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
                    <img src="/logo.png" alt="Reverse recipes logo" class="h-7 w-7 md:h-12 md:w-12 md:mr-1 rotate-12">
                    <span class="hidden md:block text-xl font-bold text-white hover:text-gray-300 duration-300 ">Reverse Recipes</span>
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
                    <Link :href="route('explore')" class="text-white block mt-4 md:inline-block md:mt-0 hover:text-gray-300 duration-300" :class="isExplore">Explore</Link>
                    <Link :href="route('about')" class="text-white block mt-4 md:inline-block md:mt-0 hover:text-gray-300 duration-300" :class="isAbout">About</Link>
                </div>
                <div v-if="$page.props.user" class="flex">
                    <Link :href="route('dashboard')" class="w-full text-center inline-block px-4 py-2 rounded text-black bg-yellow-400 hover:bg-yellow-300 transition duration-500 mt-4 md:mt-0 md:mr-2">
                        Dashboard
                    </Link>
                </div>
                <div v-if="$page.props.user" class="flex">
                    <form class="w-full" @submit.prevent="logout">
                        <button class="w-full text-center inline-block px-4 py-2 border rounded text-white border-white hover:bg-white hover:text-black duration-500 mt-4 md:mt-0">Logout</button>
                    </form>
                </div>
                <template v-else>
                    <div class="flex">
                        <Link
                            :href="route('login')"
                            class="w-full text-center inline-block px-4 py-2 border rounded text-white border-white hover:bg-white hover:text-black transition duration-500 mt-4 md:mt-0 md:mr-2"
                        >Login</Link
                        >
                    </div>
                    <div class="flex">
                        <Link
                            :href="route('register')"
                            class="w-full text-center inline-block px-4 py-2 rounded text-black bg-yellow-400 hover:bg-yellow-300 transition duration-500 mt-4 md:mt-0"
                        >Signup</Link
                        >
                    </div>
                </template>
            </div>
        </nav>
    </div>
</template>

<script>
import { defineComponent } from 'vue';
import { Inertia } from '@inertiajs/inertia';
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
        computed: {
            isExplore() {
                return { 'border-b-2': this.$page.url === '/explore' }
            },
            isAbout() {
                return { 'border-b-2': this.$page.url === '/about' }
            }
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
            logout(){
                Inertia.post(route('logout'));
            }
        },
    }
)
</script>

<style></style>
