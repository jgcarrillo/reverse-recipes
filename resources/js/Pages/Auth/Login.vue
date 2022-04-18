<template>
    <Head title="Log in" />

    <layout>
        <template #default>
            <header class="text-center text-4xl font-bold mt-14">
                <h1 class="font-lora text-7xl font-bold">Log In</h1>
            </header>
            <main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">
                <section>
                    <h3 class="font-lora font-bold text-2xl">Welcome to Recipes</h3>
                    <p class="font-lora text-gray-800 pt-2">Sign in to your account.</p>
                </section>

                <section class="mt-10">

                    <jet-validation-errors class="mb-4" />

                    <form class="flex flex-col" @submit.prevent="submit">
                        <div class="mb-6 pt-3 rounded bg-gray-200">
                            <jet-label class="font-monse block text-gray-800 text-sm font-bold mb-2 ml-3" for="email">Email</jet-label>
                            <base-input
                                type="email"
                                id="email"
                                v-model="form.email" required autofocus
                            />
                        </div>
                        <div class="mb-6 pt-3 rounded bg-gray-200">
                            <jet-label class="font-monse block text-gray-800 text-sm font-bold mb-2 ml-3" for="password">Password</jet-label>
                            <base-input
                                type="password"
                                id="password"
                                v-model="form.password" required autocomplete="current-password"
                            />
                        </div>
                        <div class="flex justify-end">
                            <Link v-if="canResetPassword" :href="route('password.request')" class="font-monse text-sm text-gray-800 hover:underline mb-6">Forgot your password?</Link>
                        </div>
                        <base-button
                            :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
                        >
                            Sign In
                        </base-button>
                    </form>
                </section>
            </main>

            <div class="max-w-lg mx-auto text-center mb-6 font-monse">
                <p>Don't have an account? <Link :href="route('register')" class="font-bold hover:underline">Sign up</Link>.</p>
            </div>
        </template>
    </layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import BaseButton from "../../Shared/BaseButton";
    import BaseInput from "../../Shared/BaseInput";
    import Layout from "../../Shared/Layout";


    export default defineComponent({
        components: {
            Head,
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetLabel,
            JetValidationErrors,
            Link,
            BaseButton,
            BaseInput,
            Layout
        },

        props: {
            canResetPassword: Boolean,
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: '',
                    password: '',
                    remember: false
                })
            }
        },

        methods: {
            submit() {
                this.form
                    .transform(data => ({
                        ... data,
                        remember: this.form.remember ? 'on' : ''
                    }))
                    .post(this.route('login'), {
                        onFinish: () => this.form.reset('password'),
                    })
            }
        }
    })
</script>
