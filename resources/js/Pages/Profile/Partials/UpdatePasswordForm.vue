<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';
import JetInputError from '@/Jetstream/InputError.vue';
import ProfileButton from '@/Shared/ProfileButton.vue';
import CustomFormSection from '@/Shared/FormSection.vue';
import ProfileInput from '@/Shared/ProfileInput.vue';
import CustomLabel from '@/Shared/CustomLabel.vue';
import CustomActionMessage from '@/Shared/CustomActionMessage.vue';

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});

const updatePassword = () => {
    form.put(route('user-password.update'), {
        errorBag: 'updatePassword',
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset('password', 'password_confirmation');
                passwordInput.value.focus();
            }

            if (form.errors.current_password) {
                form.reset('current_password');
                currentPasswordInput.value.focus();
            }
        },
    });
};
</script>

<template>
    <custom-form-section @submitted="updatePassword">
        <template #title>
            <span class="text-white font-lora">Update Password</span>
        </template>

        <template #description>
            <span class="text-white font-monse">Ensure your account is using a long, random password to stay secure.</span>
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <custom-label for="current_password" value="Current Password" />
                <profile-input
                    id="current_password"
                    ref="currentPasswordInput"
                    v-model="form.current_password"
                    type="password"
                    class="mt-1 block w-full"
                    autocomplete="current-password"
                />
                <JetInputError :message="form.errors.current_password" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <custom-label for="password" value="New Password" />
                <profile-input
                    id="password"
                    ref="passwordInput"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    autocomplete="new-password"
                />
                <JetInputError :message="form.errors.password" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <custom-label for="password_confirmation" value="Confirm Password" />
                <profile-input
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    autocomplete="new-password"
                />
                <JetInputError :message="form.errors.password_confirmation" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <custom-action-message :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </custom-action-message>

            <profile-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </profile-button>
        </template>
    </custom-form-section>
</template>
