<template>
    <div>
        <Head :title="`${form.name} ${form.last_name}`" />
        <div class="flex justify-start mb-8 max-w-3xl">
            <h1 class="text-3xl font-lora">
                <Link class="text-indigo-400 hover:text-indigo-600" href="/dashboard/admin/users">Users</Link>
                <span class="text-indigo-400"> /</span>
                {{ form.name }} {{ form.last_name }}
            </h1>
            <img v-if="user.photo" alt="user photo" class="block ml-4 w-8 h-8 rounded-full" :src="user.photo" />
        </div>
        <div class="max-w-3xl bg-slate-800 rounded-md shadow overflow-hidden">
            <form @submit.prevent="update">
                <div class="flex flex-wrap -mb-8 -mr-6 p-8">
                    <text-input v-model="form.name" class="pb-8 pr-6 w-full lg:w-1/2" label="First name" />
                    <text-input v-model="form.last_name" class="pb-8 pr-6 w-full lg:w-1/2" label="Last name" />
                    <text-input v-model="form.email" class="pb-8 pr-6 w-full lg:w-1/2" label="Email" />
                    <text-input v-model="form.password" class="pb-8 pr-6 w-full lg:w-1/2" type="password" autocomplete="new-password" label="Password" />
                    <file-input v-model="form.photo" class="pb-8 pr-6 w-full lg:w-1/2" type="file" accept="image/*" label="Photo" />
                </div>
                <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
                    <button class="text-red-600 hover:underline" tabindex="-1" type="button" @click="destroy">Delete User</button>
                    <loading-button :loading="form.processing" class="btn-indigo ml-auto" type="submit">Update User</loading-button>
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

export default {
    components: {
        FileInput,
        Head,
        Link,
        LoadingButton,
        TextInput,
    },
    layout: AppLayout,
    props: {
        user: Object,
    },
    remember: 'form',
    data() {
        return {
            form: this.$inertia.form({
                _method: 'put',
                name: this.user.name,
                last_name: this.user.last_name,
                email: this.user.email,
                password: '',
                photo: null,
            }),
        }
    },
    methods: {
        update() {
            this.form.post(`/users/${this.user.id}`, {
                onSuccess: () => this.form.reset('password', 'photo'),
            })
        },
        destroy() {
            if (confirm('Are you sure you want to delete this user?')) {
                this.$inertia.delete(`/users/${this.user.id}`)
            }
        },
        restore() {
            if (confirm('Are you sure you want to restore this user?')) {
                this.$inertia.put(`/users/${this.user.id}/restore`)
            }
        },
    },
}
</script>