<script setup>
import { Head, useForm } from '@inertiajs/inertia-vue3';
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue';
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue';
import JetButton from '@/Jetstream/Button.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue';
import Customlabel from '@/Shared/CustomLabel.vue';
import BaseButton from '@/Shared/BaseButton';
import ProfileInput from '@/Shared/ProfileInput.vue';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <Head title="Forgot Password" />

    <JetAuthenticationCard>
        <template #logo>
            <JetAuthenticationCardLogo />
        </template>

        <div class="mb-4 text-sm text-gray-600 font-monse">
            Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
        </div>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600 font-monse">
            {{ status }}
        </div>

        <JetValidationErrors class="mb-4" />

        <form @submit.prevent="submit">
            <div>
                <customlabel for="email" value="Email" class="text-black"></customlabel>
                <profile-input
                     id="email"
                     v-model="form.email"
                     type="email"
                     class="mt-1 block w-full"
                     required
                     autofocus
                />
            </div>

            <div class="flex items-center justify-end mt-4 font-lora">
                <base-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing" class='p-2'>
                    Email Password Reset Link
                </base-button>
            </div>
        </form>
    </JetAuthenticationCard>
</template>
