<template>
    <div>
        <div id="dropdown" />
        <div class="md:flex md:flex-col">
            <div class="md:flex md:flex-col md:h-screen">
                <div class="md:flex md:flex-shrink-0">
                    <div class="flex items-center justify-between px-6 py-4 bg-slate-800 md:flex-shrink-0 md:justify-center md:w-56 border-b border-slate-500">
                        <Link class="mt-1" :href="route('home')">
                            <img src="/logo.png" alt="Reverse recipes logo" class="h-10 w-10 rotate-12">
                        </Link>
                        <dropdown class="md:hidden" placement="bottom-end">
                            <template #default>
                                <svg class="w-6 h-6 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" /></svg>
                            </template>
                            <template #dropdown>
                                <div class="mt-2 px-8 py-4 bg-slate-800 rounded shadow-lg">
                                    <main-menu></main-menu>
                                </div>
                            </template>
                        </dropdown>
                    </div>
                    <div class="md:text-md flex items-center justify-between p-4 w-full text-sm bg-slate-800 text-white md:px-12 md:py-0 border-b border-slate-500 font-monse">
                        <div class="mr-4 mt-1">{{ auth.user.email }}</div>
                        <dropdown class="mt-1" placement="bottom-end">
                            <template #default>
                                <div class="group flex items-center cursor-pointer select-none">
                                    <div class="mr-2 text-white group-hover:text-indigo-300 focus:text-indigo-600 whitespace-nowrap">
                                        <span>{{ auth.user.name }}</span>
                                        <span class="hidden md:inline">&nbsp;{{ auth.user.last_name }}</span>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:text-indigo-300 focus:text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </template>
                            <template #dropdown>
                                <div class="mt-2 py-2 text-sm bg-white rounded shadow-xl">
                                    <Link class="block px-6 py-2 hover:text-white hover:bg-indigo-500" :href="route('profile.show')">My Profile</Link>
                                    <Link class="block px-6 py-2 w-full text-left hover:text-white hover:bg-indigo-500" href="/logout" method="POST" as="button">Logout</Link>
                                </div>
                            </template>
                        </dropdown>
                    </div>
                </div>
                <div class="md:flex md:flex-grow md:overflow-hidden">
                    <main-menu class="hidden flex-shrink-0 p-12 w-56 bg-slate-800 overflow-y-auto md:block" />
                    <div class="px-4 py-8 md:flex-1 md:p-12 md:overflow-y-auto bg-gray-900 text-white" scroll-region>
                        <flash-messages></flash-messages>
                        <slot />
                        <!-- <div class="h-screen max-h-60"></div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import Dropdown from '@/Shared/Dropdown';
import MainMenu from '@/Shared/MainMenu';
import { Inertia } from "@inertiajs/inertia";
import FlashMessages from '@/Shared/FlashMessages';

const logout = () => {
    Inertia.post(route('logout'));
};

export default {
    props: {
        auth: Object
    },
    components: {
        Dropdown,
        Link,
        MainMenu,
        FlashMessages
    }
}
</script>
