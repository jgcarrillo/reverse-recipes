<template>
    <div>
        <Head :title="`${form.name}`" />
        <div class="flex justify-start mb-8 max-w-3xl">
            <h1 class="text-3xl font-lora">
                <Link class="text-indigo-300 hover:text-white" href="/dashboard/recipes/favorites">Recipes</Link>
                <span class="text-indigo-300"> /</span>
                {{ form.name }}
            </h1>
        </div>
        <div class="max-w-3xl bg-slate-800 rounded-md shadow overflow-hidden">
            <form @submit.prevent="update">
                <div class="flex flex-wrap -mb-8 -mr-6 p-8">
                    <text-input v-model="form.name"  class="pb-8 pr-6 w-full lg:w-1/2" label="Name" id="name" />
                    <text-input v-model="form.description"  class="pb-8 pr-6 w-full lg:w-1/2" label="Description" id="description" />
                    <select-input v-model="form.time"  class="pb-8 pr-6 w-full lg:w-1/2" label="Time">
                        <option v-for="time in recipe.times" :key="time.id" :value="time.id">{{ time.time }}</option>
                    </select-input>
                    <select-input v-model="form.difficulty"  class="pb-8 pr-6 w-full lg:w-1/2" label="Difficulty">
                        <option v-for="diff in recipe.difficulties" :key="diff.id" :value="diff.id">{{ diff.difficulty }}</option>
                    </select-input>
                    <select-input v-model="form.person"  class="pb-8 pr-6 w-full lg:w-1/2" label="Persons">
                        <option v-for="per in recipe.persons" :key="per.id" :value="per.id">{{ per.persons }}</option>
                    </select-input>
                    <select-input v-model="form.type"  class="pb-8 pr-6 w-full lg:w-1/2" label="Types">
                        <option v-for="tp in recipe.types" :key="tp.id" :value="tp.id">{{ tp.type }}</option>
                    </select-input>
                    <file-input v-model="form.photo"  class="pb-8 pr-6 w-full lg:w-1/2" type="file" accept="image/*" label="Photo" id="photo" />
                </div>
                <div class="flex items-center px-8 py-4 bg-slate-800 border-t border-gray-100 font-lora">
                    <button class="px-4 py-2 border rounded text-white border-white hover:bg-white hover:text-black transition duration-500 hover:underline" tabindex="-1" type="button" @click="destroy">Delete recipe</button>
                    <loading-button :loading="form.processing" class="px-4 py-2 ml-auto rounded text-black bg-yellow-400 hover:bg-yellow-300 transition duration-500" type="submit">Update Recipe</loading-button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
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
    props: {
        recipe: Object,
        errors: ''
    },
    remember: 'form',
    data() {
        return {
            form: this.$inertia.form({
                _method: 'put',
                name: this.recipe.name,
                description: this.recipe.description,
                difficulty: this.recipe.difficulty,
                person: this.recipe.person,
                type: this.recipe.type,
                time: this.recipe.time,
                photo: null,
            }),
        }
    },
    methods: {
        update() {
            this.form.post(`/dashboard/admin/users/${this.user.id}`, {
                onSuccess: () => this.form.reset('password', 'photo'),
            })
        },
        destroy() {
            if (confirm('Are you sure you want to delete this recipe?')) {
                this.$inertia.delete(`/dashboard/recipes/${this.recipe.user_recipe[0].id}`)
            }
        },
    },
}
</script>
