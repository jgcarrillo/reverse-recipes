<template>
    <Head title="Users" />
    <h1 class="mb-8 text-3xl font-bold font-lora">Users</h1>

    <div class="flex items-center justify-between mb-6">
        <search-filter v-model="form.search" @reset="reset" class="mr-4 w-full max-w-md"></search-filter>
        <Link class="font-lora px-4 py-2 rounded text-black bg-yellow-400 hover:bg-yellow-300 transition duration-500 mt-4 md:mt-0" href="/dashboard/admin/users/create">
            <span>Create</span>
            <span class="hidden md:inline">&nbsp;User</span>
        </Link>
    </div>
    <div class="bg-slate-800 rounded-md shadow overflow-x-auto">
        <table class="w-full whitespace-nowrap">
            <tr class="text-left text-xl font-lora">
                <th class="pb-4 pt-6 px-6">Name</th>
                <th class="pb-4 pt-6 px-6">Email</th>
                <th class="pb-4 pt-6 px-6" colspan="2">Role</th>
            </tr>
            <tr v-for="user in users.data" :key="user.id" class="hover:bg-slate-600 focus-within:bg-gray-100 font-monse">
                <td class="border-t border-gray-900">
                    <Link class="flex items-center px-6 py-4" :href="`/dashboard/admin/users/${user.id}/edit`">
                        <img v-if="user.photo" alt="user photo" class="block -my-2 mr-2 w-5 h-5 rounded-full" :src="user.photo" />
                        {{ user.name }} {{ user.last_name }}
                    </Link>
                </td>
                <td class="border-t border-gray-900">
                    <Link class="flex items-center px-6 py-4" :href="`/dashboard/admin/users/${user.id}/edit`" tabindex="-1">
                        {{ user.email }}
                    </Link>
                </td>
                <td class="border-t border-gray-900">
                    <Link class="flex items-center px-6 py-4" :href="`/dashboard/admin/users/${user.id}/edit`" tabindex="-1">
                        User
                        <!-- {{ user.owner ? 'Owner' : 'User' }} -->
                    </Link>
                </td>
                <td class="w-px border-t border-gray-900">
                    <Link class="flex items-center px-4" :href="`/dashboard/admin/users/${user.id}/edit`" tabindex="-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </Link>
                </td>
            </tr>
            <tr v-if="users.length === 0" class="font-monse">
                <td class="px-6 py-4 border-t" colspan="4">No users found.</td>
            </tr>
        </table>
    </div>

    <pagination class="mt-6" :links="users.links"></pagination>

</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import AppLayout from '@/Shared/AppLayout';
import mapValues from 'lodash/mapValues';
import SearchFilter from "@/Shared/SearchFilter";
import pickBy from 'lodash/pickBy';
import throttle from 'lodash/throttle';
import Pagination from '../../Shared/Pagination';

export default {
    props: {
        users: Object,
        filters: Object,
    },
    data() {
        return {
            form: {
                search: this.filters.search,
            },
        }
    },
    components: {
        Head,
        Link,
        SearchFilter,
        Pagination
    },
    methods: {
        reset() {
            this.form = mapValues(this.form, () => null)
        },
    },
    watch: {
        form: {
            deep: true,
            handler: throttle(function () {
                this.$inertia.get('/dashboard/admin/users', pickBy(this.form), { preserveState: true })
            }, 150),
        },
    },
    layout: AppLayout,
}
</script>

<style>

</style>
