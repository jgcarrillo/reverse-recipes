<template>
    <Head title="Register" />

    <layout>
        <template #default>
            <header class="text-center text-4xl font-bold mt-14">
                <h1 class="text-7xl font-lora">Sign Up</h1>
            </header>
            <main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">
                <section>
                    <h3 class="font-lora font-bold text-2xl">Register for free</h3>
                    <p class="font-lora text-gray-800 pt-2">Start here the exploration</p>
                </section>

                <section class="mt-10">

                    <jet-validation-errors class="mb-4" />

                    <form class="flex flex-col" @submit.prevent="submit">
                        <div class="mb-6 pt-3 rounded bg-gray-200">
                            <jet-label class="font-monse block text-gray-800 text-sm font-bold mb-2 ml-3" for="name">Name</jet-label>
                            <base-input
                                type="text"
                                id="name"
                                v-model="form.name" required autofocus autocomplete="name"
                            />
                        </div>
                        <div class="mb-6 pt-3 rounded bg-gray-200">
                            <jet-label class="font-monse block text-gray-800 text-sm font-bold mb-2 ml-3" for="last_name">Last Name</jet-label>
                            <base-input
                                type="text"
                                id="last_name"
                                v-model="form.last_name" required autofocus autocomplete="last-name"
                            />
                        </div>
                        <div class="mb-6 pt-3 rounded bg-gray-200">
                            <jet-label class="font-monse block text-gray-800 text-sm font-bold mb-2 ml-3" for="email">Email</jet-label>
                            <base-input
                                type="email"
                                id="email"
                                v-model="form.email" required
                            />
                        </div>
                        <div class="mb-6 pt-3 rounded bg-gray-200">
                            <jet-label class="font-monse block text-gray-800 text-sm font-bold mb-2 ml-3" for="password">Password</jet-label>
                            <base-input
                                type="password"
                                id="password"
                                v-model="form.password" required autocomplete="new-password"
                            />
                        </div>
                        <div class="mb-6 pt-3 rounded bg-gray-200">
                            <jet-label class="font-monse block text-gray-800 text-sm font-bold mb-2 ml-3" for="password_confirmation">Confirm Password</jet-label>
                            <base-input
                                type="password"
                                id="password_confirmation"
                                v-model="form.password_confirmation" required autocomplete="new-password"
                            />
                        </div>

                        <base-button
                            type="submit" :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
                        >
                            Create Account
                        </base-button>
                    </form>
                </section>
            </main>

            <div class="max-w-lg mx-auto text-center mb-6 font-monse">
                <p>Already have an account? <Link :href="route('login')" class="font-bold hover:underline">Log in</Link>.</p>
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
    import BaseButton from "@/Shared/BaseButton";
    import BaseInput from "@/Shared/BaseInput";
    import Layout from "@/Shared/Layout";

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

        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    last_name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    terms: false,
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('register'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            }
        }
    })
</script>
