<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';
import CustomActionSection from '@/Shared/CustomActionSection.vue';
import CustomDialogModal from '@/Shared/CustomDialogModal.vue';
import JetDangerButton from '@/Jetstream/DangerButton.vue';
import ProfileInput from '@/Shared/ProfileInput.vue';
import JetInputError from '@/Jetstream/InputError.vue';
import SecondaryProfileButton from '@/Shared/SecondaryProfileButton.vue';

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: '',
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;

    setTimeout(() => passwordInput.value.focus(), 250);
};

const deleteUser = () => {
    form.delete(route('current-user.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;

    form.reset();
};
</script>

<template>
    <custom-action-section>
        <template #title>
            <span class="text-white font-lora">Delete Account</span>
        </template>

        <template #description>
            <span class="text-white font-monse">Permanently delete your account.</span>
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-white font-monse">
                Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
            </div>

            <div class="mt-5">
                <JetDangerButton @click="confirmUserDeletion">
                    Delete Account
                </JetDangerButton>
            </div>

            <!-- Delete Account Confirmation Modal -->
            <custom-dialog-modal :show="confirmingUserDeletion" @close="closeModal">
                <template #title>
                    Delete Account
                </template>

                <template #content>
                    Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.

                    <div class="mt-4">
                        <profile-input
                            ref="passwordInput"
                            v-model="form.password"
                            type="password"
                            class="mt-1 block w-3/4"
                            placeholder="Password"
                            @keyup.enter="deleteUser"
                        />

                        <JetInputError :message="form.errors.password" class="mt-2" />
                    </div>
                </template>

                <template #footer>
                    <secondary-profile-button @click="closeModal">
                        Cancel
                    </secondary-profile-button>

                    <JetDangerButton
                        class="ml-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteUser"
                    >
                        Delete Account
                    </JetDangerButton>
                </template>
            </custom-dialog-modal>
        </template>
    </custom-action-section>
</template>
