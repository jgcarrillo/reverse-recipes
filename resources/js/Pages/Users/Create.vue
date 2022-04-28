<template>
    <div>
        <Head title="Create User" />
        <h1 class="mb-8 text-3xl font-lora">
            <Link class="text-indigo-300 hover:text-white" href="/dashboard/admin/users">Users</Link>
            <span class="text-indigo-300"> /</span> Create
        </h1>
        <div class="max-w-3xl bg-slate-800 rounded-md shadow overflow-hidden">
            <form @submit.prevent="store">
                <div class="flex flex-wrap -mb-8 -mr-6 p-8">
                    <text-input v-model="form.name" :error="form.errors.name" class="pb-8 pr-6 w-full lg:w-1/2" label="First name" />
                    <text-input v-model="form.last_name" :error="form.errors.last_name" class="pb-8 pr-6 w-full lg:w-1/2" label="Last name" />
                    <text-input v-model="form.email" :error="form.errors.email" class="pb-8 pr-6 w-full lg:w-1/2" label="Email" />
                    <select-input v-model="form.owner" :error="form.errors.owner" class="pb-8 pr-6 w-full lg:w-1/2" label="Owner">
                        <option :value="true">Yes</option>
                        <option :value="false">No</option>
                    </select-input>
                    <text-input v-model="form.password" :error="form.errors.password" class="pb-8 pr-6 w-full lg:w-1/2" type="password" autocomplete="new-password" label="Password" />
                    <text-input v-model="form.password_confirmation" :error="form.errors.password_confirmation" class="pb-8 pr-6 w-full lg:w-1/2" type="password" autocomplete="new-password" label="Password Confirmation" />
                </div>
                <div class="flex items-center justify-end px-8 py-4 bg-slate-800 border-t border-gray-100 font-lora">
                    <loading-button :loading="form.processing" class="px-4 py-2 ml-auto rounded text-black bg-yellow-400 hover:bg-yellow-300 transition duration-500" type="submit">Create User</loading-button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import AppLayout from '@/Shared/AppLayout.vue';
import TextInput from '@/Shared/TextInput.vue';
import FileInput from '@/Shared/FileInput.vue';
import LoadingButton from '@/Shared/LoadingButton.vue';
import SelectInput from '@/Shared/SelectInput';

export default {
    components: {
        FileInput,
        Head,
        Link,
        LoadingButton,
        TextInput,
        SelectInput
    },
    layout: AppLayout,
    remember: 'form',
    data() {
        return {
            form: this.$inertia.form({
                name: '',
                last_name: '',
                email: '',
                owner: false,
                password: '',
                password_confirmation: '',
                photo: '',
            }),
        }
    },
    methods: {
        store() {
            this.form.post('/dashboard/admin/users')
        },
    },
}
</script>
